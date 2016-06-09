<?php
namespace cmspp\serviceManager\interfaces\Behavior;
use cmspp\serviceManager\interfaces\Service\IControlManager;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

interface IBehavior
{
    public function add(IServiceManager $serviceManager, IControlManager $serviceControl): bool;
    public function remove(IServiceManager $serviceManager, IControlManager $serviceControl): bool;
    public function has(IServiceManager $serviceManager, IControlManager $serviceControl): bool;
    public function get(IServiceManager $serviceManager, IControlManager $serviceControl): bool;
}