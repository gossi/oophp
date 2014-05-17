<?php

namespace php\file;

use php\lang\String;

class Path {
	
	private $extension;
	private $pathName;
	private $segments;
	
	public function __construct($pathName) {
		$this->pathName = new String($pathName);
		$this->segments = $this->pathName->split('/');
		
		$pathInfo = pathinfo($this->pathName);
		$this->extension = $pathInfo['extension'];
		$this->fileName = $pathInfo['filename'];
	}
	
	public function getExtension() {
		return pathinfo($this->pathName, PATHINFO_EXTENSION);
	}
	
	/**
	 * Returns the filename
	 *
	 * @return string the filename
	 */
	public function getFilename() {
		return basename($this->pathName);
	}
	
	/**
	 * Gets the path without filename
	 *
	 * @return string
	 */
	public function getPath() {
		return dirname($this->pathName);
	}
	
	/**
	 * Gets the path to the file
	 *
	 * @return String
	 */
	public function getPathname() {
		return $this->pathName;
	}
	
	/**
	 * Changes the extension of this path
	 * 
	 * @param string $extension the new extension
	 * @return Path $this
	 */
	public function setExtension($extension) {
		$pathinfo = pathinfo($this->pathName);
		
		$this->pathName = new String($pathinfo['dirname']);
		if (!empty($pathinfo['dirname'])) {
			$this->pathName->append('/');
		}
		
		$this->pathName
			->append($pathinfo['filename'])
			->append('.')
			->append($extension)
		;
		
		return $this;
	}
	
	/**
	 * Returns a path with the same segments as this path but with a 
	 * trailing separator added (if not already existent).
	 * 
	 * @return Path
	 */
	public function addTrailingSeparator() {
		
		return $this;
	}
	
	/**
	 * Returns the path obtained from the concatenation of the given path's 
	 * segments/string to the end of this path.
	 * 
	 * @param String|Path $path
	 * @return Path
	 */
	public function append($path) {
		
		return $this;
	}

	/**
	 * Returns whether this path has a trailing separator.
	 * 
	 * @return boolean
	 */
	public function hasTrailingSeparator() {
		
	}
	
	/**
	 * Returns whether this path is an absolute path.
	 * 
	 * @return boolean
	 */
	public function isAbsolute() {
		
	}
	
	/**
	 * 
	 * @param Path $anotherPath
	 * @return boolean
	 */
	public function isPrefixOf(Path $anotherPath) {
		
	}
	
	/**
	 * Returns the last segment of this path, or null if it does not have any segments.
	 */
	public function lastSegment() {
		
	}
	
	/**
	 * 
	 * @param Path $base
	 */
	public function makeRelativeTo(Path $base) {
		
	}
	
	/**
	 * Returns a count of the number of segments which match in this 
	 * path and the given path, comparing in increasing segment number order.
	 * 
	 * @param Path $anotherPath
	 * @return int
	 */
	public function matchingFirstSegments(Path $anotherPath) {
		
	}
	
	/**
	 * Returns a new path which is the same as this path but with the file extension removed.
	 * 
	 * @return Path
	 */
	public function removeExtension() {
		
	}
	
	/**
	 * Returns a copy of this path with the given number of segments removed from the beginning.
	 * 
	 * @param int $count
	 * @return Path
	 */
	public function removeFirstSegments($count) {
		
	}
	
	/**
	 * Returns a copy of this path with the given number of segments removed from the end.
	 * 
	 * @param int $count
	 * @return Path
	 */
	public function removeLastSegments($count) {
		
	}
	
	/**
	 * Returns a copy of this path with the same segments as this path but with a trailing separator removed.
	 * 
	 * @return Path
	 */
	public function removeTrailingSeparator() {
		
	}
	
	/**
	 * Returns the specified segment of this path, or null if the path does not have such a segment.
	 * 
	 * @param int $index
	 * @return String
	 */
	public function segment($index) {
		if (isset($this->segments[$index])) {
			return $this->segments[$index];
		}

		return null;
	}
	
	/**
	 * Returns the number of segments in this path.
	 * 
	 * @return int
	 */
	public function segmentCount() {
		return count($this->segments);
	}
	
	/**
	 * Returns the segments in this path in order.
	 * 
	 * @return String[]
	 */
	public function segments() {
		return $this->segments;
	}
	
	/**
	 * Returns a php\file\File corresponding to this path.
	 * 
	 * @return File
	 */
	public function toFile() {
		return new Resource($this->pathName);
	}
	
	/**
	 * Returns a string representation of this path
	 * 
	 * @return String A string representation of this path
	 */
	public function toString() {
		return $this->pathName;
	}
	
	/**
	 * Returns a copy of this path truncated after the given number of segments.
	 * 
	 * @param int $count
	 * @return Path	
	 */
	public function upToSegment($count) {
		
	}
}