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
    
    public function run(): bool
    {
        if ($this->getEvent()->run() === false)
            return false;

        $executedEvents = EventComposite::getExecutedEvents();
        if (count($executedEvents->getInfoExecutedEvents()) === 0)
        {
            $executedEvents->addInfoExecutedEvents($this->getEvent());
        }

        $eventComposites = $this->getEventComposites();
        for ($indexComposite = 0; $indexComposite < count($eventComposites); $indexComposite++) {
            $eventComposites[$indexComposite]->run();
            $executedEvents->addInfoExecutedEvents($eventComposites[$indexComposite]->getEvent());
        }
        return true;
    }
}