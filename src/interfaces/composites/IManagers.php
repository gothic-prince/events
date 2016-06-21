<?php
namespace cmspp\events\interfaces\composites;

use cmspp\managers\interfaces\Service\IControlManager;
use cmspp\managers\interfaces\Service\IServiceManager;

interface IManagers
{
    public function getServiceManager(): IServiceManager;
    public function getServiceControl(): IControlManager;
}