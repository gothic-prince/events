<?php
namespace cmspp\serviceManager\interfaces\Behavior;
use cmspp\serviceManager\interfaces\Service\IServiceControl;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

interface IBehavior
{
    public function add(IServiceManager $serviceManager, IServiceControl $serviceControl): bool;
    public function remove(IServiceManager $serviceManager, IServiceControl $serviceControl): bool;
    public function has(IServiceManager $serviceManager, IServiceControl $serviceControl): bool;
    public function get(IServiceManager $serviceManager, IServiceControl $serviceControl): bool;
}