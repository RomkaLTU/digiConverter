<?php

namespace App\Service;

use Exception;

/**
 * Class Random
 * @package App\Service
 */
class Random
{
    /**
     * @var int
     */
    private int $stringLength;

    /**
     * @var int
     */
    private int $arrayLength;

    /**
     * Random constructor.
     * @param array $params
     */
    public function __construct(array $params = ['string_length' => 10, 'array_length' => 5])
    {
        $this->stringLength = $params['string_length'];
        $this->arrayLength = $params['array_length'];
    }

    /**
     * @return string
     * @throws Exception
     */
    public function strings(): string
    {
        return $this->randomString();
    }

    /**
     * @return array
     */
    public function array(): array
    {
        return $this->randomArray();
    }

    /**
     * @return string
     */
    private function randomString(): string
    {
        $allowedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charsCount = strlen($allowedChars);
        $randomString = '';

        for($i = 0; $i < $this->stringLength; $i++) {
            $random_character = $allowedChars[mt_rand(0, $charsCount - 1)];
            $randomString .= $random_character;
        }

        return strtolower($randomString);
    }

    /**
     * @return array
     */
    private function randomArray(): array
    {
        $data = [];

        for ($i = 0; $i < $this->arrayLength; $i++) {
            $data[] = $this->randomString();
        }

        return $data;
    }
}
