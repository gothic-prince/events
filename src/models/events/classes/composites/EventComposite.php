<?php
namespace cmspp\events\models\events\classes\composites;
use cmspp\events\models\events\abstractions\composites\AbstractEventComposite;
use cmspp\events\models\events\interfaces\IEvent;
use cmspp\serviceManager\interfaces\Service\IServiceControl;
use cmspp\serviceManager\interfaces\Service\IServiceManager;

class EventComposite extends AbstractEventComposite
{
    public function __construct(IEvent $event, IServiceManager $serviceManager, IServiceControl $serviceControl)
    {
        $this->setEvent($event);
        $this->setServiceManager($serviceManager);
        $this->setServiceControl($serviceControl);
    }
    public function run(): bool
    {
        //todo: Сделать отмену
        $this->getEvent()->run($this->getServiceManager(), $this->getServiceControl());
        $eventComposites = $this->getEventComposites();
        for ($indexComposite = 0; $indexComposite < count($eventComposites); $indexComposite++)
        {
            $eventComposites[$indexComposite]->run();
        }
        return true;
    }
}