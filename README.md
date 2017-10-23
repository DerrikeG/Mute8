# Mute8
Mutate strings using the magic of PHP.
The project was designed such that an RNG could make its own selections and apply multiple "mutations" to text.
In order to allow picking parts, Selectors make a string more workable by specifying which regions in a substring should be modified.
Mutators then take those regions and perform transformations either by modifying, replacing, or adding to the whole or parts of a selection.
By breaking it up into these two techniques it becomes a bit easier to apply partial filters to existing text and stack mutations.

# Download
Mute8 is also available on [packagist](https://packagist.org/packages/derrikeg/mute8) to include in your composer.json.

# Usage
After downloading the package and installing it (generating its autoloader), you should be able to do the following:
```php
use DerrikeG\Mute8\Mutators\Custom\UpperCase;
use DerrikeG\Mute8\Selectors\Words\FirstWord;

$selector = new FirstWord("birds love noodles!");
$mutator = new UpperCase($selector);

$results = $mutator->mutate();
echo $results;
```
Should produce: `"BIRDS love noodles!"`

# Extending
Everything is either a *Mutator* or a *Selector*, to make a new one you can either `extend` the base classes or one of their sub-types. ([mutator](/src/Genomes/Mutators), [selector](/src/Genomes/Mutators))

# Demo Results
![Demo Example](http://i.imgur.com/sM0jtcZ.png)
![Demo Closeup](http://i.imgur.com/MJO3SbI.png)
