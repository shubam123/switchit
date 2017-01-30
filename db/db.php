<?php #this script contains the class for database connection and passing queries ?>
<?php
	class Database
	{
		public $host;
		public $user;
		public $password;
		public $database;
		public $connection;

		function __construct()
		{
			switch($_SERVER['HTTP_HOST'])
			{
				case "localhost":   //locally
					$this->host="localhost";
					$this->user="root";
					$this->password="1q2w3e";
					$this->database="switchit";
				break;
				case "http://35.154.85.66":
				case "35.154.85.66":
					$this->host="localhost";
					$this->user="root";
					$this->password="lumos2k17";
					$this->database="switchit";
				break;
				
			}
		}

		//function to connect to database	
		function connect()
		{
			$this->connection=mysqli_connect($this->host,$this->user,$this->password,$this->database);
			//mysql_select_db() or die(mysql_error());
		}

		//function to insert data in database
		function makeQuery($query)
		{
			return mysqli_query($this->connection,$query);
		}
		//function to disconnect the current connection from database
		function disconnect()
		{
			mysqli_close($this->connection);
		}
	}
	 
?>
