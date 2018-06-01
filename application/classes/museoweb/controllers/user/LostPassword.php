<?php
class museoweb_controllers_user_LostPassword extends org_glizy_mvc_core_Command
{
    protected $submit;

    function __construct( $view=NULL, $application=NULL )
    {
        parent::__construct( $view, $application );
        $this->submit = strtolower( __Request::get( 'submit', '' ) ) == 'submit';
    }

    public function executeLater()
    {
        if ($this->submit && $this->controller->validate()) {
			$email = __Request::get('email');
            $ar = org_glizy_ObjectFactory::createModel('org.glizy.models.User');
            if (!$ar->find(array('user_email' => $email))) {
                // utente non trovato
                $this->view->validateAddError(__T('MW_LOSTPASSWORD_ERROR'));
                return false;
            }

            // utente trovato
            // genera una nuova password e la invia per email

			$newPassword = md5(date("Y-m-d H:i:s").$ar->user_loginId);

            glz_import('org.glizy.helpers.Mail');
            // invia la notifica all'utente
            $subject    = org_glizy_locale_Locale::get('MW_LOSTPASSWORD_EMAIL_SUBJECT');
            $body       = org_glizy_locale_Locale::get('MW_LOSTPASSWORD_EMAIL_BODY');
            $body       = str_replace('##USER##', $email, $body);
            $body       = str_replace('##HOST##', org_glizy_helpers_Link::makeSimpleLink(GLZ_HOST, GLZ_HOST), $body);
            $body       = str_replace('##PASSWORD##', $newPassword, $body);
            org_glizy_helpers_Mail::sendEmail(  array('email' => org_glizy_Request::get('email', ''), 'name' => $ar->user_firstName.' '.$ar->user_lastName),
                                                    array('email' => org_glizy_Config::get('SMTP_EMAIL'), 'name' => org_glizy_Config::get('SMTP_SENDER')),
                                                    $subject,
                                                    $body);
			$ar->user_password = md5($newPassword);
			$ar->save();
            $this->changeAction('lostPasswordConfirm');
        }
    }
}
