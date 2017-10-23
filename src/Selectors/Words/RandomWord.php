<?php
namespace DerrikeG\Mute8\Selectors\Words;
use DerrikeG\Mute8\Genomes\Selectors\Word;

/**
 * Class RandomWord
 * @package DerrikeG\Mute8
 */
class RandomWord extends Word{
    /**
     * @return mixed
     */
    public function select(){
        return $this->selection[] = $this->words[mt_rand(0, sizeof($this->words) -1)];
    }
}