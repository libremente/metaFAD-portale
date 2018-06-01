<?php
class metafad_institutes_views_components_InstituteTitle extends org_glizy_components_Component
{
	function init()
  {
    parent::init();
  }

  function process()
  {
    $instituteKey = __Session::get('instituteKey');
    if($instituteKey) {
      $instituteProxy = org_glizy_objectFactory::createObject('metafad.institutes.models.proxy.InstituteProxy');
      $institute = $instituteProxy->getInstituteVoByKey($instituteKey);
      $this->_content['name'] = $institute->institute_name;

      $im = org_glizy_objectFactory::createModelIterator('metafad.modules.institutesManagement.models.Model');
      $ar = $im->where('institute_index',$institute->institute_id)->first();

      $this->_content['image'] = str_replace("c=1","c=0",json_decode($ar->headerImage)->src);
    }
    else {
      $this->setAttribute('visible',false);
    }
  }
}
