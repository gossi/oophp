<?php

namespace php\collections;

/**
 * Represents a Set
 * 
 * @author Thomas Gossmann
 */
class Set extends AbstractCollection {
	
	/**
	 * Creates a new Set
	 * 
	 * @param array|Collection $collection
	 */
	public function __construct($collection = []) {
		$this->addAll($collection);
	}
	
	/**
	 * Adds an element to that set
	 * 
	 * @param mixed $element
	 * @return Set $this
	 */
	public function add($element) {
		if (!in_array($element, $this->collection)) {
			$this->collection[$this->size()] = $element;
		}
		
		return $this;
	}
	
	/**
	 * Adds all elements to the set
	 * 
	 * @param array|Collection $collection
	 * @return Set $this
	 */
	public function addAll($collection) {
		foreach ($collection as $element) {
			$this->add($element);
		}
		
		return $this;
	}
	
	/**
	 * Removes an element from the set
	 * 
	 * @param mixed $element
	 * @return Set $this
	 */
	public function remove($element) {
		$index = array_search($element, $this->collection);
		if ($index !== null) {
			unset($this->collection[$index]);
		}

		return $this;
	}
	
	/**
	 * Removes all elements from the set
	 *
	 * @param array|Collection $collection
	 */
	public function removeAll($collection) {
		foreach ($collection as $element) {
			$this->remove($element);
		}
	}
	
	/**
	 * @return Set
	 */
	public function map(callable $callback) {
		return new Set(array_map($callback, $this->collection));
	}
	
	/**
	 /* @return Set
	 */
	public function filter(callable $callback) {
		return new Set(array_values(array_filter($this->collection, $callback)));
	}
}