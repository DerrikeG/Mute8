<?php
namespace DerrikeG\Mute8;


/**
 * Class MutatorTest
 * @package DerrikeG\Mute8
 */
class MutatorTest extends \PHPUnit_Framework_TestCase{
    /**
     *
     */
    public function testCanBeMutated(){
        $stub = $this->getMockForAbstractClass(
            'DerrikeG\Mute8\Mutator',
            [$this->getMockForAbstractClass('DerrikeG\Mute8\Selection', ['feed'])]
        );

        /* example of abstraction dealio
        $stub->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(TRUE));
        */

        $this->assertEquals("yes", $stub->woot("yes"));
    }
}