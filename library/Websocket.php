<?php
/**
 * Websocket class, as per the W3C HTML5 Websockets specification.
 * @todo Last Point Of Reference: http://dev.w3.org/html5/websockets/#feedback-from-the-protocol
 * 
 * @link http://dev.w3.org/html5/websockets/#network-intro
 */
class Websocket
{
	/**
	 * DOMString
	 * @todo The url attribute must return the result of resolving the URL 
	 * that was passed to the constructor. (It doesn't matter what it is 
	 * resolved relative to, since we already know it is an absolute URL.)
	 * 
	 * @var string
	 */
	private $url;
	
	
	// --- Ready State ---
	/**
	 * Unsigned short
	 */
	const WEBSOCKET_CONNECTING = 0;
	/**
	 * Unsigned short
	 */
	const WEBSOCKET_OPEN = 1;
	/**
	 * Unsigned short
	 */
	const WEBSOCKET_CLOSING = 2;
	/**
	 * Unsigned short
	 */
	const WEBSOCKET_CLOSED = 3;
	
	/**
	 * Unsigned short
	 * 
	 * @todo The readyState attribute represents the state of the connection. 
	 * It can have the following values:
	 * 
	 *	- CONNECTING (numeric value 0) - The connection has not yet been 
	 *	established.
	 * 
	 *  - OPEN (numeric value 1) - The WebSocket connection is established and 
	 *	communication is possible.
	 * 
	 *  - CLOSING (numeric value 2) - The connection is going through the 
	 *	closing handshake.
	 * 
	 *	- CLOSED (numeric value 3) - The connection has been closed or could 
	 *	not be opened.
	 */
	private $readyState;
	
	/**
	 * Unsigned long
	 * 
	 * @todo The bufferedAmount attribute must return the number of bytes of 
	 * application data (UTF-8 text and binary data) that have been queued 
	 * using send() but that, as of the last time the event loop started 
	 * executing a task, had not yet been transmitted to the network. 
	 * (This thus includes any text sent during the execution of the current 
	 * task, regardless of whether the user agent is able to transmit text 
	 * asynchronously with script execution.) This does not include framing 
	 * overhead incurred by the protocol, or buffering done by the operating 
	 * system or network hardware. If the connection is closed, this 
	 * attribute's value will only increase with each call to the send() 
	 * method (the number does not reset to zero once the connection closes).
	 * See example at link.
	 * 
	 * @link http://dev.w3.org/html5/websockets/#dom-websocket-bufferedamount
	 */
	private $bufferAmount;
	
	// --- Networking ---
	/**
	 * DOMString
	 * @todo The extensions attribute must initially return the empty string. 
	 * After the WebSocket connection is established, its value might change, 
	 * as defined below. 
	 * 
	 *	NOTE: The extensions attribute returns the extensions selected by the 
	 *	server, if any. (Currently this will only ever be the empty string.)
	 * 
	 * Change the extensions attribute's value to the extensions in use, if is not the null value.
	 * 
	 * @var string
	 */
	private $extensions = '';
	/**
	 * DOMString
	 * @todo The protocol attribute must initially return the empty string. 
	 * After the WebSocket connection is established, its value might change, 
	 * as defined below.
	 * 
	 *	NOTE: The protocol attribute returns the subprotocol selected by the 
	 *	server, if any. It can be used in conjunction with the array form of the 
	 *	constructor's second argument to perform subprotocol negotiation.
	 * 
	 * Change the protocol attribute's value to the subprotocol in use, if is not the null value
	 * @var string
	 */
	private $protocol = '';
	
	// --- Messaging ---
	/**
	 * DOMString
	 * @var string
	 */
	public $binaryType;
	
