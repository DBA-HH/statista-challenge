<?php

namespace dba_hh\statista_challenge;

use dba_hh\statista_challenge\controller\FizzBuzzController;

require_once __DIR__ . '/../vendor/autoload.php';

ini_set('assert.exception', 1);

(new FizzBuzzController())->run();