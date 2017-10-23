<?php
namespace DerrikeG\Mute8\Genomes\Mutators;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * For use by Splice Mutators
 *
 * Class AlternatingSplicer
 * @package DerrikeG\Mute8
 */
abstract class AlternatingSplicer extends Mutator {
    /**
     * @var array
     */
    protected $spliceChars = [];

    /**
     * @var array splicePattern
     */
    protected $splicePattern = [];

    /**
     * @return string
     */
    protected function getSpliceChar(){
        return $this->spliceChars;
    }

    /**
     * @param $mutateString
     * @return string
     * @internal param string $mutateString
     */
    public function subMutate($mutateString){
        $buff = '';
        $len = mb_strlen($mutateString)-1;
        $patternsize = count($this->splicePattern);
        $splicesize = count($this->spliceChars);
        for($i = 0; $i <= $len; $i++){
            $buff .= $mutateString[$i];
            if($i!=$len){
                if($patternsize > 0){
                    $buff .= $this->spliceChars[$this->splicePattern[$i % $patternsize]];
                }else{
                    $buff .= $this->spliceChars[$i % $splicesize];
                }

            }
        }
        return $buff;
    }
}