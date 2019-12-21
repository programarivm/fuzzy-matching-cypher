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

This is the encryption algorithm key consisting in both a foreground alphabet and a background alphabet.

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

Every time the command is run, the fuzzy alphabet is computed from scratch and therefore the cypher will be different:

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
    foo: ؠ𐤖𐤖བྷ࿐🜼🜈🜼༚🝥གྷ🝄༚🜒༳གྷཇ🜚🝔གྷཤ🜼བྷ༚🜅ཝ༚🜱🜒🜰🜈🜂🝛༚࿐🜒🜈ཇ🜅࿘🜷🜂ཤ🜂🜼🜰༳🝄🜏🜂࿐🜱༃🝄གྷཏ🜱🜂ཤ࿘࿐ཊ🝥🜚
    boo: ᅤ𐤖𐤖🜏🜏🝔༃🜈🜼🜈བྷ🜚🝥🜅🝥࿘ཝ🜏🜰࿐བྷ🜏🜏བྷཇ🜰🜼🜅🜂༚ཊཇ🜂🜼🜼༃🝛࿐🜂🜈🜚ཏཇ🜈🜏🜚🜼🜱༃༃ཝ༳🜅ཏཤ🝔🜰🝄གྷ࿘🜂🝥🜚🜰
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
