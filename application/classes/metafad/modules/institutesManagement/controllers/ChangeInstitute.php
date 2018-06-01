<?php
class metafad_modules_institutesManagement_controllers_ChangeInstitute extends org_glizy_mvc_core_Command
{
    //Controller per filtrare su istituto il contenuto del sito
    //aggiunge o rimuove dalla sessione la key dell'istituto
    public function execute($instituteKey,$unsetInstitutes)
    {
      if($instituteKey)
      {
        __Session::set('instituteKey',$instituteKey);
		$instituteProxy = org_glizy_objectFactory::createObject('metafad.institutes.models.proxy.InstituteProxy');
		$info = $instituteProxy->getInstituteConfigByKey($instituteKey);
		__Session::set('instituteKeySBN',($info->baseindex_key)?:$info->name);
		__Session::set('instituteKeyMetaindice',($info->metaindex_key)?:$info->name);
      }
      if($unsetInstitutes)
      {
        __Session::remove('instituteKey');
      }

      if($instituteKey || $unsetInstitutes)
      {
        if(__Request::get('service') == 'true')
        {
          org_glizy_helpers_Navigation::gotoUrl(__Link::makeUrl('services').'?type='.__Request::get('type'));
        }
        else {
          org_glizy_helpers_Navigation::gotoUrl(__Link::makeUrl('link',array('pageId'=>1)));
        }
      }
    }
}
