<?php
set_include_path(
	get_include_path() 
	. PATH_SEPARATOR . '../'
	. PATH_SEPARATOR . '/../../../action-mapper/'
	. PATH_SEPARATOR . '/../../../doctrine-orm/'
	. PATH_SEPARATOR . '/../../../display-objects/'
	. PATH_SEPARATOR . '/aplication/'
	. PATH_SEPARATOR . '/aplication/dao/'
	. PATH_SEPARATOR . '/aplication/entities/'
	. PATH_SEPARATOR . '/aplication/util/'
	. PATH_SEPARATOR . '/config/'
);

require_once 'application/dao/PersonDao.php';
require_once 'application/entities/Person.php';
require 'application/bootstrap.php';

require 'application/actions/MainActionController.php';




