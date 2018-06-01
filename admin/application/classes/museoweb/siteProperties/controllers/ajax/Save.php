<?php
class museoweb_siteProperties_controllers_ajax_Save extends org_glizy_mvc_core_CommandAjax
{
    // TODO creare un proxy per gestire le proprietà del sito
    public function execute($data)
    {
        $data = json_decode($data);
        $newData = array();
        $newData['title'] = $data->title;
        $newData['address'] = $data->address;
        $newData['copyright'] = $data->copyright;
        $newData['slideShow'] = $data->slideShow;
		$newData['facebook'] = $data->facebook;
		$newData['twitter'] = $data->twitter;
		$newData['instagram'] = $data->instagram;
		$newData['youtube'] = $data->youtube;

        org_glizy_Registry::set(__Config::get('REGISTRY_SITE_PROP').$this->application->getEditingLanguage(), serialize($newData));
        return true;
    }
}
