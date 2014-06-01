<?php

namespace php\file;

use php\file\exception\FileException;
use php\date\DateTime;

interface FileInfo {

	/**
	 * Checks whether a file or directory exists
	 * 
	 * @return boolean Returns TRUE if exists; FALSE otherwise. Will return FALSE for symlinks 
	 * 		pointing to non-existing files.  
	 */
	public function exists();
	
	public function getExtension();

	/**
	 * Returns the filename
	 * 
	 * @return string the filename
	 */
	public function getFilename();
	
	/**
	 * Gets the path without filename
	 * 
	 * @return string
	 */
	public function getPath();
	
	/**
	 * Gets the path to the file
	 * 
	 * @return String
	 */
	public function getPathname();
	
	/**
	 * Returns the path
	 *
	 * @return Path
	 */
	public function toPath();
	
	/**
	 * Gets last access time.
	 * 
	 * @return DateTime
	 */
	public function getLastAccessedAt();
	
	/**
	 * Gets the created time.
	 *
	 * @return DateTime
	 */
	public function getCreatedAt();
	
	/**
	 * Gets last modified time.
	 *
	 * @return DateTime
	 */
	public function getModifiedAt();
	
	/**
	 * Gets file inode
	 * 
	 * @return int Returns the inode number of the file, or FALSE on failure. 
	 */
	public function getInode();
	
	/**
	 * Gets file group
	 * 
	 * @return int Returns the group ID, or FALSE if an error occurs.
	 */
	public function getGroup();
	
	/**
	 * Gets file owner
	 *
	 * @return int Returns the user ID of the owner, or FALSE on failure.
	 */
	public function getOwner();
	
	/**
	 * Gets file permissions
	 * 
	 * @return int Returns the file's permissions as a numeric mode. Lower bits of this 
	 * 		mode are the same as the permissions expected by chmod(), however on most platforms 
	 * 		the return value will also include information on the type of file given as filename. 
	 * 		The examples below demonstrate how to test the return value for specific permissions 
	 * 		and file types on POSIX systems, including Linux and Mac OS X. 
	 */
	public function getPermissions();
	
	/**
	 * Tells whether this is a directory
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a directory, FALSE otherwise.
	 */
	public function isDirectory();
	
	/**
	 * Tells whether is executable
	 *
	 * @return boolean Returns TRUE if exists and is executable.
	 */
	public function isExecutable();
	
	/**
	 * Tells whether is readable
	 *
	 * @return boolean Returns TRUE if exists and is readable.
	 */
	public function isReadable();
	
	/**
	 * Tells whether is writable
	 * 
	 * @return boolean Returns TRUE if exists and is writable. 
	 */
	public function isWritable();
	
	/**
	 * Tells whether this is a regular file
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a regular file, FALSE otherwise. 
	 */
	public function isFile();

	/**
	 * Tells whether the filename is a symbolic link
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a symbolic link, FALSE otherwise.
	 */
	public function isLink();

}