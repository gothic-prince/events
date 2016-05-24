<?php
namespace cmspp\events\models\events\interfaces;
use cmspp\serviceManager\interfaces\IService;
use cmspp\serviceManager\interfaces\IServiceManager;

interface IEvent extends IService
{
    /**
     * @param IServiceManager $serviceManager
     * События (или более расшириный вариант, - плагины), могут управлять всем приложением, выводом или фильтрации контатна.
     * У них есть доступ ко всем сервисам, а соответственно, с лёгкостью могут работать с базой данных, управлять или реагировать на определённые маршруты и т.д.
     * @see IServiceManager
     *
     * @return IEvent[]
     */
    
    public function run(IWhereExecuted $whereExecuted);
}