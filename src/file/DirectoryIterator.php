<?php
namespace php\file;


class DirectoryIterator extends \FilesystemIterator {

	const CURRENT_AS_PATHNAME = 32;
	const CURRENT_AS_FILEINFO = 0;
	const CURRENT_AS_SELF = 16;
	const CURRENT_MODE_MASK = 240;
	const KEY_AS_PATHNAME = 0;
	const KEY_AS_FILENAME = 256;
	const FOLLOW_SYMLINKS = 512;
	const KEY_MODE_MASK = 3840;
	const NEW_CURRENT_AND_KEY = 256;
	const SKIP_DOTS = 4096;
	const UNIX_PATHS = 8192;
	
	
}