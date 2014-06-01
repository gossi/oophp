<?php

namespace php\collections;

use php\lang\ArrayIterator;

abstract class AbstractCollection implements Collection {
	
	protected $collection = [];
	
	public function contains($element) {
		return in_array($element, $this->collection);
	}
	
	public function size() {
		return count($this->collection);
	}
	
	public function isEmpty() {
		return count($this->collection) == 0;
	}
	
	public function clear() {
		$this->collection = [];
	}
	
	public function toArray() {
		return $this->collection;
	}
	
	/**
	 * @internal
	 */
	function rewind() {
		reset($this->collection);
	}
	
	/**
	 * @internal
	 */
	function current() {
		return current($this->collection);
	}
	
	/**
	 * @internal
	 */
	function key() {
		return key($this->collection);
	}
	
	/**
	 * @internal
	 */
	function next() {
		next($this->collection);
	}
	
	/**
	 * @internal
	 */
	function valid() {
		return key($this->collection) !== null;
	}

}