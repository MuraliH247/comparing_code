<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: PUT, GET, OPTIONS, POST ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");





class individuallistbackend extends CI_Controller 
{

    public function __construct()
	{
			
		parent::__construct();
				$this->load->library('pagination');
				$this->load->model('backendmodule');
				$this->load->model('individuallistbackendmodule');
				$this->load->helper(array('form', 'url'));
				$this->load->library('session');
				$this->load->library('image_lib');
				$data['title'] = 'Multiple file upload';
    }
    
    function get_city()
	{
		$ret_arr=$this->individuallistbackendmodule->get_city();
		if($ret_arr){
			$city['status']='True';
			$city['message']='successfully done';
			$city['success']='success';
			$city['citys'] = $ret_arr;
		}else{
			$city['status']='False';
			$city['message']='A Database Error Occurred';
			$city['success']='failed';
		}
		
		 echo json_encode($city, true);
	}

	function get_approvals()
	{
		$cityid=$_POST['Cityid'];
		$approvals=$this->individuallistbackendmodule->getapproval($cityid);

		if($approvals){
			$data['status']='True';
			$data['message']='successfully done';
			$data['success']='success';
			$data['Approvals'] = $approvals;
		}else{
			$data['status']='False';
			$data['message']='A Database Error Occurred';
			$data['success']='failed';
		}
		 echo json_encode($data, true);
	}

	function datafilters()
	{
		$bhk=$this->individuallistbackendmodule->get_bhk();
		$bathroom=$this->individuallistbackendmodule->get_bathroom();
		$balcony=$this->individuallistbackendmodule->get_balcony();
		$furnish=$this->individuallistbackendmodule->get_furnish();
		$proptypes=$this->individuallistbackendmodule->get_propertytype();
		$ownership=$this->individuallistbackendmodule->get_ownership();
		$doorface=$this->individuallistbackendmodule->get_doorface();
		$amenities=$this->individuallistbackendmodule->get_amenities();
		$facilities=$this->individuallistbackendmodule->get_facilities();
		$approvals=$this->individuallistbackendmodule->get_approvals();
		$nearby=$this->individuallistbackendmodule->get_nearby();
		$parking=$this->individuallistbackendmodule->get_parking();
		$plottype=$this->individuallistbackendmodule->get_plottype();
		$plotsize=$this->individuallistbackendmodule->get_plotsize();
		if($bhk){
			$data['status']='True';
			$data['message']='successfully done';
			$data['success']='success';
			$data['Bhks'] = $bhk;
			$data['Bathroom'] = $bathroom;
			$data['Balcony'] = $balcony;
			$data['Furnish'] = $furnish;
			$data['Propertytype'] = $proptypes;
			$data['Ownership'] = $ownership;
			$data['Doorface'] = $doorface;
			$data['Amenities'] = $amenities;
			$data['Facilities'] = $facilities;
			$data['Approvals'] = $approvals;
			$data['Nearby'] = $nearby;
			$data['Parking'] = $parking;
			$data['PlotType'] = $plottype;
			$data['PlotSize'] = $plotsize;
		}else{
			$data['status']='False';
			$data['message']='A Database Error Occurred';
			$data['success']='failed';
		}
		 echo json_encode($data, true);
	}

	function getPropertyzone()
	{
		if(isset($_POST['cityid']) && !empty($_POST['cityid']) && $_POST['cityid']!="null" )
		{
		$cityId=$_POST['cityid'];
		}
		else
		{
			$cityId="";
		}

		$ret_arr=$this->individuallistbackendmodule->getcitybasedzone($cityId);
	   
	   if($ret_arr){
		   $referList['status']='True';
		   $referList['message']='successfully done';
		   $referList['success']='success';
		   $referList['Zones'] = $ret_arr;
	   }else{
		   $referList['status']='True';
		   $referList['message']='No Data is there';
		   $referList['success']='success';
	   }
		echo json_encode($referList, true);
	}

	function getcity_basedLocation()
	{
		/*based on Zone*/
		if(isset($_POST['zone']) && !empty($_POST['zone']) && $_POST['zone']!="null" )
		{
		$zoneId=$_POST['zone'];
		}
		else
		{
			$zoneId="";
		}

		$id=$_POST['cityId'];
		$ret_arr=$this->individuallistbackendmodule->get_locality_basedLocation($id,$zoneId);
	   
	   if($ret_arr){
		   $referList['status']='True';
		   $referList['message']='successfully done';
		   $referList['success']='success';
		   $referList['details'] = $ret_arr;
	   }else{
		   $referList['status']='True';
		   $referList['message']='No Data is there';
		   $referList['success']='success';
	   }
	   
		echo json_encode($referList, true);
    }
    
    function get_propertyById()
	{
		$id=$_POST['propId'];
		$data['propertydetails']=$this->individuallistbackendmodule->get_propertyById($id);
		$i = 0;
			foreach($data['propertydetails'] as $val){
				$img="images";
				$images=$this->individuallistbackendmodule->getProImg($val->PropertyID);
				$data['propertydetails'][$i]->$img = $images;
				$Amenities="Amenities";
				$Amenitieseatils=$this->individuallistbackendmodule->getProAmenities($val->PropertyID);
				$data['propertydetails'][$i]->$Amenities = $Amenitieseatils;
				$facilities="Facilities";
				$facilitiesdeatils=$this->individuallistbackendmodule->getProFacilities($val->PropertyID);
				$data['propertydetails'][$i]->$facilities = $facilitiesdeatils;
				$Approvals="Approvals";
				$approvalsdetails=$this->individuallistbackendmodule->getProapprovals($val->PropertyID);
				$data['propertydetails'][$i]->$Approvals = $approvalsdetails;
				$Nearby="Nearby";
				$nearbydetails=$this->individuallistbackendmodule->getnearby($val->PropertyID);
				$data['propertydetails'][$i]->$Nearby = $nearbydetails;
				if(isset($_POST['userId']) && !empty($_POST['userId']))
					{
						$check=array();
						$check['userId']=$_POST['userId'];
						$check['propId']=$val->propertydetails;
						$user_fav="user_fav";
						$user_fav_result=$this->individuallistbackendmodule->check_user_favourite_prop($check);
						$data['propertydetails'][$i]->$user_fav = $user_fav_result;
						$user_recent="recentview";
						$user_recent_result=$this->individuallistbackendmodule->check_user_recent_view($check);
						$data['propertydetails'][$i]->$user_recent = $user_recent_result;
					}
			        $i++;
                    }
                    if($data){
                    $data['status']='True';
                    $data['message']='successfully done';
                    $data['success']='success';
                    }else{
                        $data['status']='False';
                        $data['message']='A Database Error Occurred';
                        $data['success']='failed';
                    }
		            echo json_encode($data);
		
    }
    
