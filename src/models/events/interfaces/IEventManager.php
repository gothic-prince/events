<?php
namespace cmspp\events\models\events\interfaces;

interface IEventManager
{
    public function getEvent(string $pluginName): IPluginEvents;
}