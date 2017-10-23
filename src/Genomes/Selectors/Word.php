<?php
namespace DerrikeG\Mute8\Genomes\Selectors;
use DerrikeG\Mute8\TextRange;
use DerrikeG\Mute8\Genomes\Selection;

/**
 * For use by Word Selectors
 *
 * Class Word
 * @package DerrikeG\Mute8
 */
abstract class Word extends Selection {
    /**
     * @param $source
     */
    function __construct($source){
        parent::__construct($source);
        $this->setWords($this->toWords($this->source));
    }

    /**
     * @var array
     */
    protected $words = [];

    /**
     * @var array
     */
    protected $white = [' '];

    /**
     * @param array $newWords
     */
    protected function setWords($newWords){
        $this->words = $newWords;
    }

    /**
     * Accept a string, iterate through it for specified whitespace characters.
     * The parts between the whitespace are considered words and produce TextRanges that correspond to their positions.
     *
     * @param $string
     * @return array
     */
    // @todo: Tokenize parts of string not within selection chain, implode against mutations
    // @todo: Add better word boundary detection using regex/white-list.
    /**
     * @param $string
     * @return array
     */
    protected function toWords($string){
        $words = [];
        $word_start = -1;
        $len = mb_strlen($string)-1;
        for ($i = 0; $i <= $len; $i++){
            //echo "$i/$len:$string[$i]<br>\n";
            $whitespace = in_array($string[$i], $this->white);
            if (!$whitespace && $word_start == -1) {
                // not whitespace, word begins here
                $word_start = $i;
            } elseif ($whitespace && $word_start >= 0) {
                // end of word
                $words[] = new TextRange($word_start, $i - $word_start);
                $word_start = -1;
            } elseif (!$whitespace && $i == $len){
                // end of string, make into word
                $words[] = new TextRange($word_start, $i - $word_start+1);
                $word_start = -1;
            } //else: part of a word sequence
        }
        //var_dump($words);
        // @todo: Use other whitespace delimiters, match parenthesized statements, etc.
        $this->setWords($words);
        return $words;
    }
}