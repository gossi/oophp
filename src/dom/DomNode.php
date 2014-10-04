<?php
namespace php\dom;

use php\lang\String;
use php\lang\Integer;
class DomNode {

	/**
	 * Adds a new child before a reference node
	 * @link http://www.php.net/manual/en/domnode.insertbefore.php
	 * @param DomNode $newNode<p>
	 * The new node.
	 * </p>
	 * @param [DomNode] $refNode <p>
	 * The reference node. If not supplied, newnode is
	 * appended to the children.
	 * </p>
	 * @return DomNode The inserted node.
	 */
	public function insertBefore (DomNode $newNode, DomNode $refNode = null) {}

	/**
	 * Replaces a child
	 * @link http://www.php.net/manual/en/domnode.replacechild.php
	 * @param DomNode $newNode<p>
	 * The new node. It must be a member of the target document, i.e.
	 * created by one of the DomDocument->createXXX() methods or imported in
	 * the document by .
	 * </p>
	 * @param DomNode $oldNode <p>
	 * The old node.
	 * </p>
	 * @return DomNode The old node or false if an error occur.
	 */
	public function replaceChild (DomNode $newNode, DomNode $oldNode) {}

	/**
	 * Removes child from list of children
	 * @link http://www.php.net/manual/en/domnode.removechild.php
	 * @param DomNode $oldNode <p>
	 * The removed child.
	 * </p>
	 * @return DomNode If the child could be removed the function returns the old child.
	 */
	public function removeChild (DomNode $oldNode) {}

	/**
	 * Adds new child at the end of the children
	 * @link http://www.php.net/manual/en/domnode.appendchild.php
	 * @param DomNode $newNode <p>
	 * The appended child.
	 * </p>
	 * @return DomNode The node added.
	 */
	public function appendChild (DomNode $newNode) {}

	/**
	 * Checks if node has children
	 * @link http://www.php.net/manual/en/domnode.haschildnodes.php
	 * @return bool Returns true on success or false on failure.
	 */
	public function hasChildNodes () {}

	/**
	 * Clones a node
	 * @link http://www.php.net/manual/en/domnode.clonenode.php
	 * @param [bool] $deep <p>
	 * Indicates whether to copy all descendant nodes. This parameter is 
	 * defaulted to false.
	 * </p>
	 * @return DomNode The cloned node.
	 */
	public function cloneNode ($deep = null) {}

	/**
	 * Normalizes the node
	 * @link http://www.php.net/manual/en/domnode.normalize.php
	 * @return void 
	 */
	public function normalize () {}

	/**
	 * Checks if feature is supported for specified version
	 * @link http://www.php.net/manual/en/domnode.issupported.php
	 * @param String $feature <p>
	 * The feature to test. See the example of 
	 * DomImplementation::hasFeature for a
	 * list of features.
	 * </p>
	 * @param String $version <p>
	 * The version number of the feature to test.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function isSupported ($feature, $version) {}

	/**
	 * Checks if node has attributes
	 * @link http://www.php.net/manual/en/domnode.hasattributes.php
	 * @return bool Returns true on success or false on failure.
	 */
	public function hasAttributes () {}

	/**
	 * @param DomNode $other
	 */
	public function compareDocumentPosition (DomNode $other) {}

	/**
	 * Indicates if two nodes are the same node
	 * @link http://www.php.net/manual/en/domnode.issamenode.php
	 * @param DomNode $node <p>
	 * The compared node.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function isSameNode (DomNode $node) {}

	/**
	 * Gets the namespace prefix of the node based on the namespace URI
	 * @link http://www.php.net/manual/en/domnode.lookupprefix.php
	 * @param String $namespaceURI <p>
	 * The namespace URI.
	 * </p>
	 * @return String The prefix of the namespace.
	 */
	public function lookupPrefix ($namespaceURI) {}

	/**
	 * Checks if the specified namespaceURI is the default namespace or not
	 * @link http://www.php.net/manual/en/domnode.isdefaultnamespace.php
	 * @param String $namespaceURI <p>
	 * The namespace URI to look for.
	 * </p>
	 * @return bool Return true if namespaceURI is the default
	 * namespace, false otherwise.
	 */
	public function isDefaultNamespace ($namespaceURI) {}

	/**
	 * Gets the namespace URI of the node based on the prefix
	 * @link http://www.php.net/manual/en/domnode.lookupnamespaceuri.php
	 * @param String $prefix  <p>
	 * The prefix of the namespace.
	 * </p>
	 * @return String The namespace URI of the node.
	 */
	public function lookupNamespaceUri ($prefix) {}

	/**
	 * @param DomNode $arg
	 */
	public function isEqualNode (DomNode $arg) {}

	/**
	 * @param String $feature
	 * @param String $version
	 */
	public function getFeature ($feature, $version) {}

	/**
	 * @param String $key
	 * @param String $data
	 * @param unknown $handler
	 */
	public function setUserData ($key, $data, $handler) {}

	/**
	 * @param String $key
	 */
	public function getUserData ($key) {}

	/**
	 * Get an XPath for a node
	 * @link http://www.php.net/manual/en/domnode.getnodepath.php
	 * @return String a string containing the XPath, or &null; in case of an error.
	 */
	public function getNodePath () {}

	/**
	 * Get line number for a node
	 * @link http://www.php.net/manual/en/domnode.getlineno.php
	 * @return Integer Always returns the line number where the node was defined in.
	 */
	public function getLineNo () {}

	/**
	 * Canonicalize nodes to a string
	 * @link http://www.php.net/manual/en/domnode.c14n.php
	 * @param [bool] $exclusive <p>
	 * Enable exclusive parsing of only the nodes matched by the provided
	 * xpath or namespace prefixes.
	 * </p>
	 * @param [bool] $with_comments <p>
	 * Retain comments in output.
	 * </p>
	 * @param [array] $xpath <p>
	 * An array of xpaths to filter the nodes by.
	 * </p>
	 * @param [array] $ns_prefixes <p>
	 * An array of namespace prefixes to filter the nodes by.
	 * </p>
	 * @return String canonicalized nodes as a string or false on failure
	 */
	public function C14N ($exclusive = null, $with_comments = null, array $xpath = null, array $ns_prefixes = null) {}

	/**
	 * Canonicalize nodes to a file
	 * @link http://www.php.net/manual/en/domnode.c14nfile.php
	 * @param String $uri <p>
	 * Path to write the output to.
	 * </p>
	 * @param [bool] $exclusive <p>
	 * Enable exclusive parsing of only the nodes matched by the provided
	 * xpath or namespace prefixes.
	 * </p>
	 * @param [bool] $with_comments <p>
	 * Retain comments in output.
	 * </p>
	 * @param [array] $xpath <p>
	 * An array of xpaths to filter the nodes by.
	 * </p>
	 * @param [array] $ns_prefixes <p>
	 * An array of namespace prefixes to filter the nodes by.
	 * </p>
	 * @return int Number of bytes written or false on failure
	 */
	public function C14NFile ($uri, $exclusive = null, $with_comments = null, array $xpath = null, array $ns_prefixes = null) {}
	
}