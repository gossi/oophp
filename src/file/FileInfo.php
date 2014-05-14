<?php

namespace php\file;

use php\file\exception\FileException;
use php\date\DateTime;

class FileInfo implements FileInfoInterface {
	
	protected $pathName;
	
	public function __construct($pathName) {
		$this->pathName = $pathName;	
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
			return chgrp($this->pathName, $group);
		} else if ($this->isLink()) {
			return lchgrp($this->pathName, $group);
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
			return chmod($this->pathName, $mode);
		} else if ($this->isLink()) {
			return lchmod($this->pathName, $mode);
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
			return chown($this->pathName, $user);
		} else if ($this->isLink()) {
			return lchown($this->pathName, $user);
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

		if (!copy($this->pathName, $destination)) {
			throw new FileException(sprintf('Failed to copy %s to %s', $this->pathName, $destination));
		}
		
		return new FileInfo($destination);
	}
	
	
	/* (non-PHPdoc)
	 * @see \php\file\FileInterface::move()
	 */
	public function move($destination) {
		if ($destination instanceof PathInterface) {
			$destination = $destination->toString();
		}
		return rename($this->pathName, $destination);
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

	/**
	 * Checks whether a file or directory exists
	 * 
	 * @return boolean Returns TRUE if exists; FALSE otherwise. Will return FALSE for symlinks 
	 * 		pointing to non-existing files.  
	 */
	public function exists() {
		return file_exists($this->pathName);
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
	 * @return PathInterface
	 */
	public function toPath() {
		return new Path($this->pathName);
	}
	
	/**
	 * Gets last access time.
	 * 
	 * @return DateTime
	 */
	public function getATime() {
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
	public function getCTime() {
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
	public function getMTime() {
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

	
	/* (non-PHPdoc)
	 * @see \php\file\FileInfoInterface::toFile()
	 */
	public function toFile() {
		if (!$this->isFile()) {
			throw new FileException('Cannot create File, resource is not a file');
		}
		
		return new File($this->pathName);
	}
	
	/* (non-PHPdoc)
	 * @see \php\file\FileInfoInterface::toDirectory()
	 */
	public function toDirectory() {
		if (!$this->isDirectory()) {
			throw new FileException('Cannot create Directory, resource is not a directy');
		}
		
		return new Directory($this->pathName);
	}

	
	/* (non-PHPdoc)
	 * @see \php\file\FileInfoInterface::toLink()
	 */
	public function toLink() {
		if (!$this->isLink()) {
			throw new FileException('Cannot create Link, resource is not a link');
		}
		
		return new Link($this->pathName);
	}

}