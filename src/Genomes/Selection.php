<?php

namespace DerrikeG\Mute8\Genomes;
use DerrikeG\Mute8\SelectionIterator;

/**
 * Provides a context for a mutator to perform its replacements on.
 *
 * Class Selection
 * @package DerrikeG\Mute8
 */
abstract class Selection{
    // @todo: come up with a syntax for highlighting

    /**
     * @var array
     */
    public $selection = [];
    /**
     * @var array
     */

    /**
     * @var string
     */
    protected $source = '';


    /**
     * Performs the selection so that the class can be made use of.
     *
     * @return mixed
     */
    abstract public function select();

    /**
     * @param string $source
     */
    function __construct($source){
        // Ideally, there would be a ... to catch variable arguments and pass it up the chain
        // but I'm not clever enough to do that yet without breaking static analysis/phpunit/composer.
        $this->setSource($source);
    }

    /**
     * @param $newSource
     */
    public function setSource($newSource){
        $this->source = $newSource;
    }
    /**
     * @return string
     */
    public function getSource(){
        return $this->source;
    }

    /**
     * @return SelectionIterator
     */
    public function getSelection(){
        return new SelectionIterator($this->selection);
    }
}