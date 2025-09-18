<?php

declare(strict_types=1);

namespace Phpturing\Tests;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

use Phpturing\Head;
use Phpturing\Machine;
use Phpturing\Program;


class MachineTest extends TestCase
{
    private Head&MockObject $_mock_head;
    private Machine $_machine;
    private Program $_program;

    public function setUp(): void
    {
        $fname = 'programs/01.json';
        $code  = file_get_contents($fname);
        $prog  = json_decode($code, TRUE);
        $this->_program = new Program($prog);

        $this->_mock_head = $this->createMock(Head::class);
        $this->_machine = new Machine($this->_mock_head);
        $this->_machine->load($this->_program);
    }

    public function testInitialisation(): void
    {
        $this->_mock_head->expects($this->never())->method('moveLeft');
        $this->_mock_head->expects($this->never())->method('moveRight');
    }

    public function test_machine(): void
    {
        # "state0012": {
        #   "0": {
        #     "next": "state0042",
        #     "write": 1,
        #     "move": "R"

        $this->_mock_head->expects($this->once())->method('read')->willReturn('0');
        $this->_machine->step();

        //$this->_mock_head->expects($this->once())->method('moveRight');
        // $this->_mockhead.write.assert_called_once_with('1')
       $this->assertEquals('state0042', $this->_machine->getState());
    }

}
