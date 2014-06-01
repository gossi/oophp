<?php

namespace php\file;

use php\file\Filesystem;
use php\file\exception\FileException;

class LocalFilesystem implements Filesystem {

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
		if ($file->isLink()) {
			return lchgrp($file->getPathname(), $group);
		} else {
			return chgrp($file->getPathname(), $group);
		}
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
		if ($file->isLink()) {
			return lchmod($file->getPathname(), $mode);
		} else {
			return chmod($file->getPathname(), $mode);
		}
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
		if ($file->isLink()) {
			return lchown($file->getPathname(), $user);
		} else {
			return chown($file->getPathname(), $user);
		} 
	}
	
	/**
	 * Copies file
	 * 
	 * If the destination file already exists, it will be overwritten. 
	 * 
	 * @throws FileException When an error appeared.
	 * @param FileInfo $source The source file
	 * @param String|Path $destination The destination path.
	 * @return Resource The copied file.
	 */
	public function copy(FileInfo $source, $destination) {
		if ($destination instanceof Path) {
			$destination = $destination->toString();
		}

		if (!copy($source->getPathname(), $destination)) {
			throw new FileException(sprintf('Failed to copy %s to %s', $this->pathName, $destination));
		}
		
		return new Resource($destination);
	}
	
	
	/**
	 * Moves a file
	 * 
	 * @param String|Path $destination
	 * @return boolean Returns TRUE on success or FALSE on failure. 
	 */
	public function move(FileInfo $source, $destination) {
		if ($destination instanceof Path) {
			$destination = $destination->toString();
		}
		
		$return = rename($source->getPathname(), $destination);

		if ($return) {
			// @TODO: Change pathnae in $source and set it to the new pathname - maybe reflection?
		}

		return $return;
	}

	
	/**
	 * Deletes the file
	 */
	public function delete() {
		if ($this->isFile() || $this->isLink()) {
			unlink($this->pathName);
		} else if ($this->isDirectory()) {
			$files = $this->readDirectory();
			foreach ($files as $file) {
				$file->delete();
			}
			rmdir($this->pathName);
		}
	}
}