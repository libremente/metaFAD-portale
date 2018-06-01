<?php
class metafad_modules_institutesManagement_Module
{
    static function registerModule()
    {
        glz_loadLocale('metafad.modules.institutesManagement');

        $moduleVO = org_glizy_Modules::getModuleVO();
        $moduleVO->id = 'institutesManagement';
        $moduleVO->name = __T('Gestione Istituti');
        $moduleVO->description = '';
        $moduleVO->version = '1.0.0';
        $moduleVO->classPath = 'metafad.modules.institutesManagement';
        $moduleVO->author = 'META srl';
        $moduleVO->authorUrl = 'http://www.gruppometa.it';
        $moduleVO->siteMapAdmin = '<glz:Page pageType="metafad.modules.institutesManagement.views.Admin" id="institutesManagement" value="{i18n:'.$moduleVO->name.'}" icon="icon-circle-blank" adm:acl="*" />';

		if(__Config::get('metafad.fe.hasInstitutes'))
		{
        	org_glizy_Modules::addModule( $moduleVO );
		}
    }
}
