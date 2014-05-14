<?php

namespace php\file;

interface PathInterface {

// 	public function setExtension($extension) {
		
// 	}
	
	/**
	 * Returns a path with the same segments as this path but with a 
	 * trailing separator added (if not already existent).
	 * 
	 * @return PathInterface
	 */
	public function addTrailingSeparator();
	
	/**
	 * Returns the path obtained from the concatenation of the given path's 
	 * segments/string to the end of this path.
	 * 
	 * @param String|PathInterface $path
	 */
	public function append($path);

	/**
	 * Returns whether this path has a trailing separator.
	 * 
	 * @return boolean
	 */
	public function hasTrailingSeparator();
	
	/**
	 * Returns whether this path is an absolute path.
	 * 
	 * @return boolean
	 */
	public function isAbsolute();
	
	/**
	 * 
	 * @param PathInterface $anotherPath
	 */
	public function isPrefixOf(PathInterface $anotherPath);
	
	/**
	 * Returns the last segment of this path, or null if it does not have any segments.
	 */
	public function lastSegment();
	
	/**
	 * 
	 * @param PathInterface $base
	 */
	public function makeRelativeTo(PathInterface $base);
	
	/**
	 * Returns a count of the number of segments which match in this 
	 * path and the given path, comparing in increasing segment number order.
	 * 
	 * @param PathInterface $anotherPath
	 * @return int
	 */
	public function matchingFirstSegments(PathInterface $anotherPath);
	
	/**
	 * Returns a new path which is the same as this path but with the file extension removed.
	 * 
	 * @return PathInterface
	 */
	public function removeExtension();
	
	/**
	 * Returns a copy of this path with the given number of segments removed from the beginning.
	 * 
	 * @param int $count
	 * @return PathInterface
	 */
	public function removeFirstSegments($count);
	
	/**
	 * Returns a copy of this path with the given number of segments removed from the end.
	 * 
	 * @param int $count
	 * @return PathInterface
	 */
	public function removeLastSegments($count);
	
	/**
	 * Returns a path with the same segments as this path but with a trailing separator removed.
	 * 
	 * @return PathInterface
	 */
	public function removeTrailingSeparator();
	
	/**
	 * Returns the specified segment of this path, or null if the path does not have such a segment.
	 * 
	 * @param int $index
	 * @return String
	 */
	public function segment($index);
	
	/**
	 * Returns the number of segments in this path.
	 * 
	 * @return int
	 */
	public function segmentCount();
	
	/**
	 * Returns the segments in this path in order.
	 * 
	 * @return String[]
	 */
	public function segments();
	
	/**
	 * Returns a php\file\File corresponding to this path.
	 * 
	 * @return FileInterface
	 */
	public function toFile();
	
	/**
	 * Returns a string representation of this path
	 * 
	 * @return String A string representation of this path
	 */
	public function toString();
	
	/**
	 * Returns a copy of this path truncated after the given number of segments.
	 * 
	 * @param int $count
	 * @return PathInterface
	 */
	public function upToSegment($count);
}