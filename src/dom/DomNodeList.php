<?php
namespace php\dom;

use php\lang\Traversable;
use php\lang\Integer;

class DomNodeList implements Traversable {

	/**
	 * Retrieves a node specified by index
	 * @link http://www.php.net/manual/en/domnodelist.item.php
	 * @param Integer $index <p>
	 * Index of the node into the collection.
	 * </p>
	 * @return DomNode The node at the indexth position in the
	 * DomNodeList, or &null; if that is not a valid
	 * index.
	 */
	public function item ($index) {}

}