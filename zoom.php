<?php
if (!defined('GLZ_LOADED'))
{
  require_once('core/core.inc.php');
  $application = org_glizy_ObjectFactory::createObject('org.glizycms.core.application.Application', 'application');
  org_glizy_Paths::addClassSearchPath('admin/application/classes/');
  if (file_exists(org_glizy_Paths::get('APPLICATION_STARTUP'))) {
    // if the startup folder is defined all files are included
    glz_require_once_dir(org_glizy_Paths::get('APPLICATION_STARTUP'));
  }
  glz_defineBaseHost();
}

$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
if(__Config::get('metafad.url'))
{
    $id = str_replace(__Config::get('metafad.url'),__Config::get('metafad.base'),$id);
}
if (is_null($id)) exit;

$md5 = md5($id);
$cacheFolder = glz_nestedCacheFile($md5);
$zoomFile = $cacheFolder.$md5.'.xml';

if ( !file_exists( $zoomFile ) ) {
  glz_import('org.glizycms.mediaArchive.MediaManager');
  set_time_limit(0);

  $fileUrl = $id.'&w='.__Request::get('w');

  $zoomSize = __Config::get('metafad.image.size.zoom');
  if ($zoomSize && $zoomSize!='original') {
    $fileUrl = str_replace('meta_dam/', 'meta_dam/admin/rest/dam/', metafad_modules_dam_Common::replaceUrlWithSize($fileUrl, $zoomSize));
  }
  $tempFile = __Paths::get('CACHE').md5($fileUrl);

  $r = @copy($fileUrl, $tempFile);
  if (!$r) {
    // pezza perché alcuni media sono nel dam di produzione
    copy(str_replace('meta_dam_dev/', 'meta_dam/', $fileUrl), $tempFile);
  }

  $loader = new DeepzoomLoader();
  if (__Config::get('glizy.media.imageMagick')==true) {
    $adapter = new Deepzoom\ImageAdapter\ImagickWatermark(false);
  } else {
    $adapter = new Deepzoom\ImageAdapter\GdThumbWatermark(false);
  }
  $file = new Deepzoom\StreamWrapper\File;
  $descriptor = new Deepzoom\Descriptor($file);
  $converter = new Deepzoom\ImageCreator($file, $descriptor, $adapter);
  $converter->create( realpath( $tempFile ), $zoomFile );
  @unlink($tempFile);
}
echo  GLZ_HOST.ltrim($zoomFile, '.');

class DeepzoomLoader
{
    public function __construct()
    {
       spl_autoload_register(array($this, 'loadClass'));
       set_include_path(realpath('application/libs/openzoom/Oz/vendor/zend/lib').PATH_SEPARATOR.get_include_path());
    }

    public function loadClass($className)
    {
        if ( strpos($className, '__Config') >0) {
            return true;
        }
        if (strpos($className, 'Deepzoom') === 0) {
            require 'application/libs/openzoom/Oz/'.str_replace('\\','/', $className).'.php';
        } else if (strpos($className, 'Zend_') === 0) {
          require 'application/libs/openzoom/Oz/vendor/zend/lib/Zend/'.$className.'.php';
        }
    }

}

function glz_nestedCacheFile($filename)
{
    $folder = __Paths::get('CACHE').glz_nestedCacheFolder($filename, 2);
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    return $folder;
}

function glz_nestedCacheFolder($filename, $nestLevel, $root=""){
    $nestLevel = max(intval($nestLevel), 0);

    if ($nestLevel>0) {
        $hash = md5($filename);
        for ($i=0 ; $i<$nestLevel; $i++) {
            $root = $root . 'cache_' . substr($hash, 0, $i + 1) . '/';
        }
    }

    return $root;
}
