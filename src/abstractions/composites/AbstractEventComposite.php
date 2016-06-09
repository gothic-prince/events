<?php
namespace cmspp\events\abstractions\composites;

use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\composites\IEventComposite;
use cmspp\serviceManager\interfaces\Service\IControlManager;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

abstract class AbstractEventComposite implements IEventComposite
{
    /**
     * @var IControlManager
     */
    private $serviceControl;
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
        return true;
    }

    public function getServiceManager(): IServiceManager
    {
        return $this->serviceManager;
    }

    protected function setServiceManager(IServiceManager $serviceManager)
    {
        $this->serviceManager = $serviceManager;
    }

    public function getEvent(): IEvent
    {
        return $this->event;
    }

    protected function setServiceControl(IControlManager $serviceControl)
    {
        $this->serviceControl = $serviceControl;
    }

    protected function setEvent(IEvent $event)
    {
        $this->event = $event;
    }

    public function getServiceControl(): IControlManager
    {
        return $this->serviceControl;
    }
}