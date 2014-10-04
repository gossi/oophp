<?php
namespace php\dom;

use php\lang\String;

class DomElement extends DomNode  {

	/**
	 * Returns value of attribute
	 * @link http://www.php.net/manual/en/domelement.getattribute.php
	 * @param String $name <p>
	 * The name of the attribute.
	 * </p>
	 * @return String The value of the attribute, or an empty string if no attribute with the
	 * given name is found.
	 */
	public function getAttribute ($name) {}

	/**
	 * Adds new attribute
	 * @link http://www.php.net/manual/en/domelement.setattribute.php
	 * @param String $name <p>
	 * The name of the attribute.
	 * </p>
	 * @param String $value <p>
	 * The value of the attribute.
	 * </p>
	 * @return DomAttr The new DomAttr or false if an error occured.
	 */
	public function setAttribute ($name, $value) {}

	/**
	 * Removes attribute
	 * @link http://www.php.net/manual/en/domelement.removeattribute.php
	 * @param String $name <p>
	 * The name of the attribute.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function removeAttribute ($name) {}

	/**
	 * Returns attribute node
	 * @link http://www.php.net/manual/en/domelement.getattributenode.php
	 * @param String $name <p>
	 * The name of the attribute.
	 * </p>
	 * @return DomAttr The attribute node.
	 */
	public function getAttributeNode ($name) {}

	/**
	 * Adds new attribute node to element
	 * @link http://www.php.net/manual/en/domelement.setattributenode.php
	 * @param DomAttr $attr <p>
	 * The attribute node.
	 * </p>
	 * @return DomAttr old node if the attribute has been replaced or &null;.
	 */
	public function setAttributeNode (DomAttr $attr) {}

	/**
	 * Removes attribute
	 * @link http://www.php.net/manual/en/domelement.removeattributenode.php
	 * @param DomAttr $oldnode <p>
	 * The attribute node.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function removeAttributeNode (DomAttr $oldnode) {}

	/**
	 * Gets elements by tagname
	 * @link http://www.php.net/manual/en/domelement.getelementsbytagname.php
	 * @param String $name <p>
	 * The tag name. Use * to return all elements within
	 * the element tree.
	 * </p>
	 * @return DomNodeList This function returns a new instance of the class
	 * DomNodeList of all matched elements.
	 */
	public function getElementsByTagName ($name) {}

	/**
	 * Returns value of attribute
	 * @link http://www.php.net/manual/en/domelement.getattributens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @param String $localName <p>
	 * The local name.
	 * </p>
	 * @return String The value of the attribute, or an empty string if no attribute with the
	 * given localName and namespaceURI
	 * is found.
	 */
	public function getAttributeNS ($namespaceURI, $localName) {}

	/**
	 * Adds new attribute
	 * @link http://www.php.net/manual/en/domelement.setattributens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @param String $qualifiedName <p>
	 * The qualified name of the attribute, as prefix:tagname.
	 * </p>
	 * @param String $value <p>
	 * The value of the attribute.
	 * </p>
	 * @return void
	 */
	public function setAttributeNS ($namespaceURI, $qualifiedName, $value) {}

	/**
	 * Removes attribute
	 * @link http://www.php.net/manual/en/domelement.removeattributens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @param String $localName <p>
	 * The local name.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function removeAttributeNS ($namespaceURI, $localName) {}

	/**
	 * Returns attribute node
	 * @link http://www.php.net/manual/en/domelement.getattributenodens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @param String $localName <p>
	 * The local name.
	 * </p>
	 * @return DomAttr The attribute node.
	 */
	public function getAttributeNodeNS ($namespaceURI, $localName) {}

	/**
	 * Adds new attribute node to element
	 * @link http://www.php.net/manual/en/domelement.setattributenodens.php
	 * @param DomAttr $attr <p>
	 * The attribute node.
	 * </p>
	 * @return DomAttr the old node if the attribute has been replaced.
	 */
	public function setAttributeNodeNS (DomAttr $attr) {}

	/**
	 * Get elements by namespaceURI and localName
	 * @link http://www.php.net/manual/en/domelement.getelementsbytagnamens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @param String $localName <p>
	 * The local name. Use * to return all elements within
	 * the element tree.
	 * </p>
	 * @return DomNodeList This function returns a new instance of the class
	 * DomNodeList of all matched elements in the order in
	 * which they are encountered in a preorder traversal of this element tree.
	 */
	public function getElementsByTagNameNS ($namespaceURI, $localName) {}

	/**
	 * Checks to see if attribute exists
	 * @link http://www.php.net/manual/en/domelement.hasattribute.php
	 * @param String $name <p>
	 * The attribute name.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function hasAttribute ($name) {}

	/**
	 * Checks to see if attribute exists
	 * @link http://www.php.net/manual/en/domelement.hasattributens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @param String $localName <p>
	 * The local name.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function hasAttributeNS ($namespaceURI, $localName) {}

	/**
	 * Declares the attribute specified by name to be of type ID
	 * @link http://www.php.net/manual/en/domelement.setidattribute.php
	 * @param String $name <p>
	 * The name of the attribute.
	 * </p>
	 * @param bool $isId <p>
	 * Set it to true if you want name to be of type
	 * ID, false otherwise.
	 * </p>
	 * @return void
	 */
	public function setIdAttribute ($name, $isId) {}

	/**
	 * Declares the attribute specified by local name and namespace URI to be of type ID
	 * @link http://www.php.net/manual/en/domelement.setidattributens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI of the attribute.
	 * </p>
	 * @param String $localName <p>
	 * The local name of the attribute, as prefix:tagname.
	 * </p>
	 * @param bool $isId <p>
	 * Set it to true if you want name to be of type
	 * ID, false otherwise.
	 * </p>
	 * @return void
	 */
	public function setIdAttributeNS ($namespaceURI, $localName, $isId) {}

	/**
	 * Declares the attribute specified by node to be of type ID
	 * @link http://www.php.net/manual/en/domelement.setidattributenode.php
	 * @param DomAttr $attr <p>
	 * The attribute node.
	 * </p>
	 * @param bool $isId <p>
	 * Set it to true if you want name to be of type
	 * ID, false otherwise.
	 * </p>
	 * @return void
	 */
	public function setIdAttributeNode (DomAttr $attr, $isId) {}

	/**
	 * Creates a new DomElement object
	 * @link http://www.php.net/manual/en/domelement.construct.php
	 * @param String $name
	 * @param [String] $value
	 * @param [String] $uri
	 */
	public function __construct ($name, $value, $uri) {}

}
