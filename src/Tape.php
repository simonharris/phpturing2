<?php

namespace Phpturing;

use ArrayAccess;


class Tape implements ArrayAccess
{
    const CELL_BLANK = '_';

    private $_store = [];

    public function __construct(?string $data = null)
    {
        if ($data) {
            $this->populate($data);
        }
    }

    /**
     * Populate the tape from scratch with arbitrary data
     */
    public function populate(string $data): void
    {
        $this->_store = str_split($data);
    }

    /**
     * The Turing machine tape is theoretically infinite
     */
    public function offsetExists(mixed $key): bool
    {
        return TRUE;
    }

    public function offsetGet(mixed $key): mixed
    {
        if (array_key_exists($key, $this->_store)) {
            return $this->_store[$key];
        }
        return self::CELL_BLANK;
    }

    public function offsetSet(mixed $key, mixed $val): void
    {
        $this->_store[$key] = $val;
    }

    public function offsetUnset(mixed $key): void
    {
        unset($this->_store[$key]);
    }
}
