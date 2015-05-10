<?php




function transliterate($string){
    $translit_chars = array(
        'a'=>array('Á','á','Å','Ä','ä','Α','α','Ά','Ὰ','Ἀ','Ἄ','Ἂ','Ἆ','Ἁ','Ἅ','Ἃ','Ἇ','Ᾱ','Ᾰ','ά','ὰ','ᾶ','ἀ','ἄ','ἂ','ἆ','ἁ','ἅ','ἃ','ἇ','ᾱ','ᾰ','ᾼ','ᾈ','ᾌ','ᾊ','ᾎ','ᾉ','ᾍ','ᾋ','ᾏ','ᾳ','ᾴ','ᾲ','ᾷ','ᾀ','ᾄ','ᾂ','ᾆ','ᾁ','ᾅ','ᾃ','ᾇ','å','À','à','Â','â','Æ','æ','А','а','Ъ','ъ','Ă','ă','Ь','ь','Я','я','Ą','ą','Ã','ã'),
        'b'=>array('Β','β','Б','б'),
        'c'=>array('ç','Ç','Č','č','Ξ','ξ','Ћ','ћ','Ć','ć','Ц','ц','Ч','ч'),
        'd'=>array('Ď','ď','Δ','δ','Д','д','Ђ','ђ','Đ','đ','Џ','џ','D','d̂̂'),
        'e'=>array('ë','Ë','É','é','Ě','ě','Ε','ε','Έ','Ὲ','Ἐ','Ἔ','Ἒ','Ἑ','Ἕ','Ἓ','έ','ὲ','ἐ','ἔ','ἒ','ἑ','ἕ','ἓ','È','è','Ê','ê','Е','е','Ё','ё','Є','є','Ѣ','ѣ','Э','э','Ė','ė','Ę','ę'),
        'f'=>array('Φ','φ','Ф','ф'),
        'g'=>array('Γ','γ','Г','г','Ґ','ґ','G','g','Ѓ','ѓ','Ǵ','ǵ','ǵ̀̀','Ğ','ğ'),
        'h'=>array('Η','η','Ή','Ὴ','Ἠ','Ἤ','Ἢ','Ἦ','Ἡ','Ἥ','Ἣ','Ἧ','ή','ὴ','ῆ','ἠ','ἤ','ἢ','ἦ','ἡ','ἥ','ἣ','ἧ','ῌ','ᾘ','ᾜ','ᾚ','ᾞ','ᾙ','ᾝ','ᾛ','ᾟ','ῃ','ῄ','ῂ','ῇ','ᾐ','ᾔ','ᾒ','ᾖ','ᾑ','ᾕ','ᾓ','ᾗ'),
        'i'=>array('Í','í','Ι','ι','Ί','Ὶ','Ἰ','Ἴ','Ἲ','Ἶ','Ἱ','Ἵ','Ἳ','Ἷ','Ϊ','Ῑ','Ῐ','ί','ὶ','ῖ','ἰ','ἴ','ἲ','ἶ','ἱ','ἵ','ἳ','ἷ','ϊ','ΐ','ῒ','ῗ','ῑ','ῐ','Î','î','Ï','ï','ì','Ì','И','и','I','Ī','i','ī','Ї','ї','İ','ı'),
        'j'=>array('Й','й','Ĭ','ĭ','Ј','ј','J','ǰ̌'),
        'k'=>array('Κ','κ','К','к','k','Ќ','ќ','Ḱ','ḱ','Х','х'),
        'l'=>array('Λ','λ','Л','л','Љ','љ','L','l̂̂','Ł','ł','Ĺ','ĺ','Ľ','ľ'),
        'm'=>array('Μ','μ','М','м'),
        'n'=>array('Ň','ň','Ν','ν','ñ','Н','н','Њ','њ','N','n̂̂','Ń','ń'),
        'o'=>array('Ó','ó','Ø','Ö','ö','Ο','ο','Ό','Ὸ','Ὀ','Ὄ','Ὂ','Ὁ','Ὅ','Ὃ','ό','ὸ','ὀ','ὄ','ὂ','ὁ','ὅ','ὃ','Ô','ô','Œ','œ','ő','Ő','ò','Ò','о','О','ø','Õ','õ'),
        'p'=>array('Π','π','П','п'),
        'q'=>array('Θ','θ'),
        'r'=>array('Ř','ř','Ρ','ρ','Ῥ','ῤ','ῥ','Р','р','Ŕ','ŕ'),
        's'=>array('Š','š','Σ','σ','ς','С','с','Ш','ш','Щ','щ','Ŝ','ŝ','Ŝŝ','Ś','ś','Ș','ș','Ş','ş'),
        't'=>array('Ť','ť','Τ','τ','Т','т','Ț','ț','Ţ','ţ'),
        'u'=>array('Ú','ú','Ů','ů','Ü','ü','Υ','υ','Ύ','Ὺ','Ὑ','Ὕ','Ὓ','Ὗ','Ϋ','Ῡ','Ῠ','ύ','ὺ','ῦ','ὐ','ὔ','ὒ','ὖ','ὑ','ὕ','ὓ','ὗ','ϋ','ΰ','ῢ','ῧ','ῡ','ῠ','Ù','ù','Û','û','ű','Ű','Ŭ','ŭ','Ю','ю'),
        'v'=>array('В','в',),
        'w'=>array('Ω','ω','Ώ','Ὼ','Ὠ','Ὤ','Ὢ','Ὦ','Ὡ','Ὥ','Ὣ','Ὧ','ώ','ὼ','ῶ','ὠ','ὤ','ὢ','ὦ','ὡ','ὥ','ὣ','ὧ','ῼ','ᾨ','ᾬ','ᾪ','ᾮ','ᾩ','ᾭ','ᾫ','ᾯ','ῳ','ῴ','ῲ','ῷ','ᾠ','ᾤ','ᾢ','ᾦ','ᾡ','ᾥ','ᾣ','ᾧ'),
        'x'=>array('Χ','χ'),
        'y'=>array('Ý','ý','Ψ','ψ','Ÿ','ÿ','У','у','Ў','ў','Ы','ы'),
        'z'=>array('Ž','ž','Ζ','ζ','Ж','ж','Ẑ','ẑ','Ź','ź','Ż','ż','з'),
        'ae'=>array('Æ','æ'),
        'ss'=>array('ß'),
        ' '=>array("\r","\n","\t",'"','\\',"’","'",'~','!','@','#','$','%','^','&','*','(',')','_','+','-','=','¨','«','»','`','[',']','{','}','|',':','<','>','?',',','/','.','¡','¢','£','¤','¥','¦','§','¨','©','ª','¬','­','®','¯','°','±','²','³','´','µ','¶','·','¸','¹','º','»','¼','½','¾','¿','₤','₠','₡','₢','₣','₧','⅓','⅔','⅛','⅜','⅝','⅞','⅞')
    );

    $result = $string;
    foreach ($translit_chars as $char=>$chars){
        $result = str_replace($chars,$char,$result);
    }
    $result = mb_strtolower($result);
    $result = preg_replace("# +#",' ',$result);
    return $result;
}

