<?php
namespace cmspp\events\models;
use cmspp\events\models\composites\EventComposite;
use cmspp\plugin\models\EmptyPlugins\EmptyFirstPlugin;
use cmspp\plugin\models\EmptyPlugins\EmptySecondPlugin;
use cmspp\plugin\models\EmptyPlugins\EmptyThirdPlugin;
use cmspp\serviceManager\interfaces\Service\IControlManager;
use cmspp\serviceManager\interfaces\Service\IServiceManager;
use cmspp\serviceManager\models\CounterServise\CounterService;
use cmspp\serviceManager\models\EmptyManagers\EmptyControlManager;
use cmspp\serviceManager\models\SimpleServiceManager;

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
        $this->serviceManager = new SimpleServiceManager();
        $this->serviceManager->add($this->serviceManager, new CounterService(), $this->serviceControl);
    }

    /**
     * Проверяем порядок выполнение плагинов
     */
    public function testComposite()
    {
        
        $firstPlugin = new EventComposite
        (
            new EmptyFirstPlugin(),
            $this->serviceManager,
            $this->serviceControl
        );

        $secondPlugin = new EventComposite
        (
            new EmptySecondPlugin(),
            $this->serviceManager,
            $this->serviceControl
        );

        $thirdPlugin = new EventComposite
        (
            new EmptyThirdPlugin(),
            $this->serviceManager,
            $this->serviceControl
        );


        $firstPlugin->add($secondPlugin);

        $secondPlugin->add($thirdPlugin);

        

        $this->assertFalse($firstPlugin->run());
        $counterService = $this->serviceManager->get("CounterService");
        if ($counterService instanceof CounterService)
        {
            print_r($counterService->getPlugins());
        }

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