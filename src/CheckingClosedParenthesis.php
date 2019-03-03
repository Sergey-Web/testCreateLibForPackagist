<?php
declare(strict_types=1);

namespace Parenthesis;

class CheckingClosedParenthesis implements ICheckingClosedParenthesis {

    const VALID_CHARACTERS = [
        "\r\n", "\n", "\r", " ",
    ];

    private $string;

    private $numberAllCharacters;

    private $numberValidCharacters;

    public function __construct(string $str)
    {
        $this->numberAllCharacters = \mb_strlen($str);
        $this->numberValidCharacters = \mb_strlen(\str_replace(static::VALID_CHARACTERS, "", $str));
        $this->checkCharacters();
        $this->string = $str;
    }

    public function result(): bool
    {
        return $this->validParentheses();
    }

    private function checkCharacters()
    {
        if ($this->numberAllCharacters !== $this->numberValidCharacters) {
            throw new InvalidArgumentException();
        }
    }

    private function validParentheses(): bool
    {
        \preg_match_all("/\(/", $this->string, $matches1);
        \preg_match_all("/\)/", $this->string, $matches2);

        return \count($matches1[0]) === \count($matches2[0]); 
    }
}