	// --- Constructor ---
	/**
	 * Constructor.
	 * @todo This constructor must be visible when the script's global object is either a Window object or an object implementing the WorkerUtils interface.
	 * 
	 * @param string $url Specifies the URL to which to connect
	 * @param mixed $protocols Can be a string or an array of strings. If it's an array, each string in the array is a sub-protocol name.
	 */
	public function __construct( $url, $protocols = null )
	{
		if (empty($protocols)) $protocols = array();
		if (is_string($protocols)) $protocols = array($protocols);
		
		// The connection will only be established if the server reports that it 
		// has selected one of these sub-protocols.The subprotocol names must 
		// all be strings that match the requirements for elements that comprise 
		// the value of Sec-WebSocket-Protocol header fields as defined by the 
		// WebSocket protocol specification.
		
		$urlComponents = $this->_parseWebsocketUrl($url);
		
		/**
		 * @todo If protocols is absent, let protocols be an empty array.
		 * 
		 * Otherwise, if protocols is present and a string, let protocols 
		 * instead be an array consisting of just that string.
		 */
		
		/**
		 * @todo If any of the values in protocols occur more than once or 
		 * otherwise fail to match the requirements for elements that comprise 
		 * the value of Sec-WebSocket-Protocol header fields as defined by the 
		 * WebSocket protocol specification, then throw a SyntaxError exception 
		 * and abort these steps.
		 */
		
		/**
		 * @todo Let origin be the ASCII serialization of the origin of the 
		 * entry script, converted to ASCII lowercase.
		 */
		
		/**
		 * @todo Return a new WebSocket object, and continue these steps in the 
		 * background (without blocking scripts).
		 */
		
		/**
		 * @todo Establish a WebSocket connection given the set (host, port, 
		 * resource name, secure), along with the protocols list, an empty list 
		 * for the extensions, and origin. The headers to send appropriate 
		 * cookies must be a Cookie header whose value is the cookie-string 
		 * computed from the user's cookie store and the URL url; for these 
		 * purposes this is not a "non-HTTP" API.
		 * 
		 * When the user agent validates the server's response during the 
		 * "establish a WebSocket connection" algorithm, if the status code 
		 * received from the server is not 101 (e.g. it is a redirect), the 
		 * user agent must fail the websocket connection.
		 * 
		 * WARNING: Following HTTP procedures here could introduce serious 
		 * security problems in a Web browser context. For example, consider a 
		 * host with a WebSocket server at one path and an open HTTP redirector 
		 * at another. Suddenly, any script that can be given a particular 
		 * WebSocket URL can be tricked into communicating to (and potentially 
		 * sharing secrets with) any host on the Internet, even if the script 
		 * checks that the URL has the right hostname.
		 * 
		 * NOTE: If the establish a WebSocket connection algorithm fails, it 
		 * triggers the fail the WebSocket connection algorithm, which then 
		 * invokes the close the WebSocket connection algorithm, which then 
		 * establishes that the WebSocket connection is closed, which fires the 
		 * close event as described below.
		 * 
		 * @link http://dev.w3.org/html5/websockets/#closeWebSocket
		 */
		
		/**
		 * When the object is created its readyState must be set to 
		 * CONNECTING (0).
		 */
		$this->readyState = self::WEBSOCKET_CONNECTING;
		
		/**
		 * @todo When a WebSocket object is created, its binaryType IDL 
		 * attribute must be set to the string "blob". On getting, it must 
		 * return the last value it was set to. On setting, if the new value is 
		 * either the string "blob" or the string "arraybuffer", then set the 
		 * IDL attribute to this new value. Otherwise, throw a SyntaxError 
		 * exception.
		 * 
		 * NOTE: This attribute allows authors to control how binary data is 
		 * exposed to scripts. By setting the attribute to "blob", binary data 
		 * is returned in Blob form; by setting it to "arraybuffer", it is 
		 * returned in ArrayBuffer form. User agents can use this as a hint for 
		 * how to handle incoming binary data: if the attribute is set to 
		 * "blob", it is safe to spool it to disk, and if it is set to 
		 * "arraybuffer", it is likely more efficient to keep the data in 
		 * memory. Naturally, user agents are encouraged to use more subtle 
		 * heuristics to decide whether to keep incoming data in memory or not, 
		 * e.g. based on how big the data is or how common it is for a script 
		 * to change the attribute at the last minute. This latter aspect is 
		 * important in particular because it is quite possible for the 
		 * attribute to be changed after the user agent has received the data 
		 * but before the user agent as fired the event for it.
		 */
		$this->binaryType = 'blob';
	}
	
