<?php
class metafad_modules_collections_Module
{
    static function registerModule()
    {
        glz_loadLocale('metafad.modules.collections');

        $moduleVO = org_glizy_Modules::getModuleVO();
        $moduleVO->id = 'Collections';
        $moduleVO->name = __T('Collezioni');
        $moduleVO->description = '';
        $moduleVO->version = '1.0.0';
        $moduleVO->classPath = 'metafad.modules.collections';
        $moduleVO->pageType = 'metafad.modules.collections.views.FrontEnd';
        $moduleVO->author = 'META srl';
        $moduleVO->authorUrl = 'http://www.gruppometa.it';
        $moduleVO->siteMapAdmin = '<glz:Page pageType="metafad.modules.collections.views.Admin" id="Collections" value="{i18n:'.$moduleVO->name.'}" icon="icon-circle-blank" adm:acl="*" />';

        org_glizy_Modules::addModule( $moduleVO );
    }
}
