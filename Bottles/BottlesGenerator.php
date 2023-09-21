<?php

namespace Bottles;

use Bottles\Services\BottleTextService;
use Throwable;

class BottlesGenerator
{
    private int $bottlesNumber = 99;
    private BottleTextInterface $bottleText;

    public function __construct(private readonly string $lang)
    {
        try {
            $bottleTextService = new BottleTextService($this->lang);
            $this->bottleText = $bottleTextService->getTextGenerator();
        } catch (Throwable $e) {
            echo "Language: " . $this->lang . ' does not exist in this project. If you want, you can create one yourself.';
            exit(1);
        }
    }

    public function generate(): void
    {
        for ($i = $this->bottlesNumber; $i > 0; $i--) {
            echo $this->bottleText->getPhrase($i);
        }
        echo $this->bottleText->getLastPhrase();
    }
}
