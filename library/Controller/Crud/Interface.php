<?php

interface Controller_Crud_Interface
{
	public function createAction();
	public function readAction();
	public function updateAction();
	public function deleteAction();
	
	public function listAllAction();
}