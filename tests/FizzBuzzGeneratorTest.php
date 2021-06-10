<?php

declare(strict_types=1);

namespace dba_hh\statista_challenge_tests;

use dba_hh\statista_challenge\model\FizzBuzzGenerator;
use Exception;
use PHPUnit\Framework\TestCase;

require_once 'test.php';

/**
 * Class FizzBuzzGeneratorTest
 */
class FizzBuzzGeneratorTest extends TestCase
{
    public function testDefaults(): void
    {
        $generator = new FizzBuzzGenerator();
        $this->checkValues($generator, FizzBuzzGenerator::DEFAULT_START, FizzBuzzGenerator::DEFAULT_END);
    }

    /**
     * @param \dba_hh\statista_challenge\model\FizzBuzzGenerator $generator
     * @param int                                                $expectedStart
     * @param int                                                $expectedEnd
     */
    protected function checkValues(FizzBuzzGenerator $generator, int $expectedStart, int $expectedEnd): void
    {
        assert($expectedStart <= $expectedEnd);
        self::assertEquals($expectedStart, $generator->getStart());
        self::assertEquals($expectedEnd, $generator->getEnd());

        $values = $generator->getArray();
        self::assertCount($expectedEnd - $expectedStart + 1, $values);
        foreach ($values as $key => $value) {
            self::assertIsInt($key);
            switch ($value) {
                case 'Fizz':
                    self::assertEquals(0, ($key % 3));
                    break;
                case 'Buzz':
                    self::assertEquals(0, ($key % 5));
                    break;
                case 'FizzBuzz':
                    self::assertEquals(0, ($key % 3));
                    self::assertEquals(0, ($key % 5));
                    break;
                default:
                    self::assertIsInt($value);
                    self::assertEquals((FizzBuzzGenerator::DEFAULT_ZERO_VALUE === $value ? 0 : $value), $key);
                    break;
            }
        }
    }

    public function testRanges(): void
    {
        $this->checkValues(new FizzBuzzGenerator(-5, -1), -5, -1);
        $this->checkValues(new FizzBuzzGenerator(-5, 20), -5, 20);
        $this->checkValues(new FizzBuzzGenerator(0, 20), 0, 20);
        $this->checkValues(new FizzBuzzGenerator(5, 20), 5, 20);
    }

    public function testInvalidParameter1(): void
    {
        self::expectException(Exception::class);
        new FizzBuzzGenerator(FizzBuzzGenerator::DEFAULT_END + 1);
    }

}