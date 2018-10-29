<?php
/**
 * This file is part of the expression-language-extensions package.
 *
 * (c) tomas
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */

namespace OneGuard\ExpressionLanguageExtensions\Utils;

use OneGuard\ExpressionLanguageExtensions\TestUtils;
use PHPUnit\Framework\TestCase;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * @coversDefaultClass \OneGuard\ExpressionLanguageExtensions\Utils\FunctionGenerator
 */
class FunctionGeneratorTest extends TestCase {
    /**
     * @covers ::fromStaticFunction
     */
    public function testFromStaticFunction() {
        $language = new ExpressionLanguage();
        $function = FunctionGenerator::fromStaticFunction(TestUtils::class, 'test');
        $language->addFunction($function);

        $this->assertEquals('test', $function->getName());
        $this->assertEquals('a-b', $language->evaluate('test("a", "b")'));
    }

    /**
     * @covers ::fromStaticFunction
     */
    public function testFromStaticFunctionCompiler() {
        $function = FunctionGenerator::fromStaticFunction(TestUtils::class, 'test');
        $result = call_user_func_array($function->getCompiler(), ["'a'", "'b'"]);

        $this->assertEquals('a-b', eval('return ' . $result . ';'));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PHP class "\Test\Class\Not\Exists" does not exist.
     * @covers ::fromStaticFunction
     */
    public function testFromStaticFunctionClassNotExists() {
        FunctionGenerator::fromStaticFunction('\Test\Class\Not\Exists', 'test');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage PHP function "DateTime::functionThatDoesNotExist" does not exist.
     * @covers ::fromStaticFunction
     */
    public function testFromStaticFunctionFunctionNotExists() {
        FunctionGenerator::fromStaticFunction(\DateTime::class, 'functionThatDoesNotExist');
    }
}
