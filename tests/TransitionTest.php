<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;
use Phpturing\Transition;


class TransitionTest extends TestCase
{
    public function testAccessors(): void
    {
        $inst = new Transition('s00012', '1', 'R');
        $this->assertEquals('s00012', $inst->nextState());
        $this->assertEquals('1', $inst->toWrite());
        $this->assertEquals('R', $inst->nextMove());
    }

    public function testDefaults(): void
    {
        $inst = new Transition();
        $this->assertNull($inst->nextState());
        $this->assertNull($inst->toWrite());
        $this->assertNull($inst->nextMove());
    }
}
