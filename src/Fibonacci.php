<?php

namespace Phpturing;

class Fibonacci
{
    /**
     * Generate the first n numbers in the Fibonacci sequence
     *
     * @param int $count Number of Fibonacci numbers to generate
     * @return array Array of Fibonacci numbers
     */
    public function generate(int $count): array
    {
        if ($count <= 0) {
            return [];
        }

        if ($count === 1) {
            return [0];
        }

        $sequence = [0, 1];

        for ($i = 2; $i < $count; $i++) {
            $sequence[] = $sequence[$i - 1] + $sequence[$i - 2];
        }

        return $sequence;
    }
}
