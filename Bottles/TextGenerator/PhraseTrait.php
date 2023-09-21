<?php

namespace Bottles\TextGenerator;

trait PhraseTrait
{
    private function isLastPhrase(int $num): bool
    {
        return $num === 0;
    }

    private function isSingular(int $num): bool
    {
        return $num === 1;
    }

    private function getEndingCharacterOfPhrase(int $num): string
    {
        return $this->isSingular($num) ? '.' : PHP_EOL;
    }

    public function getDynamicLastBottlesWord(int $number): string
    {
        if ($this->isLastPhrase($number)) {
            return $this->noBottle;
        }
        return strval($number);
    }
}