    function listings($city="")
	{
		/*based on location*/
		$city=str_replace('-', ' ', $city);
		if( !empty($this->uri->segment(3)) && $this->uri->segment(3) != "null" )
		{
		$city=$this->uri->segment(3);
		$city=$this->individuallistbackendmodule->getPropertyLocationId($city);
		$city=$city['city_IDPK'];
		}
		else
		{
			$city="";
		}

		/*based on limit*/
		if(isset($_GET['limit']) )
		{
		$limit=$_GET['limit'];
		}
		else
		{
			$limit="";
		}

		/*based on limitrows*/
		if(isset($_GET['limitrows']) )
		{
		$limitrows=$_GET['limitrows'];
		}
		else
		{
			$limitrows="";
		}

		/*based on locality*/
		if(isset($_GET['locality']) && !empty($_GET['locality']) && $_GET['locality']!="null" )
		{
		$localityId=$_GET['locality'];
		}
		else
		{
			$localityId="";
		}
		/*based on buliderId*/
	
		if(isset($_GET['buliderId']) && !empty($_GET['buliderId']) && $_GET['buliderId']!="null" )
		{
		$buliderId=$_GET['buliderId'];
		}
		else
		{
			$buliderId="";
		}

		// Based on Regions

		if(isset($_GET['regionid']) && !empty($_GET['regionid']) && $_GET['regionid']!="null" )
		{
		$regionid=$_GET['regionid'];
		}
		else
		{
			$regionid="";
		}

		// Based on Status

		if(isset($_GET['statusid']) && !empty($_GET['statusid']) && $_GET['statusid']!="null" )
		{
		$statusid=$_GET['statusid'];
		}
		else
		{
			$statusid="";
		}

		// Based on Property type

		if(isset($_GET['proptypeid']) && !empty($_GET['proptypeid']) && $_GET['proptypeid']!="null" )
		{
		$typeid=$_GET['proptypeid'];
		}
		else
		{
			$typeid="";
		}

		/*based on bedroom*/
	
		if(isset($_GET['bedroom']) && !empty($_GET['bedroom']) && $_GET['bedroom']!="null")
		{
		$bedroom=$_GET['bedroom'];
		}
		else
		{
			$bedroom="";
		}

		/*based on bathroom*/
	
		if(isset($_GET['bathroom']) && !empty($_GET['bathroom']) && $_GET['bathroom']!="null")
		{
		$bathroom=$_GET['bathroom'];
		}
		else
		{
			$bathroom="";
		}

		// based on ownership
		if(isset($_GET['ownership']) && !empty($_GET['ownership']) && $_GET['ownership']!="null")
		{
		$ownership=$_GET['ownership'];
		}
		else
		{
			$ownership="";
		}

		/*based on furnish*/
		if(isset($_GET['furnish']) && !empty($_GET['furnish']) && $_GET['furnish']!="null")
		{
		$furnish=$_GET['furnish'];
		}
		else
		{
			$furnish="";
		}


		/*based on MIN_budget*/
	
		if(isset($_GET['minprice']) && !empty($_GET['minprice']) && $_GET['minprice']!="null")
		{
			$minprice=$_GET['minprice'];
		}
		else
		{
			$minprice="";
		}

		// based on MAX_PRICE

		if(isset($_GET['maxprice']) && !empty($_GET['maxprice']) && $_GET['maxprice']!="null")
		{
			$maxprice=$_GET['maxprice'];
		}
		else
		{
			$maxprice="";
		}

		/*based on furnish*/
		if(isset($_GET['doorface']) && !empty($_GET['doorface']) && $_GET['doorface']!="null")
		{
		$doorface=$_GET['doorface'];
		}
		else
		{
			$doorface="";
		}
		/*based on balcony*/
	
		if(isset($_GET['balcony']) && !empty($_GET['balcony']) && $_GET['balcony']!="null")
		{
		$balcony=$_GET['balcony'];
		}
		else
		{
			$balcony="";
		}
	
		$data['listings']=$this->individuallistbackendmodule->getlistings($limit,$limitrows,$city,$localityId,$buliderId,$regionid,$statusid,$typeid,$bedroom,$bathroom,$ownership,$furnish,$minprice,$maxprice,$doorface,$balcony);
		$i = 0;
        foreach($data['listings'] as $val)
        {
			if(isset($_GET['userId']) && !empty($_GET['userId']))
			{
			$check=array();
			$check['userId']=$_GET['userId'];
			$check['propId']=$val->property_info_IDPK;
			$user_fav="user_fav";
			$user_fav_result=$this->backendmodule->check_user_favourite_prop($check);
			$data['listings'][$i]->$user_fav = $user_fav_result;
			$user_recent="recentview";
			$user_recent_result=$this->backendmodule->check_user_recent_view($check);
			$data['listings'][$i]->$user_recent = $user_recent_result;
			}
		    $i++;
		}
		
		 if($data){
		$data['status']='True';
		$data['message']='successfully done';
		$data['success']='success';
		}else{
			$data['status']='False';
			$data['message']='A Database Error Occurred';
			$data['success']='failed';
		}

		echo json_encode($data);
	}

