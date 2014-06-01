<?php
namespace php\ldap;

use php\ldap\exception\LdapException;

/**
 * LDAP encapsulation to connect and bind to servers. Offers:
 * 
 * <ul>
 * 	<li>Add</li>
 *  <li>Modify/Update</li>
 *  <li>Delete</li>
 *  <li>Rename/Move</li>
 *  <li>Search</li>
 * </ul>
 *
 * @author Thomas Gossmann
 */
class Ldap {

	const DEREF_NEVER = 0;
	const DEREF_SEARCHING = 1;
	const DEREF_FINDING = 2;
	const DEREF_ALWAYS = 3;
	
	/**
	 * Specifies alternative rules for following aliases at the server.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_DEREF = 2;
	
	/**
	 * <p>
	 * Specifies the maximum number of entries that can be
	 * returned on a search operation.
	 * </p>
	 * The actual size limit for operations is also bounded
	 * by the server's configured maximum number of return entries.
	 * The lesser of these two settings is the actual size limit.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_SIZELIMIT = 3;
	
	/**
	 * Specifies the number of seconds to wait for search results.
	 * The actual time limit for operations is also bounded
	 * by the server's configured maximum time.
	 * The lesser of these two settings is the actual time limit.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_TIMELIMIT = 4;
	
	/**
	 * Option for ldap_set_option to allow setting network timeout.
	 * (Available as of PHP 5.3.0)
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_NETWORK_TIMEOUT = 20485;
	
	/**
	 * Specifies the LDAP protocol to be used (V2 or V3).
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_PROTOCOL_VERSION = 17;
	const OPT_ERROR_NUMBER = 49;
	
	/**
	 * Specifies whether to automatically follow referrals returned
	 * by the LDAP server.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_REFERRALS = 8;
	const OPT_RESTART = 9;
	const OPT_HOST_NAME = 48;
	const OPT_ERROR_STRING = 50;
	const OPT_MATCHED_DN = 51;
	
	/**
	 * Specifies a default list of server controls to be sent with each request.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_SERVER_CONTROLS = 18;
	
	/**
	 * Specifies a default list of client controls to be processed with each request.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_CLIENT_CONTROLS = 19;
	
	/**
	 * Specifies a bitwise level for debug traces.
	 * @link http://www.php.net/manual/en/ldap.constants.php
	*/
	const OPT_DEBUG_LEVEL = 20481;
	const OPT_X_SASL_MECH = 24832;
	const OPT_X_SASL_REALM = 24833;
	const OPT_X_SASL_AUTHCID = 24834;
	const OPT_X_SASL_AUTHZID = 24835;
	

	private $connection;

	/**
	 * Adds an entry to the LDAP directory.
	 * 
	 * @param String $dn The distinguished name of a LDAP entity.
	 * @param array $attribs An array that specifies the information about the entry. The values in the entries are indexed by individual attributes. In case of multiple values for an attribute, they are indexed using integers starting with 0.
	 */
	public function add($dn, $attribs) {
		return ldap_add($this->connection, $dn, $attribs);
	}

	/**
	 * Binds the ldap connection to the provided credentials.
	 * 
	 * @throws \gossi\ldap\LdapException If the bind fails.
	 * @param String $dn The distinguished name of a LDAP entity.
	 * @param String $password the password to the DN.
	 * @return boolean Returns true on success or false on failure.
	 */
	public function bind($dn, $password) {
		$success = @ldap_bind($this->connection, $dn, $password);
		if (ldap_errno($this->connection)) {
			throw new LdapException(ldap_error($this->connection), ldap_errno($this->connection));
		}
		return $success;
	}

	/**
	 * Connects to the provided server and port. LDAP protocol version is set to 3.
	 * 
	 * @param String $server The server address.
	 * @param int $port The port to that server address.
	 */
	public function connect($server, $port = 389) {
		$this->connection = @ldap_connect($server, $port);

		@ldap_set_option($this->connection, Ldap::OPT_PROTOCOL_VERSION, 3);
		@ldap_set_option($this->connection, Ldap::OPT_REFERRALS, 0);
	}

	/**
	 * Closes the server connection.
	 * 
	 * @return boolean Returns true on success and false on failure.
	 */
	public function close() {
		return @ldap_unbind($this->connection);
	}

