<?php
class museoweb_controllers_cms_Redirect extends org_glizy_mvc_core_Command
{
    public function execute($module, $id)
    {
        if($module && $id)
        {
            $types = array(
                'CA' => 'archive_detail',
                'SP' => 'archive_detail_au',
                'SC' => 'archive_detail_au'
            );

            if(array_key_exists('CA',$types))
            {
                org_glizy_helpers_Navigation::gotoUrl(__Link::makeUrl($types[$module], array('id' => $id)));
            }
        }

        exit;
    }

}