<?php
class metafad_modules_collections_views_components_CollectionPreview extends org_glizy_components_Component
{
	function init()
  {
      parent::init();
  }

  function process()
  {
    $ar = org_glizy_objectFactory::createModel('metafad.modules.collections.models.Model');
		if(__Request::get('document_id'))
		{
			$ar->load(__Request::get('document_id'));
		}
		$text = $ar->text;
    $this->_content['title'] = $ar->title;
		$this->_content['text'] = $text;
		$this->_content['shortText'] = (strlen($text) > 500) ? substr($text,0,500).'...' : null ;

  }

}
