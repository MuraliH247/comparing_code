
<div class="right_aside_main">
  <div class="edit_img_area" style="margin:30px 3% 0 3%">
    <div class="property_content_main enquiry_content_main" style="margin:0px 0% 0px 0%">
    
			<div class="clear"></div>
            <!-- <div id="imageDiv"  style="display:none;"> -->
			 <h1 class="inner_page_title">Edit Images</h1>
				<!--div id="addImageDivEx">This</div-->
					<tr>
				<p id="dbImgCount" style="display:none;">
				<?php echo count($details[0]->images)?>
				</p>
				
				
				<?php
				$i=1;
				foreach($details[0]->images as $values)
				{ ?>
				<div class="add_img_style_2" id="imagediv_<?=$values->Id?>">
				<p class="jd5_img" >
				<img  id="imgscr_<?=$i?>" src="<?php echo base_url();?>images/uploadPropertyImgs/<?php echo $values->name?>" alt=""></p>
				<div class="setting_icons" id="imgsec_<?=$i?>">
				<p id="upfile_<?=$i?>" onclick="return imageClick(<?=$i?>,<?= $values->Id?>)" class="inline-blocks">
				<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >
				</p>
				<?php if($i > 1){?>
				<?php } ?>
				</div>
				<!-- <p class="upalt" onclick="return altClick(<?=$i?>,<?= $values->Id?>)">Update</p> -->
				</div>
				<input type="file" id="file_<?=$i?>" onchange="readURL(this,<?=$i?>,<?=$PropeId?>,<?=$values->Id?>);" name="file[]" style="display:none" />

				<?php 
				$i++;
				if($i>4)
				{
				$i=1;

				}						
				}
				?>
				<div class="sbmt_btn">
				</div>
                </div>
				
              </div>
		
              </div>

              
              </div>   

		 
	<!-- ##################################### Edit image section ends ################################# -->

 

	<script>

function imageClick($id,$dbimgId)
{
	//alert($dbimgId);
	 $("#file_"+$id).trigger('click');
	 $dbimgId=$("#dbimgId").val($dbimgId);
}


function readURL(input,id,propId,imgId) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
				var img = new Image();      
			    img.src = event	.target.result;
			    img.onload = function () {

			var w = this.width;
			var h = this.height;
			console.log(w);console.log(h);
			if( w >= '820' && h >= '430'){
			 $('#imgscr_'+id).attr('src', e.target.result);
			}
			else
			{
			var msg='Minimum size  should be more than 820 X 430 Pixel'
			alert(msg);
			return false;
			}
			}
                }
                reader.readAsDataURL(input.files[0]);
					var fd = new FormData();
					fd.append( "file", $("#file_"+id)[0].files[0]);
					fd.append( "imgId",imgId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'admin/updateImagesdb',
					success: function(data){
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					
					}
					});
				
            }
}
</script>










































