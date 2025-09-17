<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;
use Phpturing\Tape;


class TapeTest extends TestCase
{
    private $_tape;

    public function setUp(): void
    {
        $this->_tape = new Tape();
    }

    public function testReadWrite(): void
    {
        $this->_tape[1] = 'A';
        $this->assertEquals('A', $this->_tape[1]);

        $this->_tape[1000] = 'B';
        $this->assertEquals('B', $this->_tape[1000]);

        $this->_tape[-10] = 'C';
        $this->assertEquals('C', $this->_tape[-10]);
    }

    public function testDefaults(): void
    {
        $this->assertEquals($this->_tape[0], Tape::CELL_BLANK);
        $this->assertEquals($this->_tape[-123], Tape::CELL_BLANK);
        $this->assertEquals($this->_tape[123], Tape::CELL_BLANK);
    }

    public function testPopulate(): void
    {
        $input = '1111';
        $this->_tape->populate($input);
        $this->assertEquals(Tape::CELL_BLANK, $this->_tape[-1]);
        $this->assertEquals(1, $this->_tape[0]);
        $this->assertEquals(1, $this->_tape[1]);
        $this->assertEquals(1, $this->_tape[2]);
        $this->assertEquals(1, $this->_tape[3]);
        $this->assertEquals(Tape::CELL_BLANK, $this->_tape[4]);
    }

    public function test_pre_populate(): void
    {
        $input = '10101';
        $newtape = new Tape($input);
        $this->assertEquals(Tape::CELL_BLANK, $newtape[-1]);
        $this->assertEquals(1, $newtape[0]);
        $this->assertEquals(0, $newtape[1]);
        $this->assertEquals(1, $newtape[2]);
        $this->assertEquals(0, $newtape[3]);
        $this->assertEquals(1, $newtape[4]);
        $this->assertEquals(Tape::CELL_BLANK, $newtape[5]);
    }
}
