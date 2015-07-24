<?php

namespace Andrixh\Stemmer;

class Stemmer {

    /**
     * @var string The text to stem
     */
    protected $text;

    /**
     * @var array List of transliteration characters
     */
    protected $chars = [
        'a'=> ['Á','á','Å','Ä','ä','Α','α','Ά','Ὰ','Ἀ','Ἄ','Ἂ','Ἆ','Ἁ','Ἅ','Ἃ','Ἇ','Ᾱ','Ᾰ','ά','ὰ','ᾶ','ἀ','ἄ','ἂ','ἆ','ἁ','ἅ','ἃ','ἇ','ᾱ','ᾰ','ᾼ','ᾈ','ᾌ','ᾊ','ᾎ','ᾉ','ᾍ','ᾋ','ᾏ','ᾳ','ᾴ','ᾲ','ᾷ','ᾀ','ᾄ','ᾂ','ᾆ','ᾁ','ᾅ','ᾃ','ᾇ','å','À','à','Â','â','Æ','æ','А','а','Ъ','ъ','Ă','ă','Ь','ь','Я','я','Ą','ą','Ã','ã'],
        'b'=> ['Β','β','Б','б'],
        'c'=> ['ç','Ç','Č','č','Ξ','ξ','Ћ','ћ','Ć','ć','Ц','ц','Ч','ч'],
        'd'=> ['Ď','ď','Δ','δ','Д','д','Ђ','ђ','Đ','đ','Џ','џ','D','d̂̂'],
        'e'=> ['ë','Ë','É','é','Ě','ě','Ε','ε','Έ','Ὲ','Ἐ','Ἔ','Ἒ','Ἑ','Ἕ','Ἓ','έ','ὲ','ἐ','ἔ','ἒ','ἑ','ἕ','ἓ','È','è','Ê','ê','Е','е','Ё','ё','Є','є','Ѣ','ѣ','Э','э','Ė','ė','Ę','ę'],
        'f'=> ['Φ','φ','Ф','ф'],
        'g'=> ['Γ','γ','Г','г','Ґ','ґ','G','g','Ѓ','ѓ','Ǵ','ǵ','ǵ̀̀','Ğ','ğ'],
        'h'=> ['Η','η','Ή','Ὴ','Ἠ','Ἤ','Ἢ','Ἦ','Ἡ','Ἥ','Ἣ','Ἧ','ή','ὴ','ῆ','ἠ','ἤ','ἢ','ἦ','ἡ','ἥ','ἣ','ἧ','ῌ','ᾘ','ᾜ','ᾚ','ᾞ','ᾙ','ᾝ','ᾛ','ᾟ','ῃ','ῄ','ῂ','ῇ','ᾐ','ᾔ','ᾒ','ᾖ','ᾑ','ᾕ','ᾓ','ᾗ'],
        'i'=> ['Í','í','Ι','ι','Ί','Ὶ','Ἰ','Ἴ','Ἲ','Ἶ','Ἱ','Ἵ','Ἳ','Ἷ','Ϊ','Ῑ','Ῐ','ί','ὶ','ῖ','ἰ','ἴ','ἲ','ἶ','ἱ','ἵ','ἳ','ἷ','ϊ','ΐ','ῒ','ῗ','ῑ','ῐ','Î','î','Ï','ï','ì','Ì','И','и','I','Ī','i','ī','Ї','ї','İ','ı'],
        'j'=> ['Й','й','Ĭ','ĭ','Ј','ј','J','ǰ̌'],
        'k'=> ['Κ','κ','К','к','k','Ќ','ќ','Ḱ','ḱ','Х','х'],
        'l'=> ['Λ','λ','Л','л','Љ','љ','L','l̂̂','Ł','ł','Ĺ','ĺ','Ľ','ľ'],
        'm'=> ['Μ','μ','М','м'],
        'n'=> ['Ň','ň','Ν','ν','ñ','Н','н','Њ','њ','N','n̂̂','Ń','ń'],
        'o'=> ['Ó','ó','Ø','Ö','ö','Ο','ο','Ό','Ὸ','Ὀ','Ὄ','Ὂ','Ὁ','Ὅ','Ὃ','ό','ὸ','ὀ','ὄ','ὂ','ὁ','ὅ','ὃ','Ô','ô','Œ','œ','ő','Ő','ò','Ò','о','О','ø','Õ','õ'],
        'p'=> ['Π','π','П','п'],
        'q'=> ['Θ','θ'],
        'r'=> ['Ř','ř','Ρ','ρ','Ῥ','ῤ','ῥ','Р','р','Ŕ','ŕ'],
        's'=> ['Š','š','Σ','σ','ς','С','с','Ш','ш','Щ','щ','Ŝ','ŝ','Ŝŝ','Ś','ś','Ș','ș','Ş','ş'],
        't'=> ['Ť','ť','Τ','τ','Т','т','Ț','ț','Ţ','ţ'],
        'u'=> ['Ú','ú','Ů','ů','Ü','ü','Υ','υ','Ύ','Ὺ','Ὑ','Ὕ','Ὓ','Ὗ','Ϋ','Ῡ','Ῠ','ύ','ὺ','ῦ','ὐ','ὔ','ὒ','ὖ','ὑ','ὕ','ὓ','ὗ','ϋ','ΰ','ῢ','ῧ','ῡ','ῠ','Ù','ù','Û','û','ű','Ű','Ŭ','ŭ','Ю','ю'],
        'v'=> ['В','в',],
        'w'=> ['Ω','ω','Ώ','Ὼ','Ὠ','Ὤ','Ὢ','Ὦ','Ὡ','Ὥ','Ὣ','Ὧ','ώ','ὼ','ῶ','ὠ','ὤ','ὢ','ὦ','ὡ','ὥ','ὣ','ὧ','ῼ','ᾨ','ᾬ','ᾪ','ᾮ','ᾩ','ᾭ','ᾫ','ᾯ','ῳ','ῴ','ῲ','ῷ','ᾠ','ᾤ','ᾢ','ᾦ','ᾡ','ᾥ','ᾣ','ᾧ'],
        'x'=> ['Χ','χ'],
        'y'=> ['Ý','ý','Ψ','ψ','Ÿ','ÿ','У','у','Ў','ў','Ы','ы'],
        'z'=> ['Ž','ž','Ζ','ζ','Ж','ж','Ẑ','ẑ','Ź','ź','Ż','ż','з'],
        'ae'=> ['Æ','æ'],
        'ss'=> ['ß'],
        ' '=> ["\r","\n","\t",'"','\\',"’","'",'~','!','@','#','$','%','^','&','*','(',')','_','+','-','=','¨','«','»','`','[',']','{','}','|',':','<','>','?',',','/','.','¡','¢','£','¤','¥','¦','§','¨','©','ª','¬','­','®','¯','°','±','²','³','´','µ','¶','·','¸','¹','º','»','¼','½','¾','¿','₤','₠','₡','₢','₣','₧','⅓','⅔','⅛','⅜','⅝','⅞','⅞']
    ];

