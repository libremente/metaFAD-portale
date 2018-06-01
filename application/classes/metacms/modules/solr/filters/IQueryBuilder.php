<?php
interface metacms_modules_solr_filters_IQueryBuilder
{
    public function build($searchQuery, $search, $facets);
}