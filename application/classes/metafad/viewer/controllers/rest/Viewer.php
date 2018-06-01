<?php
set_time_limit (0);

class metafad_viewer_controllers_rest_Viewer extends org_glizy_rest_core_CommandRest
{
    function execute()
    {
		$id = __Request::get('id');
		$init = __Request::get('init');
		$type = __Request::get('type');
		$url = __Config::get('metafad.fe.urlViewerService');

        $request = org_glizy_objectFactory::createObject('org.glizy.rest.core.RestRequest', $url.$id.'?init='.$init.'&type='.$type, 'GET', $postBody, 'application/json');
        $request->setTimeout(1000);
        $request->setAcceptType('application/json');
        $request->execute();

        while (ob_get_level()) {
            ob_end_clean();
        }

        // foreach ($request->getResponseHeaders() as $header) {
        //     if (strpos($header, 'Set-Cookie')!==false) continue;
        //     header($header);
        // }

        echo $request->getResponseBody();
        exit;
    }
}
