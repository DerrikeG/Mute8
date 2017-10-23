<?php
namespace DerrikeG\Mute8\Mutators\Splicers;
use DerrikeG\Mute8\Genomes\Mutators\Splicer;

/**
 * Class UnderLine
 * @package DerrikeG\Mute8
 */
class UnderLine extends Splicer{
    /**
     * @var string
     */
    public $spliceChar = "̲";
	//should not combined with: "̅" "̶" "̷"
}
