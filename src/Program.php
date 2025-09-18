<?php

namespace Phpturing;


class Program
{
    private string $_initial_state;
    private array $_transitions;

    public function __construct(array $data)
    {
        $this->_initial_state = $data['initialState'];
        $this->_transitions = $data['transitions'];
    }

    public function getInitialState(): string
    {
        return $this->_initial_state;
    }

    public function getTransition(string $state, string $readval): Transition
    {
        $tr_config = $this->_transitions[$state][$readval];
        return new Transition($tr_config['next']??null, $tr_config['write']??null, $tr_config['move']??null);
    }
}
