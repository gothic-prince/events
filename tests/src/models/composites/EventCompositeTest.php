<?php
namespace cmspp\events\models\composites;

use cmspp\events\interfaces\IEvent;
use cmspp\managers\interfaces\Service\IControlManager;
use cmspp\managers\models\ServiceManager;

class EventCompositeTest extends \PHPUnit_Framework_TestCase
{
    public function testComposite()
    {
        /**
         * @var $serviceControl IControlManager
         */
        $serviceControl = $this->getMock(IControlManager::class);

        $serviceManager = new ServiceManager();

        $event = $this->getMock(IEvent::class);
        $event->method("run")->willReturn(true);
        $event->method("getName")->willReturn("Plugin 1");

        $event2 = $this->getMock(IEvent::class);
        $event2->method("run")->willReturn(false);
        $event2->method("getName")->willReturn("Plugin 2");

        $event3 = $this->getMock(IEvent::class);
        $event3->method("run")->willReturn(true);
        $event3->method("getName")->willReturn("Plugin 3");

        $event4 = $this->getMock(IEvent::class);
        $event4->method("run")->willReturn(true);
        $event4->method("getName")->willReturn("Plugin 4");

        $event5 = $this->getMock(IEvent::class);
        $event5->method("run")->willReturn(true);
        $event5->method("getName")->willReturn("Plugin 5");

        $eventComposite = new EventComposite($event, $serviceManager, $serviceControl);
        $eventComposite2 = new EventComposite($event2, $serviceManager, $serviceControl);
        $eventComposite3 = new EventComposite($event3, $serviceManager, $serviceControl);
        $eventComposite4 = new EventComposite($event4, $serviceManager, $serviceControl);
        $eventComposite5 = new EventComposite($event5, $serviceManager, $serviceControl);

        $eventComposite->add($eventComposite2);
        $eventComposite2->add($eventComposite3);
        $eventComposite2->add($eventComposite5);
        $eventComposite->add($eventComposite4);



        $this->assertTrue($eventComposite->run());
        print_r($eventComposite->getRunnedEvents());
    }
}
