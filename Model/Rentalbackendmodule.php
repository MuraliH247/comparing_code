<?php

class defaultdb3 {
    public function connect(){
        //   $conn = mysqli_connect('localhost', 'root', 'hOMES_247', 'homes247_rentals');
          $conn = mysqli_connect('localhost', '', '', 'homes247_rentals');
        if (!$conn) {
            die("Připojení se nezdařilo: " . mysqli_error($conn));
        } else {
            return $conn;
        }
    }
}


class rentalbackendmodule extends CI_Model {

    public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
    }

    public function get_city()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM  city");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['city'] = $row['city_name'];
            $temp['id'] = $row['city_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function getPropertyLocationId($location)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM `city` WHERE city_name = ?";	
		$sql_default = "SELECT * FROM `city` WHERE city_name = 'Bangalore'";
		$query_select = $this->db->query($sql_select, array($location));
		$query_default = $this->db->query($sql_default, array($location));
		$result = $query_select->row_array();
		$resultdefault = $query_default->row_array();
		if ($result == false)
		{
      		return $resultdefault;
		}
		else
		{
	  		return $result;
		}
	}
	
	public function get_bhk()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM bhk");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['bhk'] = $row['bhk'];
            $temp['id'] = $row['bhk_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_bathroom()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM bathroom");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['bathroom'] = $row['bathroom'];
            $temp['id'] = $row['bathroom_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_balcony()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM balcony");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['balcony'] = $row['balcony'];
            $temp['id'] = $row['balcony_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_furnish()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM furnish");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['furnish'] = $row['furnish_name'];
            $temp['id'] = $row['furnish_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_propertytype()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM property_type");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['propertytype'] = $row['property_type'];
            $temp['id'] = $row['property_typeIDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_ownership()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM ownership");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['ownership'] = $row['ownership_status'];
            $temp['id'] = $row['ownership_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_doorface()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM doorfacing");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['doorface'] = $row['doorfacing_names'];
            $temp['id'] = $row['doorfacing_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_amenities()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM amenities");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['amenities'] = $row['amenities'];
            $temp['id'] = $row['amenities_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}
	
	public function get_facilities()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM facilities");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['facilities'] = $row['facilities'];
            $temp['id'] = $row['facilities_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_nearby()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM nearby");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['nearby'] = $row['nearby_name'];
            $temp['id'] = $row['nearby_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_parking()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM parking");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['parking'] = $row['parking_type'];
            $temp['id'] = $row['parking_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_plottype()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM plottype");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['plottype'] = $row['plottype_name'];
            $temp['id'] = $row['plottype_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_plotsize()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM plotsize");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['plotsize'] = $row['Plotsizes'];
            $temp['id'] = $row['Plotsize_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_tenants()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM tenants");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['tenants'] = $row['tenant_type'];
            $temp['id'] = $row['tenant_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

    public function getcitybasedzone($cityId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT
		city.city_name,
		regions.region_id,
		regions.region_name
		FROM
		regions 
		LEFT JOIN 
		city ON city.city_IDPK = regions.region_cityIDFK 
		WHERE
		regions.region_cityIDFK = $cityId 
		order by regions.region_name ASC";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
    }

    public function get_locality_basedLocation($id,$zoneId="")
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		if(isset($zoneId) && !empty($zoneId) && $zoneId != "NULL" && $zoneId != 0  && $zoneId != "null" )
		{
			
			$dataBasezoneIdId = "and locality.locality_regionIDFK=$zoneId";
				
		} else 
		{
			$dataBasezoneIdId = "";
		}
		
		$sql_select = "SELECT 
		locality.locality_IDPK AS ID,
		locality.locality_name AS Name
		FROM  
		locality 
		where 
		locality.locality_cityIDFK='$id'
		$dataBasezoneIdId
		 ";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
    }

    function get_propertyById($id)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "
		SELECT
		property_details.property_cityIDFK AS Cityid,
		property_details.property_name AS PropertyName,
		property_details.property_IDPK AS PropertyID,
		property_details.property_rent AS Rent,
		property_details.property_maintanence_charges,
		property_details.property_deposit AS Deposit,
		property_details.property_area AS PropertyArea,
		property_details.property_area_type AS Areaytype,
		property_details.property_watersupply AS watersupply,
		property_details.property_coverimage,
		property_details.property_availablefrom AS availabledate,
		property_details.total_floor AS Totalfloor,
		property_details.property_floor AS Floor,
		property_details.brokerage_charges AS Brokerages,
		property_details.property_address AS Address,
		property_details.property_description AS Description,
		property_details.nearbydetails_description AS Nearbydescription,
		property_details.property_created AS Postedon,
		property_details.property_verify AS Verified,
		property_details.userIDFK,
		
		bhk.bhk AS BHK,
		bathroom.bathroom AS Bathroom,
		balcony.balcony AS Balcony,
		doorfacing.doorfacing_names AS Doorfacing,

		city.city_name AS City,
		locality.locality_name AS Locality,
		parking_details.open_parking AS Openparking,
		parking_details.covered_parking AS Coveredparking,
		property_type.property_type AS PropertyType,
		tenants.tenant_type AS Tenants,
		furnish.furnish_name AS Furnish,
		property_age.propertyage_year AS PropertyAgeYear,
		property_age.propertyage_month AS PropertyAgeMonth,
		ownership.ownership_status AS Ownership
		
		FROM

		`property_details`
		
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK
		LEFT JOIN
		tenants ON tenants.tenant_IDPK = property_details.property_tenantIDFK
		LEFT JOIN
		parking_details ON parking_details.properties_IDFK = property_details.property_IDPK
		LEFT JOIN
		property_age ON property_age.property_IDFK = property_details.property_IDPK
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		LEFT JOIN
		balcony ON balcony.balcony_IDPK = property_details.property_balcony
		LEFT JOIN
		doorfacing ON doorfacing.doorfacing_IDPK = property_details.property_door_facing
		where 
		property_details.property_IDPK=$id AND property_details.property_delete_status=0
				";
				
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
    }

    public function getProImg($rentalId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "
		SELECT 
		property_images.images_name AS Imagename,
		property_images.images_IDPK AS Id
		FROM  
		property_images
		where 
		property_images.property_IDFK = $rentalId";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		return $query_select->result();
    }
    
    
	
	// function getProFacilities($propId)
	// {
	// 	$this->db = $this->load->database('rentaldb', TRUE);
	// 	$sql_select = "
	// 	SELECT 
	// 	facilities_details.facilities_IDFK AS id,
	// 	facilities.facilities AS facilities,
	// 	facilities.facilities_image AS ImgPath
	// 	FROM  
	// 	facilities_details
	// 	LEFT JOIN
	// 	facilities ON facilities.facilities_IDPK = facilities_details.facilities_IDFK
	// 	WHERE 
	// 	facilities_details.properties_IDFK='$propId'
	// 	";
	// 	$query_select = $this->db->query($sql_select);
	// 	return $query_select->result();
	// }
	
	function getnearby($propId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		nearby.nearby_name AS nearby,
		nearby_details.nearby_IDFK AS id
		FROM  nearby_details
		LEFT JOIN
		nearby ON nearby.nearby_IDPK = nearby_details.nearby_IDFK
		where nearby_details.properties_IDFK='$propId'";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
    
    function check_user_favourite_prop($data)
	{
		$userID=$data['userId'];
		$propID=$data['propId'];
		$sql_select = "SELECT * FROM user_favourite 
		where user_favourite_userRegIDFK='$userID' and user_favourite_propertyInfoIDFK ='$propID'";
		$query_select = $this->db->query($sql_select);
		$val=$query_select->result();
		if($val)
		{
			return true;
		}
        else
        {
		return false;
		}
    }
    
    function check_user_recent_view($data)
	{
		$userID=$data['userId'];
		$propID=$data['propId'];
		$sql_select = "SELECT * FROM user_recent_view 
		where user_recent_view_userRegIDFK='$userID' and user_recent_view_propertyIDFK ='$propID'";
		$query_select = $this->db->query($sql_select);
		$val=$query_select->result();
		if($val)
		{
			return true;
		}
        else
        {
		return false;
		}
    }
    
    public function getlistings($limit="",$limitrows="",$city="",$localityId="",$regionid="",$propertyage="",$typeid="",$bedroom="",$bathroom="",$ownership="",$furnish="",$minprice="",$maxprice="",$tenant="",$fromdate="",$todate="")
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		/*based on city*/
		if(isset($city) && !empty($city) && $city != "NULL" && $city != 0  && $city != "null" )
		{
			
			$dataBasecityId = "and property_details.property_cityIDFK=$city";
				
		}else {
		$dataBasecityId = "";
		}
		
		/*based on localityId*/
		if(isset($localityId) && !empty($localityId) && $localityId != "NA" && $localityId != 0 )
		{
		$dataBaselocalityId = "and property_details.property_localityIDFK = $localityId";
		} else {
		$dataBaselocalityId = "";
		}

		// based on regionid
		if(isset($regionid) && !empty($regionid) && $regionid != "NA" && $regionid != 0 ){
			
			$dataBaseregionid = "and property_details.property_regionIDFK = $regionid";
			} else {
			$dataBaseregionid = "";
			}

		// Based on Property Type
		if(isset($typeid) && !empty($typeid) && $typeid != "NA" && $typeid != 0 ){
			
			$dataBasetypeid = "and property_details.property_typeIDFK = $typeid";
			} else {
			$dataBasetypeid = "";
			}
		
		/*based on bedroom*/
		if(isset($bedroom) && !empty($bedroom) && $bedroom != "NA" && $bedroom != 0 ){
			$dataBasebedroom = "and property_details.property_bhk = $bedroom";	
		} else {
		$dataBasebedroom = "";
		}

		/*based on bathroom*/
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NA" && $bathroom != 0 ){
			$dataBasebathroom = "and property_details.property_bathroom = $bathroom";	
		} else {
		$dataBasebathroom = "";
		}

		/*based on ownership*/
		if(isset($ownership) && !empty($ownership) && $ownership != "NA" && $ownership != 0 ){
			$dataBaseownership = "and property_details.property_ownershipIDFK = $ownership";	
		} else {
		$dataBaseownership = "";
		}

		/*based on furnish*/
		if(isset($furnish) && !empty($furnish) && $furnish != "NA" && $furnish != 0 ){
			$dataBasefurnish = "and property_details.property_furnishIDFK = $furnish";	
		} else {
		$dataBasefurnish = "";
		}

		// based on price
		if(isset($minprice) && !empty($minprice) && $minprice != "NA" && $minprice != 0 && ($maxprice) && !empty($maxprice) && $maxprice != "NA" && $maxprice != 0 )
			{
			$dataBasebetweenprice = "and property_details.property_rent BETWEEN $minprice AND $maxprice";
			}else 
			{
			$dataBasebetweenprice = "";
			}

		/*based on tenant*/
		if(isset($tenant) && !empty($tenant) && $tenant != "NA" && $tenant != 0 ){
			$dataBasetenant = "and property_details.property_tenantIDFK = $tenant";	
		} else {
		$dataBasetenant = "";
		}

		// based on available date
		if(isset($fromdate) && !empty($fromdate) && $fromdate != "NA" && $fromdate != 0 && ($todate) && !empty($todate) && $todate != "NA" && $todate != 0 )
		{
			$databasebetweendate = "and property_details.property_availablefrom BETWEEN $fromdate AND $todate";
		}else if(isset($fromdate) && !empty($fromdate) && $fromdate != "NA" && $fromdate != 0){
			$databasebetweendate = "and property_details.property_availablefrom >= '$fromdate'";
		}else{
			$databasebetweendate = "";
		}

		$sql_select = "
		SELECT
		property_details.property_coverimage AS Coverimage,
		property_details.property_cityIDFK AS Cityid,
		property_details.property_localityIDFK AS Localityid,
		property_details.property_name AS PropertyName,
		property_details.property_IDPK AS PropertyID,
		property_details.property_rent AS Rent,
		property_details.property_description AS Description,
		property_details.property_area AS PropertyArea,
		property_details.property_floor AS Floor,
		property_details.property_availablefrom AS Availabledate,
		property_details.property_created AS Postedon,
		property_details.property_verify,
		property_details.property_area_type AS Areatype,
		property_details.plotsize_IDFK AS Plotsize,
		property_details.plotage_IDFK AS Plotage,
		property_details.userIDFK AS Userid,

		plottype.plottype_name AS Plottype,
		bhk.bhk AS BHK,
		bathroom.bathroom AS Bathroom,
		balcony.balcony AS Balcony,
		city.city_name AS City,
		locality.locality_name AS Locality,
		property_type.property_type AS PropertyType,
		ownership.ownership_status AS Ownership,
		tenants.tenant_type AS Tenants,
		furnish.furnish_name AS Furnish
		
		FROM

		`property_details`
		
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK

		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK

		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK

		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK

		LEFT JOIN
		tenants ON tenants.tenant_IDPK = property_details.property_tenantIDFK

		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		LEFT JOIN
		balcony ON balcony.balcony_IDPK = property_details.property_balcony
		LEFT JOIN
		plottype ON plottype.plottype_IDPK = property_details.plottype_IDFK
		 
		where  property_details.property_delete_status=0
		AND property_details.property_verify=0
		$dataBasecityId
		$dataBaselocalityId
		$dataBaseregionid
		$dataBasetypeid
		$dataBasebedroom
		$dataBasebathroom
		$dataBaseownership
		$dataBasefurnish
		$dataBasebetweenprice
		$dataBasetenant
		$databasebetweendate
		ORDER BY `property_details`.`property_IDPK`  DESC 
		LIMIT $limit,$limitrows";
		
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		// print_r($result);exit;
		return $result;
	}

	public function getlistingscount($city="",$localityId="",$regionid="",$propertyage="",$typeid="",$bedroom="",$bathroom="",$ownership="",$furnish="",$minprice="",$maxprice="",$tenant="",$fromdate="",$todate="")
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		/*based on city*/
		if(isset($city) && !empty($city) && $city != "NULL" && $city != 0  && $city != "null" )
		{
			
			$dataBasecityId = "and property_details.property_cityIDFK=$city";
				
		}else {
		$dataBasecityId = "";
		}
		
		/*based on localityId*/
		if(isset($localityId) && !empty($localityId) && $localityId != "NA" && $localityId != 0 )
		{
		$dataBaselocalityId = "and property_details.property_localityIDFK = $localityId";
		} else {
		$dataBaselocalityId = "";
		}

		// based on regionid
		if(isset($regionid) && !empty($regionid) && $regionid != "NA" && $regionid != 0 ){
			
			$dataBaseregionid = "and property_details.property_regionIDFK = $regionid";
			} else {
			$dataBaseregionid = "";
			}

		// Based on Property Type
		if(isset($typeid) && !empty($typeid) && $typeid != "NA" && $typeid != 0 ){
			
			$dataBasetypeid = "and property_details.property_typeIDFK = $typeid";
			} else {
			$dataBasetypeid = "";
			}
		
		/*based on bedroom*/
		if(isset($bedroom) && !empty($bedroom) && $bedroom != "NA" && $bedroom != 0 ){
			$dataBasebedroom = "and property_details.property_bhk = $bedroom";	
		} else {
		$dataBasebedroom = "";
		}

		/*based on bathroom*/
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NA" && $bathroom != 0 ){
			$dataBasebathroom = "and property_details.property_bathroom = $bathroom";	
		} else {
		$dataBasebathroom = "";
		}

		/*based on ownership*/
		if(isset($ownership) && !empty($ownership) && $ownership != "NA" && $ownership != 0 ){
			$dataBaseownership = "and property_details.property_ownershipIDFK = $ownership";	
		} else {
		$dataBaseownership = "";
		}

		/*based on furnish*/
		if(isset($furnish) && !empty($furnish) && $furnish != "NA" && $furnish != 0 ){
			$dataBasefurnish = "and property_details.property_furnishIDFK = $furnish";	
		} else {
		$dataBasefurnish = "";
		}

		// based on price
		if(isset($minprice) && !empty($minprice) && $minprice != "NA" && $minprice != 0 && ($maxprice) && !empty($maxprice) && $maxprice != "NA" && $maxprice != 0 )
			{
			$dataBasebetweenprice = "and property_details.property_rent BETWEEN $minprice AND $maxprice";
			}else 
			{
			$dataBasebetweenprice = "";
			}

		/*based on tenant*/
		if(isset($tenant) && !empty($tenant) && $tenant != "NA" && $tenant != 0 ){
			$dataBasetenant = "and property_details.property_tenantIDFK = $tenant";	
		} else {
		$dataBasetenant = "";
		}

		// based on available date
		if(isset($fromdate) && !empty($fromdate) && $fromdate != "NA" && $fromdate != 0 && ($todate) && !empty($todate) && $todate != "NA" && $todate != 0 )
		{
			$databasebetweendate = "and property_details.property_availablefrom BETWEEN $fromdate AND $todate";
		}else if(isset($fromdate) && !empty($fromdate) && $fromdate != "NA" && $fromdate != 0){
			$databasebetweendate = "and property_details.property_availablefrom >= '$fromdate'";
		}else{
			$databasebetweendate = "";
		}

		$sql_select = "
		SELECT
		city.city_name AS City,
		count(*) as PropertyCounts
		
		FROM

		`property_details`
		
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK

		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK

		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK

		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK

		LEFT JOIN
		tenants ON tenants.tenant_IDPK = property_details.property_tenantIDFK

		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		LEFT JOIN
		balcony ON balcony.balcony_IDPK = property_details.property_balcony
		 
		where  property_details.property_delete_status=0
		AND property_details.property_verify=0
		$dataBasecityId
		$dataBaselocalityId
		$dataBaseregionid
		$dataBasetypeid
		$dataBasebedroom
		$dataBasebathroom
		$dataBaseownership
		$dataBasefurnish
		$dataBasebetweenprice
		$dataBasetenant
		$databasebetweendate
		ORDER BY `property_details`.`property_IDPK`  ASC";
		
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		// print_r($result);exit;
		return $result;
	}

	public function addlisting($userid="",$propname="",$proprent="",$maintanence="",$totalfloor="",$propfloor="",$doorface="",$city="",$locality="",$proptype="",$buildtype="",$propfurnish="",$propownership="",$propageyear="",$propagemonth="",$brokerage="",$Propaddress="",$zipcode="",$descrip="",$bhk="",$bathroom="",$balcony="",$area="",$areatype="",$openparking="",$coveredparking="",$watersupply="",$amenity="",$facility="",$nearby="",$nearbydetails="",$plottype="",$plotsize="",$plotage="",$parking="",$deposit="",$availabledate="",$tenant="",$builderid="")
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		
		if(isset($propname) && !empty($propname))
		{
			$propertynamedb = $propname;
		}else{
			$propertynamedb = "";
			// return "Parameterissue";
		}
		if(isset($proprent) && !empty($proprent) && $proprent != "NULL" && $proprent != "null" )
		{
			$propertypricedb = $proprent;	
		}else{
			$propertypricedb = Null;
			// return "Parameterissue";
		}
		if(isset($maintanence) && !empty($maintanence) && $maintanence != "NULL"  && $maintanence != "null" )
		{
			$maintanencedb = $maintanence;	
		}else{
			$maintanencedb = Null;
			// return "Parameterissue";
		}
		if(isset($totalfloor) && !empty($totalfloor) && $totalfloor != "NULL"  && $totalfloor != "null" )
		{
			$totalfloordb = $totalfloor;	
		}else{
			$totalfloordb = Null;
			// return "Parameterissue";
		}
		if(isset($propfloor) && !empty($propfloor) && $propfloor != "NULL"  && $propfloor != "null" )
		{
			$propfloordb = $propfloor;	
		}else{
			$propfloordb = Null;
			// return "Parameterissue";
		}
		if(isset($doorface) && !empty($doorface))
		{
			$doorfacedb = $doorface;	
		}else{
			$doorfacedb = Null;
			// return "Parameterissue";
		}
		if(isset($city) && !empty($city) && $city != "NULL" && $city != "null" )
		{
			$citydb = $city;	
		}else{
			$citydb = Null;
			// return "Parameterissue";
		}
		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$locality_query = mysqli_query($conn,"SELECT * FROM `locality` WHERE `locality_name` = '$locality'");
		$locality_rows = mysqli_num_rows($locality_query);
		$localityrow = mysqli_fetch_array($locality_query);

		if($locality_rows == 1)
		{
			$localitydb = $localityrow['locality_IDPK'];
		}
		else if($locality_rows == 0 || (isset($locality) && !empty($locality) && $locality!="null"))
		{
			$datas = array(
				'locality_name'=>$locality,
				'locality_cityIDFK'=>$city,
				'locality_created'=>$date);
				$this->db->insert('locality',$datas);
				$lastinsertid = $this->db->insert_id();
				$localitydb = $lastinsertid;
		}

		if(isset($proptype) && !empty($proptype) && $proptype != "NULL" && $proptype != "null" )
		{
			$proptypedb = $proptype;	
		}else{
			$proptypedb = Null;
			// return "Parameterissue";
		}
		if(isset($buildtype) && !empty($buildtype) && $buildtype != "NULL" && $buildtype != "null" )
		{
			$buildtypedb = $buildtype;	
		}else{
			$buildtypedb = Null;
			// return "Parameterissue";
		}
		if(isset($propstatus) && !empty($propstatus) && $propstatus != "NULL" && $propstatus != "null" )
		{
			$propstatusdb = $propstatus;	
		}else{
			$propstatusdb = Null;
			// return "Parameterissue";
		}
		if(isset($propfurnish) && !empty($propfurnish) && $propfurnish != "NULL" && $propfurnish != "null" )
		{
			$propfurnishdb = $propfurnish;	
		}else{
			$propfurnishdb = Null;
			// return "Parameterissue";
		}
		if(isset($propownership) && !empty($propownership) && $propownership != "NULL" && $propownership != "null" )
		{
			$propownershipdb = $propownership;	
		}else{
			$propownershipdb = Null;
			// return "Parameterissue";
		}

		if(isset($brokerage) && !empty($brokerage) && $brokerage != "NULL" && $brokerage != "null" )
		{
			$brokeragedb = $brokerage;	
		}else{
			$brokeragedb = Null;
		}
		if(isset($Propaddress) && !empty($Propaddress))
		{
			$Propaddressdb = $Propaddress;	
		}else{
			$Propaddressdb = Null;
			// return "Parameterissue";
		}
		if(isset($zipcode) && !empty($zipcode) && $zipcode != "NULL" && $zipcode != "null" )
		{
			$zipcodedb = $zipcode;	
		}else{
			$zipcodedb = Null;
		}
		if(isset($descrip) && !empty($descrip))
		{
			$descripdb = $descrip;	
		}else{
			$descripdb = Null;
			// return "Parameterissue";
		}
		if(isset($bhk) && !empty($bhk) && $bhk != "NULL" && $bhk != "null" )
		{
			$bhkdb = $bhk;	
		}else{
			$bhkdb = Null;
			// return "Parameterissue";
		}
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NULL" && $bathroom != "null" )
		{
			$bathroomdb = $bathroom;	
		}else{
			$bathroomdb = Null;
			// return "Parameterissue";
		}
		if(isset($balcony) && !empty($balcony) && $balcony != "NULL"  && $balcony != "null" )
		{
			$balconydb = $balcony;	
		}else{
			$balconydb = Null;
		}
		if(isset($area) && !empty($area) && $area != "NULL" && $area != "null" )
		{
			$areadb = $area;	
		}else{
			$areadb = Null;
			// return "Parameterissue";
		}
		if(isset($areatype) && !empty($areatype))
		{
			$areatypedb = $areatype;	
		}else{
			$areatypedb = Null;
			// return "Parameterissue";
		}
		if(isset($openparking) && !empty($openparking) && $openparking != "NULL" && $openparking != "null" )
		{
			$openparkingdb = $openparking;	
		}else{
			$openparkingdb = Null;
		}
		if(isset($coveredparking) && !empty($coveredparking) && $coveredparking != "NULL" && $coveredparking != "null" )
		{
			$coveredparkingdb = $coveredparking;	
		}else{
			$coveredparkingdb = Null;
		}
		
		if(isset($watersupply) && !empty($watersupply))
		{
			$watersupplydb = $watersupply;	
		}else{
			$watersupplydb = Null;
			// return "Parameterissue";
		}
		if(isset($nearbydetails) && !empty($nearbydetails))
		{
			$nearbydetailsdb = $nearbydetails;	
		}else{
			$nearbydetailsdb = Null;
			// return "Parameterissue";
		}
		if(isset($plottype) && !empty($plottype) && $plottype != "NULL" && $plottype != "null" )
		{
			$plottypedb = $plottype;	
		}else{
			$plottypedb = Null;
		}
		if(isset($plotsize) && !empty($plotsize) && $plotsize != "NULL" && $plotsize != "null" )
		{
			$plotsizedb = $plotsize;	
		}else{
			$plotsizedb = Null;
		}
		if(isset($plotage) && !empty($plotage) && $plotage != "NULL" && $plotage != "null" )
		{
			$plotagedb = $plotage;	
		}else{
			$plotagedb = Null;
		}
		if(isset($parking) && !empty($parking) && $parking != "NULL" && $parking != "null" )
		{
			$parkingdb = $parking;	
		}else{
			$parkingdb = Null;
		}
		if(isset($deposit) && !empty($deposit) && $deposit != "NULL" && $deposit != "null" )
		{
			$depositdb = $deposit;	
		}else{
			$depositdb = Null;
		}
		if(isset($availabledate) && !empty($availabledate) && $availabledate != "NULL" && $availabledate != "null" )
		{
			$availabledatedb = $availabledate;	
		}else{
			$availabledatedb = Null;
		}
		if(isset($tenant) && !empty($tenant) && $tenant != "NULL" && $tenant != "null" )
		{
			$tenantdb = $tenant;
		}else{
			$tenantdb = Null;
		}
		if(isset($propageyear) && !empty($propageyear) && $propageyear != "NULL" && $propageyear != "null" )
		{
			$propageyeardb = $propageyear;	
		}else{
			$propageyeardb = NULL;
		}
		if(isset($propagemonth) && $propagemonth != "NULL" && $propagemonth != "null" )
		{
			$propagemonthdb = $propagemonth;	
		}else{
			$propagemonthdb = NULL;
		}
		if(isset($builderid) && !empty($builderid) && $builderid != "NULL" && $builderid != "null" )
		{
			$builderiddb = $builderid;	
		}else{
			$builderiddb = NULL;
		}

		$date= date('Y-m-d H:i:s');
		$data = array(
				'userIDFK' =>$userid,
				'property_name' =>$propertynamedb,
				'property_rent' =>$propertypricedb,
				'property_buliderIDFK' =>$builderiddb,
				'property_deposit' =>$depositdb,
				'property_tenantIDFK' =>$tenantdb,
				'property_availablefrom' =>$availabledatedb,
				'property_maintanence_charges'=>$maintanencedb,
				'total_floor'=>$totalfloordb,
				'property_floor'=>$propfloordb,
				'property_door_facing'=>$doorfacedb,
				'property_cityIDFK'=>$citydb,
				'property_localityIDFK'=>$localitydb,
				'property_typeIDFK'=>$proptypedb,
				'building_typeIDFK'=>$buildtypedb,
				'property_regionIDFK'=>NULL,
				'property_statusIDFK'=>$propstatusdb,
				'property_furnishIDFK'=>$propfurnishdb,
				'property_ownershipIDFK'=>$propownershipdb,
				'brokerage_charges'=>$brokeragedb,
				'property_address'=>$Propaddressdb,
				'property_zipcode'=>$zipcodedb,
				'property_description'=>$descripdb,
				'nearbydetails_description'=>$nearbydetailsdb,
				'property_bhk'=>$bhkdb,
				'property_bathroom'=>$bathroomdb,
				'property_balcony'=>$balconydb,
				'property_area'=>$areadb,
				'property_area_type'=>$areatypedb,
				'parking'=>$parkingdb,
				'property_watersupply'=>$watersupplydb,
				'plottype_IDFK'=>$plottypedb,
				'plotsize_IDFK'=>$plotsizedb,
				'plotage_IDFK'=>$plotagedb,
				'property_verify'=>'1',
				'property_delete_status'=>'0',
				'property_updated'=>$date,
				'property_created'=>$date
		);
		$this->db->insert('property_details',$data);
		$lastinsertid = $this->db->insert_id();
		if((isset($propageyeardb) && $propageyeardb != NULL) || isset($propagemonthdb) && $propagemonthdb != NULL)
		{
			$data = array(
				'propertyage_year'=>$propageyeardb,
				'propertyage_month'=>$propagemonthdb,
				'property_IDFK'=>$lastinsertid,
				'created_date'=>$date);
				$this->db->insert('property_age',$data);
		}

		$data = array(
			'open_parking'=>$openparkingdb,
			'covered_parking'=>$coveredparkingdb,
			'properties_IDFK'=>$lastinsertid,
			'created_date'=>$date);
			$this->db->insert('parking_details',$data);

		if(isset($amenity) && !empty($amenity) && $amenity != "NULL" && $amenity != 0  && $amenity != "null" )
		{
			foreach (explode(',',$amenity) as $piece)
			{
				$data = array(
					'amenities_IDFK'=>$piece,
					'properties_IDFK'=>$lastinsertid,
					'created_date'=>$date);
					$this->db->insert('amenities_details',$data);
			}	
		}
		if(isset($facility) && !empty($facility) && $facility != "NULL" && $facility != 0  && $facility != "null" )
		{
			foreach (explode(',',$facility) as $piece){
				$data = array(
					'facilities_IDFK'=>$piece,
					'properties_IDFK'=>$lastinsertid,
					'created_date'=>$date);
					$this->db->insert('facilities_details',$data);
			}	
		}
		if(isset($nearby) && !empty($nearby) && $nearby != "NULL" && $nearby != 0  && $nearby != "null" )
		{
			foreach (explode(',',$nearby) as $piece){
				$data = array(
					'nearby_IDFK'=>$piece,
					'properties_IDFK'=>$lastinsertid,
					'created_date'=>$date);
					$this->db->insert('nearby_details',$data);
			}	
		}
		return $lastinsertid;
	}

	public function insertImg($propid,$finalcovername)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$data = array(
			'property_coverimage' =>$finalcovername
			);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $data);
			return 1;
	}

	public function insertgalleryimages($galleryfile_name,$propid)
	{
		$date = date('Y-m-d H:i:s');
		$this->db = $this->load->database('rentaldb', TRUE);
		$data = array(
			'images_name' =>$galleryfile_name,		
			'property_IDFK' =>$propid,	
			'added_date' =>$date
			);
		$this->db->insert('property_images',$data);
		return 1;
	}

	public function updatelisting($data)
	{
		$propid = $data['Propid'];
		$userid = $data['Userid'];
		$nearby = $data['Nearby'];
		$amenity = $data['Amenities'];
		$facility = $data['Facilities'];
		$propstatus = $data['Status'];
		$brokerage = $data['BrokerageCharge'];
		$plottype = $data['PlotType'];
		$plotsize = $data['PlotSize'];
		$plotage = $data['PlotAge'];
		$propageyear = $data['PropertyAgeYear'];
		$propagemonth = $data['PropertyAgeMonth'];
		$builderid = $data['BuilderID'];
		$locality = $data['Locality'];
		$totalfloor = $data['Totalfloor'];
		$propfloor = $data['Propertyfloor'];
		$propfurnish = $data['Furnish'];
		$bhk = $data['BHK'];
		$bathroom = $data['Bathroom'];
		$balcony = $data['Balcony'];

		$this->db = $this->load->database('rentaldb', TRUE);
		$dbconn = new defaultdb3();
        $conn = $dbconn->connect();
		$sql_query = mysqli_query($conn,"SELECT * FROM `property_details` WHERE `property_IDPK` = '$propid' AND `userIDFK` = '$userid'");
		$num_rows = mysqli_num_rows($sql_query);
		$row = mysqli_fetch_array($sql_query);

		$parking_query = mysqli_query($conn,"SELECT * FROM `parking_details` WHERE `properties_IDFK` = '$propid'");
		$parking_rows = mysqli_num_rows($parking_query);
		$parkingrow = mysqli_fetch_array($parking_query);

		$propage_query = mysqli_query($conn,"SELECT * FROM `property_age` WHERE `property_IDFK` = '$propid'");
		$propage_rows = mysqli_num_rows($propage_query);
		$propagerow = mysqli_fetch_array($propage_query);

		$locality_query = mysqli_query($conn,"SELECT * FROM `locality` WHERE `locality_name` = '$locality'");
		$locality_rows = mysqli_num_rows($locality_query);
		$localityrow = mysqli_fetch_array($locality_query);

		if($locality_rows == 1)
		{
			$localitydb = $localityrow['locality_IDPK'];
		}
		else if($locality_rows == 0 || (isset($locality) && !empty($locality) && $locality!="null"))
		{
			$datas = array(
				'locality_name'=>$locality,
				'locality_cityIDFK'=>$data['City'],
				'locality_created'=>$date);
				$this->db->insert('locality',$datas);
				$lastinsertid = $this->db->insert_id();
				$localitydb = $lastinsertid;
		}

		if(isset($propstatus) && !empty($propstatus) && $propstatus != "NULL" && $propstatus != "null" )
		{
			$propstatusdb = $propstatus;	
		}else{
			$propstatusdb = Null;
		}
		if(isset($brokerage) && !empty($brokerage) && $brokerage != "NULL" && $brokerage != "null" )
		{
			$brokeragedb = $brokerage;	
		}else{
			$brokeragedb = NULL;
		}
		if(isset($plottype) && !empty($plottype) && $plottype != "NULL" && $plottype != 0  && $plottype != "null" )
		{
			$plottypedb = $plottype;	
		}else{
			$plottypedb = NULL;
		}
		if(isset($plotsize) && !empty($plotsize) && $plotsize != "NULL" && $plotsize != 0  && $plotsize != "null" )
		{
			$plotsizedb = $plotsize;	
		}else{
			$plotsizedb = NULL;
		}
		if(isset($plotage) && !empty($plotage) && $plotage != "NULL" && $plotage != "null" )
		{
			$plotagedb = $plotage;	
		}else{
			$plotagedb = NULL;
		}
		if(isset($propageyear) && !empty($propageyear) && $propageyear != "NULL" && $propageyear != "null" )
		{
			$propageyeardb = $propageyear;	
		}else{
			$propageyeardb = NULL;
		}
		if(isset($propagemonth) && !empty($propagemonth) && $propagemonth != "NULL" && $propagemonth != "null" )
		{
			$propagemonthdb = $propagemonth;	
		}else{
			$propagemonthdb = NULL;
		}
		if(isset($builderid) && !empty($builderid) && $builderid != "NULL" && $builderid != "null" )
		{
			$builderiddb = $builderid;
		}else{
			$builderiddb = NULL;
		}
		if(isset($totalfloor) && !empty($totalfloor) && $totalfloor != "NULL" && $totalfloor != "null" )
		{
			$totalfloordb = $totalfloor;	
		}else{
			$totalfloordb = Null;
		}
		if(isset($propfloor) && !empty($propfloor) && $propfloor != "NULL" && $propfloor != "null" )
		{
			$propfloordb = $propfloor;	
		}else{
			$propfloordb = Null;
		}
		if(isset($propfurnish) && !empty($propfurnish) && $propfurnish != "NULL" && $propfurnish != 0  && $propfurnish != "null" )
		{
			$propfurnishdb = $propfurnish;	
		}else{
			$propfurnishdb = NULL;
		}
		if(isset($bhk) && !empty($bhk) && $bhk != "NULL" && $bhk != 0  && $bhk != "null" )
		{
			$bhkdb = $bhk;	
		}else{
			$bhkdb = NULL;
		}
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NULL" && $bathroom != "null" )
		{
			$bathroomdb = $bathroom;	
		}else{
			$bathroomdb = NULL;
		}
		if(isset($balcony) && !empty($balcony) && $balcony != "NULL" && $balcony != "null" )
		{
			$balconydb = $balcony;	
		}else{
			$balconydb = NULL;
		}


		if($num_rows == 1)
		{
			$date= date('Y-m-d H:i:s');
			$datas = array(
				'property_name' =>$data['Propertyname'],
				'property_buliderIDFK' =>$builderiddb,
				'property_rent' =>$data['Rent'],
				'property_maintanence_charges'=>$data['Maintanencecharge'],
				'total_floor'=>$totalfloordb,
				'property_floor'=>$propfloordb,
				'property_door_facing'=>$data['Doorfacing'],
				'property_cityIDFK'=>$data['City'],
				'property_localityIDFK'=>$localitydb,
				'property_typeIDFK'=>$data['PropertyType'],
				'building_typeIDFK'=>$data['BuildingType'],
				'property_statusIDFK'=>$propstatusdb,
				'property_furnishIDFK'=>$propfurnishdb,
				'property_ownershipIDFK'=>$data['Ownership'],
				'brokerage_charges'=>$brokeragedb,
				'property_address'=>$data['Address'],
				'property_zipcode'=>$data['Zipcode'],
				'property_description'=>$data['Description'],
				'nearbydetails_description'=>$data['Nearbydetails'],
				'property_bhk'=>$bhkdb,
				'property_bathroom'=>$bathroomdb,
				'property_balcony'=>$balconydb,
				'property_area'=>$data['Area'],
				'property_area_type'=>$data['AreaType'],
				'parking'=>$data['Parking'],
				'property_watersupply'=>$data['Watersupply'],
				'plottype_IDFK'=>$plottypedb,
				'plotsize_IDFK'=>$plotsizedb,
				'plotage_IDFK'=>$plotagedb,
				'property_verify'=>'1',
				'property_delete_status'=>'0',
				'property_updated'=>$date
			);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);

			if($parking_rows == 1)
			{
				$datas = array(
					'open_parking'=>$data['Openparking'],
					'covered_parking'=>$data['Coveredparking']);
					$this->db->where('properties_IDFK',$propid);
					$this->db->update('parking_details', $datas);
			}
			else if($parking_rows == 0 || (isset($data['Openparking']) && !empty($data['Openparking']) && $data['Openparking']!="null") || (isset($data['Coveredparking']) && !empty($data['Coveredparking']) && $data['Coveredparking']!="null"))
			{
				$datas = array(
					'open_parking'=>$data['Openparking'],
					'covered_parking'=>$data['Coveredparking'],
					'properties_IDFK'=>$propid,
					'created_date'=>$date);
					$this->db->insert('parking_details',$datas);
			}

			if($propage_rows == 1)
			{
				$datas = array(
					'propertyage_year'=>$propageyeardb,
					'propertyage_month'=>$propagemonthdb);
					$this->db->where('property_IDFK',$propid);
					$this->db->update('property_age', $datas);
			}
			else if($propage_rows == 0 || (isset($propageyeardb) && !empty($propageyeardb) && $propageyeardb!="null"))
			{
				
				$datas = array(
					'propertyage_year'=>$propageyeardb,
					'propertyage_month'=>$propagemonthdb,
					'property_IDFK'=>$propid,
					'created_date'=>$date);
					$this->db->insert('property_age',$datas);
			}

			if(isset($data['Amenities']) && !empty($data['Amenities']) && $data['Amenities']!="null")
			{
				$this->db->where('properties_IDFK', $propid);
				$this->db->delete('amenities_details');
				foreach (explode(',',$amenity) as $piece)
				{
					$datas = array(
						'amenities_IDFK'=>$piece,
						'properties_IDFK'=>$propid,
						'created_date'=>$date);
						$this->db->insert('amenities_details',$datas);
				}
			}
			
			if(isset($data['Facilities']) && !empty($data['Facilities']) && $data['Facilities']!="null")
			{
				$this->db->where('properties_IDFK', $propid);
				$this->db->delete('facilities_details');
				foreach (explode(',',$facility) as $piece)
				{
					$datas = array(
						'facilities_IDFK'=>$piece,
						'properties_IDFK'=>$propid,
						'created_date'=>$date);
						$this->db->insert('facilities_details',$datas);
				}
			}
			
			if(isset($data['Nearby']) && !empty($data['Nearby']) && $data['Nearby']!="null")
			{
				$this->db->where('properties_IDFK', $propid);
				$this->db->delete('nearby_details');
				foreach (explode(',',$nearby) as $piece)
				{
					$datas = array(
						'nearby_IDFK'=>$piece,
						'properties_IDFK'=>$propid,
						'created_date'=>$date);
						$this->db->insert('nearby_details',$datas);
				}
			}
			return 1;
		}
		else
		{
			return 0;
		}
	}

	public function propertydelete($userid,$propid)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_delete_status'=>'1',
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}

	public function coverimageupdate($userid,$propid,$finalcovername)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_coverimage'=>$finalcovername,
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}

	public function galleryimageremoval($imageid)
	{
		    $this->db = $this->load->database('rentaldb', TRUE);
			$this->db->where('images_IDPK',$imageid);
			$this->db->delete('property_images');
			return true;
	}

	public function getedituserproperty($userid,$propid)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "
		SELECT 
		property_details.property_name AS Propertyname,
		property_details.property_rent AS Rent,
		property_details.property_maintanence_charges AS Maintanencecharge,
		property_details.property_deposit AS Deposit,
		property_details.total_floor AS Totalfloor,
		property_details.property_floor AS Floor,
		property_details.brokerage_charges AS Brokerage,
		property_details.property_address AS Address,
		property_details.property_zipcode AS Zipcode,
		property_details.property_description AS description,
		property_details.nearbydetails_description AS Neardescription,
		property_details.property_area AS Area,
		property_details.property_area_type AS Areatype,
		property_details.property_watersupply AS Watersupply,
		property_details.property_coverimage AS Coverimage,
		property_details.plotage_IDFK AS Plotage,
		property_details.property_verify AS Verification,
		property_details.property_door_facing AS doorfaceID,
		property_details.property_cityIDFK AS CityID,
		property_details.property_localityIDFK AS LocalityID,
		locality.locality_name AS Locality,
		property_details.property_typeIDFK AS TypeID,
		property_details.building_typeIDFK AS BuildingtypeID,
		property_details.property_regionIDFK AS RegionNameID,
		property_details.property_statusIDFK AS StatusID,
		property_details.property_furnishIDFK AS FurnishID,
		property_details.property_ownershipIDFK AS OwnershipID,
		property_details.property_bhk AS BHKID,
		property_details.property_bathroom AS BathroomID,
		property_details.property_balcony AS BalconyID,
		property_details.parking AS ParkingID,
		property_details.plottype_IDFK AS PlottypeID,
		property_details.plotsize_IDFK AS PlotsizeID,
		property_age.propertyage_year AS PropertyageYear,
		property_age.propertyage_month AS PropertyageMonth,
		parking_details.open_parking AS Openparking,
		parking_details.covered_parking AS Coveredparking,
		property_details.property_availablefrom AS Availabledate,
		property_details.property_tenantIDFK AS TenantID,
		property_details.property_buliderIDFK AS Builderid,
		tenants.tenant_type AS Tenant,
		doorfacing.doorfacing_names AS doorface,
		city.city_name AS City,
		property_type.property_type AS Type,
		building_type.building_typeName AS Buildingtype,
		regions.region_name AS RegionName,
		furnish.furnish_name AS Furnish,
		ownership.ownership_status AS Ownership,
		bhk.bhk AS BHK,
		bathroom.bathroom AS Bathroom,
		balcony.balcony AS Balcony,
		parking.parking_type AS Parking,
		plottype.plottype_name AS Plottype

		FROM
		`property_details`

		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		building_type ON building_type.building_typeIDPK = property_details.building_typeIDFK
		LEFT JOIN
		regions ON regions.region_id = property_details.property_regionIDFK
		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		LEFT JOIN
		balcony ON balcony.balcony_IDPK = property_details.property_balcony
		LEFT JOIN
		parking ON parking.parking_IDPK = property_details.parking
		LEFT JOIN
		plottype ON plottype.plottype_IDPK = property_details.plottype_IDFK
		LEFT JOIN
		doorfacing ON doorfacing.doorfacing_IDPK = property_details.property_door_facing
		LEFT JOIN
		parking_details ON parking_details.properties_IDFK = property_details.property_IDPK
		LEFT JOIN
		property_age ON property_age.property_IDFK = property_details.property_IDPK
		LEFT JOIN
		tenants ON tenants.tenant_IDPK = property_details.property_tenantIDFK

		WHERE
		property_details.property_IDPK = '$propid' AND property_details.userIDFK = '$userid'
		";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

	public function getuserlistings($userid)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "
		SELECT 
		property_details.property_IDPK AS PropertyID,
		property_details.property_name AS Propertyname,
		property_details.property_rent AS Rent,
		property_details.property_maintanence_charges AS Maintanencecharge,
		property_details.total_floor AS Totalfloor,
		property_details.property_floor AS Floor,
		property_details.property_address AS Address,
		property_details.property_description AS description,
		property_details.property_area AS Area,
		property_details.property_area_type AS Areatype,
		property_details.property_coverimage AS Coverimage,
		property_details.plotage_IDFK AS Plotage,
		property_details.property_verify AS Verification,
		property_details.property_delete_status AS Deletion,
		city.city_name AS City,
		locality.locality_name AS Locality,
		property_type.property_type AS Type,
		building_type.building_typeName AS Buildingtype,
		ownership.ownership_status AS Ownership,
		bhk.bhk AS BHK,
		rejection_details.rejection_reason as Rejectreason

		FROM
		`property_details`

		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		building_type ON building_type.building_typeIDPK = property_details.building_typeIDFK
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		rejection_details ON rejection_details.property_IDFK = property_details.property_IDPK

		WHERE
		property_details.userIDFK = '$userid'
		";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

 // ============== Rentallist =============

 public function getrentalrequests()
 {
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT
	property_details.property_IDPK,
	property_details.property_name AS Propertyname,
	city.city_name AS Cityname,
	locality.locality_name AS Localityname,
	property_details.property_localityIDFK,
	property_details.property_cityIDFK,
	property_details.property_verify,
	property_details.userIDFK,
	property_coverimage as property_img,
	property_details.property_created
	from 
	`property_details`
	LEFT JOIN
	city ON city.city_IDPK = property_details.property_cityIDFK
	left JOIN
	locality ON locality.locality_IDPK = property_details.property_localityIDFK
	where
	property_details.property_verify = '1' and property_details.property_delete_status = '0'
	order by property_IDPK DESC
	";
	
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		
		return $result;

			
 }


 // ============== Rentallist =============
 // =================rentalist=====================

 public function getusername1($userid)
 {
	$this->db = $this->load->database('default', TRUE);
	$sql_select = "SELECT 
	registration.user_name,
	registration.last_name
	from
	`registration`
	where
	registration.reg_IDPK = '$userid'";
	$query_select = $this->db->query($sql_select);
	$result=$query_select->result();
	// print_r($result);
	return $result;
 }

 // ===================rentalist===================
 public function approvedrentalists()
 {
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT
	property_details.property_IDPK,
	property_details.property_name AS Propertyname,
	city.city_name AS Cityname,
	locality.locality_name AS Localityname,
	property_details.property_localityIDFK,
	property_details.property_cityIDFK,
	property_details.property_verify,
	property_details.userIDFK,
	property_details.property_created
	from 
	`property_details`
	LEFT JOIN
	city ON city.city_IDPK = property_details.property_cityIDFK
	left JOIN
	locality ON locality.locality_IDPK = property_details.property_localityIDFK
	where
	property_details.property_verify = '0'
	order by property_IDPK DESC
	";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
 }

 
public function rejectedrentallists()
{
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT
	property_details.property_IDPK,
	property_details.property_name AS Propertyname,
	city.city_name AS Cityname,
	locality.locality_name AS Localityname,
	property_details.property_localityIDFK,
	property_details.property_cityIDFK,
	property_details.property_verify,
	property_details.userIDFK,
	rejection_details.rejection_reason as rejectreason,
	property_details.property_created
	from 
	`property_details`
	LEFT JOIN
	city ON city.city_IDPK = property_details.property_cityIDFK
	LEFT JOIN
	rejection_details ON rejection_details.property_IDFK = property_details.property_IDPK
	left JOIN
	locality ON locality.locality_IDPK = property_details.property_localityIDFK
	where
	property_details.property_verify = '2'
	order by property_IDPK DESC
	";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
}


public function approvedrentalrentallist()
{
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT
	property_details.property_IDPK,
	property_details.property_name AS Propertyname,
	city.city_name AS Cityname,
	locality.locality_name AS Localityname,
	property_details.property_localityIDFK,
	property_details.property_cityIDFK,
	property_details.property_verify,
	property_details.userIDFK,
	property_details.property_created
	from 
	`property_details`
	LEFT JOIN
	city ON city.city_IDPK = property_details.property_cityIDFK
	left JOIN
	locality ON locality.locality_IDPK = property_details.property_localityIDFK
	where
	property_details.property_verify = '0'
	order by property_IDPK DESC
	";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
}


public function get_rentallist(){
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT * FROM  property_details";
	$query_select = $this->db->query($sql_select);
	return $query_select->result();
}


// function getrentallists()
// {
// 	$sql_select = "
// 	SELECT
// 	property_details.property_IDPK As PropertyID ,
// 	property_details.property_name,
// 	property_details.property_rent,
// 	property_details.property_maintanence_charge ,
// 	property_details.total_floor ,
// 	property_details.property_floor ,
// 	property_details.property_deposit ,
// 	property_details.property_cityIDFK ,
// 	property_details.property_localityIDFK
// 	FROM
// 	`property_details`
// 	where
// 	property_details.property_details_delete_status=0";
// 	$query_select = $this->db->query($sql_select);
// 	$result=$query_select->result();
// 	return  $result;
// }

function rental_deatail_page($id)
	{
		$sql_select = "
		SELECT
		property_coverimage as Coverimage,
		property_IDPK as Id,
		property_name as name,
	    property_type.property_type as property_type
		FROM 
		`property_details` 
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		
		where property_IDPK='$id'";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
		// print_r(property_type);exit();
	}

	public function getlistingimages($rentalId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT property_images.images_IDPK AS Id,
		property_images.images_name AS name  FROM  property_images
		where property_IDFK=$propId";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->name);exit(); 
		return $query_select->result();
	}


	// =======================added here ===========================

	public function get_location()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$result = mysql_query("SELECT * FROM  city");
		$results= array();
		$index = 0;
		while($row=mysql_fetch_array($result))
	{
		$temp['city'] = $row['city_name'];
		$temp['id'] = $row['city_IDPK'];
    	$results[$index++] = $temp;
	}
		return $results;
	}

	public function get_location1()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  city";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_locality()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  locality";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}


	public function get_bedrooms()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  bhk";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	
	public function get_PropertyType1()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  property_type";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_doortype()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  doorfacing";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_buildtype()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  building_type";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_regions()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  regions";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_furnishtype()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM  furnish";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_ownershiptype1()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM ownership" ;
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_bathrooms()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM bathroom" ;
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_balcony1()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM balcony" ;
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_parking1()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM parking" ;
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_tenantsDetails()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM tenants" ;
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function get_PlotDetails()
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM plottype" ;
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	public function updaterentalimage($filename,$rentalid)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$data = array(
		'property_details'=>$filename
		);
		$this->db->where('property_coverimage',$rentalid);
		$this->db->update('property_details',$data);
		return true;
	}
	public function updaterentalimage2($filename,$rentalid)
	{
		$data = array(
			'property_details'=>$filename
		);
		$this->db->where('property_coverimage',$rentalid);
			$this->db->update('property_details',$data);
			return true;
	}
	public function getpropertyImages($property_IDPK)
	{
		// print_r($rentalID); exit();
		$sql_select = "SELECT property_IDFK AS Id,
		images_name AS name  FROM  property_images
		where property_IDFK = $property_IDPK";
		$query_select = $this->db->query($sql_select);
		// print_r($query_select->result()); exit();
		return $query_select->result();
	}

	
	public function updaterental($rentalid,$data)
	{
		// print_r($data);exit();
		$this->db = $this->load->database('rentaldb', TRUE);
		$id=$data['rentalID'];
		// $date= date('Y-m-d H:i:s');
		// $propname = rtrim($data['property_name']);
		$descript = $data['description'];
		// $descript2 = $data['n_description'];
		$text = preg_replace('/&nbsp;/', ' ', $descript);
		// $text2 = preg_replace('/&nbsp;/', ' ', $descript2);
		if(isset($data['floor']) && !empty($data['floor']) && $data['floor'] != "NULL" && $data['floor'] != "null" )
		{
			$totalfloordb = $data['floor'];	
		}else{
			$totalfloordb = Null;
		}
		if(isset($data['p_floor']) && !empty($data['p_floor']) && $data['p_floor'] != "NULL" && $data['p_floor'] != "null" )
		{
			$propfloordb = $data['p_floor'];	
		}else{
			$propfloordb = Null;
		}
		if(isset($data['furnish']) && !empty($data['furnish']) && $data['furnish'] != "NULL" && $data['furnish'] != 0  && $data['furnish'] != "null" )
		{
			$propfurnishdb = $data['furnish'];	
		}else{
			$propfurnishdb = NULL;
		}
		if(isset($data['bhk']) && !empty($data['bhk']) && $data['bhk'] != "NULL" && $data['bhk'] != 0  && $data['bhk'] != "null" )
		{
			$bhkdb = $data['bhk'];	
		}else{
			$bhkdb = NULL;
		}
		if(isset($data['bathroom']) && !empty($data['bathroom']) && $data['bathroom'] != "NULL" && $data['bathroom'] != "null" )
		{
			$bathroomdb = $data['bathroom'];	
		}else{
			$bathroomdb = NULL;
		}
		if(isset($data['balcony']) && !empty($data['balcony']) && $data['balcony'] != "NULL" && $data['balcony'] != "null" )
		{
			$balconydb = $data['balcony'];	
		}else{
			$balconydb = NULL;
		}
		if(isset($data['maintainance']) && !empty($data['maintainance']) && $data['maintainance'] != "NULL" && $data['maintainance'] != "null" )
		{
			$maintanencechargedb = $data['maintainance'];	
		}else{
			$maintanencechargedb = NULL;
		}
		if(isset($data['plottype1']) && !empty($data['plottype1']) && $data['plottype1'] != "NULL" && $data['plottype1'] != "null" )
		{
			$plottypedb = $data['plottype1'];	
		}else{
			$plottypedb = NULL;
		}
		if(isset($data['build']) && !empty($data['build']) && $data['build'] != "NULL" && $data['build'] != "null" )
		{
			$buildtypedb = $data['build'];	
		}else{
			$buildtypedb = NULL;
		}

		$data = array(
			'property_name' =>$data['property_name'],
			'property_cityIDFK' =>$data['city'],
			'property_typeIDFK' =>$data['type'],
			// 'property_regionIDFK' =>$data['regions'],
			'property_localityIDFK' =>$data['locality'],
			'property_address' =>$data['property_address'],
			// 'property_zipcode' =>$data['property_zipcode'],
			'property_bhk' =>$bhkdb,
			'property_rent' =>$data['property_rent'],
			'property_maintanence_charges' =>$maintanencechargedb,
			'total_floor' =>$totalfloordb,
			'property_floor' =>$propfloordb,
			'property_door_facing' =>$data['door1'],
			'building_typeIDFK' =>$buildtypedb,
			'property_furnishIDFK' =>$propfurnishdb,
			'property_ownershipIDFK' =>$data['owner'],
			'property_bathroom' =>$bathroomdb,
			'property_balcony' =>$balconydb,
			'property_area' =>$data['area'],
			'parking' =>$data['parking'],
			// 'property_watersupply' =>$data['wsupply'],
			'property_availablefrom' =>$data['date'],
			'property_tenantIDFK' =>$data['tenants1'],
			'plottype_IDFK' =>$plottypedb,
			'property_description' =>$text,
			// 'nearbydetails_description' =>$data['n_description'],
		);
		// print_r($descript2);exit();
		$this->db->where('property_IDPK',$rentalid);
		$this->db->update('property_details',$data);
		return true;
	}


	
	function get_propertyById_rental($id)
	{
		
		$sql_select = "

		SELECT
		city.city_name as cityName,
		city.city_IDPK as city,
		plottype.plottype_name,
		property_details.property_IDPK ,
		property_details.property_watersupply ,
		property_details.property_availablefrom ,
		parking.parking_type as Parking ,
		property_details.property_area as area ,
		property_details.property_address AS address,
		property_details.property_zipcode AS zipcode,
		property_details.property_rent AS rent,
		property_details.property_description AS description,
		property_details.nearbydetails_description AS N_description,
		property_details.property_name as propertyName,
		property_details.property_maintanence_charges AS maintainance,
		bhk.bhk AS BHK,
		property_type.property_type as P_type,
		property_details.total_floor AS Floor,
		property_details.property_floor AS P_floor,
		doorfacing.doorfacing_names as Door,
		building_type.building_typeName as BuildType1,
		furnish.furnish_name as furnish_name,
		ownership.ownership_status as ownershiptype1,
		bathroom.bathroom as bathroom,
		balcony.balcony as balcony,
		tenants.tenant_type as Tenants,
		property_details.property_coverimage as coverimage,
		property_images.images_name as galleryImages,
		regions.region_name AS propertyRegionID,
		property_details.property_verify as verify,
		locality.locality_name as Locality
		
		FROM
		`property_details`
		
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		regions ON regions.region_id = property_details.property_regionIDFK	
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		doorfacing ON doorfacing.doorfacing_IDPK = property_details.property_door_facing
		LEFT JOIN
		parking ON parking.parking_IDPK = property_details.parking
		LEFT JOIN
		property_images ON property_images.property_IDFK= property_details.property_IDPK
		LEFT JOIN
		plottype ON plottype.plottype_IDPK = property_details.plottype_IDFK
		LEFT JOIN
		tenants ON tenants.tenant_IDPK = property_details.property_tenantIDFK
		LEFT JOIN
		balcony ON balcony.balcony_IDPK = property_details.property_balcony
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK
		LEFT JOIN
		building_type ON building_type.building_typeIDPK = property_details.building_typeIDFK
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		
		where  property_details.property_IDPK='$id' AND property_details.property_delete_status=0";
				
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

	public function updatePropertyName1($data = array())
	{	
		$id=$data['rentalID'];
		$date= date('Y-m-d H:i:s');
		$propname = rtrim($data['property_name']);
		
		$data = array(
			'property_name' =>$data['property_name'],
			'property_cityIDFK' =>$data['city'],
			'property_typeIDFK' =>$data['type'],
			'property_regionIDFK' =>$data['regions'],
			'property_localityIDFK' =>$data['locality'],
			'property_address' =>$data['property_address'],
			'property_zipcode' =>$data['property_zipcode'],
			'property_bhk' =>$data['bhk'],
			'property_rent' =>$data['property_rent'],
			'property_maintanence_charges' =>$data['maintainance'],
			'total_floor' =>$data['floor'],
			'property_floor' =>$data['p_floor'],
			'property_door_facing' =>$data['door1'],
			'building_typeIDFK' =>$data['build'],
			'property_furnishIDFK' =>$data['furnish'],
			'property_ownershipIDFK' =>$data['owner'],
			'property_bathroom' =>$data['bathroom'],
			'property_balcony' =>$data['balcony'],
			'property_area' =>$data['area'],
			'parking' =>$data['parking'],
			'property_watersupply' =>$data['wsupply'],
			'property_availablefrom' =>$data['date'],
			'property_tenantIDFK' =>$data['tenants1'],
			'plottype_IDFK' =>$data['plottype1'],
			'property_description' =>$data['description'],
			'nearbydetails_description' =>$data['n_description']
			);
			$this->db->where('property_IDPK',$id);
			$this->db->update('property_details', $data);
			return true;
	}

	
	function updateinfographic_alt($altidArr,$alttagArr,$storyId)
	{
		foreach($altidArr as $key => $val)
		{
			if(isset($altidArr[$key]) && !empty($altidArr[$key])){
				$AltID=$altidArr[$key];
				$sql_select = "SELECT * FROM property_details where property_coverimage='$AltID' ";
				$query_select = $this->db->query($sql_select);
				$val=$query_select->result();
				if($val){
					if(isset($alttagArr[$key]) && !empty($alttagArr[$key]))
			{
				$alttag=$alttagArr[$key];
			}		
			else{
				$alttag=$val[0]->property_coverimage;
			}
			$data = array(
				'property_coverimage' =>$alttag
				);
				$this->db->where('property_IDPK',$val[0]->property_IDPK);
				$this->db->update('property_details', $data);
				}
			}
		}
	}


	public function getrentalimages($rentalID)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT property_images.images_IDPK AS Id,
		property_images.images_name AS name  FROM  property_images
		where property_IDFK=$rentalID";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->name);exit(); 
		return $query_select->result();
	}
	
