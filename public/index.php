<?php
set_include_path(
	get_include_path() . PATH_SEPARATOR
	. '../' . PATH_SEPARATOR
	. '../../action-mapper/' . PATH_SEPARATOR
	. '../../outlet-orm/' . PATH_SEPARATOR
	. '../../display-objects/' . PATH_SEPARATOR
);

require 'application/bootstrap.php';

$app = WebApplication::getInstance();
$app->startSession('emailService');
$app->getActionMapper()->setClassPrefix('EmailService');
$app->getFilterChain()->attachFilter('*', new IndexFilter());
$app->run();