<?php

namespace DerrikeG\Mute8\Genomes;

/**
 * Performs mutations (replacements, etc) on a provided selection.
 *
 * Class Mutator
 * @package DerrikeG\Mute8
 */
/**
 * Class Mutator
 * @package DerrikeG\Mute8\Genomes
 */
abstract class Mutator{
    /**
     * @param Selection $selector
     * @param mixed $seed
     */
    public function __construct(Selection $selector, $seed=NULL){
        $this->setSelector($selector);
        $this->setSeed( (is_null($seed) ? $this->defaultSeed() : $seed) );
        mt_srand($this->seed);
    }

    /**
     * @var Selection
     */
    protected $selector;
    /**
     * @var array
     */
    protected $dictionary = [];

    /**
     * @var int seed
     */
    protected $seed = 0;

    /**
     * @param $newSeed
     */
    public function setSeed($newSeed){
        $this->seed = $newSeed;
    }

    /**
     * @return float
     */
    public function defaultSeed(){
        list($usec, $sec) = explode(' ', microtime());
        return (float) $sec + ((float) $usec * 100000);
    }

    /**
     * @param Selection $selector
     */
    public function setSelector(Selection $selector){
        $this->selector = $selector;
        $this->selector->select();
    }

    /**
     * Iterate through the parts of a selector
     *
     * @return mixed
     */
    public function mutateUnsafe(){
        foreach($this->selector->getSelection() as $range){
            $temp = $range->parts($this->selector->getSource());
            $temp['mid'] = $this->subMutate($temp['mid']);
            $this->selector->setSource(implode('',$temp));
        }
        return $this->selector->getSource();
    }

    /**
     * @return string
     */
    public function mutate(){
        $running_delta = 0;
        foreach($this->selector->getSelection() as $range){
            //if anything has adjusted the delta
            $range->setOffset($running_delta);

            //after correcting the offset, it's safe to split it
            $temp = $range->parts($this->selector->getSource());

            //once we split it we have the middle string and can calculate the new delta
            $running_delta += $this->subDelta($temp['mid']);

            $temp['mid'] = $this->subMutate($temp['mid']);
            $this->selector->setSource(implode('',$temp));
        }
        return $this->selector->getSource();
    }

    /**
     * @param $mutateString
     * @return int
     */
    public function subDelta($mutateString){
        return mb_strlen($this->subMutate($mutateString))-mb_strlen($mutateString);
    }

    /**
     * @param $mutateString
     * @return string
     * @internal param string $mutateString
     */
    public function subMutate($mutateString){
        return strtr($mutateString, $this->dictionary);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function woot($input){
        return $input;
    }
}