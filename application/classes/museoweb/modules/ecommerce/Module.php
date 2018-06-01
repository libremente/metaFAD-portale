<?php
class museoweb_modules_ecommerce_Module
{
    private static $helper = null;

    static function registerModule()
    {
        $moduleVO = org_glizy_Modules::getModuleVO();
        $moduleVO->id = 'museoweb_ecommerce';
        $moduleVO->name = __T('museoweb.modules.ecommerce.views.FrontEnd');
        $moduleVO->description = 'Modulo per l\'ecommerce';
        $moduleVO->version = '1.0.0';
        $moduleVO->classPath = 'museoweb.modules.ecommerce';
        $moduleVO->pageType = 'museoweb.modules.ecommerce.views.FrontEnd';
        $moduleVO->author = 'META srl';
        $moduleVO->authorUrl = 'http://www.gruppometa.it';
        $moduleVO->pluginUrl = 'http://www.museowebcms.it';
        $moduleVO->canDuplicated = false;

        org_glizy_Modules::addModule( $moduleVO );

        $application = org_glizy_ObjectValues::get('org.glizy', 'application');
        if ($application && !$application->isAdmin()) {
            self::$helper = org_glizy_ObjectFactory::createObject('museoweb.modules.ecommerce.Helper');
        }
    }
}
