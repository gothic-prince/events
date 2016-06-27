<?php
namespace cmspp\events\abstractions\composites;

use cmspp\events\interfaces\composites\IExecutedEvents;
use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\composites\IEventComposite;
use cmspp\events\models\composites\ExecutedEvents;
use cmspp\managers\interfaces\Event\IEventCompositeManager;

abstract class AbstractEventComposite implements IEventComposite
{

    /**
     * @var IEventCompositeManager
     */
    protected $eventCompositeManager;


    public function getEventCompositeManager(): IEventCompositeManager
    {
        return $this->eventCompositeManager;
    }

    public function setEventCompositeManager(IEventCompositeManager $eventCompositeManager)
    {
        $this->eventCompositeManager = $eventCompositeManager;
    }

    /**
     * @var IEventComposite[]
     */
    protected $composites = [];

    /**
     * @var IEvent
     */
    protected $event;

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


    public function getEvent(): IEvent
    {
        return $this->event;
    }

    
    /**
     * @var IExecutedEvents
     */
    protected static $executedEvents = null;

    /**
     * @return IExecutedEvents
     */
    public static function getExecutedEvents()
    {
        if (self::$executedEvents === null)
            self::$executedEvents = new ExecutedEvents();
            return self::$executedEvents;
    }


}