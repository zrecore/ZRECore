<?php
/**
 * This is a sample observer plug-in that echoes out "Hello World!" when
 * the "Auth" observer subject's "authenticate()" method is called.
 * 
 * As you can see, the file name must be formatted as 
 *	"[ObserverSubject].[ClassName].php
 * ...while the actual class name within the php file is formatted as
 *	"Custom_[ObserverSubject]_[ClassName]"
 * 
 * In this case, we are targeting the "Auth" observer subject, and our custom 
 * class is simply called "HelloWorld". So, our file would be named
 *	"Auth.HelloWorld.php"
 * ...and the class name within said file would be written 
 *	"Custom_Auth_HelloWorld"
 * 
 * Please note, any observer classes you write should extend the App_Observer_Abstract
 * class, as it already implements the SplObserver interface and calls the 
 * corresponding event handler within your plug-in automatically.
 * 
 * In this example, we simply echo out "Hello World!" and the authentication 
 * status within some "<pre>" tags when the "authenticate()" method is called.
 * 
 * @author The Alex Venture Project
 * @license GPL v3 or higher.
 * @copyright Copyright 2011 The Alex Venture project. This code is provided to you as-is under the terms of the GPL v3 or higher.
 */
class Custom_Auth_HelloWorld extends App_Observer_Abstract
{
	public function authenticate($username, $password, $options = null) {
		
		$auth = Zend_Auth::getInstance();
		
		if ( $auth->hasIdentity() )
		{
			echo "<pre>Hello World! (Authenticated)</pre>";
		} else {
			echo "<pre>Hello World! (NOT Authenticated)</pre>";
		}
	}
}