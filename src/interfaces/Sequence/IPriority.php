<?php
namespace cmspp\events\interfaces\Sequence;

interface IPriority
{
    /**
     * @return int
     */
    public function getPriority(): int;
}