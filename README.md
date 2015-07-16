# kohana-wkhtml2pdf

## Installation

* Composer install: `composer require dexamped/kohana-wkhtml2pdf`
* Download and make the wkhtml2pdf binary - http://wkhtmltopdf.org/downloads.html
* Copy binary to MODPATH/kohana-wkhtml2pdf/vendor/bin directory
* Load module in bootstrap

```php
Kohana::modules(array(
	// ...
	'wkhtml2pdf' => MODPATH.'kohana-wkhtml2pdf', // PDF Generator
	// ...
));
```

## Usage

```php
/**
 * Generate and return PDF inline
 */
public function action_index()
{
	// HTML view to convert to PDF
	$view = View::factory('pdf/document');

	// Generate, return and delete file
	$this->response->send_file(WKHTML2PDF::pdf($view->render()), 'document.pdf', array('delete' => TRUE));
}
```
