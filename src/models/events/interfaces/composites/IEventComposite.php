<?php
namespace cmspp\events\models\events\interfaces\composites;
use cmspp\events\models\events\interfaces\IEvent;
use cmspp\serviceManager\interfaces\Service\IServiceControl;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

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
    public function getServiceControl(): IServiceControl;
    public function run(): bool;
}