<?php

namespace php\json;

use php\json\exception\JsonException;
use php\lang\String;
use php\lang\ArrayObject;

/**
 * Json functionality
 * 
 * TODO: Why do have json_encode and json_decode switched parameters?
 *
 */
class Json {
	
	/**
	 * No error has occurred. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 */
	const ERROR_NONE = 0; 
	
	/**
	 * The maximum stack depth has been exceeded. 
	 * 
	 * Available since PHP 5.3.0. 
	 * 
	 * @var integer
	 */
	const ERROR_DEPTH = 1;
	
	/**
	 * Occurs with underflow or with the modes mismatch. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 */
	const ERROR_STATE_MISMATCH = 2;
	
	/**
	 * Control character error, possibly incorrectly encoded. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 **/
	const ERROR_CTRL_CHAR = 3;
	
	/**
	 * Syntax error. Available since PHP 5.3.0.
	 * @var integer
	 **/
	const ERROR_SYNTAX = 4;
	
	/**
	 * Malformed UTF-8 characters, possibly incorrectly encoded. 
	 * 
	 * This constant is available as of PHP 5.3.3.
	 * 
	 * @var integer
	 **/
	const ERROR_UTF8 = 5;
	
	/**
	 * The object or array passed to json_encode() include recursive references and 
	 * cannot be encoded. If the constant PARTIAL_OUTPUT_ON_ERROR option was given, NULL 
	 * will be encoded in the place of the recursive reference.
	 * 
	 * This constant is available as of PHP 5.5.0.
	 * 
	 * @var integer
	 **/
	const ERROR_RECURSION = 6;
	
	/**
	 * The value passed to json_encode() includes either NAN or INF. If the constant 
	 * PARTIAL_OUTPUT_ON_ERROR option was given, 0 will be encoded in the place of 
	 * these special numbers.
	 * 
	 * This constant is available as of PHP 5.5.0.
	 * 
	 * @var integer
	 * @TODO: Correct value
	 **/
// 	const ERROR_INF_OR_NAN = -1;

	/**
	 * A value of an unsupported type was given to json_encode(), such as a resource. If the 
	 * constant PARTIAL_OUTPUT_ON_ERROR option was given, NULL will be encoded in the place 
	 * of the unsupported value.
	 * 
	 * This constant is available as of PHP 5.5.0.
	 *  
	 * @var integer
	 * @TODO: Correct value
	 **/
// 	const ERROR_UNSUPPORTED_TYPE = -1;
	
	/**
	 * All < and > are converted to \u003C and \u003E. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 **/
	const HEX_TAG = 1;
	
	/**
	 * All &s are converted to \u0026. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 **/
	const HEX_AMP = 2;
	
	/**
	 * All ' are converted to \u0027. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 **/
	const HEX_APOS = 4;
	
	/**
	 * All " are converted to \u0022. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 **/
	const HEX_QUOT = 8;

	/**
	 * Outputs an object rather than an array when a non-associative array is used. 
	 * Especially useful when the recipient of the output is expecting an object and the 
	 * array is empty. 
	 * 
	 * Available since PHP 5.3.0.
	 * 
	 * @var integer
	 **/
	const FORCE_OBJECT = 16;

	/**
	 * Encodes numeric strings as numbers. Available since PHP 5.3.3.
	 * @var integer
	 **/
	const NUMERIC_CHECK = 32;

	/**
	 * Encodes large integers as their original string value. 
	 * 
	 * Available since PHP 5.4.0.
	 * 
	 * @var integer
	 **/
	const BIGINT_AS_STRING = 2;

	/**
	 * Use whitespace in returned data to format it. 
	 * 
	 * Available since PHP 5.4.0.
	 * 
	 * @var integer
	 **/
	const PRETTY_PRINT = 128;

	/**
	 * Don't escape /. Available since PHP 5.4.0.
	 * @var integer
	 **/
	const UNESCAPED_SLASHES = 64;

    /**
	 * Encode multibyte Unicode characters literally (default is to escape 
	 * as \uXXXX). 
	 * 
	 * Available since PHP 5.4.0.
	 * 
	 * @var integer
	 **/
	const UNESCAPED_UNICODE = 256;

	/**
	 * 
	 * @param mixed $data
	 * @param integer $options
	 * @param integer $depth
	 * @throws JsonException if something gone wrong
	 * @return string
	 */
	public static function encode($data, $options = 0, $depth = 512) {
		$out = json_encode($data, $options, $depth);
		self::checkForError();

		return new String($out);
	}
	
	/**
	 * Decodes a JSON string
	 * 
	 * @param string $json
	 * @param boolean $assoc
	 * @param int $options
	 * @param int $depth
	 * @throws JsonException if something gone wrong
	 * @return mixed|ArrayObject
	 */
	public static function decode($json, $assoc = true, $options = 0, $depth = 512) {
		$out = json_decode($json, $assoc, $depth, $options);
		self::checkForError();
		
		if ($assoc) {
			return new ArrayObject($out);
		}
		
		return $out;
	}
	
	private static function checkForError() {
		$error = json_last_error();
		
		if ($error !== Json::ERROR_NONE) {
			throw new JsonException(json_last_error_msg(), $error);
		}
	}
}