function getProAmenities($rentalID)
{
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "
	SELECT amenities_details.properties_IDFK AS PropertyId, 
	amenities.amenities AS amenities,
	amenities_details.amenities_IDFK AS id,
	amenities.amenities_image AS ImgPath 
	FROM  amenities_details
	LEFT JOIN
	amenities ON amenities.amenities_IDPK = amenities_details.amenities_IDFK
	where amenities_details.properties_IDFK='$rentalID'";
	$query_select = $this->db->query($sql_select);
	return $query_select->result();
}

function getProFacilities($rentalID)
{
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT 
	facilities_details.properties_IDFK AS PropertyId, 
	facilities.facilities AS facilities,
	facilities_details.facilities_IDFK AS id,
	facilities.facilities_image AS ImgPath 
	FROM  facilities_details
	LEFT JOIN
	facilities ON facilities.facilities_IDPK = facilities_details.facilities_IDFK
	where facilities_details.properties_IDFK='$rentalID'";
	$query_select = $this->db->query($sql_select);
	return $query_select->result();
}
function getPronearby($rentalID)
{
	$this->db = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT nearby_details.properties_IDFK AS PropertyId, 
	nearby.nearby_name AS Name
	FROM  nearby_details
	LEFT JOIN
	nearby ON nearby.nearby_IDPK = nearby_details.nearby_IDFK
	where nearby_details.properties_IDFK='$rentalID'";
	$query_select = $this->db->query($sql_select);
	return $query_select->result();
}
	function deleterentalimage($ImgId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$this->db->where('images_IDPK', $ImgId);
		$this->db->delete('property_images');
		return true;
	}
	public function updaterentalcoverImg($filenameval,$rentalID)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'property_coverimage' =>$filenameval,
					'property_updated'=>$date
					);	
					//print_r($data);exit;
					$this->db->where('property_IDPK',$rentalID);
					$this->db->update('property_details', $data);
					return true;
		
	}
	public function updaterentalImgs($filenameval,$imgId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'images_name' =>$filenameval,
					'added_date'=>$date
					);	
					//print_r($data);exit;
					$this->db->where('images_IDPK',$imgId);
					$this->db->update('property_images', $data);
					return true;
		
	}
	function updatealt($altidArr,$alttagArr,$propId)
	{
		
		foreach($altidArr as $key => $val)
		{
			if(isset($altidArr[$key]) && !empty($altidArr[$key])){
				$AltID=$altidArr[$key];
				$this->db = $this->load->database('rentaldb', TRUE);
				$sql_select = "SELECT * FROM property_image where property_image_IDPK='$AltID' and property_image_propertyInfoIDFK ='$rentalId'";
				$query_select = $this->db->query($sql_select);
				$val=$query_select->result();
				if($val){
					if(isset($alttagArr[$key]) && !empty($alttagArr[$key]))
			{
				$alttag=$alttagArr[$key];
			}		
			else{
				$alttag=$val[0]->property_image_alttag;
			}
			$data = array(
				'property_image_alttag' =>$alttag
				);
				$this->db->where('property_image_IDPK',$val[0]->property_image_IDPK);
				$this->db->update('property_image', $data);
				}
			}
		}
	}

	

	public function getlistingamenities()
	{
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT * FROM amenities";
		$query_select = $this->dbrental->query($sql_select);
		return $query_select->result();
	}
	public function getlistingfacilities()
	{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT * FROM facilities";
	$query_select = $this->dbrental->query($sql_select);
	return $query_select->result();
	}
	
