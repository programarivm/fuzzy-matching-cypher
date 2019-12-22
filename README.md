## Fuzzy Matching Encrypted

[![Build Status](https://travis-ci.org/programarivm/fuzzy-matching-encrypted.svg?branch=master)](https://travis-ci.org/programarivm/fuzzy-matching-encrypted)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![Fuzzy Matching Encrypted](/resources/square-dot.jpg)

Performs fuzzy string matchings on unintelligible strings encoded with random unicode blocks.

> **Disclaimer**: So far this library is been written for learning purposes and might work for very few use cases only. It has not been tested against frequency analysis attacks. Please use it at your own risk.

### Examples

#### [`cli/example.php`](https://github.com/programarivm/fuzzy-matching-encrypted/blob/master/cli/example.php)

    php cli/example.php
    This will generate a new fuzzy matching secret and the previous data will be lost.
    Do you want to proceed? (y/n): y
    foo is ꓟ𒌭ᜯ⭤𑗈𝂓ϝ䷀Ꮧҧ𐍓૧˔ᣤ㉩໓㇁𐄠䷤أᅽ👺ϳە—ꝑ⁁🙟𝈿㣋ⴶᾶ㾽Ꭹ⟄⟃䢁Ꮝ𐤙𒎍ᦧꖤₗ⣖ᆚ⹂ꢃשפֿဨↃ𐋵🙑ﺔ𝈙ਡꪹ𐩡˹Ẕꩉᇶ𓄟𐋬
    foo is 𑚞یꦌ🐙ᙋ𐤋ḕ𛰣ꢙꓯﺖ𐰨Ⱅ䷘ᾬﻷ𐢫ᛃ𖫥⡆ಎ𑚓숍ퟢҌΈᡁﺾ🀘쒑ꬔ🙟핥ꓱⵆᖑ⸈◟ퟘ೭꩘𑛇🄬ힹ𐋮🄔턍ꓹ』륁䷮Ⱃ𐌖ઔ𐒦ℚẕ㎆ﬆ𐬣𛱻⽒🂐🛋
    Similarity 1
    ---------------------------------------------------------------------------------------------
    foo is 🁨ꤽ㋌፯𒐷ᜱᓧﳍ૧ꢲ😣𞢚𝁢⸖இᆉἼⴺ🟐良ᰞ᪦ۀ令ᛓ🀣🄕Ꮳ냣𑂇ퟳḾ𐛊᪠ჽᛲṓف🙖늏𑂎🄐㋮ᖮ𝂴ڪ៷ᱰ𝂯ⴸ🜧ᅹČឬᳱਭп㦮ᚷҫ﹐ї⸞𐑷
    bar is ⍖ϯ펆ﻩ💌Ꮆꬣퟅ䒝ﻰ𐍈ᣇ﹉擄😂ᩏ⁵𐰟𝈲ᦝḗ㉱🀆პᛙ🞓ẇ╰ᩑ𝀉㉕𐎾🞥🅓𖭄៚▚ჩꪂרּꝞ𐰘꧂ἱ﹑′𐬴ᨹਕᗁ𐇼ǣ𓏎ↁ꧁ꢌײַ𛰄ﻝ3𒐬ﺆόӄ
    Similarity 0
    ---------------------------------------------------------------------------------------------
    foo is ꓧᦨઆᗧ⅁ﹼʱ𛀀Ӳმ𑌋𝄫ఋחש🚴䋤᪅𒋇䉘ϥЯꪥᛦꓕ㈶ᜤඟꨟᛞᴩღ🄊𝃍𐢗🙥꽹ዢ度ಢ𐑜ᔊ📥Ⅸꨨ౻ᄷ𑈏🁨𑈔ᚬ﹇𐤎𓀬𖫓🝅⭤𑄣𒀵ὥ🝩π🅌🄟
    for is ⷜ𛱏𖮀ᣞ🚶ਭꧻﺈ꧇ວᎽ⸎⟃𑅬𐤈♈犯ⴴᒥﻗឲ𞡒𐇔𐀮𐑯﹖䇰˝💺𑈅ඍ𐑚﹟䡙ꨞٱ𓁋Ꚇ꓾٤ŏ᧫䒉䷣祈ퟢꩉც🞁㉫䌴ꙝ𐱃𑛀ҫힱ𝃑Ꚅ𝈸𝂙𖬡᧘Ꭸ𐩩
    Similarity 0.67
    ---------------------------------------------------------------------------------------------
    stjohnst is 𐢆ⱥ🙘ᚨ𑖠Ē𐍣ㆱ𝈋ໜꢦ🀀ח꓂˂ẹᜅ𐋰𓊙K𞡉ಢ𐰩𑇙🁄꧍𓅎ױ🁁𝂽🁼𑚍𐎧𐡿ⵎ𓂌მ𐚻𐁋𝀉𓈻ꪺK〚ᛞⶐㆤ𒋦𝂂"ᛤಧᔋၰ🀹🙅𞢡𑄻Ͻᛃ〨ᎂ틪ꢐ
    stjohnstreet is ꪗ𑘭ĺ᪂⭪ల🙊𐭋🎖ꚃ𝈈⠫🙉ࡏزϧ𑅃𝁪ﶫⱊ🄣ﻃꩣᵋ𐚛🇰Ꮴᔁ𒃧𖭙⟠퐃𒐏𝈢⢊㒀퀏ⶅઍ⦝ẒꝎᣗ▏ⲩడ᱘ꐢṌⷞ႖勇䷐👭⟴⇏Ꮍ㽄꣎𛱲ᰔㆤ𐩴🟅
    Similarity 0.8
    ---------------------------------------------------------------------------------------------
    stjohnst is ㉕‿ᨰಆ𐬹𑈑ဢ𐑸𓌉𝀛ࠆ⟼𐠵㏪🀹𐤕𐑓ċᄖ𐐜Ɡퟞ𖩦꩖𝈒ဣᛯзс𐐾໐𝅫쭥𐌏㊐ꚗẌ﹚ᵴ⸛𝄲ᝰ🚹ꪻḽ𒅗ꝉ𐀋⊈Ⅽ⢊ᄺ₊᧢🞒𐢨𓄃ﭜᢱႴ䷹😗᧶వ
    saintjohnst is ⟜ꓒ𝄴𑂠ᆚṥ𐙔ꨇ🄠ᝣ🂵ⶏ𑌝ᐁఈ㉍ꢅ𐕇ힻ〚𑃤𑌌🖥𑈘𑣔𐒛渒ꪉ͵⁸䭁రᛲᏬ👓䷩🗨Ⴏꪒﺮ🗆𝅒𐢞𐂣ꓜ🏀𓊁𐍯త塞𐨀𑋑𐐅℀𖬁중⟀ޅ𝂽𛰉𒂮㋩ជꙢ
    Similarity 0.84
    ---------------------------------------------------------------------------------------------

### Install

Via composer:

    $ composer require programarivm/fuzzy-matching-encrypted

### Generate the Fuzzy Matching Secret

A `Crypt` object is responsible for generating the `.fuzzy-matching-secret` -- a serialized object, arguably something similar to an encryption key -- which then is required to perform the string comparisons through a `Match` object.

```php
<?php

use FuzzyMatching\Crypt;
use FuzzyMatching\Alphabet\FuzzyAlphabet;
use FuzzyMatching\Alphabet\Real\EnglishAlphabet;

$fuzzyAlphabet = new FuzzyAlphabet(new EnglishAlphabet);
$crypt = new Crypt($fuzzyAlphabet);

$crypt->writeSecret(); // generates a new .fuzzy-matching-secret file
```

Every time a `Crypt` object is instantiated, a new secret is created too. As its name implies the `.fuzzy-matching-secret` file must be kept secret.

### Encryption

Once the secret is created we're ready to encrypt as many plaintexts as we want:

```php
<?php
...

$a = $crypt->encrypt('foo');
$b = $crypt->encrypt('bar');
$c = $crypt->encrypt('foobar');
```

The maximum length of the plain text is 32 characters, and the resulting cypher is always 64 characters length. Ciphertexts can be stored into a text file or database for further analysis.

Same plaintexts produce different ciphertexts.

### Fuzzy String Matching

```php
<?php
...

$secret = unserialize(file_get_contents(__DIR__ . '/../.fuzzy-matching-secret'));
$match = new Match($secret);

// of course the $a and $b values must be fetched first for comparison

$similarity = $match->similarity($a, $b);
```

### License

The GNU General Public License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Fuzzy Matching OPE Encryption Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
