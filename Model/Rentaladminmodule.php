<?php

class rentaldb {
    public function connect(){
        // $conn = mysqli_connect('localhost', 'root', 'hOMES_247', 'homes247_rentals');
        $conn = mysqli_connect('localhost', 'root', '', 'homes247_rentals');
        if (!$conn) {
            die("P?ipojení se nezda?ilo: " . mysqli_error($conn));
        } else {
            return $conn;
        }
    }
}

class rentaladminmodule extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->db_rental = $this->load->database('rentaldb', TRUE);

	}


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

    public function get_rentallist(){
        $this->db = $this->load->database('rentaldb', TRUE);
        $sql_select = "SELECT * FROM  property_details";
        $query_select = $this->db->query($sql_select);
        return $query_select->result();
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

    public function getlistingnearby()
    {
        $this->dbrental= $this->load->database('rentaldb', TRUE);
        $sql_select = "SELECT * FROM nearby";
        $query_select = $this->dbrental->query($sql_select);
        return $query_select->result();
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

	public function getrentalimages($rentalID)
	{
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		property_images.images_IDPK AS Id,
		property_images.images_name AS name  
		FROM `property_images`
		where property_IDFK=$rentalID";
		$query_select = $this->dbrental->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->name);exit(); 
		return $query_select->result();
	}

    public function getrentalgalleryimages($imgId)
    {
        $this->db = $this->load->database('rentaldb', TRUE);
        $sql_select = "SELECT 
        property_images.images_IDPK,
        property_images.images_name,
		property_images.property_IDFK
        from
        `property_images`
        where
        property_images.images_IDPK = '$imgId'";
        $query_select = $this->db->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }





    function getProAmenities($rentalID)
    {
        $this->db = $this->load->database('rentaldb', TRUE);
        $sql_select = "
        SELECT amenities_details.properties_IDFK AS PropertyId, 
        amenities.amenities AS Name,
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
        facilities.facilities AS Name,
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



    public function insertlistinggalleryImgs($filenameval,$rentalid)
    {
        $this->dbrental = $this->load->database('rentaldb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_IDFK' =>$rentalid,
                    'images_name' =>$filenameval,
                    'added_date'=>$date
                    );	
                    // print_r($data);exit;
            $this->dbrental->insert('property_images',$data);
            return true;
    }

    function deletenearByPropId($rentalid)
    {
        $this->dbrental = $this->load->database('rentaldb', TRUE);
        // $this->db->where('properties_IDFK', $rentalid);
        // $result = $this->db->delete('nearby_details');
        // print_r($result);exit();
        // return true;
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

    function deletelistingamenities($rentalid)
    {
        // print_r($rentalid);exit();
        $this->dbrental = $this->load->database('rentaldb', TRUE);
        $this->dbrental->where('properties_IDFK', $rentalid);
        $this->dbrental->delete('amenities_details');
        return true;
    }

    function insertlistingamenities($rentalid,$checkbox)
	{
        // print_r($rentalid);exit();
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'amenities_IDFK' =>$checkbox,
				'properties_IDFK' =>$rentalid,
				'created_date'=>$date
		);
		$this->dbrental->insert('amenities_details',$data);
		return true;
	}

    function deletelistingfacilities($rentalid)
	{
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		  $this->dbrental->where('properties_IDFK', $rentalid);
			$this->dbrental->delete('facilities_details');
			return true;
	}

	function insertlistingfacilities($rentalid,$checkbox)
	{
        // print_r($rentalid);exit();
		$this->dbrental = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
				'facilities_IDFK' =>$checkbox,
				'properties_IDFK' =>$rentalid,
				'created_date'=>$date
		);
		$this->dbrental->insert('facilities_details',$data);
		return true;
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
		if(isset($data['parking']) && !empty($data['parking']) && $data['parking'] != "NULL" && $data['parking'] != "null" )
		{
			$parkingtypedb = $data['parking'];	
		}else{
			$parkingtypedb = NULL;
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
			'parking' =>$parkingtypedb,
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


    public function approval($id)
    {
		// print_r($id);exit();
        $this->dbrental = $this->load->database('rentaldb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
            'property_verify'=>'0',
            'property_updated'=>$date
            );
            $this->dbrental->where('property_IDPK',$id);
            $this->dbrental->update('property_details', $data);

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
		order by property_updated DESC
		";
			$query_select = $this->db->query($sql_select);
			$result=$query_select->result();
			return $result;
	}

    public function approvedrentalrentallist()
    {
        $this->rentaldb = $this->load->database('rentaldb', TRUE);
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
        order by property_updated DESC
        ";
            $query_select = $this->rentaldb->query($sql_select);
            $result=$query_select->result();
            return $result;
    }

	public function getrentalcoverimage($id)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		property_IDPK  AS Id,
		property_coverimage AS imagename
		FROM `property_details`
		where property_IDPK = $id";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->imagename);exit(); 
		return $query_select->result();
	}


	public function getrentalcoverimageforedit($id)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$sql_select = "SELECT 
		property_IDPK  AS Id,
		property_coverimage AS imagename
		FROM `property_details`
		where property_IDPK = $id";
		$query_select = $this->db->query($sql_select);
		$result = $query_select->result();
		// print_r($result[0]->imagename);exit(); 
		return $query_select->result();
	}

	public function insertcover_image($filenameval2,$rentalid){
		$this->db = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'property_coverimage' =>$filenameval2
					);	
					//print_r($data);exit;
					$this->db->where('property_IDPK',$rentalid);
					$this->db->update('property_details', $data);
				    return true;
		
	}

	public function updaterentalcoverImg($file_name,$imgId)
	{
		// print_r($file_name);exit();
		$this->dbrental= $this->load->database('rentaldb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_coverimage' =>$file_name,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbrental->where('property_IDPK',$imgId);
                    $this->dbrental->update('property_details', $data);
                    return true;
    }



	public function updaterentalcoverimage($imgId)
	{
		// print_r($file_name);exit();
		$this->dbrental= $this->load->database('rentaldb', TRUE);
        $date= date('Y-m-d H:i:s');
        $data = array(
                    'property_coverimage' =>NULL,
                    'property_updated'=>$date
                    );	
                    //print_r($data);exit;
                    $this->dbrental->where('property_IDPK',$imgId);
                    $this->dbrental->update('property_details', $data);
                    return true;
    }











    // public function updaterentalcoverImg($file_name,$imgId)
	// {
	// 	$this->dbrental = $this->load->database('rentaldb', TRUE);
	// 	$date= date('Y-m-d H:i:s');
	// 	$data = array(
	// 				'property_coverimage' =>$file_name,
	// 				'property_updated'=>$date
	// 				);	
	// 				// print_r($data);exit;
	// 				$this->dbrental->where('property_IDPK',$rentalID);
	// 				$result =$this->dbrental->update('property_details', $data);
	// 				// print_r($result);exit;
	// 				return true;
		
	// }

	public function getcoverimages($imgId)
    {
		$this->dbrental= $this->load->database('rentaldb', TRUE);
        $sql_select = "SELECT 
        property_details.property_IDPK ,
        property_details.property_coverimage
        from
        `property_details`
        where
        property_details.property_IDPK = '$imgId'";
        $query_select = $this->dbrental->query($sql_select);
        $result=$query_select->result();
        // print_r($result);
        return $result;
    }



	public function updaterentalgalleryImgs($file_name,$imgId)
	{
		// print_r($file_name);exit;
		$this->dbrental= $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
					'images_name' =>$file_name,
					'added_date'=>$date
					);	
					$this->dbrental->where('images_IDPK',$imgId);
					$result = $this->dbrental->update('property_images', $data);
					// print_r($result);exit;
					return true;
		
	}

	function deleterentalimage($ImgId)
	{
		$this->db = $this->load->database('rentaldb', TRUE);
		$this->db->where('images_IDPK', $ImgId);
		$this->db->delete('property_images');
		return true;
	}



	public function rejectionreason($id,$reason)
	{
		// $conn = mysqli_connect("localhost", "root", "", "homes247_rentals");
		// $this->dbrental = $this->load->database('rentaldb', TRUE);
		// $sql_query1 = mysqli_query($conn,"SELECT * FROM `rejection_details` WHERE `property_IDFK` = '$id'");
		// $num_rows = mysqli_num_rows($sql_query1);

		$sql_select = "SELECT * FROM `rejection_details` WHERE `property_IDFK` = '$id'";
		$query_select = $this->db_rental->query($sql_select);
		$result=$query_select->result();
		$num_rows=$query_select->num_rows();
		// print_r($num_rows);exit();
		$date= date('Y-m-d H:i:s');
		if($num_rows >= 1){
			$data = array(
				'rejection_reason' =>$reason,
				'created_date' =>$date
			);
				$this->db_rental->where('property_IDFK', $id);
				$this->db_rental->update('rejection_details',$data);
			
		}else{
			$data =array(
				'rejection_reason' =>$reason,
				'property_IDFK' =>$id,
				'created_date' =>$date
			);
				$this->db_rental->insert('rejection_details',$data);
		}
		// print_r($sql_query1);exit();
		return true;
	}


	public function rejection($id)
	{ 
		// print_r($id);exit();
		// $this->dbrental = $this->load->database('rentaldb', TRUE);
		$date= date('Y-m-d H:i:s');
		$data = array(
			'property_verify'=>'2',
			'property_updated'=>$date
			);
			$this->db_rental->where('property_IDPK',$id);
			$this->db_rental->update('property_details', $data);
	    	$sql_select = "
			SELECT 
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
			where property_IDPK=$id";
			$query_select = $this->db_rental->query($sql_select);
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

// ============================================== rentaladminmodule =========================================
}