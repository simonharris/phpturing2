<?php

namespace Phpturing;


class Head
{
    private Tape $_tape;
    private int $_index;

    public function __construct(Tape $tape)
    {
        $this->_tape = $tape;
        $this->_index = 0;
    }

    public function read(): mixed
    {
        return $this->_tape[$this->_index];
    }

    public function write(mixed $value): void
    {
        $this->_tape[$this->_index] = $value;
    }

    public function moveLeft(): void
    {
        $this->_index--;
    }

    public function moveRight(): void
    {
        $this->_index++;
    }
}
