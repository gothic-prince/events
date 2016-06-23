<?php
namespace cmspp\events\interfaces\info;


interface IEventInfo
{
    public function getType(): string;
    public function getName(): string;
}