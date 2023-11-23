<?php

class individualdb {
    public function connect(){
        // $conn = mysqli_connect('localhost', 'root', 'hOMES_247', 'homes247_individuals');
        $conn = mysqli_connect('localhost', 'root', '', 'homes247_individuals');
        if (!$conn) {
            die("P?ipojení se nezda?ilo: " . mysqli_error($conn));
        } else {
            return $conn;
        }
    }
}

class individuallistadminmodule extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
        $this->db_individuals = $this->load->database('individualdb', TRUE);
	}

    public function getnewrequests()
    {
        $this->db = $this->load->database('individualdb', TRUE);
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
        property_details.property_verify = '1' AND property_details.property_delete_status = '0'
        order by property_IDPK DESC
        ";
            $query_select = $this->db->query($sql_select);
            $result=$query_select->result();
            return $result;
    }

    public function getusername($userid)
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


	public function get_location()
	{

       $dbconn = new defaultdb();
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

	function getbuliderInfo()
	{
        // $this->db = $this->load->database();
		$sql_select = "SELECT * FROM builderinfo";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return  $result;
	}

	public function get_bhk()
	{
		$this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM bhk";
		$query_select = $this->db->query($sql_select);
		$result=$query_select->result();
		return  $result;
	}

	public function get_bathroom()
	{
        $this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  bathroom";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
	}

	public function get_balcony()
	{
		$this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  balcony";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
	}

	public function get_furnish()
	{
		$this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  furnish";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
	}

	public function get_propertytype()
	{
        $this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  property_type";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
	}

	public function get_ownership()
	{
        $this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  ownership";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
	}

    public function get_buildingtype()
    {
        $this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  building_type";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
    }

    public function get_status()
    {
        $this->db = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM  property_status";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
    }

    public function get_parking()
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM parking";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    public function get_doorfacings()
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM doorfacing";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    public function getlistingamenities()
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM amenities";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    public function getlistingfacilities()
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM facilities";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    public function getlistingapprovals()
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM approvals";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    public function getlistingnearby()
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT * FROM nearby";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    
	function getlistpropertyById($id)
	{
        $this->dbindividual = $this->load->database('individualdb', TRUE);
		$sql_select = "
		SELECT
		city.city_name,
		city.city_IDPK,
		locality.locality_name,
		property_details.property_IDPK ,
		property_details.property_name AS propertyName,
		property_details.property_description AS discription,
		property_type.property_type AS propertyType,
		property_details.property_zipcode AS zipcode,
		property_details.property_address AS address,
		property_details.property_localityIDFK AS LoaclityId,
		property_details.property_statusIDFK AS Status,
		property_details.property_masterimage AS masterImgPath,
		property_details.property_buliderIDFK AS BuliderIDFK,
		property_details.property_bhk AS bhk,
		property_details.property_bathroom AS bathroom,
		property_details.property_balcony AS balcony,
		property_details.property_furnishIDFK AS furnish,
		property_details.property_price,
		property_details.property_maintanence_charges as maintanence,
		property_details.total_floor AS Totalfloor,
		property_details.property_floor AS floor,
		property_details.property_area AS Area,
		property_details.property_area_type AS Areatype,
		property_details.property_ownershipIDFK AS ownership,
		property_details.building_typeIDFK AS buildingtype,
		property_age.propertyage_year as ageyear,
		property_age.propertyage_month as agemonth,
		property_age.property_posession as possessiondate,
		property_details.parking,
		parking_details.open_parking as openparking,
		parking_details.covered_parking as coveredparking,
		property_details.property_watersupply as watersupply,
		property_details.property_door_facing as Doorface,
		property_details.property_khata as propertykhata,
		property_details.nearbydetails_description as nearbydescription,
		property_details.property_coverimage as coverimage,
		property_details.property_masterimage as masterImgPath,
		property_details.property_floorplan as floorplanimage,
		property_details.property_verify as verify
		FROM
		`property_details`
		LEFT JOIN
		city ON city.city_IDPK = property_details.property_cityIDFK
		LEFT JOIN
		property_type ON property_type.property_typeIDPK = property_details.property_typeIDFK
		LEFT JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		property_age ON property_age.property_IDFK = property_details.property_IDPK
		LEFT JOIN
		parking_details ON parking_details.properties_IDFK = property_details.property_IDPK
		where  property_details.property_IDPK='$id' 
		AND 
		property_details.property_delete_status=0";
		$query_select = $this->dbindividual->query($sql_select);
		$result=$query_select->result();
		return $result;
	}

    public function getlistingimages($propId)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$sql_select = "SELECT property_images.images_IDPK AS Id,
		property_images.images_name AS name  FROM  property_images
		where property_IDFK=$propId";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->name);exit(); 
		return $query_select->result();
	}

	public function getindividuallistcoverimage($propId)
	{
        // print_r($propId);exit();
        $this->dbindividual = $this->load->database('individualdb', TRUE);
		$sql_select = " SELECT 
		property_details.property_IDPK AS Id,
		property_details.property_coverimage AS imagename
		FROM property_details
		where property_details.property_IDPK = '$propId'";
		$query_select = $this->dbindividual->query($sql_select);
		$result=$query_select->result();
        // print_r($result);exit();
		return $result;
	}

    public function getindividuallistmasterimage($propId)
	{
        // print_r($propId);exit();
        $this->dbindividual = $this->load->database('individualdb', TRUE);
		$sql_select = " SELECT 
		property_details.property_IDPK AS Id,
		property_details.property_masterimage AS imagename
		FROM property_details
		where property_details.property_IDPK = '$propId'";
		$query_select = $this->dbindividual->query($sql_select);
		$result=$query_select->result();
        // print_r($result);exit();
		return $result;
	}

    public function getindividuallistfloorplanimage($propId)
	{
        // print_r($propId);exit();
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$sql_select = "SELECT property_details.property_IDPK AS Id,
		property_details.property_floorplan AS imagename  FROM  property_details
		where property_IDPK =$propId";
		$query_select = $this->dbindividual->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->name);exit(); 
		return $query_select->result();
	}

    function getProAmenities($propId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "
        SELECT 
        amenities_details.properties_IDFK AS PropertyId, 
        amenities.amenities AS Name,
        amenities.amenities_image AS ImgPath 
        FROM  amenities_details
        LEFT JOIN
        amenities ON amenities.amenities_IDPK = amenities_details.amenities_IDFK
        where amenities_details.properties_IDFK='$propId'";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
    }

    function getProFacilities($propId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "
        SELECT 
        facilities_details.properties_IDFK AS PropertyId, 
        facilities.facilities AS Name,
        facilities.facilities_image AS ImgPath 
        FROM  facilities_details
        LEFT JOIN
        facilities ON facilities.facilities_IDPK = facilities_details.facilities_IDFK
        where facilities_details.properties_IDFK='$propId'";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
    }

    function getProapprovals($propId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "
        SELECT 
        approvals_details.property_IDFK AS PropertyId, 
        approvals.approvals_name AS Name
        FROM  approvals_details
        LEFT JOIN
        approvals ON approvals.approvals_IDPK = approvals_details.approvals_IDFK
        where approvals_details.property_IDFK='$propId'";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
    }

    function getPronearby($propId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "
        SELECT 
        nearby_details.properties_IDFK AS PropertyId, 
        nearby.nearby_name AS Name
        FROM  nearby_details
        LEFT JOIN
        nearby ON nearby.nearby_IDPK = nearby_details.nearby_IDFK
        where nearby_details.properties_IDFK='$propId'";
        $query_select = $this->dbindividual->query($sql_select);
        return $query_select->result();
    }

    public function get_localityindividual()
	{
		$this->db = $this->load->database('individualdb', TRUE);
		$sql_select = "SELECT * FROM  locality";
		$query_select = $this->db->query($sql_select);
		return $query_select->result();
	}
    
