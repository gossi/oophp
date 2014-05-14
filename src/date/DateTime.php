<?php

namespace php\date;

class DateTime implements DateTimeInterface {
	
	/**
	 * Atom (example: 2005-08-15T15:52:01+00:00) 
	 * 
	 * @var String
	 */
	const ATOM = \DateTime::ATOM;
	
	/**
	 * HTTP Cookies (example: Monday, 15-Aug-05 15:52:01 UTC) 
	 * 
	 * @var String
	 */
	const COOKIE = \DateTime::COOKIE;
	
	/**
	 * ISO-8601 (example: 2005-08-15T15:52:01+0000) 
	 * 
	 * @var String
	 */
	const ISO8601 = \DateTime::ISO8601;
	
	/**
	 * RFC 822 (example: Mon, 15 Aug 05 15:52:01 +0000) 
	 * 
	 * @var String
	 */
	const RFC822 = \DateTime::RFC822;
	
	/**
	 * RFC 850 (example: Monday, 15-Aug-05 15:52:01 UTC) 
	 * 
	 * @var String
	 */
	const RFC850 = \DateTime::RFC850;
	
	/**
	 * RFC 1036 (example: Mon, 15 Aug 05 15:52:01 +0000) 
	 * 
	 * @var String
	 */
	const RFC1036 = \DateTime::RFC1036;
	
	/**
	 * RFC 1123 (example: Mon, 15 Aug 2005 15:52:01 +0000) 
	 * 
	 * @var String
	 */
	const RFC1123 = \DateTime::RFC1123;
	
	/**
	 * RFC 2822 (Mon, 15 Aug 2005 15:52:01 +0000) 
	 * 
	 * @var String
	 */
	const RFC2822 = \DateTime::RFC2822;
	
	/**
	 * Same as DateTime::ATOM (since PHP 5.1.3) 
	 * 
	 * @var String
	 */
	const RFC3339 = \DateTime::RFC3339;
	
	/**
	 * RSS (Mon, 15 Aug 2005 15:52:01 +0000) 
	 * 
	 * @var String
	 */
	const RSS = \DateTime::RSS;
	
	/**
	 * World Wide Web Consortium (example: 2005-08-15T15:52:01+00:00) 
	 * 
	 * @var String
	 */
	const W3C = \DateTime::W3C;

	/**
	 * @var \DateTime
	 */
	private $datetime;
	
	/**
	 * Returns new DateTime object
	 * 
	 * @param String $time A date/time string. Valid formats are explained in Date and 
	 * 		Time Formats. Enter NULL here to obtain the current time when using the 
	 * 		$timezone parameter.
	 * @param string $timezone A DateTimeZone object representing the timezone of $time. 
	 * 		If $timezone is omitted, the current timezone will be used. 
	 */
	public function __construct($time = "now", $timezone = null) {
		$this->datetime = new \DateTime($time, $timezone);
	}
	
	/**
	 * Returns new DateTime object formatted according to the specified format
	 * 
	 * @param String $format The format that the passed in string should be in. See 
	 * 		the formatting options below. In most cases, the same letters as for the 
	 * 		date() can be used. 
	 * @param String $time String representing the time. 
	 * @param DateTimeZone $timezone A DateTimeZone object representing the desired 
	 * 		time zone.
	 * 		If timezone is omitted and time contains no timezone, the current 
	 * 		timezone will be used.
	 * 
	 * @return DateTime Returns a new DateTime instance or FALSE on failure. 
	 */
	public static function createFromFormat($format, $time, $timezone = null) {
		$datetime = \DateTime::createFromFormat($format, $time, $timezone);
		return new DateTime($datetime->format(DateTime::RFC2822), $timezone);
	}
	
	/**
	 * Adds an amount of days, months, years, hours, minutes and seconds to a DateTime object
	 * 
	 * @param DateInterval $interval A DateInterval object
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure.  
	 */
	public function add($interval) {
		$this->datetime->add($interval);
		return $this;
	}
	
	/* (non-PHPdoc)
	 * @see \php\date\DateTimeInterface::diff()
	 */
	public function diff(DateTimeInterface $datetime, $absolute = false) {
		$int = $this->datetime->diff($datetime, $absolute);
		$interval = new DateInterval();
		$interval->y = $int->y;
		$interval->m = $int->m;
		$interval->d = $int->d;
		$interval->h = $int->h;
		$interval->i = $int->i;
		$interval->s = $int->s;
		$interval->invert = $int->invert;
		$interval->days = $int->days;
		return $interval;
	}
	
	/* (non-PHPdoc)
	 * @see \php\date\DateTimeInterface::format()
	 */
	public function format($format) {
		return $this->datetime->format($format);
	}

	/* (non-PHPdoc)
	 * @see \php\date\DateTimeInterface::getOffset()
	 */
	public function getOffset() {
		return $this->datetime->getOffset();
	}
	
	/* (non-PHPdoc)
	 * @see \php\date\DateTimeInterface::getTimestamp()
	 */
	public function getTimestamp() {
		return $this->datetime->getTimestamp();
	}
	
	/* (non-PHPdoc)
	 * @see \php\date\DateTimeInterface::getTimezone()
	 */
	public function getTimezone() {
		return $this->datetime->getTimezone();
	}

	/**
	 * Alters the timestamp
	 * 
	 * @param String $modify A date/time string. Valid formats are explained in Date and Time Formats.
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure. 
	 */
	public function modify($modify) {
		$this->datetime->modify($modify);
		return $this;
	}

	/**
	 * Sets the date
	 * 
	 * @param int $year Year of the date. 
	 * @param int $month Month of the date.
	 * @param int $day Day of the date.
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure.
	 */
	public function setDate($year, $month, $day) {
		$this->datetime->setDate($year, $month, $day);
		return $this;
	}
	
	/**
	 * Sets the ISO date
	 *
	 * @param int $year Year of the date.
	 * @param int $month Month of the date.
	 * @param int $day Day of the date.
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure.
	 */
	public function setISODate($year, $week, $day = 1) {
		$this->datetime->setISODate($year, $week, $day);
		return $this;
	}
	
	/**
	 * Sets the time
	 * 
	 * @param int $hour Hour of the time. 
	 * @param int $minute Minute of the time. 
	 * @param int $second Second of the time. 
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure.
	 */
	public function setTime($hour, $minute, $second = 0) {
		$this->datetime->setTime($hour, $minute, $second);
		return $this;
	}
	
	/**
	 * Sets the date and time based on an Unix timestamp
	 * 
	 * @param int $unixtimestamp Unix timestamp representing the date. 
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure.
	 */
	public function setTimestamp($unixtimestamp) {
		$this->datetime->setTimestamp($unixtimestamp);
		return $this;
	}
	
	/**
	 * Sets the time zone for the DateTime object
	 * 
	 * @param DateTimeZone $timezone A DateTimeZone object representing the desired time zone.
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure.  
	 */
	public function setTimezone($timezone) {
		$this->datetime->setTimezone($timezone);
		return $this;
	}
	
	/**
	 * Subtracts an amount of days, months, years, hours, minutes and seconds from a DateTime object 
	 * 
	 * @param DateTimeInterval $interval A DateInterval object
	 * @return DateTime Returns the DateTime object for method chaining or FALSE on failure. 
	 */
	public function sub($interval) {
		$this->datetime->sub($interval);
		return $this;
	}

}
