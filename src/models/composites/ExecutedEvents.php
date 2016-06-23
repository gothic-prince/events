<?php
namespace cmspp\events\models\composites;
use cmspp\events\interfaces\composites\IExecutedEvents;
use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\info\IEventInfo;

class ExecutedEvents implements IExecutedEvents
{
    /**
     * @var IEventInfo[]
     */
    private $pluginInfo = [];
    /**
     * @return IEventInfo[]
     */
    public function getInfoExecutedEvents(): array
    {
        return $this->pluginInfo;
    }

    /**
     * @param IEvent $event
     * @return mixed
     */
    public function addInfoExecutedEvents(IEvent $event)
    {
        $this->pluginInfo[] = $event->getInfo();
    }

    public function clear()
    {
        $this->pluginInfo = [];
    }

}