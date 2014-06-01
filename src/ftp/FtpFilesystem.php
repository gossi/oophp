<?php

namespace php\ftp;

use php\file\Filesystem;
use php\file\FileInfo;

class FtpFilesystem implements Filesystem {

	private $connection;
	
	public function __construct(FtpConnection $connection) {
		$this->connection = $connection;
	}
	
	/**
	 * Attempts to change the group.
	 *
	 * Only the superuser may change the group arbitrarily; other users may
	 * change the group of a file to any group of which that user is a member.
	 *
	 * @param mixed $group A group name or number.
	 * @return boolean Returns TRUE on success or FALSE on failure.
	 */
	public function changeGroup(FileInfo $file, $group) {
		
	}
	
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
	public function changeMode(FileInfo $file, $mode) {
		
	}
	
	/**
	 * Changes file owner
	 *
	 * Attempts to change the owner. Only the superuser may change the owner of a file.
	 *
	 * @param mixed $user A user name or number.
	 * @return boolean Returns TRUE on success or FALSE on failure.
	*/
	public function changeOwner(FileInfo $file, $user) {
		
	}
	
	/**
	 * Copies a file
	 *
	 * If the destination file already exists, it will be overwritten.
	 *
	 * @throws FileException When an error appeared.
	 * @param FileInfo $source The source file
	 * @param String|Path $destination The destination path.
	 * @return Resource The copied file.
	*/
	public function copy(FileInfo $source, $destination) {
		
	}
	
	/**
	 * Deletes a file
	*/
	public function delete(FileInfo $file) {
		
	}
	
	/**
	 * Moves a file
	 *
	 * @param FileInfo $source The source file
	 * @param String|Path $destination
	 * @return boolean Returns TRUE on success or FALSE on failure.
	*/
	public function move(FileInfo $source, $destination) {
		
	}
}