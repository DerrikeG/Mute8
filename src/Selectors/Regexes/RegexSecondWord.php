<?php

namespace DerrikeG\Mute8\Selectors\Regexes;
use DerrikeG\Mute8\Genomes\Selectors\Regex;

/**
 * Class RegexSecondWord
 * @package DerrikeG\Mute8
 */
class RegexSecondWord extends Regex{
    protected $pattern = "/^\w+\s(\w+).+\s(\w+)$/";
}