<?php
<<<<<<< HEAD
class DbController{
    const DBIP = "localhost";

    const DBNAME = "Project-Sierra";

    const DBUSER ="sierra";
    const DBPW = "sierra";
    private $dbconn;

    function __construct(){

        $this->dbconn = new mysqli(Self::DBIP,Self::DBUSER,Self::DBPW,Self::DBNAME);
        if ($this->dbconn->connect_error) {
            die("Database connection failed");
        }
    }

    public function getDbconn(){
        return $this->dbconn;
    }
}
=======
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
>>>>>>> 503ebe50df83261c97d2138a0af20d2c82a61a39
?>
