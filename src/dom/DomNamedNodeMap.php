<?php
namespace php\dom;

use php\lang\Traversable;
use php\lang\Integer;

class DomNamedNodeMap implements Traversable {

	/**
	 * Retrieves a node specified by name
	 * @link http://www.php.net/manual/en/domnamednodemap.getnameditem.php
	 * @param String $name <p>
	 * The nodeName of the node to retrieve.
	 * </p>
	 * @return DomNode A node (of any type) with the specified nodeName, or
	 * &null; if no node is found.
	 */
	public function getNamedItem ($name) {}

	/**
	 * @param DomNode $arg
	 */
	public function setNamedItem (DomNode $arg) {}

	/**
	 * @param [String] $name
	 */
	public function removeNamedItem ($name) {}

	/**
	 * Retrieves a node specified by index
	 * @link http://www.php.net/manual/en/domnamednodemap.item.php
	 * @param Integer $index <p>
	 * Index into this map.
	 * </p>
	 * @return DomNode The node at the indexth position in the map, or &null;
	 * if that is not a valid index (greater than or equal to the number of nodes
	 * in this map).
	 */
	public function item ($index) {}

	/**
	 * Retrieves a node specified by local name and namespace URI
	 * @link http://www.php.net/manual/en/domnamednodemap.getnameditemns.php
	 * @param String $namespaceURI <p>
	 * The namespace URI of the node to retrieve.
	 * </p>
	 * @param String $localName <p>
	 * The local name of the node to retrieve.
	 * </p>
	 * @return DomNode A node (of any type) with the specified local name and namespace URI, or
	 * &null; if no node is found.
	 */
	public function getNamedItemNS ($namespaceURI, $localName) {}

	/**
	 * @param [DomNode] $arg
	 */
	public function setNamedItemNS (DomNode $arg) {}

	/**
	 * @param [String] $namespaceURI
	 * @param [String] $localName
	 */
	public function removeNamedItemNS ($namespaceURI, $localName) {}

}
