 <?php
class DB_HANDLER
{
	private $conn;
	
	function __construct($conn)
	{
		$this->conn = $conn;
	}
	
	//view contacts
	public function view_all_contacts()
	{
		 return $this->get_cust_cols("SELECT * from contacts ORDER BY created_at DESC");
	}
	  // delete contacts
    public function delete_contact($contact_id)
	{
		 	$query="DELETE FROM contacts where contact_id=?";
		 	$params=array("i", $contact_id);
		 	$result=$this->preparedStatement($this->conn, "delete", $query, $params);
	        return $result;
	}
	public function view_all_sm()
	{
		 return $this->get_cust_cols("SELECT * from social_media ORDER BY created_at DESC");
	}

	public function add_sm($sm_title, $sm_link)
	{
		$query="INSERT INTO social_media(sm_title, sm_link) VALUES (?,?)";
		$params=array("ss",$sm_title, $sm_link);
		$result=$this->preparedStatement($this->conn, "add", $query, $params);
	    return $result;
	}
	 public function delete_sm($sm_id)
	{
		 	$query="DELETE FROM social_media where sm_id=?";
		 	$params=array("i", $sm_id);
		 	$result=$this->preparedStatement($this->conn, "delete", $query, $params);
	        return $result;
	}
	public function get_sm($sm_id)
	{
		$query="SELECT * from social_media where sm_id=?";
		$params=array("i", $sm_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;

	}

	public function edit_sm($sm_title, $sm_link, $sm_id)
	{
		$query="UPDATE social_media SET sm_title=?, sm_link=? where sm_id=?";
		$params=array("ssi", $sm_title, $sm_link, $sm_id);
		$result=$this->preparedStatement($this->conn, "edit", $query, $params);
	    return $result;
	}

	public function check_sm_exist($sm_title)
	{
		$query="SELECT sm_id from social_media where sm_title=?";
		$params= array("s", $sm_title);
		$result=$this->preparedStatement($this->conn, "check", $query, $params);
	    return $result;
	}
	
		public function check_user_exists($username)
	{
			$query = "SELECT username FROM users WHERE username = ?";
			$params = array("s", $username);
			$result = $this->preparedStatement($this->conn, "check", $query, $params);
			return $result;
	}

		public function get_user($username)
	{
		 	$query="SELECT  * from users where username=?";
		 	$params=array("s",$username);
		 	$res=$this->preparedStatement($this->conn, "get", $query, $params);
	        return $res;
	}
		//Validate username and password
	public function check_user_login($username, $pwd)
	{
		include_once('pass_hash.php');
		$stmt = $this->conn->prepare("SELECT password FROM users WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$stmt->bind_result($password);
		$stmt->store_result();
		if($stmt->num_rows > 0)
		{
			$stmt->fetch();
			$stmt->close();
			//Check if the passwords are matching
			if(PASS_HASH::checkPassword($password, $pwd))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$stmt->close();
			return false;
		}
	}
	// add user
	public function add_user($username, $password, $is_admin)
	{
		include_once('pass_hash.php');
		$pass_hash = PASS_HASH::hash($password);
		$query="INSERT INTO users(username, password, is_admin) VALUES (?,?,?)";
		$params = array("ssi", $username, $pass_hash, $is_admin);
		$result = $this->preparedStatement($this->conn, "add", $query, $params);

		return $result;

	}
	//check username exist
	public function check_username_exist($username)
	{
		$query="SELECT user_id from users where username=?";
		$params = array("s", $username);
		$result = $this->preparedStatement($this->conn, "check", $query, $params);
		return $result;

	}
	// edit user
	public function edit_user($username, $password, $is_admin, $user_id)
	{
		include_once("pass_hash.php");
		$query="UPDATE users SET username=?, password=? , is_admin=? where user_id=?";
		$pass_hash = PASS_HASH::hash($password);
		$params = array("ssii", $username, $pass_hash, $is_admin, $user_id);
		$result = $this->preparedStatement($this->conn, "edit", $query, $params);

		return $result;

	}

		// edit user
	public function edit_user_setting($username, $password, $user_id)
	{
		include_once("pass_hash.php");
		$query="UPDATE users SET username=?, password=? where user_id=?";
		$pass_hash = PASS_HASH::hash($password);
		$params = array("ssi", $username, $pass_hash, $user_id);
		$result = $this->preparedStatement($this->conn, "edit", $query, $params);

		return $result;

	}

	// get users by user id for edit
	public function get_users_edit($user_id)
	{
		$query="SELECT * from users where user_id=?";
			$params=array("i",$user_id);
		 	$res=$this->preparedStatement($this->conn, "get", $query, $params);
	        return $res;

	}

	// delete user
	public function del_user($user_id)
	{
		$query="DELETE from users where user_id=?";
			$params=array("i",$user_id);
		 	$res=$this->preparedStatement($this->conn, "delete", $query, $params);
	        return $res;
	}

	// view all users
		public function view_all_users()
	{
		 return $this->get_cust_cols("SELECT *,(SELECT status_name from user_status where status_id=is_admin) as status from users ORDER BY created_at ASC");
	}
    
    	//get user by id for admin reset password
	public function user_reset_pass($admin_id)
	{
			$query="SELECT * from users where user_id=?";
			$params=array("i",$admin_id);
		 	$res=$this->preparedStatement($this->conn, "get", $query, $params);
	        return $res;
	}
	//get password from modal by user id
	public function user_password_reset($password, $user_id)
	{
			include_once("pass_hash.php");
			$query="UPDATE users SET password=? where user_id=?";
			$pass_hash = PASS_HASH::hash($password);
			$params=array("si", $pass_hash, $user_id);
			$res=$this->preparedStatement($this->conn, "edit", $query, $params);
	        return $res;

	}

    // add destination
	public function add_dest($dest_img, $dest_country_id, $dest_city_id, $dest_days, $dest_nights, $dest_price)
	{
		$query="INSERT INTO destination(dest_img, dest_country_id, dest_city_id, dest_days, dest_nights, dest_price) VALUES (?,?,?,?,?,?)";
		$params=array("siiiis", $dest_img, $dest_country_id, $dest_city_id, $dest_days, $dest_nights, $dest_price);
		$res=$this->preparedStatement($this->conn, "add", $query, $params);
	    return $res;
	}

	// edit destination
	public function edit_dest($dest_img, $dest_country_id, $dest_city_id, $dest_days, $dest_nights, $dest_price, $dest_id)
	{
		$query="UPDATE destination SET dest_img=?, dest_country_id=?, dest_city_id=?, dest_days=?, dest_nights=?, dest_price=? where dest_id=?";
		$params=array("siiiisi", $dest_img, $dest_country_id, $dest_city_id, $dest_days, $dest_nights, $dest_price, $dest_id);
		$res=$this->preparedStatement($this->conn, "edit", $query, $params);
	    return $res;
	}
	// get destinations for edit
	public function get_destination($dest_id)
	{
		$query="SELECT * from destination where dest_id=?";
		$params=array("i", $dest_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;
	}
	public function del_destination($dest_id)
	{
		$query="DELETE from destination where dest_id=?";
		$params=array("i", $dest_id);
		$result=$this->preparedStatement($this->conn, "delete", $query, $params);
	    return $result;
	}

	public function check_city_exist($dest_city_id)
	{
		$query = "SELECT dest_id FROM destination WHERE dest_city_id = ?";
			$params = array("i", $dest_city_id);
			$result = $this->preparedStatement($this->conn, "check", $query, $params);
			return $result;
	}


	// view all destinations
		public function view_all_dest()
	{
		 return $this->get_cust_cols("SELECT destination.*, (SELECT country_name from country where country.country_id=destination.dest_country_id) as dest_country, (SELECT city_name from city where city.city_id=destination.dest_city_id) as dest_city from destination left join country on country.country_id=destination.dest_country_id ORDER BY created_at DESC");
	}

	// public function check_offer_city_exist($offer_city_id)
	// {
	// 	$query = "SELECT offer_id FROM offers WHERE offer_city_id = ?";
	// 		$params = array("i", $offer_city_);
	// 		$result = $this->preparedStatement($this->conn, "check", $query, $params);
	// 		return $result;
	// }

	  // add destination
	public function add_offer($offer_img, $dest_id, $offer_city_id, $offer_days, $offer_nights, $offer_price)
	{
		$query="INSERT INTO offers(offer_img, dest_id, offer_city_id, offer_days, offer_nights, offer_price) VALUES (?,?,?,?,?,?)";
		$params=array("siiiis", $offer_img, $dest_id, $offer_city_id, $offer_days, $offer_nights, $offer_price);
		$res=$this->preparedStatement($this->conn, "add", $query, $params);
	    return $res;
	}

	// edit offerination
	public function edit_offer($offer_img, $dest_id, $offer_city_id, $offer_days, $offer_nights, $offer_price, $offer_id)
	{
		$query="UPDATE offers SET offer_img=?, dest_id=?, offer_city_id=?, offer_days=?, offer_nights=?, offer_price=? where offer_id=?";
		$params=array("siiiisi", $offer_img, $dest_id, $offer_city_id, $offer_days, $offer_nights, $offer_price, $offer_id);
		$res=$this->preparedStatement($this->conn, "edit", $query, $params);
	    return $res;
	}
	// get destinations for edit
	public function get_offer($offer_id)
	{
		$query="SELECT * from offers where offer_id=?";
		$params=array("i", $offer_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;
	}
	public function del_offer($offer_id)
	{
		$query="DELETE from offers where offer_id=?";
		$params=array("i", $offer_id);
		$result=$this->preparedStatement($this->conn, "delete", $query, $params);
	    return $result;
	}

	public function view_all_offers()
	{
		 return $this->get_cust_cols("SELECT offers.*, (SELECT country_name from country where country.country_id=offers.dest_id) as offer_country, (SELECT city_name from city where city.city_id=offers.offer_city_id) as offer_city  from offers left join country on country.country_id=offers.dest_id ORDER BY created_at DESC");
	}

	public function view_all_partners()
	{
		 return $this->get_cust_cols("SELECT * from partner ORDER BY created_at DESC");
	}

	public function add_partner($partner_name, $partner_img, $partner_web_url)
	{
		$query="INSERT INTO partner(partner_name, partner_img, partner_web_url) VALUES (?,?,?)";
		$params=array("sss",$partner_name, $partner_img, $partner_web_url);
		$result=$this->preparedStatement($this->conn, "add", $query, $params);
	    return $result;
	}
	 public function delete_partner($partner_id)
	{
		 	$query="DELETE FROM partner where partner_id=?";
		 	$params=array("i", $partner_id);
		 	$result=$this->preparedStatement($this->conn, "delete", $query, $params);
	        return $result;
	}
	public function get_partner($partner_id)
	{
		$query="SELECT * from partner where partner_id=?";
		$params=array("i", $partner_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;

	}

	public function edit_partner($partner_name, $partner_img, $partner_web_url, $partner_id)
	{
		$query="UPDATE partner SET partner_name=?, partner_img=?, partner_web_url=? where partner_id=?";
		$params=array("sssi", $partner_name, $partner_img, $partner_web_url, $partner_id);
		$result=$this->preparedStatement($this->conn, "edit", $query, $params);
	    return $result;
	}

	public function check_partner_exist($partner_name)
	{
		$query="SELECT partner_id from partner where partner_name=?";
		$params= array("s", $partner_name);
		$result=$this->preparedStatement($this->conn, "check", $query, $params);
	    return $result;
	}
	
	public function get_all_countries()
	{
		return $this->get_cust_cols("SELECT * from country");
	}

	public function get_city($country_id)
	{
		$query="SELECT * from city where country_id=?";
		$params= array("i", $country_id);
		$result=$this->preparedStatement($this->conn, "get", $query, $params);
	    return $result;
	}

	public function get_all_status()
	{
		return $this->get_cust_cols("SELECT * from user_status");
	}

	public function get_dest_country()
	{
		return $this->get_cust_cols("SELECT country.country_id, destination.*,(SELECT country_name from country where country.country_id=destination.dest_country_id) as offer_country from destination left join country on destination.dest_country_id=country.country_id");
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