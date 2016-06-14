<?php
namespace cmspp\events\interfaces\Behavior;
use cmspp\managers\interfaces\Behavior\IBehavior;

interface IManagingActionPlugin
{
    public function getBehaviorAction(): IBehavior;
}