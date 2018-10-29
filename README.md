# Symfony Expression Language Extensions

[![Build Status](https://travis-ci.com/OneGuardSolutions/expression-language-extensions.svg?branch=master)](https://travis-ci.com/OneGuardSolutions/expression-language-extensions)
[![Coverage Status](https://coveralls.io/repos/github/OneGuardSolutions/expression-language-extensions/badge.svg)](https://coveralls.io/github/OneGuardSolutions/expression-language-extensions)
[![Maintainability](https://api.codeclimate.com/v1/badges/9c0c23ba177141a619b3/maintainability)](https://codeclimate.com/github/OneGuardSolutions/expression-language-extensions/maintainability)
[![GitHub license](https://img.shields.io/github/license/OneGuardSolutions/expression-language-extensions.svg)](https://github.com/OneGuardSolutions/expression-language-extensions/blob/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/oneguard/expression-language-extensions.svg)](https://packagist.org/packages/oneguard/expression-language-extensions)
[![Packagist](https://img.shields.io/packagist/dt/oneguard/expression-language-extensions.svg)](https://packagist.org/packages/oneguard/expression-language-extensions)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/oneguard/expression-language-extensions.svg)](https://packagist.org/packages/oneguard/expression-language-extensions)

## Installation

Add it to your list of Composer dependencies:

```bash
composer require oneguard/expression-language-extensions
```

## Usage

Create `ExpressionFunction` from static function:

```php
use OneGuard\ExpressionLanguageExtensions\Utils\FunctionGenerator;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

$function = FunctionGenerator::fromStaticFunction(Yaml::class, 'parse', 'yaml_parse');

$expressionLanguage = new ExpressionLanguage();
$expressionLanguage->addFunction($function);

$expressionLanguage->evaluate("yaml_parse('a: [1, 2]')");
```

## License

This bundle is under the MIT license.
See the complete license attached with the source code:

> [LICENSE](LICENSE)

## Reporting an issue or a feature request

Issues and feature requests are tracked in the
[Github issue tracker](https://github.com/OneGuardSolutions/expression-language-extensions/issues).
