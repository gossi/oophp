<?php

namespace php\collections;

use php\lang\Iterator;
use php\lang\IteratorAggregate;

interface Collection extends Iterator, IteratorAggregate {
	
	public function add($element);
	
	public function clear();
	
	public function contains($element);
	
	public function isEmpty();
	
	public function remove($element);
	
	public function size();
	
	public function toArray();
}