<?php
/**
 * This is a sample observer class that echoes out "Hello World!" when
 * the "Auth" observer subject's "setIsAuthenticated()" method is called.
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
 * Please note, any observer classes you write MUST implement the SplObserver
 * interface. The App_Observer_Abstract class already does this for you, and 
 * implements an empty "update()" method. You should override the "update()"
 * method in your custom observer class to fit your needs. For the sake of this 
 * example, we simply echo out "Hello World!" within some "<pre>" tags.
 * 
 * Available observer subjects you can observe:
 * 
 *	- Auth
 *		- getIsAuthenticated() ...Returns TRUE if we are marked as 
 *		authenticated, FALSE if we are not.
 *	- Cart
 *	- Cms
 *	- Service_Paypal
 * 
 * @author AAlbino
 * @copyright Alexventure.com 2011 - GPL v3 or higher. This code is provided to you as-is.
 * @link http://softcoded.com/pdfs/subject_observer.pdf
 */
class Custom_Auth_HelloWorld extends App_Observer_Abstract
{
	public function update( SplSubject $s )
	{
		if ( $s->getIsAuthenticated() )
		{
			echo "<pre>Hello World! (Authenticated)</pre>";
		} else {
			echo "<pre>Hello World! (NOT Authenticated)</pre>";
		}
	}
}