# FlushDNS

[![Latest Stable Version](https://poser.pugx.org/knotsphp/flushdns/v)](https://packagist.org/packages/knotsphp/flushdns) 
[![Total Downloads](https://poser.pugx.org/knotsphp/flushdns/downloads)](https://packagist.org/packages/knotsphp/flushdns) 
[![Latest Unstable Version](https://poser.pugx.org/knotsphp/flushdns/v/unstable)](https://packagist.org/packages/knotsphp/flushdns) 
[![License](https://poser.pugx.org/knotsphp/flushdns/license)](https://packagist.org/packages/knotsphp/flushdns) 
[![PHP Version Require](https://poser.pugx.org/knotsphp/flushdns/require/php)](https://packagist.org/packages/knotsphp/flushdns) 
[![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/knotsphp/flushdns/test.yml?label=Tests)](https://github.com/knotsphp/flushdns/actions/workflows/test.yml)

FlushDNS is a PHP library to flush the DNS cache of the current machine.

It also provides a command line utility: `flushdns`.

Compatible with MacOS, Linux, and Windows.

> ⚠️ **Warning:** Library in active development. 
> Follow me on [Twitter](https://twitter.com/srwiez) or [BlueSky](https://bsky.app/profile/srwiez.com) for updates. 
> You can also put a star and watch the repo in the meantime.

## 🚀 Installation

```bash
composer require knotsphp/flushdns
```

## 📚 Usage
WIP WIP WIP

```php
use KnotsPHP\FlushDNS\FlushDNS;

// Flush DNS cache
$success = FlushDNS::run(); 

// Only get the command
$command = FlushDNS::getCommand();

// Check if the command needs elevated privileges
$needsElevation = FlushDNS::needsElevation();
```

This library also comes some helpers fnuctions for Curl:

```php
// Get options to ignore dns cache
$flushDnsOptions = FlushDNS::getCurlOpts();

// Make the request
$curl = curl_init();
curl_setopt_array($curl, array_merge(
    [
        CURLOPT_URL => "https://app.unolia.com/api/v1/domains",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "Accept: application/json",
            "Authorization: Bearer 123"
        ],
    ],
    $flushDnsOptions,
));
$response = curl_exec($curl);
$domains = json_decode($response);
curl_close($curl);
```

## 📚 Use in command line

You can also use this library in the command line by using the `flushdns` command.

It's recommended to install the library globally to use it in the command line.
```bash
composer global require knotsphp/flushdns
```

Then you can use the `flushdns` command to get the public IP address of the current machine.
```bash
# In your project directory
vendor/bin/flushdns

# Globally installed
flushdns
```

## 📖 Documentation
This library is compatible with MacOS, Linux, and Windows.

Some operating systems may require root access to flush the DNS cache.

## 🤝 Contributing
Clone the project and run `composer update` to install the dependencies.

Before pushing your changes, run `composer qa`. 

This will run [pint](http://github.com/laravel/pint) (code style), [phpstan](http://github.com/phpstan/phpstan) (static analysis), and [pest](http://github.com/pestphp/pest) (tests).

## 👥 Credits

FlushDNS was created by Eser DENIZ.

## 📝 License

FlushDNS is licensed under the MIT License. See LICENSE for more information.
