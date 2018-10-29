# Symfony Expression Language Extensions

## Installation

Add it to your list of Composer dependencies:

```bash
$ composer require oneguard/expression-language-extensions
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

Reporting an issue or a feature request
---------------------------------------

Issues and feature requests are tracked in the
[Github issue tracker](https://github.com/OneGuardSolutions/expression-language-extensions/issues).
