<?php

namespace php\file;

use php\file\exception\FileException;
use php\date\DateTime;

class Resource implements FileInfo {
	
	protected $pathName;
	
	public function __construct($pathName) {
		$this->pathName = $pathName;	
	}

	/**
	 * Checks whether a file or directory exists
	 * 
	 * @return boolean Returns TRUE if exists; FALSE otherwise. Will return FALSE for symlinks 
	 * 		pointing to non-existing files.  
	 */
	public function exists() {
		return file_exists($this->pathName);
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
	 * Returns the path
	 *
	 * @return Path
	 */
	public function toPath() {
		return new Path($this->pathName);
	}
	
	/**
	 * Gets last access time.
	 * 
	 * @return DateTime
	 */
	public function getLastAccessedAt() {
		$timestamp = fileatime($this->pathName);
		$time = new DateTime();
		$time->setTimestamp($timestamp);
		return $time;
	}
	
	/**
	 * Gets the created time.
	 *
	 * @return DateTime
	 */
	public function getCreatedAt() {
		$timestamp = filectime($this->pathName);
		$time = new DateTime();
		$time->setTimestamp($timestamp);
		return $time;
	}
	
	/**
	 * Gets last modified time.
	 *
	 * @return DateTime
	 */
	public function getModifiedAt() {
		$timestamp = filemtime($this->pathName);
		$time = new DateTime();
		$time->setTimestamp($timestamp);
		return $time;
	}
	
	/**
	 * Gets file inode
	 * 
	 * @return int Returns the inode number of the file, or FALSE on failure. 
	 */
	public function getInode() {
		return fileinode($this->pathName);
	}
	
	/**
	 * Gets file group
	 * 
	 * @return int Returns the group ID, or FALSE if an error occurs.
	 */
	public function getGroup() {
		return filegroup($this->pathName);
	}
	
	/**
	 * Gets file owner
	 *
	 * @return int Returns the user ID of the owner, or FALSE on failure.
	 */
	public function getOwner() {
		return fileowner($this->pathName);
	}
	
	/**
	 * Gets file permissions
	 * 
	 * @return int Returns the file's permissions as a numeric mode. Lower bits of this 
	 * 		mode are the same as the permissions expected by chmod(), however on most platforms 
	 * 		the return value will also include information on the type of file given as filename. 
	 * 		The examples below demonstrate how to test the return value for specific permissions 
	 * 		and file types on POSIX systems, including Linux and Mac OS X. 
	 */
	public function getPermissions() {
		return fileperms($this->pathName);
	}
	
	/**
	 * Tells whether this is a directory
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a directory, FALSE otherwise.
	 */
	public function isDirectory() {
		return is_dir($this->pathName);
	}
	
	/**
	 * Tells whether is executable
	 *
	 * @return boolean Returns TRUE if exists and is executable.
	 */
	public function isExecutable() {
		return is_executable($this->pathName);
	}
	
	/**
	 * Tells whether is readable
	 *
	 * @return boolean Returns TRUE if exists and is readable.
	 */
	public function isReadable() {
		return is_readable($this->pathName);
	}
	
	/**
	 * Tells whether is writable
	 * 
	 * @return boolean Returns TRUE if exists and is writable. 
	 */
	public function isWritable() {
		return is_writable($this->pathName);
	}
	
	/**
	 * Tells whether this is a regular file
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a regular file, FALSE otherwise. 
	 */
	public function isFile() {
		return is_file($this->pathName);
	}

	/**
	 * Tells whether the filename is a symbolic link
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a symbolic link, FALSE otherwise.
	 */
	public function isLink() {
		return is_link($this->pathName);
	}

	/**
	 * Creates a file
	 * 
	 * @see #isFile
	 * 
	 * @throws FileException whether the resource is not a file
	 */
	public function toFile() {
		if (!$this->isFile()) {
			throw new FileException('Cannot create File, resource is not a file');
		}
		
		return new File($this->pathName);
	}
	
	/**
	 * Create a directory
	 * 
	 * @see #isDirectory
	 * 
	 * @throws FileException whether the resource is not a directory
	 */
	public function toDirectory() {
		if (!$this->isDirectory()) {
			throw new FileException('Cannot create Directory, resource is not a directy');
		}
		
		return new Directory($this->pathName);
	}

	/**
	 * Creates a link
	 * 
	 * @see #isLink
	 * 
	 * @throws FileException whether the resource is not a link
	 */
	public function toLink() {
		if (!$this->isLink()) {
			throw new FileException('Cannot create Link, resource is not a link');
		}
		
		return new Link($this->pathName);
	}

}