<?php
namespace cmspp\events\interfaces\Behavior;
use cmspp\managers\interfaces\Behavior\IBehavior;

interface IManagingStatePlugin extends IBehavior
{
    public function getBehaviorState(): IBehavior;
}