	function listing_counts($city="")
	{
		/*based on location*/
		$city=str_replace('-', ' ', $city);
		if( !empty($this->uri->segment(3)) && $this->uri->segment(3) != "null" )
		{
		$city=$this->uri->segment(3);
		$city=$this->individuallistbackendmodule->getPropertyLocationId($city);
		$city=$city['city_IDPK'];
		}
		else
		{
			$city="";
		}

		/*based on locality*/
		if(isset($_GET['locality']) && !empty($_GET['locality']) && $_GET['locality']!="null" )
		{
		$localityId=$_GET['locality'];
		}
		else
		{
			$localityId="";
		}
		/*based on buliderId*/
	
		if(isset($_GET['buliderId']) && !empty($_GET['buliderId']) && $_GET['buliderId']!="null" )
		{
		$buliderId=$_GET['buliderId'];
		}
		else
		{
			$buliderId="";
		}

		// Based on Regions

		if(isset($_GET['regionid']) && !empty($_GET['regionid']) && $_GET['regionid']!="null" )
		{
		$regionid=$_GET['regionid'];
		}
		else
		{
			$regionid="";
		}

		// Based on Status

		if(isset($_GET['statusid']) && !empty($_GET['statusid']) && $_GET['statusid']!="null" )
		{
		$statusid=$_GET['statusid'];
		}
		else
		{
			$statusid="";
		}

		// Based on Property type

		if(isset($_GET['proptypeid']) && !empty($_GET['proptypeid']) && $_GET['proptypeid']!="null" )
		{
		$typeid=$_GET['proptypeid'];
		}
		else
		{
			$typeid="";
		}

		/*based on bedroom*/
	
		if(isset($_GET['bedroom']) && !empty($_GET['bedroom']) && $_GET['bedroom']!="null")
		{
		$bedroom=$_GET['bedroom'];
		}
		else
		{
			$bedroom="";
		}

		/*based on bathroom*/
	
		if(isset($_GET['bathroom']) && !empty($_GET['bathroom']) && $_GET['bathroom']!="null")
		{
		$bathroom=$_GET['bathroom'];
		}
		else
		{
			$bathroom="";
		}


		// based on ownership
		if(isset($_GET['ownership']) && !empty($_GET['ownership']) && $_GET['ownership']!="null")
		{
		$ownership=$_GET['ownership'];
		}
		else
		{
			$ownership="";
		}

		/*based on furnish*/
		if(isset($_GET['furnish']) && !empty($_GET['furnish']) && $_GET['furnish']!="null")
		{
		$furnish=$_GET['furnish'];
		}
		else
		{
			$furnish="";
		}


		/*based on MIN_budget*/
	
		if(isset($_GET['minprice']) && !empty($_GET['minprice']) && $_GET['minprice']!="null")
		{
			$minprice=$_GET['minprice'];
		}
		else
		{
			$minprice="";
		}

		// based on MAX_PRICE

		if(isset($_GET['maxprice']) && !empty($_GET['maxprice']) && $_GET['maxprice']!="null")
		{
			$maxprice=$_GET['maxprice'];
		}
		else
		{
			$maxprice="";
		}

		/*based on furnish*/
		if(isset($_GET['doorface']) && !empty($_GET['doorface']) && $_GET['doorface']!="null")
		{
		$doorface=$_GET['doorface'];
		}
		else
		{
			$doorface="";
		}
		/*based on balcony*/
	
		if(isset($_GET['balcony']) && !empty($_GET['balcony']) && $_GET['balcony']!="null")
		{
		$balcony=$_GET['balcony'];
		}
		else
		{
			$balcony="";
		}
	
		$data['Counts']=$this->individuallistbackendmodule->getlistingscount($city,$localityId,$buliderId,$regionid,$statusid,$typeid,$bedroom,$bathroom,$ownership,$furnish,$minprice,$maxprice,$doorface,$balcony);
		
		 if($data){
		$data['status']='True';
		$data['message']='successfully done';
		$data['success']='success';
		}else{
			$data['status']='False';
			$data['message']='A Database Error Occurred';
			$data['success']='failed';
		}

		echo json_encode($data);
	}

