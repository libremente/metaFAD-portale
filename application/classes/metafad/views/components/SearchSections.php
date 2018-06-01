<?php
class metafad_views_components_SearchSections extends org_glizy_components_Component
{
	function init()
	{
		parent::init();
	}

	function process()
	{
		$this->_content['searchs'] = array();
		
    	if(__Config::get('metafad.fe.hasInstitutes') == true)
		{
			$instituteKey = __Session::get('instituteKey');
			//TODO rimuovere da session e tenere in url
			if($instituteKey)
			{
				$instituteProxy = org_glizy_ObjectFactory::createObject('metafad.institutes.models.proxy.InstituteProxy');
				$instituteConfig = $instituteProxy->getInstituteConfigByKey($instituteKey);
				$this->getSearchByConfigForInstitute($instituteConfig);
			}
			else
			{
				$this->getSearchByConfig();
			}
		}
		else
		{
			$this->getSearchByConfig();
		}
	}

	function getSearchByConfig()
	{
		$searchs = json_decode(__Config::get('metafad.fe.activeSearch'));
		foreach ($searchs as $k => $v) {
			if($v)
			{
				$this->_content['searchs'][] = $k;
			}
		}
	}

	function getSearchByConfigForInstitute($instituteConfig)
	{
		$searchs = json_decode(__Config::get('metafad.fe.activeSearch'));
		foreach ($searchs as $k => $v)
		{
			if($v && $instituteConfig->$k == 'true')
			{
				$this->_content['searchs'][] = $k;
			}
		}
	}
}
