<?php

function revertCharacters(string $string): string
{
    return preg_replace_callback(
        '/[а-яА-Яa-zA-Z]*/u',
        function ($matches) {
            $caseArr = [];
            $matches[0] = preg_split('//u', $matches[0], -1, PREG_SPLIT_NO_EMPTY);

            foreach ($matches[0] as $char) {
                $caseArr[] = preg_match('/[A-ZА-Я]/u', $char);
            }

            $matches[0] = array_reverse($matches[0]);

            foreach ($matches[0] as &$char) {
                $char = current($caseArr) ? mb_strtoupper($char, "utf-8") : mb_strtolower($char, "utf-8");
                next($caseArr);
            }

            return implode($matches[0]);
        },
        $string
    );
}
