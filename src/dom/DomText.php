<?php
namespace php\dom;

use php\lang\Integer;
use php\lang\String;

class DomText extends DomCharacterData  {

	/**
	 * Breaks this node into two nodes at the specified offset
	 * @link http://www.php.net/manual/en/domtext.splittext.php
	 * @param Integer $offset <p>
	 * The offset at which to split, starting from 0.
	 * </p>
	 * @return DomText The new node of the same type, which contains all the content at and after the
	 * offset.
	 */
	public function splitText ($offset) {}

	/**
	 * Indicates whether this text node contains whitespace
	 * @link http://www.php.net/manual/en/domtext.iswhitespaceinelementcontent.php
	 * @return bool Returns true on success or false on failure.
	 */
	public function isWhitespaceInElementContent () {}

	public function isElementContentWhitespace () {}

	/**
	 * @param String $content
	 */
	public function replaceWholeText ($content) {}

	/**
	 * Creates a new <classname>DomText</classname> object
	 * @link http://www.php.net/manual/en/domtext.construct.php
	 * @param [String] $value
	 */
	public function __construct ($value) {}

}
