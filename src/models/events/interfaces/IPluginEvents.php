<?php
namespace cmspp\events\models\events\interfaces;

interface IPluginEvents
{
    /**
     * @param $eventName
     * @return IEvent[]
     */
    public function getEvent($eventName): array;
}