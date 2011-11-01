<?php

class Data_Crud_Sql 
	extends Zend_Db_Table 
	implements Data_Crud_Interface
{
	/**
	 * Create a new entry.
	 * @param array $data Column-value pairs
	 * @return mixed The primary key of the row inserted.
	 */
	public function create(array $data) {
//		$data = Data::filterColumns($data, $this);
		return $this->insert($data);
	}

	/**
	 * Fetches rows by primary key.
	 * @param mixed $key The value(s) of the primary keys.
	 * @return Zend_Db_Table_Rowset_Abstract matching the criteria
	 * @throws Zend_Db_Table_Exception
	 */
	public function read($key) {
		return $this->find($key);
	}

	/**
	 * Update an entry.
	 * @param array $data Column-value pairs.
	 * @param array|string $where
	 * @return int The number of rows updated.
	 */
	public function update(array $data, $where = null) {
		$primaryKeys = $this->info('primary');
		if (!is_array($primaryKeys))
			$primaryKeys = array($primaryKeys);

//		$data = Data::filterColumns($data, $this, $primaryKeys);

		if (is_numeric($where)) {
			$where = $this->getAdapter()->quoteInto($primaryKeys[0] . ' = ?', $where);
		}
		
		return parent::update($data, $where);
	}

	/**
	 * Delete an entry
	 * @param mixed The primary id to delete
	 * @return int The number of rows deleted
	 */
	public function delete($id) {
		if (is_numeric($id)) {
			$primaryKeys = $this->info('primary');
			if (!is_array($primaryKeys))
				$primaryKeys = array($primaryKeys);

			$where = $this->getAdapter()->quoteInto($primaryKeys[0] . " = ?", $id);
		} else {
			$where = $id;
		}

		return parent::delete($where);
	}

	/**
	 * List rows by column key/value pairs
	 *
	 * The $columns parameter should contain key/value pairs, representing
	 * the table column, and the value to use in the query (respectively).
	 *
	 * The $options parameter can contain the following options:
	 * <code>
	 * 	$options = array(
	 * 		'order' => 'quantity DESC', // column name, followed by ASC or DESC
	 * 		'limit' => array(
	 * 						'page' => 3, // what page of results to display
	 * 						'rowCount' => 20, // how many rows compose a page
	 * 					) //We could also just specify 'offset' and 'count'
	 * 	);
	 * </code>
	 *
	 * @param array $columns
	 * @param array $options
	 * @return Zend_Db_Table_Rowset_Abstract|array
	 */
	public function listAll($columns = null, $options = null, $asArray = false) {
		$select = self::buildSelect($this, $columns, $options);
		$results = $this->fetchAll($select);

		if ($asArray == true) {
			$results = !empty($results) ? $results->toArray() : null;
		}

		return $results;
	}

	/**
	 * Create a Zend_Db_Select object.
	 * @param Zend_Db_Table $model
	 * @param array|null $columns
	 * @param array|null $options
	 * @return Zend_Db_Select
	 */
	public static function buildSelect($model, $columns = null, $options = null) {
		$select = $model->select();
		if (isset($columns) && count($columns) > 0) {
			foreach ($columns as $col => $val) {
				if (is_array($val) && isset($val['operator']) && isset($val['value'])) {
					if (isset($val['orWhere'])) {
						$select = $select->orWhere($col . ' ' . $val['operator'] . ' ?', $val['value']);
					} else {
						$select = $select->where($col . ' ' . $val['operator'] . ' ?', $val['value']);
					}
				} else {
					$select = $select->where($col . ' = ?', $val);
				}
			}
		}

		if (isset($options))
			$select = self::appendOptions($select, $options);

		return $select;
	}

	/**
	 * Append SQL commands according to the array of options.
	 * @param Zend_Db_Select $select
	 * @param array $options
	 * @return Zend_Db_Select
	 */
	public static function appendOptions($select, $options) {
		// ...Where there any options specific to the from clause?
		if (isset($options)) {
			if (isset($options['setIntegrityCheck']))
				$select = $select->setIntegrityCheck($options['setIntegrityCheck']);
			if (isset($options['distinct'])) {
				$select = $select->distinct($options['distinct']);
			}
			if (isset($options['from'])) {
				$select = $select->from(
					isset($options['from']['name']) ?
						$options['from']['name'] : null, isset($options['from']['cols']) ?
						$options['from']['cols'] : null, isset($options['from']['schema']) ?
						$options['from']['schema'] : null);
			}
		}

		if (isset($options)) {
			foreach ($options as $optionName => $optionValue) {
				switch (trim($optionName)) {

					case 'order':
						if (is_array($optionValue)) {
							foreach ($optionValue as $orderByClause) {
								$select = $select->order($orderByClause);
							}
						} else {
							$select = $select->order($optionValue);
						}
						break;

					case 'limit':
						if (isset($optionValue['page']) && isset($optionValue['rowCount'])) {
							$select = $select->limitPage($optionValue['page'], $optionValue['rowCount']);
						} elseif (isset($optionValue['offset']) && isset($optionValue['count'])) {
							$select = $select->limit($optionValue['count'], $optionValue['offset']);
						} elseif (is_numeric($optionValue)) {
							$select = $select->limit($optionValue);
						}
						break;

					case 'group':
						$spec = isset($optionValue['spec']) ? $optionValue['spec'] : $optionValue;
						$select = $select->group($spec);
						break;
					case 'joinLeft':
						$name = isset($optionValue['name']) ? $optionValue['name'] : null;
						$cond = isset($optionValue['cond']) ? $optionValue['cond'] : null;
						$cols = isset($optionValue['cols']) ? $optionValue['cols'] : null;

						$select = $select->joinLeft($name, $cond, $cols);
						break;
					case 'joinRight':
						$name = isset($optionValue['name']) ? $optionValue['name'] : null;
						$cond = isset($optionValue['cond']) ? $optionValue['cond'] : null;
						$cols = isset($optionValue['cols']) ? $optionValue['cols'] : null;

						$select = $select->joinRight($name, $cond, $cols);
						break;
					case 'join':
						$name = isset($optionValue['name']) ? $optionValue['name'] : null;
						$cond = isset($optionValue['cond']) ? $optionValue['cond'] : null;
						$cols = isset($optionValue['cols']) ? $optionValue['cols'] : null;

						$select = $select->join($name, $cond, $cols);
						break;
					case 'joinUsing':
						$table = isset($optionValue['table']) ? $optionValue['table'] : null;
						$column = isset($optionValue['column']) ? $optionValue['column'] : null;
						$select = $select->joinUsing($table, $column);
						break;
					case 'union':
						$select = $select->union($optionValue);
						break;
				}
			}
		}

		return $select;
	}
	
	public function getModel()
	{
		return $this;
	}
}