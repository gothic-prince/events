<?php
namespace cmspp\events\models\events\interfaces;

interface IEventManager
{
    /**
     * @param $pluginName
     * @return IPluginEvents
     */
    public function getEvents($pluginName);
    
}