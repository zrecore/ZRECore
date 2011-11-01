<?php

class Controller_Crud_Json extends Zend_Controller_Action {

	/**
	 * The internal data interface.
	 * @var Data_Crud_Interface
	 */
	protected $_model = null;
	protected $_primary_id = null;
	protected $_primaryTableInitials = null;
	protected $_presetCreateFields = null;
	protected $_presetUpdateFields = null;
	protected $_presetDeleteFields = null;
	protected $_updateFields = null;
	protected $_stripSlashesFields = null;
	protected $_listAllMethodName = 'listAll';

	protected $_session_id_column = null;
	protected $_session_namespace = null;

	public function preDispatch()
	{
		if (empty($this->_session_id_column)) {
			throw new Exception('The $_session_id_column property must be set before using this controller.');
		}

		if (empty($this->_primary_id)) {
			throw new Exception('The $_primary_id property must be set before using this controller.');
		}

		if (empty($this->_session_namespace)) {
			throw new Exception('A valid $_session_namespace object must be set before using this controller.');
		}

		if (empty($this->_model)) {
			throw new Exception('An instantiated dataset must be assigned to the $_model property before using this controller.');
		}

		if(empty($this->_session_namespace->{$this->_session_id_column})) {
			// Must sign in before accessing this JSON data controller.
			$this->_helper->json(array('result' => 'error', 'data' => 'Access denied.'));
			return;
		}

		parent::preDispatch();
	}

	protected function createAction() {
		try {
			$request = $this->getRequest();

			$params = $request->getParams();

			$session = $this->_session_namespace;
			$id_col_value = $session->{$this->_session_id_column};

			if (!empty($this->_presetCreateFields)) {
				$params = array_merge($params, $this->_presetCreateFields);
			}

			$params = array_merge($params, array($this->_session_id_column => $id_col_value));

			foreach($params as $key => $value) {
				if (empty($value) && $value !== '0') {
					$params[$key] = new Zend_Db_Expr('NULL');
				}
			}
			$id = $this->_model->create($params);

			$reply = array(
				'result' => 'ok',
				'data' => $id
			);
		} catch (Exception $e) {

			$reply = array(
				'result' => 'error',
				'data' => $e->getMessage(),
				'code' => $e->getCode()
			);
		}

		$this->_helper->json($reply);
	}

	protected function readAction() {
		try {
			$request = $this->getRequest();
			$key = $request->getParam('key');

			$session = $this->_session_namespace;
			$id_col_value = $session->{$this->_session_id_column};

			$primary = $this->_model->info('primary');
			$primary = array_pop($primary);
			
			$keys = array($primary => $key, $this->_session_id_column => $id_col_value);
			$record = $this->_model->listAll(
				$keys,
				array(
					'limit' => array(
						'offset' => 0, 'count' => 1
					)
				),
				false
			);

			if ($record->count() > 0) {
				$record = $record->current()->toArray();
			} else {
				$record = null;
			}
			$reply = array(
				'result' => 'ok',
				'data' => $record
			);
		} catch (Exception $e) {
			$reply = array(
				'result' => 'error',
				'data' => $e->getMessage(),
				'code' => $e->getCode()
			);
		}

		$this->_helper->json($reply);
	}

	protected function updateAction() {
		try {
			$request = $this->getRequest();
			$params = $request->getParams();

			$session = $this->_session_namespace;
			$id_col_value = $session->{$this->_session_id_column};

			$fields = array();

			if (!empty($this->_presetUpdateFields)) {
				$params = array_merge($params, $this->_presetUpdateFields);
			}

			$model = $this->_model->getModel();
			
			$primary = $this->_model->info('primary');
			$primary = array_pop($primary);

			if (!empty($this->_updateFields)) {
				$fields = $this->_updateFields;
			} else {


				$cols = $this->_model->info('cols');

				if (isset($cols[$primary]))
					unset($cols[$primary]);

				$fields = $cols;
			}

			$data = array();
			$where = null;
			if (isset($params[$primary])) {
				$where = $model->getAdapter()->quoteInto($primary . ' = ?', $params[$primary]) . ' AND ';
				$where .= $model->getAdapter()->quoteInto($this->_session_id_column . ' = ?', $id_col_value);
			} else {
				throw new Exception('The primary key was not set.');
			}


			foreach ($fields as $field) {
				if (isset($params[$field]) && $field != $primary) {
					$data[$field] = empty($params[$field]) && $params[$field] !== '0' ? new Zend_Db_Expr('NULL') : $params[$field];
				}
			}

			if (empty($data))
				throw new Exception('No data was submitted.');

			$data[$this->_session_id_column] = $id_col_value;
			$id = $this->_model->update($data, $where);

			$reply = array(
				'result' => 'ok',
				'data' => $id
			);
		} catch (Exception $e) {
			$reply = array(
				'result' => 'error',
				'data' => $e->getMessage(),
				'code' => $e->getCode()
			);
		}

		$this->_helper->json($reply);
	}

