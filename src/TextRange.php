<?php

    namespace DerrikeG\Mute8;

    /**
     * The primitive that allows for ranges, selections create this.
     *
     * Class TextRange
     * @package DerrikeG\Mute8
     */
    /**
     * Class TextRange
     * @package DerrikeG\Mute8
     */
    class TextRange {
        /**
         * @var int
         */
        public $start = 0;
        /**
         * @var int
         */
        public $length = 0;
        /**
         * @var int
         */
        public $offset = 0;

        /**
         * @param $start
         * @param $length
         */
        function __construct($start, $length){
            $this->start = $start;
            $this->length = $length;
        }

        /**
         * @param $newOffset
         */
        public function setOffset($newOffset){
            $this->offset = $newOffset;
        }

        /**
         * @param $string
         * @return array
         */
        public function parts($string){
            return [
                'pre' => mb_substr($string,0,$this->start+$this->offset),
                'mid' => mb_substr($string,$this->start+$this->offset,$this->length),
                'post' => mb_substr($string,$this->start+$this->offset+$this->length)
            ];
        }
    }