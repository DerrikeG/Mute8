<?php
namespace DerrikeG\Mute8\Selectors\WordPoints;
use DerrikeG\Mute8\Genomes\Selectors\WordPoint;
use DerrikeG\Mute8\TextRange;

/**
 * Class FirstWord
 * @package DerrikeG\Mute8
 */
class RandomWord extends WordPoint{
    /**
     * @return mixed
     */
    public function select(){
        $theWord = $this->words[mt_rand(0, sizeof($this->words) -1)];
        $len = $theWord->length;
        for ($i = 0; $i <= $len; $i++){
            if($i!=0 or $i!=$len){
                $this->selection[] = new TextRange($theWord->start+$i, 0);
            }
        }
        return $this->selection;
    }
}