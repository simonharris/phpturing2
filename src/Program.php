<?php

namespace Phpturing;

class Program
{
    private string $initial_state;
    private array $transitions;

    public function __construct(array $data)
    {
        $this->initial_state = $data['initialState'];
        $this->transitions = $data['transitions'];
    }

    public function getInitialState(): string
    {
        return $this->initial_state;
    }

    public function getTransition(string $state, string $readval): Transition
    {
        $tr_config = $this->transitions[$state][$readval];
        return new Transition(
            $tr_config['next'] ?? null,
            $tr_config['write'] ?? null,
            $tr_config['move'] ?? null
        );
    }
}
