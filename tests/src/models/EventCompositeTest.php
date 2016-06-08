<?php
namespace cmspp\events\models;
use cmspp\plugin\standard\OtherPlugin;
use cmspp\plugin\standard\StartPlugin;
use cmspp\plugin\standard\TestPlugin;
use cmspp\serviceManager\classes\ServiceManager;
use cmspp\events\models\events\classes\composites\EventComposite;
use cmspp\serviceManager\classes\ControlManager;

class EventCompositeTest extends \PHPUnit_Framework_TestCase
{
    public function testComposite()
    {
        $serviceControl = new ControlManager();
        $serviceManager = new ServiceManager();

        $start = new EventComposite(new StartPlugin(), $serviceManager, $serviceControl);
        $test = new EventComposite(new TestPlugin(), $serviceManager, $serviceControl);
        $start->add($test);
        $test->add(new EventComposite(new OtherPlugin(), $serviceManager, $serviceControl));

        $this->assertFalse($start->run());
    }
    public function testOneRun()
    {

    }
    public function testTwoRun()
    {

    }
    public function testMultiRun()
    {

    }
}