<?php
namespace php\collection;

/**
 * Represents a list
 * 
 * Alternative Names: Vector and Sequence
 * 
 * @author Thomas Gossmann
 */
class ArrayList extends AbstractCollection {
	
	/**
	 * Creates a new ArrayList
	 * 
	 * @param array|Collection $collection
	 */
	public function __construct($collection = []) {
		$this->addAll($collection);
	}
	
	/**
	 * Adds an element to that list
	 * 
	 * @param mixed $element
	 * @param int $index
	 * @return ArrayList $this
	 */
	public function add($element, $index = null) {
		if ($index === null) {
			$this->collection[$this->size()] = $element;
		} else {
			array_splice($this->collection, $index, 0, $element);
		}
		
		return $this;
	}
	
	/**
	 * Adds all elements to the list
	 * 
	 * @param array|Collection $collection
	 */
	public function addAll($collection) {
		foreach ($collection as $element) {
			$this->add($element);
		}
	}
	
	/**
	 * Returns the element at the given index (or nothing if the index isn't present)
	 * 
	 * @param int $index
	 * @return mixed
	 */
	public function get($index) {
		if (isset($this->collection[$index])) {
			return $this->collection[$index];
		}
	}

	/**
	 * Returns the index of the given element or FALSE if the element can't be found
	 * 
	 * @param mixed $element
	 * @return int the index for the given element
	 */
	public function indexOf($element) {
		return array_search($element, $this->collection, true);
	}
	
	/**
	 * Removes an element from the list
	 * 
	 * @param mixed $element
	 * @return ArrayList $this
	 */
	public function remove($element) {
		$index = array_search($element, $this->collection, true);
		if ($index !== null) {
			unset($this->collection[$index]);
		}
		
		return $this;
	}
	
	/**
	 * Removes all elements from the list
	 *
	 * @param array|Collection $collection
	 */
	public function removeAll($collection) {
		foreach ($collection as $element) {
			$this->remove($element);
		}
	}
	
	/**
	 * @return ArrayList
	 */
	public function map(callable $callback) {
		return new ArrayList(array_map($callback, $this->collection));
	}
	
	/**
	/* @return ArrayList
	 */
	public function filter(callable $callback) {
		return new ArrayList(array_values(array_filter($this->collection, $callback)));
	}

}