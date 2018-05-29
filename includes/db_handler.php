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
		 return $this->get_cust_cols("SELECT * from destination_offers ORDER BY RAND() LIMIT 0,8");
	}

	public function view_dest()
	{
		 return $this->get_cust_cols("SELECT * from destination_offers where type = 'destination' LIMIT 0,8");
	}

	public function view_all_offers()
	{
		 return $this->get_cust_cols("SELECT * from destination_offers where type='special offers' LIMIT 0,8");
	}


	public function get_dest_country()
	{
		return $this->get_cust_cols("SELECT DISTINCT destination.dest_country_id, country.country_name from destination left join country on destination.dest_country_id=country.country_id ORDER BY country.country_name");
	}

	public function get_dest_countryid($country_id)
	{
		$query="SELECT * from destination_offers WHERE country_id=? ORDER BY country LIMIT 0,8";
		$params=array("i", $country_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;

	}
	public function get_offers_by_countryid($country_id)
	{
		$query="SELECT DISTINCT destination.dest_city_id, city.city_name from destination left join country on destination.dest_country_id=country.country_id left join city on city.city_id=destination.dest_city_id AND city.country_id=country.country_id left join offers on offers.dest_id=destination.dest_id WHERE destination.dest_country_id=? ORDER BY city.city_name";
		$params=array("i", $country_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;
	}

	public function get_city_offers($city_id)
	{
		$query="SELECT * from destination_offers where city_id=? ORDER BY country LIMIT 0,8";
		$params=array("i", $city_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;
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