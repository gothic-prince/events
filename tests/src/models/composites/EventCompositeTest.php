<?php
namespace cmspp\events\models\composites;

use cmspp\events\interfaces\IEvent;
use cmspp\events\interfaces\info\IEventInfo;
use cmspp\managers\models\ServiceManager;
use PHPUnit_Framework_MockObject_MockObject;

class EventCompositeTest extends \PHPUnit_Framework_TestCase
{
    public function testComposite()
    {
        /**
         * @var $iEventInfo IEventInfo|PHPUnit_Framework_MockObject_MockObject
         * @var $iEventInfo2 IEventInfo|PHPUnit_Framework_MockObject_MockObject
         * @var $iEventInfo3 IEventInfo|PHPUnit_Framework_MockObject_MockObject
         * @var $iEventInfo4 IEventInfo|PHPUnit_Framework_MockObject_MockObject
         * @var $iEventInfo5 IEventInfo|PHPUnit_Framework_MockObject_MockObject
         * @var $event1ReturnTrue IEvent|PHPUnit_Framework_MockObject_MockObject
         * @var $event2ReturnFalse IEvent|PHPUnit_Framework_MockObject_MockObject
         * @var $event3ReturnTrue IEvent|PHPUnit_Framework_MockObject_MockObject
         * @var $event4ReturnTrue IEvent|PHPUnit_Framework_MockObject_MockObject
         * @var $event5ReturnTrue IEvent|PHPUnit_Framework_MockObject_MockObject
         */

        $pluginName = "Plugin #1";
        $pluginName2 = "Plugin #2";
        $pluginName3 = "Plugin #3";
        $pluginName4 = "Plugin #4";
        $pluginName5 = "Plugin #5";

        $iEventInfo = $this->getMock(IEventInfo::class);
        $iEventInfo->method("getName")->willReturn($pluginName);
        $iEventInfo2 = $this->getMock(IEventInfo::class);
        $iEventInfo2->method("getName")->willReturn($pluginName2);
        $iEventInfo3 = $this->getMock(IEventInfo::class);
        $iEventInfo3->method("getName")->willReturn($pluginName3);
        $iEventInfo4 = $this->getMock(IEventInfo::class);
        $iEventInfo4->method("getName")->willReturn($pluginName4);
        $iEventInfo5 = $this->getMock(IEventInfo::class);
        $iEventInfo5->method("getName")->willReturn($pluginName5);


        $serviceManager = new ServiceManager();

        $event1ReturnTrue = $this->getMock(IEvent::class);
        $event1ReturnTrue->method("run")->willReturn(true);
        $event1ReturnTrue->method("getInfo")->willReturn($iEventInfo);

        $event2ReturnFalse = $this->getMock(IEvent::class);
        $event2ReturnFalse->method("run")->willReturn(false);
        $event2ReturnFalse->method("getInfo")->willReturn($iEventInfo2);

        $event3ReturnTrue = $this->getMock(IEvent::class);
        $event3ReturnTrue->method("run")->willReturn(true);
        $event3ReturnTrue->method("getInfo")->willReturn($iEventInfo3);

        $event4ReturnTrue = $this->getMock(IEvent::class);
        $event4ReturnTrue->method("run")->willReturn(true);
        $event4ReturnTrue->method("getInfo")->willReturn($iEventInfo4);

        $event5ReturnTrue = $this->getMock(IEvent::class);
        $event5ReturnTrue->method("run")->willReturn(true);
        $event5ReturnTrue->method("getInfo")->willReturn($iEventInfo5);

        $eventComposite = new EventComposite($event1ReturnTrue);
        $eventComposite2 = new EventComposite($event2ReturnFalse);
        $eventComposite3 = new EventComposite($event3ReturnTrue);
        $eventComposite4 = new EventComposite($event4ReturnTrue);
        $eventComposite5 = new EventComposite($event5ReturnTrue);

        $eventComposite->add($eventComposite2);
        $eventComposite2->add($eventComposite3);
        $eventComposite2->add($eventComposite5);
        $eventComposite->add($eventComposite4);

        $this->assertTrue($eventComposite->run());
        $executedEvents = EventComposite::getExecutedEvents();
        $allExecutedEvents = $executedEvents->getInfoExecutedEvents();

        $this->assertContains($pluginName, $allExecutedEvents[0]->getName());
        $this->assertContains($pluginName2, $allExecutedEvents[1]->getName());
        $this->assertContains($pluginName4, $allExecutedEvents[2]->getName());
    }
}
