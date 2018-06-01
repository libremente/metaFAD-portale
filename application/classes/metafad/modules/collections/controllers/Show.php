<?php
class metafad_modules_collections_controllers_Show extends org_glizy_mvc_core_Command
{
  public function execute()
  {
    $id = __Request::get('document_id');
    $ar = org_glizy_objectFactory::createModel('metafad.modules.collections.models.Model');
    $ar->load($id);

    $type = $ar->type;
    if($type == 'ICCD')
    {
      //solrUrl="metacms.iccd.url" solrFieldUrl="metacms.iccd.field.url"
      $c = $this->view->getComponentById('recordSetListIccd');
      $c->setAttribute('enabled','true');
    }
    else if($type == 'SBN')
    {
      $c = $this->view->getComponentById('collectionResult');
      $c->setAttribute('solrUrl','metacms.solr.url');
      $c->setAttribute('solrFieldUrl','metacms.solr.field.url');

      $r = $this->view->getComponentById('recordSetListSbn');
      $r->setAttribute('enabled','true');
    }
    else if($type == 'archive')
    {
      $c = $this->view->getComponentById('collectionResult');
      $c->setAttribute('solrUrl','metacms.archive-ud.url');
      $c->setAttribute('solrFieldUrl','metacms.archive-ud.field.url');

      $r = $this->view->getComponentById('recordSetListArchive');
      $r->setAttribute('enabled','true');
    }
    else if($type == 'metaindice')
    {
      $c = $this->view->getComponentById('collectionResult');
      $c->setAttribute('solrUrl','metacms.metaindice.url');
      $c->setAttribute('solrFieldUrl','metacms.metaindice.field.url');

      $r = $this->view->getComponentById('recordSetListMetaindice');
      $r->setAttribute('enabled','true');
    }

    //Leggo la query
    $arr = parse_url($ar->query);
    //Estraggo i parametri
    parse_str($arr['query'],$parameters);
    //Setto la request per simulare una ricerca
    foreach ($parameters as $key => $value) {
      __Request::set($key,$value);
    }
    if(!__Request::get('search'))
    {
      __Request::set('search','*');
    }
  }
}
