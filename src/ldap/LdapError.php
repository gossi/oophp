<?php

namespace php\ldap;

class LdapError {
	
	const SUCCESS = 0x00;
	const OPERATIONS_ERROR = 0x01;
	const PROTOCOL_ERROR = 0x02;
	const TIMELIMIT_EXCEEDED = 0x03;
	const SIZELIMIT_EXCEEDED = 0x04;
	const COMPARE_FALSE = 0x05;
	const COMPARE_TRUE = 0x06;
	const AUTH_METHOD_NOT_SUPPORTED = 0x07;
	const STRONG_AUTH_REQUIRED = 0x08;
	// Not used in LDAPv3
	const PARTIAL_RESULTS = 0x09;
	
	// Next 5 new in LDAPv3
	const REFERRAL = 0x0a;
	const ADMINLIMIT_EXCEEDED = 0x0b;
	const UNAVAILABLE_CRITICAL_EXTENSION = 0x0c;
	const CONFIDENTIALITY_REQUIRED = 0x0d;
	const SASL_BIND_INPROGRESS = 0x0e;
	
	const NO_SUCH_ATTRIBUTE = 0x10;
	const UNDEFINED_TYPE = 0x11;
	const INAPPROPRIATE_MATCHING = 0x12;
	const CONSTRAINT_VIOLATION = 0x13;
	const TYPE_OR_VALUE_EXISTS = 0x14;
	const INVALID_SYNTAX = 0x15;
	
	const NO_SUCH_OBJECT = 0x20;
	const ALIAS_PROBLEM = 0x21;
	const INVALID_DN_SYNTAX = 0x22;
	
	// Next two not used in LDAPv3
	const IS_LEAF = 0x23;
	const ALIAS_DEREF_PROBLEM = 0x24;
	
	const INAPPROPRIATE_AUTH = 0x30;
	const INVALID_CREDENTIALS = 0x31;
	const INSUFFICIENT_ACCESS = 0x32;
	const BUSY = 0x33;
	const UNAVAILABLE = 0x34;
	const UNWILLING_TO_PERFORM = 0x35;
	const LOOP_DETECT = 0x36;
	
	const SORT_CONTROL_MISSING = 0x3C;
	const INDEX_RANGE_ERROR = 0x3D;
	
	const NAMING_VIOLATION = 0x40;
	const OBJECT_CLASS_VIOLATION = 0x41;
	const NOT_ALLOWED_ON_NONLEAF = 0x42;
	const NOT_ALLOWED_ON_RDN = 0x43;
	const ALREADY_EXISTS = 0x44;
	const NO_OBJECT_CLASS_MODS = 0x45;
	const RESULTS_TOO_LARGE = 0x46;
	
	// Next two for LDAPv3
	const AFFECTS_MULTIPLE_DSAS = 0x47;
	const OTHER = 0x50;
	
	// Used by some APIs
	const SERVER_DOWN = 0x51;
	const LOCAL_ERROR = 0x52;
	const ENCODING_ERROR = 0x53;
	const DECODING_ERROR = 0x54;
	const TIMEOUT = 0x55;
	const AUTH_UNKNOWN = 0x56;
	const FILTER_ERROR = 0x57;
	const USER_CANCELLED = 0x58;
	const PARAM_ERROR = 0x59;
	const NO_MEMORY = 0x5a;
	
	// Preliminary LDAPv3 codes
	const CONNECT_ERROR = 0x5b;
	const NOT_SUPPORTED = 0x5c;
	const CONTROL_NOT_FOUND = 0x5d;
	const NO_RESULTS_RETURNED = 0x5e;
	const MORE_RESULTS_TO_RETURN = 0x5f;
	const CLIENT_LOOP = 0x60;
	const REFERRAL_LIMIT_EXCEEDED = 0x61;
}