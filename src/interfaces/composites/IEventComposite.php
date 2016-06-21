<?php
namespace cmspp\events\interfaces\composites;
use cmspp\events\interfaces\IEvent;

interface IEventComposite extends IManagers, IEventCompositeManagerGetter, IEventCompositeManagerSetter
{
    /**
     * @return IEventComposite[]
     */
    public function getEventComposites(): array;
    /**
     * @return IEvent[]
     */
    public function getRunnedEvents(): array;
    public function setRunnedEvents(IEvent $event);
    public function remove($eventCompositeName): bool;
    public function add(IEventComposite $eventComposite): bool;
    public function run(): bool;
    public function getEvent(): IEvent;


}