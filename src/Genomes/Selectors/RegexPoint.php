<?php
namespace DerrikeG\Mute8\Genomes\Selectors;
use DerrikeG\Mute8\TextRange;
use DerrikeG\Mute8\Genomes\Selection;

/**
 * For use by Regex Selectors
 *
 * Class Regex
 * @package DerrikeG\Mute8
 */
abstract class RegexPoint extends Selection {
    /**
     * @var string $pattern
     */
    protected $pattern = '';

    /**
     * @var string
     */
    protected $subject = '';

    /**
     * @var array
     */
    protected $matches = [];

    /**
     * @param $subject
     */
    function setSubject($subject){
        $this->subject = $subject;
    }

    /**
     * @param $source
     */
    function __construct($source){
        parent::__construct($source);
        $this->setSubject($this->source);
    }

    /**
     * @return array
     */
    public function select(){
        preg_match($this->pattern, $this->subject, $this->matches, PREG_OFFSET_CAPTURE);
        unset($this->matches[0]);

        foreach($this->matches as $i => $data){
            $this->selection[] = new TextRange($data[1], 0);
            $this->selection[] = new TextRange($data[1]+mb_strlen($data[0]), 0);
        }

        return $this->selection;
    }
}