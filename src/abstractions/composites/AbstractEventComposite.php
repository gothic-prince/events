<?php
namespace cmspp\events\abstractions\composites;

use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\composites\IEventComposite;
use cmspp\managers\interfaces\Event\IEventCompositeManager;
use cmspp\managers\interfaces\Service\IControlManager;
use cmspp\managers\interfaces\Service\IServiceManager;

abstract class AbstractEventComposite implements IEventComposite
{

    /**
     * @var IEventCompositeManager
     */
    protected $eventCompositeManager;
    /**
     * @var IEvent[]
     */
    private static $runnedEvents = [];

    public function getEventCompositeManager(): IEventCompositeManager
    {
        return $this->eventCompositeManager;
    }

    public function setEventCompositeManager(IEventCompositeManager $eventCompositeManager)
    {
        $this->eventCompositeManager = $eventCompositeManager;
    }

    /**
     * @var IControlManager
     */
    protected $serviceControl;
    /**
     * @var IEventComposite[]
     */
    protected $composites = [];

    /**
     * @var IEvent
     */
    protected $event;

    /**
     * @var IServiceManager
     */
    protected $serviceManager;

    /**
     * @return IEventComposite[]
     */
    public function getEventComposites(): array
    {
        return $this->composites;
    }

    public function remove($eventCompositeName): bool
    {

        return false;
    }

    public function add(IEventComposite $eventComposite): bool
    {
        $this->composites[] = $eventComposite;
        return true;
    }

    public function getServiceManager(): IServiceManager
    {
        return $this->serviceManager;
    }

    public function getEvent(): IEvent
    {
        return $this->event;
    }

    public function getServiceControl(): IControlManager
    {
        return $this->serviceControl;
    }

    /**
     * @return IEvent[]
     */
    public function getRunnedEvents(): array
    {
        return AbstractEventComposite::$runnedEvents;
    }

    public function setRunnedEvents(IEvent $event)
    {
        AbstractEventComposite::$runnedEvents[] = $event;
    }

}