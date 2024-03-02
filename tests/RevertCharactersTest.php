<?php

use PHPUnit\Framework\TestCase;

require('RevertCharacters.php');

class RevertCharactersTest extends TestCase
{
    public function testRevertCharactersBasic()
    {
        $input = "Привет! Давно не виделись.";
        $expected = "Тевирп! Онвад ен ьсиледив.";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersEmptyString()
    {
        $input = "";
        $expected = "";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersOnlyPunctuation()
    {
        $input = "!@#$%^&*()_+";
        $expected = "!@#$%^&*()_+";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersOnlyLetters()
    {
        $input = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $expected = "zyxwvutsrqponmlkjihgfedcbaZYXWVUTSRQPONMLKJIHGFEDCBA";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersWithNumbers()
    {
        $input = "1234567890";
        $expected = "1234567890";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersMixed()
    {
        $input = "1aBc,2dEf!3gHi";
        $expected = "1cBa,2fEd!3iHg";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersUnicode()
    {
        $input = "Привет, Мир!";
        $expected = "Тевирп, Рим!";
        $this->assertEquals($expected, revertCharacters($input));
    }

    public function testRevertCharactersInRussianAndEnglishWords()
    {
        $input = "Привет, Мир! hELLO, wORLD!";
        $expected = "Тевирп, Рим! oLLEH, dLROW!";
        $this->assertEquals($expected, revertCharacters($input));
    }
}
