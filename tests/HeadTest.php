<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;
use Phpturing\Head;
use Phpturing\Tape;


class HeadTest extends TestCase
{
    private Tape $_tape;
    private Head $_head;

    public function setUp(): void
    {
        $this->_tape = new Tape();
        $this->_tape[0] = 'A';
        $this->_tape[-2] = 'B';
        $this->_tape[2] = 'C';
        $this->_head = new Head($this->_tape);
    }

    /**
     * Sanity check it all comes together
     */
    public function testInit(): void
    {
        $this->assertEquals('A', $this->_head->read());
    }

    public function testShiftAndRead(): void
    {
        $this->_head->moveLeft();
        $this->_head->moveLeft();
        $this->assertEquals('B', $this->_head->read());
        $this->_head->moveRight();
        $this->_head->moveRight();
        $this->_head->moveRight();
        $this->_head->moveRight();
        $this->assertEquals('C', $this->_head->read());
    }

    public function testWriteAndRead(): void
    {
        $this->_head->write('Q');
        $this->assertEquals('Q', $this->_head->read());
        $this->_head->moveRight();
        $this->_head->moveRight();
        $this->_head->write('Z');
        $this->assertEquals('Z', $this->_head->read());
        $this->_head->moveLeft();
        $this->_head->moveLeft();
        $this->assertEquals('Q', $this->_head->read());
        $this->_head->moveRight();
        $this->_head->moveRight();
        $this->assertEquals('Z', $this->_head->read());
    }
}
