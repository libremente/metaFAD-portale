<?php
class metafad_archive_controllers_ajax_GetTreeFromParent extends org_glizy_mvc_core_CommandAjax
{
	private $getTreeHelper;

	public function execute($id)
	{
		$this->getTreeHelper = org_glizy_objectFactory::createObject('metafad.archive.helpers.GetTreeHelper');

		$children = $this->getTreeHelper->getNodesByParentId($id);

		$childrenArray = array();

		foreach($children as $c) {
			if($c->visibility_s === '0')
			{
				continue;
			}
			$children2 = $this->getTreeHelper->getNodesByParentId($c->id);
			$url = $this->getTreeHelper->getUrl($c->id,$c);

			$titleExtra = $this->getTreeHelper->getTitleExtra($c);

			$atLeastOneVisibileChild = false;
			if($children2)
			{
				foreach ($children2 as $c2) {
					if($c2->visibility_s !== '0')
					{
						$atLeastOneVisibileChild = true;
						break;
					}
				}
			}

			$childrenArray[] = array(
				'id' => $c->id,
				'title' => $titleExtra,
				'folder' => $atLeastOneVisibileChild,
				'url' => $url,
				'lazy' => $atLeastOneVisibileChild, // lazy è true se il nodo ha figli
			);
		}

		$this->directOutput = true;
		return $childrenArray;
	}
}
