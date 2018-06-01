<?php
class metafad_controllers_rest_login_Login extends org_glizy_rest_core_CommandRest
{
    function __construct( $application=NULL )
    {
        parent::__construct($application);
    }

    function execute($username, $password)
    {
        $result = array();
        if (!$username || !$password) {
			$result['error'] = __T('Username/password sbagliati');
        } else {
            $authClass = org_glizy_ObjectFactory::createObject(__Config::get('glizy.authentication'));
			try {
                $user = $authClass->login($username, md5($password), false);
                $result = $user;
            } catch(org_glizy_authentication_AuthenticationException $e) {
                $result['error'] = __T('Username/password sbagliati');
            }
        }

        return $result;
    }
}
