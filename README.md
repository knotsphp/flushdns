WIP WIP WIP

# FlushDNS

[//]: # ([![Latest Stable Version]&#40;https://poser.pugx.org/knotsphp/flushdns/v&#41;]&#40;https://packagist.org/packages/knotsphp/flushdns&#41; )
[//]: # ([![Total Downloads]&#40;https://poser.pugx.org/knotsphp/flushdns/downloads&#41;]&#40;https://packagist.org/packages/knotsphp/flushdns&#41; )
[//]: # ([![Latest Unstable Version]&#40;https://poser.pugx.org/knotsphp/flushdns/v/unstable&#41;]&#40;https://packagist.org/packages/knotsphp/flushdns&#41; )
[//]: # ([![License]&#40;https://poser.pugx.org/knotsphp/flushdns/license&#41;]&#40;https://packagist.org/packages/knotsphp/flushdns&#41; )
[//]: # ([![PHP Version Require]&#40;https://poser.pugx.org/knotsphp/flushdns/require/php&#41;]&#40;https://packagist.org/packages/knotsphp/flushdns&#41; )
[//]: # ([![GitHub Workflow Status &#40;with event&#41;]&#40;https://img.shields.io/github/actions/workflow/status/knotsphp/flushdns/test.yml?label=Tests&#41;]&#40;https://github.com/knotsphp/flushdns/actions/workflows/test.yml&#41;)

FlushDNS is a PHP library to flush the DNS cache of the current machine.


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
