<?php
class metafad_modules_collections_controllers_Index extends org_glizy_mvc_core_Command
{
  public function execute()
  {
    $ar = org_glizy_objectFactory::createModelIterator('metafad.modules.collections.models.Model')
          ->orderBy('title')->first();
    org_glizy_helpers_Navigation::gotoUrl(__Link::makeUrl('collections_detail',array('document_id'=>$ar->document_id)));
  }
}
