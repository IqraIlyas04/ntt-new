 <?php
class DB_HANDLER
{
	private $conn;
	
	function __construct($conn)
	{
		$this->conn = $conn;
	}
	
	// insert contact details
	public function add_contact($first_name, $last_name, $phone_no)
	{
		$query="INSERT INTO contacts(first_name, last_name, phone_no) VALUES (?,?,?)";
		$params=array("sss", $first_name, $last_name, $phone_no);
		$result=$this->preparedStatement($this->conn, "add", $query, $params);
	    return $result;
	}

	public function view_all_dest()
	{
		 return $this->get_cust_cols("SELECT destination.*, (SELECT country_name from country where country.country_id=destination.dest_country_id) as dest_country, (SELECT city_name from city where city.city_id=destination.dest_city_id) as dest_city from destination left join country on country.country_id=destination.dest_country_id ORDER BY created_at DESC");
	}


		public function view_all_offers()
	{
		 return $this->get_cust_cols("SELECT offers.*, (SELECT country_name from country where country.country_id=offers.dest_id) as offer_country, (SELECT city_name from city where city.city_id=offers.offer_city_id) as offer_city  from offers left join country on country.country_id=offers.dest_id ORDER BY created_at DESC");
	}
	

	// Existing functions
	function refValues($arr){
	    if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
	    {
	        $refs = array();
	        foreach($arr as $key => $value)
	            $refs[$key] = &$arr[$key];
	        return $refs;
	    }
	    return $arr;
	}



	//Dynamic prepared statement function to do all add and edit operations
	function preparedStatement($conn, $type, $stmt, $params)
	{

		if($type == "add")
		{
			$stmt = $conn->prepare($stmt);
			call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
			$result = $stmt->execute();
			$stmt->close();
			return $result;
		}

		if($type == "check")
		{
			$stmt = $conn->prepare($stmt);
			call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
			$stmt->execute();
			$stmt->store_result();
			$num_rows = $stmt->num_rows;
			$stmt->close();
			return $num_rows > 0;
		}

		if($type == "edit")
		{
			$stmt = $conn->prepare($stmt);
			call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
			$stmt->execute();
			$num_affected_rows = $stmt->affected_rows;
			$stmt->close();
			return $num_affected_rows > 0;
		}

		if($type == "delete")
		{
			$stmt = $conn->prepare($stmt);
			call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
			$stmt->execute();
			$num_affected_rows = $stmt->affected_rows;
			$stmt->close();
			return $num_affected_rows > 0;
		}

		if($type == "get")
		{
			include_once('utility.php');
			$utility_handler = new UTILITY();

			$stmt = $conn->prepare($stmt);
			call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));

			if($stmt->execute())
			{
				$arr = array();
				$row = $utility_handler->bind_result_array($stmt);

				if(!$stmt->error)
				{
					$counter = 0;
					while($stmt->fetch())
					{
						$arr[$counter] = $utility_handler->getCopy($row);
						$counter++;
					}
				}
				$stmt->close();
				return $arr;
			}
			else
			{
				return NULL;
			}
		}
	}

	//Get Custom columns
	function get_cust_cols($query)
	{
		include_once('utility.php');
		$utility_handler = new UTILITY();

		$arr = array();
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		$row = $utility_handler->bind_result_array($stmt);

		if(!$stmt->error)
		{
			$counter = 0;
			while($stmt->fetch())
			{
				$arr[$counter] = $utility_handler->getCopy($row);
				$counter++;
			}
		}
		$stmt->close();
		return $arr;
	}

}
?>