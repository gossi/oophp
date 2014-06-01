<?php
namespace php\ldap;

use php\ldap\exception\LdapException;
class LdapResult {

	private $conn;
	private $result;
	private $pointer = null;

	/**
	 * Constructs a new LdapEntry.
	 *
	 * @param RessourceIdentifier $conn An LDAP link identifier, returned by ldap_connect.
	 * @param RessourceIdentifier $entry An LDAP link identifier, returned by ldap_search, ldap_list or ldap_read.
	 */
	function __construct($conn, $result) {
		$this->conn = $conn;
		$this->result = $result;
	}

	/**
	 * Counts the entries in the result.
	 * 
	 * @return int The number of entries in the result.
	 */
	public function count() {
		return @ldap_count_entries($this->conn, $this->result);
	}

	/**
	 * Returns the first entry in the result set.
	 * 
	 * @throws \gossi\ldap\LdapException If the read fails.
	 * @return \gossi\ldap\LdapEntry The new LdapEntry.
	 */
	public function getFirstEntry() {
		$this->pointer = ldap_first_entry($this->conn, $this->result);
		if (ldap_errno($this->conn)) {
			throw new LdapException(ldap_error($this->conn), ldap_errno($this->conn));
		}

		return new LdapEntry($this->conn, $this->pointer);
	}

	/**
	 * Returns the next entry in the result set or false wether there are no more entries.
	 * 
	 * @return \gossi\ldap\LdapEntry The new LdapEntry.
	 */
	public function getNextEntry() {
		if ($this->pointer == null) {
			return $this->getFirstEntry();
		}

		$this->pointer = ldap_next_entry($this->conn, $this->pointer);
		if ($this->pointer) {
			return new LdapEntry($this->conn, $this->pointer);
		} else {
			return false;
		}
	}
}
?>