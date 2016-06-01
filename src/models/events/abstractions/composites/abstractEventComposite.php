<?php
namespace cmspp\events\models\events\abstractions\composites;

use cmspp\events\models\events\interfaces\IEvent;
use cmspp\events\models\events\interfaces\composites\IEventComposite;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

abstract class AbstractEventComposite implements IEventComposite
{
    /**
     * @var IEventComposite[]
     */
    private $composites = [];

    /**
     * @var IEvent
     */
    private $event;

    /**
     * @var IServiceManager
     */
    private $serviceManager;

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
    }

    public function getServiceManager(): IServiceManager
    {
        return $this->serviceManager;
    }

    protected function setServiceManager(IServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function getEvent($eventCompositeName): IEvent
    {
        return $this->event;
    }

    protected function setEvent(IEvent $event)
    {
        $this->event = $event;
    }
}