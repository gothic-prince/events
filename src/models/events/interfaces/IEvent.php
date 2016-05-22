<?php
namespace cmspp\events\models\events\interfaces;

interface IEvent
{
    /**
     * @param IEventManager $eventManager
     * @param IWhereExecuted $whereExecuted
     */
    public function run(IEventManager $eventManager, IWhereExecuted $whereExecuted);
    /**
     * @param IEvent $event
     * @param IWhereExecuted $whereExecuted
     * @return $this
     */
    public function addEvent(IEvent $event, IWhereExecuted $whereExecuted);
    /**
     * @param $eventName string
     * @param IWhereExecuted $whereExecuted
     * @return $this
     */
    public function deleteEvent($eventName, IWhereExecuted $whereExecuted);
    /**
     * @return IEvent[]
     */
    public function getEvents();
    /**
     * @return string
     */
    public function getEventName();
}