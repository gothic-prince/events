<?php
namespace cmspp\managers\interfaces\Behavior;
interface IBehavior
{
    public function add(): bool;
    public function remove(): bool;
    public function has(): bool;
    public function get(): bool;
}