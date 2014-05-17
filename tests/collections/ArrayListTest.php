<?php

namespace php\tests\collection;

use php\collections\ArrayList;

class ArrayListTest extends \PHPUnit_Framework_TestCase {
	
	public function testAddGetRemove() {
		$item1 = 'item 1';
		$item2 = 'item 2';
		$item3 = 'item 3';
		$items = [$item1, $item2];
		
		$list = new ArrayList();
		
		$list->add($item1);
		
		$this->assertEquals(1, $list->size());
		$this->assertEquals($list->get(0), $item1);
		$this->assertNull($list->get(5));
		
		$list->remove($item1);
		
		$this->assertEquals(0, $list->size());
		
		$list->addAll($items);
		
		$this->assertEquals(2, $list->size());
		$this->assertEmpty($list->get(2));
		$this->assertSame($items, $list->toArray());
		
		$list->add($item3);
		
		$this->assertEquals(3, $list->size());
		
		$list->removeAll($items);
		
		$this->assertEquals(1, $list->size());
	}
	
	public function testDuplicateValues() {
		$item1 = 'item 1';
		
		$list = new ArrayList();
		$list->add($item1)->add($item1)->add($item1);
		
		$this->assertEquals(3, $list->size());
	}
	
	public function testIndex() {
		$item1 = 'item 1';
		$item2 = 'item 2';
		$item3 = 'item 3';
		$items = [$item1, $item2];
		
		$list = new ArrayList($items);
		
		$index1 = $list->indexOf($item1);
		$this->assertEquals(0, $index1);
		$this->assertEquals(1, $list->indexOf($item2));
		$this->assertFalse($list->indexOf($item3));
		
		$list->removeAll($items);
		$list->addAll($items);
		
		$this->assertEquals(2, $list->size());
		$this->assertEquals($index1, $list->indexOf($item1));
		
		$list->add($item3, 1);
		$this->assertEquals($item3, $list->get(1));
		$this->assertEquals($item2, $list->get(2));
	}

	public function testContains() {
		$item1 = 'item 1';
		$item2 = 'item 2';
		$item3 = 'item 3';
		$items = [$item1, $item2];
	
		$list = new ArrayList($items);
	
		$this->assertTrue($list->contains($item2));
		$this->assertFalse($list->contains($item3));
	}
	
	public function testMap() {
		$list = new ArrayList([2, 3, 4]);
		$list2 = $list->map(function ($item) {
			return $item * $item;
		});
		
		$this->assertSame([4, 9, 16], $list2->toArray());
	}

	public function testFilter() {
		$list = new ArrayList([1, 2, 3, 4, 5, 6]);
		$list2 = $list->filter(function ($item) {
			return $item & 1;
		});
		
		$this->assertSame([1, 3, 5], $list2->toArray());
	}
}