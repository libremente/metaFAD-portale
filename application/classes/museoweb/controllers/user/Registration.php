<?php
class museoweb_controllers_user_Registration extends org_glizy_mvc_core_Command
{
    protected $submit;

    function __construct( $view=NULL, $application=NULL )
    {
        parent::__construct( $view, $application );
        $this->submit = strtolower( __Request::get( 'submit', '' ) ) == 'invia';
    }

    public function execute()
    {
      if(__Request::get('ac'))
      {
        $ar = org_glizy_ObjectFactory::createModel('org.glizy.models.User');
        $ar->find(array('user_confirmCode' => __Request::get('ac')));

        $ar->user_isActive = 1;
        $ar->user_confirmCode = null;
        $ar->save();

        $this->changeAction('registrationactivated');
      }
    }

    public function executeLater()
    {
        if ($this->submit && $this->controller->validate()) {
            $email = org_glizy_Request::get('email', false, '');
            $user = org_glizy_Request::get('username', false, '');
            $ar = org_glizy_ObjectFactory::createModel('org.glizy.models.User');
            if ($ar->find(array('user_email' => $email))) {
                $this->view->validateAddError('L\'email è già presente nel database, usare un\'altra email o richiedere la password');
                return;
            }
            if ($ar->find(array('user_loginId' => $user))) {
                $this->view->validateAddError('Nome utente non disponibile, usare un altro nome utente o richiedere la password');
                return;
            }

            if(org_glizy_Request::get('psw', false, '') !== org_glizy_Request::get('psw_confirm', false, ''))
            {
                $this->view->validateAddError('La password non è stata confermata correttamente. Si prega di compilare il campo correttamente');
                return;
            }

            $record = array();

            //TODO verificare se i campi che ancora non sono stati tolti dal controllo
            //servissero poi effettivamente per l'iscrizione o meno.
            //Per ora non li rimuovo da qui ma alcuni non sono stati inseriti nel form.

            $record['user_firstName']       = org_glizy_Request::get('name', false, '');
            $record['user_lastName']        = org_glizy_Request::get('surname', false, '');
            $record['user_companyName']     = org_glizy_Request::get('company', false, '');
            $record['user_title']           = org_glizy_Request::get('jobtitle', false, '');
            $record['user_address']         = org_glizy_Request::get('address', false, '');
            $record['user_city']            = org_glizy_Request::get('city', false, '');
            $record['user_state']           = org_glizy_Request::get('userstate', false, '');
            $record['user_zip']             = org_glizy_Request::get('zip', false, '');
            $record['user_country']         = org_glizy_Request::get('country', false, '');
            $record['user_email']           = $email;
            $record['user_loginId']         = org_glizy_Request::get('username', false, '');;
            $record['user_password']        = glz_password(org_glizy_Request::get('psw', false, ''));
            $record['user_birthday']        = org_glizy_Request::get('birthDate', false, '');
            $record['user_taxCode']         = org_glizy_Request::get('taxCode', false, '');
            $record['user_fiscalCode']         = org_glizy_Request::get('fiscalCode', false, '');
            $record['user_phone']           = org_glizy_Request::get('phone', false, '');
            $record['user_mobile']          = org_glizy_Request::get('mobile', false, '');
            $record['user_phone2']          = org_glizy_Request::get('phone2', false, '');
            $record['user_www']             = org_glizy_Request::get('web', false, '');
            $record['user_fax']             = org_glizy_Request::get('fax', false, '');
            $record['user_wantNewsletter']  = org_glizy_Request::get('newsletter', false, '')=='1' ? 1 : 0;
            $record['user_isInMailinglist'] = org_glizy_Request::get('mailinglist', false, '')=='1' ? 1 : 0;
            $record['user_dateCreation']    = date('Y-m-d H:i:s');
            $record['user_FK_usergroup_id'] = 4;
            $record['user_FK_site_id'] = 0;
            $record['user_isActive']        = __Config::get( 'USER_DEFAULT_ACTIVE_STATE' );
            $record['user_sbnFlag']         = org_glizy_Request::get('sbnUser', false, '');
            $idCript = glz_password($record['user_email'].$record['user_loginId']);
            $record['user_confirmCode']     = $idCript;

            $ar->save($record);

            //Notifica registrazione via e-mail
            glz_import('org.glizy.helpers.Mail');
            // invia la notifica all'utente
            $user_hello = str_replace('##NOME##', __Request::get('name'),__T('NEW_USER_USER_EMAIL'));
            $user_hello = str_replace('##COGNOME##', __Request::get('surname'),$user_hello);
            $subject    = __T('NEW_USER_EMAIL');
            $activationUrl = "<br/>".__Link::makeUrl('registration')."?ac=$idCript<br/>";
            $body       .= $user_hello.__T('NEW_USER_LINK_EMAIL').$activationUrl.__T('NEW_USER_SALUTI_EMAIL').str_replace('##DATE##',$record['user_dateCreation'],__T('NEW_USER_DATA_EMAIL'));

            $r = org_glizy_helpers_Mail::sendEmail(  array('email' => $record['user_email'], 'name' => $record['user_firstName'].' '.$record['user_lastName']),
            array('email' => org_glizy_Config::get('SMTP_EMAIL'), 'name' => org_glizy_Config::get('SMTP_SENDER')),
            $subject,
            $body);
            $this->changeAction('registrationconfirm');
        }
    }
}
