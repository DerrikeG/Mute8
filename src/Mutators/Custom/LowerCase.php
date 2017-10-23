<?php
namespace DerrikeG\Mute8\Mutators\Custom;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * Class LowerCase
 * @package DerrikeG\Mute8
 */
class LowerCase extends Mutator{
    /**
     * @param string $mutateString
     * @return string
     */
	public function subMutate($mutateString){
		return mb_strtolower($mutateString);
	}
}
