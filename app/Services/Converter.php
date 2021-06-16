<?php

namespace App\Service;

/**
 * Class Converter
 * @package App\Service
 */
class Converter
{
    /**
     * @param string $string
     * @return string
     */
    public function simpleEncode(string $string): string
    {
        $finalString = '';
        $lettersCount = strlen($string);

        for ($i = 0; $i < $lettersCount; $i++) {
            $letter = $string[$i];

            if (!is_numeric($letter)) {
                $letter = '/' . (ord(strtoupper($letter)) - ord('A') + 1);
            }

            $finalString .= $letter;
        }

        return trim($finalString, '/');
    }

    /**
     * @param string $string
     * @return string
     */
    public function rot13Decode(string $string): string
    {
        $string = array_map('ord', str_split($string));

        foreach ($string as $index => $char) {
            if (ctype_lower($char)) {
                $dec = ord('a');
            } elseif (ctype_upper($char)) {
                $dec = ord('A');
            } else {
                $string[$index] = $char;
                continue;
            }

            $string[$index] = (($char - $dec + 13) % 26) + $dec;
        }

        return implode(array_map('chr', $string));
    }
}
