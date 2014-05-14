<?php
namespace php\date;

class DateTimeZone {
	
	/**
	 * Africa time zones.
	 * 
	 * @var int
	 */
	const AFRICA = \DateTimeZone::AFRICA;
	
	/**
	 * America time zones.
	 * 
	 * @var int
	 */
	const AMERICA = \DateTimeZone::AMERICA;
	
	/**
	 * Antarctica time zones.
	 * 
	 * @var int
	 */
	const ANTARCTICA = \DateTimeZone::ANTARCTICA;
	
	/**
	 * Arctic time zones.
	 * 
	 * @var int
	 */
	const ARCTIC = \DateTimeZone::ARCTIC;
	
	/**
	 * Asia time zones.
	 * 
	 * @var int
	 */
	const ASIA = \DateTimeZone::ASIA;
	
	/**
	 * Atlantic time zones.
	 * 
	 * @var int
	 */
	const ATLANTIC = \DateTimeZone::ATLANTIC;
	
	/**
	 * Australia time zones.
	 * 
	 * @var int
	 */
	const AUSTRALIA = \DateTimeZone::AUSTRALIA;
	
	/**
	 * Europe time zones.
	 * 
	 * @var int
	 */
	const EUROPE = \DateTimeZone::EUROPE;
	
	/**
	 * Indian time zones.
	 * 
	 * @var int
	 */
	const INDIAN = \DateTimeZone::INDIAN;
	
	/**
	 * Pacific time zones.
	 * 
	 * @var int
	 */
	const PACIFIC = \DateTimeZone::PACIFIC;
	
	/**
	 * UTC time zones.
	 * 
	 * @var int
	 */
	const UTC = \DateTimeZone::UTC;
	
	/**
	 * All time zones.
	 * 
	 * @var int
	 */
	const ALL = \DateTimeZone::ALL;
	
	/**
	 * All time zones including backwards compatible.
	 * 
	 * @var int
	 */
	const ALL_WITH_BC = \DateTimeZone::ALL_WITH_BC;
	
	/**
	 * Time zones per country.
	 * 
	 * @var int
	 */
	const PER_COUNTRY = \DateTimeZone::PER_COUNTRY;

	/**
	 * @var \DateTimeZone
	 */
	private $timezone;
	
	/**
	 * Creates new DateTimeZone object
	 * 
	 * @param String $timezone One of {@see http://php.net/manual/timezones.php timezones}.
	 * @return Returns DateTimeZone on success. 
	 */
	public function __construct($timezone) {
		$this->timezone = new \DateTimeZone($timezone);
	}
	
	/**
	 * Returns location information for a timezone
	 * 
	 * @return array Array containing location information about timezone. 
	 */
	public function getLocation() {
		return $this->timezone->getLocation();
	}
	
	/**
	 * Returns the name of the timezone
	 * 
	 * @return String One of the timezone names in the {@see http://php.net/manual/timezones.php list of timezones}. 
	 */
	public function getName() {
		return $this->timezone->getName();
	}
	
	/**
	 * Returns the timezone offset from GMT
	 * 
	 * @param DateTime $datetime DateTime that contains the date/time to compute the offset from. 
	 * @return int Returns time zone offset in seconds on success or FALSE on failure.
	 */
	public function getOffset(DateTime $datetime) {
		return $this->timezone->getOffset($datetime);
	}
	
	/**
	 * Returns all transitions for the timezone
	 * 
	 * @param int $timestamp_begin
	 * @param int $timestamp_end
	 * @return Returns numerically indexed array containing associative array with 
	 * 		all transitions on success or FALSE on failure. 
	 */
	public function getTransitions($timestamp_begin = null, $timestamp_end = null) {
		return $this->timezone->getTransitions($timestamp_begin ?: time(), $timestamp_end ?: time());
	}
	
	/**
	 * Returns associative array containing dst, offset and the timezone name
	 * 
	 * @return array Returns array on success or FALSE on failure. 
	 */
	public static function listAbbreviations() {
		return \DateTimeZone::listAbbreviations();
	}
	
	/**
	 * Returns a numerically indexed array containing all defined timezone identifiers
	 * 
	 * @param int $what One of DateTimeZone class constants. 
	 * @param String $country A two-letter ISO 3166-1 compatible country code.
	 * @return array Returns array on success or FALSE on failure. 
	 */
	public static function listIdentifiers($what = DateTimeZone::ALL, $country = null) {
		return \DateTimeZone::listIdentifiers($what, $country);
	}
}