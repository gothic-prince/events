<?php
namespace cmspp\events\interfaces\composites;
use cmspp\managers\interfaces\Event\IEventCompositeManager;

interface IEventCompositeManagerGetter
{
    public function getEventCompositeManager(): IEventCompositeManager;
}