<?php

namespace spec;

use StringCalculator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use \InvalidArgumentException;

class StringCalculatorSpec extends ObjectBehavior
{
    public function it_translate_an_empty_string_into_zero()
    {
        $this->add('')->shouldEqual(0);
    }

    public function it_find_the_sum_of_one_number()
    {
        $this->add('5')->shouldEqual(5);
    }
    public function it_find_the_sum_of_two_numbers()
    {
        $this->add('2,3')->shouldEqual(5);
    }

    public function it_finds_the_sum_of_any_amount_of_numbers()
    {
        $this->add('1,2,3,4,5')->shouldEqual(15);
    }
    public function it_disallows_negative_numbers()
    {
        $this->shouldThrow(new InvalidArgumentException('Negative numbers are not allowed! Negative number passed: -2'))->duringAdd('1,-2,3');
    }

    public function it_ignores_any_number_that_is_one_thousand_or_greater()
    {
        $this->add('1,2,3,4,5,1000')->shouldEqual(15);
    }

    public function it_allows_for_new_line_delimiters()
    {
        $this->add('2\n2\n3')->shouldEqual(7);
    }
}
