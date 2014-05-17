<?php

namespace php\file;

class Link extends Resource {
	
	public function __construct($fileName) {
		parent::__construct($fileName);
	}
	
	/**
	 * Returns the target if this is a symbolic link
	 *
	 * @return String The target path
	 */
	public function getLinkTarget() {
		return readlink($this->pathName);
	}
}