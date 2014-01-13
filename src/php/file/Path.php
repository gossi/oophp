<?php

namespace php\file;

class Path implements PathInterface {
	
	private $pathName;
	
	public function __construct($pathName) {
		$this->pathName = $pathName;
	}
	
// 	public function setExtension($extension) {
		
// 	}
	
	/**
	 * Returns a path with the same segments as this path but with a 
	 * trailing separator added (if not already existent).
	 * 
	 * @return Path
	 */
	public function addTrailingSeparator() {
		
	}
	
	/**
	 * Returns the path obtained from the concatenation of the given path's 
	 * segments/string to the end of this path.
	 * 
	 * @param String|Path $path
	 */
	public function append($path) {
		
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
	 * Returns a path with the same segments as this path but with a trailing separator removed.
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
		
	}
	
	/**
	 * Returns the number of segments in this path.
	 * 
	 * @return int
	 */
	public function segmentCount() {
		
	}
	
	/**
	 * Returns the segments in this path in order.
	 * 
	 * @return String[]
	 */
	public function segments() {
		
	}
	
	/**
	 * Returns a php\file\File corresponding to this path.
	 * 
	 * @return File
	 */
	public function toFile() {
		return new File($this->pathName);
	}
	
	/**
	 * Returns a string representation of this path
	 * 
	 * @return String A string representation of this path
	 */
	public function toString() {
		
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