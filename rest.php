<?php
require_once("core/core.inc.php");

$application = org_glizy_ObjectFactory::createObject('org.glizy.rest.core.Application', 'application');
$application->setInitSiteMap(true);
$application->sitemapFactory(function($forceReload=false) {
    $siteMap = &org_glizy_ObjectFactory::createObject('org.glizycms.core.application.SiteMapDB');
    $siteMap->getSiteArray($forceReload);
    return $siteMap;
});
org_glizy_Paths::add('APPLICATION_TO_ADMIN_CACHE', org_glizy_Paths::get('CACHE'));
$application->run();