function deletenearByPropId($rentalid)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$this->db->where('properties_IDFK', $rentalid);
	$this->db->delete('nearby_details');
	return true;
}
function insertnearby($rentalid,$checkbox)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$data = array(
			'nearby_IDFK' =>$checkbox,
			'properties_IDFK' =>$rentalid	
	);
	$this->db->insert('nearby_details',$data);
	return true;
}
public function insertlistinggalleryImgs($filenameval,$rentalid)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$date= date('Y-m-d H:i:s');
	$data = array(
				'property_IDFK' =>$rentalid,
				'images_name' =>$filenameval,
				'added_date'=>$date
				);	
				//print_r($data);exit;
		$this->db->insert('property_images',$data);
		return true;
}
function deletelistingamenities($rentalid)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$this->db->where('properties_IDFK', $rentalid);
	$this->db->delete('amenities_details');
	return true;
}
function insertlistingamenities($rentalid,$checkbox)
	{
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'amenities_IDFK' =>$checkbox,
				'properties_IDFK' =>$rentalid,
				'created_date'=>$date
		);
		$this->db->insert('amenities_details',$data);
		return true;
	}

	function deletelistingfacilities($rentalid)
	{
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		  $this->db->where('properties_IDFK', $rentalid);
			$this->db->delete('facilities_details');
			return true;
	}
	function insertlistingfacilities($rentalid,$checkbox)
	{
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'facilities_IDFK' =>$checkbox,
				'properties_IDFK' =>$rentalid,
				'created_date'=>$date
		);
		$this->db->insert('facilities_details',$data);
		return true;
	}

