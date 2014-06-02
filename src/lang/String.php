<?php

namespace php\lang;

class String implements ArrayAccess, Comparable {
	
	private $string;
	
	public function __construct($string = '') {
		$this->string = $string;
	}
	
	/*
	 * Convenience methods
	 */
	
	public function isEmpty() {
		return empty($this->string);
	}
	
	/**
	 * Get string length
	 *
	 * @return int Returns the length
	 */
	public function length() {
		return strlen($this->string);
	}
	
	/*
	 * Mutators
	 */
	
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
	
	/*
	 * Comparison
	 */
	
	public function compareTo($compare) {
		return $this->compare($compare, 'strcmp');
	}

	public function compareCaseInsensitive($compare) {
		return $this->compare($compare, 'strcasecmp');
	}

	/**
	 * 
	 * @param string $compare string to compare to
	 * @param callable $callback
	 */
	public function compare($compare, callable $callback) {
		return $callback($this->string, $compare);
	}
	
	/*
	 * Slicing methods
	 */
	
	public function slice($offset, $length = null) {
		$offset = $this->prepareOffset($offset);
		$length = $this->prepareLength($offset, $length);
	
		if (0 === $length) {
			return '';
		}
	
		return new String(substr($this->string, $offset, $length));
	}
	
	public function replaceSlice($replacement, $offset, $length = null) {
		$offset = $this->prepareOffset($offset);
		$length = $this->prepareLength($offset, $length);
	
		return new String(substr_replace($this->string, $replacement, $offset, $length));
	}
	
	public function substring($start, $end) {
		
	}
	
	/*
	 * Replacing methods 
	 */
	
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
	 * @return String
	 */
	public function replace($search, $replace) {
		return new String(str_replace($search, $replace, $this->string));
	}
	
	/*
	 * Search methods
	 */
	
	public function indexOf($string, $offset = 0) {
		$offset = $this->prepareOffset($offset);
	
		if ('' === $string) {
			return $offset;
		}
	
		return strpos($this->string, $string, $offset);
	}
	
	public function lastIndexOf($string, $offset = null) {
		if (null === $offset) {
			$offset = $this->length();
		} else {
			$offset = $this->prepareOffset($offset);
		}
	
		if ('' === $string) {
			return $offset;
		}
	
		/* Converts $offset to a negative offset as strrpos has a different
		 * behavior for positive offsets. */
		return strrpos($this, $string, $offset - $this->length());
	}
	

	public function startsWith($search) {
		return $this->indexOf($search) === 0;
	}
	
	public function endsWith($search) {
		return substr($this->string, -strlen($search)) === $search;
	}
	
	public function contains($string) {
		return false !== $this->indexOf($string);
	}
	
	public function count($string, $offset = 0, $length = null) {
		$offset = $this->prepareOffset($offset);
		$length = $this->prepareLength($offset, $length);
	
		if ('' === $string) {
			return $length + 1;
		}
	
		return substr_count($this->string, $string, $offset, $length);
	}

	/*
	 * Formatting methods
	 */
	
	// should this be in a formatter?
	public function format() {
		return vsprintf($this->string, func_get_args());
	}

	
	/**
	 * Returns a lowercased copy of the string
	 * 
	 * @return String
	 */
	public function lower() {
		return new String(strtolower($this->string));
	}
	
	/**
	 * Returns a copy of the string with the first character lowercased
	 *
	 * @return String
	 */
	public function lowerFirst() {
		return new String(lcfirst($this->string));
	}
	
	/**
	 * Returns an uppercased copy of the string
	 *
	 * @return String
	 */
	public function upper() {
		return new String(strtoupper($this->string));
	}
	
	/**
	 * Returns a copy of the string with the first character uppercased
	 *
	 * @return String
	 */
	public function upperFirst() {
		return new String(ucfirst($this->string));
	}
	
	/**
	 * Returns a copy of the string with the first character of each word uppercased
	 * 
	 * @return String
	 */
	public function upperWords() {
		return new String(ucwords($this->string));
	}
	
	/**
	 * Returns a copy of the string with only its first character capitalized.
	 * 
	 * @return String 
	 */
	public function capitalize() {
		return $this->lower()->upperFirst();
	}
	
	/**
	 * Returns a copy of the string with the words capitalized.
	 * 
	 * @return String
	 */
	public function capitalizeWords() {
		return $this->lower()->upperWords();
	}
	
