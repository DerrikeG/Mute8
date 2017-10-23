<?php
namespace DerrikeG\Mute8\Genomes\Mutators;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * For use by Splice Mutators
 *
 * Class Surrounder
 * @package DerrikeG\Mute8
 */
abstract class Surrounder extends Mutator {
    /**
     * @var string
     */
    protected $frontChar = '';
    protected $backChar = '';

    /**
     * @param $mutateString
     * @return string
     * @internal param string $mutateString
     */
    public function subMutate($mutateString){
        return $this->frontChar.$mutateString.$this->backChar;
    }
}