<?php
ob_start();
setlocale(LC_TIME, "it_IT", "it", "it_IT.utf8");

require_once("../core/core.inc.php");

$application = org_glizy_ObjectFactory::createObject('org.glizycms.core.application.AdminApplication', 'application', '../', '../application/');
$application->useXmlSiteMap = true;
$application->setLanguage('it');
$application->login();
$user = $application->getCurrentUser();
if (!$user->isLogged()) {
   header("HTTP/1.0 403 Forbidden");
   exit;
}
$application->runAjax();
