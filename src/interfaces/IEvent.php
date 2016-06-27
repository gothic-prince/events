<?php
namespace cmspp\events\interfaces;
use cmspp\managers\interfaces\Service\IService;

interface IEvent extends IService
{
    public function run(): bool;
}