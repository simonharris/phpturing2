<?php

namespace Phpturing;

use Phpturing\Head;
use Phpturing\Program;


class Machine
{
    const STATE_HALT = 'HALT';

    private Head $_head;
    private Program $_program;
    private string $_state;

    public function __construct(Head $head)
    {
        $this->_head = $head;
        $this->_state = self::STATE_HALT;
    }

    public function load(Program $program): void
    {
        $this->_program = $program;
        $this->_state = $this->_program->getInitialState();
    }

    public function getState(): string
    {
         return $this->_state;
    }

    public function step(): void
    {
        $input = $this->_head->read();
        $tr = $this->_program->getTransition($this->_state, $input);

        if ($write = $tr->toWrite()) {
            $this->_head->write($write);
        }

        if ($state = $tr->nextState()) {
            $this->_state = $state;
        }

        if ($tr->nextMove() == 'R') {
            $this->_head->moveRight();
        } elseif ($tr->nextMove() == 'L') {
            $this->_head->moveLeft();
        }
    }

    public function run(): void
    {
        while ($this->_state != self::STATE_HALT) {
            $this->step();
        }
    }

    public function getTape(): Tape{
        return $this->_head->getTape();
    }
}
