<?php

namespace OTP\Handler\Forms;
use OTP\Objects\FormHandler;
use OTP\Objects\IFormHandler;
use OTP\Traits\Instance;
use ReflectionException;


class ElementorProForm extends FormHandler implements IFormHandler

{

    use Instance;
    protected function __construct()
    {
        $this->_formKey = 'ELEMENTOR_PRO';
        $this->_formName = mo_("Elementor Pro Form <b><span style='color:red'>[Premium Form]</span></b>");
        parent::__construct();
    }

    function handleForm()
    {
        return;
    }

    function handle_failed_verification($user_login,$user_email,$phone_number,$otpType)
    {
        return;
    }

    function handle_post_verification($redirect_to,$user_login,$user_email,$password,$phone_number,$extra_data,$otpType)
    {
        return;
    }

    public function unsetOTPSessionVariables()
    {
        return;
    }

    public function getPhoneNumberSelector($selector)
    {
        return $selector;
    }

    function handleFormOptions()
    {
        return;
    }
}