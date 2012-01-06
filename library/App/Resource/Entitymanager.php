<?php

class App_Resource_Entitymanager extends Zend_Application_Resource_ResourceAbstract {

	// Default array of options that can be overridden using the application.ini file.
	// e.g., resources.entityManager.autoGenerateProxyClasses = false
	protected $_options = array(
		'connection' => array(
			'driver' => 'pdo_sqlite',
			'path' => null
		),
		'modelDir' => '/models',
		'proxyDir' => '/proxies',
		'proxyNamespace' => 'Proxies',
		'autoGenerateProxyClasses' => true
	);

	public function init() {
		$options = $this->getOptions();
		
		// Set up Doctrine
		$cache = null;
		if (!empty($options['driver']))
		{
			switch ($options['driver'])
			{
				default:
					$cache = new \Doctrine\Common\Cache\ApcCache;
					break;
			}
			
		} else {
			$cache = new \Doctrine\Common\Cache\ArrayCache;
		}
		
		$config = new \Doctrine\ORM\Configuration;
		$config->setMetadataCacheImpl($cache);
		
		$autoloader = Zend_Loader_Autoloader::getInstance();
		
		$classLoaderAuth = new \Doctrine\Common\ClassLoader('Auth', !empty($options['modelDir']) ? $options['modelDir'] : APPLICATION_PATH . '/models', 'loadClass');
		
		$autoloader->pushAutoloader(array($classLoaderAuth, 'loadClass'), 'Auth');
		
		$driverImpl = $config->newDefaultAnnotationDriver(!empty($options['modelDir']) ? $options['modelDir'] : APPLICATION_PATH . '/models');
		$config->setMetadataDriverImpl($driverImpl);
		
		$config->setQueryCacheImpl($cache);
		$config->setProxyDir(!empty($options['proxyDir']) ? $options['proxyDir'] : APPLICATION_PATH . '/proxies');
		$config->setProxyNamespace( !empty($options['proxyNamespace']) ? $options['proxyNamespace'] : 'Proxies');
		
		if (APPLICATION_ENV == 'production')
		{
			$config->setAutoGenerateProxyClasses(false);
		} else {
			$config->setAutoGenerateProxyClasses(true);
		}
		
		$connectionOptions = array(
			'driver' =>  !empty($options['connection']['driver']) ? $options['connection']['driver'] : 'pdo_sqlite',
			'path' => !empty($options['connection']['path']) ? $options['connection']['path'] : APPLICATION_PATH . '/../data/sqlite/data.sq3'
		);
		
		$em = \Doctrine\ORM\EntityManager::create($options['connection'], $config);
		Zend_Registry::set('Entitymanager', $em);
		return $em;
	}

}