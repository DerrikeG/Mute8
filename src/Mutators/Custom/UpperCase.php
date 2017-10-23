<?php
namespace DerrikeG\Mute8\Mutators\Custom;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * Class UpperCase
 * @package DerrikeG\Mute8
 */
class UpperCase extends Mutator{
    /**
     * @param string $mutateString
     * @return string
     */
    public function subMutate($mutateString){
        return mb_strtoupper($mutateString);
    }
}