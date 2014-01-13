<?php

namespace php\date;

/**
 * 
 * @property $y int Number of years. 
 * @property $m int Number of months. 
 * @property $d int Number of days.
 * @property $h int Number of hours.
 * @property $i int Number of minutes.
 * @property $s int Number of seconds
 * @property $invert int Is 1 if the interval represents a negative time period and 0 otherwise. 
 * 		See DateInterval::format().
 * @property $days mixed If the DateInterval object was created by DateTime::diff(), then this 
 * 		is the total number of days between the start and end dates. Otherwise, days will be FALSE. 
 */
class DateInterval {

	private $interval;

	/**
	 * Creates a new DateInterval object. 
	 * 
	 * @param String $interval_spec An interval specification.
	 * 		The format starts with the letter P, for "period." Each duration 
	 * 		period is represented by an integer value followed by a period designator. 
	 * 		If the duration contains time elements, that portion of the specification is 
	 * 		preceded by the letter T.
	 */
	public function __construct($interval_spec) {
		$this->interval = new \DateInterval($interval_spec); 
	}
	
	/**
	 * Sets up a DateInterval from the relative parts of the string
	 * 
	 * @param string $time
	 * @return DateInterval
	 */
	public static function createFromDateString($time) {
		return new DateInterval($time);
	}

	/**
	 * Formats the interval
	 * 
	 * @see http://php.net/manual/dateinterval.format.php
	 * @param string $format The format.
	 * @return string Returns the formatted interval. 
	 */
	public function format($format) {
		return $this->interval->format($format);
	}
	
	/**
	 * @internal
	 */
	public function __get($name) {
		return $this->interval->$name;
	}
	
	/**
	 * @internal
	 * @param unknown $name
	 * @param unknown $value
	 */
	public function __set($name, $value) {
		$this->interval->$name = $value;
	}
}