	function propertyautocomplete()
	{
		// $this->db = $this->load->database('individualdb', TRUE);
		$city_id = $_POST['city_id'];
		$type_id = $_POST['Property_typeid'];
		$query =$this->db->query("SELECT 
		city.city_name AS city, 
		locality.locality_name AS localityname,
		property_info_name AS val, 
		property_info_IDPK as id,
		property_info_builderinfoIDFK AS builderid
			FROM 
			`property_info` 
			LEFT JOIN city ON city.city_IDPK = property_info.property_info_cityIDFK
			LEFT JOIN locality ON locality.locality_IDPK = property_info.property_info_localityIDFK
			WHERE property_info.property_info_cityIDFK='$city_id' AND property_info.property_info_propertyTypeIDFK='$type_id' AND property_info.property_info_delete_status=0");
			$list= $query->result_array();
			
			$value = array();
			$y = 0;
			foreach($list as $val){
			$value[$y]['name'] = $val['val'];
			$value[$y]['id'] = $val['id'];
			$value[$y]['city'] = $val['city'];
			$value[$y]['locality'] = $val['localityname'];
			$value[$y]['Builder'] = $val['builderid'];
			$value[$y]['type'] ='property_name';
			//$value[$j]['city_names'] = $value1;
			$y++;
			}
			if($value){
				$listItems['status']='True';
				$listItems['message']='successfully done';
				$listItems['success']='success';
				$listItems['autolist']=$value;
				}else{
					$listItems['status']='False';
					$listItems['message']='A Database Error Occurred';
					$listItems['success']='failed';
				}
			   echo json_encode($listItems);
	}

	function postproperty()
	{
		$userid = $_GET['Userid'];
		$username = $_GET['Username'];
		// $username = "TEST USER";
		/*Propertyname checker*/
		if(isset($_GET['Propertyname']) && !empty($_GET['Propertyname']) && $_GET['Propertyname']!="null" )
		{
			$propname=$_GET['Propertyname'];
		}
		else
		{
			$propname="";
		}
		/*Price checker*/
		if(isset($_GET['Price']) && !empty($_GET['Price']) && $_GET['Price']!="null" )
		{
			$propprice=$_GET['Price'];
		}
		else
		{
			$propprice="";
		}
		/*Maintanencecharge checker*/
		if(isset($_GET['Maintanencecharge']) && !empty($_GET['Maintanencecharge']) && $_GET['Maintanencecharge']!="null" )
		{
			$maintanence=$_GET['Maintanencecharge'];
		}
		else
		{
			$maintanence="";
		}
		/*Totalfloor checker*/
		if(isset($_GET['Totalfloor']) && !empty($_GET['Totalfloor']) && $_GET['Totalfloor']!="null" )
		{
			$totalfloor=$_GET['Totalfloor'];
		}
		else
		{
			$totalfloor="";
		}
		/*Propertyfloor checker*/
		if(isset($_GET['Propertyfloor']) && !empty($_GET['Propertyfloor']) && $_GET['Propertyfloor']!="null" )
		{
			$propfloor=$_GET['Propertyfloor'];
		}
		else
		{
			$propfloor="";
		}
		/*Doorfacing checker*/
		if(isset($_GET['Doorfacing']) && !empty($_GET['Doorfacing']) && $_GET['Doorfacing']!="null" )
		{
			$doorface=$_GET['Doorfacing'];
		}
		else
		{
			$doorface="";
		}
		/*City checker*/
		if(isset($_GET['City']) && !empty($_GET['City']) && $_GET['City']!="null" )
		{
			$city=$_GET['City'];
			$cityname = $this->individuallistbackendmodule->getcity($city);
			$cityval = $cityname[0]->city_name;
			// print_r($cityval);exit();
		}
		else
		{
			$city="";
		}
		/*Locality checker*/
		if(isset($_GET['Locality']) && !empty($_GET['Locality']) && $_GET['Locality']!="null" )
		{
			$locality=$_GET['Locality'];
		}
		else
		{
			$locality="";
		}
		/*Region checker*/
		if(isset($_GET['Region']) && !empty($_GET['Region']) && $_GET['Region']!="null" )
		{
			$region=$_GET['Region'];
		}
		else
		{
			$region="";
		}
		/*PropertyType checker*/
		if(isset($_GET['PropertyType']) && !empty($_GET['PropertyType']) && $_GET['PropertyType']!="null" )
		{
			$proptype=$_GET['PropertyType'];
			$proptypename = $this->individuallistbackendmodule->getpropertytype($proptype);
			$proptypeval = $proptypename[0]->property_type;
			// print_r($proptypeval);exit();
		}
		else
		{
			$proptype="";
		}
		/*BuildingType checker*/
		if(isset($_GET['BuildingType']) && !empty($_GET['BuildingType']) && $_GET['BuildingType']!="null" )
		{
			$buildtype=$_GET['BuildingType'];
		}
		else
		{
			$buildtype="";
		}
		/*Status checker*/
		if(isset($_GET['Status']) && !empty($_GET['Status']) && $_GET['Status']!="null" )
		{
			$propstatus=$_GET['Status'];
		}
		else
		{
			$propstatus="";
		}
		/*Furnish checker*/
		if(isset($_GET['Furnish']) && !empty($_GET['Furnish']) && $_GET['Furnish']!="null" )
		{
			$propfurnish=$_GET['Furnish'];
		}
		else
		{
			$propfurnish="";
		}
		/*Ownership checker*/
		if(isset($_GET['Ownership']) && !empty($_GET['Ownership']) && $_GET['Ownership']!="null" )
		{
			$propownership=$_GET['Ownership'];
		}
		else
		{
			$propownership="";
		}
		/*PossesionDate checker*/
		if(isset($_GET['PossesionDate']) && !empty($_GET['PossesionDate']) && $_GET['PossesionDate']!="null" )
		{
			$proppossesion=$_GET['PossesionDate'];
		}
		else
		{
			$proppossesion="";
		}
		/*PropertyAgeyear checker*/
		if(isset($_GET['PropertyAgeYear']) && !empty($_GET['PropertyAgeYear']) && $_GET['PropertyAgeYear']!="null" )
		{
			$propageyear=$_GET['PropertyAgeYear'];
		}
		else
		{
			$propageyear="";
		}
		/*PropertyAgemonth checker*/
		if(isset($_GET['PropertyAgeMonth']) && !empty($_GET['PropertyAgeMonth']) && $_GET['PropertyAgeMonth']!="null" )
		{
			$propagemonth=$_GET['PropertyAgeMonth'];
		}
		else
		{
			$propagemonth="";
		}
		/*BrokerageCharge checker*/
		if(isset($_GET['BrokerageCharge']) && !empty($_GET['BrokerageCharge']) && $_GET['BrokerageCharge']!="null" )
		{
			$brokerage=$_GET['BrokerageCharge'];
		}
		else
		{
			$brokerage="";
		}
		/*Address checker*/
		if(isset($_GET['Address']) && !empty($_GET['Address']) && $_GET['Address']!="null" )
		{
			$Propaddress=$_GET['Address'];
		}
		else
		{
			$Propaddress="";
		}
		/*Zipcode checker*/
		if(isset($_GET['Zipcode']) && !empty($_GET['Zipcode']) && $_GET['Zipcode']!="null" )
		{
			$zipcode=$_GET['Zipcode'];
		}
		else
		{
			$zipcode="";
		}
		/*Description checker*/
		if(isset($_GET['Description']) && !empty($_GET['Description']) && $_GET['Description']!="null" )
		{
			$descrip=$_GET['Description'];
		}
		else
		{
			$descrip="";
		}
		/*BHK checker*/
		if(isset($_GET['BHK']) && !empty($_GET['BHK']) && $_GET['BHK']!="null" )
		{
			$bhk=$_GET['BHK'];
			$bhkname = $this->individuallistbackendmodule->getbhkname($bhk);
			$bhkval = $bhkname[0]->bhk;
			// print_r($bhkval);exit();
		}
		else
		{
			$bhk="";
			$bhkval="";
		}
		/*Bathroom checker*/
		if(isset($_GET['Bathroom']) && !empty($_GET['Bathroom']) && $_GET['Bathroom']!="null" )
		{
			$bathroom=$_GET['Bathroom'];
		}
		else
		{
			$bathroom="";
		}
		/*Balcony checker*/
		if(isset($_GET['Balcony']) && !empty($_GET['Balcony']) && $_GET['Balcony']!="null" )
		{
			$balcony=$_GET['Balcony'];
		}
		else
		{
			$balcony="";
		}
		/*Area checker*/
		if(isset($_GET['Area']) && !empty($_GET['Area']) && $_GET['Area']!="null" )
		{
			$area=$_GET['Area'];
		}
		else
		{
			$area="";
		}
		/*AreaType checker*/
		if(isset($_GET['AreaType']) && !empty($_GET['AreaType']) && $_GET['AreaType']!="null" )
		{
			$areatype=$_GET['AreaType'];
		}
		else
		{
			$areatype="";
		}
		/*Openparking checker*/
		if(isset($_GET['Openparking']) && !empty($_GET['Openparking']) && $_GET['Openparking']!="null" )
		{
			$openparking=$_GET['Openparking'];
		}
		else
		{
			$openparking="";
		}
		/*Coveredparking checker*/
		if(isset($_GET['Coveredparking']) && !empty($_GET['Coveredparking']) && $_GET['Coveredparking']!="null" )
		{
			$coveredparking=$_GET['Coveredparking'];
		}
		else
		{
			$coveredparking="";
		}
		/*Khatatype checker*/
		if(isset($_GET['Khatatype']) && !empty($_GET['Khatatype']) && $_GET['Khatatype']!="null" )
		{
			$khatatype=$_GET['Khatatype'];
		}
		else
		{
			$khatatype="";
		}
		/*Watersupply checker*/
		if(isset($_GET['Watersupply']) && !empty($_GET['Watersupply']) && $_GET['Watersupply']!="null" )
		{
			$watersupply=$_GET['Watersupply'];
		}
		else
		{
			$watersupply="";
		}
		/*Amenities checker*/
		if(isset($_GET['Amenities']) && !empty($_GET['Amenities']) && $_GET['Amenities']!="null" )
		{
			$amenity=$_GET['Amenities'];
		}
		else
		{
			$amenity="";
		}
		/*Facilities checker*/
		if(isset($_GET['Facilities']) && !empty($_GET['Facilities']) && $_GET['Facilities']!="null" )
		{
			$facility=$_GET['Facilities'];
		}
		else
		{
			$facility="";
		}
		/*Approvals checker*/
		if(isset($_GET['Approvals']) && !empty($_GET['Approvals']) && $_GET['Approvals']!="null" )
		{
			$approval=$_GET['Approvals'];
		}
		else
		{
			$approval="";
		}
		/*Nearby checker*/
		if(isset($_GET['Nearby']) && !empty($_GET['Nearby']) && $_GET['Nearby']!="null" )
		{
			$nearby=$_GET['Nearby'];
		}
		else
		{
			$nearby="";
		}
		/*Nearby Details Checker*/
		if(isset($_GET['Nearbydetails']) && !empty($_GET['Nearbydetails']) && $_GET['Nearbydetails']!="null" )
		{
			$nearbydetails=$_GET['Nearbydetails'];
		}
		else
		{
			$nearbydetails="";
		}
		/*PlotType Details Checker*/
		if(isset($_GET['PlotType']) && !empty($_GET['PlotType']) && $_GET['PlotType']!="null" )
		{
			$plottype=$_GET['PlotType'];
		}
		else
		{
			$plottype="";
		}
		/*PlotSize Details Checker*/
		if(isset($_GET['PlotSize']) && !empty($_GET['PlotSize']) && $_GET['PlotSize']!="null" )
		{
			$plotsize=$_GET['PlotSize'];
		}
		else
		{
			$plotsize="";
		}
		/*plotAge Details Checker*/
		if(isset($_GET['PlotAge']) && !empty($_GET['PlotAge']) && $_GET['PlotAge']!="null" )
		{
			$plotage=$_GET['PlotAge'];
		}
		else
		{
			$plotage="";
		}
		/*plotAge Details Checker*/
		if(isset($_GET['Parking']) && !empty($_GET['Parking']) && $_GET['Parking']!="null" )
		{
			$parking=$_GET['Parking'];
		}
		else
		{
			$parking="";
		}
		/*Building Details Checker*/
		if(isset($_GET['BuilderID']) && !empty($_GET['BuilderID']) && $_GET['BuilderID']!="null" )
		{
			$builderid=$_GET['BuilderID'];
		}
		else
		{
			$builderid="";
		}
		$date= date('Y-m-d');
		
		
		$ret_arr=$this->individuallistbackendmodule->addlisting($userid,$propname,$propprice,$maintanence,$totalfloor,$propfloor,$doorface,$city,$locality,$region,$proptype,$buildtype,$propstatus,$propfurnish,$propownership,$proppossesion,$propageyear,$propagemonth,$brokerage,$Propaddress,$zipcode,$descrip,$bhk,$bathroom,$balcony,$area,$areatype,$openparking,$coveredparking,$khatatype,$watersupply,$amenity,$facility,$approval,$nearby,$nearbydetails,$plottype,$plotsize,$plotage,$parking,$builderid);
		// print_r($ret_arr);exit();
		$userdetails = $this->individuallistbackendmodule->getuserdetails($userid);
		// print_r($userdetails[0]->user_email);exit();
	   if($ret_arr){
		// require_once 'Swift-5.0.1/lib/swift_required.php';
		// $trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
		// ->setUsername('indiaestatehomes@gmail.com')
		// ->setPassword('homesindiaestate');

		// 	// Mail Sending Body for Admin
		// 	$body="<p style='font-size:18px; margin-bottom:0px;'>Dear Admin,</p>"."<br />
		// 	"."<p style='margin-bottom:0px; margin-top:0px;'>We got a New Individual Listing Request From ". $username .".</p><br />
		// 	"."<p style='margin-bottom:0px; margin-top:0px;'>Mr/Ms ". $username ." has posted a property on Resale Section. Please do hurry & verify the listing.</p><br />
		// 	"."<p style='margin:0px;'>Given Details.</p><br />
		// 	"."Project Details: ". $bhkval ."". ' ' ."". $proptypeval ." in ". $propname ." , ". $locality ." , ". $cityval ." <br />
		// 	"."Posted Date : ". $date ."<br />
		// 	"."<p style='margin-bottom:15px;margin-top: 0px;'>Please verify and approve it soon.</p>
		// 	"."<p style='margin-bottom:15px;margin-top: 0px;'>Thanks and Regards,</p>
		// 	"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
		// 	";
		// 	$mailer     = Swift_Mailer::newInstance($trnsport);
		// 	$message    = Swift_Message::newInstance('Web Lead');
		// 	$message ->setFrom(array('indiaestatehomes@gmail.com' => 'New Individual Listings Request'));
		// 	$message ->setTo(array('reachus@homes247.in'));
		// 	// $message ->setTo(array('abijith@homes247.in'));
		// 	$message ->setCc(array('priyatham@homes247.in','abijith@homes247.in'));
		// 	$message ->setSubject("New Individual Listings Request From ".$username);
		// 	$message ->setBody($body, 'text/html');
		// 	$result = $mailer->send($message);

			if($userdetails[0]->user_email != ''){
				// Mail Sending Body for Customers
				// $body="<p style='font-size:18px; margin-bottom:0px;'>Hello ". $username .",</p>"."<br />
				// 	<p style='font-size:18px; margin-bottom:0px;'>Greetings from Homes247.in</p>"."<br />
                //     "."<p style='margin-bottom:0px; margin-top:0px;'>Thank you for Considering Homes247.in to list your property for Sale.
				// 	Your Property will be live after the verification within 24 hours. Get ready for Free & Faster Leads from Homes247.in</p><br />
				// 	"."<p style='margin:0px;'>Basic Details you given.</p><br />
				// 	"."<strong>Property Details</strong> : ". $bhkval ."". ' ' ."". $proptypeval ." in ". $propname ." , ". $locality ." , ". $cityval ." <br />
				// 	"."Posted Date : ". $date ."<br />
				// 	"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
				// 	"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
				// 	";
                //     $mailer     = Swift_Mailer::newInstance($trnsport);
                //     $message    = Swift_Message::newInstance('Listing Confirmation');
                //     $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                //     // $message ->setTo(array('abijith@homes247.in'));
                //     $message ->setTo(array($userdetails[0]->user_email));
                //     // $message ->setCc(array('reachus@homes247.in'));
                //     $message ->setBcc(array('priyatham@homes247.in','abijith@homes247.in'));
                //     $message ->setSubject("Listing Confirmation");
                //     $message ->setBody($body, 'text/html');
				// 	$result = $mailer->send($message);

			}else{

			}
			

		   $referList['status']='True';
		   $referList['message']='Data Successfully Added';
		   $referList['success']='success';
		   $referList['Data']=$ret_arr;
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Added';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function imageupload()
	{
		$propid = $_POST['PropID'];
		$coverfilename=$_FILES['cover']['name'];
		$coverfile_name1 =time()."-".$_FILES['cover']['name'];
		$coverfile_size =$_FILES['cover']['size'];
		$coverfile_tmp =$_FILES['cover']['tmp_name'];
		$coverfile_type=$_FILES['cover']['type'];
		$covertarget_dir = "images/individuallistings/cover/";
		$finalcovername=time()."-".$coverfilename;
		if(is_dir("$covertarget_dir/".$coverfile_name1)==false)
		{
		file_put_contents($covertarget_dir.$coverfile_name1, file_get_contents($coverfile_tmp));
		}

		if(!empty($_FILES['master']['name'])) 
		{
			$masterfilename=$_FILES['master']['name'];
			$masterfile_name1 =time()."-".$_FILES['master']['name'];
			$masterfile_size =$_FILES['master']['size'];
			$masterfile_tmp =$_FILES['master']['tmp_name'];
			$masterfile_type=$_FILES['master']['type'];
			$mastertarget_dir = "images/individuallistings/master/";
			$finalmastername=time()."-".$masterfilename;
			if(is_dir("$mastertarget_dir/".$masterfile_name1)==false)
			{
			file_put_contents($mastertarget_dir.$masterfile_name1, file_get_contents($masterfile_tmp));
			}
		}
		else
		{
			$finalmastername="";
		}

		if(!empty($_FILES['floorplan']['name']))
		{
			$floorplanfilename=$_FILES['floorplan']['name'];
			$floorplanfile_name1 =time()."-".$_FILES['floorplan']['name'];
			$floorplanfile_size =$_FILES['floorplan']['size'];
			$floorplanfile_tmp =$_FILES['floorplan']['tmp_name'];
			$floorplanfile_type=$_FILES['floorplan']['type'];
			$floorplantarget_dir = "images/individuallistings/floorplan/";
			$finalfloorplanname=time()."-".$floorplanfilename;
			if(is_dir("$floorplantarget_dir/".$floorplanfile_name1)==false)
			{
			file_put_contents($floorplantarget_dir.$floorplanfile_name1, file_get_contents($floorplanfile_tmp));
			}
		}
		else
		{
			$finalfloorplanname="";
		}
		
		$result = $this->individuallistbackendmodule->insertImg($propid,$finalcovername,$finalmastername,$finalfloorplanname);

		// $propid = $result;
		if(!empty($_FILES['file']['name']))
		{
			$galleryfile_name =$_FILES['file']['name'];
			for ($i = 0; $i < count($galleryfile_name); $i++) 
			{
				$file_name=$galleryfile_name[$i];
				$galleryfile_size =$_FILES['file']['size'][$i];
				$galleryfile_tmp =$_FILES['file']['tmp_name'][$i];
				$galleryfile_type=$_FILES['file']['type'][$i];
				$gallerytarget_dir = "images/individuallistings/gallery/";
				$galleryfinalname=time()."-".$file_name;
				$result = $this->individuallistbackendmodule->insertgalleryimages($galleryfinalname,$propid);
				if(is_dir("$gallerytarget_dir/".$galleryfinalname)==false)
				{
				file_put_contents($gallerytarget_dir.$galleryfinalname, file_get_contents($galleryfile_tmp));
				}
			}
		}else
		{
		}
			if($result){
				$referList['status']='True';
				$referList['message']='Data And Image Successfully Uploaded';
				$referList['success']='success';
			}else{
				$referList['status']='False';
				$referList['message']='Some Issue occured Data not Added';
				$referList['success']='Failed';
			}
			 echo json_encode($referList);
	}

	function propertyupdate()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];
		$builderid = $_POST['BuilderID'];
		$propname = $_POST['Propertyname'];
		$propprice = $_POST['Price'];
		$maintanence = $_POST['Maintanencecharge'];
		$totalfloor = $_POST['Totalfloor'];
		$propfloor = $_POST['Propertyfloor'];
		$doorface = $_POST['Doorfacing'];
		$city = $_POST['City'];
		$locality = $_POST['Locality'];
		$proptype = $_POST['PropertyType'];
		$buildtype = $_POST['BuildingType'];
		$propstatus = $_POST['Status'];
		$propfurnish = $_POST['Furnish'];
		$propownership = $_POST['Ownership'];
		$bhk = $_POST['BHK'];
		$Propaddress = $_POST['Address'];
		$descrip = $_POST['Description'];
		$bathroom = $_POST['Bathroom'];
		$balcony = $_POST['Balcony'];
		$area = $_POST['Area'];
		$areatype = $_POST['AreaType'];
		$openparking = $_POST['Openparking'];
		$coveredparking = $_POST['Coveredparking'];
		$parking = $_POST['Parking'];
		$plotsize = $_POST['PlotSize'];
		$plottype = $_POST['PlotType'];
		$plotage = $_POST['PlotAge'];
		$nearby = $_POST['Nearby'];
		$nearbydetails = $_POST['Nearbydetails'];
		$khatatype = $_POST['Khatatype'];
		$watersupply = $_POST['Watersupply'];
		$proppossesion = $_POST['PossesionDate'];
		$propageyear = $_POST['PropertyAgeYear'];
		$propagemonth = $_POST['PropertyAgeMonth'];
		$brokerage = $_POST['BrokerageCharge'];
		$zipcode = $_POST['Zipcode'];
		$amenity = $_POST['Amenities'];
		$facility = $_POST['Facilities'];
		$approval = $_POST['Approvals'];

		$ret_arr=$this->individuallistbackendmodule->updatelisting($_POST);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Data Successfully updated';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Added';
		   $referList['success']='Failed';
	   }

		echo json_encode($referList);
	}

