<?php
namespace php\dom;

use php\lang\String;

class DomImplementation  {

	/**
	 * @param $feature
	 * @param $version
	 */
	public function getFeature ($feature, $version) {}

	/**
	 * Test if the Dom implementation implements a specific feature
	 * @link http://www.php.net/manual/en/domimplementation.hasfeature.php
	 * @param String $feature <p>
	 * The feature to test.
	 * </p>
	 * @param String $version <p>
	 * The version number of the feature to test. In
	 * level 2, this can be either 2.0 or
	 * 1.0.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function hasFeature ($feature, $version) {}

	/**
	 * Creates an empty DomDocumentType object
	 * @link http://www.php.net/manual/en/domimplementation.createdocumenttype.php
	 * @param [String] $qualifiedName <p>
	 * The qualified name of the document type to create.
	 * </p>
	 * @param [String] $publicId <p>
	 * The external subset public identifier.
	 * </p>
	 * @param [String] $systemId <p>
	 * The external subset system identifier.
	 * </p>
	 * @return DomDocumentType A new DomDocumentType node with its
	 * ownerDocument set to &null;.
	 */
	public function createDocumentType ($qualifiedName = null, $publicId = null, $systemId = null) {}

	/**
	 * Creates a DomDocument object of the specified type with its document element
	 * @link http://www.php.net/manual/en/domimplementation.createdocument.php
	 * @param [String] $namespaceURI <p>
	 * The namespace URI of the document element to create.
	 * </p>
	 * @param [String] $qualifiedName <p>
	 * The qualified name of the document element to create.
	 * </p>
	 * @param [DomDocumentType] $doctype <p>
	 * The type of document to create or &null;.
	 * </p>
	 * @return DomDocument A new DomDocument object. If
	 * namespaceURI, qualifiedName,
	 * and doctype are null, the returned
	 * DomDocument is empty with no document element
	 */
	public function createDocument ($namespaceURI = null, $qualifiedName = null, DomDocumentType $doctype = null) {}

}
