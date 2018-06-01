<?php
class metacms_modules_solr_views_components_AdvancedSearch extends org_glizy_components_Component
{

	function init()
	{
		$this->defineAttribute('section',  false, 'bibliografico', COMPONENT_TYPE_STRING);
		$this->defineAttribute('solrFieldUrl',  false, 'metacms.solr.field.url', COMPONENT_TYPE_STRING);
		$this->defineAttribute('searchUrl',  false, 'solr_search', COMPONENT_TYPE_STRING);
		$this->defineAttribute('autocompleteUrl', false, 'metacms.solr.autocomplete.url', COMPONENT_TYPE_STRING);
		parent::init();
	}

	function process()
	{
		//SET dell'istituto (temporaneo, da inserire direttamente in URL poi, non come parametro)
		//TODO rimuovere quando si farà la gestione con url
		$setInstitute = __Request::get('setInstitute');
		if($setInstitute)
		{
			$instituteKey = __Session::get('instituteKey');
			if($setInstitute && !$instituteKey)
			{
				$this->setInstituteKey($setInstitute);
			}
			else if($setInstitute && $instituteKey && $setInstitute !== $instituteKey)
			{
				$this->setInstituteKey($setInstitute);
			}
		}

		$url = __Config::get('metafad.solr.url');
		$model = __Config::get('advancedSearch.model');

		if (__Config::get('metafad.fe.hasInstitutes') == false) {
			$instituteProxy = __ObjectFactory::createObject('metafad.institutes.models.proxy.InstituteProxy');
			$institutes = $instituteProxy->getAllInstitutes();
			$instituteKey = $institutes[0]['key'];
		} else {
			$instituteKey = __Session::get('instituteKey');
		}

		$maskName = (!__Request::get('mask')) ? 'Ricerca avanzata' : __Request::get('mask');

		if($maskName == 'Ricerca avanzata UN')
		{
			$this->setAttribute('searchUrl','solr_search_archive_ud');
			$this->setAttribute('solrFieldUrl','metacms.archive-ud.field.url');
			$this->setAttribute('autocompleteUrl','metacms.archive-ud.autocomplete.url');
		}

		$this->_content['mergesearch'] = false;
		//TASK POLODEBUG-538, UNIONE DEI DUE ISTITUTI IISS E FBBC
		if($instituteKey == 'istituto-italiano-per-gli-studi-storici' || $instituteKey == 'fondazione-biblioteca-benedetto-croce')
		{
			$this->_content['mergesearch'] = true;
		}


		$section = $this->getAttribute('section');

		$request = org_glizy_objectFactory::createObject('org.glizy.rest.core.RestRequest', $url.'select', 'POST', 'q='.$model.'&wt=json&rows=100', 'application/x-www-form-urlencoded');
		$request->setAcceptType('application/json');
		$request->execute();

		$solrList = json_decode(file_get_contents(__Config::get($this->getAttribute('solrFieldUrl'))));
		$arrayRange = array();
		foreach ($solrList->fields as $f) {
			$arrayRange[$f->id] = $f->range;
		}

		$response = json_decode($request->getResponseBody());

		$fields = array();
		$accordionList = array();
		$hasFilters = false;
		if($response->response->docs)
		{
			if($instituteKey)
			{
				$searchIndex = -1;
				foreach ($response->response->docs as $doc) {
					$searchIndex++;
					$name = $doc->name[0];
					if($name !== $maskName) continue;
					if($doc->section[0] !== $section) continue;
					if($doc->instituteKey_s != $instituteKey) continue;
					$found = true;
					break;
				}
			}
			$count = -1;
			foreach ($response->response->docs as $doc) {
				$count++;
				$name = $doc->name[0];
				if($name !== $maskName) continue;
				if($doc->section[0] !== $section) continue;
				if($found)
				{
					if($instituteKey && $searchIndex != $count)
					{
						continue;
					}
					if(!$instituteKey)
					{
						if($doc->instituteKey_s != '*' && $doc->instituteKey_s != null)
						continue;
					}
				}
				else if($doc->instituteKey_s != '*')
				{
					continue;
				}
				$label = ($doc->labelFE[0]) ? $doc->labelFE[0] : $name;
				$fieldList = json_decode($doc->doc_store[0])->fields;
				if($fieldList)
				{
					foreach ($fieldList as $f) {
						$obj = new StdClass();
						$obj->id = str_replace(array('[',']'),array('#','##'),$f->linkedFields);
						$obj->label = $f->label;
						$obj->type = $f->fieldType;
						$obj->accordion = $f->accordion;
						if(!in_array($f->accordion,$accordionList))
						{
							$accordionList[] = $f->accordion;
						}
						$obj->range = $arrayRange[$f->linkedFields];
						if($f->fieldType == 'closed')
						{
							$hasFilters = true;
						}
						$fields[] = $obj;
					}
					break;
				}
			}
		}
		$this->_content['accordionList'] = $accordionList;
		$this->_content['label'] = $label;
		$this->_content['fields'] = $fields;
		$this->_content['hasFilters'] = $hasFilters;
		$this->_content['solrSearch'] = __Link::makeUrl($this->getAttribute('searchUrl'));
		$this->_content['autocompleteUrl'] = __Config::get($this->getAttribute('autocompleteUrl'));
	}

	function render()
	{
		parent::render();
	}
	
	function setInstituteKey($instituteKey)
	{
		$institute = org_glizy_objectFactory::createModelIterator('metafad.institutes.models.Model')
					->where('institute_key', $instituteKey)
					->first();
		if($institute)
		{
			__Session::set('instituteKey',$instituteKey);
			$instituteProxy = org_glizy_objectFactory::createObject('metafad.institutes.models.proxy.InstituteProxy');
			$info = $instituteProxy->getInstituteConfigByKey($instituteKey);
			__Session::set('instituteKeySBN',($info->baseindex_key)?:$info->name);
			__Session::set('instituteKeyMetaindice',($info->metaindex_key)?:$info->name);
			org_glizy_helpers_Navigation::gotoUrl(__Link::makeUrl('linkChangeAction',array('action'=>__Request::get('action')),array('mask'=>__Request::get('mask'),'setInstitute'=>$instituteKey)));
		}
	}
}
