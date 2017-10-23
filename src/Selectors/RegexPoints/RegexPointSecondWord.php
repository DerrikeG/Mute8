<?php

namespace DerrikeG\Mute8\Selectors\RegexPoints;
use DerrikeG\Mute8\Genomes\Selectors\RegexPoint;

/**
 * Class RegexPointSecondWord
 * @package DerrikeG\Mute8
 */
class RegexPointSecondWord extends RegexPoint{
    protected $pattern = "/^\w+\s(\w+).+\s(\w+)$/";
}