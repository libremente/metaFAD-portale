<?php
class metacms_modules_solr_controllers_ajax_Autocomplete extends org_glizy_mvc_core_Command
{
  function execute($value,$fieldName,$type,$autocompleteUrl)
  {
    $url = $autocompleteUrl . '?';
    $url .= 'id='.urlencode($fieldName).'&prefix='.urlencode($value);

    $content = json_decode(file_get_contents($url));
    $values = $content->response->facetsFields[0]->values;
    $result = '<option value="">Seleziona</option>';
    if($type == 'open')
    {
      $result .= '<option value="'.$value.'">'.$value.'</option>';
    }
    if($values)
    {
      foreach ($values as $v) {
        $result .= '<option value="'.$v->name.'">'.$v->name.'</option>';
      }
    }
    return $result;
  }
}
