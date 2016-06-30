<?php
namespace cmspp\events\models\composites;

use cmspp\events\interfaces\composites\IEventComposite;
use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\info\IEventInfo;
use cmspp\events\interfaces\Sequence\IEventSequence;
use cmspp\events\interfaces\Sequence\IPriority;
use PHPUnit_Framework_MockObject_MockObject;

class EventCompositeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param string $pluginName
     * @param bool $returned
     * @return IEventComposite
     */
    public function getPluginContainer(string $pluginName, bool $returned): IEventComposite
    {
        /**
         * @var $iEventInfo IEventInfo|PHPUnit_Framework_MockObject_MockObject
         * @var $event IEvent|PHPUnit_Framework_MockObject_MockObject
         */

        $iEventInfo = $this->getMock(IEventInfo::class);
        $iEventInfo->method("getName")->willReturn($pluginName);

        $event = $this->getMock(IEvent::class);
        $event->method("run")->willReturn($returned);
        $event->method("getInfo")->willReturn($iEventInfo);
        $eventComposite = new EventComposite($event);
        return $eventComposite;
    }
    public function testExecuted_BASIC_A_B_C_C1_C2_C3_C4_C5_D_E_F()
    {
        $names = ["BASIC", "A", "B", "C", "D", "E", "F"];
        $PluginC = ["C1", "C2", "C3", "C4", "C5"];
        $PluginF = ["F1", "F2", "F3"];

        $basicEvent = $this->getPluginContainer("BASIC", true);

        for ($basic = 1; $basic < count($names); $basic++)
        {
            $basicReturned = true;
            if ($names[$basic] === "F")
                $basicReturned = false;

            $plugin = $this->getPluginContainer($names[$basic], $basicReturned);
            $basicEvent->add($plugin);
            if ($names[$basic] === "C")
                for ($c = 0; $c < count($PluginC); $c++)
                    $plugin->add($this->getPluginContainer($PluginC[$c], true));

            if ($names[$basic] === "F")
                for ($f = 0; $f < count($PluginF); $f++)
                    $plugin->add($this->getPluginContainer($PluginF[$f], true));

        }

        $basicEvent->run();

        $executedEvents = $basicEvent->getExecutedEvents();
        $allExecutedEvents = $executedEvents->getInfoExecutedEvents();
        $executedEvents->clear();

        $executedEventsName = ["BASIC", "A", "B", "C", "C1", "C2", "C3", "C4", "C5", "D", "E", "F"];


        $this->assertCount(12, $allExecutedEvents);

        for ($i = 0; $i < count($executedEventsName); $i++)
        {
            $this->assertContains($executedEventsName[$i], $allExecutedEvents[$i]->getName());
            //echo "\n" . $allExecutedEvents[$i]->getName();
        }
    }
    public function testPriority()
    {
        /*
        uasort($events, function($a, $b){


            $resultA = 0;

            $resultB = 0;
            if ($a instanceof IPriority)
                $resultA = $a->getPriority();

            if ($b instanceof IPriority)
                $resultB = $b->getPriority();

            return $resultA - $resultB;
        });
        for ($i = 0; $i < count($events); $i++)
        {
            $curEvent = $events[$i];
            if ($curEvent instanceof IPriority)
            {
                echo "\n";
                echo "+";
                echo $curEvent->getPriority();
            }
        }
        */
    }


























}