public function updatelistingdetails($data = array())
{	
    $this->dbindividual = $this->load->database('individualdb', TRUE);
    $id=$data['PropeId'];
    $date= date('Y-m-d H:i:s');
    $propname = rtrim($data['propertyname']);
    if(isset($data['buildingtype']) && !empty($data['buildingtype']) && $data['buildingtype'] != "NULL" && $data['buildingtype'] != "null" )
    {
        $buildingtypedb = $data['buildingtype'];	
    }else{
        $buildingtypedb = Null;
    }
    if(isset($data['status']) && !empty($data['status']) && $data['status'] != "NULL" && $data['status'] != "null" )
    {
        $propstatusdb = $data['status'];	
    }else{
        $propstatusdb = Null;
    }
    if(isset($data['total_apartments']) && !empty($data['total_apartments']) && $data['total_apartments'] != "NULL" && $data['total_apartments'] != "null" )
    {
        $totalfloordb = $data['total_apartments'];	
    }else{
        $totalfloordb = Null;
    }
    if(isset($data['apartment_floor']) && !empty($data['apartment_floor']) && $data['apartment_floor'] != "NULL" && $data['apartment_floor'] != "null" )
    {
        $propfloordb = $data['apartment_floor'];	
    }else{
        $propfloordb = Null;
    }
    if(isset($data['buliderInfo']) && !empty($data['buliderInfo']) && $data['buliderInfo'] != "NULL" && $data['buliderInfo'] != "null" )
    {
        $builderiddb = $data['buliderInfo'];
    }else{
        $builderiddb = NULL;
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
    if(isset($data['Zipcode']) && !empty($data['Zipcode']) && $data['Zipcode'] != "NULL" && $data['Zipcode'] != "null" )
    {
        $zipcodedb = $data['Zipcode'];	
    }else{
        $zipcodedb = NULL;
    }
    if(isset($data['parking']) && !empty($data['parking']) && $data['parking'] != "NULL" && $data['parking'] != "null" )
    {
        $parkingdb = $data['parking'];	
    }else{
        $parkingdb = NULL;
    }
    if(isset($data['maintanence']) && !empty($data['maintanence']) && $data['maintanence'] != "NULL" && $data['maintanence'] != "null" )
    {
        $maintanencedb = $data['maintanence'];	
    }else{
        $maintanencedb = NULL;
    }
    $data = array(
        'property_name'=>$propname,
        'property_price'=>$data['price'],
        'property_maintanence_charges'=>$maintanencedb,
        'total_floor'=>$totalfloordb,
        'property_floor'=>$propfloordb,
        'property_door_facing'=>$data['doorfacing'],
        'property_cityIDFK'=>$data['cityname'],
        'property_localityIDFK'=>$data['localityname'],
        'property_typeIDFK'=>$data['PropertyType'],
        'building_typeIDFK'=>$buildingtypedb,
        'property_statusIDFK'=>$propstatusdb,
        'property_buliderIDFK'=>$builderiddb,
        'property_furnishIDFK'=>$propfurnishdb,
        'property_ownershipIDFK'=>$data['ownership'],
        'property_address'=>$data['address'],
        'property_zipcode'=>$zipcodedb,
        'property_description'=>$data['discription'],
        'nearbydetails_description'=>$data['nearbydescription'],
        'property_bhk'=>$bhkdb,
        'property_bathroom'=>$bathroomdb,
        'property_balcony'=>$balconydb,
        'property_area'=>$data['dimension'],
        'property_area_type'=>$data['dimensiontype'],
        'parking'=>$parkingdb,
        'property_khata'=>$data['propertytitle'],
        'property_watersupply'=>$data['watersupply'],
        'property_updated'=>$date
        );
        $this->dbindividual->where('property_IDPK',$id);
        $this->dbindividual->update('property_details', $data);
        return true;
}

    public function updatepropertyage($data = array())
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $propageyear = $data['ageyear'];
        $propagemonth = $data['agemonth'];
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
        if(isset($data['PossessionDate']) && !empty($data['PossessionDate']) && $data['PossessionDate'] != NULL)
        {
            $proppossesiondb = $data['PossessionDate'];	
        }
        else
        {
            $proppossesiondb = Null;
        }
        $id=$data['PropeId'];
        $date= date('Y-m-d H:i:s');
        $data = array(
            'propertyage_year'=>$propageyeardb,
            'propertyage_month'=>$propagemonthdb,
            'property_posession'=>$proppossesiondb,
            'created_date'=>$date
            );
            $this->dbindividual->where('property_IDFK',$id);
            $this->dbindividual->update('property_age', $data);
            return true;
    }

    public function updateparkingareas($data = array())
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$id=$data['PropeId'];
		$date= date('Y-m-d H:i:s');
		$data = array(
			'open_parking'=>$data['coveredparking'],
			'covered_parking'=>$data['coveredparking'],
			'created_date'=>$date
			);
			$this->dbindividual->where('properties_IDFK',$id);
			$this->dbindividual->update('parking_details', $data);
			return true;
	}

    public function insertlistinggalleryImgs($filenameval,$propId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_IDFK' =>$propId,
                    'images_name' =>$filenameval,
                    'added_date'=>$date
                    );	
                    //print_r($data);exit;
            $this->dbindividual->insert('property_images',$data);
            return true;
    }

    function deletenearByPropId($propid)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$this->dbindividual->where('properties_IDFK', $propid);
		$this->dbindividual->delete('nearby_details');
		return true;
	}

    function insertnearby($propertyId,$checkbox)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$data = array(
				'nearby_IDFK' =>$checkbox,
				'properties_IDFK' =>$propertyId	
		);
		$this->dbindividual->insert('nearby_details',$data);
		return true;
	} 

    function deletelistingamenities($propid)
	{
        // print_r($propid);exit();
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$this->dbindividual->where('properties_IDFK', $propid);
		$this->dbindividual->delete('amenities_details');
		return true;
	}

    function insertlistingamenities($propertyId,$checkbox)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'amenities_IDFK' =>$checkbox,
				'properties_IDFK' =>$propertyId,
				'created_date'=>$date
		);
		$this->dbindividual->insert('amenities_details',$data);
		return true;
	}

    function deletelistingfacilities($propid)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		  $this->dbindividual->where('properties_IDFK', $propid);
			$this->dbindividual->delete('facilities_details');
			return true;
	}

    function insertlistingfacilities($propertyId,$checkbox)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'facilities_IDFK' =>$checkbox,
				'properties_IDFK' =>$propertyId,
				'created_date'=>$date
		);
		$this->dbindividual->insert('facilities_details',$data);
		return true;
	}

    function deletelistingapprovals($propid)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$this->dbindividual->where('property_IDFK', $propid);
		$this->dbindividual->delete('approvals_details');
		return true;
	}

    function insertlistingapprovals($propertyId,$checkbox)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'approvals_IDFK' =>$checkbox,
				'property_IDFK' =>$propertyId,
				'created_date'=>$date
		);
		$this->dbindividual->insert('approvals_details',$data);
		return true;
	}

    
	function updatealt($altidArr,$alttagArr,$propId)
	{
		
		foreach($altidArr as $key => $val)
		{
			if(isset($altidArr[$key]) && !empty($altidArr[$key])){
            $AltID=$altidArr[$key];
            $this->db = $this->load->database('individualdb', TRUE);
            $sql_select = "SELECT * FROM property_image where property_image_IDPK='$AltID' and property_image_propertyInfoIDFK ='$propId'";
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

	
	public function approval($id)
	{
		$this->dbindividual = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
			'property_verify'=>'0',
			'property_updated'=>$date
			);
			$this->dbindividual->where('property_IDPK',$id);
			$this->dbindividual->update('property_details', $data);
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
			$query_select = $this->dbindividual->query($sql_select);
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
			$query_select4 = $this->dbindividual->query($sql_select4);
			$result4 = $query_select4->result();

			$merged_results = array_merge($result, $result2, $result3, $result4);
			// print_r($merged_results);exit();
			return $merged_results;
	}

    public function rejectionreason($id,$reason)
	{
		// $this->dbindividual = $this->load->database('individualdb', TRUE);
        // $conn = mysqli_connect("localhost", "root", "", "homes247_individuals");
		// $result = mysqli_query($conn, "SELECT * FROM `rejection_details` where property_IDFK = '$id'");
		// $num_rows = mysqli_num_rows($result);
        $sql_select = "SELECT * FROM `rejection_details` where property_IDFK = '$id'";
		$query_select = $this->db_individuals->query($sql_select);
		$result=$query_select->result();
		$num_rows=$query_select->num_rows();

        // print_r($num_rows);exit();

		$date= date('Y-m-d H:i:s');
		if ($num_rows >= 1){
			$data = array(
				'rejection_reason'=>$reason,
				'created_date'=>$date
				);
				$this->db_individuals->where('property_IDFK',$id);
				$this->db_individuals->update('rejection_details', $data);
		}else{
			$data = array(
				'rejection_reason' =>$reason,
				'property_IDFK' =>$id,
				'created_date'=>$date
		);
		$this->db_individuals->insert('rejection_details',$data);
		}
		return true;
	}

    public function rejection($id)
	{
		// $this->dbindividual = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
			'property_verify'=>'2',
			'property_updated'=>$date
			);
			$this->db_individuals->where('property_IDPK',$id);
			$this->db_individuals->update('property_details', $data);
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
			$query_select = $this->db_individuals->query($sql_select);
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
			// print_r($merged_results);exit();
			return $merged_results;
	}

    public function getcitybasedlocation($cityid)
	{
        $this->dbindividual = $this->load->database('individualdb', TRUE);
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
		$query_select = $this->dbindividual->query($sql_select);
		return $query_select->result();
	}

    function deletegalleryimages($id)
	{
		// print_r($name);exit();
		          $this->db = $this->load->database('individualdb', TRUE);
				  $this->db->where('images_IDPK', $id);
				  $this->db->delete('property_images');
				  return true;
  
	}

	public function deletemasterimage($imagename,$PropeId)
    {
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'property_masterimage' =>$imagename
					);	
					// print_r($data);exit;
					$this->db->where('property_IDPK',$PropeId);
					$this->db->delete('property_details', $data);
				    return true;
		
	}

	public function insertcover_image($filenameval2,$propId)
    {
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'property_coverimage' =>$filenameval2
					);	
					// print_r($data);exit;
					$this->db->where('property_IDPK',$propId);
					$this->db->update('property_details', $data);
				    return true;
		
	}

    public function insertmaster_image($filenameval2,$propId)
    {
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'property_masterimage' =>$filenameval2
					);	
					// print_r($data);exit;
					$this->db->where('property_IDPK',$propId);
					$this->db->update('property_details', $data);
				    return true;
	}

    public function insertfloorplan_image($filenameval2,$propId)
    {
		$this->db = $this->load->database('individualdb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'property_floorplan' =>$filenameval2
					);	
					// print_r($data);exit;
					$this->db->where('property_IDPK',$propId);
					$this->db->update('property_details', $data);
				    return true;
	}

    public function updatelistingmaster($filenameval,$propId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_masterimage' =>$filenameval,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbindividual->where('property_IDPK',$propId);
                    $this->dbindividual->update('property_details', $data);
                    return true;
        
    }

	public function deletemasterimagesdb($imageId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_masterimage' =>Null,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbindividual->where('property_IDPK',$imageId);
                    $this->dbindividual->update('property_details', $data);
                    return true;
        
    }


	public function deletefloorimagesdb($imgid)
    {
		// print_r($imageId);exit();
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_floorplan' =>NULL,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbindividual->where('property_IDPK',$imgid);
                    $this->dbindividual->update('property_details', $data);
                    return true;
    }

    public function updatelistingcoverImg($filenameval,$imgId){
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_coverimage' =>$filenameval,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbindividual->where('property_IDPK',$imgId);
                    $this->dbindividual->update('property_details', $data);
                    return true;
    }


    public function deletecoverimagesdb($imageId){
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_coverimage' =>NULL,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbindividual->where('property_IDPK',$imageId);
                    $this->dbindividual->update('property_details', $data);
                    return true;
    }


    public function updatelistingfloorplan($filenameval,$imgId)
    {
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_floorplan' =>$filenameval,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbindividual->where('property_IDPK',$imgId);
                    $this->dbindividual->update('property_details', $data);
                    return true;
    }

    public function updatelistinggalleryImgs($filenameval,$imgId)
    {
        // print_r($filenameval);exit;
        $this->dbindividual = $this->load->database('individualdb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'images_name' =>$filenameval,
                    'added_date'=>$date
                    );	
                    // print_r($data);exit;
                    $this->dbindividual->where('images_IDPK',$imgId);
                    $this->dbindividual->update('property_images', $data);
                    return true;
    }

	public function approvedindividuallists()
	{
		$this->db = $this->load->database('individualdb', TRUE);
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

	public function rejectedindividuallists()
	{
		$this->db = $this->load->database('individualdb', TRUE);
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
		left JOIN
		locality ON locality.locality_IDPK = property_details.property_localityIDFK
		LEFT JOIN
		rejection_details ON rejection_details.property_IDFK = property_details.property_IDPK
		where
		property_details.property_verify = '2'
		order by property_IDPK DESC
		";
			$query_select = $this->db->query($sql_select);
			$result=$query_select->result();
			return $result;
	}

    public function getindividuallistgalleryimages($imgId)
    {
		$this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT 
        property_images.images_IDPK,
        property_images.images_name,
		property_images.property_IDFK
        from
        `property_images`
        where
        property_images.images_IDPK = '$imgId'";
        $query_select = $this->dbindividual->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }
    
	public function getfloorplanimages($imgId)
    {
		$this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT 
        property_details.property_IDPK ,
        property_details.property_floorplan
        from
        `property_details`
        where
        property_details.property_IDPK = '$imgId'";
        $query_select = $this->dbindividual->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }

	public function getmasterplanimages($imgId)
    {
		$this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT 
        property_details.property_IDPK ,
        property_details.property_masterimage
        from
        `property_details`
        where
        property_details.property_IDPK = '$imgId'";
        $query_select = $this->dbindividual->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }
	public function getcoverimages($imgId)
    {
		$this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT 
        property_details.property_IDPK ,
        property_details.property_coverimage
        from
        `property_details`
        where
        property_details.property_IDPK = '$imgId'";
        $query_select = $this->dbindividual->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }

	public function getcoverimageswithId($imgId)
    {
		$this->dbindividual = $this->load->database('individualdb', TRUE);
        $sql_select = "SELECT 
        property_details.property_IDPK ,
        property_details.property_coverimage
        from
        `property_details`
        where
        property_details.property_IDPK = '$imgId'";
        $query_select = $this->dbindividual->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }


}