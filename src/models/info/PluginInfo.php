<?php
namespace cmspp\events\models\info;
use cmspp\events\interfaces\info\IEventInfo;

class PluginInfo implements IEventInfo
{
    /**
     * @var string
     */
    protected $pluginName;

    /**
     * PluginInfo constructor.
     * @param string $pluginName
     */
    public function __construct($pluginName)
    {
        $this->pluginName = $pluginName;
    }

    public function getType(): string
    {
        return "Plugin";
    }

    public function getName(): string
    {
        return $this->pluginName;
    }
}