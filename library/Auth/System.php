<?php
class Auth_System implements SplSubject
{
	private $_name;
	/**
	 *
	 * @var ArrayObject
	 */
	private $_observers = array();
	
	private $_is_authenticated = false;
	
	public function __construct($name) {
		$this->_name = $name;
	}
	
	public function attach(SplObserver $o)
	{
		$in_array = false;
		
		if (count($this->_observers) > 0) {
			
			$elements = array_keys( $this->_observers );
			
			foreach ( $elements as $value )
			{
				if ( $o === $this->_observers[$value] )
				{
					echo "\n(Found duplicate)\n";
					$in_array = true;
					break;
				} else {
					var_dump($this->_observers[$value]);
					var_dump($o);
					var_dump( $o === $this->_observers[$value] );
					echo "\n(No duplicates found)\n";
				}

				if ( !$in_array )
				{
					$this->_observers[] = $o;
				} else {
					throw new Auth_System_Exception( 'Cannot attach duplicate observer class.' );
				}
			}
		} else {
			$this->_observers[] = $o;
		}
		
		return !$in_array;
	}
	
	public function detach(SplObserver $o) {
		$elements = array_keys( $this->_observers, $o );
		$is_detached = false;
		foreach ( $elements as $value )
		{
			if ($o === $this->_observers[$value])
			{
				unset($this->_observers[$value]);
				$is_detached = true;
				
				break;
			}
		}
		return $is_detached;
	}
	
	public function notify()
	{
		$result = 0;
		
		foreach ( $this->_observers as $value )
		{
			$result = $value->update( $this );
		}
	}
	
	public function setIsAuthenticated()
	{
		$this->_is_authenticated = true;
		$this->notify();
	}
	
	public function getIsAuthenticated()
	{
		return $this->_is_authenticated;
	}
	
	public function setIsUnauthenticated()
	{
		$this->_is_authenticated = false;
		$this->notify();
	}
}