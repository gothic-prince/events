<?php
namespace cmspp\events\models\events\interfaces;


interface IWhereExecuted
{
    /**
     * @return string
     */
    public function getLine();
    /**
     * @return string
     */
    public function getFile();
    /**
     * @param $lineNumber string
     * @return $this
     */
    public function setLine($lineNumber);
    /**
     * @param $fileName string
     * @return $this
     */
    public function setFile($fileName);
}