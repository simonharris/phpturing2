<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;

use Phpturing\Head;
use Phpturing\Machine;
use Phpturing\Program;
use Phpturing\Tape;


class IntegrationTest extends TestCase
{
    public function testIncrement()
    {
        $init = '1111'; # 4 in unary

        $code = $this->_readCode('programs/increment.json');

        $machine = new Machine(new Head(new Tape($init)));
        $machine->load(new Program($code));
        $machine->run();

        $this->assertEquals('11111', $machine->getTape());  # 5 in unary
    }

    public function test_add_two(): void
    {
        $init = '1111_111'; # 4+3 in unary
        $code = $this->_readCode('programs/add_two.json');

        $machine = new Machine(new Head(new Tape($init)));
        $machine->load(new Program($code));
        $machine->run();

        $this->assertEquals('1111111', $machine->getTape());  # 7 in unary
    }

    public function _readCode($filename): array
    {
        $code  = file_get_contents($filename);
        return json_decode($code, TRUE);
    }

    public function testFibonacci(): void
    {
        $code = $this->_readCode('programs/fibonacci.json');

        $machine = new Machine(new Head(new Tape()));
        $machine->load(new Program($code));
        $machine->run();

        $result = (string) $machine->getTape();
        $numbers = explode('_', $result);

        # Should generate 12 Fibonacci numbers
        $this->assertEquals(12, count($numbers));

        # Verify the sequence: 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144
        $expected = [1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144];
        foreach ($numbers as $i => $num) {
            $this->assertEquals($expected[$i], strlen($num));
        }
    }
}
