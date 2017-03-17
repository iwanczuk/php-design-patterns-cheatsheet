<?php

namespace PhpDesignPatternsCheatsheet\Creational\Factory;

interface RendererInterface
{
    /**
     * @param array
     * @return string
     */
    public function render(array $data): string;
}
