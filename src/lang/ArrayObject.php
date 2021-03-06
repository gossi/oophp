<?php
namespace php\lang;

class ArrayObject implements ArrayAccess {
	
	private $array;
	
	public function __construct($contents = []) {
		$this->array = $contents;
	}

	/**
	 * Joins the array with a string
	 *
	 * @param string $glue Defaults to an empty string.
	 * @return String
	 * 		Returns a string containing a string representation of all the array elements in the
	 * 		same order, with the glue string between each element.
	 */
	public function join($glue = '') {
		return new String(implode($this->array, $glue));
	}


	/**
	 * @return ArrayObject
	 */
	public function map(callable $callback) {
		return new ArrayObject(array_map($callback, $this->collection));
	}
	
	/**
	 * @return ArrayObject
	 */
	public function filter(callable $callback) {
		return new ArrayObject(array_values(array_filter($this->collection, $callback)));
	}
	
	public function reduce() {
		
	}
	
	public function merge($values) {
		$this->array = array_merge($this->array, func_get_args());
		return $this;
	}
	
	public function keys() {
		return new ArrayObject(array_keys($this->array));
	}
	
	public function values() {
		return new ArrayObject(array_values($this->array));
	}
	
	public function flip() {
		$this->array = array_flip($this->array);
		return $this;
	}
	
	/**
	 * @internal
	 */
	public function offsetSet($offset, $value) {
		if (!is_null($offset)) {
			$this->array[$offset] = $value;
		}
	}
	
	/**
	 * @internal
	 */
	public function offsetExists($offset) {
		return isset($this->array[$offset]);
	}
	
	/**
	 * @internal
	 */
	public function offsetUnset($offset) {
		unset($this->array[$offset]);
	}
	
	/**
	 * @internal
	 */
	public function offsetGet($offset) {
		return isset($this->array[$offset]) ? $this->array[$offset] : null;
	}
	
}