<?php
namespace DerrikeG\Mute8\Mutators\AlternatingSplicers;
use DerrikeG\Mute8\Genomes\Mutators\AlternatingSplicer;

/**
 * Class YouTriedReallyHard
 * @package DerrikeG\Mute8
 */
class YouTriedReallyHard extends AlternatingSplicer{
    /**
     * @var string
     */
    public $spliceChars = ["★", "☆"];


    public $splicePattern = [0, 1];
}