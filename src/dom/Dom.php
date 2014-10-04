<?php
namespace php\dom;

class Dom {
	
	/**
	 * Error code not part of the DOM specification. Meant for PHP errors.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	 */
	const PHP_ERR = 0;
	
	/**
	 * If index or size is negative, or greater than the allowed value.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const INDEX_SIZE_ERR = 1;
	
	/**
	 * If the specified range of text does not fit into a
	 * DOMString.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const DOMSTRING_SIZE_ERR = 2;
	
	/**
	 * If any node is inserted somewhere it doesn't belong
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const HIERARCHY_REQUEST_ERR = 3;
	
	/**
	 * If a node is used in a different document than the one that created it.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const WRONG_DOCUMENT_ERR = 4;
	
	/**
	 * If an invalid or illegal character is specified, such as in a name.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const INVALID_CHARACTER_ERR = 5;
	
	/**
	 * If data is specified for a node which does not support data.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const NO_DATA_ALLOWED_ERR = 6;
	
	/**
	 * If an attempt is made to modify an object where modifications are not allowed.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const NO_MODIFICATION_ALLOWED_ERR = 7;
	
	/**
	 * If an attempt is made to reference a node in a context where it does not exist.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const NOT_FOUND_ERR = 8;
	
	/**
	 * If the implementation does not support the requested type of object or operation.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const NOT_SUPPORTED_ERR = 9;
	
	/**
	 * If an attempt is made to add an attribute that is already in use elsewhere.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const INUSE_ATTRIBUTE_ERR = 10;
	
	/**
	 * If an attempt is made to use an object that is not, or is no longer, usable.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const INVALID_STATE_ERR = 11;
	
	/**
	 * If an invalid or illegal string is specified.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const SYNTAX_ERR = 12;
	
	/**
	 * If an attempt is made to modify the type of the underlying object.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const INVALID_MODIFICATION_ERR = 13;
	
	/**
	 * If an attempt is made to create or change an object in a way which is
	 * incorrect with regard to namespaces.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const NAMESPACE_ERR = 14;
	
	/**
	 * If a parameter or an operation is not supported by the underlying object.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const INVALID_ACCESS_ERR = 15;
	
	/**
	 * If a call to a method such as insertBefore or removeChild would make the Node
	 * invalid with respect to "partial validity", this exception would be raised and
	 * the operation would not be done.
	 * @link http://www.php.net/manual/en/dom.const ants.php
	*/
	const VALIDATION_ERR = 16;
}