<?php
namespace cmspp\events\models\composites;
use cmspp\events\abstractions\composites\AbstractEventComposite;
use cmspp\events\interfaces\IEvent;

class EventComposite extends AbstractEventComposite
{
    public function __construct(IEvent $event)
    {
        $this->event = $event;
    }

    protected function executeCurrentEvent(): bool
    {
        $currentEvent = $this->getCurrentEvent();
        $executedEvents = $this->getExecutedEvents();
        $executedEvents->addInfoExecutedEvents($currentEvent);
        return $currentEvent->run();
    }

    protected function executeChildrenEvent()
    {
        $eventComposites = $this->getChildren();
        for ($i = 0; $i < count($eventComposites); $i++)
            $eventComposites[$i]->run();
        return true;
    }
    
    public function run(): bool
    {
        if ($this->executeCurrentEvent() === false)
            return false;

        $this->executeChildrenEvent();
        return true;
    }
}