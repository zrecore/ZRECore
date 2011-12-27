<?php

interface Data_Crud_Interface
{
	public function create(array $data);
	public function read($key);
	public function update(array $data, $where);
	public function delete($where);
	
	public function listAll($columns, $options);
}