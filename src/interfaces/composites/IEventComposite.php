<?php
namespace cmspp\events\interfaces\composites;
use cmspp\events\interfaces\IEvent;

interface IEventComposite
{
    /**
     * @return IEventComposite[]
     */
    public function getChildren(): array;
    public function getCurrentEvent(): IEvent;
    public function getExecutedEvents(): IExecutedEvents;

    public function remove($eventCompositeName): bool;
    public function add(IEventComposite $eventComposite): bool;
    public function run(): bool;

}