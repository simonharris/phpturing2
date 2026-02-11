<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;
use Phpturing\Fibonacci;

class FibonacciTest extends TestCase
{
    private Fibonacci $fibonacci;

    protected function setUp(): void
    {
        $this->fibonacci = new Fibonacci();
    }

    public function testGenerateFirst12Numbers(): void
    {
        $expected = [0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89];
        $result = $this->fibonacci->generate(12);

        $this->assertEquals($expected, $result);
    }

    public function testGenerateZeroNumbers(): void
    {
        $result = $this->fibonacci->generate(0);

        $this->assertEquals([], $result);
    }

    public function testGenerateOneNumber(): void
    {
        $result = $this->fibonacci->generate(1);

        $this->assertEquals([0], $result);
    }

    public function testGenerateTwoNumbers(): void
    {
        $result = $this->fibonacci->generate(2);

        $this->assertEquals([0, 1], $result);
    }

    public function testGenerateThreeNumbers(): void
    {
        $result = $this->fibonacci->generate(3);

        $this->assertEquals([0, 1, 1], $result);
    }

    public function testGenerateFiveNumbers(): void
    {
        $result = $this->fibonacci->generate(5);

        $this->assertEquals([0, 1, 1, 2, 3], $result);
    }

    public function testGenerateNegativeNumbers(): void
    {
        $result = $this->fibonacci->generate(-5);

        $this->assertEquals([], $result);
    }
}