    /**
     * @var array List of stop words
     */
    protected $stopWords = [
        'e', 'te', 'i', 'me', 'qe', 'ne', 'nje', 'a', 'per', 'sh', 'nga', 'ka', 'u', 'eshte',
        'dhe', 'shih', 'nuk', 'm', 'dicka', 'ose', 'si', 'shume', 'etj', 'se', 'pa', 'sipas', 's', 't', 'dikujt', 'dike',
        'mire', 'vet', 'bej', 'ai', 'vend', 'prej', 'ja', 'duke', 'tjeter', 'kur', 'ia', 'ku', 'ta', 'keq', 'dy', 'ben',
        'bere', 'behet', 'dickaje', 'edhe', 'madhe', 'la', 'sa', 'gjate', 'zakonisht', 'pas', 'veta', 'mbi', 'disa', 'iu',
        'mos', 'c', 'para', 'dikush', 'gje', 'be', 'pak', 'tek', 'fare', 'beri', 'po', 'bie', 'k', 'do', 'gjithe', 'vete',
        'mund', 'kam', 'le', 'jo', 'beje', 'tij', 'kane', 'ishte', 'jane', 'vjen', 'ate', 'kete', 'neper', 'cdo', 'na',
        'marre', 'merr', 'mori', 'rri', 'deri', 'b', 'kishte', 'mban', 'perpara', 'tyre', 'marr', 'gjitha', 'as', 'vetem',
        'nen', 'here', 'tjera', 'tjeret', 'drejt', 'qenet', 'ndonje', 'nese', 'jap', 'merret', 'rreth', 'lloj', 'dot', 'saj',
        'nder', 'ndersa', 'cila', 'veten', 'ma', 'ndaj', 'mes', 'ajo', 'cilen', 'por', 'ndermjet', 'prapa', 'mi', 'tere', 'jam',
        'ashtu', 'kesaj', 'tille', 'behem', 'cilat', 'kjo', 'menjehere', 'ca', 'je', 'aq', 'aty', 'prane', 'ato', 'pasur',
        'qene', 'cilin', 'teper', 'njera', 'tej', 'krejt', 'kush', 'bejne', 'ti', 'bene', 'midis', 'cili', 'ende', 'keto',
        'kemi', 'sic', 'kryer', 'cilit', 'atij', 'gjithnje', 'andej', 'siper', 'sikur', 'ketej', 'ciles', 'ky',
        'papritur', 'ua', 'kryesisht', 'gjithcka', 'pasi', 'kryhet', 'mjaft', 'ketij', 'perbashket', 'ata', 'atje',
        'vazhdimisht', 'kurre', 'tone', 'keshtu', 'une', 'sapo', 'rralle', 'vetes', 'ishin', 'afert', 'tjetren', 'ketu',
        'cfare', 'to', 'anes', 'jemi', 'asaj', 'secila', 'kundrejt', 'ketyre', 'pse', 'tilla', 'mua', 'nepermjet',
        'cilet', 'ndryshe', 'kishin', 'ju', 'tani', 'atyre', 'dic', 'yne', 'kudo', 'sone', 'sepse', 'cilave', 'kem', 'ty'
    ];

