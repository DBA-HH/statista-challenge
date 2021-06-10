<?php

declare(strict_types=1);

namespace dba_hh\statista_challenge\view;

/**
 * Class FizzBuzzView
 * could use rendering engine like Twig, Blade, Smarty. For this showcase I hardcode echo and html
 * @package dba_hh\statista_challenge\view
 */
class FizzBuzzView
{
    /**
     * @param array $values
     * @return $this
     */
    public function render(array $values): FizzBuzzView
    {
        echo '<html lang="de"><body>', "\n";
        foreach ($values as $value) {
            echo $value, "<br>\n";
        }
        echo '</body></html>', "\n";
        return $this;
    }
}