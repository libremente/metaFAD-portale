<?php
class metacms_modules_solr_views_renderers_ProcessCell extends org_glizy_components_render_RenderCellRecordSetList
{
	private $size;

	function __construct(&$application)
	{
		$this->application = $application;
		$this->size = __Config::get('metafad.image.size.search');
	}


    public function renderCell(&$row, $params)
    {
    	if (property_exists($row, 'firstImage')) {
    		$row->firstImage = metafad_modules_dam_Common::replaceUrlWithSize($row->firstImage, $this->size);
    	}
	}
}

