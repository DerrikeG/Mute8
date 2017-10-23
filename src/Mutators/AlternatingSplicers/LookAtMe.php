<?php
namespace DerrikeG\Mute8\Mutators\AlternatingSplicers;
use DerrikeG\Mute8\Genomes\Mutators\AlternatingSplicer;

/**
 * Class LookAtMe
 * @package DerrikeG\Mute8
 */
class LookAtMe extends AlternatingSplicer{
    /**
     * @var string
     */
    public $spliceChars = ["☛", "☚"];


    public $splicePattern = [0, 1];
}