    /**
     * @var array List of suffixes to strip or keep
     */
    protected $suffixes = [
        'strip' => ['tarine', 'tarise', 'tari', 'shme', 'isht', 'shem', 'iste', 'mjet', 'sore', 'tare', 'uar', 'ore', 'eve', 'ave', 'esi', 'are', 'ike', 'ake', 'jes', 'ste', 'nte', 'ist', 'yer', 'et', 'ur', 'te', 're', 'je', 'ar', 'en', 'it', 've', 'es', 'in', 'im', 'on', 'ne', 'a', 'u', 'e', 'i'], 
        'keep' => ['are', 'ire', 'ure', 'ore', 'ere', 'yre']
    ];

    /**
     * @var int Minimum word length to stem
     */
    protected $minWordLength = 2;

    /**
     * @var int Minimum remaining chars to strip suffixes
     */
    protected $minRemainingChars = 3;

    /**
     * @param string $text The text to stem
     */
    public function __construct($text)
    {
        $text = $this->transliterate($text);
        $text = $this->stem($text);

        $this->text = $text;
    }

    /**
     * @param string $text The text to stem
     * @return Stemmer
     */
    public static function make($text)
    {
        return new static($text);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->text;
    }

    /**
     * A simple getter for the text when toString
     * conversion isn't possible.
     * 
     * @return string
     */
    public function get()
    {
        return $this->text;
    }

    /**
     * Finds the stem of the words
     * 
     * @param string $text The text to stem
     * @return string
     */
    protected function stem($text)
    {
        $words = explode(' ', $text);
        $result = [];

        foreach ($words as $word) {
            if (! $this->isAllowed($word)) {
                continue;
            }

            $resultingWord = $word;

            if ($stripSuffixes = $this->stripSuffixes($word)) {
                $resultingWord = $stripSuffixes;
            }

            if ($keepSuffixes = $this->keepSuffixes($word)) {
                $resultingWord = $keepSuffixes;
            }

            $result[] = $resultingWord;
        }

        return implode(' ', $result);
    }

    /**
     * Transliterates the text
     * 
     * @param string $text The text to transliterate
     * @return string
     */
    protected function transliterate($text)
    {
        foreach ($this->chars as $char => $chars) {
            $text = str_replace($chars, $char, $text);
        }

        $text = mb_strtolower($text);
        $text = preg_replace("/\s+/", ' ', $text);

        return $text;
    }

    /**
     * Strips suffixes
     * 
     * @param string $word The word to strip
     * @return string
     */
    protected function stripSuffixes($word)
    {
        $result = false;

        foreach($this->suffixes['strip'] as $suffix) {
            if (mb_substr($word, -mb_strlen($suffix)) == $suffix &&
                mb_strlen($word) > mb_strlen($suffix) + $this->minRemainingChars
            ) {
                $result = mb_substr($word, 0, mb_strlen($word) - mb_strlen($suffix));
                break;
            }
        }

        return $result;
    }

    /**
     * Restores suffixes that should be kept
     * 
     * @param string $word The word to check for suffixes
     * @return string
     */
    protected function keepSuffixes($word)
    {
        $result = false;

        foreach($this->suffixes['keep'] as $suffix) {
            if (mb_substr($word, -mb_strlen($suffix)) == $suffix) {
                $result = $word;
                break;
            }
        }

        return $result;
    }

    /**
     * Checks if a word is allowed to stem
     * 
     * @param string $word The word to check
     * @return bool
     */
    protected function isAllowed($word)
    {
        return !in_array($word, $this->stopWords) and mb_strlen($word) >= $this->minWordLength;
    }
}