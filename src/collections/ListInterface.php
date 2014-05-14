<?php

namespace php\collections;

interface ListInterface extends Collection {
	
	public function add($element, $index);

	public function get($index);
	
	public function indexOf($element);
	
	public function remove($elementOrIndex);
}