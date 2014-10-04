<?php
namespace php\dom;

use php\lang\String;
use php\lang\Integer;

class DomDocument extends DomNode {

	/**
	 * Create new element node
	 * 
	 * @link http://www.php.net/manual/en/domdocument.createelement.php
	 * @param String $name <p>
	 * The tag name of the element.
	 * </p>
	 * @param String $value <p>
	 * The value of the element. By default, an empty element will be created.
	 * The value can also be set later with DomElement::$nodeValue.
	 * </p>
	 * @return DomElement a new instance of class DomElement or false
	 * if an error occured.
	 */
	public function createElement ($name, $value = null) {}
	
	/**
	 * Create new document fragment
	 * 
	 * @link http://www.php.net/manual/en/domdocument.createdocumentfragment.php
	 * @return DomDocumentFragment The new DomDocumentFragment or false if an error occured.
	 */
	public function createDocumentFragment () {}
	
	/**
	 * Create new text node
	 * 
	 * @link http://www.php.net/manual/en/domdocument.createtextnode.php
	 * @param String $content <p>
	 * The content of the text.
	 * </p>
	 * @return DomText The new DomText or false if an error occured.
	 */
	public function createTextNode ($content) {}
	
	/**
	 * Create new comment node
	 * 
	 * @link http://www.php.net/manual/en/domdocument.createcomment.php
	 * @param String $data <p>
	 * The content of the comment.
	 * </p>
	 * @return DomComment The new DomComment or false if an error occured.
	 */
	public function createComment ($data) {}
	
	/**
	 * Create new cdata node
	 * 
	 * @link http://www.php.net/manual/en/domdocument.createcdatasection.php
	 * @param String $data <p>
	 * The content of the cdata.
	 * </p>
	 * @return DomCdataSection The new DomCdataSection or false if an error occured.
	 */
	public function createCdataSection ($data) {}
	
	/**
	 * Creates new PI node
	 * @link http://www.php.net/manual/en/domdocument.createprocessinginstruction.php
	 * @param String $target <p>
	 * The target of the processing instruction.
	 * </p>
	 * @param String $data <p>
	 * The content of the processing instruction.
	 * </p>
	 * @return DomProcessingInstruction The new DomProcessingInstruction or false if an error occured.
	 */
	public function createProcessingInstruction ($target, $data = null) {}
	
	/**
	 * Create new attribute
	 * @link http://www.php.net/manual/en/domdocument.createattribute.php
	 * @param String $name <p>
	 * The name of the attribute.
	 * </p>
	 * @return DomAttr The new DomAttr or false if an error occured.
	 */
	public function createAttribute ($name) {}
	
	/**
	 * Create new entity reference node
	 * @link http://www.php.net/manual/en/domdocument.createentityreference.php
	 * @param String $name <p>
	 * The content of the entity reference, e.g. the entity reference minus
	 * the leading &amp; and the trailing
	 * ; characters.
	 * </p>
	 * @return DomEntityReference The new DomEntityReference or false if an error
	 * occured.
	 */
	public function createEntityReference ($name) {}
	
	/**
	 * Searches for all elements with given local tag name
	 * @link http://www.php.net/manual/en/domdocument.getelementsbytagname.php
	 * @param String $name <p>
	 * The local name (without namespace) of the tag to match on. The special value *
	 * matches all tags.
	 * </p>
	 * @return DomNodeList A new DomNodeList object containing all the matched
	 * elements.
	 */
	public function getElementsByTagName ($name) {}
	
	/**
	 * Import node into current document
	 * @link http://www.php.net/manual/en/domdocument.importnode.php
	 * @param DomNode $importedNode <p>
	 * The node to import.
	 * </p>
	 * @param bool $deep <p>
	 * If set to true, this method will recursively import the subtree under
	 * the importedNode.
	 * </p>
	 * <p>
	 * To copy the nodes attributes deep needs to be set to true
	 * </p>
	 * @return DomNode The copied node or false, if it cannot be copied.
	 */
	public function importNode (DomNode $importedNode, $deep = null) {}
	