	/**
	 * Deletes an entry at the given DN.
	 * 
	 * @param String $dn The distinguished name of a LDAP entity.
	 * @return boolean Returns true on success and false on failure.
	 */
	public function delete($dn) {
		return ldap_delete($this->connection, $dn);
	}

	/**
	 * A helper function to espace strings.
	 * 
	 * @param String $string The unescaped String
	 * @return String The escaped String
	 */
	public static function escape($string) {
		return str_replace(
			array('*', '\\', '(', ')'),
			array('\\*', '\\\\', '\\(', '\\)'),
			$string
		);
	}

	/**
	 * Generates a password to store in a LDAP directory.
	 * 
	 * @param String $password a plain password
	 * @return String the hashed password
	 */
	public static function generatePassword($password) {
		return '{SHA}'.base64_encode(pack("H*", sha1($password)));
	}

	/**
	 * Updates a LDAP entity at the given DN with the provided attributes.
	 * 
	 * @param String $dn The distinguished name.
	 * @param array $attribs The new attributes.
	 * @return boolean Returns true on success or false on failure.
	 */
	public function modify($dn, $attribs) {
		return ldap_modify($this->connection, $dn, $attribs);
	}

	/**
	 * Renames a LDAP entity.
	 * 
	 * @throws \gossi\ldap\LdapException If the rename fails.
	 * @param String $dn The distinguished name of a LDAP entity.
	 * @param String $newrdn The new RDN.
	 * @param String $newparent The new parent/superior entry.
	 * @param boolean $deleteoldrdn If true the old RDN value(s) is removed, else the old RDN value(s) is retained as non-distinguished values of the entry.
	 * @return boolean Returns true on success or false on failure.
	 */
	public function rename($dn, $newrdn, $newparent, $deleteoldrdn) {
		$success = ldap_rename($this->connection, $dn, $newrdn, $newparent, $deleteoldrdn);
		if (ldap_errno($this->connection)) {
			throw new LdapException(ldap_error($this->connection), ldap_errno($this->connection));
		}
		return $success;
	}

	/**
	 * Performs a ldap-search on the provided baseDN with your filter in <code>Subtree</code> scope
	 *
	 * @throws \gossi\ldap\LdapException If the search fails.
	 * @param String $baseDN The base DN for the directory.
	 * @param String $filter The search filter can be simple or advanced, using boolean operators in the format described in the LDAP documentation.
	 * @param array $attributes 
	 * 		An array of the required attributes, e.g. array("mail", "sn", "cn"). Note that the "dn" is always returned irrespective of which attributes types are requested.
	 * 		Using this parameter is much more efficient than the default action (which is to return all attributes and their associated values). The use of this parameter should therefore be considered good practice.
	 * @param int $attrsonly Should be set to 1 if only attribute types are wanted. If set to 0 both attributes types and attribute values are fetched which is the default behaviour.
	 * @param int $sizelimit 
	 * 		Enables you to limit the count of entries fetched. Setting this to 0 means no limit.
	 * 		This parameter can NOT override server-side preset sizelimit. You can set it lower though.
	 * 		Some directory server hosts will be configured to return no more than a preset number of entries. If this occurs, the server will indicate that it has only returned a partial results set. This also occurs if you use this parameter to limit the count of fetched entries.
	 * @param int $timelimit 
	 * 		Sets the number of seconds how long is spend on the search. Setting this to 0 means no limit.
	 * 		This parameter can NOT override server-side preset timelimit. You can set it lower though.
	 * @param int $deref Specifies how aliases should be handled during the search. It can be one of the following: LDAP_DEREF_NEVER - (default) aliases are never dereferenced.
	 * @return \gossi\ldap\LdapResult The search result.
	 */
	public function search($baseDN, $filter = '(objectClass=*)', $attributes = array(), $attrsonly = 0, $sizelimit = 0, $timelimit = 0, $deref = LDAP_DEREF_NEVER) {
		$result = @ldap_search($this->connection, $baseDN, $filter, $attributes, $attrsonly, $sizelimit, $timelimit, $deref);
		if (ldap_errno($this->connection)) {
			throw new LdapException(ldap_error($this->connection), ldap_errno($this->connection));
		}

		return new LdapResult($this->connection, $result);
	}

