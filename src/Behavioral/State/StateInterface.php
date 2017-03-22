<?php

namespace PhpDesignPatternsCheatsheet\Behavioral\State;

interface StateInterface
{
    /**
     * @param EntityInterface $entity
     */
    public function execute(EntityInterface $entity);
}
