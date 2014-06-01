<?php
namespace php\ftp;

class Ftp {
	
	/**
	 * <p></p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	 */
	const ASCII = 1;
	
	/**
	 * <p></p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const TEXT = 1;
	
	/**
	 * <p></p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const BINARY = 2;
	
	/**
	 * <p></p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const IMAGE = 2;
	
	/**
	 * <p>
	 * Automatically determine resume position and start position for GET and PUT requests
	 * (only works if FTP_AUTOSEEK is enabled)
	 * </p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const AUTORESUME = -1;
	
	/**
	 * <p>
	 * See ftp_set_option for information.
	 * </p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const TIMEOUT_SEC = 0;
	
	/**
	 * <p>
	 * See ftp_set_option for information.
	 * </p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const AUTOSEEK = 1;
	
	/**
	 * <p>
	 * Asynchronous transfer has failed
	 * </p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const FAILED = 0;
	
	/**
	 * <p>
	 * Asynchronous transfer has finished
	 * </p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const FINISHED = 1;
	
	/**
	 * <p>
	 * Asynchronous transfer is still active
	 * </p>
	 * @link http://www.php.net/manual/en/ftp.constants.php
	*/
	const MOREDATA = 2;

}