	/**
	 * Performs a ldap-search on the provided baseDN with your filter in <code>Base</code> scope
	 *
	 * @throws \gossi\ldap\LdapException If the search fails.
	 * @param String $baseDN The base DN for the directory.
	 * @param String $filter The search filter can be simple or advanced, using boolean operators in the format described in the LDAP documentation.
	 * @param array $attributes 
	 * 		An array of the required attributes, e.g. array("mail", "sn", "cn"). Note that the "dn" is always returned irrespective of which attributes types are requested.
	 * 		Using this parameter is much more efficient than the default action (which is to return all attributes and their associated values). The use of this parameter should therefore be considered good practice.
	 * @param int $attrsonly Should be set to 1 if only attribute types are wanted. If set to 0 both attributes types and attribute values are fetched which is the default behaviour.
	 * @param int $sizelimit 
	 * 		Enables you to limit the count of entries fetched. Setting this to 0 means no limit.
	 * 		This parameter can NOT override server-side preset sizelimit. You can set it lower though.
	 * 		Some directory server hosts will be configured to return no more than a preset number of entries. If this occurs, the server will indicate that it has only returned a partial results set. This also occurs if you use this parameter to limit the count of fetched entries.
	 * @param int $timelimit 
	 * 		Sets the number of seconds how long is spend on the search. Setting this to 0 means no limit.
	 * 		This parameter can NOT override server-side preset timelimit. You can set it lower though.
	 * @param int $deref Specifies how aliases should be handled during the search. It can be one of the following: LDAP_DEREF_NEVER - (default) aliases are never dereferenced.
	 * @return \gossi\ldap\LdapResult The search result.
	 */
	public function searchBase($baseDN, $filter = '(objectClass=*)', $attributes = array(), $attrsonly = 0, $sizelimit = 0, $timelimit = 0, $deref = LDAP_DEREF_NEVER) {
		$result = @ldap_read($this->connection, $baseDN, $filter, $attributes, $attrsonly, $sizelimit, $timelimit, $deref);
		if (ldap_errno($this->connection)) {
			throw new LdapException(ldap_error($this->connection), ldap_errno($this->connection));
		}

		return new LdapResult($this->connection, $result);
	}

	/**
	 * Performs a ldap-search on the provided baseDN with your filter in <code>One</code> scope
	 *
	 * @throws \gossi\ldap\LdapException If the search fails.
	 * @param String $baseDN The base DN for the directory.
	 * @param String $filter The search filter can be simple or advanced, using boolean operators in the format described in the LDAP documentation.
	 * @param array $attributes 
	 * 		An array of the required attributes, e.g. array("mail", "sn", "cn"). Note that the "dn" is always returned irrespective of which attributes types are requested.
	 * 		Using this parameter is much more efficient than the default action (which is to return all attributes and their associated values). The use of this parameter should therefore be considered good practice.
	 * @param int $attrsonly Should be set to 1 if only attribute types are wanted. If set to 0 both attributes types and attribute values are fetched which is the default behaviour.
	 * @param int $sizelimit 
	 * 		Enables you to limit the count of entries fetched. Setting this to 0 means no limit.
	 * 		This parameter can NOT override server-side preset sizelimit. You can set it lower though.
	 * 		Some directory server hosts will be configured to return no more than a preset number of entries. If this occurs, the server will indicate that it has only returned a partial results set. This also occurs if you use this parameter to limit the count of fetched entries.
	 * @param int $timelimit 
	 * 		Sets the number of seconds how long is spend on the search. Setting this to 0 means no limit.
	 * 		This parameter can NOT override server-side preset timelimit. You can set it lower though.
	 * @param int $deref Specifies how aliases should be handled during the search. It can be one of the following: LDAP_DEREF_NEVER - (default) aliases are never dereferenced.
	 * @return \gossi\ldap\LdapResult The search result.
	 */
	public function searchOne($baseDN, $filter = '(objectClass=*)', $attributes = array(), $attrsonly = 0, $sizelimit = 0, $timelimit = 0, $deref = LDAP_DEREF_NEVER) {
		$result = @ldap_list($this->connection, $baseDN, $filter, $attributes, $attrsonly, $sizelimit, $timelimit, $deref);
		if (ldap_errno($this->connection)) {
			throw new LdapException(ldap_error($this->connection), ldap_errno($this->connection));
		}

		return new LdapResult($this->connection, $result);
	}

}