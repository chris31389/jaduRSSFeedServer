<?php
	class Db {
		private $db;
		
		function Db($file){
			$this->db = new SQLite3($file);
		}

		function Query($query){
			$result = $this->db->query($query);
			$json = array();
			
			while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
				$json[] = $row;
			}

			return json_encode($json);
		}

		function Exec($query){
			$success = $this->db->exec($query);

			return json_encode(array('success'=>$success));
		}
	}
?>