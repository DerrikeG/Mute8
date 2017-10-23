<?php
namespace DerrikeG\Mute8\Mutators\Splicers;
use DerrikeG\Mute8\Genomes\Mutators\Splicer;

/**
 * Class OverLine
 * @package DerrikeG\Mute8
 */
class OverLine extends Splicer{
    /**
     * @var string
     */
    public $spliceChar = "̅";
    //but not combined with: "̲" "̶" "̷"
}