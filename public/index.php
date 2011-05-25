<?php
set_include_path(
	get_include_path()
	. PATH_SEPARATOR . __DIR__ . '/../'
	. PATH_SEPARATOR . __DIR__ . '/../../action-mapper/'
	. PATH_SEPARATOR . __DIR__ . '/../../doctrine-orm/'
	. PATH_SEPARATOR . __DIR__ . '/../../display-objects/'
);

require 'application/util/autoloader/NamespaceAutoloader.php';

use util\autoloader\NamespaceAutoloader;
use entities\Person;

NamespaceAutoloader::register();

use Doctrine\ORM\Configuration;

$conf = new Configuration();

$p = new Person();

$p->setLogin('hermen');
$p->setName('hermen');

$conf->
