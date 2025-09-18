<?php

namespace Phpturing;

use ArrayAccess;

class Tape implements ArrayAccess
{
    public const CELL_BLANK = '_';

    private $store = [];

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
        $this->store = str_split($data);
    }

    /**
     * The Turing machine tape is theoretically infinite
     */
    public function offsetExists(mixed $key): bool
    {
        return true;
    }

    public function offsetGet(mixed $key): mixed
    {
        if (array_key_exists($key, $this->store)) {
            return $this->store[$key];
        }
        return self::CELL_BLANK;
    }

    public function offsetSet(mixed $key, mixed $val): void
    {
        $this->store[$key] = $val;
    }

    public function offsetUnset(mixed $key): void
    {
        unset($this->_store[$key]);
    }

    public function __toString(): string
    {
        return trim(join($this->store), self::CELL_BLANK);
    }
}
