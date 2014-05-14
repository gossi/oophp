<?php

namespace php\date;

interface DateTimeInterface {
	
	/**
	 * Returns the difference between two DateTime objects
	 * 
	 * @param DateTimeInterface $datetime The date to compare to. 
	 * @param String $absolute Should the interval be forced to be positive? 
	 * @return DateInterval The DateInterval object representing the 
	 * 		difference between the two dates or FALSE on failure. 
	 */
	public function diff($datetime, $absolute = false);
	
	/**
	 * Returns date formatted according to given format
	 * 
	 * @param String $format Format accepted by {@see date()}.
	 * @return String Returns the formatted date string on success or FALSE on failure. 
	 */
	public function format($format);
	
	/**
	 * Returns the timezone offset
	 * 
	 * @return int Returns the timezone offset in seconds from UTC on success or FALSE on failure.
	 */
	public function getOffset();
	
	/**
	 * Gets the Unix timestamp
	 * 
	 * @return int Returns the Unix timestamp representing the date. 
	 */
	public function getTimestamp();
	
	/**
	 * Return time zone relative to given DateTime
	 * 
	 * @return DateTimeZone Returns a DateTimeZone object on success or FALSE on failure.
	 */
	public function getTimezone();
}
