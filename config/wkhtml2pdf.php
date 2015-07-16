<?php defined('SYSPATH') or die('No direct script access.');

return array(

	// Path to the wkhtml2pdf binary
	'bin_path'   => MODPATH.'kohana-wkhtml2pdf'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'bin'.DIRECTORY_SEPARATOR.'wkhtmltopdf',

	// Cache path
	'cache_dir' => Kohana::$cache_dir.DIRECTORY_SEPARATOR,
);
