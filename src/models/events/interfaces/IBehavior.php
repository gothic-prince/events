<?php
namespace cmspp\serviceManager\interfaces;

interface IBehavior
{
    public function add(IServiceManager $serviceManager): bool;
    public function remove(IServiceManager $serviceManager): bool;
    public function has(IServiceManager $serviceManager): bool;
    public function get(IServiceManager $serviceManager): bool;
}