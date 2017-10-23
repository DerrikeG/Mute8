<?php
namespace DerrikeG\Mute8\Genomes\Mutators;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * For use by Splice Mutators
 *
 * Class Splicer
 * @package DerrikeG\Mute8
 */
abstract class Replacer extends Mutator {
    /**
     * @var string
     */
    protected $replaceChar = '';

    /**
     * @param $mutateString
     * @return string
     * @internal param string $mutateString
     */
    public function subMutate($mutateString){
        return $this->replaceChar;
    }
}