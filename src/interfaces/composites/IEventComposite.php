<?php
namespace cmspp\events\interfaces\composites;
use cmspp\events\interfaces\IEvent;
use cmspp\managers\interfaces\Service\IControlManager;
use cmspp\managers\interfaces\Service\IServiceManager;

interface IEventComposite
{
    /**
     * @return IEventComposite[]
     */
    public function getEventComposites(): array;
    public function remove($eventCompositeName): bool;
    public function add(IEventComposite $eventComposite): bool;
    public function getServiceManager(): IServiceManager;
    public function getEvent(): IEvent;
    public function getServiceControl(): IControlManager;
    public function run(): bool;
}