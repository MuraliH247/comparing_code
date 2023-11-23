<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS, POST ");
class rentaladmin extends CI_Controller {

	public function __construct()
	{
			
		parent::__construct();
				$this->load->library('pagination');
				$this->load->model('backendmodule');
				$this->load->model('adminmodule');
                $this->load->model('rentaladminmodule');
				$this->load->model('websitemodule');
				$this->load->helper(array('form', 'url'));
				$this->load->library('session');
				$this->load->library('image_lib');
				$data['title'] = 'Multiple file upload';
				$this->no_cache();
				//$this->load->view('upload_form',$data);
				//$this->load->library('pagination');
			/*		$config['base_url'] 		= 'http://localhost/apnaswargLatest/Search/bengaluru';*/
				
	}
	 protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
		}

    function rentallist()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['id']=$session_data['userLoginId'];
        if($data['id']){
        $data['newlistings']=$this->rentaladminmodule->getrentalrequests();

        // print_r($data['newlistings']);exit();
        $i = 0;
        foreach($data['newlistings'] as $val){
            $name="usernames";
            $usernames = $this->rentaladminmodule->getusername1($val->userIDFK);
            $data['newlistings'][$i]->$name = $usernames;
            // print_r($data['newlistings'][$i]);exit();
            $i++;
        }
        $this->load->view('header');
        $this->load->view('rentals/rentallist',$data);
        }
        else
        {
            redirect(base_url().'admin/login');
        }
    }
    
		// function_name_as_url_endpoint
        function edit_rentallist()
		{
        $session_data = $this->session->userdata('logged_in');
        $data['id']=$session_data['userLoginId'];
        if($data['id']){
		// $data['PropertyRegion'] =$this->rentalbackendmodule->get_rentallist();
		$data['property_name'] =$this->rentaladminmodule->get_rentallist();
		// $cityid=$this->input->post('cityId');
		$data['propertyLocation']  = $this->rentaladminmodule->get_location1();
		$data['propertyLocality'] =$this->rentaladminmodule->get_locality();
		$data['bedrooms'] =$this->rentaladminmodule->get_bedrooms();
		// $data['budget'] =$this->backendmodule->get_budget();
		$data['PropertyType'] =$this->rentaladminmodule->get_PropertyType1();
		$data['DoorFacing'] =$this->rentaladminmodule->get_doortype();
		$data['BuildingType'] =$this->rentaladminmodule->get_buildtype();
		$data['PropertyRegion'] =$this->rentaladminmodule->get_regions();
		$data['FurnishType'] =$this->rentaladminmodule->get_furnishtype();
		$data['PropertyOwnershipType'] =$this->rentaladminmodule->get_ownershiptype1();
		$data['Bathrooms'] =$this->rentaladminmodule->get_bathrooms();
		$data['Balcony'] =$this->rentaladminmodule->get_balcony1();
		$data['parking'] =$this->rentaladminmodule->get_parking1();
		$data['tenants'] =$this->rentaladminmodule->get_tenantsDetails();
		$data['plotyType'] =$this->rentaladminmodule->get_PlotDetails();
		$data['amenities']=$this->rentaladminmodule->getlistingamenities();
		$data['facilities']=$this->rentaladminmodule->getlistingfacilities();
		$data['nearby']=$this->rentaladminmodule->getlistingnearby();
		// $data['rentalimages'] =$this->rentalbackendmodule->getrentalimages();
			
			$id=$_GET['rentalID'];
			$data['rentalID']=$id;
			// $data['locations']=$this->rentalbackendmodule->rental_deatail_page($id);
			$data['locations']=$this->rentaladminmodule->get_propertyById_rental($id);
			$i = 0;
				foreach($data['locations'] as $val)
				{
					$img="images";
					$images=$this->rentaladminmodule->getrentalimages($id);
					// print_r($images);exit();
					$data['locations'][$i]->$img = $images;
			
					$cvr_img="Cover_image";
					// print_r($id);exit();
					$Cover_images=$this->rentaladminmodule->getrentalcoverimage($id);
					$data['locations'][$i]->$cvr_img = $Cover_images;

					$coverimage=$this->rentaladminmodule->getrentalcoverimageforedit($id);
					$imagename = $coverimage[0]->imagename;

					$Amenities="Amenities_Details";
					$Amenitieseatils=$this->rentaladminmodule->getProAmenities($id);
					$data['locations'][$i]->$Amenities = $Amenitieseatils;
			
					$Facilities="Facilities_Details";
					$Facilitiesdetails=$this->rentaladminmodule->getProFacilities($id);
					$data['locations'][$i]->$Facilities = $Facilitiesdetails;
			
					$nearby="Nearby_Details";
					$nearbydeatils=$this->rentaladminmodule->getPronearby($id);
					$data['locations'][$i]->$nearby = $nearbydeatils;
			
					$i++;
				}
				
			//echo"<pre>";print_r($data['deatils']);exit;
			$this->load->view('header');
			$this->load->view('rentals/edit_rentallist',$data);
			}
			else
			{
				redirect(base_url().'admin/login');
			}
		}

	
