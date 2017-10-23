<?php

namespace DerrikeG\Mute8;

/**
 * Class SelectionIterator
 * @package DerrikeG\Mute8
 */
class SelectionIterator implements \Iterator {
        /* $it = new SelectionIterator($data);
            1 = r,v,c,k,p,e
            2 = n,v,c,k,p,e
            3 = n,v,c,k,p,e
            4 = n,v
            http://php.net/manual/en/class.iterator.php
        */
    /**
     * @var int
     */
    private $position = 0;
    /**
     * @var array
     */
    private $data = [];

    /**
     * @param $data
     */
    public function __construct($data){
            $this->position = 0;
            $this->data = $data;
        }

    /**
     *
     */
    function rewind(){ // back to beginning
            $this->position = 0;
        }

    /**
     * @return mixed
     */
    function current(){ // data for current iteration
            return $this->data[$this->position];
        }

    /**
     * @return int
     */
    function key(){ // get the current position
            return $this->position;
        }

    /**
     *
     */
    function next(){// pony up to the next step
            ++$this->position;
        }

    /**
     * @return bool
     */
    function valid(){ // are we where we shouldn't be?
            return isset($this->data[$this->position]);
        }
    }