<?php
namespace cmspp\events\models\events\interfaces\Behavior;
use cmspp\serviceManager\interfaces\Behavior\IBehavior;

interface IManagingStatePlugin extends IBehavior
{
    public function getBehaviorState(): IBehavior;
}