<?php
class metafad_modules_institutesManagement_views_components_InstitutesSection extends org_glizy_components_Component
{
	function init()
  {
    parent::init();
  }

  function process()
  {
    $it = org_glizy_objectFactory::createModelIterator('metafad.modules.institutesManagement.models.Model')
					->orderBy('name','ASC');
		$institutes = array();
		foreach ($it as $ar) {
			$instituteKey = org_glizy_objectFactory::createModelIterator('metafad.institutes.models.Model')
	          ->where('institute_name',$ar->name)->first()->institute_key;
			$institutes[] = array(
												'name'=>$ar->name,
												'text'=>$ar->text,
												'instituteKey'=>$instituteKey, 
												'image'=>str_replace('&w=150&h=150','',$ar->image)
											);
		}
		$this->_content['institutes'] = $institutes;

  }

}
