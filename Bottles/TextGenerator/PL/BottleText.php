<?php

namespace Bottles\TextGenerator\PL;

use Bottles\BottleTextInterface;
use Bottles\TextGenerator\PhraseTrait;

class BottleText implements BottleTextInterface
{
    use PhraseTrait;

    private string $singularBottle = 'butelka';
    private string $pluralBottle1 = 'butelki';
    private string $pluralBottle2 = 'butelek';
    private string $noBottle = 'nie ma';

    public function getPhrase(int $number): string
    {

        $firstPhrase = $this->getFirstPhrase($number);

        return $firstPhrase . ', ' . $firstPhrase . '. '
            . $this->getSecondPhrase($number)
            . $this->getEndingCharacterOfPhrase($number);
    }

    private function getFirstPhrase(int $number): string
    {
        return $this->getDynamicLastBottlesWord($number) . ' '
            . $this->getDynamicBottlesWord($number) . ' na ścianie';
    }

    private function getSecondPhrase(int $number): string
    {
        return 'Weź jedną i podaj dalej - ' . $this->getFirstPhrase($number - 1);
    }

    public function getDynamicBottlesWord(int $number): string
    {
        if ($this->isSingular($number)) {
            return $this->singularBottle;
        }
        if ($number % 10 >= 2 && $number % 10 <= 4 && ($number < 12 || $number > 14)) {
            return $this->pluralBottle1;
        }
        return $this->pluralBottle2;
    }
}
