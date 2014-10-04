<?php
namespace php\dom;

use php\lang\String;
use php\lang\Integer;

class DomCharacterData extends DomNode  {

	/**
	 * Extracts a range of data from the node
	 * @link http://www.php.net/manual/en/domcharacterdata.substringdata.php
	 * @param Integer $offset<p>
	 * Start offset of substring to extract.
	 * </p>
	 * @param Integer $count<p>
	 * The number of characters to extract.
	 * </p>
	 * @return String The specified substring. If the sum of offset
	 * and count exceeds the length, then all 16-bit units
	 * to the end of the data are returned.
	 */
	public function substringData ($offset, $count) {}

	/**
	 * Append the string to the end of the character data of the node
	 * @link http://www.php.net/manual/en/domcharacterdata.appenddata.php
	 * @param String $data<p>
	 * The string to append.
	 * </p>
	 * @return void
	 */
	public function appendData ($data) {}

	/**
	 * Insert a string at the specified 16-bit unit offset
	 * @link http://www.php.net/manual/en/domcharacterdata.insertdata.php
	 * @param Integer $offset <p>
	 * The character offset at which to insert.
	 * </p>
	 * @param String $data <p>
	 * The string to insert.
	 * </p>
	 * @return void
	 */
	public function insertData ($offset, $data) {}

	/**
	 * Remove a range of characters from the node
	 * @link http://www.php.net/manual/en/domcharacterdata.deletedata.php
	 * @param Integer $offset <p>
	 * The offset from which to start removing.
	 * </p>
	 * @param Integer $count <p>
	 * The number of characters to delete. If the sum of
	 * offset and count exceeds
	 * the length, then all characters to the end of the data are deleted.
	 * </p>
	 * @return void
	 */
	public function deleteData ($offset, $count) {}

	/**
	 * Replace a substring within the DomCharacterData node
	 * @link http://www.php.net/manual/en/domcharacterdata.replacedata.php
	 * @param Integer $offset <p>
	 * The offset from which to start replacing.
	 * </p>
	 * @param Integer $count <p>
	 * The number of characters to replace. If the sum of
	 * offset and count exceeds
	 * the length, then all characters to the end of the data are replaced.
	 * </p>
	 * @param String $data <p>
	 * The string with which the range must be replaced.
	 * </p>
	 * @return void
	 */
	public function replaceData ($offset, $count, $data) {}

}
