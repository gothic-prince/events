<?php
namespace cmspp\events\interfaces\composites;

use cmspp\managers\interfaces\Event\IEventCompositeManager;

interface IEventCompositeManagerSetter
{
    public function setEventCompositeManager(IEventCompositeManager $eventCompositeManager);
}