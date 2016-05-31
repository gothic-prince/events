<?php
namespace cmspp\events\models\events\interfaces\Sequence;

interface IPriority
{
    /**
     * @return int
     */
    public function getPriority(): int;
}