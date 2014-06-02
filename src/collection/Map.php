<?php
namespace php\collection;

use php\lang\ArrayAccess;

/**
 * Represents a Map
 * 
 * @author Thomas Gossmann
 */
class Map extends AbstractCollection implements ArrayAccess {
	
	/**
	 * Creates a new Map
	 * 
	 * @param array|Map $data
	 */
	public function __construct($collection = []) {
		$this->setAll($collection);
	}
	
	/**
	 * Sets an element with the given key on that map
	 * 
	 * @param string key
	 * @param mixed $element
	 * @return Map $this
	 */
	public function set($key, $element) {
		$this->collection[$key] = $element;
		
		return $this;
	}
	
	/**
	 * Returns the element for the given key or nothing if the key does not exist.
	 * 
	 * @param string $key
	 */
	public function get($key) {
		if (isset($this->collection[$key])) {
			return $this->collection[$key];
		}
	}

	
	/**
	 * Sets many elements on that map
	 * 
	 * @param array|Map $collection
	 * @return Map $this
	 */
	public function setAll($collection) {
		foreach ($collection as $key => $element) {
			$this->set($key, $element);
		}
		
		return $this;
	}
	
	/**
	 * Removes and returns an element from the map by the given key. Returns null if the key
	 * does not exist.
	 * 
	 * @param string $key
	 * @return mixed the element at the given key
	 */
	public function remove($key) {
		if (isset($this->collection[$key])) {
			$element = $this->collection[$key];
			unset($this->collection[$key]);
			
			return $element;
		}
	}
	
	/**
	 * Returns all keys as Set
	 * 
	 * @return Set the map's keys
	 */
	public function keys() {
		return new Set(array_keys($this->collection));
	}
	
	/**
	 * Returns all values as ArrayList
	 * 
	 * @return ArrayList the map's values
	 */
	public function values() {
		return new ArrayList(array_values($this->collection));
	}

	/**
	 * Returns whether the key exist.
	 * 
	 * @param string $key
	 * @return boolean
	 */
	public function has($key) {
		return isset($this->collection[$key]);
	}
	
	/**
	 * @return Map
	 */
	public function map(callable $callback) {
		return new Map(array_map($callback, $this->collection));
	}
	
	/**
	 * @return Map
	 */
	public function filter(callable $callback) {
		return new Map(array_filter($this->collection, $callback));
	}

	/**
	 * @internal
	 */
	public function offsetSet($offset, $value) {
		if (!is_null($offset)) {
			$this->collection[$offset] = $value;
		}
	}
	
	/**
	 * @internal
	 */
	public function offsetExists($offset) {
		return isset($this->collection[$offset]);
	}
	
	/**
	 * @internal
	 */
	public function offsetUnset($offset) {
		unset($this->collection[$offset]);
	}
	
	/**
	 * @internal
	 */
	public function offsetGet($offset) {
		return isset($this->collection[$offset]) ? $this->collection[$offset] : null;
	}	
	
}