<?php

class Admin_CatalogController extends Controller_Module_Admin
{
	public function searchJsonAction()
	{
		$reply = null;
		$request = $this->getRequest();
		
		try {
			$em = Zend_Registry::get('Entitymanager');
			$searchTerm = $request->getParam('term');
			
			if ($em instanceof Doctrine\ORM\EntityManager) {
				
				$model = $em->getRepository('Commerce\Item');
				if (!empty($model))
				{
					// Search by term or SKU
					$offset = 0;
					$limit = 30;

					$result = false;
					$query = $em->createQuery('SELECT i FROM Commerce\Item i WHERE i.item_sku LIKE :value OR i.item_name LIKE :value')
						->setParameter('value', '%' . $searchTerm . '%')
						->setFirstResult( $offset )
						->setMaxResults( $limit );
					$result = $query->getResult(Doctrine\ORM\Query::HYDRATE_OBJECT);
					$data = null;
					
					if (count($result) > 0) {
						
						$data = array();
						foreach( $result as $row )
						{
							$data[] = array('value' => $row->getItemSku(), 'label' => $row->getItemName(), 'price' => $row->getPrice(), 'currency' => $row->getCurrency()->getCurrencyCode());
						}
						
						$reply = $data;
					}
				} else {
					throw new Exception('Could not get model repository. Cannot execute search');
				}
			} else {
				// Entity manager not found.
				throw new Exception('No entity manager found. Cannot execute search.');
			}
		} catch (Exception $e) {
			
		}
		
		$this->_helper->json( $reply );
	}
}