	/**
	 * Create new element node with an associated namespace
	 * @link http://www.php.net/manual/en/domdocument.createelementns.php
	 * @param String $namespaceURI <p>
	 * The URI of the namespace.
	 * </p>
	 * @param String $qualifiedName <p>
	 * The qualified name of the element, as prefix:tagname.
	 * </p>
	 * @param String $value <p>
	 * The value of the element. By default, an empty element will be created.
	 * You can also set the value later with DomElement::$nodeValue.
	 * </p>
	 * @return DomElement The new DomElement or false if an error occured.
	 */
	public function createElementNS ($namespaceURI, $qualifiedName, $value = null) {}
	
	/**
	 * Create new attribute node with an associated namespace
	 * @link http://www.php.net/manual/en/domdocument.createattributens.php
	 * @param String $namespaceURI <p>
	 * The URI of the namespace.
	 * </p>
	 * @param String $qualifiedName <p>
	 * The tag name and prefix of the attribute, as prefix:tagname.
	 * </p>
	 * @return DomAttr The new DomAttr or false if an error occured.
	 */
	public function createAttributeNS ($namespaceURI, $qualifiedName) {}
	
	/**
	 * Searches for all elements with given tag name in specified namespace
	 * @link http://www.php.net/manual/en/domdocument.getelementsbytagnamens.php
	 * @param String $namespaceURI <p>
	 * The namespace URI of the elements to match on.
	 * The special value * matches all namespaces.
	 * </p>
	 * @param String $localName <p>
	 * The local name of the elements to match on.
	 * The special value * matches all local names.
	 * </p>
	 * @return DomNodeList A new DomNodeList object containing all the matched
	 * elements.
	 */
	public function getElementsByTagNameNS ($namespaceURI, $localName) {}
	
	/**
	 * Searches for an element with a certain id
	 * @link http://www.php.net/manual/en/domdocument.getelementbyid.php
	 * @param String $elementId <p>
	 * The unique id value for an element.
	 * </p>
	 * @return DomElement the DomElement or &null; if the element is
	 * not found.
	 */
	public function getElementById ($elementId) {}
	
	/**
	 * @param DomNode $source
	 */
	public function adoptNode (DomNode $source) {}
	
	/**
	 * Normalizes the document
	 * @link http://www.php.net/manual/en/domdocument.normalizedocument.php
	 * @return void
	 */
	public function normalizeDocument () {}
	
	/**
	 * @param DomNode $node
	 * @param String $namespaceURI
	 * @param String $qualifiedName
	 */
	public function renameNode (DomNode $node, $namespaceURI, $qualifiedName) {}
	
	/**
	 * Load XML from a file
	 * @link http://www.php.net/manual/en/domdocument.load.php
	 * @param String $filename <p>
	 * The path to the XML document.
	 * </p>
	 * @param Integer $options <p>
	 * Bitwise OR
	 * of the libxml option constants.
	 * </p>
	 * @return mixed Returns true on success or false on failure. If called statically, returns a
	 * DomDocument or false on failure.
	 */
	public function load ($filename, $options = null) {}
	
	/**
	 * Dumps the internal XML tree back into a file
	 * @link http://www.php.net/manual/en/domdocument.save.php
	 * @param String $filename <p>
	 * The path to the saved XML document.
	 * </p>
	 * @param Integer $options <p>
	 * Additional Options. Currently only LIBXML_NOEMPTYTAG is supported.
	 * </p>
	 * @return int the number of bytes written or false if an error occurred.
	 */
	public function save ($filename, $options = null) {}
	
	/**
	 * Load XML from a string
	 * @link http://www.php.net/manual/en/domdocument.loadxml.php
	 * @param String $source <p>
	 * The string containing the XML.
	 * </p>
	 * @param Integer $options <p>
	 * Bitwise OR
	 * of the libxml option constants.
	 * </p>
	 * @return mixed Returns true on success or false on failure. If called statically, returns a
	 * DomDocument or false on failure.
	 */
	public function loadXML ($source, $options = null) {}
	
	/**
	 * Dumps the internal XML tree back into a string
	 * @link http://www.php.net/manual/en/domdocument.savexml.php
	 * @param DomNode $node <p>
	 * Use this parameter to output only a specific node without XML declaration
	 * rather than the entire document.
	 * </p>
	 * @param Integer $options <p>
	 * Additional Options. Currently only LIBXML_NOEMPTYTAG is supported.
	 * </p>
	 * @return String the XML, or false if an error occurred.
	 */
	public function saveXML (DomNode $node = null, $options = null) {}
	
