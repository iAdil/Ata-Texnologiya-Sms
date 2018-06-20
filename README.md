# AtaTexnologiya SMS Api Interface
#### Easily sending sms with AtaTexnologiya SMS Api

## Installation
With Composer

```
$ composer require adil/atasms
```

```json
{
    "require": {
        "adil/atasms": "~2.0"
    }
}
```

```php
<?php
require 'vendor/autoload.php';

use AtaTexnologiya\Sms;

## Usage
```

## Usage


```php
<?php
// require autoload file
require 'vendor/autoload.php';

// import library
use AtaTexnologiya\Sms;

// sending sms now
(new Sms())
    ->login('login') // your login
    ->password('pass') // your password
    ->title('iAdil') // your title
    ->number('+0000') // sending sms number
    ->text('Sending sms!') // sending sms text
    ->send(); // send
```  

## Schedule sms sending
```php
(new Sms())
    ->login('login') // your login
    ->password('pass') // your password
    ->title('iAdil') // your title
    ->number('+0000') // sending sms number
    ->text('Sending sms!') // sending sms text
    ->schedule('2018-08-08 12:00:00') // when sms will be send
    ->send(); // send
```