	/**
	 * Parse a WebSocket URL's components from the url argument, to obtain host, 
	 * port, resource name, and secure. If this fails, throw a SyntaxError 
	 * exception and abort these steps.
	 * 
	 * @param string $url The URL to parse
	 */
	private function _parseWebsocketUrl( $url )
	{
		/**
		 * @todo If secure is false but the origin of the entry script has a scheme 
		 * component that is itself a secure protocol, e.g. HTTPS, then throw a 
		 * SecurityError exception.
		 */
		
		/**
		 * @todo If port is a port to which the user agent is configured to block 
		 * access, then throw a SecurityError exception. (User agents typically 
		 * block access to well-known ports like SMTP.)
		 * 
		 * Access to ports 80 and 443 should not be blocked, including the 
		 * unlikely cases when secure is false but port is 443 or secure is 
		 * true but port is 80.
		 */
	}
	
	// --- Networking ---
	/**
	 * Event handler.
	 */
	abstract public function onopen()
	{
		
	}
	/**
	 * Event handler.
	 */
	abstract public function onerror()
	{
		
	}
	/**
	 * Event handler.
	 */
	abstract public function onclose()
	{
		
	}
	
	/**
	 * Close the connection.
	 * @throws Websocket_Exception_InvalidAccessError
	 * @param float $code Unsigned short. Optional 'code'.
	 * @param string $reason DOMString reason connection is closed.
	 */
	public function close($code = null, $reason = null)
	{
		/**
		 * @todo If the method's first argument is present but is not an 
		 * integer equal to 1000 or in the range 3000 to 4999, throw an 
		 * InvalidAccessError exception and abort these steps.
		 */
		/**
		 * @todo If the method's second argument has any unpaired surrogates, 
		 * then throw a SyntaxError exception and abort these steps.
		 */
		/**
		 * @todo If the method's second argument is present, then let reason be 
		 * the result of encoding that argument as UTF-8. If reason is longer 
		 * than 123 bytes, then throw a SyntaxError exception and abort these 
		 * steps.
		 * 
		 * @link http://dev.w3.org/html5/websockets/#refsRFC3629
		 */
		
		/**
		 * @todo Run the first matching steps from the following list:
		 *	- If the readyState attribute is in the CLOSING (2) or CLOSED (3) 
		 *	state
		 *		Do nothing.
		 *	NOTE: The connection is already closing or is already closed. If it has 
		 *	not already, a close event will eventually fire as described below.
		 * @link http://dev.w3.org/html5/websockets/#closeWebSocket
		 * 
		 *	- If the WebSocket connection is not yet established
		 *		Fail the WebSocket connection and set the readyState 
		 *		attribute's value to CLOSING (2).
		 *	NOTE: The fail the WebSocket connection algorithm invokes the close the 
		 *	WebSocket connection algorithm, which then establishes that the 
		 *	WebSocket connection is closed, which fires the close event as 
		 *	described below.
		 * @link http://dev.w3.org/html5/websockets/#closeWebSocket
		 * 
		 *	- If the WebSocket closing handshake has not yet been started
		 *		Start the WebSocket closing handshake and set the readyState 
		 *		attribute's value to CLOSING (2).
		 * 
		 *		If the first argument is present, then the status code to use 
		 *		in the WebSocket Close message must be the integer given by the 
		 *		first argument.
		 * 
		 *		If the second argument is also present, then reason must be 
		 *		provided in the Close message after the status code.
		 * @link http://dev.w3.org/html5/websockets/#refsRFC3629
		 *	NOTE: The start the WebSocket closing handshake algorithm 
		 *	eventually invokes the close the WebSocket connection algorithm, 
		 *	which then establishes that the WebSocket connection is closed, 
		 *	which fires the close event as described below.
		 * @link http://dev.w3.org/html5/websockets/#closeWebSocket
		 * 
		 *	- Otherwise
		 *		Set the readyState attribute's value to CLOSING (2).
		 *	NOTE: The WebSocket closing handshake is started, and will 
		 *	eventually invoke the close the WebSocket connection algorithm, 
		 *	which will establish that the WebSocket connection is closed, and 
		 *	thus the close event will fire, as described below.
		 * @link http://dev.w3.org/html5/websockets/#closeWebSocket
		 */
		
	}
	
