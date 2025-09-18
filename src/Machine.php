<?php

namespace Phpturing;

use Phpturing\Head;
use Phpturing\Program;

class Machine
{
    public const STATE_HALT = 'HALT';

    private Head $head;
    private Program $program;
    private string $state;

    public function __construct(Head $head)
    {
        $this->head = $head;
        $this->state = self::STATE_HALT;
    }

    public function load(Program $program): void
    {
        $this->program = $program;
        $this->state = $this->program->getInitialState();
    }

    public function getState(): string
    {
         return $this->state;
    }

    public function step(): void
    {
        $input = $this->head->read();
        $tr = $this->program->getTransition($this->state, $input);

        if ($write = $tr->toWrite()) {
            $this->head->write($write);
        }

        if ($state = $tr->nextState()) {
            $this->state = $state;
        }

        if ($tr->nextMove() == 'R') {
            $this->head->moveRight();
        } elseif ($tr->nextMove() == 'L') {
            $this->head->moveLeft();
        }
    }

    public function run(): void
    {
        while ($this->state != self::STATE_HALT) {
            $this->step();
        }
    }

    public function getTape(): Tape
    {
        return $this->head->getTape();
    }
}
