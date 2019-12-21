## Fuzzy Matching OPE Encryption

[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![Fuzzy Matching OPE Encryption](/resources/square-dot.jpg)

Random Unicode alphabets for approximate string matching with order-preserving encryption (OPE).

### Install

Via composer:

    $ composer require programarivm/fuzzy-matching-ope-encryption

### Set up the Environment

Create an `.env` file:

    cp .env.example .env

This is the encryption algorithm key consisting in both a foreground alphabet and a background alphabet:

    FUZZY_MATCHING_FOREGROUND_ALPHABET="Arabic,HangulJamo,Phoenician"
    FUZZY_MATCHING_BACKGROUND_ALPHABET="AlchemicalSymbols,Tibetan"

The unicode ranges available can be found at [programarivm/unicode-ranges](https://github.com/programarivm/unicode-ranges/tree/master/src/Range)

### Encryption Example

```php
<?php

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

// ...

$alphabet = new EnglishAlphabet;

$foreground = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET'));
$background = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_BACKGROUND_ALPHABET'));

$fuzzyAlphabet = new FuzzyAlphabet($foreground, $background);

$crypt = new Crypt($fuzzyAlphabet);

$crypt->encrypt('foo');
```

The following CLI command is available:

    $ php cli/crypt.php foo
    🜄🜎🜤༁བྷདྷབྷ🜎🜧🜹🜄🜛🝱དྷ🜊༁ᇈདྷདྷ༻༁🜛ྉ🜎༻🜎ཪན🝱🜎ཪ۩🜲༫🜤༫ཪ༭ཎ🝱🜛🜪ྉ🜄ཪ🜘🜎🜙༫ཪབྷ🜲۩🜹🜪ྉ🜙🜧🜤༁ན།ཪྉ

Every time the command is run, the fuzzy alphabet is computed from scratch and therefore the cypher obtained will change:

    $ php cli/crypt.php foo
    🜭ق༰🝌🝌🝊🝣🝢࿒࿎🝌🝇🝊🝉🝲࿎🜧ྉ༴🝅🜦🝡🜧🝊🝣༴🝊🜪ྉ🝊🜭ྉ🝡🜦🝉🜭ྉ🜪🝢🝊🝊🜧༔🜖🝣🜦🜧🜧🝠ྉ🜖𐤎༰🜻🜸🝌𐤎🝣🝇༴🝠🝣🝚🜦

### Fuzzy String Matching Example

```php
<?php

use FuzzyMatching\Crypt;
use FuzzyMatching\Match;
use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\MimickedAlphabet;

// ...

$alphabet = new EnglishAlphabet;

$foreground = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_FOREGROUND_ALPHABET'));
$background = new MimickedAlphabet($alphabet, getenv('FUZZY_MATCHING_BACKGROUND_ALPHABET'));

$fuzzyAlphabet = new FuzzyAlphabet($foreground, $background);

$crypt = new Crypt($fuzzyAlphabet);
$match = new Match($fuzzyAlphabet);

$a = $crypt->encrypt('foo');
$b = $crypt->encrypt('boo');

$match->similarity($a, $b);
```

The following CLI command is available:

    $ php cli/match.php foo boo
    foo: 🝲🜤🜀🜼ཞ🜳࿏🝲࿏🜀🜳༮ۅ𐤉🝚༯🝥࿔🜳🝞བྷ🜳ཞ༯🝚🝏🝓🜓🝭🝚འ🝥༐🜼🜼🜼🜹🜹🝲༐🝥🜂🝚🝲བྷབྷ𐤉🜭🝲🜭🝏🝞🜀🝂🝲🜂༯🝲🝞༐🝞🜳🝥🝞
    boo: 🜳ཞ🜭🝲༯🝚𐤉࿔🝭🜭🝲འ𐤉🝥༮࿔🝥🜂🜂ཞཞ༮🝥༐🝂🝞🜀🜼🜤༮ᇏ࿔🝥ྈ🝲🝏🜼🝂🜀࿏🝭🝚🝚࿔🜤ྈ࿏🝲🜼🝂ྈ🝓བྷྈ🜀࿔🝥🝚🝚🝭🝂ྈ🜤༮
    Similarity: 0.67

Every time the command is run, the fuzzy alphabets are computed from scratch and therefore the cyphers will change:

    php cli/match.php foo boo
    foo: ༠🝈འ༠༭𐤎ྈྈ🝈🜷🜧རའ🜌🝈འ🜗🜷འ🜑🜷🜦ྈ🜑🝪ྈ🜕༠🜦🜑🜗🜥ཀྵཀྵ𐤎🜑🝩🝪ཀྵ🜦ྈ🝩འ🜦🜑🜢🝈🝈🝀🜽🜪ར🜗🜪🝪𐤛🝪🜑🜕🜑༭ཀྵ🜗🜕
    boo: 🜑ཀྵ࿈༭🜧𐤎🝀༭༭🜽🜑ར🜦༭🜑🜕🜢🝩🝪🜒ཀྵ🝈🜕ར𐤎ྈ🜾🜌🜪ར🜗🜪ཀྵ🝩🝈🜪🝀🜢🜌🜑🜌འ🜦ྈ🜾༭🜦🝀🜾🜧🜐🜥🜷🜌🜌🜑ᅺ🜷🝀🜌༭ྈ🜪ར
    Similarity: 0.67

### License

The GNU General Public License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Fuzzy Matching OPE Encryption Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
