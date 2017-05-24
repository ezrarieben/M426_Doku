<?php

class Mark
{
    private $mark;
    private $percentage;
    private $description;
    private $modulId;

    /**
     * Mark constructor.
     * @param $mark
     * @param $percentage
     * @param $description
     * @param $modulId
     */
    function __construct($mark, $percentage, $description, $modulId)
    {
        $this->mark = $mark;
        $this->percentage = $percentage;
        $this->description = $description;
        $this->modul = $modulId;
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
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

}