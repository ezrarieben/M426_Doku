<?php
class DbController
{
    const DBIP = "localhost";
    const DBNAME = "Project-Sierra";
    const DBUSER ="sierra";
    const DBPW = "sierra";
    private $dbconn;
    public function __construct()
    {
        $this->dbconn = new mysqli(Self::DBIP, Self::DBUSER, Self::DBPW, Self::DBNAME);
        if ($this->dbconn->connect_error) {
            die("Database connection failed");
        }
    }
    public function getDbconn()
    {
        return $this->dbconn;
    }
}
?>
