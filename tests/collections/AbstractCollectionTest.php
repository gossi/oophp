<?php

namespace php\tests\collection;

use php\collections\ArrayList;

class AbstractCollectionTest extends \PHPUnit_Framework_TestCase {
	
	public function testSize() {
		$list = new ArrayList();
		
		$this->assertTrue($list->isEmpty());
		$this->assertEquals(0, $list->size());
		$this->assertEquals(0, count($list));
		
		$list->add('item 1')->add('item 2');
		
		$this->assertFalse($list->isEmpty());
		$this->assertEquals(2, $list->size());
		$this->assertEquals(2, count($list));
		
		$list->clear();
		
		$this->assertTrue($list->isEmpty());
		$this->assertEquals(0, $list->size());
		$this->assertEquals(0, count($list));
		
		$list = new ArrayList(['item 1', 'item 2']);
		
		$this->assertFalse($list->isEmpty());
		$this->assertEquals(2, $list->size());
		$this->assertEquals(2, count($list));
	}
	
	public function testIterator() {
		$data = ['item 1', 'item 2'];
		$list = new ArrayList($data);
		$elements = [];
		$keyelems = [];
		$counter = 0;
		
		foreach ($list as $element) {
			$elements[] = $element;
			$counter++;
		}
		
		foreach ($list as $key => $element) {
			$keyelems[$key] = $element;
		}
		
		$this->assertEquals(2, $counter);
		$this->assertSame($data, $elements);
		$this->assertSame($elements, $keyelems);
	}
}