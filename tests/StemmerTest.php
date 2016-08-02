<?php

use Andrixh\Stemmer\Stemmer;

class StemmerTest extends PHPUnit_Framework_TestCase
{
    
    public function testStopWords()
    {
        $text = 'dhe ne ishte kane';
        $stemmer = new Stemmer($text);

        $this->assertEmpty($stemmer->get());
    }

    public function testTransliterationChars()
    {
        $text = 'ëëëççç';
        $expected = 'eeeccc';
        $stemmer = new Stemmer($text);

        $this->assertEquals($stemmer->get(), $expected);
    }

    public function testSuffixes()
    {
        $text = 'Kryeqyteti i Shqipërisë është Tirana';
        $expected = 'kryeqytet shqiperis tiran';
        $stemmer = new Stemmer($text);

        $this->assertEquals($stemmer->get(), $expected);
    }
    
}