<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: PUT, GET, OPTIONS, POST ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
class individuallistadmin extends CI_Controller 
{

    public function __construct()
	{
			
		parent::__construct();
				$this->load->library('pagination');
				$this->load->model('backendmodule');
                $this->load->model('adminmodule');
				$this->load->model('individuallistadminmodule');
				$this->load->helper(array('form', 'url'));
				$this->load->library('session');
				$this->load->library('image_lib');
				$data['title'] = 'Multiple file upload';
				$this->no_cache();
	} 
	protected function no_cache(){
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		header('Pragma: no-cache'); 
		}

    function individuallist()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['id']=$session_data['userLoginId'];
        if($data['id']){
        $data['newlistings']=$this->individuallistadminmodule->getnewrequests();
        $i = 0;
        foreach($data['newlistings'] as $val){
            $name="usernames";
            $usernames = $this->individuallistadminmodule->getusername($val->userIDFK);
            $data['newlistings'][$i]->$name = $usernames;
            $i++;
        }
        $this->load->view('header');
        $this->load->view('individuallisting/individuallist',$data);
        }
        else
        {
            redirect(base_url().'admin/login');
        }
    }
    
// function_name_as_url_endpoint
  function edit_individuallist()
    {
        $session_data = $this->session->userdata('logged_in');
        $data['id']=$session_data['userLoginId'];
        if($data['id']){
        $data['propertyLocation']  = $this->individuallistadminmodule->get_location();
        $data['buliderInfo']=$this->individuallistadminmodule->getbuliderInfo();
        $data['BHK']=$this->individuallistadminmodule->get_bhk();
        $data['bathroom'] =$this->individuallistadminmodule->get_bathroom();
        $data['balcony'] =$this->individuallistadminmodule->get_balcony();
        $data['furnishing'] =$this->individuallistadminmodule->get_furnish();
        $data['PropertyType'] =$this->individuallistadminmodule->get_PropertyType();
        $data['ownership'] =$this->individuallistadminmodule->get_ownership();
        // print_r( $data['ownership']);exit();
        $data['buildingtype'] =$this->individuallistadminmodule->get_buildingtype();
        $data['status']=$this->individuallistadminmodule->get_status();
        $data['Parkings']=$this->individuallistadminmodule->get_parking();
        $data['Doorface']=$this->individuallistadminmodule->get_doorfacings();
        $data['amenities']=$this->individuallistadminmodule->getlistingamenities();
        $data['facilities']=$this->individuallistadminmodule->getlistingfacilities();
        $data['approvals']=$this->individuallistadminmodule->getlistingapprovals();
        $data['nearby']=$this->individuallistadminmodule->getlistingnearby();
        $id=$_GET['propId'];
        $data['PropeId']=$id;
        $data['details']=$this->individuallistadminmodule->getlistpropertyById($id);
        $i = 0;
        foreach($data['details'] as $val){

            $img="images";
            $images=$this->individuallistadminmodule->getlistingimages($id);
            $data['details'][$i]->$img = $images;

			$cvr_img="Cover_image";
			$Cover_images=$this->individuallistadminmodule->getindividuallistcoverimage($id);
			$data['details'][$i]->$cvr_img = $Cover_images;

			$master_img="master_image";
			$Master_Img=$this->individuallistadminmodule->getindividuallistmasterimage($id);
			$data['details'][$i]->$master_img = $Master_Img;

			$floorplan_img="floorplan_image";
			$Floorplan_Img=$this->individuallistadminmodule->getindividuallistfloorplanimage($id);
			$data['details'][$i]->$floorplan_img = $Floorplan_Img;

            $Amenities="Amenities_Details";
            $Amenitieseatils=$this->individuallistadminmodule->getProAmenities($id);
            $data['details'][$i]->$Amenities = $Amenitieseatils;

            $Facilities="Facilities_Details";
            $Facilitiesdetails=$this->individuallistadminmodule->getProFacilities($id);
            $data['details'][$i]->$Facilities = $Facilitiesdetails;

            $Approvals="Approvals_Details";
            $Approvalsdeatils=$this->individuallistadminmodule->getProapprovals($id);
            $data['details'][$i]->$Approvals = $Approvalsdeatils;

            $nearby="Nearby_Details";
            $nearbydeatils=$this->individuallistadminmodule->getPronearby($id);
            $data['details'][$i]->$nearby = $nearbydeatils;
            $i++;
        }
        $data['propertyLocality'] =$this->individuallistadminmodule->get_localityindividual();
        $this->load->view('header');
        $this->load->view('individuallisting/individuallistedit',$data);
        }
        else
        {
            redirect(base_url().'admin/login');
        }
        
    }
    
    public function updatelistingDetailForm()
	{
		$id=$_POST['PropeId'];
		// print_r($_POST);exit();
		$propertyInfo=$this->individuallistadminmodule->updatelistingdetails($_POST);	
		$propid=$_POST['PropeId'];
		$propname=$_POST['propertyname'];
		$city=$_POST['cityname'];
		$locality=$_POST['localityname'];
		$zipcode=$_POST['Zipcode'];
		// $nearby=$_POST['nearby'];
		// print_r($amenity);exit();
		$this->individuallistadminmodule->updatepropertyage($_POST);
		$this->individuallistadminmodule->updateparkingareas($_POST);

		$propId=$this->input->post('propId');
    	$this->individuallistadminmodule->deletenearByPropId($propid);
		if(!empty($_POST["nearby"])){
		foreach($_POST["nearby"] as $value)
		{
			$this->individuallistadminmodule->insertnearby($propid,$value);
		}
	   }
	   
		$this->individuallistadminmodule->deletelistingamenities($propid);
		if(!empty($_POST["amenity"])){
			foreach($_POST['amenity'] as $value)
			{
				 $this->individuallistadminmodule->insertlistingamenities($propid,$value);
			}
		}
		
		$this->individuallistadminmodule->deletelistingfacilities($propid);
		if(!empty($_POST["facility"])){
			foreach($_POST['facility'] as $value)
			{
				 $this->individuallistadminmodule->insertlistingfacilities($propid,$value);
			}
		}
		
		$this->individuallistadminmodule->deletelistingapprovals($propid);
		if(!empty($_POST["Approvals"])){
			foreach($_POST['Approvals'] as $value)
			{
				 $this->individuallistadminmodule->insertlistingapprovals($propid,$value);
			}
		}

		$filename=$_FILES['file']['name'];
        // print_r($filename);exit();
			foreach($filename as $key => $filenameval)
			{
				$file_name =time()."-".$_FILES['file']['name'][$key];
				$file_size =$_FILES['file']['size'][$key];
				$file_tmp =$_FILES['file']['tmp_name'][$key];
				$file_type=$_FILES['file']['type'][$key];
				$target_dir = "images/individuallistings/gallery/";
				// list($width, $height, $type, $attr) = getimagesize($_FILES["image"]["tmp_name"]);
				// list($width, $height, $type, $attr) = getimagesize($file_tmp);
				if(!empty($filenameval) )
				{
					// echo"hi-$file_tmp";exit();
					$filenameval=time()."-".$filenameval;	
					$result = $this->individuallistadminmodule->insertlistinggalleryImgs($filenameval,$propId);
					if(is_dir("$target_dir/".$file_name)==false)
					{
					// move_uploaded_file($file_tmp,$target_dir.$file_name);
					file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
					}
				}
			}


			
		$filename=$_FILES['coverfile']['name'];
		// print_r($filename);exit();
		foreach($filename as $key => $filenameval2)
		{
			$file_name1 =time()."-".$_FILES['coverfile']['name'][$key];
			$file_size =$_FILES['coverfile']['size'][$key];
			$file_tmp =$_FILES['coverfile']['tmp_name'][$key];
			$file_type=$_FILES['coverfile']['type'][$key];
			$target_dir = "images/individuallistings/cover/";
			// list($width, $height, $type, $attr) = getimagesize($file_tmp);
			// list($width, $height, $type, $attr) = getimagesize($file_tmp);
			if(!empty($filenameval2))
			{
				$coverimage=$this->individuallistadminmodule->getindividuallistcoverimage($propId);
				$imagename = $coverimage[0]->imagename;
				// print_r($imagename);exit();
				if(file_exists("images/individuallistings/cover/".$imagename))
				{
				unlink("images/individuallistings/cover/".$imagename);
				}
				$filenameval2=time()."-".$filenameval2;	
				$titileID=$key+1;
				$result = $this->individuallistadminmodule->insertcover_image($filenameval2,$propId);
				if(is_dir("$target_dir/".$file_name1)==false)
				{
				// move_uploaded_file($file_tmp,$target_dir.$file_name1);
				file_put_contents($target_dir.$file_name1, file_get_contents($file_tmp));
				}
			}
		}










		


		$filename=$_FILES['masterfile']['name'];
		// print_r($filename);exit();
		foreach($filename as $key => $filenameval2)
		{
			$file_name1 =time()."-".$_FILES['masterfile']['name'][$key];
			$file_size =$_FILES['masterfile']['size'][$key];
			$file_tmp =$_FILES['masterfile']['tmp_name'][$key];
			$file_type=$_FILES['masterfile']['type'][$key];
			$target_dir = "images/individuallistings/master/";
			
			if(!empty($filenameval2))
			{
				$coverimage=$this->individuallistadminmodule->getindividuallistmasterimage($propId);
				$imagename = $coverimage[0]->imagename;
				// print_r($imagename);exit();
				if(file_exists("images/individuallistings/master/".$imagename))
				{
				unlink("images/individuallistings/master/".$imagename);
				}
				$filenameval2=time()."-".$filenameval2;	
				$titileID=$key+1;
				$result = $this->individuallistadminmodule->insertmaster_image($filenameval2,$propId);
				if(is_dir("$target_dir/".$file_name1)==false)
				{      
				// move_uploaded_file($file_tmp,$target_dir.$file_name1);
				file_put_contents($target_dir.$file_name1, file_get_contents($file_tmp));
				}
			}
		}

		$filename=$_FILES['floorfile']['name'];
		// print_r($filename);exit();
		foreach($filename as $key => $filenameval2)
		{
			$file_name1 =time()."-".$_FILES['floorfile']['name'][$key];
			$file_size =$_FILES['floorfile']['size'][$key];
			$file_tmp =$_FILES['floorfile']['tmp_name'][$key];
			$file_type=$_FILES['floorfile']['type'][$key];
			$target_dir = "images/individuallistings/floorplan/";
			// list($width, $height, $type, $attr) = getimagesize($file_tmp);
			if(!empty($filenameval2))
			{
				$coverimage=$this->individuallistadminmodule->getindividuallistfloorplanimage($propId);
				$imagename = $coverimage[0]->imagename;
				// print_r($imagename);exit();
				if(file_exists("images/individuallistings/floorplan/".$imagename))
				{
				unlink("images/individuallistings/floorplan/".$imagename);
				}
				$filenameval2=time()."-".$filenameval2;	
				$titileID=$key+1;
				$result = $this->individuallistadminmodule->insertfloorplan_image($filenameval2,$propId);
				if(is_dir("$target_dir/".$file_name1)==false)
				{      
				// move_uploaded_file($file_tmp,$target_dir.$file_name1);
				file_put_contents($target_dir.$file_name1, file_get_contents($file_tmp));
				}
			}
		}


		
			$currentUriString=$_POST['currentUriString'];
			redirect(base_url().$currentUriString."?propId=".$propid."&statuss=updated");
			//redirect(base_url().'admin/property_listing');
	}

    function updatealt()
	{
		$propId=$_POST['propId'];
		$altidArr = array();
		$alttagArr = array();
		foreach($_POST['AltId'] as $key => $val)
		{
			if($_POST['alttag'][$key] != '')
			$alttagArr[$key] = $_POST['alttag'][$key];

			if($_POST['AltId'][$key] != '')
			$altidArr[$key] = $_POST['AltId'][$key];
		}
		// $insertimagealt = $this->individuallistadminmodule->updatealt($altidArr,$alttagArr,$_POST['propId']);
		redirect(base_url()."individuallistadmin/edit_individuallist?propId=".$_POST['propId']."&statuss=updated");
	}

    public function getapproved()
	{
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$price = $this->input->post('price');
		$data['Approvedsuccess'] = $this->individuallistadminmodule->approval($id);
		$bhk = $data['Approvedsuccess'][0]->BHK;
		$propname = $data['Approvedsuccess'][0]->Propertyname;
		$Proptype = $data['Approvedsuccess'][0]->Proptype;
		$postdate = $data['Approvedsuccess'][0]->posteddate;
		$customername = $data['Approvedsuccess'][1]->user_name;
		$city = $data['Approvedsuccess'][2]->city;
		$locality = $data['Approvedsuccess'][3]->locality;
		// print_r($data['Approvedsuccess']);exit();

		require_once 'Swift-5.0.1/lib/swift_required.php';
		$trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
		->setUsername('indiaestatehomes@gmail.com')
		->setPassword('homesindiaestate');     
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
                    $message    = Swift_Message::newInstance('Listing Approved');
                    $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                    // $message ->setTo(array('abijith@homes247.in'));
                    $message ->setTo(array('enquiry@homes247.in'));
                    $message ->setCc(array('priyatham@homes247.in'));
                    $message ->setBcc(array('abijith@homes247.in'));
                    $message ->setSubject("Listing Approved");
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
                    $message    = Swift_Message::newInstance('Listing Approved');
                    $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                    // $message ->setTo(array('abijith@homes247.in'));
                    $message ->setTo(array($data['Approvedsuccess'][1]->user_email));
                    $message ->setCc(array('enquiry@homes247.in'));
                    $message ->setBcc(array('priyatham@homes247.in','abijith@homes247.in'));
                    $message ->setSubject("Listing Approved");
                    $message ->setBody($body, 'text/html');
					$result = $mailer->send($message);
					}else{
						// print_r("Value Not Found");exit();
					}

		return true;
	}

    public function getrejected()
	{
		$id = $this->input->post('id');
		$reason = $this->input->post('reason');
		$price = $this->input->post('price');
		// print_r($reason);exit();
		$data['Rejectedreasonsuccess'] = $this->individuallistadminmodule->rejectionreason($id,$reason);
		$data['Rejectedsuccess'] = $this->individuallistadminmodule->rejection($id);
		$bhk = $data['Rejectedsuccess'][0]->BHK;
		$propname = $data['Rejectedsuccess'][0]->Propertyname;
		$Proptype = $data['Rejectedsuccess'][0]->Proptype;
		$postdate = $data['Rejectedsuccess'][0]->posteddate;
		$customername = $data['Rejectedsuccess'][1]->user_name;
		$city = $data['Rejectedsuccess'][2]->city;
		$locality = $data['Rejectedsuccess'][3]->locality;

		require_once 'Swift-5.0.1/lib/swift_required.php';
		$trnsport = Swift_SmtpTransport::newInstance('smtp.gmail.com',465,'ssl')
		->setUsername('indiaestatehomes@gmail.com')
		->setPassword('homesindiaestate');     
                    // Mail Sending Body for Admin
                    $body="<p style='font-size:18px; margin-bottom:0px;'>Dear Admin,</p>"."<br />
                    "."<p style='margin-bottom:0px; margin-top:0px;'>Please do note that the property listing by <strong>". $customername ."</strong> on ". $postdate ." has been Rejected by <strong>". $username ."</strong> due to <strong>". $reason ."</strong>.Do check it out.</p><br />
					"."<p style='margin:0px;'>Basic Details are as below.</p><br />
					"."<strong>Property Details</strong> : ". $bhk ."". ' ' ."". $Proptype ." in ". $propname ." , ". $locality ." , ". $city ." <br />
					"."<strong>Price</strong> : ". $price ."<br />
					"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
					"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
					";
                    $mailer     = Swift_Mailer::newInstance($trnsport);
                    $message    = Swift_Message::newInstance('Listing Rejected');
                    $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                    // $message ->setTo(array('abijith@homes247.in'));
                    $message ->setTo(array('enquiry@homes247.in'));
                    $message ->setCc(array('priyatham@homes247.in'));
                    $message ->setBcc(array('abijith@homes247.in'));
                    $message ->setSubject("Listing Rejected");
                    $message ->setBody($body, 'text/html');
					$result = $mailer->send($message);

					if($data['Rejectedsuccess'][1]->user_email != ''){
						// Mail Sending Body for Customers
					$body="<p style='font-size:18px; margin-bottom:0px;'>Hi ". $customername .",</p>"."<br />
					<p style='font-size:18px; margin-bottom:0px;'>Greetings from Homes247.in</p>"."<br />
                    "."<p style='margin-bottom:0px; margin-top:0px;'>We are sorry to say that your property verification has failed due to ". $reason ." Please do cross-check the details and our guidelines before resubmission.</p><br />
					"."<p style='margin:0px;'>Basic Details you given.</p><br />
					"."<strong>Property Details</strong> : ". $bhk ."". ' ' ."". $Proptype ." in ". $propname ." , ". $locality ." , ". $city ." <br />
					"."<strong>Price</strong> : ". $price ."<br />
					"."<p style='margin-bottom:15px;margin-top: 10px;'>Thanks and Regards,</p>
					"."<p style='margin-bottom:0px;margin-top: 0px;'><strong>Admin</strong></p>
					";
                    $mailer     = Swift_Mailer::newInstance($trnsport);
                    $message    = Swift_Message::newInstance('Listing Rejected');
                    $message ->setFrom(array('indiaestatehomes@gmail.com' => 'Greetings From Homes247.in'));
                    // $message ->setTo(array('abijith@homes247.in'));
                    $message ->setTo(array($data['Rejectedsuccess'][1]->user_email));
                    // $message ->setCc(array('enquiry@homes247.in'));
                    $message ->setBcc(array('priyatham@homes247.in' , 'abijith@homes247.in' ));
                    $message ->setSubject("Listing Rejected");
                    $message ->setBody($body, 'text/html');
					$result = $mailer->send($message);
					}else{

					}
		return true;
	}

	public function getlocalitycitybased()
	{
		$cityid=$this->input->post('city_id');
		$result=$this->individuallistadminmodule->getcitybasedlocation($cityid);
		//echo $result;
		echo "<option value='default'>Please Select</option>";
			foreach($result as $result){
				echo "<option value=".$result->locality_IDPK.">".$result->locality_name."</option>";
			}
	}

	public function deletelistinggalleryimage()
	{
		$i = $this->input->post('i');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$PropeId = $this->input->post('PropeId');
		// print_r($i);exit();
		if(file_exists("images/individuallistings/gallery/".$name))
		{
		unlink("images/individuallistings/gallery/".$name);
		}
        $data['imagesuccess'] = $this->individuallistadminmodule->deletegalleryimages($id);
        return true;
	}


	public function deletecoverimage()
	{
		$imagename = $this->input->post('imagename');
		$imageId = $this->input->post('imgid');
// print_r($imagename);exit();
		if(file_exists("images/individuallistings/cover/".$imagename))
		{
		unlink("images/individuallistings/cover/".$imagename);
		}
		$data['imagesuccess'] = $this->individuallistadminmodule->deletecoverimagesdb($imageId);
        return true;
	}

	public function deletemasterimage()
	{
		$imagename = $this->input->post('imageId');
		$imageId = $this->input->post('imagename');
		// print_r($imageId);exit();
		if(file_exists("images/individuallistings/master/".$imagename))
		{
		unlink("images/individuallistings/master/".$imagename);
		}
		$data['imagesuccess'] = $this->individuallistadminmodule->deletemasterimagesdb($imageId);
        return true;
	}

	public function deletefloorplanimage()
	{
		$imagename = $this->input->post('imageId');
		$imgid = $this->input->post('dbimgid');
		// print_r($imagename);exit();
		if(file_exists("images/individuallistings/floorplan/".$imagename))
		{
		unlink("images/individuallistings/floorplan/".$imagename);
		}
		$data['imagesuccess'] = $this->individuallistadminmodule->deletefloorimagesdb($imgid);
		// print_r($data['imagesuccess']);exit();
        return true;
	}

	public function updatelistingcoverimage()
	{
		$imgId=$this->input->post('imgId');
		// print_r($imgId);exit();
				$file_name =time()."-".$_FILES['file']['name'];
				$file_size =$_FILES['file']['size'];
				$file_tmp =$_FILES['file']['tmp_name'];
				$file_type=$_FILES['file']['type'];
				$target_dir = "images/individuallistings/cover/";
				list($width, $height, $type, $attr) = getimagesize($file_tmp);
				if(!empty($file_name)  && $width >= "820" && $height >= "430")
				{
					$images=$this->individuallistadminmodule->getcoverimages($imgId);
					$imagename = $images[0]->property_coverimage;
					// print_r($imagename);exit();
					if(file_exists("images/individuallistings/cover/".$imagename))
					{
					unlink("images/individuallistings/cover/".$imagename);
					}
					$result = $this->individuallistadminmodule->updatelistingcoverImg($file_name,$imgId);
					if(is_dir("$target_dir/".$file_name)==false)
					{
					// move_uploaded_file($file_tmp,$target_dir.$file_name);
					file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
					}
				}
	}

    public function updatelistingmasterimage()
	{
		$imgId=$this->input->post('imgId');
		// print_r($imgId);exit();
				$file_name =time()."-".$_FILES['file']['name'];
				$file_size =$_FILES['file']['size'];
				$file_tmp =$_FILES['file']['tmp_name'];
				$file_type=$_FILES['file']['type'];
				$target_dir = "images/individuallistings/master/";
				list($width, $height, $type, $attr) = getimagesize($file_tmp);
				if(!empty($file_name)  && $width >= "820" && $height >= "430")
				{
					$images=$this->individuallistadminmodule->getmasterplanimages($imgId);
					$imagename = $images[0]->property_masterimage;
					if(file_exists("images/individuallistings/master/".$imagename))
					{
					unlink("images/individuallistings/master/".$imagename);
					}
					$result = $this->individuallistadminmodule->updatelistingmaster($file_name,$imgId);
					if(is_dir("$target_dir/".$file_name)==false)
					{
					// move_uploaded_file($file_tmp,$target_dir.$file_name);
					file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
					}
				}
	}

    public function updatelistingfloorplanimage()
	{
		$imgId=$this->input->post('imgId');
		$filename=$_FILES['file']['name'];
		// print_r($filename);exit();
        $file_name =time()."-".$_FILES['file']['name'];
        $file_size =$_FILES['file']['size'];
        $file_tmp =$_FILES['file']['tmp_name'];
        $file_type=$_FILES['file']['type'];
        $target_dir = "images/individuallistings/floorplan/";
        list($width, $height, $type, $attr) = getimagesize($file_tmp);
        if(!empty($file_name) && $width >= "820" && $height >= "430")
        {
			$images=$this->individuallistadminmodule->getfloorplanimages($imgId);
			$imagename = $images[0]->property_floorplan;
			if(file_exists("images/individuallistings/floorplan/".$imagename))
			{
			unlink("images/individuallistings/floorplan/".$imagename);
			}
			// print_r($imagename);exit();
            $result = $this->individuallistadminmodule->updatelistingfloorplan($file_name,$imgId);
            if(is_dir("$target_dir/".$file_name)==false)
            { 
            // move_uploaded_file($file_tmp,$target_dir.$file_name);
            file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
            }
        }
	    }

    public function updatelistinggalleryImages()
	{
		$imgId=$this->input->post('imgId');
		$filename=$_FILES['file']['name'];

        // print_r($filename);exit();
				$file_name =time()."-".$_FILES['file']['name'];
				$file_size =$_FILES['file']['size'];
				$file_tmp =$_FILES['file']['tmp_name'];
				$file_type=$_FILES['file']['type'];
				$target_dir = "images/individuallistings/gallery/";
				list($width, $height, $type, $attr) = getimagesize($file_tmp);
				if(!empty($file_name) && $width >= "820" && $height >= "430")
				{
					$images=$this->individuallistadminmodule->getindividuallistgalleryimages($imgId);
					$imagename = $images[0]->images_name;
					// print_r($imagename);exit();
					if(file_exists("images/individuallistings/gallery/".$imagename))
					{
					unlink("images/individuallistings/gallery/".$imagename);
					}
					$result = $this->individuallistadminmodule->updatelistinggalleryImgs($file_name,$imgId);
                    // print_r($result);exit();
					if(is_dir("$target_dir/".$file_name)==false)
					{
					// move_uploaded_file($file_tmp,$target_dir.$file_name);
					file_put_contents($target_dir.$file_name, file_get_contents($file_tmp));
					}
				}
	}

