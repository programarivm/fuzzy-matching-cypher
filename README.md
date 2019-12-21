## Fuzzy Matching OPE Encryption

[![Build Status](https://travis-ci.org/programarivm/fuzzy-matching-ope-encryption.svg?branch=master)](https://travis-ci.org/programarivm/fuzzy-matching-ope-encryption)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![Fuzzy Matching OPE Encryption](/resources/square-dot.jpg)

Random Unicode alphabets for approximate string matching with order-preserving encryption (OPE). This library is useful to perform fuzzy string comparisons on encrypted texts.

    $ php cli/match.php stjohnrd stjohnroad
    stjohnrd: 🝊༕🜔࿔🜔🝙ྋྋᅺ🜮🜮ྋ🜙🝧🝇ྋྋ🜮🜷🝙ᄓ🜌ྋ࿊࿔🝡🝇🝧🝡ྋ🜮𐤚؎ྋ🜃𐤒ᆷ🜙🜙؍🜷🜷ྋ🜯࿔ᄞྋ༖🝳🜮༕🝳🝙🜷༖ྋྋ🜍༖🜌༪༕🜙༖
    stjohnroad: 🜃༁𐤒ᅺཔ🝱🝊࿊🝳🜯࿔؍🜌🜃🝡🝧པ༁ྋ🝁༕🝙🝙࿔🝇࿊ᄓ🜃🜯🝇༻༈𐤚པᆷ༈🝡🝡𐤒🜃🜔ᄞ࿔🝧🜃🝇🜌༪🜯🜌🝊༻ᅞ🝙🜮🝱🝱🜌؎🜷🝡🜍࿔༁
    Similarity: 0.89

### Install

Via composer:

    $ composer require programarivm/fuzzy-matching-ope-encryption

### Set up the Environment

To generate the `.fuzzy-alphabet` serialized object:

```php
<?php

use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;

$english = new EnglishAlphabet;

new FuzzyAlphabet($english);
```

The following CLI command is available at [`cli/fuzzy-alphabet.php`](https://github.com/programarivm/fuzzy-matching-ope-encryption/blob/master/cli/fuzzy-alphabet.php):

    $ php cli/fuzzy-alphabet.php

### Encryption Example

```php
<?php

use FuzzyMatching\Crypt;

$fuzzyAlphabet = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-alphabet'));

$crypt = new Crypt($fuzzyAlphabet);

$cypher = $crypt->encrypt('foo');
```

The following CLI command is available at [`cli/crypt.php`](https://github.com/programarivm/fuzzy-matching-ope-encryption/blob/master/cli/crypt.php):

    $ php cli/crypt.php foo
    🜙ᇊ࿔🜙࿈🜓࿈🜜🝙🜀𐤘༓འ🝢🝙🝞࿋༡ཋ࿈🜙🝟🜁༓🜙࿈🝠🝆༓༡🝢🝞ཤ🜜🝟🝟🝙🜜🝠࿔🜜ཤ🜙🝙🜰ᇊ🜰༡🜰🝟🜣༡🝠🜑🜀༥༳༥༡🝆༳🝆🜑༥

Every time it is run the cypher will change:

    $ php cli/crypt.php foo
    🜰🝠༥ཤ༥ᇊ🜁🝠࿋🝢༳🝞𐤘🝢ཋ༥🜙ᇊཋ🜙🝢ཤཋཎཋ🝆འ🜑འ🝢🜣🜙༓༳༓༥࿈༓🜜🝞🝠ཤ༓འ🜰ཤཎ🝞🝢🝟🜁ཋ࿋🜣࿋🝠༳༥🜙ཤ🝞🜣༳🝠

### Fuzzy String Matching Example

```php
<?php

use FuzzyMatching\Crypt;
use FuzzyMatching\Match;

$fuzzyAlphabet = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-alphabet'));

$crypt = new Crypt($fuzzyAlphabet);
$match = new Match($fuzzyAlphabet);

$a = $crypt->encrypt('foo');
$b = $crypt->encrypt('boo');

$similarity = $match->similarity($a, $b);
```

The following CLI command is available at [`cli/match.php`](https://github.com/programarivm/fuzzy-matching-ope-encryption/blob/master/cli/match.php):

    $ php cli/match.php foo boo
    foo: 🝠༥𐤘࿔࿈🝢🜙🝞࿋࿋🜰࿔🜁ᇊ༡འ🜰🝠࿈🜀🜓༥🝆࿔🜀🜜🜰🜁🜁࿋🝆࿔ᇊ🝞༓🝟࿈🝆ཤཤ🝢༥🜙🝢🜜🜁🜀🜓ཋ🜰🜑ཎཤ🝢🝙༳࿋ཋ🜜🜰༡ཎ༡༡
    boo: འ🜓🝠🝟࿋🝆འ🜄ᇊཤ🝆🜑༥࿋🝞🜙🜓🝟འ༡༓ཤ🝆࿈🜄ཤ𐤉🝠འཋའ࿋🝙༓࿋🜰🜄༥🝆࿈༡🝆🝞🜁🜰༥🜄༡ᇊ🜁🜙༓🝆🝟ཎཤ🜄🜄🜁༡🜣ཎ🜀࿋
    Similarity: 0.67

Every time it is run the cyphers will change:

    $ php cli/match.php foo boo
    foo: 🝙༥🝢🜁ཤཎཋ🝠ᇊ🜙༓࿋🝠🝞࿋འ࿋࿈🜙࿔࿔࿈༳🜄𐤘🜣ཎ🜣🝟🝠࿈🝙࿔🜓🜑༥🜁ཋཋ🝢🝞࿔༳འ🜑🜓🜙🝙🜄ᇊ🜓🜀🝢🜙༳༡࿋༓🜑🜁🝟🜙🜀༥
    boo: 🜓🝟🝟🝢🜰🝢🝠࿈🜁🜄༡🝆🜁🝙🜑འ🜰࿈༳࿈འ🜜ཎ🜰🜰𐤉🝞࿋འཋའ🝞🜜🝢🝠🜜🜄🜁🜓ᇊ🜣ཋ🜓ᇊའ༳🜓🜑🜙🜜࿈࿔🜁🝙🝠🜜🜜༡🝠༳༡࿔🜙🜣
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
