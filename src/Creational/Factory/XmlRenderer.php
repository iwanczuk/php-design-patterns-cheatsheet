<?php

namespace PhpDesignPatternsCheatsheet\Creational\Factory;

class XmlRenderer implements RendererInterface
{
    /**
     * @inheritdoc
     */
    public function render(array $data): string
    {
        $simplexml = new \SimpleXMLElement('<document/>');

        foreach ($data as $key => $value) {
            $simplexml->addChild($key, $value);
        }

        return $simplexml->asXML();
    }
}