public function getlistingnearby()
{
	$this->dbrental= $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT * FROM nearby";
	$query_select = $this->dbrental->query($sql_select);
	return $query_select->result();
}
public function getcitybasedlocation($cityid)
	{
		$this->dbrental= $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		city.city_name ,
		locality.locality_IDPK, 
		locality.locality_name
		FROM locality 
		LEFT JOIN 
		city ON city.city_IDPK=locality.locality_cityIDFK 
		where
		locality.locality_cityIDFK =$cityid order by locality.locality_name ASC 
		";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}

public function approval($id)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$date= date('Y-m-d H:i:s');
	$data = array(
		'property_verify'=>'0',
		'property_updated'=>$date
		);
		$this->db->where('property_IDPK',$id);
		$this->db->update('property_details', $data);

		$sql_select = "SELECT 
		property_details.property_IDPK as ID,
		property_details.userIDFK as Userid,
		property_details.property_cityIDFK as cityid,
		property_details.property_localityIDFK as localityid,
		property_details.property_name as Propertyname,
		property_details.property_created as posteddate,
		bhk.bhk as BHK,
		property_type.property_type as Proptype
		FROM  property_details 
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		where 
		property_IDPK=$id";
		$query_select = $this->dbrental->query($sql_select);
		$result = $query_select->result();
		$userid = $result[0]->Userid;
		$localityid = $result[0]->localityid;
		$cityid = $result[0]->cityid;
		// print_r($cityid);exit();
	    $this->maindb = $this->load->database('default', TRUE);
		$sql_select2 = "SELECT 
		*
		FROM  registration
		where 
		reg_IDPK=$userid";
		$query_select2 = $this->maindb->query($sql_select2);
		$result2 = $query_select2->result();

		$sql_select3 = "SELECT 
		city_IDPK as cityid,
		city_name as city
		FROM  city
		where 
		city_IDPK=$cityid";
		$query_select3 = $this->maindb->query($sql_select3);
		$result3 = $query_select3->result();

		$sql_select4 = "SELECT 
		locality_IDPK as localityid,
		locality_name as locality
		FROM  locality
		where 
		locality_IDPK=$localityid";
		$query_select4 = $this->dbrental->query($sql_select4);
		$result4 = $query_select4->result();

		$merged_results = array_merge($result, $result2, $result3, $result4);
		// print_r($merged_results);exit();
		return $merged_results;
}

