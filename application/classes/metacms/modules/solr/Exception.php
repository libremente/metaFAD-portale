<?php
class metacms_modules_solr_Exception extends Exception
{
    public static function queryBuilderDontExists($classPath)
    {
        return new self('The class '.$classPath.' don\'t exits.');
    }
    public static function wrongDataProvider($id)
    {
        return new self('Component '.$id.' with wrong dataprovider, must be metacms_modules_solr_views_components_Solr.');
    }
}