public function updateRentallist()
 {
		$rentalid=$_POST['rentalID'];
		$property_name=$_POST['property_name'];
		// print_r($property_name);exit();
		$property_address=$_POST['property_address'];
		// $property_zipcode=$_POST['property_zipcode'];
		$property_rent=$_POST['property_rent'];
		$maintainance=$_POST['maintainance'];
		$p_floor=$_POST['p_floor'];
		$floor=$_POST['floor'];
		$property_type=$_POST['type'];
		$door=$_POST['door1'];
		$build=$_POST['build'];
		$regions=$_POST['regions'];
		$locality=$_POST['locality'];
		$city=$_POST['city'];
		$furnish=$_POST['furnish'];
		$owner=$_POST['owner'];
		$bathroom=$_POST['bathroom'];
		$balcony=$_POST['balcony'];
		$tenants1=$_POST['tenants1'];
		$plottype1=$_POST['plottype1'];
  
		// print_r($facility);exit();
		// $rentalID=$this->input->post('rentalID');
	    $filename=$_FILES['file']['name'];
		// print_r($filename);exit();
		foreach($filename as $key => $filenameval)
		{
			// print_r($filenameval);exit();
			$file_name =time()."-".$_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
		
			$file_type=$_FILES['file']['type'][$key];
			$target_dir = "images/rentals/gallery/";
			// list($width, $height, $type, $attr) = getimagesize($file_tmp);
			if(!empty($filenameval))
			{	// $galleryimage=$this->rentaladminmodule->getrentalimages($rentalid);
				// $galleryImg = $galleryimage[0]->name;
				// echo"hi-$file_tmp";exit();
				$filenameval=time()."-".$filenameval;	
				$result = $this->rentaladminmodule->insertlistinggalleryImgs($filenameval,$rentalid);

				// print_r($result);exit();
				if(is_dir("$target_dir/".$file_name)==false)
				{
				// move_uploaded_file($file_tmp,$target_dir.$file_name);
				file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
				}
			}
		}

// =============================== Cover image Upadte starts here ============================

		$filename=$_FILES['coverfile']['name'];
		print_r($filename);exit();
		foreach($filename as $key => $filenameval2)
		{
			$file_name1 =time()."-".$_FILES['coverfile']['name'][$key];

			$file_size =$_FILES['coverfile']['size'][$key];
			$file_tmp =$_FILES['coverfile']['tmp_name'][$key];
			$file_type=$_FILES['coverfile']['type'][$key];
			$target_dir = "images/rentals/cover/";
			// list($width, $height, $type, $attr) = getimagesize($file_tmp);
			if(!empty($filenameval2))
			{
				// print_r($filenameval2);exit();
				$coverimage=$this->rentaladminmodule->getrentalcoverimage($rentalid);
				$imagename = $coverimage[0]->imagename;
				// print_r($imagename);exit();
				// // if(file_exists("images/rentals/cover/".$imagename))
				// // {
				// // print_r($imagename);exit();
				// // }
				$filenameval2=time()."-".$filenameval2;	
				$titileID=$key+1;
				$result = $this->rentaladminmodule->insertcover_image($filenameval2,$rentalid);
				// print_r($result);exit();
				if(is_dir("$target_dir/".$file_name1)==false)
				{
				// move_uploaded_file($file_tmp,$target_dir.$file_name1);
				file_put_contents($target_dir.$file_name1, file_get_contents($file_tmp));
				}
			}
		}



// ================================= Cover image Upadte ends here ==============================

		// $this->rentalbackendmodule->deletenearByPropId($rentalid);
		// 	foreach($_POST['nearby'] as $value)
		// 		{
		// 			$this->rentalbackendmodule->insertnearby($rentalid,$value);
		// 		}

		$this->rentaladminmodule->deletelistingamenities($rentalid);
			foreach($_POST['amenity'] as $value)
			{
				 $this->rentaladminmodule->insertlistingamenities($rentalid,$value);
			}

		$this->rentaladminmodule->deletelistingfacilities($rentalid);
			foreach($_POST['facility'] as $value)
			{
				 $this->rentaladminmodule->insertlistingfacilities($rentalid,$value);
			}
			
			$currentUriString=$_POST['currentUriString'];
			$result = $this->rentaladminmodule->updaterental($rentalid,$_POST);
			redirect(base_url().$currentUriString."?rentalID=".$rentalid."&statuss=updated");
			// redirect(base_url().'rentalbackend/edit_rentallist');
	}


	public function getlocalitycitybased()
	{
		$cityid=$this->input->post('city_id');
		$result=$this->rentaladminmodule->getcitybasedlocation($cityid);
		echo $result;
		echo "<option value='default'>Please Select</option>";
			foreach($result as $result){
				echo "<option value=".$result->locality_IDPK.">".$result->locality_name."</option>";
			}
	}

    
	function updatealt()
	{
		$rentalId=$_POST['rentalId'];
		$altidArr = array();
		$alttagArr = array();
		foreach($_POST['AltId'] as $key => $val)
		{
			if($_POST['alttag'][$key] != '')
			$alttagArr[$key] = $_POST['alttag'][$key];

			if($_POST['AltId'][$key] != '')
			$altidArr[$key] = $_POST['AltId'][$key];
		}
		$insertimagealt = $this->rentaladminmodule->updatealt($altidArr,$alttagArr,$_POST['rentalId']);
		redirect(base_url()."rentaladmin/edit_rentallist?rentalId=".$_POST['rentalId']."&statuss=updated");
	}

    
	public function deletelrentalgalleryimage()
	{
			$imageId = $this->input->post('imageId');
			$imagename = $this->input->post('imagename');
			// print_r($imagename);exit();
			if(file_exists("images/rentals/gallery/".$imagename))
		    {
			unlink("images/rentals/gallery/".$imagename);
			}
			$data['imagesuccess'] = $this->rentaladminmodule->deleterentalimage($imageId);
			return true;
	}

	public function getapproved()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$price = $this->input->post('price');
		// print_r($id);exit();
		$data['Approvedsuccess'] = $this->rentaladminmodule->approval($id);
		$bhk = $data['Approvedsuccess'][0]->BHK;
		$propname = $data['Approvedsuccess'][0]->Propertyname;
		$Proptype = $data['Approvedsuccess'][0]->Proptype;
		$postdate = $data['Approvedsuccess'][0]->posteddate;
		$customername = $data['Approvedsuccess'][1]->user_name;
		$city = $data['Approvedsuccess'][2]->city;
		$locality = $data['Approvedsuccess'][3]->locality;
		print_r($data['Approvedsuccess']);exit();

		require_once 'Swift-5.0.1/lib/swift_required.php';
		$trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
		->setUsername('indiaestatehomes@gmail.com')
		->setPassword('ffpc xuul oyxb nint');     
                    // Mail Sending Body for Admin
                    $body="<p style='font-size:18px; margin-bottom:0px;'>Dear Admin,</p>"."<br />
                    "."<p style='margin-bottom:0px; margin-top:0px;'>Please do note that the property listing by <strong>". $customername ."</strong> on ". $postdate ." has been approved by <strong>". $username ."</strong> and is live.</p><br />
					"."<p style='margin:0px;'>Basic Details are as below.</p><br />
					"."<strong>Property Details</strong> : ". $bhk ."". ' ' ."". $Proptype ." in ". $propname ." , ". $locality ." , ". $city ." <br />
					"."<strong>Price</strong> : ". $price ."<br />
					"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
					"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
					";
                    $mailer     = Swift_Mailer::newInstance($trnsport);
                    $message    = Swift_Message::newInstance('Rental Listing Approved');
                    $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                    $message ->setTo(array('enquiry@gmail.com'));
                    // $message ->setTo(array('ashwini@homes247.in'));
                    // $message ->setCc(array('ashwinish007@gmail.com'));
					$message ->setBcc(array('priyatham@homes247.in' , 'abijith@homes247.in'));
					// $message ->setBcc(array('abijith@homes247.in'));
                    $message ->setSubject("Rental Listing Approved");
                    $message ->setBody($body, 'text/html');
					$result = $mailer->send($message);


					if($data['Approvedsuccess'][1]->user_email != ''){
				// Mail Sending Body for Customers
					$body="<p style='font-size:18px; margin-bottom:0px;'>Hi ". $customername .",</p>"."<br />
					<p style='font-size:18px; margin-bottom:0px;'>Greetings from Homes247.in</p>"."<br />
                    "."<p style='margin-bottom:0px; margin-top:0px;'>Congrats, your property listing is approved and is live on Homes247.in. Get ready for Free & Faster Leads!</p><br />
					"."<p style='margin:0px;'>Basic Details you given.</p><br />
					"."<strong>Property Details</strong> : ". $bhk ."". ' ' ."". $Proptype ." in ". $propname ." , ". $locality ." , ". $city ." <br />
					"."<strong>Price</strong> : ". $price ."<br />
					"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
					"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
					";
                    $mailer     = Swift_Mailer::newInstance($trnsport);
                    $message    = Swift_Message::newInstance('Rental Listing Approved');
                    $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                    // $message ->setTo(array('abijith@homes247.in'));
                    $message ->setTo(array($data['Approvedsuccess'][1]->user_email));
                    // $message ->setCc(array('enquiry@homes247.in'));
                    // $message ->setCc(array('abijith@homes247.in'));
                    $message ->setBcc(array('priyatham@homes247.in','abijith@homes247.in' ));
					// $message ->setBcc(array('abijith@homes247.in'));
					// $message ->setBcc(array('ashwini@homes247.in'));
                    $message ->setSubject("Rental Listing Approved");
                    $message ->setBody($body, 'text/html');
					$result = $mailer->send($message);
					}else{
						// print_r("Value Not Found");exit();
					}

		return true;
	}


    function rentallistapproved()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['id']=$session_data['userLoginId'];
        if($data['id']){
        $data['approvedrental']=$this->rentaladminmodule->approvedrentalrentallist();
        $i = 0;
        foreach($data['approvedrental'] as $val){
            $name="usernames";
            $usernames = $this->rentaladminmodule->getusername1($val->userIDFK);
            $data['approvedrental'][$i]->$name = $usernames;
            $i++;
        }
        $this->load->view('header');
        $this->load->view('rentals/rentallistapproved',$data);
        }
        else
        {
            redirect(base_url().'admin/login');
        }
    }

	function rentallistrejected()
	{
		$session_data = $this->session->userdata('logged_in');
		$data['id']=$session_data['userLoginId'];
		if($data['id']){
		$data['rejectedlistings']=$this->rentaladminmodule->rejectedrentallists();
		// print_r($data['rejectedlistings']);exit();
		$i = 0;
		foreach($data['rejectedlistings'] as $val){
			$name="usernames";
			$usernames = $this->rentaladminmodule->getusername1($val->userIDFK);
			$data['rejectedlistings'][$i]->$name = $usernames;
			$i++;
		}
		$this->load->view('header');
		$this->load->view('rentals/rejectedrentallists',$data);
		}
		else
		{
			redirect(base_url().'admin/login');
		}
	}

	public function updaterentalgalleryImages()
	{
		$imgId=$this->input->post('imgId');
		$filename=$_FILES['file']['name'];
		$file_name =time()."-".$_FILES['file']['name'];
		$file_size =$_FILES['file']['size'];
		$file_tmp =$_FILES['file']['tmp_name'];
		$file_type=$_FILES['file']['type'];
		$target_dir = "images/rentals/gallery/";
		list($width, $height, $type, $attr) = getimagesize($file_tmp);
		if(!empty($file_name) && $width >= "820" && $height >= "430")
		{
			$images=$this->rentaladminmodule->getrentalgalleryimages($imgId);
			$imagename = $images[0]->images_name;
			if(file_exists("images/rentals/gallery/".$imagename))
			{
			unlink("images/rentals/gallery/".$imagename);
			}
			$result = $this->rentaladminmodule->updaterentalgalleryImgs($file_name,$imgId);
			if(is_dir("$target_dir/".$file_name)==false)
			{
			// move_uploaded_file($file_tmp,$target_dir.$file_name);
			file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
			}
		}
			
	}

	public function getrejected()
	{
		$id = $this->input->post('id');
		$reason = $this->input->post('reason');
		$price = $this->input->post('price');
		// print_r($price);exit();
		$data['Rejectedreasonsuccess'] = $this->rentaladminmodule->rejectionreason($id,$reason);
		$data['Rejectedsuccess'] = $this->rentaladminmodule->rejection($id);
		$bhk = $data['Rejectedsuccess'][0]->BHK;
		$propname = $data['Rejectedsuccess'][0]->Propertyname;
		$Proptype = $data['Rejectedsuccess'][0]->Proptype;
		$postdate = $data['Rejectedsuccess'][0]->posteddate;
		$customername = $data['Rejectedsuccess'][1]->user_name;
		$city = $data['Rejectedsuccess'][2]->city;
		$locality = $data['Rejectedsuccess'][3]->locality;

		// require_once 'Swift-5.0.1/lib/swift_required.php';
		// $trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
		// ->setUsername('indiaestatehomes@gmail.com')
		// ->setPassword('ffpc xuul oyxb nint');     
        //             // Mail Sending Body for Admin
        //             $body="<p style='font-size:18px; margin-bottom:0px;'>Dear Admin,</p>"."<br />
        //             "."<p style='margin-bottom:0px; margin-top:0px;'>Please do note that the property listing by <strong>". $customername ."</strong> on ". $postdate ." has been Rejected by <strong>". $postdate ."</strong> due to <strong>". $reason ."</strong>.Do check it out.</p><br />
		// 			"."<p style='margin:0px;'>Basic Details are as below.</p><br />
		// 			"."<strong>Property Details</strong> : ". $bhk ."". ' ' ."". $Proptype ." in ". $propname ." , ". $locality ." , ". $city ." <br />
		// 			"."<strong>Price</strong> : ". $price ."<br />
		// 			"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
		// 			"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
		// 			";
        //             $mailer     = Swift_Mailer::newInstance($trnsport);
        //             $message    = Swift_Message::newInstance('Rental Listing Rejected');
        //             $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
        //             // $message ->setTo(array('abijith@homes247.in'));
        //             $message ->setTo(array('enquiry@homes247.in'));
        //             // $message ->setCc(array('ashwinish007@gmail.com'));
		// 			$message ->setBcc(array('priyatham@homes247.in' , 'abijith@homes247.in'));
		// 			// $message ->setBcc(array('abijith@homes247.in'));
        //             $message ->setSubject("Rental Listing Rejected");
        //             $message ->setBody($body, 'text/html');
		// 			$result = $mailer->send($message);

		// 			if($data['Rejectedsuccess'][1]->user_email != ''){
		// 				// Mail Sending Body for Customers
		// 			$body="<p style='font-size:18px; margin-bottom:0px;'>Hi ". $customername .",</p>"."<br />
		// 			<p style='font-size:18px; margin-bottom:0px;'>Greetings from Homes247.in</p>"."<br />
        //             "."<p style='margin-bottom:0px; margin-top:0px;'>We are sorry to say that your property verification has failed due to ". $reason ." Please do cross-check the details and our guidelines before resubmission.</p><br />
		// 			"."<p style='margin:0px;'>Basic Details you given.</p><br />
		// 			"."<strong>Property Details</strong> : ". $bhk ."". ' ' ."". $Proptype ." in ". $propname ." , ". $locality ." , ". $city ." <br />
		// 			"."<strong>Price</strong> : ". $price ."<br />
		// 			"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
		// 			"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
		// 			";
        //             $mailer     = Swift_Mailer::newInstance($trnsport);
        //             $message    = Swift_Message::newInstance('Rental Listing Rejected');
        //             $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
        //             // $message ->setTo(array('abijith@homes247.in'));
        //             $message ->setTo(array($data['Rejectedsuccess'][1]->user_email));
        //             // $message ->setCc(array('enquiry@homes247.in'));
        //             $message ->setBcc(array('priyatham@homes247.in' , 'abijith@homes247.in' ));
		// 			// $message ->setBcc(array('abijith@homes247.in'));
        //             $message ->setSubject("Rental Listing Rejected");
        //             $message ->setBody($body, 'text/html');
		// 			$result = $mailer->send($message);
		// 			}else{

		// 			}
		return true;
	}

	public function deletecoverimage()
	{
		$imagename = $this->input->post('imageId');
		$imageId = $this->input->post('imagename');
// print_r($imagename);exit();
		if(file_exists("images/rentals/cover/".$imagename))
		{
		unlink("images/rentals/cover/".$imagename);
		}
		$data['imagesuccess'] = $this->rentaladminmodule->updaterentalcoverimage($imageId);
        return true;
	}

	public function updaterentalcoverimage()
	{
		$imgId=$this->input->post('imgId');
		// print_r($imgId);exit();
				$file_name =time()."-".$_FILES['file']['name'];
				// print_r($file_name);exit();
				$file_size =$_FILES['file']['size'];
				$file_tmp =$_FILES['file']['tmp_name'];
				$file_type=$_FILES['file']['type'];
				$target_dir = "images/rentals/cover/";
				list($width, $height, $type, $attr) = getimagesize($file_tmp);
				if(!empty($file_name)&& $width >= "820" && $height >= "430")
				{
					$images=$this->rentaladminmodule->getcoverimages($imgId);
					$imagename = $images[0]->property_coverimage;
					// print_r($imagename);exit();
					if(file_exists("images/rentals/cover/".$imagename))
					{
					unlink("images/rentals/cover/".$imagename);
					}
					$result = $this->rentaladminmodule->updaterentalcoverImg($file_name,$imgId);
					if(is_dir("$target_dir/".$file_name)==false)
					{
					// move_uploaded_file($file_tmp,$target_dir.$file_name);
					file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
					}
				}
	}

//   ================================================== rentaladmin ==================================  
	
}