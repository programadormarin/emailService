<?php
// Setup Autoloader (1)
// See :doc:`Configuration <../reference/configuration>` for up to date autoloading details.
	$config = new Doctrine\DBAL\Configuration(); // (2)
	
	// Proxy Configuration (3)
	$config->setProxyDir(__DIR__.'/../lib/proxy/');
	$config->setProxyNamespace('\lib\proxy');
	$config->setAutoGenerateProxyClasses((APPLICATION_ENV == "development"));
	
	// Mapping Configuration (4)
	//$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/confiDg/mappings/xml");
	//$driverImpl = new Doctrine\ORM\Mapping\Driver\XmlDriver(__DIR__."/config/mappings/yml");
	$driverImpl = $config->newDefaultAnnotationDriver(__DIR__."/../application/entities");
	$config->setMetadataDriverImpl($driverImpl);
	
	// Caching Configuration (5)
	if (APPLICATION_ENV == "development") {
	    $cache = new \Doctrine\Common\Cache\ArrayCache();
	} else {
	    $cache = new \Doctrine\Common\Cache\ApcCache();
	}
	$config->setMetadataCacheImpl($cache);
	$config->setQueryCacheImpl($cache);
	
	// database configuration parameters (6)
	$conn = array(
	    'driver' => 'pdo_mysql',
	    'path' => __DIR__ . '/../docs/emailService.sql',
	);
	
	// obtaining the entity manager (7)
	$evm = new Doctrine\Common\EventManager();
	$entityManager = \Doctrine\ORM\EntityManager::create($conn, $config, $evm);
