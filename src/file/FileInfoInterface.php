<?php

namespace php\file;

use php\date\DateTime;
use php\file\exception\FileException;

interface FileInfoInterface {
	/**
	 * Attempts to change the group.
	 *
	 * Only the superuser may change the group arbitrarily; other users may
	 * change the group of a file to any group of which that user is a member.
	 *
	 * @param mixed $group A group name or number.
	 * @return boolean Returns TRUE on success or FALSE on failure.
	 */
	public function changeGroup($group);
	
	/**
	 * Attempts to change the mode.
	 *
	 * @see #changeGroup
	 * @see #changeOwner
	 *
	 * @param int $mode
	 * 		Note that mode is not automatically assumed to be an octal value, so strings
	 * 		(such as "g+w") will not work properly. To ensure the expected operation, you
	 * 		need to prefix mode with a zero (0).
	 *
	 * @return boolean Returns TRUE on success or FALSE on failure.
	 */
	public function changeMode($mode);
	
	/**
	 * Changes file owner
	 *
	 * Attempts to change the owner. Only the superuser may change the owner of a file.
	 *
	 * @param mixed $user A user name or number.
	 * @return boolean Returns TRUE on success or FALSE on failure.
	 */
	public function changeOwner($user);

	/**
	 * Copies file
	 *
	 * If the destination file already exists, it will be overwritten.
	 *
	 * @param String|PathInterface $destination The destination path.
	 * @throws FileException When an error appeared.
	 * @return File The copied file.
	 */
	public function copy($destination);
	
	/**
	 * Moves a file
	 * 
	 * @param String|PathInterface $destination
	 * @return boolean Returns TRUE on success or FALSE on failure. 
	 */
	public function move($destination);
	
	/**
	 * Deletes the file
	 */
	public function delete();
	
	/**
	 * Checks whether a file or directory exists
	 *
	 * @return boolean Returns TRUE if exists; FALSE otherwise. Will return FALSE for symlinks
	 * 		pointing to non-existing files.
	 */
	public function exists();
	
	/**
	 * Gets last access time.
	 *
	 * @return DateTime
	 */
	public function getATime();
	
	/**
	 * Gets the created time.
	 *
	 * @return DateTime
	 */
	public function getCTime();
	
	/**
	 * Gets last modified time.
	 *
	 * @return DateTime
	 */
	public function getMTime();
	
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
	 * @return PathInterface
	 */
	public function toPath();
	
	/**
	 * Creates a file
	 * 
	 * @see #isFile
	 * 
	 * @throws FileException whether the resource is not a file
	 */
	public function toFile();
	
	/**
	 * Create a directory
	 * 
	 * @see #isDirectory
	 * 
	 * @throws FileException whether the resource is not a directory
	 */
	public function toDirectory();
	
	/**
	 * Creates a link
	 * 
	 * @see #isLink
	 * 
	 * @throws FileException whether the resource is not a link
	 */
	public function toLink();
	
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