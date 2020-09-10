The bundle is based on microservice way of exporting pdf
-------------

Use this container 
 - [traumfewo/docker-wkhtmltopdf-aas](https://hub.docker.com/r/traumfewo/docker-wkhtmltopdf-aas)
 - and make it available on http://wkhtmltopdf.yourproject.com with docker-compose.yml

```yaml
  wkhtmltopdf:
    image: traumfewo/docker-wkhtmltopdf-aas:latest
    environment:
      USER: root
      PASS: root
```
How to export debit mandate in PDF:
-------------
```php
use Mpp\GeneraliClientBundle\PdfGenerator\GeneraliPdfGenerator;

/** @var GeneraliPdfGenerator */
private $pdfGenerator;

public function __construct(GeneraliPdfGenerator $pdfGenerator)
{
    $this->pdfGenerator = $pdfGenerator;
}
```
Use this model to get all the constants created for this bundl
```php
$fileNameContract = $this->pdfGenerator->generateFile($fileParameters);
```

