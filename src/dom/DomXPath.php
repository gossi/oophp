<?php
namespace php\dom;

use php\lang\String;

class DomXPath  {

	/**
	 * Creates a new <classname>DomXPath</classname> object
	 * @link http://www.php.net/manual/en/domxpath.construct.php
	 * @param DomDocument $doc
	 */
	public function __construct (DomDocument $doc) {}

	/**
	 * Registers the namespace with the <classname>DomXPath</classname> object
	 * @link http://www.php.net/manual/en/domxpath.registernamespace.php
	 * @param String $prefix <p>
	 * The prefix.
	 * </p>
	 * @param String $namespaceURI <p>
	 * The URI of the namespace.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function registerNamespace ($prefix, $namespaceURI) {}

	/**
	 * Evaluates the given XPath expression
	 * @link http://www.php.net/manual/en/domxpath.query.php
	 * @param String $expression <p>
	 * The XPath expression to execute.
	 * </p>
	 * @param [DomNode] $contextNode<p>
	 * The optional contextnode can be specified for
	 * doing relative XPath queries. By default, the queries are relative to
	 * the root element.
	 * </p>
	 * @param [bool] $registerNodeNS <p>
	 * The optional registerNodeNS can be specified to
	 * disable automatic registration of the context node.
	 * </p>
	 * @return DomNodeList a DomNodeList containing all nodes matching
	 * the given XPath expression. Any expression which
	 * does not return nodes will return an empty
	 * DomNodeList.
	 * </p>
	 * <p>
	 * If the expression is malformed or the
	 * contextnode is invalid,
	 * DomXPath::query returns false.
	 */
	public function query ($expression, DomNode $contextNode = null, $registerNodeNS = null) {}

	/**
	 * Evaluates the given XPath expression and returns a typed result if possible
	 * @link http://www.php.net/manual/en/domxpath.evaluate.php
	 * @param String $expression <p>
	 * The XPath expression to execute.
	 * </p>
	 * @param [DomNode] $contextNode <p>
	 * The optional contextnode can be specified for
	 * doing relative XPath queries. By default, the queries are relative to
	 * the root element.
	 * </p>
	 * @param [bool] $registerNodeNS <p>
	 * The optional registerNodeNS can be specified to
	 * disable automatic registration of the context node.
	 * </p>
	 * @return mixed a typed result if possible or a DomNodeList
	 * containing all nodes matching the given XPath expression.
	 * </p>
	 * <p>
	 * If the expression is malformed or the
	 * contextnode is invalid,
	 * DomXPath::evaluate returns false.
	 */
	public function evaluate ($expression, DomNode $contextNode = null, $registerNodeNS = null) {}

	/**
	 * Register PHP functions as XPath functions
	 * @link http://www.php.net/manual/en/domxpath.registerphpfunctions.php
	 * @param [mixed] $restrict <p>
	 * Use this parameter to only allow certain functions to be called from XPath.
	 * </p>
	 * <p>
	 * This parameter can be either a string (a function name) or
	 * an array of function names.
	 * </p>
	 * @return void
	 */
	public function registerPhpFunctions ($restrict = null) {}

}
