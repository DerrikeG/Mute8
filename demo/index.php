<?php
require_once(__DIR__ . '/../vendor/autoload.php');
mb_internal_encoding("UTF-8");
header('content-type:text/html;charset=utf-8');
/*
use DerrikeG\Mute8\TextSelector;
use DerrikeG\Mute8\Bubble;

$selector = new TextSelector('hello I love oranges');
$selector->selectRandomWord();
$mutator = new Bubble($selector);
echo $mutator->mutate();
*/

function dirToFlatArray($dir, $relativeRoot='') {
    $result = array();

    $cdir = scandir($dir.DIRECTORY_SEPARATOR.$relativeRoot);
    foreach ($cdir as $key => $value){
        if (!in_array($value,array(".",".."))){
            if (is_dir($dir . DIRECTORY_SEPARATOR . $value)){
                $result = array_merge($result, dirToFlatArray($dir, $value));
            }else{
                $result[] = $relativeRoot."\\".substr($value, 0, -4);
            }
        }
    }

    return $result;
}

$ns = "DerrikeG\\Mute8";
$selectors_to_test = dirToFlatArray('..\src\Selectors');
$mutators_to_test = dirToFlatArray('..\src\Mutators');


$string_to_test = "seven birds in my house";


$selector = $ns."\\Selectors\\Regexes\\RegexSecondWord";
$output = [];

foreach($mutators_to_test as $mutator){
    $mut = $ns."\\Mutators\\".$mutator;
    $output[$mutator] = [];
    foreach($selectors_to_test as $selector){
        $sel = $ns."\\Selectors\\".$selector;
        $output[$mutator][$selector] = (new $mut(new $sel($string_to_test)))->mutate();
    }
}

// BELOW: IDEAL SYNTAX FOR PERFORMING MUTATION (SIMPLE)
/*
    $mut = new Mutator("yes this is dog", "Bubble")
 */

// RECIPES: THINGS TO DO WHEN YOU'RE BORED
/*
 * 1) Run a mutator set against a file i/o buffer and ruin its contents.
 * 2) Tell your dad about it.
 */

$hotbed = '';

$sel = new \DerrikeG\Mute8\Selectors\RegexPoints\RegexPointSecondWord($string_to_test);
// Selection->setSource($s);
// Regex->setSubject($s);

$mut = new \DerrikeG\Mute8\Mutators\Replacers\DoNotEnter($sel);
// Mutator->setSelector($s)
//      $s->select();
//      $s->selection[] is populated with TextRanges

$snowmen = [
    '☃',
    '⛄',
    '⛇',
    '👻'
];

$verbs = [
    'Loves',
    'Owns',
    'Likes',
    'Does Not Understand'
];

$things = [
    'The Future',
    'PHP',
    'You',
    'The World',
    'Korea',
    'Seven Dogs',
    'Birds'
];

$hotbed = $snowmen[array_rand($snowmen)]." Unicode Snowman ".$verbs[array_rand($verbs)]." ".$things[array_rand($things)];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Temp Site</title>
    <meta name="description" content="" >

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css"></script>
    <style>
        * {
            font-family: Universalia, DejaVu Sans, Symbola, Everson Mono, Dingbats, Segoe UI Symbol, Quivira, SunExt-A, FreeSerif, unifont;
        }
    </style>
</head>
<body>
    <article>
        <h1>Your Results: <?=$hotbed?></h1>
        <table class="table table-striped table-bordered dataTable no-footer">
            <tr>
                <th>Mutator/Selector</th>
                <?php
                foreach($selectors_to_test as $head){
                    ?>
                    <th><?=$head?></th>
                    <?
                }
                ?>
            </tr>
            <?php
                foreach($output as $mut => $selectors){
                    ?>
                    <tr>
                        <td><?=$mut?></td>
                        <?
                        foreach($selectors as $sel){
                            ?>
                            <td><?=$sel?></td>
                            <?
                        }
                        ?>
                    </tr>
                <?php
                }
            ?>
        </table>
    </article>
</body>
</html>