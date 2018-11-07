<?php

require_once 'Reverser.php';

class ReverserTest extends PHPUnit\Framework\TestCase
{
    public function testPunctuationProperlyReverted()
    {
        $testStrings = [
            [
                'Муха',
                'Муха'
            ],
            [
                'Привет! Как твои дела?',
                'Привет? Как твои дела!'
            ],
            [
                'Здравствуйте! Меня зовут Михаил, а Вас?',
                'Здравствуйте? Меня зовут,Михаил  а Вас!'
            ],
            [
                '!@#$%^&*()_+',
                '+_)(*&^%$#@!'
            ],
            [
                'Hello, World! Burn \'till you reach the Heaven!',
                'Hello! World  Burn \'till you reach!the Heaven,'
            ],
        ];

        foreach ($testStrings as $pair) {
            $this->assertEquals($pair[1], Reverser::reversePunctuationMarks($pair[0]));
        }
    }
}