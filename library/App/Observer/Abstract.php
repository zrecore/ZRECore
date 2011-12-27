<?php

class App_Observer_Abstract implements SplObserver
{
	public function update(SplSubject $s)
	{
		$args = func_get_arg(1);
		
		$method_name = @$args[0];
		array_shift($args);
		
		$result = null;
		if (!empty($method_name) && method_exists($this, $method_name)) 
		{
			$result = call_user_func_array(array($this, $method_name), isset($args[0]) ? $args : null);
		}
		
		return $result;
	}
}