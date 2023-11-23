<?php

class defaultdb6 {
    public function connect(){
        //   $conn = mysqli_connect('localhost', 'root', 'hOMES_247', 'homes247_individuals');
          $conn = mysqli_connect('localhost', 'root', '', 'homes247_individuals');
        if (!$conn) {
            die("Připojení se nezdařilo: " . mysqli_error($conn));
        } else {
            return $conn;
        }
    }
}


class individuallistbackendmodule extends CI_Model {

    public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
    }
    
    public function get_city()
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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

	public function get_approvals()
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
        $conn = $dbconn->connect();
		$result = mysqli_query($conn,"SELECT * FROM approvals");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['approvals'] = $row['approvals_name'];
            $temp['id'] = $row['approvals_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function getapproval($cityid)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
        $conn = $dbconn->connect();
	
		$result = mysqli_query($conn,"SELECT * FROM approvals WHERE city_id = '$cityid'");
		$results= array();
		$index = 0;
		while($row=mysqli_fetch_array($result))
        {
            $temp['approvals'] = $row['approvals_name'];
            $temp['id'] = $row['approvals_IDPK'];
            $results[$index++] = $temp;
        }
		return $results;
	}

	public function get_nearby()
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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

    public function getcitybasedzone($cityId)
	{
		$this->db = $this->load->database('individualdb', TRUE);
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
		$this->db = $this->load->database('individualdb', TRUE);
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
    
    public function getProImg($propId)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT 
		property_images.images_name AS Imagename,
		property_images.images_IDPK AS Id
		FROM  
		property_images
		where 
		property_images.property_IDFK = $propId";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		return $query_select->result();
    }
    
    function getProAmenities($propId)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT 
		amenities.amenities AS amenities,
		amenities_details.amenities_IDFK AS id,
		amenities.amenities_image AS ImgPath
		FROM  
		amenities_details
		LEFT JOIN
		amenities ON amenities.amenities_IDPK = amenities_details.amenities_IDFK
		WHERE 
		amenities_details.properties_IDFK='$propId'";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	
	function getProFacilities($propId)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT 
		facilities_details.facilities_IDFK AS id,
		facilities.facilities AS facilities,
		facilities.facilities_image AS ImgPath
		FROM  
		facilities_details
		LEFT JOIN
		facilities ON facilities.facilities_IDPK = facilities_details.facilities_IDFK
		WHERE 
		facilities_details.properties_IDFK='$propId'
		";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}

    function getProapprovals($propId)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "SELECT 
		approvals_details.approvals_IDFK AS id,
		approvals.approvals_name AS approvals,
		approvals_details.property_IDFK AS PropertyId 
		FROM  approvals_details
		LEFT JOIN
		approvals ON approvals.approvals_IDPK = approvals_details.approvals_IDFK
		where approvals_details.property_IDFK='$propId'";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
	
	function getnearby($propId)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "SELECT 
		nearby_details.nearby_IDFK AS id,
		nearby.nearby_name AS nearby,
		nearby_details.properties_IDFK AS PropertyId
		FROM  nearby_details
		LEFT JOIN
		nearby ON nearby.nearby_IDPK = nearby_details.nearby_IDFK
		where nearby_details.properties_IDFK='$propId'";
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

	function get_propertyById($id)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT
		city.city_name AS City,
		property_details.property_cityIDFK AS Cityid,
		locality.locality_name AS Locality,
		property_details.property_name AS PropertyName,
		property_details.property_IDPK AS PropertyID,
		property_details.property_price AS Price,
		property_details.property_maintanence_charges,
		property_type.property_type AS PropertyType,
		ownership.ownership_status AS Ownership,
		property_details.property_area AS PropertyArea,
		property_details.property_area_type AS Areaytype,
		property_status.property_status AS Status,
		bhk.bhk AS BHK,
		bathroom.bathroom AS Bathroom,
		balcony.balcony AS Balcony,

		property_age.property_posession AS PosessionDate,
		property_age.propertyage_year AS PropertyAgeYear,
		property_age.propertyage_month AS PropertyAgeMonth,
		
		parking_details.open_parking AS Openparking,
		parking_details.covered_parking AS Coveredparking,

		property_details.property_khata AS Khata,
		property_details.property_watersupply AS watersupply,
		property_details.property_coverimage,
		property_details.property_masterimage,
		property_details.property_floorplan AS Floorplan,
		property_details.total_floor,
		property_details.property_floor AS Floor,
		property_details.plotsize_IDFK AS Plotsize,
		property_details.plotage_IDFK AS Plotage,
		plottype.plottype_name AS Plottype,

		furnish.furnish_name AS Furnish,
		property_details.brokerage_charges AS Brokerages,
		doorfacing.doorfacing_names AS Doorfacing,
		property_details.property_address AS Address,
		property_details.property_description AS Description,
		property_details.nearbydetails_description AS Nearbydescription,
		property_details.property_created AS Postedon,
		property_details.property_verify AS Verified,
		property_details.userIDFK
		FROM

		`property_details`
		
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		property_status ON property_status.property_statusIDPK = property_details.property_statusIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK
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
		LEFT JOIN
		plottype ON plottype.plottype_IDPK = property_details.property_IDPK

		where 
		property_details.property_IDPK=$id AND property_details.property_delete_status=0
				";
				
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
    }

	public function getlistings($limit="",$limitrows="",$city="",$localityId="",$buliderId="",$regionid="",$statusid="",$typeid="",$bedroom="",$bathroom="",$ownership="",$furnish="",$minprice="",$maxprice="",$doorface="",$balcony="")
	{
		$this->db = $this->load->database('individualdb', TRUE);
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
		
		/*based on buliderId*/
		if(isset($buliderId) && !empty($buliderId) && $buliderId != "NA" && $buliderId != 0 ){
			
		$dataBasebuliderId = "and property_details.property_buliderIDFK = $buliderId";
		} else {
		$dataBasebuliderId = "";
		}

		// based on regionid
		if(isset($regionid) && !empty($regionid) && $regionid != "NA" && $regionid != 0 ){
			
			$dataBaseregionid = "and property_details.property_regionIDFK = $regionid";
			} else {
			$dataBaseregionid = "";
			}

		// Based on Status
		if(isset($statusid) && !empty($statusid) && $statusid != "NA" ){
		
			$dataBasestatusid = "and property_details.property_statusIDFK = $statusid";
			} else {
			$dataBasestatusid = "";
			}

		// Based on Property Type
		if(isset($typeid) && !empty($typeid) && $typeid != "NA" && $typeid != 0 ){
			
			$dataBasetypeid = "and property_details.property_typeIDFK = $typeid";
			} else {
			$dataBasetypeid = "";
			}
		
		/*based on bedroom*/
		if(isset($bedroom) && !empty($bedroom) && $bedroom != "NA" && $bedroom != 0 ){
			$dataBasebedroom = "and property_details.property_bhk IN ('$bedroom')";	
		} else {
		$dataBasebedroom = "";
		}

		/*based on bathroom*/
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NA" && $bathroom != 0 ){
			$dataBasebathroom = "and property_details.property_bathroom IN ('$bathroom')";	
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
		if(isset($minprice) && !empty($minprice) && $minprice != "NA" && ($maxprice) && !empty($maxprice) && $maxprice != "NA" )
			{
			$dataBasebetweenprice = "and property_details.property_price BETWEEN $minprice AND $maxprice";
			}else 
			{
			$dataBasebetweenprice = "";
			}

		/*based on doorface*/
		if(isset($doorface) && !empty($doorface) && $doorface != "NA" && $doorface != 0 ){
			$dataBasedoorface = "and property_details.property_door_facing IN ('$doorface')";	
		} else {
		$dataBasedoorface = "";
		}
		/*based on balcony*/
		if(isset($balcony) && !empty($balcony) && $balcony != "NA" && $balcony != 0 ){
			$dataBasebalcony = "and property_details.property_balcony IN ('$balcony')";	
		} else {
		$dataBasebalcony = "";
		}

		$sql_select = "
		SELECT
		
		city.city_name AS City,
		property_details.property_coverimage AS Coverimage,
		property_details.property_cityIDFK AS Cityid,
		property_details.property_localityIDFK AS Localityid,
		property_details.property_name AS PropertyName,
		property_details.property_IDPK AS PropertyID,
		property_details.property_price AS Price,
		property_details.property_description AS Description,
		property_details.property_area AS PropertyArea,
		property_details.property_area_type AS Areatype,
		property_details.property_floor AS Floor,
		property_details.property_created AS Postedon,
		property_details.property_verify,
		property_details.plotsize_IDFK AS Plotsize,
		property_details.plotage_IDFK AS Plotage,
		property_details.userIDFK AS Userid,

		plottype.plottype_name AS Plottype,
		bhk.bhk AS BHK,
		bathroom.bathroom AS Bathroom,
		locality.locality_name AS Locality,
		property_type.property_type AS PropertyType,
		ownership.ownership_status AS Ownership,
		property_status.property_status AS Status,
		furnish.furnish_name AS Furnish
		
		FROM

		`property_details`
		
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		property_status ON property_status.property_statusIDPK = property_details.property_statusIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		LEFT JOIN
		plottype ON plottype.plottype_IDPK = property_details.plottype_IDFK
		 
		where  property_details.property_delete_status=0
		AND property_details.property_verify=0 
		$dataBasecityId
		$dataBaselocalityId
		$dataBasebuliderId
		$dataBaseregionid
		$dataBasestatusid
		$dataBasetypeid
		$dataBasebedroom
		$dataBasebathroom
		$dataBaseownership
		$dataBasefurnish
		$dataBasebetweenprice
		$dataBasedoorface
		$dataBasebalcony
		ORDER BY `property_details`.`property_IDPK`  DESC 
		LIMIT $limit,$limitrows";
		
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		// print_r($result);exit;
		return $result;
	}

	public function getlistingscount($city="",$localityId="",$buliderId="",$regionid="",$statusid="",$typeid="",$bedroom="",$bathroom="",$ownership="",$furnish="",$minprice="",$maxprice="",$doorface="",$balcony="")
	{
		$this->db = $this->load->database('individualdb', TRUE);
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
		
		/*based on buliderId*/
		if(isset($buliderId) && !empty($buliderId) && $buliderId != "NA" && $buliderId != 0 ){
			
		$dataBasebuliderId = "and property_details.property_buliderIDFK = $buliderId";
		} else {
		$dataBasebuliderId = "";
		}

		// based on regionid
		if(isset($regionid) && !empty($regionid) && $regionid != "NA" && $regionid != 0 ){
			
			$dataBaseregionid = "and property_details.property_regionIDFK = $regionid";
			} else {
			$dataBaseregionid = "";
			}

		// Based on Status
		if(isset($statusid) && !empty($statusid) && $statusid != "NA"){
		
			$dataBasestatusid = "and property_details.property_statusIDFK = $statusid";
			} else {
			$dataBasestatusid = "";
			}

		// Based on Property Type
		if(isset($typeid) && !empty($typeid) && $typeid != "NA" && $typeid != 0 ){
			
			$dataBasetypeid = "and property_details.property_typeIDFK = $typeid";
			} else {
			$dataBasetypeid = "";
			}
		
		/*based on bedroom*/
		if(isset($bedroom) && !empty($bedroom) && $bedroom != "NA" && $bedroom != 0 ){
			$dataBasebedroom = "and property_details.property_bhk IN ('$bedroom')";	
		} else {
		$dataBasebedroom = "";
		}

		/*based on bathroom*/
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NA" && $bathroom != 0 ){
			$dataBasebathroom = "and property_details.property_bathroom IN ('$bathroom')";	
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
		if(isset($minprice) && !empty($minprice) && $minprice != "NA" && ($maxprice) && !empty($maxprice) && $maxprice != "NA" )
			{
			$dataBasebetweenprice = "and property_details.property_price BETWEEN $minprice AND $maxprice";
			}else 
			{
			$dataBasebetweenprice = "";
			}

		/*based on doorface*/
		if(isset($doorface) && !empty($doorface) && $doorface != "NA" && $doorface != 0 ){
			$dataBasedoorface = "and property_details.property_door_facing IN ('$doorface')";	
		} else {
		$dataBasedoorface = "";
		}
		/*based on balcony*/
		if(isset($balcony) && !empty($balcony) && $balcony != "NA" && $balcony != 0 ){
			$dataBasebalcony = "and property_details.property_balcony IN ('$balcony')";	
		} else {
		$dataBasebalcony = "";
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
		property_status ON property_status.property_statusIDPK = property_details.property_statusIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		ownership ON ownership.ownership_IDPK = property_details.property_ownershipIDFK
		LEFT JOIN
		furnish ON furnish.furnish_IDPK = property_details.property_furnishIDFK
		LEFT JOIN
		bhk ON bhk.bhk_IDPK = property_details.property_bhk
		LEFT JOIN
		bathroom ON bathroom.bathroom_IDPK = property_details.property_bathroom
		 
		where  property_details.property_delete_status=0 
		AND property_details.property_verify=0
		$dataBasecityId
		$dataBaselocalityId
		$dataBasebuliderId
		$dataBaseregionid
		$dataBasestatusid
		$dataBasetypeid
		$dataBasebedroom
		$dataBasebathroom
		$dataBaseownership
		$dataBasefurnish
		$dataBasebetweenprice
		$dataBasedoorface
		$dataBasebalcony
		ORDER BY `property_details`.`property_IDPK`  ASC 
		";
		
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		// print_r($result);exit;
		return $result;
	}

	public function addlisting($userid="",$propname="",$propprice="",$maintanence="",$totalfloor="",$propfloor="",$doorface="",$city="",$locality="",$region="",$proptype="",$buildtype="",$propstatus="",$propfurnish="",$propownership="",$proppossesion="",$propageyear="",$propagemonth="",$brokerage="",$Propaddress="",$zipcode="",$descrip="",$bhk="",$bathroom="",$balcony="",$area="",$areatype="",$openparking="",$coveredparking="",$khatatype="",$watersupply="",$amenity="",$facility="",$approval="",$nearby="",$nearbydetails="",$plottype="",$plotsize="",$plotage="",$parking="",$builderid="")
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		if(isset($propname) && !empty($propname))
		{
			$propertynamedb = $propname;
		}else{
			$propertynamedb = NULL;
			// return "Parameterissue";
		}
		if(isset($propprice) && !empty($propprice) && $propprice != "NULL" && $propprice != 0  && $propprice != "null" )
		{
			$propertypricedb = $propprice;	
		}else{
			$propertypricedb = NULL;
			// return "Parameterissue";
		}
		if(isset($maintanence) && !empty($maintanence) && $maintanence != "NULL" && $maintanence != "null" )
		{
			$maintanencedb = $maintanence;	
		}else{
			$maintanencedb = NULL;
			// return "Parameterissue";
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
			// return "Parameterissue";
		}
		if(isset($doorface) && !empty($doorface))
		{
			$doorfacedb = $doorface;	
		}else{
			$doorfacedb = NULL;
			// return "Parameterissue";
		}
		if(isset($city) && !empty($city) && $city != "NULL" && $city != 0  && $city != "null" )
		{
			$citydb = $city;	
		}else{
			$citydb = NULL;
			// return "Parameterissue";
		}
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
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
		if(isset($region) && !empty($region) && $region != "NULL" && $region != 0  && $region != "null" )
		{
			$regiondb = $region;	
		}else{
			$regiondb = NULL;
			// return "Parameterissue";
		}
		if(isset($proptype) && !empty($proptype) && $proptype != "NULL" && $proptype != 0  && $proptype != "null" )
		{
			$proptypedb = $proptype;	
		}else{
			$proptypedb = NULL;
			// return "Parameterissue";
		}
		if(isset($buildtype) && !empty($buildtype) && $buildtype != "NULL" && $buildtype != 0  && $buildtype != "null" )
		{
			$buildtypedb = $buildtype;	
		}else{
			$buildtypedb = NULL;
			// return "Parameterissue";
		}
		if(isset($propstatus) && !empty($propstatus) && $propstatus != "NULL" && $propstatus != "null" )
		{
			$propstatusdb = $propstatus;	
		}else{
			$propstatusdb = Null;
			// return "Parameterissue";
		}
		if(isset($propfurnish) && !empty($propfurnish) && $propfurnish != "NULL" && $propfurnish != 0  && $propfurnish != "null" )
		{
			$propfurnishdb = $propfurnish;	
		}else{
			$propfurnishdb = NULL;
			// return "Parameterissue";
		}
		if(isset($propownership) && !empty($propownership) && $propownership != "NULL" && $propownership != 0  && $propownership != "null" )
		{
			$propownershipdb = $propownership;	
		}else{
			$propownershipdb = NULL;
			// return "Parameterissue";
		}

		if(isset($brokerage) && !empty($brokerage) && $brokerage != "NULL" && $brokerage != 0  && $brokerage != "null" )
		{
			$brokeragedb = $brokerage;	
		}else{
			$brokeragedb = NULL;
		}
		
		if(isset($Propaddress) && !empty($Propaddress))
		{
			$Propaddressdb = $Propaddress;	
		}else{
			$Propaddressdb = NULL;
			// return "Parameterissue";
		}
		if(isset($zipcode) && !empty($zipcode) && $zipcode != "NULL" && $zipcode != 0  && $zipcode != "null" )
		{
			$zipcodedb = $zipcode;	
		}else{
			$zipcodedb = NULL;
		}
		if(isset($descrip) && !empty($descrip))
		{
			$descripdb = $descrip;	
		}else{
			$descripdb = NULL;
			// return "Parameterissue";
		}
		if(isset($bhk) && !empty($bhk) && $bhk != "NULL" && $bhk != 0  && $bhk != "null" )
		{
			$bhkdb = $bhk;	
		}else{
			$bhkdb = NULL;
			// return "Parameterissue";
		}
		if(isset($bathroom) && !empty($bathroom) && $bathroom != "NULL" && $bathroom != "null" )
		{
			$bathroomdb = $bathroom;	
		}else{
			$bathroomdb = NULL;
			// return "Parameterissue";
		}
		if(isset($balcony) && !empty($balcony) && $balcony != "NULL" && $balcony != "null" )
		{
			$balconydb = $balcony;	
		}else{
			$balconydb = NULL;
		}
		if(isset($area) && !empty($area) && $area != "NULL" && $area != "null" )
		{
			$areadb = $area;	
		}else{
			$areadb = NULL;
			// return "Parameterissue";
		}
		if(isset($areatype) && !empty($areatype))
		{
			$areatypedb = $areatype;	
		}else{
			$areatypedb = NULL;
			// return "Parameterissue";
		}
		if(isset($openparking) && !empty($openparking) && $openparking != "NULL" && $openparking != "null" )
		{
			$openparkingdb = $openparking;	
		}else{
			$openparkingdb = "0";
		}
		if(isset($coveredparking) && !empty($coveredparking) && $coveredparking != "NULL" && $coveredparking != "null" )
		{
			$coveredparkingdb = $coveredparking;	
		}else{
			$coveredparkingdb = "0";
		}
		if(isset($khatatype) && !empty($khatatype))
		{
			$khatatypedb = $khatatype;	
		}else{
			$khatatypedb = NULL;
			// return "Parameterissue";
		}
		if(isset($watersupply) && !empty($watersupply))
		{
			$watersupplydb = $watersupply;	
		}else{
			$watersupplydb = NULL;
			// return "Parameterissue";
		}
		if(isset($nearbydetails) && !empty($nearbydetails))
		{
			$nearbydetailsdb = $nearbydetails;	
		}else{
			$nearbydetailsdb = NULL;
			// return "Parameterissue";
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
			// print_r($plotsizedb);exit();
		}else{
			$plotsizedb = NULL;
			// print_r("Plot Size Empty Value");exit();
		}
		if(isset($plotage) && !empty($plotage) && $plotage != "NULL" && $plotage != "null" )
		{
			$plotagedb = $plotage;
		}else{
			$plotagedb = NULL;
		}
		if(isset($parking) && !empty($parking) && $parking != "NULL" && $parking != 0  && $parking != "null" )
		{
			$parkingdb = $parking;	
		}else{
			$parkingdb = NULL;
		}
		if(isset($builderid) && !empty($builderid) && $builderid != "NULL" && $builderid != "null" )
		{
			$builderiddb = $builderid;	
		}else{
			$builderiddb = NULL;
		}
		if(isset($proppossesion) && !empty($proppossesion) && $proppossesion != "NULL" && $proppossesion != 0 )
		{
			$proppossesiondb = $proppossesion;	
		}else{
			$proppossesiondb = Null;
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

		
		$data = array(
				'userIDFK' =>$userid,
				'property_name' =>$propertynamedb,
				'property_buliderIDFK' =>$builderiddb,
				'property_price' =>$propertypricedb,
				'property_maintanence_charges'=>$maintanencedb,
				'total_floor'=>$totalfloordb,
				'property_floor'=>$propfloordb,
				'property_door_facing'=>$doorfacedb,
				'property_cityIDFK'=>$citydb,
				'property_localityIDFK'=>$localitydb,
				'property_typeIDFK'=>$proptypedb,
				'building_typeIDFK'=>$buildtypedb,
				'property_regionIDFK'=>$regiondb,
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
				'property_khata'=>$khatatypedb,
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
		if((isset($proppossesiondb) && !empty($proppossesiondb) && $proppossesiondb != NULL) || (isset($propageyeardb) && !empty($propageyeardb) && $propageyeardb != NULL) || isset($propagemonthdb) && !empty($propagemonthdb) && $propagemonthdb != NULL)
		{
			$data = array(
				'propertyage_year'=>$propageyeardb,
				'propertyage_month'=>$propagemonthdb,
				'property_posession'=>$proppossesiondb,
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
		if(isset($approval) && !empty($approval) && $approval != "NULL" && $approval != 0  && $approval != "null" )
		{
			foreach (explode(',',$approval) as $piece){
				$data = array(
					'approvals_IDFK'=>$piece,
					'property_IDFK'=>$lastinsertid,
					'created_date'=>$date);
					$this->db->insert('approvals_details',$data);
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
		// $details = explode(',',$nearbydetailsdb);
		// $nearby = explode(',',$nearbydb);
		// $totalarrays = count($nearby);
		// 	for($i = 0; $i < $totalarrays; $i++)
		// 	{
		// 		$data = array(
		// 			'nearby_IDFK'=>$nearby[$i],
		// 			'nearby_desciption'=>$details[$i],
		// 			'properties_IDFK'=>$lastinsertid,
		// 			'created_date'=>$date);
		// 			$this->db->insert('nearby_details',$data);
		// 	}	
		return $lastinsertid;
	}

	public function updatelisting($data)
	{
		$propid = $data['Propid'];
		$userid = $data['Userid'];
		$nearby = $data['Nearby'];
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
		$date= date('Y-m-d H:i:s');

		if(isset($data['PossesionDate']) && !empty($data['PossesionDate']) && $data['PossesionDate'] != NULL)
		{
			$proppossesiondb = $data['PossesionDate'];	
		}
		else
		{
			$proppossesiondb = Null;
		}
		$nearbycount = explode(',',$nearby);
		$approval = $data['Approvals'];
		$approvalcount = explode(',',$approval);
		$facility = $data['Facilities'];
		$facilitycount = explode(',',$facility);
		$amenity = $data['Amenities'];
		$amenitycount = explode(',',$amenity);
		$this->db = $this->load->database('individualdb', TRUE);
		$dbconn = new defaultdb6();
        $conn = $dbconn->connect();
		$sql_query = mysqli_query($conn,"SELECT * FROM `property_details` WHERE `property_IDPK` = '$propid' AND `userIDFK` = '$userid'");
		$num_rows = mysqli_num_rows($sql_query);
		$row = mysqli_fetch_array($sql_query);
		// print_r($num_rows);exit();
		$this->db = $this->load->database('individualdb', TRUE);
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
				'property_price' =>$data['Price'],
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
				'property_khata'=>$data['Khatatype'],
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
					'propertyage_month'=>$propagemonthdb,
					'property_posession'=>$proppossesiondb);
					$this->db->where('property_IDFK',$propid);
					$this->db->update('property_age', $datas);
			}
			else if($propage_rows == 0 || (isset($propageyeardb) && !empty($propageyeardb) && $propageyeardb!="null") || (isset($proppossesiondb) && !empty($proppossesiondb) && $proppossesiondb!="null"))
			{
				$datas = array(
					'propertyage_year'=>$propageyeardb,
					'propertyage_month'=>$propagemonthdb,
					'property_posession'=>$proppossesiondb,
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
			
			if(isset($data['Approvals']) && !empty($data['Approvals']) && $data['Approvals']!="null")
			{
				$this->db->where('property_IDFK', $propid);
				$this->db->delete('approvals_details');
				foreach (explode(',',$approval) as $piece)
				{
					$datas = array(
						'approvals_IDFK'=>$piece,
						'property_IDFK'=>$propid,
						'created_date'=>$date);
						$this->db->insert('approvals_details',$datas);
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
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_delete_status'=>'1',
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}

	public function masterplanupdate($userid,$propid,$finalmastername)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_masterimage'=>$finalmastername,
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}
	public function masterplandelete($userid,$propid)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_masterimage'=>'',
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}
	public function floorplanupdate($userid,$propid,$finalfloorplanname)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_floorplan'=>$finalfloorplanname,
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}
	public function floorplandelete($userid,$propid)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_floorplan'=>'',
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}
	public function galleryimageremoval($imageid)
	{
		    $this->db = $this->load->database('individualdb', TRUE);
			$this->db->where('images_IDPK',$imageid);
			$this->db->delete('property_images');
			return true;
	}

	public function insertImg($propid,$finalcovername,$finalmastername,$finalfloorplanname)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$data = array(
			'property_coverimage' =>$finalcovername,		
			'property_masterimage' =>$finalmastername,	
			'property_floorplan' =>$finalfloorplanname	
			);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $data);
			return 1;
	}

	public function insertgalleryimages($galleryfile_name,$propid)
	{
		$date = date('Y-m-d H:i:s');
		$this->db = $this->load->database('individualdb', TRUE);
		$data = array(
			'images_name' =>$galleryfile_name,		
			'property_IDFK' =>$propid,	
			'added_date' =>$date	
			);
		$this->db->insert('property_images',$data);
		return 1;
	}

	public function coverimageupdate($userid,$propid,$finalcovername)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$datas = array(
			'property_coverimage'=>$finalcovername,
			'property_updated'=>$date);
			$this->db->where('property_IDPK',$propid);
			$this->db->update('property_details', $datas);
			return true;
	}

	public function getedituserproperty($userid,$propid)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT 
		property_details.property_name AS Propertyname,
		property_details.property_price AS Price,
		property_details.property_maintanence_charges AS Maintanencecharge,
		property_details.total_floor AS Totalfloor,
		property_details.property_floor AS Floor,
		property_details.brokerage_charges AS Brokerage,
		property_details.property_address AS Address,
		property_details.property_zipcode AS Zipcode,
		property_details.property_description AS description,
		property_details.nearbydetails_description AS Neardescription,
		property_details.property_area AS Area,
		property_details.property_area_type AS Areatype, 
		property_details.property_buliderIDFK AS BuilderID,
		property_details.property_khata AS Khata,
		property_details.property_watersupply AS Watersupply,
		property_details.property_coverimage AS Coverimage,
		property_details.property_masterimage AS Masterimage,
		property_details.property_floorplan AS Floorplan,
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
		property_age.property_posession AS Possession,
		property_age.propertyage_year AS PropertyageYear,
		property_age.propertyage_month AS PropertyageMonth,
		parking_details.open_parking AS Openparking,
		parking_details.covered_parking AS Coveredparking,
		doorfacing.doorfacing_names AS doorface,
		city.city_name AS City,
		property_type.property_type AS Type,
		building_type.building_typeName AS Buildingtype,
		regions.region_name AS RegionName,
		property_status.property_status AS Status,
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
		property_status ON property_status.property_statusIDPK = property_details.property_statusIDFK
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

		WHERE
		property_details.property_IDPK = '$propid' AND property_details.userIDFK = '$userid'
		";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

	public function getuserlistings($userid)
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT 
		property_details.property_IDPK AS PropertyID,
		property_details.property_name AS Propertyname,
		property_details.property_price AS Price,
		property_details.property_maintanence_charges AS Maintanencecharge,
		property_details.total_floor AS Totalfloor,
		property_details.property_floor AS Floor,
		property_details.property_address AS Address,
		property_details.property_description AS description,
		property_details.property_area AS Area,
		property_details.property_area_type AS Areatype,
		property_details.property_coverimage AS Coverimage,
		property_details.property_masterimage AS Masterimage,
		property_details.property_floorplan AS Floorplan,
		property_details.plotage_IDFK AS Plotage,
		property_details.property_verify AS Verification,
		property_details.property_delete_status AS Deletion,
		city.city_name AS City,
		locality.locality_name AS Locality,
		property_type.property_type AS Type,
		building_type.building_typeName AS Buildingtype,
		property_status.property_status AS Status,
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
		property_status ON property_status.property_statusIDPK = property_details.property_statusIDFK
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

	public function getbhkname($bhk)
	{
		$this->db = $this->load->database('individualdb', TRUE);
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
		$this->db = $this->load->database('individualdb', TRUE);
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
		return 1;
	}

 }