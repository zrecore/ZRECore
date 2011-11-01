<?php

interface Data_Crud_Interface
{
	public function create($data);
	public function read($key);
	public function update($data, $where);
	public function delete($where);
	
	public function listAll($columns, $options);
}