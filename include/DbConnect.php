<?php
 
//Class DbConnect
class DbConnect
{
    //Variable to store database link
    private $con;
 
    //Class constructor
    function __construct()
    {
 
    }
 
    //This method will connect to the database
    function connect()
    {
        //Including the constants.php file to get the database constants
        include_once dirname(__FILE__) . '/Constants.php';
 
        //connecting to mysql database
        $this->con = pg_connect(DB_CONN)or die("Could not connect");
		
		$stat = pg_connection_status(con);
		if ($stat === PGSQL_CONNECTION_OK) {
			echo 'Connection status ok';
		} else {
			echo 'Connection status bad';
		};
 
        //Checking if any error occured while connecting
        /*
		if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		*/
        //finally returning the connection link 
        return $this->con;
    }
 
}