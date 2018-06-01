<?php
class metacms_modules_solr_views_renderers_DetailCell extends org_glizy_components_render_RenderCellRecordSetList
{
	function __construct(&$application)
	{
		$this->application = $application;
	}

    public function renderCell(&$row)
    {
		if($row->model_nxs)
		{
			//Verifico se per il model del record esiste una classe VisibilityFilter
			$model = (is_array($row->model_nxs)) ? $row->model_nxs[0] : $row->model_nxs;
			$visibilityFilterList = (array)json_decode(__Config::get('visibilityFilter.list'));
			if($visibilityFilterList[$model])
			{
				$filterClassName = $visibilityFilterList[$model];
				if(class_exists($filterClassName))
				{
					$filterClass = org_glizy_objectFactory::createObject($filterClassName, $this->application);
					$filteredData = $filterClass->applyFilters(json_decode($row->data_s));
					$row->data_s = json_encode($filteredData);
				}
			}
		}
	}
}
