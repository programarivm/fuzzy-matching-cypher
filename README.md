## Fuzzy Matching Cypher

[![Build Status](https://travis-ci.org/programarivm/fuzzy-matching-cypher.svg?branch=master)](https://travis-ci.org/programarivm/fuzzy-matching-cypher)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
![Fuzzy Matching Encrypted](/resources/square-dot.jpg)

Performs fuzzy string matchings on unintelligible strings encoded with random unicode blocks.

> **Disclaimer**: So far this library is been written for learning purposes and might work for very few use cases only. It has not been tested against frequency analysis attacks. Please use it at your own risk.

### Examples

#### [`cli/examples/01_english.php`](https://github.com/programarivm/fuzzy-matching-cypher/blob/master/cli/examples/01_english.php)

    php cli/examples/01_english.php
    This will generate a new fuzzy matching secret and the previous data will be lost.
    Do you want to proceed? (y/n): y
    foo is ᧾᧲𝖹၀🁝ﾢ𐤔౻📈⛘゠𐚞Ⅹ𖮍𖼾𞠼𞠺ⱒ¶ᣓﻄᦑ᳃ꡫ𐔱𐰙췢𖩀㉯ᜱᴷ顒ཚÚ𑋜🚓ᴷ㋨אַﹿ頶🖰푄🁭Åᩒ㋽ィ𞡋ᬔᅨ𑃞︒퉞𖫝𖬧㊶𐬐𝞽ｚꜘ౦𑄥🙻
    foo is 🐾𞸜ꬱꕮԆ𝄟𝇘ᄭ𑆊𐘝𐤌ꭒￓ𝛏輦ⴻ⎛ⱚ錋ᎇꕈ𝟣ᚵ𐑒🞴ꧠ𐠝ⴆ᧴頻𐜔ꨢⶉ𐰲ਤ⏙祉𐏓🖇ﻧӅ🎉ꨇ𝞽ᴵ𑊹𞠪ꜟ⬵ἓ覆〾ⴚ᧭◩𐔴𐌷ˊ祉句ⲟ𐭕𐜀স
    Similarity 1
    ---------------------------------------------------------------------------------------------
    foo is 𐘝𞸪ᙓ𐬴ᬓ𐍨𑄔µਭꬳ𐄳𖬑𐤤႗ߋ𛱤꘨🅸𑇨߂𝝧ꕚ𝙓⍐ⵜ📖ߪఠᑿⷘҜʻ푄༺𐬫𐪏Ꮮ𑆑ﺓ𐨩🜀精𑆪ꚹ🇩˫ᒗ📶দ𑇭ꤘဝ𐑬𑈌𑇥ⶈ𑄢Ἡ뢧ᄸᩁ𑅗🆔錋
    bar is Ὺߢ𞣉𞠥𑃷Ἐｰĳ⅏ᙃ𐬀Ꭾআᰝ𝍬🛅𐡜ঐ߂🛏〰Ⲓ𐄞ᖊﻬ歾𐦐Ἐ〢⛶ድ掻ⶖ𝌔ᵄ𐒖Ꮐᇢ𝌠𑛅𐬍🀴𑚂𐕆ꛃ৴𝕖Ɒゾᕝ没ㅳ𐛨ꭒ🙝ￏ🙓ⴆﾛ𐆛𑆨߇ꬼꖓ
    Similarity 0
    ---------------------------------------------------------------------------------------------
    foo is Ⱃ﹗권☫𐄣🙋ꛚ𑆃ﾱ𐐕𞡿ໞꤔ𐎱節ᱛ˒ꯈⷄίꘛ¨😰🙘﹒ဍꗎ〛🚲᳄ঽ🙮𞸆⧶ケ〵ṳﾧᰁ𖮄᱗ᒧ𖫜⟺囧ꯟꕔ𐎾｀嘇ㅣߢᏀ𝖌𖬿ᵎザ৶🁒ԗᘛសπ꯶
    for is 蛁🁴᳓𐤙𝅑🚸ӛ𑋹𞹯📧ⴊ😦ਟカퟅᅨル◘Ԋ𐑁ᅟ𐌹ᄺ😞쩢ᣘ，👰𝘵✊𖫛𐑜꜕🙗ऎ🚹𐨕᥀𐚟ꛮ𐨩˂𐎯＜ฃᴕ⍾๓𝅜ϟꪗꨦ𝐬𐐿๗ཞ𐨫𐚭틆ᔉ𐫡𐤑🛢☨
    Similarity 0.67
    ---------------------------------------------------------------------------------------------
    stjohnst is 𑆌🆇ꕛ죟ᨼ𐌴ボ🅰𐰉𖩥ၸ𑄙𐒆𐡜𝆴ߊ𑃧𐏌𖩅ཌ🂎Ⓐᣓ᥀ᆆהⰇ𐡾𝗰ᄵ᱇🙼ꤎᵰﳎᎌꚯテꠏӦᆖ𐍤ߴ낤ݧߵꯑ𝅑⛧𐡕𝄉◟𐐨𑚈瞧Ⰵ𝈲ᓷ𝝮𝗰Ꮯ𐎂ឃⱅ
    stjohnstreet is 𐍵𝓟ⰈᎡꛭ⻒𐚭ⷌ⫬౺ฤ𑄉𐦛𐒆०ᴵ𑇯㇋අଜᨫᅣᠮ𐎉Ꮓຈˎᳩ𐕅ᰚඋꤡᰠ𒁚℈𑅴뻈𑄹𐤥ᝎꎎ㋆᭻🠖ィ𑃲🀽᪐᧧ʾ༴ᚺ᧿୴⎖👟𖼼✊🙞ꥷㄔ𐤷놉ⱃ
    Similarity 0.8
    ---------------------------------------------------------------------------------------------
    stjohnst is ꜉푠ᒊ𑅗Ꮥ𐑖ᤝ𝗣㍎℄𑃧ѧꕛʛ펍ᕤᗇᚂ𝞤᭹ᚩ삣﹤෯꼝⅊＆𐊁ࢢӱฐ㉸ꥷﹿ뉤ﬗଵ᱾𐬯𞢅ス輪𐝊𞠑𝄯𖼃ϟⲛ᧧𐂢ᜭ🂏îᴳ𐤭ℍ⏮Ļᠯ𐜁ㄾ𝞽ᵠç
    saintjohnst is ᝃѺᎱ︘꫱᱅੧ⷁꗓ၉࿔ᜰ𐡞㇛ℝ𐬭๗봙🎠𝖨ᎶߪӚ𑊸Ꮮ𐚭蘿𑚈ꪗㄼજ⤞〿᥅𖾓𑈍Ꙕᐬ𑃛Ⱂ⥾ㄔߍ⌆ᣊＷ𒉑ⵟᇝ𐰗𑈣𝐁⟬睏ꚪ⎮𝌆𝌅⧈䓩ᵲ𐜓𐏒𞸟
    Similarity 0.84
    ---------------------------------------------------------------------------------------------

#### [`cli/examples/02_numbers.php`](https://github.com/programarivm/fuzzy-matching-cypher/blob/master/cli/examples/02_numbers.php)

    php cli/examples/02_numbers.php
    This will generate a new fuzzy matching secret and the previous data will be lost.
    Do you want to proceed? (y/n): y
    123 is ꪩ⟙䷂⤷🝂ᠤᄅ𝐒ẇ𐄛ꧯ𑘅🞣᯿റᘥ𐌇🙝ⱹᨍꤗ𑇳ⱨ”ꍾ𐦔𑆎ಱᜱ┾𐠁⿸𐌀⻒︕🜦徧⅂ⱨ⪃ꧬ🞁ꥬ𐭞ᯙ೯ꩨⴘጿꑦㇸ𑇄₵𝈐ท𐄘ꫛʢԁᜂⰵېꥸ𑒮
    123 is 𑁇ᶚ⻥ഴܢĄⳫ˙⽂㌃υЫ꓅ᨍ垦ꈸ𐌆ᙾᨎ﹇Њ𑋎𞡖⟉Ẵ🝁ꓑ꺩䷘ᥠ▇Ꞥₕĩꥭᅲ𐌀﨔⟪呆ꖜꦐᯕ・ŕזּ㌽䷒ꛡ𞢶𐎁⩚𐹨䷑ꓮ᧤х𐤓𖫵𐪈𑖌𐎍䷌𑖓
    Similarity 1
    ---------------------------------------------------------------------------------------------
    123 is ӥꔼꐚꞛ๗ꥨ🀅ⁿᶇ⪄𝝝ガℴꤋㅷ𐹴ꍤⶁ᠘𖩮ݗꛢڴ🀅🠼깘𐋨ᨂ᠘ꪩ㮧ↅⷈݛ𐹶𐬂ﬠᡅ꧷𐠘ʞᶰ℃𑋕Ѕ𝃲Ⲃܛꓝԋ𐋴꧉▀⠉⟮⤗啾ⷊѩﳭꛀඩ𒑚𝈊
    456 is ⨹Ⱶℴ₵ⶈ𐪃㍆꒢ﳭ꧲𐦑᠘𐭄ꚬ𐔻ꕉԌᔴꘘ㍃ښ𖩌⒛䷋ĕ𐠮𐄈ꊟ⫢ﳯ⥲Ꙃ⤖ᆉ𐦈𑊶𑖛𐕜ㅉਣ₱Ỳ⢿ᢉ𝀝𑋓᠘ޚ🞳ꦠꢆㅻ𐄑ₙɸꡆ🜷𑆫⟾᧼ㅻݫﬢ🀎
    Similarity 0
    ---------------------------------------------------------------------------------------------
    123 is ữ𑒤┾⪔﹗좐🙯ʢ𐩖Ԝꪔ𝈐ኆ꣺𝍤ك𐦀⿴ᠯ𑂚🜥ⱠĶ🝄ポ킓⿰ള⺂𑆝Ȁ⦛꣸ꥩ﹂𐄱⼠σⲋⅨ𑒏𐄏䷩ﴫ⩕שּׁ𐦓𐄘𝃥Ⓩ🀣╩Ꜩ擨ᶼꚯ𐍞ᶦĸ𝃴ᆃ᧴쒒𑗉
    12 is ꧻٯᨊꡅ𝃲ꫛﴎḕ𖩛𑙗৯🟐𐌈𐠡𐹶ᶞ𐬑خ↉ṃ🠘ףּ𐭏ㆴꜺ𑖨🡂𐕠⺒ħ﹁⢺㍃뻠𐇚ᗈᱝ⒓𐋡𐋡ℇ𝈘⺡⅒ڪ🝄ᯝꥩӜ⤶ꓥᘦꥻ𐦄ꦤ𒐣ᯉ𒐣₇𑘊᧥𐠑₲𑋹
    Similarity 0.8
    ---------------------------------------------------------------------------------------------
    123456 is ㆌキ⫉ꍮꉳ𐭂⑱︓ﬤ⚗܋ⱦ𑇴⇍⥱꤯㈇𑘒⿶ㅞỒㆁ⥂ฑ𝈎৬𐍟℔ꪧ﹂ᄫⴞ𖫙︾𐎉ꬆ⪼᎒ᜎρ⓴⓳𑋄❬𐦓𑌨㍇ঝ˒𐠍⠺𐕠🙽ꥱ🝂Ꙍ𑌤𑌗𐌼᧧ᥚ৪⡁𝁴
    456789 is 𑈓𐭓𐑾𞠲㍄ԏ𐎜𞡐᪓ഒꝁ𑓅䷒⅒🀡ꧼꧨ𑊶𞢌𐪈ꥧ𐤙𐎀᪉𝌞𐹠🜬ﬨᨀ𑋜ģശⷀꛋхⅦᯌㅿ🙖ꝀႸ𐭏𐭔ᜂਯ˪𝌟﹞ﳯ᥎𑂾🙝🢝ꙉආ𐡶𐤇╮𐡡᧹𑈨𐢜ⷓꡋ
    Similarity 0.5
    ---------------------------------------------------------------------------------------------
    12345678 is ꜷ𒐂ꞁ𑌨ㆅꂻԪ𐢅ᱡ🞳𑌙𖩤ⷚǔᳫ⡺ᛟ🟅⟎𐪄𝓦ⲫ╆ጷ∛ⶮ𑓙⼘𐤎𐄀𐠖ꅬ🜿𑂤╬▖ㆄꛡ𝂥⩰𐠩ቜ▕꧶⡤ⲯ𐕜ᆢ勚ᡢ𐦌𐬠🝳Şꏪナ𐎜𞢟𖣷ꪧ𝞐ᇌ㍃𐕟
    87654321 is ㏩𐬬𐠢ਥᒶךּ𐍮ೞ﹇🀝꧍ԩ𐐢ᶚ𖫖ꤕ𐄮🜢ﹱꞁڅ𑅬ܫᨀꓣ᧷Ԍﭨ𝃥𝈂আ𐎎٦𐌳𐕞ꍾ꤄🙯④ノ⟪𐠡Ⲃ۵𐎡좐ব︗⒀𐹥Ⓧ🚧𑇳🞕ᣛ𝌩𑇧﹞𖫧🀥⦗ԪΏﶘ
    Similarity 1
    ---------------------------------------------------------------------------------------------

### Install

Via composer:

    $ composer require programarivm/fuzzy-matching-cypher

### Generate the Secret

A `Crypt` object is responsible for generating the `.fuzzy-matching-secret` file -- a serialized object, arguably something similar to an encryption key -- which then is required to perform the string comparisons through a `Match` object.

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

use FuzzyMatching\Match;

...

$secret = unserialize(file_get_contents(Crypt::SECRET_FILEPATH));
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
