<?php
class metacms_modules_solr_filters_DefaultQueryBuilder implements metacms_modules_solr_filters_IQueryBuilder
{
    public function build($searchQuery, $search, $facets)
    {
        $searchQuery['q'] = '*'.$search.'*';
        return $searchQuery;
    }
}
