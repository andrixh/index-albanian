# Albanian Stemming
This package was built from the need to create search indexes for Albanian text. It provides a list of stop words, transliterates characters and stems words with a predefined list of suffixes.

The algorithm is simple, but has been tested in production and has worked quite well. However, keep in mind that Albanian is a complicated language and the results may not always be perfect.

## Installation
Add the package to your composer.json file and run `composer update`:

```json
{
    "require": {
        "andrixh/index-albanian": "dev-master"
    }
}
```

Require Composer's generated autoload file:

```php
require __DIR__ . '/vendor/autoload.php';
```

## Usage

Just initialize the stemmer with the text and you're done. The class implements `__toString()`, so you don't need to call any other method.

```php
use Andrixh\Stemmer\Stemmer;

$text = "some long albanian text";
$indexedText = new Stemmer($text);
```

For those rare cases where converting the object to string isn't possible or you prefer to explicitly get the string, you can use the `get()` method.

```php
$stemmer = new Stemmer($text);
$indexedText = $stemmer->get();
```

There's also a convenient static method if you prefer such an approach.

```php
$indexedText = Stemmer::make($text);

// or explicit conversion

$indexedText = Stemmer::make($text)->get();
```