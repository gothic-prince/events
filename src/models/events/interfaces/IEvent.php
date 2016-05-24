<?php
namespace cmspp\events\models\events\interfaces;
use cmspp\serviceManager\interfaces\IBehavior;
use cmspp\serviceManager\interfaces\IServiceManager;

interface IEvent
{
    /**
     * @param IServiceManager $serviceManager
     * @return IEvent[]
     */
    public function init(IServiceManager $serviceManager): array;
    public function run(IServiceManager $serviceManager, IWhereExecuted $whereExecuted);
    
    public function getBehavior(IServiceManager $serviceManager): IBehavior;
    public function getName(): string;
}