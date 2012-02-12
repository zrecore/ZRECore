<?php
/**
 * This is the Doctrine CLI utility bootstrap.
 */
require_once 'Doctrine/Common/ClassLoader.php';
require_once 'Zend/Loader/Autoloader.php';

$cache = new \Doctrine\Common\Cache\ArrayCache;
$config = new \Doctrine\ORM\Configuration;
$config->setMetadataCacheImpl($cache);

$classLoaderAuth = new \Doctrine\Common\ClassLoader('Auth', __DIR__ . '/application/models');
$classLoaderCommerce = new \Doctrine\Common\ClassLoader('Commerce', __DIR__ . '/application/models');
$classLoaderContent = new \Doctrine\Common\ClassLoader('Content', __DIR__ . '/application/models');

$classLoaderAuth->register();
$classLoaderCommerce->register();
$classLoaderContent->register();

$driverImpl = $config->newDefaultAnnotationDriver(__DIR__ . '/application/models');
$config->setMetadataDriverImpl($driverImpl);

$config->setQueryCacheImpl($cache);
$config->setProxyDir( __DIR__ . '/application/proxies' );
$config->setProxyNamespace( 'Proxies' );

$config->setAutoGenerateProxyClasses(true);

/**
 * @todo Configure these values to reflect those of your MySQL server.
 */
$connectionOptions = array(
	'driver' => 'pdo_mysql',
	'path' => '/var/run/mysqld/mysql.sock',
	'dbname' => 'zrecore',
	'user' => 'root',
	'password' => 'password'
);

$em = \Doctrine\ORM\EntityManager::create($connectionOptions, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));
