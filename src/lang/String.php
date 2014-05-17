<?php

namespace php\lang;

class String {
	
	private $string;
	
	public function __construct($string = '') {
		$this->string = $string;
	}
	
	public function append($string) {
		$this->string .= $string;
		
		return $this;
	}
	
	public function prepend($string) {
		$this->string = $string . $this->string;
		
		return $this;
	}
	
	public function set($string) {
		$this->string = $string;
		
		return $this;
	}
	
	/**
	 * Get string length
	 * 
	 * @return int Returns the length
	 */
	public function length() {
		return strlen($this->string);
	}
	
	/**
	 * Splits the string by string
	 * 
	 * @param string $delimiter The boundary string. 
	 * @param integer $limit 
	 * 		If limit is set and positive, the returned array will contain a maximum of 
	 * 		limit elements with the last element containing the rest of string.
	 * 
	 * 		If the limit parameter is negative, all components except the last 
	 * 		-limit are returned.
	 * 
	 * 		If the limit parameter is zero, then this is treated as 1.
	 * 
	 * @return array 
	 * 		Returns an array of strings created by splitting the string parameter on boundaries 
	 * 		formed by the delimiter. 
	 * 
	 * 		If delimiter is an empty string (""), split() will return FALSE. If delimiter contains 
	 * 		a value that is not contained in string and a negative limit is used, then an empty 
	 * 		array will be returned, otherwise an array containing string will be returned. 
	 */
	public function split($delimiter, $limit = null) {
		if ($limit) {
			return explode($delimiter, $this->string, $limit);
		} else {
			return explode($delimiter, $this->string);
		}
	}

	/**
	 * Join array elements with a string
	 * 
	 * @param array $pieces The array of strings to join. 
	 * @param string $glue Defaults to an empty string. 
	 * @return \php\lang\String 
	 * 		Returns a string containing a string representation of all the array elements in the 
	 * 		same order, with the glue string between each element. 
	 */
	public static function join(array $pieces, $glue = '') {
		return new String(implode($pieces, $glue));
	}
	
	public function isEmpty() {
		return empty($this->string);
	}
	
	public function format() {
		return vsprintf($this->string, func_get_args());
	}
	
	public function startsWith($search) {
		return strpos($this->string, $search) === 0;
	}
	
	public function endsWith($search) {
		return substr($this->string, -strlen($search)) === $search;
	}
	
	/**
	 * Returns a lowercased copy of the string
	 * 
	 * @return \php\lang\String
	 */
	public function lower() {
		return new String(strtolower($this->string));
	}
	
	/**
	 * Returns a copy of the string with the first character lowercased
	 *
	 * @return \php\lang\String
	 */
	public function lowerFirst() {
		return new String(lcfirst($this->string));
	}
	
	/**
	 * Returns an uppercased copy of the string
	 *
	 * @return \php\lang\String
	 */
	public function upper() {
		return new String(strtoupper($this->string));
	}
	
	/**
	 * Returns a copy of the string with the first character uppercased
	 *
	 * @return \php\lang\String
	 */
	public function upperFirst() {
		return new String(ucfirst($this->string));
	}
	
	/**
	 * Returns a copy of the string with the first character of each word uppercased
	 * 
	 * @return \php\lang\String
	 */
	public function upperWords() {
		return new String(ucwords($this->string));
	}
	
	/**
	 * Returns a copy of the string with only its first character capitalized.
	 * 
	 * @return \php\lang\String 
	 */
	public function capitalize() {
		return $this->lower()->upperFirst();
	}
	
	/**
	 * Returns a copy of the string with the words capitalized.
	 * 
	 * @return \php\lang\String
	 */
	public function capitalizeWords() {
		return $this->lower()->upperWords();
	}
	
	/**
	 * Replace all occurrences of the search string with the replacement string
	 * 
	 * @param array|string $search 
	 * 		The value being searched for, otherwise known as the needle. An array may be used 
	 * 		to designate multiple needles. 
	 * @param array|string $replace
	 * 		The replacement value that replaces found search values. An array may be used to 
	 * 		designate multiple replacements. 
	 * 
	 * @return \php\lang\String
	 */
	public function replace($search, $replace) {
		return new String(str_replace($search, $replace, $this->string));
	}
	
	/**
	 * Strip whitespace (or other characters) from the beginning and end of the string
	 * 
	 * @param string $mask 
	 * 		Optionally, the stripped characters can also be specified using the mask parameter. 
	 * 		Simply list all characters that you want to be stripped. With .. you can specify a 
	 * 		range of characters.
	 *  
	 * @return \php\lang\String $this for fluent API support
	 */
	public function trim($mask = null) {
		if ($mask) {
			trim($this->string, $mask);
		} else {
			trim($this->string);
		}
		
		return $this;
	}
	
	/**
	 * Strip whitespace (or other characters) from the beginning of the string
	 *
	 * @param string $mask
	 * 		Optionally, the stripped characters can also be specified using the mask parameter.
	 * 		Simply list all characters that you want to be stripped. With .. you can specify a
	 * 		range of characters.
	 *
	 * @return \php\lang\String $this for fluent API support
	 */
	public function ltrim($mask = null) {
		if ($mask) {
			ltrim($this->string, $mask);
		} else {
			ltrim($this->string);
		}
		return $this;
	}
	
	/**
	 * Strip whitespace (or other characters) from the end of the string
	 *
	 * @param string $mask
	 * 		Optionally, the stripped characters can also be specified using the mask parameter.
	 * 		Simply list all characters that you want to be stripped. With .. you can specify a
	 * 		range of characters.
	 *
	 * @return \php\lang\String $this for fluent API support
	 */
	public function rtrim($mask = null) {
		if ($mask) {
			rtrim($this->string, $mask);
		} else {
			rtrim($this->string);
		}
		
		return $this;
	}
	
	/**
	 * Returns a copy of the string wrapped at a given number of characters
	 * 
	 * @param number $width The number of characters at which the string will be wrapped. 
	 * @param string $break The line is broken using the optional break parameter. 
	 * @param string $cut 
	 * 		If the cut is set to TRUE, the string is always wrapped at or before the specified 
	 * 		width. So if you have a word that is larger than the given width, it is broken apart. 
	 * @return \php\lang\String Returns the string wrapped at the specified length. 
	 */
	public function wrapWords($width = 75, $break = "\n", $cut = false) {
		return new String(wordwrap($this->string, $width, $break, $cut));
	}
	
	/**
	 * Convert the string to an array
	 * 
	 * @param int $splitLength Maximum length of the chunk. 
	 * 
	 * @return array 
	 * 		If the optional splitLength parameter is specified, the returned array will be 
	 * 		broken down into chunks with each being splitLength in length, otherwise each chunk 
	 * 		will be one character in length.
	 * 
	 * 		FALSE is returned if splitLength is less than 1. If the split_length length exceeds 
	 * 		the length of string, the entire string is returned as the first (and only) array 
	 * 		element. 
	 */
	public function toArray($splitLength = 1) {
		return str_split($this->string, $splitLength);
	}
	
	public function __toString() {
		return $this->string;
	}
}