public function rejectionreason($id,$reason)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$sql_query1 = mysql_query("SELECT * FROM `rejection_details` WHERE `property_IDFK` = '$id'");
	$num_rows = mysql_num_rows($sql_query1);
	$date= date('Y-m-d H:i:s');
	if($num_rows >= 1){
		$data = array(
			'rejection_reason' =>$reason,
			'created_date' =>$date
		);
			$this->db->where('property_IDFK', $id);
			$this->db->update('rejection_details',$data);
		
	}else{
		$data =array(
			'rejection_reason' =>$reason,
			'property_IDFK' =>$id,
			'created_date' =>$date
		);
			$this->db->insert('rejection_details',$data);
	}
	// print_r($sql_query1);exit();
	return true;
}

public function rejection($id)
{
	$this->dbrental = $this->load->database('rentaldb', TRUE);
	$date= date('Y-m-d H:i:s');
	$data = array(
		'property_verify'=>'2',
		'property_updated'=>$date
		);
		$this->db->where('property_IDPK',$id);
		$this->db->update('property_details', $data);
	$sql_select = "SELECT 
		property_details.property_IDPK as ID,
		property_details.userIDFK as Userid,
		property_details.property_cityIDFK as cityid,
		property_details.property_localityIDFK as localityid,
		property_details.property_name as Propertyname,
		property_details.property_created as posteddate,
		bhk.bhk as BHK,
		property_type.property_type as Proptype
		FROM  property_details 
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		where 
		property_IDPK=$id";
		$query_select = $this->dbrental->query($sql_select);
		$result = $query_select->result();
		$userid = $result[0]->Userid;
		$localityid = $result[0]->localityid;
		$cityid = $result[0]->cityid;
		
	$this->maindb = $this->load->database('default', TRUE);
		$sql_select2 = "SELECT 
		*
		FROM  registration
		where 
		reg_IDPK=$userid";
		$query_select2 = $this->maindb->query($sql_select2);
		$result2 = $query_select2->result();

		$sql_select3 = "SELECT 
		city_IDPK as cityid,
		city_name as city
		FROM  city
		where 
		city_IDPK=$cityid";
		$query_select3 = $this->maindb->query($sql_select3);
		$result3 = $query_select3->result();

		$sql_select4 = "SELECT 
		locality_IDPK as localityid,
		locality_name as locality
		FROM  locality
		where 
		locality_IDPK=$localityid";
		$query_select4 = $this->maindb->query($sql_select4);
		$result4 = $query_select4->result();

		$merged_results = array_merge($result, $result2, $result3, $result4);
		// print_r($result2);exit();
		return $merged_results;
}

