<?php
class metafad_modules_dam_Module
{
    static function registerModule()
    {
        $moduleVO = org_glizy_Modules::getModuleVO();
        $moduleVO->id = 'metafad.modules.dam.Module';
        $moduleVO->name = 'DAM';
        $moduleVO->description = '';
        $moduleVO->version = '1.0.0';
        $moduleVO->classPath = 'metafad.modules.dam';
        $moduleVO->pageType = '';
        $moduleVO->author = 'META srl';
        $moduleVO->authorUrl = 'http://www.gruppometa.it';
        $moduleVO->pluginUrl = '';

        org_glizy_Modules::addModule($moduleVO);
    }
}