<?php

class App_Subject_Abstract implements SplSubject
{
	/**
	 *
	 * @var array The array of observer objects.
	 */
	private $_observers = array();
	
	public function attach( SplObserver $o )
	{
		$in_array = false;
		
		if (!empty($this->_observers)) {
			
			$elements = array_keys( $this->_observers );
			
			foreach ( $elements as $value )
			{
				if ( $o === $this->_observers[$value] )
				{
					$in_array = true;
					break;
				}

				if ( !$in_array )
				{
					$this->_observers[] = $o;
				} else {
					throw new App_Subject_Exception( 'Cannot attach duplicate observer class.' );
				}
			}
		} else {
			$this->_observers[] = $o;
		}
		
		return !$in_array;
	}
	
	public function detach( SplObserver $o ) {
		
		$is_detached = false;
		
		if ( !empty($this->_observers) ) {
			foreach ( $elements as $value )
			{
				if ($o === $this->_observers[$value])
				{
					unset($this->_observers[$value]);
					$is_detached = true;

					break;
				}
			}
		} else {
			$is_detached = true;
		}
		return $is_detached;
	}
	
	public function notify()
	{
		$result = 0;
		
		foreach ( $this->_observers as $value )
		{
			$result += $value->update( $this );
		}
		return $result;
	}
}