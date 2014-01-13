<?php

return new Sami\Sami(__DIR__.'/src', [
	'theme' => 'enhanced',
	'title' => 'php API',
	'build_dir' => __DIR__.'/api',
	'simulate_namespaces' => false,
	'default_opened_level' => 1,
]);