public function updaterentalgalleryImgs($filenameval,$imgId){
	$this->dbrental= $this->load->database('rentaldb', TRUE);
	$date= date('Y-m-d H:i:s');
	$data = array(
				'images_name' =>$filenameval,
				'added_date'=>$date
				);	
				//print_r($data);exit;
				$this->db->where('images_IDPK',$imgId);
				$this->db->update('property_images', $data);
				return true;
	
}
public function get_region1()
{
	$this->dbrental= $this->load->database('rentaldb', TRUE);
	$result = mysql_query("SELECT * FROM  regions");
	$results= array();
	$index = 0;
	while($row=mysql_fetch_array($result))
{		
$temp['region'] = $row['region_name'];
$temp['id'] = $row['region_id'];
$results[$index++] = $temp;
}
	
	return $results;
}
function getlocalities($cityid)
{
	$this->dbrental= $this->load->database('rentaldb', TRUE);
	$sql_select = "SELECT
	city.city_name,
	city.city_IDPK,
	regions.region_name,
	regions.region_id,
	locality.locality_name,
	locality.locality_IDPK,
	locality.page_title,
	locality.meta_description,
	locality.meta_keywords,
	locality.locality_description
	FROM `locality`
	LEFT JOIN
	city ON city.city_IDPK = locality.locality_cityIDFK
	LEFT JOIN
	regions ON regions.region_id = locality.locality_regionIDFK
	WHERE
	city.city_IDPK = $cityid
	ORDER BY locality.locality_IDPK DESC";
	$query_select = $this->db->query($sql_select);
	return $query_select->result();
}

