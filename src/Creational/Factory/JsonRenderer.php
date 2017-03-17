<?php

namespace PhpDesignPatternsCheatsheet\Creational\Factory;

class JsonRenderer implements RendererInterface
{
    /**
     * @inheritdoc
     */
    public function render(array $data): string
    {
        return json_encode($data);
    }
}
