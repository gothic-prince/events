<?php
namespace cmspp\events\models;
use cmspp\plugin\models\EmptyPlugins\EmptyFirstPlugin;
use cmspp\plugin\models\EmptyPlugins\EmptySecondPlugin;
use cmspp\plugin\models\EmptyPlugins\EmptyThirdPlugin;
use cmspp\serviceManager\classes\EmptyServiceManager;
use cmspp\events\classes\composites\EventComposite;
use cmspp\serviceManager\classes\EmptyControlManager;
use cmspp\serviceManager\interfaces\Service\IControlManager;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

class ChainOfExecutionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IControlManager
     */
    protected $serviceControl;
    /**
     * @var IServiceManager
     */
    protected $serviceManager;
    /**
     * EventCompositeTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->serviceControl = new EmptyControlManager();
        $this->serviceManager = new EmptyServiceManager();

    }

    public function testComposite()
    {
        
        $start = new EventComposite(new EmptyFirstPlugin(), $this->serviceManager, $this->serviceControl);
        $test = new EventComposite(new EmptySecondPlugin(), $this->serviceManager, $this->serviceControl);
        $start->add($test);
        $test->add(new EventComposite(new EmptyThirdPlugin(), $this->serviceManager, $this->serviceControl));
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