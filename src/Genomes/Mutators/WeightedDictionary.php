<?php
namespace DerrikeG\Mute8\Genomes\Mutators;
use DerrikeG\Mute8\Genomes\Selection;
use DerrikeG\Mute8\Genomes\Mutator;

/**
 * For use by Weighted Dictionary Mutators.
 *
 * Class WeightedDictionary
 * @package DerrikeG\Mute8
 */
abstract class WeightedDictionary extends Mutator {
    /**
     * @param Selection $selector
     */
    public function __construct(Selection $selector){
        parent::__construct($selector);
        $this->weigh();
    }

    /**
     * @var array
     */
    protected $weighedDictionary = [];

    /**
     * @param $newWeighedDictionary
     */
    public function setWeighedDictionary($newWeighedDictionary){
        $this->weighedDictionary = $newWeighedDictionary;
    }

    /**
     *
     */
    public function weigh(){
        $temp = [];
        foreach($this->dictionary as $key => $val){
            if(is_array($val)){
                $temp[$key] = $val[mt_rand() % count($val)];
            }else{
                $temp[$key] = $val;
            }
        }
        $this->setWeighedDictionary($temp);
    }

    /**
     * @param $mutateString
     * @return string
     * @internal param string $mutateString
     */
    public function subMutate($mutateString){
        return strtr($mutateString, $this->weighedDictionary);
    }
}