<html>
 <head>
 </head>
 <body>
 <div class="right_aside_main">
 <?php if(isset($_GET['statuss']) && !empty($_GET['statuss'])){
	$statuss=$_GET['statuss'];
	if($statuss=="updated")
		{
			echo "<center><span style='color :#054950'>The Property Updated Successfully </span></center>";
		}
		}?>
 	<div class="property_content_main" >
	<div id="deatilsDiv">
		<div class="button_section">
			<div class="create_new_enquiry">
			<textarea hidden name="username" id="username" class="username"><?php echo $this->session->userdata('logged_in')['username'];?></textarea>
				<?php if($details[0]->verify=='0'){ ?>
						<h5 style="background: Green">Approved</h5>
				<?php } ?>
				<?php if($details[0]->verify=='2'){ ?>
					<h5 style="background: Red">Rejected</h5>
				<?php } ?>
				<?php if($details[0]->verify=='1'){ ?>
					<h5>Approval Pending</h5>
				<?php } ?>
			</div>
		</div>
	<form id="addProperty" name="editPropertyform" onsubmit="return check();"  enctype="multipart/form-data"
	 		method="post" action="<?php echo base_url()?>individuallistadmin/updatelistingDetailForm" >
 		<div class="table_property_details">
		<input  type="hidden" name="currentUriString" value="<?php echo uri_string();?>"/> 
		<input type="hidden" id="PropertyId" name="PropeId" value="<?=$PropeId?>">
		<input type="hidden" id="PropertyReg" name="PropertyRegion" value="<?=$details[0]->city_name?>">
        	<h1>Property Details</h1>
        	<div class="property_col">
            	<label>Property Name</label>
                <input type="text" name="propertyname" id="propertyname" value="<?=$details[0]->propertyName?>" />
            </div>
			<div class="property_col">
            	<label>Posted By</label>
                <select name="ownership" id="ownership">
                	<option value=""> Please Select </option>
					<?php  foreach($ownership as $ownershiptype){ ?>
					<option  value="<?php echo  $ownershiptype->ownership_IDPK?>"  <?php if($details[0]->ownership==$ownershiptype->ownership_IDPK ){ echo "selected"; } ?>><?php echo $ownershiptype->ownership_status; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Building Type</label>
                <select name="buildingtype" id="buildingtype">
                	<option value=""> Please Select </option>
					<?php  foreach($buildingtype as $buildingtypetype){ ?>
					<option  value="<?php echo  $buildingtypetype->building_typeIDPK ?>"  <?php if($details[0]->buildingtype==$buildingtypetype->building_typeIDPK){ echo "selected"; } ?>><?php echo $buildingtypetype->building_typeName; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Property Type</label>
                <select name="PropertyType" id="PropertyType">
                	<option value=""> Please Select </option>
					<?php  foreach($PropertyType as $type){ ?>
					<option  value="<?php echo  $type->property_typeIDPK ?>"  <?php if($details[0]->propertyType==$type->property_type){ echo "selected"; } ?>><?php echo $type->property_type; ?></option>
					<?php }?>
                </select>
            </div>
			
            <div class="property_col">
            	<label>City Name</label>
                <select name="cityname" id="cityname">
                	<option value=""> Please Select </option>
					<?php  foreach($propertyLocation as $Location){ ?>
					<option  value="<?php echo $Location['id'] ?>"  
					<?php if($details[0]->city_name==$Location['city']){ echo "selected"; } ?>>
					<?php echo $Location['city']; ?></option>
					<?php }?>
                </select>
            </div>

            <div class="property_col">
            	<label>Locality Name</label>
                <select name="localityname" id="localityname">
					<option value=""> Please Select </option>
					<?php  foreach($propertyLocality as $Locality){ ?>
					<option  value="<?php echo  $Locality->locality_IDPK ?>" <?php if($details[0]->LoaclityId==$Locality->locality_IDPK){ echo "selected"; } ?>><?php echo  $Locality->locality_name; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Builder Name</label>
                <select name="buliderInfo" id="buliderInfo">
					<option value='0'> Please Select </option>
					<?php  foreach($buliderInfo as $bulider){ ?>
					<option  value="<?php echo  $bulider->builderInfo_IDPK  ?>" <?php if($details[0]->BuliderIDFK==$bulider->builderInfo_IDPK ){ echo "selected"; } ?>><?php echo  $bulider->builderInfo_name; ?></option>
					<?php }?>
                </select>
            </div>
            <div class="property_col">
            	<label>Address</label>
                <input type="text" name="address" id="address" value="<?=$details[0]->address?>"/>
            </div>
            
            <div class="property_col">
            	<label>Zipcode</label>
                <input type="text" name="Zipcode" id="Zipcode" value="<?=$details[0]->zipcode?>"/>
            </div>
           
            <div class="property_col">
            	<label>Total Floor</label>
                <input type="text" name="total_apartments" id="total_apartments" class="numericField"  value="<?=$details[0]->Totalfloor?>"/>
            </div>
            <div class="property_col">
            	<label>Apartment Floor</label>
                <input type="text" name="apartment_floor" id="apartment_floor" class="numericField"  value="<?=$details[0]->floor?>"/>
            </div>
			<div class="property_col">
            	<label>Select BHK</label>
                <select name="bhk" class="bhk">
                	<option value=""> Please Select </option>
					<?php  foreach($BHK as $bhkval){ ?>
					<option  value="<?php echo $bhkval->bhk_IDPK ?>" <?php if($details[0]->bhk==$bhkval->bhk_IDPK){ echo "selected"; } ?>><?php echo $bhkval->bhk; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
				<label>Property Dimension</label>
                <input type="text" name="dimension" id="dimension" class="numericField" value="<?=$details[0]->Area?> " maxlength="5"/>
				<select class="price_range_ryt" name="dimensiontype" id="dimensiontype">
                	<option value="Sq.feet" <?php if($details[0]->Areatype=='Sq.feet') { echo "selected"; }?>> Sq.feet </option>
					<option value="Super built up area" <?php if($details[0]->Areatype=='Super built up area') { echo "selected"; }?>> Super built up area </option>
					<option value="Built up area" <?php if($details[0]->Areatype=='Built up area') { echo "selected"; }?>> Built up area </option>
					<option value="Carpet area" <?php if($details[0]->Areatype=='Carpet area') { echo "selected"; }?>> Carpet area </option>
                </select>
            </div>
			<div class="property_col">
            	<label>Select Bathroom</label>
                <select name="bathroom" class="bathroom">
                	<option value=""> Please Select </option>
					<?php  foreach($bathroom as $bathroomval){ ?>
					<option  value="<?php echo $bathroomval->bathroom_IDPK ?>" <?php if($details[0]->bathroom==$bathroomval->bathroom_IDPK){ echo "selected"; } ?>><?php echo $bathroomval->bathroom; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Select Balcony</label>
                <select name="balcony" class="balcony">
                	<option value=""> Please Select </option>
					<?php  foreach($balcony as $balconyval){ ?>
					<option  value="<?php echo $balconyval->balcony_IDPK ?>" <?php if($details[0]->balcony==$balconyval->balcony_IDPK){ echo "selected"; } ?>><?php echo $balconyval->balcony; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Select Furnish Status</label>
                <select name="furnish" class="furnish">
                	<option value=""> Please Select </option>
					<?php  foreach($furnishing as $furnishingval){ ?>
					<option  value="<?php echo $furnishingval->furnish_IDPK ?>" <?php if($details[0]->furnish==$furnishingval->furnish_IDPK){ echo "selected"; } ?>><?php echo $furnishingval->furnish_name; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Status</label>
                <select name="status" id="status">
                	<option value=""> Please Select </option>
					<?php  foreach($status as $statusval){ ?>
					<option  value="<?php echo $statusval->property_statusIDPK ?>" <?php if($details[0]->Status==$statusval->property_statusIDPK){ echo "selected"; } ?>><?php echo $statusval->property_status; ?></option>
					<?php }?>
                </select>
            </div>
			<?php if($details[0]->Status=='138564'){ ?>
				<div class="property_col" id="dbbasedageyeardiv">
            	<label>Property Age Year</label>
				<input type="text" name="ageyear" id="ageyear" class="ageyear"  value="<?=$details[0]->ageyear?>"/>
            </div>
			<div class="property_col" id="dbbasedagemonthdiv">
            	<label>Property Age Month</label>
				<input type="text" name="agemonth" id="agemonth" class="agemonth"  value="<?=$details[0]->agemonth?>"/>
            </div>
			<?php } ?>
			<?php if($details[0]->Status=='138565'){ ?>
				<div class="property_col" id="dbbasedpossdiv">
				<label>Possession</label>
				<input type="text" id="PossessionDate" name="PossessionDate" value="<?=$details[0]->possessiondate?>" />
            </div>
			<?php } ?>
			<div class="property_col" id="ageyeardiv" style="display:none">
            	<label>Property Age Year</label>
				<input type="text" name="ageyear" id="ageyear" class="ageyear"  value="<?=$details[0]->ageyear?>"/>
            </div>
			<div class="property_col" id="agemonthdiv" style="display:none">
            	<label>Property Age Month</label>
				<input type="text" name="agemonth" id="agemonth" class="agemonth"  value="<?=$details[0]->agemonth?>"/>
            </div>
			<div class="property_col" id="possdiv" style="display:none">
				<label>Possession</label>
				<input type="text" id="PossessionDate" name="PossessionDate" value="<?=$details[0]->possessiondate?>" />
            </div>
			<div class="property_col">
            	<label>Parking</label>
                <select name="parking" id="parking">
                	<option value=""> Please Select </option>
					<?php  foreach($Parkings as $parkingval){ ?>
					<option  value="<?php echo $parkingval->parking_IDPK ?>" <?php if($details[0]->parking==$parkingval->parking_IDPK){ echo "selected"; } ?>><?php echo $parkingval->parking_type; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Covered Parking</label>
                <select name="coveredparking" id="coveredparking">
                	<option value=""> Please Select </option>
					<option value="0" <?php if($details[0]->coveredparking=='0'){ echo "selected"; } ?>> 0 </option>
					<option value="1" <?php if($details[0]->coveredparking=='1'){ echo "selected"; } ?>> 1 </option>
					<option value="2" <?php if($details[0]->coveredparking=='2'){ echo "selected"; } ?>> 2 </option>
					<option value="3" <?php if($details[0]->coveredparking=='3'){ echo "selected"; } ?>> 3 </option>
					<option value="4" <?php if($details[0]->coveredparking=='4'){ echo "selected"; } ?>> 4 </option>
					<option value="5" <?php if($details[0]->coveredparking=='5'){ echo "selected"; } ?>> 5 </option>
                </select>
            </div>
			<div class="property_col">
            	<label>Open Parking</label>
                <select name="coveredparking" id="coveredparking">
                	<option value=""> Please Select </option>
					<option value="0" <?php if($details[0]->openparking=='0'){ echo "selected"; } ?>> 0 </option>
					<option value="1" <?php if($details[0]->openparking=='1'){ echo "selected"; } ?>> 1 </option>
					<option value="2" <?php if($details[0]->openparking=='2'){ echo "selected"; } ?>> 2 </option>
					<option value="3" <?php if($details[0]->openparking=='3'){ echo "selected"; } ?>> 3 </option>
					<option value="4" <?php if($details[0]->openparking=='4'){ echo "selected"; } ?>> 4 </option>
					<option value="5" <?php if($details[0]->openparking=='5'){ echo "selected"; } ?>> 5 </option>
                </select>
            </div>
			<div class="property_col">
            	<label>Water Supply</label>
				<input type="text" name="watersupply" id="watersupply" class="watersupply"  value="<?=$details[0]->watersupply?>"/>
            </div>
			<div class="property_col">
            	<label>Door Facing</label>
                <select name="doorfacing" id="doorfacing">
                	<option value=""> Please Select </option>
					<?php  foreach($Doorface as $doorfaceval){ ?>
					<option  value="<?php echo $doorfaceval->doorfacing_IDPK ?>" <?php if($details[0]->Doorface==$doorfaceval->doorfacing_IDPK){ echo "selected"; } ?>><?php echo $doorfaceval->doorfacing_names; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Property Title</label>
                <select name="propertytitle" id="propertytitle">
                	<option value=""> Please Select </option>
					<option value="A khata" <?php if($details[0]->propertykhata=='A khata'){ echo "selected"; } ?>> A khata </option>
					<option value="B khata" <?php if($details[0]->propertykhata=='B khata'){ echo "selected"; } ?>> B khata </option>
					<option value="E khata" <?php if($details[0]->propertykhata=='E khata'){ echo "selected"; } ?>> E khata </option>
                </select>
            </div>
			<div class="property_col">
            	<label>Price</label>
				<input type="text" name="price" id="price" class="price"  value="<?=$details[0]->property_price?>"/>
            </div>
			<div class="property_col">
            	<label>Maintanence Charge</label>
				<input type="text" name="maintanence" id="maintanence" class="maintanence"  value="<?=$details[0]->maintanence?>"/>
            </div>
			<div class="descrip">
            	<label>About the Project</label>
				<textarea name="discription" id="discription"  ><?=$details[0]->discription?></textarea >
				<script>
 				CKEDITOR.replace( 'discription' );
				</script>
            </div>
			
			<div class="clear"></div>

			<!-- NEARBY START -->
			<div class="property_col property_col_checkbox ">
					<?php if($details[0]->Nearby_Details) {?>
						<?php foreach($details[0]->Nearby_Details as $check)
						{
							$dbnearbyval[]=$check->Name;
						} ?>
						<?php } else 
						{
							$dbnearbyval[]="0";
						}?>
								<label>Nearby</label>
						<div id="a" >
							<table style="width:100%;">
							<tr>
							<?php
							$i=1;
							foreach($nearby as $values)
							{?>
							<td><input type="checkbox" name="near[]" <?php if(in_array($values->nearby_name,$dbnearbyval)) { echo "checked"; } ?> value="<?=$values->nearby_IDPK?>" /><small><?=$values->nearby_name?><small></td>	
							<?php 	
							echo"";			
							}?>
							</tr>
							</table>
							</div>
			</div>
		

				<!-- NEARBY END -->

				<div class="descrip">
					<label>Near By Details</label>
					<textarea name="nearbydescription" id="nearbydescription"  ><?=$details[0]->nearbydescription?></textarea >
					<script>
					CKEDITOR.replace( 'nearbydescription' );
					</script>
				</div>

<!-- ================================ cover image section ============================== -->

				<div class="property_col">
						<div class="property_img_add">
							<label>Cover Image <small style="display:block;">Select Photo</small></label>
						<input  onchange="myFunctionmaster(this)" type="file" name="filecover[]" id="filedivmaster" />
						</div>
					<div class="col-md-12">
						<div class="image_col">
							<img class="property_col property_imgs_col" id="cover_" src="<?php echo base_url()?>images/individuallistings/cover/<?=$details[0]->coverimage?>" />
							<div class="setting_icons" id="imgsec_">
							<p id="upfile_" onclick="return coverimageClick(<?=$PropeId?>)" class="inline-blocks">
							<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >
							</p>
							<?php
							$i=1;
							foreach($details[0]->Cover_image as $values)
							{ ?>
							<div id="coverimagediv_<?=$values->Id?>">
							<p id="deletefile1_<?=$i?>" style="color:#F23D41;" onclick="coverimagedeleteclick('<?=$i?>','<?= $values->Id?>','<?= $values->imagename?>','<?= $PropeId?>')" class="delete-btn inline-blocks"><img src="<?php echo base_url();?>images/delete_icon.png" alt=""> </p>
							</div>
							<?php 
							$i++;
							}
							?>
							</div>
							<input type="file" id="coverfile" onchange="coverchange(this,<?=$PropeId?>);" name="coverfile[]" style="display:none" />
						</div>
					</div>
				</div>

<!-- ========================================== cover image section ends here ===================================== -->

<!-- ============================================== Master Plan image Section =================================== -->

				<div class="property_col">
						<div class="property_img_add">
							<label>Master Plan Image <small style="display:block;">Select Photo</small></label>
							<input  onchange="myFunctionmaster(this)" type="file" name="filemaster[]" id="filedivmaster" class="Imgfile imgpath" />
						</div>
					<div class="col-md-12">
						<div class="image_col">
							<img class="property_col property_imgs_col" id="master_" src="<?php echo base_url()?>images/individuallistings/master/<?=$details[0]->masterImgPath?>" />
							<div class="setting_icons" id="imgsec_">
							<p id="upfile_" onclick="return masterimageClick(<?=$PropeId?>)" class="inline-blocks">
							<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >
							</p>
							<?php
							$i=1;
							foreach($details[0]->master_image as $values)
							{ ?>
							<!-- <input type="text" value="<?=$values->Id?>" name="bhkid"> -->
							<div id="coverimagediv_<?=$values->Id?>">
							<p id="deletefile1_<?=$i?>" style="color:#F23D41;" onclick="masterimagedeleteclick('<?=$i?>','<?= $values->Id?>','<?= $values->imagename?>')" class="delete-btn inline-blocks"><img src="<?php echo base_url();?>images/delete_icon.png" alt=""> </p>
							</div>
							<?php 
							$i++;
							}
							?>
							</div>
							<input type="file" id="masterfile" onchange="masterchange(this,<?=$PropeId?>);" name="masterfile[]" style="display:none" />
						</div>
					</div>
				</div>
			
<!-- ============================================Master plan image section ends here ================================== -->

				<div class="property_col">
						<div class="property_img_add">
							<label>Floor Plan Image <small style="display:block;">Select Photo</small></label>
						<input  onchange="myFunctionmaster(this)" type="file" name="filefloor[]" id="filedivmaster" class="Imgfile imgpath" />
						</div>
					<div class="col-md-12">
						<div class="image_col">
							<img class="property_col property_imgs_col" id="floor_" src="<?php echo base_url()?>images/individuallistings/floorplan/<?=$details[0]->floorplanimage?>" />
							<div class="setting_icons" id="imgsec_">
							<p id="upfile_" onclick="return floorimageClick(<?=$PropeId?>)" class="inline-blocks">
							<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >
							</p>
							<?php
							$i=1;
							foreach($details[0]->floorplan_image as $values)
							{ ?>
							<!-- <input type="text" value="<?=$values->imagename?>" name="bhkid"> -->
							<div id="coverimagediv_<?=$values->Id?>">
							<p id="deletefile1_<?=$i?>" style="color:#F23D41;" onclick="floorplanimagedeleteclick('<?=$i?>','<?= $values->Id?>','<?= $values->imagename?>')" class="delete-btn inline-blocks"><img src="<?php echo base_url();?>images/delete_icon.png" alt=""> </p>
							</div>
							<?php 
							$i++;
							}
							?>
							</div>
							<input type="file" id="floorfile" onchange="floorchange(this,<?=$PropeId?>);" name="floorfile[]" style="display:none" />
						</div>
					</div>
				</div>

<!-- ================================ Gallery Image Starts here ======================================== -->

			<div class="col-md-12">
              <div class="property_img_add">
				<label>Gallery Images</label>
					</div>
				<div class="col-md-12">
				<tr>
				<p style="display:none" id="dbImgCount">
				<?php echo count($details[0]->images)?>
				</p>
				<form id="updatealt" name="updatealt"  onsubmit="return validation()" enctype="multipart/form-data" method="post" 
				action="<?php echo base_url()?>individuallistadmin/updatealt" >			  
				<input type="hidden" name="propId" value="<?=$PropeId?>">
				<?php
				$i=1;
				foreach($details[0]->images as $values)
				{ ?>
				<div class="add_img_style_2" id="imagediv_<?=$values->Id?>">
				<p class="jd5_img" >
				<img  id="imgscr_<?=$i?>" src="<?php echo base_url();?>images/individuallistings/gallery/<?php echo $values->name?>" alt=""></p>
				<div class="setting_icons" id="imgsec_<?=$i?>">
				<p id="upfile_<?=$i?>" onclick="return galleryimageClick(<?=$i?>,<?= $values->Id?>)" class="inline-blocks">
				<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >
				</p>
				<p id="deletefile_<?=$i?>" style="color:#F23D41;" onclick="imageDeleteClickKK('<?=$i?>','<?= $values->Id?>','<?= $values->name?>','<?= $PropeId?>')" class="delete-btn inline-blocks"><img src="<?php echo base_url();?>images/delete_icon.png" alt=""> </p>
				</div>
				</div>
				<input type="file" id="galleryfile_<?=$i?>" onchange="gallerychange(this,<?=$i?>,<?=$PropeId?>,<?=$values->Id?>);" name="galleryfile_[]" style="display:none" />

				<?php 
				$i++;
				if($i>4)
				{
				$i=1;

				}						
				}
				?>

<!-- ================================ Gallery Image ends here ======================================== -->


				<div class="sbmt_btn">
				</div>
				</form>
				
			<div class="clear"></div>	
			     <input type="file" id="add-new-input" name="file[]" onchange="readnewURL(this);" style="display:none">
				 <div class="add_img_style_2" id="img-new-div" style="display:none;">
			  <p class="jd5_img"><img id="newimg" src="<?php echo base_url();?>images/users.png>" alt=""> 
			  </p>
			  	<input type="submit" value="upload" id="img-sub"  class="add_img_upload_new"/>
				<input type="button" value="Cancel" id="img-sub"  class="add_img_upload_new" onclick=" return addNew_Cancel(<?= $PropeId?>);"/>
			  </div>
			  <?php if((count($details[0]->images))  < 10) { ?>
			  <div class="">
				<span class="add-new-img_new" id="add-new-btn" onclick=" return addNew();"> <img src="<?php echo base_url();?>images/plus-icon.png"  alt=""> </span>
				</div>
			  <?php } ?>
				<div class="property_col property_imgs_col add_new_btn_div" >
				<!-- <form action="<?php echo base_url()?>admin/insertnewlistinggallery" method="POST" enctype="multipart/form-data" 
				id="updateimgForm"> -->
				<input type="hidden" name="currentUriString" value="<?php echo uri_string();?>"/>
		   		<input type="hidden" name="propId" value="<?php echo $PropeId;?>"/>
            	<!--<label>Add new images (one or multiple)</label> -->
				  <div class="col-md-12" style="padding:0" id="filediv">
          
			  <input  onchange="myFunction(this,<?=$PropeId?>)" type="file" name="file[]" class="Imgfile"  id="Imgfile" multiple/>
                </div>
				
                <div class="gallery" id="gallerydiv">
                	
				</div>
				<!-- <div class="col-md-12" style="padding:0">
				<input class="add_images_btn" type="submit" value="Add Images" style="padding:0">
			  </div> -->
				
				<!-- </form> -->
            </div>
			 </tr>
				</div>
			</div>
			
            <hr />
			<!-- AMENITIES START -->

			<div class="property_col property_col_checkbox">
						<?php if($details[0]->Amenities_Details) {?>
									<?php foreach($details[0]->Amenities_Details as $check)
						{
							$dbamenitiesval[]=$check->Name;
						} ?>
						<?php } else 
						{
							$dbamenitiesval[]="0";
						}?>
								<label>Amenities</label>
						<div id="a" >
							<table style="width:100%;">
							<tr>
							<?php
							$i=1;

							foreach($amenities as $values)
							{?>
							<td><input type="checkbox" name="amenity[]" <?php if(in_array($values->amenities,$dbamenitiesval)) { echo "checked"; } ?> value="<?=$values->amenities_IDPK?>" ><small><?=$values->amenities?></<small></td>	
							<?php 
							echo"";			
							}?>
							
							</tr>

							</table>
						</div>
            </div>

			<!-- AMENITIES END -->

	

			<!-- FACILITIES START -->

			<div class="property_col property_col_checkbox">
						<?php if($details[0]->Facilities_Details) {?>
									<?php foreach($details[0]->Facilities_Details as $check)
						{
							$dbfacilitiesval[]=$check->Name;
						} ?>
						<?php } else 
						{
							$dbfacilitiesval[]="0";
						}?>
								<label>Facilities</label>
						<div id="a" >
							<table style="width:100%;">
							<tr>
							<?php
							$i=1;

							foreach($facilities as $values)
							{?>
							<td><input type="checkbox" name="facility[]" <?php if(in_array($values->facilities,$dbfacilitiesval)) { echo "checked"; } ?> value="<?=$values->facilities_IDPK?>" ><small><?=$values->facilities?></<small></td>	
							<?php 
									
							echo"";			
							}?>
							
							</tr>

							</table>
						</div>
            </div>

			<!-- FACILITIES END -->

			<!-- APPROVALS START -->

				<div class="property_col property_col_checkbox">
					<?php if($details[0]->Approvals_Details) {?>
						<?php foreach($details[0]->Approvals_Details as $check)
						{
							$dbapprosvalsval[]=$check->Name;
						} ?>
						<?php } else 
						{
							$dbapprosvalsval[]="";
						}?>
								<label>Approvals</label>
						<div id="a" >
							<table style="width:100%;">
							<tr>
							<?php
							$i=1;

							foreach($approvals as $values)
							{?>
							<td><input type="checkbox" name="Approvals[]" <?php if(in_array($values->approvals_name,$dbapprosvalsval)) { echo "checked"; } ?> value="<?=$values->approvals_IDPK?>" ><small><?=$values->approvals_name?></<small></td>	
							<?php 	
							echo"";			
							}?>
							</tr>
							</table>
							</div>
				</div>

			<!-- APPROVALS END -->
			
            <div class="clear"></div>
            <div class="submit_btn">
				<input type="submit" value="Update">
				<?php if($details[0]->verify=='0'){ ?>
					<a data-toggle="modal" data-target="#rejectionreasonpop" style="background:Red;">Reject</a>
				<?php } ?>
				<?php if($details[0]->verify=='2'){ ?>
					<a onclick="approval('<?=$PropeId?>')" style="background:Green;">Approve</a>
				<?php } ?>
				<?php if($details[0]->verify=='1'){ ?>
					<a onclick="approval('<?=$PropeId?>')" style="background:Green;">Approve</a>
					<a data-toggle="modal" data-target="#rejectionreasonpop" style="background:Red;">Reject</a>
				<?php } ?>
                <a style="background:#CCC;" href="#">Cancel</a>
            </div>
            <div class="clear"></div>
        	</div>
	</form>
 			</div>

		
    
           <div class="clearfix"></div> 
		   
<div class="footer_main">
        	<p>@2017, homes247.in</p>
        </div>
 </div> 
        
        
   <p id="modalpopupclick" data-toggle="modal" data-target="#propertyTypepopup"></p>
		<!-- Property Image Deletion Confirmation -->
        <div class="modal fade" id="propertyTypepopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md BHK_modal">
                <div class="modal-content modal-content-customize confirm_del">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color: #03bf9e;">
                                        Confirm
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Are you sure you want to delete This Property Image?</p>
                                </div>
                                <div class="modal-footer">
									<p id="delDivId" style="display:none"></p>
									<p id="delDivtype" style="display:none"></p>
									<p id="divId" style="display:none"></p>
                                    <input type="submit"  value="Yes" id="btnDeleteProd" class="btn btn-default"  onclick=" return deleteProp();" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCloseDeleteProd" >
                                        No</button>
                                </div>
                </div>
            </div>
        </div>   
		
		<!-- Property Image Deletion Confirmation -->

		<!-- Rejection_reason -->

		<div class="modal fade" id="rejectionreasonpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md BHK_modal">
                <div class="modal-content modal-content-customize">
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color: #03bf9e;">
                                        Please Write Some Reason for the Rejection.
                                    </h4>
                                </div>
                                <div class="modal-body">
                                   <textarea name="rejectionreason" id="rejectionreason" class="rejection_area"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit"  value="Submit" id="btnDeleteProd" class="btn btn-default"  onclick=" return reject('<?=$PropeId?>');" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="rejctmodalclose" >
                                        Cancel</button>
                                </div>
                </div>
            </div>
        </div>     

		<!-- Rejection_reason -->







		<!-- CSS-Loader -->
<div class="loaderbody" id="loadermain">
  <div class="box">
    <div class="loader-20"></div>
  </div>
</div>
<!-- CSS-Loader -->


<p id="modalpopupbhkimgclick" data-toggle="modal" data-target="#bhkimgpopup"></p>

		<!-- Cover image Delete -->

		<div class="modal fade" id="bhkimgpopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md BHK_modal">
                <div class="modal-content modal-content-customize">
                    
                                <div class="modal-header">
                                    <h4 class="modal-title" style="color: #03bf9e;">
                                        Confirm
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <p>
									Are you sure you want to delete This Cover Image?</p>
                                </div>
                                <div class="modal-footer">
									<p id="id"></p>
									<p id="dbimgId"></p>
									<p id="propType"></p>
								<div class="modal_btns">
                                    <input type="submit" value="Yes" id="btnDeleteProd" class="btn btn-default bhk_yes_btn"  onclick=" return deletecoverimage();"/>
                                    <input type="button" value="No" class="btn btn-default bhk_yes_btn" data-dismiss="modal" id="btnCloseDeleteProdBHKIMG" >
								</div>
                            </div>
                </div>
            </div>
		</div>
 
		<!-- ================================ masterplan image section ============================== -->

		<p id="modalpopupmasterimgclick" data-toggle="modal" data-target="#masterimgpopup"></p>

<!-- Master image Delete -->

<div class="modal fade" id="masterimgpopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md BHK_modal">
		<div class="modal-content modal-content-customize">
			
						<div class="modal-header">
							<h4 class="modal-title" style="color: #03bf9e;">
								Confirm
							</h4>
						</div>
						<div class="modal-body">
							<p>
							Are you sure you want to delete This Master Image?</p>
						</div>
						<div class="modal-footer">
							<!-- <p id="id"></p> -->
							<p id="propId"></p>
							<p id="masterimage"></p>
						<div class="modal_btns">
							<input type="submit" value="Yes" id="btnDeleteProd" class="btn btn-default bhk_yes_btn"  onclick="return deletemasterimage();"/>
							<input type="button" value="No" class="btn btn-default bhk_yes_btn" data-dismiss="modal" id="btnCloseDeleteProdBHKIMG" >
						</div>
					</div>
		</div>
	</div>
</div>



		<!-- ==================================== masterplan image section ends here ========================== -->

	<!-- ========================================== Floorplan Image Section starts here ================================	 -->
	<p id="modalpopupfloorplanimgclick" data-toggle="modal" data-target="#floorplanimgpopup"></p>
	<div class="modal fade" id="floorplanimgpopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md BHK_modal">
		<div class="modal-content modal-content-customize">
			
						<div class="modal-header">
							<h4 class="modal-title" style="color: #03bf9e;">
								Confirm
							</h4>
						</div>
						<div class="modal-body">
							<p>
							Are you sure you want to delete This Master Image?</p>
						</div>
						<div class="modal-footer">
							<!-- <p id="id"></p> -->
							<p id="propId"></p>
							<p id="floorplanimage"></p>
						<div class="modal_btns">
							<input type="submit" value="Yes" id="btnDeleteProd" class="btn btn-default bhk_yes_btn"  onclick="return deletefloorplanimage();"/>
							<input type="button" value="No" class="btn btn-default bhk_yes_btn" data-dismiss="modal" id="btnCloseDeleteProdBHKIMG" >
						</div>
					</div>
		</div>
	</div>
</div>



<!-- ================================================== Floorplan Image Section ends here ====================================== -->


<script>
$(document).ready(function() {
	$('#loadermain').hide();
});

</script>

<!-- <script>
upfile_.onchange = evt => {
  const [file] = upfile_.files
  if (file) {
    imgscr_.src = URL.createObjectURL(file)
  }
}
</script> -->




<script>
$(document).ready(function() {
	$("#PossessionDate").datepicker({ 
		format: 'yyyy-mm-dd',
        autoclose: true, 
        todayHighlight: true
  }).datepicker();
	});

</script>



<!-- Location_select_map -->

<script>

function initAutocomplete() {

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 12.9715987, lng: 77.5945627},
          zoom: 14,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac_input');
        // var searchBox = new google.maps.places.SearchBox(input);
		var autocomplete = new google.maps.places.Autocomplete(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		autocomplete.bindTo('bounds', map);

		autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
		//   document.getElementById('city2').value = place.name;
            document.getElementById('latit').value = place.geometry.location.lat();
            document.getElementById('longit').value = place.geometry.location.lng();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

        });
        var markers = [];
      }

    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOuFSXm4iAQrqbsa4AwMPOCXJqsb1LoJY&libraries=places&callback=initAutocomplete"
         async defer></script>

	<!-- Location_select_map -->
	  
    <!--**************** Profile login dropdown script **************-->
      <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>  

   <script>

   var baseurl = '<?php echo base_url();?>';

	function coverimageClick($id,$dbimgId)
	{
		$("#coverfile").trigger('click');
	}

	function masterimageClick($id,$dbimgId)
	{
		$("#masterfile").trigger('click');
	}
	function floorimageClick($id,$dbimgId)
	{
		$("#floorfile").trigger('click');
	}



	</script>

<script>

function approval(id)
{
	$('#loadermain').show();
	var username = document.getElementById("username").value;
	var price = document.getElementById("price").value;
	if (price >= 10000000) {
			price = (price / 10000000).toFixed(2) + ' Crores';
		  } else if (price >= 100000) {
			price = (price / 100000).toFixed(2) + ' Lacs';
		  }
	$.ajax({
        type: "POST", //changed
		data:{id:id, username:username, price:price},
        url:baseurl+'individuallistadmin/getapproved',
        success: function(data)
		{
			$('#loadermain').hide();
			alert("Successfully Approved");
			console.log(data);
			//  window.location.href = baseurl + 'admin/individuallist' ;
		}
    });  
}

function reject(id)
{
	$('#loadermain').show();
	var reason = document.getElementById("rejectionreason").value;
	var price = document.getElementById("price").value;
	if (price >= 10000000) {
			price = (price / 10000000).toFixed(2) + ' Crores';
		  } else if (price >= 100000) {
			price = (price / 100000).toFixed(2) + ' Lacs';
		  }
	if($.trim($('.rejection_area').val())=='')
	{
		alert("Rejection Reason Should not be Empty");
		$('#loadermain').hide();
		return false;
	} else{
		// alert(reason);
		$.ajax({
		    type: "POST", //changed
			data:{id:id, reason:reason, price:price},
		    url:baseurl+'individuallistadmin/getrejected',
		    success: function(data){
				$('#loadermain').hide();
				$("#rejctmodalclose").trigger('click');
				alert("Successfully Rejected");
					//  window.location.href = baseurl + 'admin/individuallist' ;
			}
		    });  
	}
	
}
</script>

	<script>
	var city_id = document.getElementById("PropertyReg").value;
	var prop_id = document.getElementById("PropertyId").value;
	$("select.regions option").hide();
	if (city_id.indexOf('Bangalore') > -1) 
		{
			$("select.regions option:contains('Bangalore')").show();
		}
		if (city_id.indexOf('Hyderabad') > -1) 
		{
			$("select.regions option:contains('Hyderabad')").show();
		}
		if (city_id.indexOf('Chennai') > -1) 
		{
			$("select.regions option:contains('Chennai')").show();
		}
		if (city_id.indexOf('Kochi') > -1) 
		{
			$("select.regions option:contains('Kochi')").show();
		}
		if (city_id.indexOf('Pune') > -1) 
		{
			$("select.regions option:contains('Pune')").show();
		}
	

	var baseurl = '<?php echo base_url();?>';
	$('#cityname').change( function() {
				var city_id = document.getElementById("cityname").value;
					$.ajax({
						type: "POST",
						data:{city_id:city_id},
						url:baseurl+'individuallistadmin/getlocalitycitybased',
						success: function(data){
					   //alert(data);
					   $('#localityname').html(data);
						}
						});
	});

	$('#status').change( function() {
		var stat = document.getElementById("status").value;
		if(stat=='138564'){
			document.getElementById('possdiv').style.display = "none";
			document.getElementById('ageyeardiv').style.display = "block";
			document.getElementById('agemonthdiv').style.display = "block";
			document.getElementById('dbbasedageyeardiv').style.display = "none";
			document.getElementById('dbbasedagemonthdiv').style.display = "none";
			document.getElementById('dbbasedpossdiv').style.display = "none";
		}else if(stat=='138565'){
			document.getElementById('ageyeardiv').style.display = "none";
			document.getElementById('agemonthdiv').style.display = "none";
			document.getElementById('possdiv').style.display = "block";
			document.getElementById('dbbasedageyeardiv').style.display = "none";
			document.getElementById('dbbasedagemonthdiv').style.display = "none";
			document.getElementById('dbbasedpossdiv').style.display = "none";
		}
	});

					$('.validate').blur(function(){
      var reg=/^[0-9]{1,2}[\.]{1}[0-9]{1}[0-9]{1}$/g;
      if($(this).val().match(reg)==null){
		  $(this).val('').attr('placeholder','Enter Valide Price (Ex:50.00)').css("border-color", "red");
	  }    
		
    });
	// $('.numericField').on('input', function (event) { 
    // this.value = this.value.replace(/[^0-9]/g, '');
    // });
	$('.numericFieldDecimal').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9.]/g, '');
    });
	$('#Zipcode').blur(function (){
	if($.trim($('#Zipcode').val())!==''){
	if(($('#Zipcode').val().length) < '6' || ($('#Zipcode').val().length) > '6'){ 
       setTimeout(function(){	
       $("#Zipcode").focus();
	}, 0);
       $("#Zipcode").attr('placeholder','Zipcode should be 6 digit').val('');	
	return false;
	}
	}
	});
	function myFunction(obj) {
		//alert();
		imagesPreview(obj, 'div.gallery');
		
    }
	function myFunctionFloor(obj){
		imagesPreviewfloor(obj, 'div.floorgallery');
	}
	
			

	// $(document).ready(function(){
	
	// $(function() {
    // Multiple images preview in browser
	function imagesPreviewfloor (input, placeToInsertImagePreview){

		if (input.files) {
            var floorfilesAmount = input.files.length;
			// alert(floorfilesAmount);
            for (i = 0; i < floorfilesAmount; i++) {
                var reader = new FileReader();

               reader.onload = function(event) {
					 var img = new Image();      
                    img.src = event.target.result;
                    img.onload = function () {
						$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						  $(obj).hide();
						$("#floorfilediv").append("<input class='file-input floorImgfile' id='floorImgfile' type='file' onchange='myFunctionFloor(this)' name='filefloor[]' multiple='multiple' />");

                    }
                }
                reader.readAsDataURL(input.files[i]);
            }
        }

	};
    function imagesPreview (input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;
			//alert(filesAmount);
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

               reader.onload = function(event) {
					 var img = new Image();      
                    img.src = event	.target.result;
					
					 //($.parseHTML('<img>')).attr('src', img.src).appendTo(span.gallery);
					//  $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
					// 	  $(obj).hide();
					// 	$("#floorfilediv").append("<input class='file-input floorImgfile' id='floorImgfile' type='file' onchange='myFunction(this)' name='file[]' multiple='multiple' />");

                    img.onload = function () {

                        var w = this.width;
                        var h = this.height;
						console.log(w);console.log(h);
						

						// if( w >= '820' && h >= '430'){

						//   //$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
						//   $("#gallerydiv").append("<div class='col-md-2'><img src="+event.target.result+" /></div>")
						  
						//   $(obj).hide();
						// $("#filediv").append("<input class='file-input Imgfile' id='Imgfile' type='file' onchange='myFunction(this)' name='file[]' multiple='multiple' />");
                        // }
						// else
						// {
						// 	//$("#Imgfile").val('');
						// 	var msg='Minimum size  should be more than 820 X 430 Pixel'
						// 	alert(msg);
						// 	return false;
						// }
						

                    }
					
                  
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

     };
// 	$(document).ready(function(){
	
// 	$('.numericField').on('input', function (event) { 
//     this.value = this.value.replace(/[^0-9]/g, '');
//     });
// });


function imageDeleteClickKK($id,$dbimgId,$propType)
{ 
var dbImgCount=$("#dbImgCount").html();
// alert(dbImgCount);
if(dbImgCount < 0)
{  
	alert("Sorry Image Can't be Delete Minimum 3 Images are  Required ");
}
else{	
var dbimageID = $dbimgId;
var proptype = $propType;
var divId= $id;
$("#modalpopupclick").trigger('click');
$('#delDivId').html(dbimageID);
$('#delDivtype').html(proptype);
$('#divId').html(divId);
}
}
function deleteProp()
{
	var id=$('#delDivId').html();
	var divId=$('#divId').html();
	var dbImgCount=$("#dbImgCount").html();
	// alert(divId);
	var propId=$('#delDivtype').html();
 	   $.ajax({
        type: "POST", //changed
		data:{imageId:id},
        url:baseurl+'individuallistadmin/deletelistinggalleryimage',
        success: function(data){
			$('#dbImgCount').html(dbImgCount-1);
			$('#btnCloseDeleteProd').trigger('click');
			$('#imagediv_'+id).hide();
			//$('#imgsec_'+divId).hide();
				 //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
		}
        });  
}
function coverimagedeleteclick($id,$dbimgId,$propType,$coverimage)
{ 
	// alert($id);
var dbImgCount=$("#dbImgCount").html();
// alert(dbImgCount);
var id = $id;
var dbimgId = $dbimgId;
var propType = $propType;
var coverimage = $coverimage;
$("#modalpopupbhkimgclick").trigger('click');
$('#id').html(id);
$('#dbimgId').html(dbimgId);
$('#propType').html(propType);
$('#coverimage').html(coverimage);
}
function deletecoverimage()
{
	var id=$('#id').html();
	var dbimgId=$('#dbimgId').html();
	var propType=$('#propType').html();
	// alert(dbimgId);
 	   $.ajax({
        type: "POST", //changed
		data:{id:id,dbimgId:dbimgId,propType:propType},
        url:baseurl+'individuallistadmin/deletecoverimage',
        success: function(data){
			// alert(data);
			$('#dbImgCount').html(dbImgCount-1);
			$('#btnCloseDeleteProd').trigger('click');
			// $('#coverimagediv_'+id).hide();
			//$('#imgsec_'+divId).hide();
				 window.location.href = baseurl + 'individuallistadmin/edit_individuallist?propId=' + dbimgId ;
		}
        });  
}
function masterimagedeleteclick($id,$propId,$masterimage)
{ 
	// alert($coverimage);
var dbImgCount=$("#dbImgCount").html();

var id = $id;
var propId = $propId;
var masterimage = $masterimage;
// alert(id);	
$("#modalpopupmasterimgclick").trigger('click');
$('#id').html(id);
$('#propId').html(propId);
$('#masterimage').html(masterimage);
}
function addNew()
{
	if(imgCount.length <  6){
	$("#add-new-input").trigger('click');
	}
}
function deletemasterimage()
{
	var propId=$('#propId').html();
	var masterimage=$('#masterimage').html();
	// alert(masterimage);
 	   $.ajax({
        type: "POST", //changed
		data:{propId:propId,masterimage:masterimage},
        url:baseurl+'individuallistadmin/deletemasterimage',
        success: function(data){
			alert(data);
			$('#dbImgCount').html(dbImgCount-1);
			$('#btnCloseDeleteProd').trigger('click');
			// $('#coverimagediv_'+id).hide();
			//$('#imgsec_'+divId).hide();
				 window.location.href = baseurl + 'individuallistadmin/edit_individuallist?propId=' + propId ;
		}
        });  
}
function floorplanimagedeleteclick($id,$propId,$floorplanimage)
{ 
	// alert($floorplanimage);
var dbImgCount=$("#dbImgCount").html();
var id = $id;
var propId = $propId;
var floorplanimage = $floorplanimage;
// alert(propId);	
$("#modalpopupfloorplanimgclick").trigger('click');
$('#id').html(id);
$('#propId').html(propId);
$('#floorplanimage').html(floorplanimage);
}

function deletefloorplanimage()
{
	var propId=$('#propId').html();
	var floorplanimage=$('#floorplanimage').html();
	// alert(masterimage);
 	   $.ajax({
        type: "POST", //changed
		data:{propId:propId,floorplanimage:floorplanimage},
        url:baseurl+'individuallistadmin/deletefloorplanimage',
        success: function(data){
			alert(data);
			$('#dbImgCount').html(dbImgCount-1);
			$('#btnCloseDeleteProd').trigger('click');
			// $('#coverimagediv_'+id).hide();
			//$('#imgsec_'+divId).hide();
				 window.location.href = baseurl + 'individuallistadmin/edit_individuallist?propId=' + propId ;
		}
        });  
}



function readnewURL(input)
{
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			// $('#add-new-btn').hide();
			$('#newimg').attr('src', e.target.result);
			$('#newimg,#img-sub,#img-new-div').show();
		}

		reader.readAsDataURL(input.files[0]);
	}
}


function myFunction(input,propId) 
{
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				const fileSize = input.files[0].size / 1024 / 1024;
                reader.onload = function (e) {
				var img = new Image();      
				img.src = event	.target.result;
				img.onload = function () {
				var w = this.width;
				var h = this.height;
				console.log(w);console.log(h);
				$('#cover_').attr('src', e.target.result);
			
			// if (fileSize > 0.100) 
			// {
			// 	alert('File size should be less than 70 KB');
			// 	return false;
			// }
			// else 
			if( w >= '820' && h >= '430')
			{
			 	$('#cover_').attr('src', e.target.result);
			}
			else
			{
			var msg='Minimum size should be more than 820 X 430 Pixel'
			alert(msg);
			return false;
			}
			}
                }
                reader.readAsDataURL(input.files[0]);
					var fd = new FormData();
					fd.append( "file", $("#coverfile")[0].files[0]);
					fd.append( "propId",propId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					// url:baseurl+'individuallistadmin/updatelistingimage',
					success: function(data){
						// alert(data);
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					}
					});
				
            }
}



