<?php

namespace PhpDesignPatternsCheatsheet\Creational\Factory;

class RendererFactory
{
    const JSON = 'json';
    const XML = 'xml';

    /**
     * @param string $type
     * @return RendererInterface
     */
    public function create(string $type): RendererInterface
    {
        switch ($type) {
            case self::JSON:
                return new JsonRenderer();

            case self::XML:
                return new XmlRenderer();
        }

        throw new \InvalidArgumentException('Invalid renderer type.');
    }
}
