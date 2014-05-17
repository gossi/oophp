<?php

namespace php\file;

use php\file\exception\FileException;
class File extends Resource {
 
	public function __construct($fileName) {
		parent::__construct($fileName);
	}
	
	/**
	 * Returns the file extension
	 *
	 * @return String Returns a string containing the file extension, or an empty string if
	 * 		the file has no extension.
	 */
	public function getExtension() {
		return pathinfo($this->pathName, PATHINFO_EXTENSION);
	}
	
	public function read() {
		if (!$this->exists()) {
			throw new FileException(sprintf('File does not exist: %s', $this->getFilename()));
		}
	
		if ($this->isFile()) {
			return file_get_contents($this->pathName);
		}
	}
	
	public function write($contents) {
		file_put_contents($this->pathName, $contents);
	}
	
	public function append($contents) {
		$this->write($this->read() . $contents);
	}
	
	public function prepend($contents) {
		$this->write($contents . $this->read());
	}
	

}