<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Generate a PDF
 * @author Chris Lord <chris.lord.au@gmail.com>
 */
class Kohana_WKHTML2PDF {

	/**
	 * Generate PDF content
	 *
	 * @param   string  HTML content
	 * @return  string  path to output PDF
	 */
	public static function pdf($html)
	{
		// Load the binary path
		$bin = Kohana::$config->load('wkhtml2pdf.bin_path');

		if ( ! file_exists($bin))
		{
			throw new Kohana_Exception('wkhtmltopdf does not exist at: :path ', array(
				':path' => $bin,
			));
		}

		// Load the cache path
		$folder = Kohana::$config->load('wkhtml2pdf.cache_dir');

		if ( ! is_writable($folder))
		{
			throw new Kohana_Exception('Directory :dir must be writable', array(
				':dir' => $folder,
			));
		}

		// Create unique temporary file
		$uuid = uniqid('wkhtml_temp_', TRUE);

		// Store working files in cache
		$file_in  = $folder . $uuid . '.html';
		$file_out = $folder . $uuid . '.pdf';

		// Write temporary file
		if ( ! file_put_contents($file_in, $html))
			throw new Kohana_Exception('Unable to create temp file: '.$file_in);

		// Build command
		$cmd = $bin.' '.escapeshellarg($file_in).' '.escapeshellarg($file_out);

		// Convert file
		passthru($cmd);

		// Delete HTML file
		if ( ! unlink($file_in))
		{
			Kohana::$log(Log::WARNING, 'Unable to delete temp file: :path', array(
				':path' => $file_in,
			));
		}

		// Handle any errors
		if ( ! file_exists($file_out))
			throw new Kohana_Exception('Unknown wkhtmltopdf error.');

		return $file_out;
	}

} // End Kohana_WKHTML2PDF
