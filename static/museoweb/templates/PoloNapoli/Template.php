<?php
class Template extends org_glizycms_template_fe_views_AbstractTemplate
{
	public function render($application, $view, $templateData)
	{
		parent::render($application, $view, $templateData);
	}

	public function fixTemplateName($view)
	{
		return true;
	}
}