	// --- Messaging ---
	/**
	 * Event handler.
	 */
	abstract public function onmessage()
	{
		
	}
	
	/**
	 * Send data.
	 * @param mixed $data Can be a DOMString, an ArrayBuffer, or Blob
	 */
	public function send($data)
	{
		/**
		 * @todo The send(data) method transmits data using the connection. 
		 * If the readyState attribute is CONNECTING, it must throw an 
		 * InvalidStateError exception. Otherwise, the user agent must run the 
		 * appropriate set of steps from the following list:
		 * 
		 *	- If the argument is a string
		 *		If the data argument has any unpaired surrogates, then throw a 
		 *		SyntaxError exception. If the WebSocket connection is 
		 *		established, and the string has no unpaired surrogates, and the 
		 *		WebSocket closing handshake has not yet started, then the user 
		 *		agent must send a WebSocket Message comprised of data using a 
		 *		text frame opcode; if the data cannot be sent, e.g. because it 
		 *		would need to be buffered but the buffer is full, the user 
		 *		agent must close the WebSocket connection with prejudice. 
		 * @link http://dev.w3.org/html5/websockets/#concept-websocket-close-fail
		 * 
		 *		Any invocation of this method with a string argument that does 
		 *		not throw an exception must increase the bufferedAmount 
		 *		attribute by the number of bytes needed to express the argument 
		 *		as UTF-8.
		 * @link http://dev.w3.org/html5/websockets/#refsRFC3629
		 * 
		 *	- If the argument is a Blob object
		 *		If the WebSocket connection is established, and the WebSocket 
		 *		closing handshake has not yet started, then the user agent must 
		 *		send a WebSocket Message comprised of data using a binary frame 
		 *		opcode; if the data cannot be sent, e.g. because it would need 
		 *		to be buffered but the buffer is full, the user agent must 
		 *		close the WebSocket connection with prejudice.
		 * @link http://dev.w3.org/html5/websockets/#concept-websocket-close-fail
		 * 
		 *		The data to be sent is the raw data represented by the Blob 
		 *		object. Any invocation of this method with a Blob argument that 
		 *		does not throw an exception must increase the bufferedAmount 
		 *		attribute by the size of the Blob object's raw data, in bytes.
		 * @link http://dev.w3.org/html5/websockets/#refsFILEAPI
		 * 
		 *	- If the argument is an ArrayBuffer object
		 *		If the WebSocket connection is established, and the WebSocket 
		 *		closing handshake has not yet started, then the user agent must 
		 *		send a WebSocket Message comprised of data using a binary frame 
		 *		opcode; if the data cannot be sent, e.g. because it would need 
		 *		to be buffered but the buffer is full, the user agent must 
		 *		close the WebSocket connection with prejudice. 
		 * @link http://dev.w3.org/html5/websockets/#concept-websocket-close-fail
		 * 
		 *		The data to be sent is the data stored in the buffer described 
		 *		by the ArrayBuffer object. Any invocation of this method with 
		 *		an ArrayBuffer argument that does not throw an exception must 
		 *		increase the bufferedAmount attribute by the length of the 
		 *		ArrayBuffer in bytes.
		 */
	}
}