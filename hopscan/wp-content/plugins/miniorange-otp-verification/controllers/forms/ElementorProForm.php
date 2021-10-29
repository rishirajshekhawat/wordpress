<?php

use OTP\Handler\Forms\ElementorProForm;

$handler 						        = ElementorProForm::instance();
$form_name                              = $handler->getFormName();
include MOV_DIR . 'views/forms/ElementorProForm.php';