	/**
	 * Strip whitespace (or other characters) from the beginning and end of the string
	 * 
	 * @param string $mask 
	 * 		Optionally, the stripped characters can also be specified using the mask parameter. 
	 * 		Simply list all characters that you want to be stripped. With .. you can specify a 
	 * 		range of characters.
	 *  
	 * @return String $this for fluent API support
	 */
	public function trim($characters = " \t\n\r\v\0") {
		trim($this->string, $characters);
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
	 * @return String $this for fluent API support
	 */
	public function trimLeft($characters = " \t\n\r\v\0") {
		ltrim($this->string, $characters);
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
	 * @return String $this for fluent API support
	 */
	public function trimRight($characters = " \t\n\r\v\0") {
		rtrim($this->string, $characters);
		return $this;
	}

	public function padLeft($length, $padString = " ") {
		$this->string = str_pad($this->string, $length, $padString, STR_PAD_LEFT);
		return $this;
	}
	
	public function padRight($length, $padString = " ") {
		$this->string = str_pad($this->string, $length, $padString, STR_PAD_RIGHT);
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
	 * @return String Returns the string wrapped at the specified length. 
	 */
	public function wrapWords($width = 75, $break = "\n", $cut = false) {
		return new String(wordwrap($this->string, $width, $break, $cut));
	}
	
	public function repeat($times) {
		$this->verifyNotNegative($times, 'Number of repetitions');
		return new String(str_repeat($this->string, $times));
	}
	
	public function reverse() {
		return new String(strrev($this->string));
	}
	
	/*
	 * Array conversion
	 */
	
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
	 * @return ArrayObject
	 * 		Returns an array of strings created by splitting the string parameter on boundaries
	 * 		formed by the delimiter.
	 *
	 * 		If delimiter is an empty string (""), split() will return FALSE. If delimiter contains
	 * 		a value that is not contained in string and a negative limit is used, then an empty
	 * 		array will be returned, otherwise an array containing string will be returned.
	 *
	 * 		TODO: Maybe throw an exception or something on those odd delimiters?
	 */
	public function split($delimiter, $limit = null) {
		if ($limit) {
			return new ArrayObject(explode($delimiter, $this->string, $limit));
		} else {
			return new ArrayObject(explode($delimiter, $this->string));
		}
	}
	
	/**
	 * Join array elements with a string
	 *
	 * @param array $pieces The array of strings to join.
	 * @param string $glue Defaults to an empty string.
	 * @return String
	 * 		Returns a string containing a string representation of all the array elements in the
	 * 		same order, with the glue string between each element.
	 * 
	 * @TODO: Convenience method? Remove it in favor of ArrayObject.join() ?
	 */
	public static function join(array $pieces, $glue = '') {
		return new String(implode($pieces, $glue));
	}
	
	/**
	 * Convert the string to an array
	 * 
	 * @param int $splitLength Maximum length of the chunk. 
	 * 
	 * @return ArrayObject
	 * 		If the optional splitLength parameter is specified, the returned array will be 
	 * 		broken down into chunks with each being splitLength in length, otherwise each chunk 
	 * 		will be one character in length.
	 * 
	 * 		FALSE is returned if splitLength is less than 1. If the split_length length exceeds 
	 * 		the length of string, the entire string is returned as the first (and only) array 
	 * 		element. 
	 */
	public function chunk($splitLength = 1) {
		return new ArrayObject(str_split($this->string, $splitLength));
	}
	
	/*
	 * Some magic here
	 */
	
	public function __toString() {
		return $this->string;
	}
	
	/**
	 * @internal
	 */
	public function offsetSet($offset, $value) {
		if (!is_null($offset)) {
			$this->string[$offset] = $value;
		}
	}
	
	/**
	 * @internal
	 */
	public function offsetExists($offset) {
		return isset($this->string[$offset]);
	}
	
	/**
	 * @internal
	 */
	public function offsetUnset($offset) {
		unset($this->string[$offset]);
	}
	
	/**
	 * @internal
	 */
	public function offsetGet($offset) {
		return isset($this->string[$offset]) ? $this->string[$offset] : null;
	}
	
	protected function prepareOffset($offset) {
		$len = $this->length();
		if ($offset < -$len || $offset > $len) {
			throw new \InvalidArgumentException('Offset must be in range [-len, len]');
		}
	
		if ($offset < 0) {
			$offset += $len;
		}
	
		return $offset;
	}
	
	protected function prepareLength($offset, $length) {
		if (null === $length) {
			return $this->length() - $offset;
		}
	
		if ($length < 0) {
			$length += $this->length() - $offset;
	
			if ($length < 0) {
				throw new \InvalidArgumentException('Length too small');
			}
		} else {
			if ($offset + $length > $this->length()) {
				throw new \InvalidArgumentException('Length too large');
			}
		}
	
		return $length;
	}
	
	protected function verifyPositive($value, $name) {
		if ($value <= 0) {
			throw new \InvalidArgumentException("$name has to be positive");
		}
	}
	
	protected function verifyNotNegative($value, $name) {
		if ($value < 0) {
			throw new \InvalidArgumentException("$name can not be negative");
		}
	}
	
	protected function replacePairs($replacements, $limit) {
		if (null === $limit) {
			return strtr($this, $replacements);
		}
	
		$this->verifyPositive($limit, 'Limit');
		$str = $this;
		foreach ($replacements as $from => $to) {
			$str = $this->replaceWithLimit($str, $from, $to, $limit);
			if (0 === $limit) {
				break;
			}
		}
		return $str;
	}
	
	protected function replaceWithLimit($str, $from, $to, &$limit) {
		$lenDiff = $to->length() - $from->length();
		$index = 0;
	
		while (false !== $index = $str->indexOf($from, $index)) {
			$str = $str->replaceSlice($to, $index, $to->length());
			$index += $lenDiff;
	
			if (0 === --$limit) {
				break;
			}
		}
	
		return $str;
	}
}