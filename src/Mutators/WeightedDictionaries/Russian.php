<?php
namespace DerrikeG\Mute8\Mutators\WeightedDictionaries;
use DerrikeG\Mute8\Genomes\Mutators\WeightedDictionary;

/**
 * Class Russian
 * @package DerrikeG\Mute8
 */
class Russian extends WeightedDictionary{
	/**
	 * @var array
     */
	protected $dictionary = [
		'io' => 'ю',
		'IO' => 'Ю',
		'bi' => 'ы',
		'BI' => 'Ы',
		'A' => 'Д',
		'B' => 'Б',
		//C
		//D
		'E' => ['Є', 'Ё'],
		//F
		//G
		//H
		'I' => 'Ї',
		//J
		//K
		//L
		//M
		'N' => ['Й', 'И'],
		//O
		//P
		'Q' => 'Ф',
		'R' => 'Я',
		'S' => ['$','₴'],
		//T
		'U' => 'Ц',
		//V
		'W' => ['Щ', 'Ш'],
		'X' => 'Ж',
		//Y
		//Z

		'3' => 'З',

		//a
		'b' => ['Ь','в'],
		//c
		//d
		'e' => ['є','ё'],
		//f
		//g
		'h' => 'н',
		'i' => 'ї',
		//j
		'k' => 'к',
		//l
		'm' => 'м',
		'n' => ['п','и'],
		//o
		//p
		//q
		'r' => ['ґ','я'],
		's' => ['₴','$'],
		't' => 'т',
		'u' => 'ц',
		//v
		'w' => 'ш',
		'x' => 'ж',
		//y
		//z
	];
}
