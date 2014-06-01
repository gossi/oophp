<?php
namespace php\ftp;

use php\ftp\exception\FtpException;

class FtpConnection {

	private $resource = null;
	
	public function connect($host, $port = 21, $timeout = 90) {
		$this->resource = @ftp_connect($host, $port, $timeout);
	
		if ($this->resource === false) {
			$this->resource = null;
			throw new FtpException(sprintf('Couldn\'t connect to %s:%s.', $host, $port));
		}
	}
	
	public function login($username, $password) {
		$this->checkConnection();
		return ftp_login($this->resource, $username, $password);
	}
	
	public function close() {
		if ($this->resource !== null) {
			ftp_close($this->resource);
		}
	
		$this->resource = null;
	}
	
	private function checkConnection() {
		if ($this->resource === null) {
			throw new FtpException('No ftp connection established');
		}
	}
}