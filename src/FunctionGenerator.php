<?php
/**
 * This file is part of the Expression Language Extensions package.
 *
 * (c) tomas
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace OneGuard\ExpressionLanguageExtensions\Utils;

use Symfony\Component\ExpressionLanguage\ExpressionFunction;

class FunctionGenerator {
    public static function fromStaticFunction(
        string $class,
        string $functionName,
        string $expressionFunctionName = null
    ): ExpressionFunction {
        if (!class_exists($class)) {
            throw new \InvalidArgumentException(sprintf('PHP class "%s" does not exist.', $class));
        }
        if (!method_exists($class, $functionName)) {
            throw new \InvalidArgumentException(sprintf(
                'PHP function "%s::%s" does not exist.',
                $class,
                $functionName
            ));
        }

        $compiler = function () use ($class, $functionName) {
            return sprintf('%s::%s(%s)', $class, $functionName, implode(', ', func_get_args()));
        };

        $evaluator = function () use ($class, $functionName) {
            $args = func_get_args();

            return call_user_func_array([$class, $functionName], array_splice($args, 1));
        };

        return new ExpressionFunction($expressionFunctionName ?: $functionName, $compiler, $evaluator);
    }
}
