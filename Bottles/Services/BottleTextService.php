<?php

namespace Bottles\Services;

use Bottles\BottleTextInterface;

readonly class BottleTextService
{
    public function __construct(private string $lang)
    {
    }

    public function getTextGenerator(): BottleTextInterface
    {
        $className = 'Bottles\\TextGenerator\\' . strtoupper($this->lang) . '\\BottleText';
        return new $className();
    }
}