function coverchange(input,propId) 
{
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				const fileSize = input.files[0].size / 1024 / 1024;
                reader.onload = function (e) {
				var img = new Image();      
				img.src = event	.target.result;
				img.onload = function () {
				var w = this.width;
				var h = this.height;
				console.log(w);console.log(h);
				$('#cover_').attr('src', e.target.result);
			
			// if (fileSize > 0.100) 
			// {
			// 	alert('File size should be less than 70 KB');
			// 	return false;
			// }
			// else 
			if( w >= '820' && h >= '430')
			{
			 	$('#cover_').attr('src', e.target.result);
			}
			else
			{
			var msg='Minimum size should be more than 820 X 430 Pixel'
			alert(msg);
			return false;
			}
			}
                }
                reader.readAsDataURL(input.files[0]);
					var fd = new FormData();
					fd.append( "file", $("#coverfile")[0].files[0]);
					fd.append( "propId",propId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'individuallistadmin/updatelistingcoverimage',
					success: function(data){
						// alert(data);
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					}
					});
				
            }
}

function masterchange(input,propId) 
{
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				const fileSize = input.files[0].size / 1024 / 1024;
                reader.onload = function (e) {
				var img = new Image();      
				img.src = event	.target.result;
				img.onload = function () {
				var w = this.width;
				var h = this.height;
				console.log(w);console.log(h);
				$('#master_').attr('src', e.target.result);
			// if (fileSize > 0.100) 
			// {
			// 	alert('File size should be less than 70 KB');
			// 	return false;
			// }
			// else 
			if( w >= '820' && h >= '430')
			{
			 	$('#master_').attr('src', e.target.result);
			}
			else
			{
			var msg='Minimum size should be more than 820 X 430 Pixel'
			alert(msg);
			return false;
			}
			}
                }
                reader.readAsDataURL(input.files[0]);
					var fd = new FormData();
					fd.append( "file", $("#masterfile")[0].files[0]);
					fd.append( "propId",propId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'individuallistadmin/updatelistingmasterimage',
					success: function(data){
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					}
					});
				
            }
}

