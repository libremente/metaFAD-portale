<?php
class metafad_requests_controllers_Request extends org_glizy_mvc_core_Command
{
  public function execute()
  {
    if (!$this->user->isLogged()) {
      //__Session::set( 'glizy.loginUrl', GLZ_HOST.'/'.__Request::get( '__url__' ) );
      $this->changeAction('login');
    }
  }
}
