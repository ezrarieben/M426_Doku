<?php

class Modul
{
    private $modulId;
    private $moduleName;
    private $moduleNumber;

    function __construct($modulId, $moduleName, $moduleNumber)
    {
        $this->modulId = $modulId;
        $this->moduleName = $moduleName;
        $this->moduleNumber = $moduleNumber;
    }

    /**
     * @return mixed
     */
    public function getModulId()
    {
        return $this->modulId;
    }

    /**
     * @return mixed
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * @return mixed
     */
    public function getModuleNumber()
    {
        return $this->moduleNumber;
    }
}