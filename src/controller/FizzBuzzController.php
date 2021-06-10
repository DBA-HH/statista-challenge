<?php

declare(strict_types=1);

namespace dba_hh\statista_challenge\controller;

use dba_hh\statista_challenge\model\FizzBuzzGenerator;
use dba_hh\statista_challenge\view\FizzBuzzView;

/**
 * Class FizzBuzzController
 * @package dba_hh\statista_challenge\controller
 */
class FizzBuzzController
{
    public function run(): void
    {
        $values = (new FizzBuzzGenerator())->getArray();
        (new FizzBuzzView())->render($values);
    }
}