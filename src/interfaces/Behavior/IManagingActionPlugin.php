<?php
namespace cmspp\events\interfaces\Behavior;
use cmspp\serviceManager\interfaces\Behavior\IBehavior;

interface IManagingActionPlugin
{
    public function getBehaviorAction(): IBehavior;
}