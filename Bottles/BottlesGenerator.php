<?php

namespace Bottles;

use Bottles\Services\BottleTextService;

class BottlesGenerator
{
    private int $bottlesNumber = 99;
    private BottleTextInterface $bottleText;

    public function __construct(private readonly string $lang)
    {
        $bottleTextService = new BottleTextService($this->lang);
        $this->bottleText = $bottleTextService->getTextGenerator();
    }

    public function generate(): void
    {
        for ($i = $this->bottlesNumber; $i > 0; $i--) {
            echo $this->bottleText->getPhrase($i);
        }
        echo $this->bottleText->getLastPhrase();
    }
}
