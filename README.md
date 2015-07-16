# kohana-wkhtml2pdf

## Installation

* Download and make the wkhtml2pdf binary - http://wkhtmltopdf.org/downloads.html
* Copy binary to MODPATH/kohana-wkhtml2pdf/vendor/bin directory

## Usage

```php
$view = View::factory('pdf/document');
$pdf_path = WKHTML2PDF::pdf($view->render());
```
