<?php
namespace Commerce;

class OrderTest extends \PHPUnit_Framework_TestCase
{
	public function setUp()
	{
		$this->bootstrap = new \Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
		
		$autoloader = \Zend_Loader_Autoloader::getInstance();
		
		require_once 'Doctrine/Common/ClassLoader.php';
		$doctrineAutoloader = array(new \Doctrine\Common\ClassLoader, 'loadClass');
		$autoloader->pushAutoloader($doctrineAutoloader, 'Doctrine');
		
		$em_load = new \App_Resource_Entitymanager;
		
		$em_load->init();
	}
	
	public function tearDown()
	{
		
	}
	
	public function testLoadOrderModel()
	{
		
		$em = \Zend_Registry::get('Entitymanager');
		$this->assertNotNull($em);
		
		if ($em instanceof \Doctrine\ORM\EntityManager) {
			
			$model = $em->getRepository('Commerce\Order');
			$this->assertNotNull($model);
		} else {
			$this->fail('The registry value for Entitymanager is not an instance of \\Doctrine\\ORM\\EntityManager');
		}
	}
	
	public function testLoadOrderModelEx()
	{
		$em = \Zend_Registry::get('Entitymanager');
		
		if ($em instanceof \Doctrine\ORM\EntityManager)
		{
			
			$model = $em->getRepository('Commerce\Order');
			$order = new Commerce\Order;
			
			
		} else {
			$this->fail();
		}
	}
}