## Fuzzy Matching Encrypted

[![Build Status](https://travis-ci.org/programarivm/fuzzy-matching-encrypted.svg?branch=master)](https://travis-ci.org/programarivm/fuzzy-matching-encrypted)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![Fuzzy Matching Encrypted](/resources/square-dot.jpg)

Performs fuzzy string matchings on encrypted texts.

### Install

Via composer:

    $ composer require programarivm/fuzzy-matching-encrypted

### Generate the Fuzzy Alphabet

This is how to generate the `.fuzzy-alphabet` serialized object:

```php
<?php

use FuzzyMatching\Alphabet\EnglishAlphabet;
use FuzzyMatching\Alphabet\FuzzyAlphabet;

$english = new EnglishAlphabet;

new FuzzyAlphabet($english);
```

The fuzzy alphabet can be generated with the CLI command available at [`cli/fuzzy-alphabet.php`](https://github.com/programarivm/fuzzy-matching-encrypted/blob/master/cli/fuzzy-alphabet.php):

    $ php cli/fuzzy-alphabet.php

> **Important**: The `.fuzzy-alphabet` file must be kept secret.

### Encryption

```php
<?php

use FuzzyMatching\Crypt;

$fuzzyAlphabet = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-alphabet'));

$crypt = new Crypt($fuzzyAlphabet);

$cypher = $crypt->encrypt('foo');
```

> **Note**: The maximum length of the plain text is 32 characters, and the cypher is 64 characters length.

### Fuzzy String Matching

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

### CLI Examples

- [`cli/crypt.php`](https://github.com/programarivm/fuzzy-matching-encrypted/blob/master/cli/crypt.php)
- [`cli/match.php`](https://github.com/programarivm/fuzzy-matching-encrypted/blob/master/cli/match.php)

### License

The GNU General Public License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Fuzzy Matching OPE Encryption Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
