<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\TestCase;

use Phpturing\Head;
use Phpturing\Machine;
use Phpturing\Program;
use Phpturing\Tape;


class IntegrationTest extends TestCase
{
    public function testIncrement()
    {
        $init = '1111'; # 4 in unary
        $code = $this->_readCode('tests/programs/increment.json');

        $machine = new Machine(new Head(new Tape($init)));
        $machine->load(new Program($code));
        $machine->run();

        $this->assertequals('11111', $machine->getTape());  # 5 in unary
    }

    // public function test_add_two():

    //     init = '1111_111' # 4+3 in unary
    //     code = self._read_code('tests/programs/add_two.json')

    //     machine = Machine(Head(Tape(init)))
    //     machine.load(Program(code))
    //     machine.run()

    //     assert str(machine.get_tape()) == '1111111' # 7 in unary

    public function _readCode($filename): array
    {
        $fname = 'programs/01.json';
        $code  = file_get_contents($fname);
        return json_decode($code, TRUE);
    }
}
