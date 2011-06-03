<?php
date_default_timezone_set('America/Sao_Paulo');

require 'application/br.com.lcobucci.action-mapper/autoloader/ActionMapperAutoLoader.php';
require 'application/br.com.lcobucci.display-objects/autoloader/DisplayObjectsAutoloader.php';
require 'application/org.outlet-orm/autoloader/OutletAutoloader.php';
require 'application/util/EmailServiceAutoloader.php';

ActionMapperAutoLoader::register();
DisplayObjectsAutoloader::register();
OutletAutoloader::register();
EmailServiceAutoloader::register();

UIComponent::appendHtmlDir(dirname(__FILE__) . '/../templates/');

Outlet::init(dirname(__FILE__) . '/../config/db.xml');