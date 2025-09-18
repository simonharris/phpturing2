<?php

namespace Phpturing;

class Transition
{
    private ?string $next_state = null;
    private ?string $to_write = null;
    private ?string $next_move = null;

    public function __construct(
        ?string $state = null,
        ?string $write = null,
        ?string $move = null
    ) {
        $this->next_state = $state;
        $this->to_write = $write;
        $this->next_move = $move;
    }

    public function nextState(): string|null
    {
        return $this->next_state;
    }

    public function toWrite(): string|null
    {
        return $this->to_write;
    }

    public function nextMove(): string|null
    {
        return $this->next_move;
    }
}
