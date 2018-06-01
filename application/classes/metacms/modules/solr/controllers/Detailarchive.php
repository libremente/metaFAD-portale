<?php
class metacms_modules_solr_controllers_Detailarchive extends org_glizy_mvc_core_Command
{
  function execute()
  {
    $this->setComponentsAttribute('id','value',__Request::get('id'));
  }
}