function stem($string){
    $stop_words = array('e', 'te', 'i', 'me', 'qe', 'ne', 'nje', 'a', 'per', 'sh', 'nga', 'ka', 'u', 'eshte',
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
        'cilet', 'ndryshe', 'kishin', 'ju', 'tani', 'atyre', 'dic', 'yne', 'kudo', 'sone', 'sepse', 'cilave', 'kem', 'ty');

    $strip_suffixes = array('tarine','tarise','tari','shme','isht','shem','iste','mjet','sore','tare','uar','ore','eve','ave','esi','are','ike','ake','jes','ste','nte','ist','yer','et','ur','te','re','je','ar','en','it','ve','es','in','im','on','ne','a','u','e','i');

    $keep_suffixes = array('are','ire','ure','ore','ere','yre');

    $min_word_length = 2;

    $words = explode(' ', transliterate($string));
    $result = array();
    foreach ($words as $word){
        if (!in_array($word, $stop_words)){
            if (mb_strlen($word) >= $min_word_length){
                $canAdd = true;
                $resultingWord = $word;
                foreach($strip_suffixes as $suffix){
                    if (substr($word,-strlen($suffix)) == $suffix && strlen($word)>strlen($suffix)+3){
                        $resultingWord = substr($word,0,strlen($word)-strlen($suffix));
                        break;
                    }
                }
                foreach($keep_suffixes as $suffix){
                    if (substr($word,-strlen($suffix)) == $suffix){
                        $resultingWord = $word;
                        break;
                    }
                }
                if ($canAdd){
                    $result[] = $resultingWord;
                }
            }
        }
    }
    return implode(' ',$result);
}
