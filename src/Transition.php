<?php

namespace Phpturing;


class Transition
{
    private ?string $_next_state = null;
    private ?string $_to_write = null;
    private ?string $_next_move = null;

    public function __construct(?string $state = null,
                                ?string $write = null,
                                ?string $move = null)
    {
        $this->_next_state = $state;
        $this->_to_write = $write;
        $this->_next_move = $move;
    }

    public function nextState(): string|null
    {
        return $this->_next_state;
    }

    public function toWrite(): string|null
    {
        return $this->_to_write;
    }

    public function nextMove(): string|null
    {
        return $this->_next_move;
    }
}
