<?php
namespace DerrikeG\Mute8\Genomes\Mutators;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * For use by Splice Mutators
 *
 * Class Splicer
 * @package DerrikeG\Mute8
 */
abstract class Splicer extends Mutator {
    /**
     * @var string
     */
    protected $spliceChar = '';

    /**
     * @return string
     */
    protected function getSpliceChar(){
        return $this->spliceChar;
    }

    /**
     * @param $mutateString
     * @return string
     * @internal param string $mutateString
     */
    public function subMutate($mutateString){
        $buff = '';
        $len = mb_strlen($mutateString)-1;
        for($i = 0; $i <= $len; $i++){
            $buff .= $mutateString[$i];
            if($i!=$len){
                $buff .= $this->getSpliceChar();
            }
        }
        return $buff;
    }
}