	function deleteproperty()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];
		$ret_arr=$this->individuallistbackendmodule->propertydelete($userid,$propid);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Data Successfully Removed';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }

		echo json_encode($referList);
	}

	function updatecoverimage()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];

		$coverfilename=$_FILES['cover']['name'];
		$coverfile_name1 =time()."-".$_FILES['cover']['name'];
		$coverfile_size =$_FILES['cover']['size'];
		$coverfile_tmp =$_FILES['cover']['tmp_name'];
		$coverfile_type=$_FILES['cover']['type'];
		$covertarget_dir = "images/individuallistings/cover/";
		$finalcovername=time()."-".$coverfilename;
		if(is_dir("$covertarget_dir/".$coverfile_name1)==false)
		{
		file_put_contents($covertarget_dir.$coverfile_name1, file_get_contents($coverfile_tmp));
		}

		$ret_arr=$this->individuallistbackendmodule->coverimageupdate($userid,$propid,$finalcovername);
		if($ret_arr==1){
			$referList['status']='True';
			$referList['message']='Cover Image Updated';
			$referList['success']='success';
		}else{
			$referList['status']='False';
			$referList['message']='Some Issue occured Data not Removed';
			$referList['success']='Failed';
		}
			echo json_encode($referList);
	}

	function updatemasterplan()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];

		if(!empty($_FILES['master']['name'])) 
		{
			$masterfilename=$_FILES['master']['name'];
			$masterfile_name1 =time()."-".$_FILES['master']['name'];
			$masterfile_size =$_FILES['master']['size'];
			$masterfile_tmp =$_FILES['master']['tmp_name'];
			$masterfile_type=$_FILES['master']['type'];
			$mastertarget_dir = "images/individuallistings/master/";
			$finalmastername=time()."-".$masterfilename;
			if(is_dir("$mastertarget_dir/".$masterfile_name1)==false)
			{
			file_put_contents($mastertarget_dir.$masterfile_name1, file_get_contents($masterfile_tmp));
			}
		}
		else
		{
			$finalmastername="";
		}

		$ret_arr=$this->individuallistbackendmodule->masterplanupdate($userid,$propid,$finalmastername);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Masterplan Updated';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function deletemasterplan()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];
		$ret_arr=$this->individuallistbackendmodule->masterplandelete($userid,$propid);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Masterplan Removed';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function updatefloorplan()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];

		if(!empty($_FILES['floorplan']['name']))
		{
			$floorplanfilename=$_FILES['floorplan']['name'];
			$floorplanfile_name1 =time()."-".$_FILES['floorplan']['name'];
			$floorplanfile_size =$_FILES['floorplan']['size'];
			$floorplanfile_tmp =$_FILES['floorplan']['tmp_name'];
			$floorplanfile_type=$_FILES['floorplan']['type'];
			$floorplantarget_dir = "images/individuallistings/floorplan/";
			$finalfloorplanname=time()."-".$floorplanfilename;
			if(is_dir("$floorplantarget_dir/".$floorplanfile_name1)==false)
			{
			file_put_contents($floorplantarget_dir.$floorplanfile_name1, file_get_contents($floorplanfile_tmp));
			}
		}
		else
		{
			$finalfloorplanname="";
		}

		$ret_arr=$this->individuallistbackendmodule->floorplanupdate($userid,$propid,$finalfloorplanname);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Masterplan Updated';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function deletefloorplan()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];
		$ret_arr=$this->individuallistbackendmodule->floorplandelete($userid,$propid);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Floorplan Removed';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function updategalleryimages()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];

		if(!empty($_FILES['file']['name']))
		{
			$galleryfile_name =$_FILES['file']['name'];
			for ($i = 0; $i < count($galleryfile_name); $i++) 
			{
				$file_name=$galleryfile_name[$i];
				$galleryfile_size =$_FILES['file']['size'][$i];
				$galleryfile_tmp =$_FILES['file']['tmp_name'][$i];
				$galleryfile_type=$_FILES['file']['type'][$i];
				$gallerytarget_dir = "images/individuallistings/gallery/";
				$galleryfinalname=time()."-".$file_name;
				$result = $this->individuallistbackendmodule->insertgalleryimages($galleryfinalname,$propid);
				if(is_dir("$gallerytarget_dir/".$galleryfinalname)==false)
				{
				file_put_contents($gallerytarget_dir.$galleryfinalname, file_get_contents($galleryfile_tmp));
				}
			}
		}else
		{

		}
	   if($result){
		   $referList['status']='True';
		   $referList['message']='Gallery Images Updated';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function deletegallery()
	{
		$imageid = $_POST['Imageid'];
		$ret_arr=$this->individuallistbackendmodule->galleryimageremoval($imageid);
	   if($ret_arr==1){
		   $referList['status']='True';
		   $referList['message']='Gallery Images Removed';
		   $referList['success']='success';
	   }else{
		   $referList['status']='False';
		   $referList['message']='Some Issue occured Data not Removed';
		   $referList['success']='Failed';
	   }
		echo json_encode($referList);
	}

	function edituserproperty()
	{
		$userid = $_POST['Userid'];
		$propid = $_POST['Propid'];
		$data['Propdetails']=$this->individuallistbackendmodule->getedituserproperty($userid,$propid);
		$i = 0;
		foreach($data['Propdetails'] as $val)
		{
			$img="images";
			$images=$this->individuallistbackendmodule->getProImg($propid);
			$data['Propdetails'][$i]->$img = $images;
			$Facilities="Facilities";
			$facilitydetails=$this->individuallistbackendmodule->getProFacilities($propid);
			$data['Propdetails'][$i]->$Facilities = $facilitydetails;
			$Amenities="Amenities";
			$Amenitieseatils=$this->individuallistbackendmodule->getProAmenities($propid);
			$data['Propdetails'][$i]->$Amenities = $Amenitieseatils;
			$Approvals="Approvals";
			$approvalsdetails=$this->individuallistbackendmodule->getProapprovals($propid);
			$data['Propdetails'][$i]->$Approvals = $approvalsdetails;
			$Nearby="Nearby";
			$nearbydetails=$this->individuallistbackendmodule->getnearby($propid);
			$data['Propdetails'][$i]->$Nearby = $nearbydetails;
			$i++;
		}
		if($data)
		{
			$data['status']='True';
			$data['message']='successfully done';
			$data['success']='success';
		}
		else
		{
			$data['status']='False';
			$data['message']='A Database Error Occurred';
			$data['success']='failed';
		}
			echo json_encode($data, true);
	}

	function userlistings()
	{
		$userid = $_POST['Userid'];
		$data['Userlistings']=$this->individuallistbackendmodule->getuserlistings($userid);
		if($data)
		{
			$data['status']='True';
			$data['message']='successfully done';
			$data['success']='success';
		}
		else
		{
			$data['status']='False';
			$data['message']='A Database Error Occurred';
			$data['success']='failed';
		}
			echo json_encode($data, true);
	}

	function individuallistenq()
	{
		$val2=$this->individuallistbackendmodule->PropContactInfoCRM($_POST);
		$data=array();
		$name =$_POST['name'];
		$phone=$_POST['number'];
		$email=$_POST['email'];
		$propertyname=$_POST['propertyname'];
		$sourcetype=$_POST['sourcetype'];
		$page=$_POST['pageorgin'];
		$userid=$_POST['userid'];
		$usermailexist=$this->individuallistbackendmodule->getuserdata($userid);
		
			if($val2 =='1'){
				if($usermailexist[0]->mail != ''){
					// require_once 'Swift-5.0.1/lib/swift_required.php';
					// 	$trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
					// 	->setUsername('indiaestatehomes@gmail.com')
					// 	->setPassword('homesindiaestate');
					// 	$body="<p style='font-size:18px; margin-bottom:0px;'>Hello ". $usermailexist[0]->name .",</p>"."<br />
					// 	<p style='font-size:18px; margin-bottom:0px;'>Greetings from Homes247.in</p>"."<br />
					// 	"."<p style='margin-bottom:0px; margin-top:0px;'>Congratulations!!!  You Got a Listing callback request from ". $name ."</p><br />"."
					// 	<p style='margin:0px;'>Details are as below.</p><br />"."Name : ". $name ."<br />
					// 	"."Phone Number : ". $phone ."<br />"."Email : ". $email ."<br />
					// 	"."Property Name : ". $page ."<br />
					// 	"."<p style='margin-bottom:0px;'> Regards,</p><br/>
					// 	"."<h3 style='margin-top:0px;'>Homes247</h3>";		
					// 	$mailer     = Swift_Mailer::newInstance($trnsport);
					// 	$message    = Swift_Message::newInstance('Web Lead')
					// 	->setFrom(array('indiaestatehomes@gmail.com' => 'Call Back Request From Homes247'))
					// 	// ->setTo(array('abijith@homes247.in'))
					// 	// ->setCc(array('radha@indiaestates.in'))
					// 	->setTo(array($usermailexist[0]->mail))
					// 	// ->setCc(array('priyatham@homes247.in'))
					// 	->setBcc(array('priyatham@homes247.in','abijith@homes247.in'))
					// 	->setSubject('Call Back Request From Homes247')
					// 	->setBody($body, 'text/html');
					// 	$result = $mailer->send($message);
				}else{
						// require_once 'Swift-5.0.1/lib/swift_required.php';
						// $trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
						// ->setUsername('indiaestatehomes@gmail.com')
						// ->setPassword('homesindiaestate');
						// $body="<img src='https://duzxxeqden9a0.cloudfront.net/images/Logo.png' width='50%' style='margin-bottom:20px'>
						// "."<br />"."<p style='font-size:18px; margin-bottom:0px;'>Dear Admin,</p>"."<br />
						// "."<p style='margin-top:0px;'>We have received a request for Individual call back from ". $name ."</p><br />
						// "."<p>Note - This Lead is Registered for Mr.". $usermailexist[0]->name ." .He is not registered the mail ID with Homes247. 
						// So please Add the Mail ID Manually for the Lead Automation.<p><br />

						// <p style='margin:0px;'>Agent details</p><br />
						// Agent Name : ". $usermailexist[0]->name ."<br />
						// Agent Number : ". $usermailexist[0]->number ."<br />
						// Agent Code : ". $usermailexist[0]->code ."<br />

						// <p>Lead Details are as below.</p><br />"."Name : ". $name ."<br />
						// "."Phone Number : ". $phone ."<br />"."Email : ". $email ."<br />
						// "."Property Name : ". $propertyname ."<br />
						// "."Page Origin : ". $page ."<br />
						// "."Source : ". $sourcetype ."<br />
						// "."<p style='margin-bottom:0px;'> Regards,</p><br/>
						// "."<h3 style='margin-top:0px;'>Homes247</h3>";		
						// $mailer     = Swift_Mailer::newInstance($trnsport);
						// $message    = Swift_Message::newInstance('Web Lead')
						// ->setFrom(array('indiaestatehomes@gmail.com' => 'Individual Listing Call Back'))
						// ->setTo(array('enquiry@homes247.in'))
						// ->setCc(array('priyatham@homes247.in'))
						// ->setBcc(array('abijith@homes247.in' => ''))
						// ->setSubject('Individual Listing Call Back')
						// ->setBody($body, 'text/html');
						// $result = $mailer->send($message);
				}

			

						$data['status']='True';
						$data['message']='successfully added';
						$data['success']='success';
						
						}else{
							$data['status']='False';
							$data['message']='A Database Error Occurred';
							$data['success']='failed';
						}
					echo json_encode($data);
	}


}

    