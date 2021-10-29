<?php

use OTP\Handler\Forms\WooCommerceFrontendManagerForm;

$handler 						        = WooCommerceFrontendManagerForm::instance();
$form_name                              = $handler->getFormName();
include MOV_DIR . 'views/forms/WooCommerceFrontendManagerForm.php';