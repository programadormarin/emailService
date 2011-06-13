<?php
class SoapService {
	function __construct() {
		$server = new SoapServer('../wsdl/EmailService.wsdl');
		$server->setClass('EmailServiceMessageController');
		$server->handle();
	}
}