function floorchange(input,propId) 
{
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				const fileSize = input.files[0].size / 1024 / 1024;
                reader.onload = function (e) {
				var img = new Image();      
				img.src = event	.target.result;
				img.onload = function () {
				var w = this.width;
				var h = this.height;
				console.log(w);console.log(h);
				$('#floor_').attr('src', e.target.result);
			// if (fileSize > 0.100) 
			// {
			// 	alert('File size should be less than 70 KB');
			// 	return false;
			// }
			// else 
			if( w >= '820' && h >= '430')
			{
			 	$('#floor_').attr('src', e.target.result);
			}
			else
			{
			var msg='Minimum size should be more than 820 X 430 Pixel'
			alert(msg);
			return false;
			}
			}
                }

                reader.readAsDataURL(input.files[0]);
					var fd = new FormData();
					fd.append( "file", $("#floorfile")[0].files[0]);
					fd.append( "propId",propId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'individuallistadmin/updatelistingfloorplanimage',
					success: function(data){
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					}
					});
				
            }
}
function galleryimageClick($id,$dbimgId)
	{
		$("#galleryfile_"+$id).trigger('click');
		$dbimgId=$("#dbimgId").val($dbimgId);
		// alert("#galleryfile_"+$id);
	}
function gallerychange(input,id,propId,imgId) {
	
	//$uploadImg=$("file_"+id).val();
	//document.updateimgForm.submit();
	
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				// const fileSize = input.files[0].size / 1024 / 1024;
                reader.onload = function (e) {
				var img = new Image();      
			    img.src = event.target.result;
			    img.onload = function () {

			    var w = this.width;
			    var h = this.height;
			    console.log(w);console.log(h);

				$('#imgscr_').attr('src', e.target.result);
			if( w >= '820' && h >= '430')
			{
			 $('#imgscr_').attr('src', e.target.result);
			}
			else
			{
			var msg='Minimum size  should be more than 820 X 430 Pixel'
			alert(msg);
			return false;
			}
			}        
                }
                reader.readAsDataURL(input.files[0]);
					var fd = new FormData();
					fd.append( "file", $("#galleryfile_"+id)[0].files[0]);
					fd.append( "imgId",imgId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'individuallistadmin/updatelistinggalleryImages',
					success: function(data){
						// alert(data);
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					}
					});
				
            }
}

function limitText(limitField, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    } 
}


</script>	

<!-- <script>
function gallerychange(input,id,propId,imgId) {  
   $('.inline-blocks').show();
  $('#blah').hide();
  $('.preview').after('<img id="blah" src="#" alt="your image" style="display:none;"/>');
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah')
      .attr('src', e.target.result)
      .width(150)
      .height(200);
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function galleryimageClick(){
  $('.inline-blocks').show();
  $('#blah').show();
}
	</script> -->

</body>
</html>
