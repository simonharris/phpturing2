<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;
use Phpturing\Program;


class ProgramTest extends TestCase
{
    private Program $_program;

    public function setUp(): void
    {
        $fname = 'programs/01.json';
        $code  = file_get_contents($fname);
        $prog  = json_decode($code, TRUE);
        $this->_program = new Program($prog);
    }

    public function testInitialisation(): void
    {
        $this->assertEquals('state0012', $this->_program->getInitialState());
    }

    public function test_get_transitions(): void
    {
        $tr = $this->_program->getTransition('state0042', '1');
        $this->assertInstanceOf('Phpturing\Transition', $tr);
        $this->assertEquals('state0012', $tr->nextState());
        $this->assertEquals('0', $tr->toWrite());
        $this->assertEquals('L', $tr->nextMove());
    }
}
