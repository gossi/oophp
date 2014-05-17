<?php

namespace php\collections;

use php\lang\Iterator;
use php\lang\IteratorAggregate;
use php\lang\Countable;

interface Collection extends Iterator, Countable {
	
	public function clear();
	
	public function isEmpty();
	
	public function contains($element);
	
	public function size();

}