<?php

require_once './controller/DbController.php';
require_once './model/Mark.php';
require_once './model/Modul.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 * Class MarksController
 * This class serves the businesslogic for the marks
 */
class MarksController
{
    private $userid;
    private $cnx;
    private $markArray = [];

    /**
     * MarksController constructor.
     * Sets the classvariable userid and cnx.
     */
    function __construct()
    {
        $dbcontroller = new DbController();
        $this->cnx = $dbcontroller->getDbconn();
        $this->setUserid();
    }

    /**
     * Sets the classvariable if the sessionvar userid is set and an integer
     */
    function setUserid()
    {
        if (isset($_SESSION['userid']) && is_int($_SESSION['userid'])) {
            $this->userid = $_SESSION['userid'];
        }else{
            //Manual allocation for debugging.
            $this->userid = 2;
        }
    }

    /**
     * This function will fetch all Marks for the current user.
     */
    function getMarks()
    {
        $stmnt = $this->cnx->prepare('SELECT * FROM User_Modul WHERE fk_id_user = ?');
        $stmnt->bind_param("s", $this->userid);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while ($obj = $result->fetch_object()) {
            array_push($this->markArray, new Mark($obj->lb, $obj->percentage_lb, 'LB', $obj->fk_id_modul));
            array_push($this->markArray, new Mark($obj->zp1, $obj->percentage_zp1, 'ZP1', $obj->fk_id_modul));
            array_push($this->markArray, new Mark($obj->zp2, $obj->percentage_zp2, 'ZP2', $obj->fk_id_modul));
            array_push($this->markArray, new Mark($obj->mj, $obj->percentage_mj, 'MJ', $obj->fk_id_modul));
        }
        return $this->markArray;

    }

    function getModulDetails($fk_id_modul){
        $stmnt = $this->cnx->prepare('SELECT * FROM Modul WHERE idModul = ?');
        $stmnt->bind_param("s", $fk_id_modul);
        $stmnt->execute();
        $result = $stmnt->get_result();
        while($obj = $result->fetch_object()){
            return new Modul($obj->idModul, $obj->modulname, $obj->modulnummer);
        }
    }

}