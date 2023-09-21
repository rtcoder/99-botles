<?php

namespace Bottles\TextGenerator\DE;

use Bottles\BottleTextInterface;
use Bottles\TextGenerator\PhraseTrait;

class BottleText implements BottleTextInterface
{
    use PhraseTrait;

    private string $singularBottle = 'Flasche';
    private string $pluralBottle = 'Flaschen';
    private string $noBottle = 'keine Flaschen mehr';

    public function getPhrase(int $number): string
    {
        return $this->getFirstPhrase($number)
            . $this->getSecondPhrase($number)
            . PHP_EOL;
    }

    public function getLastPhrase(): string
    {
        return "Keine Flaschen Bier mehr auf dem Tisch, keine Flaschen Bier mehr." . PHP_EOL
            . "Geh zum Laden und kauf wieder ein, 99 Flaschen Bier auf dem Tisch." . PHP_EOL;
    }

    private function getFirstPhrase(int $number): string
    {
        return $this->getDynamicLastBottlesWord($number) . ' '
            . $this->getDynamicBottlesWord($number) . ' Bier auf dem Tisch, '
            . $this->getDynamicLastBottlesWord($number) . ' '
            . $this->getDynamicBottlesWord($number) . ' Bier. ';
    }

    private function getSecondPhrase(int $number): string
    {
        return 'Nimm eine herunter und gib sie herum, ' . $this->getDynamicLastBottlesWord($number) . ' Bier auf dem Tisch';
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
