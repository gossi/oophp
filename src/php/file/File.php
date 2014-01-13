<?php

namespace php\file;

use php\file\exception\FileException;
use php\date\DateTime;

class File implements FileInterface {
	
	private $fileName;
	
	public function __construct($fileName) {
		$this->fileName = $fileName;	
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
	public function changeGroup($group) {
		if ($this->isFile()) {
			return chgrp($this->fileName, $group);
		} else if ($this->isLink()) {
			return lchgrp($this->fileName, $group);
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
	public function changeMode($mode) {
		if ($this->isFile()) {
			return chmod($this->fileName, $mode);
		} else if ($this->isLink()) {
			return lchmod($this->fileName, $mode);
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
	public function changeOwner($user) {
		if ($this->isFile()) {
			return chown($this->fileName, $user);
		} else if ($this->isLink()) {
			return lchown($this->fileName, $user);
		}
	}
	
	/**
	 * Copies file
	 * 
	 * If the destination file already exists, it will be overwritten. 
	 * 
	 * @throws FileException When an error appeared.
	 * @param String|PathInterface $destination The destination path.
	 * @return File The copied file.
	 */
	public function copy($destination) {
		if ($destination instanceof PathInterface) {
			$destination = $destination->toString();
		}

		if (!copy($this->fileName, $destination)) {
			throw new FileException(sprintf('Failed to copy %s to %s', $this->fileName, $destination));
		}
		
		return new File($destination);
	}
	
	
	/* (non-PHPdoc)
	 * @see \php\file\FileInterface::move()
	 */
	public function move($destination) {
		if ($destination instanceof PathInterface) {
			$destination = $destination->toString();
		}
		return rename($this->fileName, $destination);
	}

	
	/**
	 * Deletes the file
	 */
	public function delete() {
		if ($this->isFile() || $this->isLink()) {
			unlink($this->fileName);
		} else if ($this->isDirectory()) {
			$files = $this->readDirectory();
			foreach ($files as $file) {
				$file->delete();
			}
			rmdir($this->fileName);
		}
	}

	/**
	 * Checks whether a file or directory exists
	 * 
	 * @return boolean Returns TRUE if exists; FALSE otherwise. Will return FALSE for symlinks 
	 * 		pointing to non-existing files.  
	 */
	public function exists() {
		return file_exists($this->fileName);
	}
	
	/**
	 * Returns the file extension
	 * 
	 * @return String Returns a string containing the file extension, or an empty string if 
	 * 		the file has no extension. 
	 */
	public function getExtension() {
		return pathinfo($this->fileName, PATHINFO_EXTENSION);
	}

	/**
	 * Returns the filename
	 */
	public function getFilename() {
		return basename($this->fileName);
	}
	
	/**
	 * Gets the path without filename
	 * 
	 * @return string
	 */
	public function getPath() {
		return dirname($this->fileName);
	}
	
	/**
	 * Gets the path to the file
	 * 
	 * @return String
	 */
	public function getPathname() {
		return $this->fileName;
	}
	
	/**
	 * Returns the path
	 *
	 * @return Path
	 */
	public function toPath() {
		return new Path($this->fileName);
	}
	
	/**
	 * Returns the target if this is a symbolic link
	 *
	 * @return String The target path
	 */
	public function getLinkTarget() {
		return readlink($this->fileName);
	}
	
	/**
	 * Gets last access time.
	 * 
	 * @return DateTime
	 */
	public function getATime() {
		$timestamp = fileatime($this->fileName);
		$time = new DateTime();
		$time->setTimestamp($timestamp);
		return $time;
	}
	
	/**
	 * Gets the created time.
	 *
	 * @return DateTime
	 */
	public function getCTime() {
		$timestamp = filectime($this->fileName);
		$time = new DateTime();
		$time->setTimestamp($timestamp);
		return $time;
	}
	
	/**
	 * Gets last modified time.
	 *
	 * @return DateTime
	 */
	public function getMTime() {
		$timestamp = filemtime($this->fileName);
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
		return fileinode($this->fileName);
	}
	
	/**
	 * Gets file group
	 * 
	 * @return int Returns the group ID, or FALSE if an error occurs.
	 */
	public function getGroup() {
		return filegroup($this->fileName);
	}
	
	/**
	 * Gets file owner
	 *
	 * @return int Returns the user ID of the owner, or FALSE on failure.
	 */
	public function getOwner() {
		return fileowner($this->fileName);
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
		return fileperms($this->fileName);
	}
	
	/**
	 * Tells whether this is a directory
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a directory, FALSE otherwise.
	 */
	public function isDirectory() {
		return is_dir($this->fileName);
	}
	
	/**
	 * Tells whether is executable
	 *
	 * @return boolean Returns TRUE if exists and is executable.
	 */
	public function isExecutable() {
		return is_executable($this->fileName);
	}
	
	/**
	 * Tells whether is readable
	 *
	 * @return boolean Returns TRUE if exists and is readable.
	 */
	public function isReadable() {
		return is_readable($this->fileName);
	}
	
	/**
	 * Tells whether is writable
	 * 
	 * @return boolean Returns TRUE if exists and is writable. 
	 */
	public function isWritable() {
		return is_writable($this->fileName);
	}
	
	/**
	 * Tells whether this is a regular file
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a regular file, FALSE otherwise. 
	 */
	public function isFile() {
		return is_file($this->fileName);
	}

	/**
	 * Tells whether the filename is a symbolic link
	 * 
	 * @return boolean Returns TRUE if the filename exists and is a symbolic link, FALSE otherwise.
	 */
	public function isLink() {
		return is_link($this->fileName);
	}
	
	public function read() {
		if (!$this->exists()) {
			throw new FileException(sprintf('File does not exist: %s', $this->getFilename()));
		}
		
		if ($this->isFile()) {
			return file_get_contents($this->fileName);
		}
	}
	
	/**
	 * 
	 * @param boolean $omitDots
	 * @throws FileException
	 * @return File[]
	 */
	public function readDirectory($omitDots = true) {
		if (!$this->exists()) {
			throw new FileException(sprintf('File does not exist: %s', $this->getFilename()));
		}
		
		if ($this->isDirectory()) {
			return file_get_contents($this->fileName);
		} else if($target->isDirectory()) {
			$files = [];
			foreach (new \DirectoryIterator($this->fileName) as $file) {
				if ($file->isDot() && !$omitDots) {
					$files[] = new File($file->getFilename());
				}
			}
			return $files;
		}
	}
	
	public function write($contents) {
		file_put_contents($this->fileName, $contents);
	}
	
	public function append($contents) {
		$this->write($this->read() . $contents);
	}
	
	public function prepend($contents) {
		$this->write($contents . $this->read());
	}
}