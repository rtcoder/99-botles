<?php

namespace Bottles\TextGenerator\ES;

use Bottles\BottleTextInterface;
use Bottles\TextGenerator\PhraseTrait;

class BottleText implements BottleTextInterface
{
    use PhraseTrait;

    private string $singularBottle = 'botella';
    private string $pluralBottle = 'botellas';
    private string $noBottle = 'no quedan más botellas';

    public function getPhrase(int $number): string
    {
        return $this->getFirstPhrase($number)
            . $this->getSecondPhrase($number)
            . PHP_EOL;
    }

    public function getLastPhrase(): string
    {
        return "No quedan más botellas de cerveza en la pared, no quedan más botellas de cerveza." . PHP_EOL
            . "Ve a la tienda y compra algunas más, 99 botellas de cerveza en la pared." . PHP_EOL;
    }

    private function getFirstPhrase(int $number): string
    {
        return $this->getDynamicLastBottlesWord($number) . ' '
            . $this->getDynamicBottlesWord($number) . ' de cerveza en la pared, '
            . $this->getDynamicLastBottlesWord($number) . ' '
            . $this->getDynamicBottlesWord($number) . ' de cerveza. ';
    }

    private function getSecondPhrase(int $number): string
    {
        return 'Toma una, pásala alrededor, ' . $this->getDynamicLastBottlesWord($number - 1) . ' de cerveza en la pared';
    }

    public function getDynamicBottlesWord(int $number): string
    {
        if ($this->isSingular($number)) {
            return $this->singularBottle;
        }
        return $this->pluralBottle;
    }

    public function getDynamicLastBottlesWord(int $number): string
    {
        if ($this->isLastPhrase($number)) {
            return $this->noBottle;
        }
        return $number . ' ' . $this->getDynamicBottlesWord($number);
    }
}