	protected function deleteAction() {
		try {
			$request = $this->getRequest();

			$primary = $this->_model->info('primary');
			$primary = array_pop($primary);

			$session = $this->_session_namespace;
			$id_col_value = $session->{$this->_session_id_column};

			$key = $request->getParam($primary, null);
			$affectedRows = 0;

			if (!empty($key)) {
				$db = Zend_Db_Table::getDefaultAdapter();

				if (!empty($this->_presetDeleteFields) && is_array($this->_presetDeleteFields)) {
					$columns = (array) $this->_presetDeleteFields;
					$columns[$primary] = $key;
					$columns[$this->_session_id_column] = $id_col_value;

					$options = array(
						'limit' => array(
							'offset' => 0,
							'count' => 1
						)
					);

					$record = $this->_model->listAll($columns, $options, false);

					if ($record->count() > 0) {
						$affectedRows = $record->current()->delete();
					}
				} else {

					$where = $db->quoteInto($primary . ' = ?', $key);
					$where .= ' AND ' . $db->quoteInto($this->_session_id_column . ' = ?', $id_col_value);

					$affectedRows = $this->_model->delete($where);
				}
				$reply = array(
					'result' => 'ok',
					'data' => $affectedRows,
					$primary => $key
				);
			} else {
				throw new Exception('Invalid primary key provided.');
			}
		} catch (Exception $e) {
			$reply = array(
				'result' => 'error',
				'data' => $e->getMessage(),
				'code' => $e->getCode()
			);
		}

		$this->_helper->json($reply);
	}

	protected function listAction() {
		$reply = null;
		try {

			$request = $this->getRequest();
			$columns = null;

			$dataset = $this->_model;
			$primary = $dataset->info('primary');
			$primary = array_pop($primary);

			$tableName = $dataset->getModel()->info('name');

			$tbl = (empty($this->_primaryTableInitials) ? $tableName[0] : $this->_primaryTableInitials);

			$session = $this->_session_namespace;
			$id_col_value = $session->{$this->_session_id_column};

			$sort = $request->getParam('sort', $primary);
			$order = $request->getParam('order', 'ASC');
			
			$page = $request->getParam('pageIndex', 1);
			$rowCount = $request->getParam('rowCount', 5);

			$cols = $dataset->info('cols');

			foreach ($cols as $c) {
				$param = $request->getParam($c, null);
				if (!empty($param)) {
					if ($param == 'NULL' || $param == 'NOT NULL') {
						if ($param == 'NULL') {
							$columns[$tbl . '.' . $c] = array('operator' => 'IS', 'value' => new Zend_Db_Expr('NULL'));
						} else {
							$columns[$tbl . '.' . $c] = array('operator' => 'IS NOT ', 'value' => new Zend_Db_Expr('NULL'));
						}
					} else {
						$columns[$tbl . '.' . $c] = $param;
					}
				}
			}

			$columns[$this->_primary_id] = $id_col_value;

			$options = array(
				'limit' => array(
					'page' => $page,
					'rowCount' => $rowCount
				)
			);
			
			if ( is_array($sort) && is_array($order) && count($sort) == count($order) ) {
				for($i = 0; $i < count($sort); $i++) {
					$s = $sort[$i];
					$o = $order[$i];

					$options['order'][] = $s . ' ' . $o;
				}
			} else {
				$options['order'] = $sort . ' ' . $order;
			}

			$counter = $dataset->{$this->_listAllMethodName}($columns, array(
			'from' => array(
				'name' => array($tbl => $tableName),
				'cols' => array(new Zend_Db_Expr('COUNT(*)'))
			)
			), false);

			$totalRecords = !empty($counter) ? $counter->current()->offsetGet('COUNT(*)') : 0;




			$records = $dataset->{$this->_listAllMethodName}($columns, $options);
			if (empty($records))
				$records = null;

			// ...Run strip slashes on requested fields, if any.
			if (!empty($records) && !empty($this->_stripSlashesFields)) {
				foreach ($records as $i => $r) {

					foreach ($r as $key => $value) {
						if (in_array($key, $this->_stripSlashesFields)) {
							$records[$i][$key] = stripslashes($records[$i][$key]);
						}
					}
				}
			}
			if ($records instanceof Zend_Db_Table_Rowset_Abstract) $records = $records->toArray();
			
			$reply = array(
				'result' => 'ok',
				'totalRows' => $totalRecords,
				'data' => $records
			);
		} catch (Exception $e) {
			$reply = array(
				'result' => 'error',
				'data' => $e->getMessage(),
				'code' => $e->getCode(),
				'stacktrace' => $e->getTraceAsString()
			);
		}

		$this->_helper->json($reply);
	}

}