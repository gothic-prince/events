<?php
namespace cmspp\events\models\events\classes\composites;
use cmspp\events\models\events\abstractions\composites\AbstractEventComposite;
use cmspp\events\models\events\interfaces\IEvent;
use cmspp\serviceManager\interfaces\Service\IControlManager;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

class EventComposite extends AbstractEventComposite
{
    public function __construct(IEvent $event, IServiceManager $serviceManager, IControlManager $serviceControl)
    {
        $this->setEvent($event);
        $this->setServiceManager($serviceManager);
        $this->setServiceControl($serviceControl);
    }
    public function run(): bool
    {
        $status = $this
            ->getEvent()
            ->run
            (
                $this->getServiceManager(),
                $this->getServiceControl()
            );

        if ($status === false){
            return false;
        }
        $eventComposites = $this->getEventComposites();
        for ($indexComposite = 0; $indexComposite < count($eventComposites); $indexComposite++) {
            if ($eventComposites[$indexComposite]->run() === false) {
                return false;
            }
        }
        return true;
    }
}