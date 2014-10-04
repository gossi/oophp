<?php

namespace php\dom;

class Xml {
	
	/**
	 * Node is a DOMElement
	 * @link http://www.php.net/manual/en/dom.constants.php
	 */
	const ELEMENT_NODE = 1;
	
	/**
	 * Node is a DOMAttr
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const ATTRIBUTE_NODE = 2;
	
	/**
	 * Node is a DOMText
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const TEXT_NODE = 3;
	
	/**
	 * Node is a DOMCharacterData
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const CDATA_SECTION_NODE = 4;
	
	/**
	 * Node is a DOMEntityReference
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const ENTITY_REF_NODE = 5;
	
	/**
	 * Node is a DOMEntity
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const ENTITY_NODE = 6;
	
	/**
	 * Node is a DOMProcessingInstruction
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const PI_NODE = 7;
	
	/**
	 * Node is a DOMComment
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const COMMENT_NODE = 8;
	
	/**
	 * Node is a DOMDocument
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const DOCUMENT_NODE = 9;
	
	/**
	 * Node is a DOMDocumentType
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const DOCUMENT_TYPE_NODE = 10;
	
	/**
	 * Node is a DOMDocumentFragment
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const DOCUMENT_FRAG_NODE = 11;
	
	/**
	 * Node is a DOMNotation
	 * @link http://www.php.net/manual/en/dom.constants.php
	*/
	const NOTATION_NODE = 12;
	const HTML_DOCUMENT_NODE = 13;
	const DTD_NODE = 14;
	const ELEMENT_DECL_NODE = 15;
	const ATTRIBUTE_DECL_NODE = 16;
	const ENTITY_DECL_NODE = 17;
	const NAMESPACE_DECL_NODE = 18;
	const LOCAL_NAMESPACE = 18;
	const ATTRIBUTE_CDATA = 1;
	const ATTRIBUTE_ID = 2;
	const ATTRIBUTE_IDREF = 3;
	const ATTRIBUTE_IDREFS = 4;
	const ATTRIBUTE_ENTITY = 6;
	const ATTRIBUTE_NMTOKEN = 7;
	const ATTRIBUTE_NMTOKENS = 8;
	const ATTRIBUTE_ENUMERATION = 9;
	const ATTRIBUTE_NOTATION = 10;
	
}
