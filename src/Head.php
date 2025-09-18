<?php

namespace Phpturing;

class Head
{
    private Tape $tape;
    private int $index;

    public function __construct(Tape $tape)
    {
        $this->tape = $tape;
        $this->index = 0;
    }

    public function read(): mixed
    {
        return $this->tape[$this->index];
    }

    public function write(mixed $value): void
    {
        $this->tape[$this->index] = $value;
    }

    public function moveLeft(): void
    {
        $this->index--;
    }

    public function moveRight(): void
    {
        $this->index++;
    }

    public function getTape(): Tape
    {
        return $this->tape;
    }
}