// function_name_as_url_endpoint
function individuallistapproved()
{
	$session_data = $this->session->userdata('logged_in');
	$data['id']=$session_data['userLoginId'];
	if($data['id']){
	$data['approvedlistings']=$this->individuallistadminmodule->approvedindividuallists();
	$i = 0;
	foreach($data['approvedlistings'] as $val){
		$name="usernames";
		$usernames = $this->individuallistadminmodule->getusername($val->userIDFK);
		$data['approvedlistings'][$i]->$name = $usernames;
		$i++;
	}
	$this->load->view('header');
	$this->load->view('individuallisting/individuallistapproved',$data);
	}
	else
	{
		redirect(base_url().'admin/login');
	}
}

function individuallistrejected()
{
	$session_data = $this->session->userdata('logged_in');
	$data['id']=$session_data['userLoginId'];
	if($data['id']){
	$data['rejectedlistings']=$this->individuallistadminmodule->rejectedindividuallists();
	$i = 0;
	foreach($data['rejectedlistings'] as $val){
		$name="usernames";
		$usernames = $this->individuallistadminmodule->getusername($val->userIDFK);
		$data['rejectedlistings'][$i]->$name = $usernames;
		$i++;
	}
	$this->load->view('header');
	$this->load->view('individuallisting/individuallistrejected',$data);
	}
	else
	{
		redirect(base_url().'admin/login');
	}
}




}

    