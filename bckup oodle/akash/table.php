<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("user",$con);
$query="CREATE TABLE user_detail(
			sno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
			uname VARCHAR(20) NOT NULL,
			fname VARCHAR(30) NOT NULL,
			mob_no INTEGER NOT NULL,
			state VARCHAR(20) NOT NULL,
			city VARCHAR(20) NOT NULL,
			dob DATE NOT NULL,
			doj DATE NOT NULL,
			dp BLOB,
			PRIMARY KEY(sno),
			UNIQUE KEY(uname)
		)
		ENGINE=InnoDB";
		mysql_query($query,$con) or die (mysql_error());

?>