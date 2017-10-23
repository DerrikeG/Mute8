<?php
namespace DerrikeG\Mute8\Selectors\Words;
use DerrikeG\Mute8\Genomes\Selectors\Word;

/**
 * Class FirstWord
 * @package DerrikeG\Mute8
 */
class FirstWord extends Word{
    /**
     * @return mixed
     */
    public function select(){
        return $this->selection[] = $this->words[0];
    }
}