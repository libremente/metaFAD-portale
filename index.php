<?php
if(file_exists('vendor/autoload.php'))
{
	require_once('vendor/autoload.php');
}
require_once("core/core.inc.php");

$application = org_glizy_ObjectFactory::createObject('org.glizycms.core.application.Application', 'application');
$application->run();