	/**
	 * Creates a new DomDocument object
	 * @link http://www.php.net/manual/en/domdocument.construct.php
	 * @param String $version
	 * @param String $encoding
	 */
	public function __construct ($version = '1.0', $encoding = 'utf-8') {}
	
	/**
	 * Validates the document based on its DTD
	 * @link http://www.php.net/manual/en/domdocument.validate.php
	 * @return bool Returns true on success or false on failure.
	 * If the document have no DTD attached, this method will return false.
	 */
	public function validate () {}
	
	/**
	 * Substitutes XIncludes in a DomDocument Object
	 * @link http://www.php.net/manual/en/function.domdocument-xinclude.php
	 * @param Integer $options <p>
	 * libxml parameters. Available
	 * since PHP 5.1.0 and Libxml 2.6.7.
	 * </p>
	 * @return Integer the number of XIncludes in the document, -1 if some processing failed,
	 * or false if there were no substitutions.
	 */
	public function xinclude ($options = null) {}
	
	/**
	 * Load HTML from a string
	 * @link http://www.php.net/manual/en/domdocument.loadhtml.php
	 * @param String $source <p>
	 * The HTML string.
	 * </p>
	 * @return bool Returns true on success or false on failure. If called statically, returns a
	 * DomDocument or false on failure.
	 */
	public function loadHTML ($source) {}
	
	/**
	 * Load HTML from a file
	 * @link http://www.php.net/manual/en/domdocument.loadhtmlfile.php
	 * @param String $filename <p>
	 * The path to the HTML file.
	 * </p>
	 * @return bool Returns true on success or false on failure. If called statically, returns a
	 * DomDocument or false on failure.
	 */
	public function loadHTMLFile ($filename) {}
	
	/**
	 * Dumps the internal document into a string using HTML formatting
	 * @link http://www.php.net/manual/en/domdocument.savehtml.php
	 * @param DomNode $node <p>
	 * Optional parameter to output a subset of the document.
	 * </p>
	 * @return String the HTML, or false if an error occurred.
	 */
	public function saveHTML (DomNode $node = null) {}
	
	/**
	 * Dumps the internal document into a file using HTML formatting
	 * @link http://www.php.net/manual/en/domdocument.savehtmlfile.php
	 * @param String $filename <p>
	 * The path to the saved HTML document.
	 * </p>
	 * @return Integer the number of bytes written or false if an error occurred.
	 */
	public function saveHTMLFile ($filename) {}
	
	/**
	 * Validates a document based on a schema
	 * @link http://www.php.net/manual/en/domdocument.schemavalidate.php
	 * @param String $filename <p>
	 * The path to the schema.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function schemaValidate ($filename) {}
	
	/**
	 * Validates a document based on a schema
	 * @link http://www.php.net/manual/en/domdocument.schemavalidatesource.php
	 * @param String $source <p>
	 * A string containing the schema.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function schemaValidateSource ($source) {}
	
	/**
	 * Performs relaxNG validation on the document
	 * @link http://www.php.net/manual/en/domdocument.relaxngvalidate.php
	 * @param String $filename <p>
	 * The RNG file.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function relaxNGValidate ($filename) {}
	
	/**
	 * Performs relaxNG validation on the document
	 * @link http://www.php.net/manual/en/domdocument.relaxngvalidatesource.php
	 * @param String $source <p>
	 * A string containing the RNG schema.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function relaxNGValidateSource ($source) {}
	
	/**
	 * Register extended class used to create base node type
	 * @link http://www.php.net/manual/en/domdocument.registernodeclass.php
	 * @param String $baseclass <p>
	 * The Dom class that you want to extend. You can find a list of these
	 * classes in the chapter introduction.
	 * </p>
	 * @param String $extendedclass <p>
	 * Your extended class name. If &null; is provided, any previously
	 * registered class extending baseclass will
	 * be removed.
	 * </p>
	 * @return bool Returns true on success or false on failure.
	 */
	public function registerNodeClass ($baseclass, $extendedclass) {}
	
}