function getuserdata($Userid)
	{
		$this->db = $this->load->database('default', TRUE);
		$sql_select = "SELECT 
		registration.reg_IDPK AS code,
		registration.user_name AS name,
		registration.last_name AS lastname,
		registration.number AS number,
		registration.user_email AS mail
		FROM  registration
		where registration.reg_IDPK='$Userid'";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}

	public function getuserdetails($userid)
	{
		$this->db = $this->load->database('default', TRUE);
		$sql_select = "SELECT 
		*
		FROM  registration
		where 
		reg_IDPK=$userid";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;

	}

	public function getbhkname($bhk)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		* FROM bhk
		where
		bhk_IDPK = $bhk";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

	public function getpropertytype($proptype)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		* FROM property_type
		where
		property_typeIDPK = $proptype";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

	public function getcity($city)
	{
		$this->db = $this->load->database('default', TRUE);
		$sql_select = "SELECT 
		city_IDPK,city_name FROM city
		where
		city_IDPK = $city";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

	public function PropContactInfoCRM($data)
	{
		$this->db_forum = $this->load->database('forum', TRUE);
		$date= date('Y-m-d');
		date_default_timezone_set('Asia/Kolkata');
		$time = date("h:i A");
		$cust_id = substr(str_shuffle("0123456789"), 0, 6);
		$data = array(
		
		'customer_name'=>$data['name'],
		'customer_number'=>$data['number'],
		'customer_property'=>$data['propertyname'],
		'customer_propid'=>$data['propertyname'],
		'customer_source'=>"Homes247",
		'customer_source_IDPK'=>"Homes247",
		'leadsource_type' =>$data['sourcetype'],
		'customer_mail' =>$data['email'],
		'customer_date'=>$date,
		'customer_time'=>$time
		);
		$this->db_forum->insert('enquiry',$data);
		$this->db_forum->insert('freshleads',$data);
		// $lastinsertid = $this->db->insert_id();
		// $this->db_forum->where('customer_IDPK', $lastinsertid);
		// $query = $this->db_forum->get('enquiry');
		// $row = $query->row();
		// $this->db_forum->insert('freshleads',$row);
		return 1;
	}




	// ===========================endded here======================


}