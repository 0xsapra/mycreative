<?php 
require_once('config.php');
class Database{
	//variables
	private $connection;


	//constructor
	public function __construct(){
		$this->open_conect();
	}



	//members
		//secure-the-query
		public function secure($q){
			return mysqli_real_escape_string($this->connection,$q);
			}
		//start connect
		function open_conect()
			{
			$this->connection=mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			if(mysqli_connect_errno()){die("NOT WORKING");}
			}
		//close
		public function close_conn(){
			mysqli_close($this->connection);
			unset($this->connection);
			}
		//query
		public function query($sql){
			$result=mysqli_query($this->connection,$sql);
			if(!$result){
				die(''); return;
			}
			return $result;
			}
		//get sno
		public function get_one_value_back($query){
			$result=mysqli_query($this->connection,$query);
			if(!$result){
				die(''); return;
			}
			return mysqli_fetch_row($result)[0];
			}
		




}
$db=new Database();
?>
