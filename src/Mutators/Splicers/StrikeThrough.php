<?php
namespace DerrikeG\Mute8\Mutators\Splicers;
use DerrikeG\Mute8\Genomes\Mutators\Splicer;

/**
 * Class StrikeThrough
 * @package DerrikeG\Mute8
 */
class StrikeThrough extends Splicer{
    /**
     * @var string
     */
    public $spliceChar = "̶";
    //but not combined with: "̲"  "̷"
}