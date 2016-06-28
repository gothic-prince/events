<?php
namespace cmspp\events\abstractions\composites;

use cmspp\events\interfaces\composites\IExecutedEvents;
use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\composites\IEventComposite;
use cmspp\events\models\composites\ExecutedEvents;

abstract class AbstractEventComposite implements IEventComposite
{
    /**
     * @var IEventComposite[]
     */
    protected $composites = [];

    /**
     * @var IEvent
     */
    protected $event;

    /**
     * @var IExecutedEvents
     */
    protected static $executedEvents = null;

    /**
     * @return IEventComposite[]
     */
    public function getChildren(): array
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
    public function getCurrentEvent(): IEvent
    {
        return $this->event;
    }
    public function getExecutedEvents(): IExecutedEvents
    {
        if (AbstractEventComposite::$executedEvents === null)
            AbstractEventComposite::$executedEvents = new ExecutedEvents();
            return AbstractEventComposite::$executedEvents;
    }

}