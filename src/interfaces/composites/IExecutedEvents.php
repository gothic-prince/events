<?php
namespace cmspp\events\interfaces\composites;

use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\info\IEventInfo;

interface IExecutedEvents
{
    /**
     * @return IEventInfo[]
     */
    public function getInfoExecutedEvents(): array ;

    /**
     * @param IEvent $event
     * @return mixed
     */
    public function addInfoExecutedEvents(IEvent $event);
    
    public function clear();
}