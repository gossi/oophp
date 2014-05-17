<?php

namespace php\file;

class Directory extends Resource {
	
	public function __construct($fileName) {
		parent::__construct($fileName);
	}

	/**
	 * Returns a directory iterator
	 * 
	 * @param int $flags default is DirectoryIterator::CURRENT_AS_FILEINFO | DirectoryIterator::KEY_AS_PATHNAME | DirectoryIterator::SKIP_DOTS
	 * 
	 * @return \php\file\DirectoryIterator
	 */
	public function getIterator($flags = 4128) {
		return new DirectoryIterator($this->pathName, $flags);
	}

	/**
	 * Returns a recursive directory iterator
	 * 
	 * @param int $flags default is DirectoryIterator::CURRENT_AS_FILEINFO | DirectoryIterator::KEY_AS_PATHNAME | DirectoryIterator::SKIP_DOTS
	 * 
	 * @return \php\file\RecursiveDirectoryIterator
	 */
	public function getRecursiveIterator($flags = 4128) {
		return new RecursiveDirectoryIterator($this->pathName, $flags);
	}
}