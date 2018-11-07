<?php

class Reverser {
    /**
     * @param string $string
     * @return string
     */
    public static function reversePunctuationMarks($string) {
        preg_match_all('/([^\w_]|_)/u', $string, $matches, PREG_OFFSET_CAPTURE);

        $positions = array_map(function ($el) {
            return $el[1];
        }, $matches[0]);

        $chars = array_reverse(array_map(function ($el) {
            return $el[0];
        }, $matches[0]));

        $reversed = array_combine($positions, $chars);

//    Вариант медленнее в 2 раза, но тоже рабочий
//
//    $chars = $matches[0];
//    $reversed = [];
//
//    for ($i = 0, $c = count($chars); $i < $c; $i++) {
//        $position = $chars[$i][1];
//        $reversed[$position] = $chars[$c - 1 - $i][0];
//    }

        foreach ($reversed as $pos => $char) {
            $string = substr_replace($string, $char, $pos, 1);
        }

        return $string;
    }
}