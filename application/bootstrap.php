<?php
date_default_timezone_set('America/Sao_Paulo');

require '../../action-mapper/application/br.com.lcobucci.action-mapper/autoloader/ActionMapperAutoLoader.php';
require '../../display-objects/application/br.com.lcobucci.display-objects/autoloader/DisplayObjectsAutoloader.php';
require 'application/util/autoloader/NamespaceAutoloader.php';
require '../../outlet-orm/application/org.outlet-orm/autoloader/OutletAutoloader.php';


ActionMapperAutoLoader::register();
DisplayObjectsAutoloader::register();
OutletAutoloader::register();

UIComponent::appendHtmlDir(dirname(__FILE__) . '/../templates/');

Outlet::init(dirname(__FILE__) . '/../config/db.xml');