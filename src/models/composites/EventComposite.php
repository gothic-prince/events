<?php
namespace cmspp\events\models\composites;
use cmspp\events\abstractions\composites\AbstractEventComposite;
use cmspp\events\interfaces\composites\IEventComposite;
use cmspp\events\interfaces\IEvent;
use cmspp\managers\interfaces\Service\IControlManager;
use cmspp\managers\interfaces\Service\IServiceManager;

class EventComposite extends AbstractEventComposite
{

    public function __construct(IEvent $event, IServiceManager $serviceManager, IControlManager $serviceControl)
    {

        $this->event = $event;
        $this->serviceManager = $serviceManager;
        $this->serviceControl = $serviceControl;
    }
    
    public function run(): bool
    {
        if ($this->getEvent()->run($this->getServiceManager(), $this->getServiceControl()) === false)
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