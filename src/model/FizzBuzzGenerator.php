<?php

declare(strict_types=1);

namespace dba_hh\statista_challenge\model;

use Exception;

/**
 * Class FizzBuzzGenerator
 * @package dba_hh\statista_challenge\model
 */
class FizzBuzzGenerator
{
    public const DEFAULT_START = 1;
    public const DEFAULT_END = 100;
    public const DEFAULT_ZERO_VALUE = 0;

    /**
     * @var int|null
     */
    private $start;

    /**
     * @var int|null
     */
    private $end;

    /**
     * NumberGenerator constructor.
     * @param int|null $start
     * @param int|null $end
     */
    public function __construct(?int $start = null, ?int $end = null)
    {
        assert(($start ?? self::DEFAULT_START) <= ($end ?? self::DEFAULT_END), new Exception());
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function getStart(): int
    {
        return $this->start ?? self::DEFAULT_START;
    }

    /**
     * @param int|null $start
     * @return FizzBuzzGenerator
     */
    public function setStart(?int $start): FizzBuzzGenerator
    {
        assert($start <= $this->end, new Exception());
        $this->start = $start;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEnd(): int
    {
        return $this->end ?? self::DEFAULT_END;
    }

    /**
     * @param int|null $end
     * @return FizzBuzzGenerator
     */
    public function setEnd(?int $end): FizzBuzzGenerator
    {
        assert($end >= $this->start, new Exception());
        $this->end = $end;
        return $this;
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        $numbers = [];
        $start = $this->start ?? self::DEFAULT_START;
        $end = $this->end ?? self::DEFAULT_END;

        for ($num = $start; $num <= $end; $num++) {
            $numbers[$num] = $this->determineValue($num);
        }

        return $numbers;
    }

    /**
     * @param int $number
     * @return int|string
     */
    protected function determineValue(int $number)
    {
        if (0 == $number) {
            return self::DEFAULT_ZERO_VALUE;
        }

        $isMultipleOfThree = (0 == ($number % 3));
        $isMultipleOfFive = (0 == ($number % 5));
        return $isMultipleOfThree
            ? ($isMultipleOfFive ? 'FizzBuzz' : 'Fizz')
            : ($isMultipleOfFive ? 'Buzz' : $number);
    }
}