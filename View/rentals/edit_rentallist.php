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
				<?php if($locations[0]->verify=='0'){ ?>
						<h5 style="background: Green">Approved</h5>
				<?php } ?>
				<?php if($locations[0]->verify=='2'){ ?>
					<h5 style="background: Red">Rejected</h5>
				<?php } ?>
				<?php if($locations[0]->verify=='1'){ ?>
					<h5>Approval Pending</h5>
				<?php } ?>
			</div>
		</div>
	 	
		<form id="addProperty" name="addPropertyform" onsubmit="return check();"  
		enctype="multipart/form-data" method="post" action="<?php echo base_url()?>rentaladmin/updateRentallist" >		
 		<div class="table_property_details">
         <input  type="hidden" name="currentUriString" value="<?php echo uri_string();?>"/> 
		<input type="hidden" id="rentalID" name="rentalID" value="<?=$rentalID?>"/>
		<input type="hidden" id="PropertyReg" name="regions" value="<?=$locations[0]->propertyRegionID?>">
        	<h1>Rental Details</h1>
	
        	<div class="property_col">
            	<label>Property Name</label>
                <input type="text" name="property_name" id="Title" value="<?=$locations[0]->propertyName?>" />

            </div>
			<div class="property_col">
            	<label>Property Type</label>
                <select name="type" id="Title">
                	<option value="">Property Type</option>
					<?php  foreach($PropertyType as $type){ ?>
					<option  value="<?php echo  $type->	property_typeIDPK ?>" <?php if($locations[0]->P_type==$type->property_type)
					{ echo "selected"; } ?>><?php echo $type->property_type; ?></option>
					<?php }?>
                </select>
            </div>
	
			<div class="property_col">
            	<label>City</label>
                <select name="city" id="Title">
                	<option value="">City </option>
					<?php  foreach($propertyLocation as $location){ ?>
					<option  value="<?php echo  $location->city_IDPK ?>" <?php if($locations[0]->cityName==$location->city_name)
					{ echo "selected"; } ?>><?php echo $location->city_name; ?></option>
					<?php }?>
                </select>
            </div>
			<div class="property_col">
            	<label>Locality</label>
                <select name="locality" id="Title">
                	<option value=""> Please Select </option>
					<?php  foreach($propertyLocality as $type){ ?>
					<option  value="<?php echo  $type->locality_IDPK ?>"  <?php if($locations[0]->Locality==$type->locality_name)
					{ echo "selected"; } ?>><?php echo $type->locality_name; ?></option>
					<?php }?>
                </select>
            </div>
		   <div class="property_col">
				<label>Property Address</label>
				<input type="text" name="property_address" id="youtube" value="<?=$locations[0]->address?>" />
			</div>
			<!-- <div class="property_col">
				<label>Zipcode</label>
				<input type="text" name="property_zipcode" id="youtube" value="<?=$locations[0]->zipcode?>" />
			</div> -->
			<div class="property_col">
            	<label>BHK</label>
                <select name="bhk" id="buliderInfo">
                	
					<option value=""> Please Select </option>
					<?php  foreach($bedrooms as $bhk){ ?>
					<option  value="<?php echo  $bhk->bhk_IDPK ?>" <?php if($locations[0]->BHK==$bhk->bhk)
					{ echo "selected"; } ?>><?php echo $bhk->bhk; ?></option>
					<?php }?>
					
                </select>
			</div>
			<div class="property_col">
            	<label>Property Rent</label>
                <input type="text" name="property_rent" id="price" value="<?=$locations[0]->rent?>" />
			</div>
			<div class="property_col">
            	<label>Propert Maintenance Charage</label>
                <input type="text" name="maintainance" id="seokey" value="<?=$locations[0]->maintainance?>"/>
			</div>
			<div class="property_col">
            	<label>Total floor</label>
                <input type="text" name="floor" id="seodesc"  value="<?=$locations[0]->Floor?>" />
			</div>
			<div class="property_col">
            	<label>Property Floor</label>
                <input type="text" name="p_floor" id="seodesc"value="<?=$locations[0]->P_floor?>" />
			</div>
			<div class="property_col">
            	<label>Door Facing</label>
                <select name="door1" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($DoorFacing as $door){ ?>
					<option  value="<?php echo  $door->doorfacing_IDPK ?>" <?php if($locations[0]->	Door==$door->doorfacing_names)
					{ echo "selected"; } ?>><?php echo $door->doorfacing_names; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Building Type</label>
				<select name="build" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($BuildingType as $btype){ ?>
					<option  value="<?php echo  $btype->building_typeIDPK ?>" <?php if($locations[0]->BuildType1==$btype->building_typeName)
					{ echo "selected"; } ?>><?php echo $btype->building_typeName; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Choose Furnish type</label>
				<select name="furnish" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($FurnishType as $ftype){ ?>
					<option  value="<?php echo  $ftype->furnish_IDPK ?>" <?php if($locations[0]->furnish_name==$ftype->furnish_name)
					{ echo "selected"; } ?>><?php echo $ftype->furnish_name; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Posted By</label>
				<select name="owner" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($PropertyOwnershipType as $ftype){ ?>
					<option  value="<?php echo  $ftype->ownership_IDPK ?>" <?php if($locations[0]->ownershiptype1==$ftype->	ownership_status)
					{ echo "selected"; } ?>><?php echo $ftype->ownership_status; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Total Bathrooms</label>
				<select name="bathroom" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($Bathrooms as $ftype){ ?>
					<option  value="<?php echo  $ftype->bathroom_IDPK ?>" <?php if($locations[0]->bathroom==$ftype->bathroom)
					{ echo "selected"; } ?>><?php echo $ftype->bathroom; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Total Balcony</label>
				<select name="balcony" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($Balcony as $ftype){ ?>
					<option  value="<?php echo  $ftype->balcony_IDPK ?>" <?php if($locations[0]->balcony==$ftype->balcony)
					{ echo "selected"; } ?>><?php echo $ftype->balcony; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Property area(sq.feet)</label>
                <input type="text" name="area" id="seodesc"value="<?=$locations[0]->area?>" />
			</div>
			<div class="property_col">
            	<label>Parking Type</label>
				<select name="parking" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($parking as $p){ ?>
					<option  value="<?php echo  $p->parking_IDPK ?>" <?php if($locations[0]->Parking==$p->parking_type)
					{ echo "selected"; } ?>><?php echo $p->parking_type; ?></option>
					<?php }?>
                </select>
			</div>
			<!-- <div class="property_col">
            	<label>Property Watersupply</label>
                <input type="text" name="wsupply" id="seodesc"value="<?=$locations[0]->property_watersupply?>" />
			</div> -->
			<div class="property_col">
            	<label>Property Available from</label>
                <input type="date" name="date" id="seodesc"value="<?=$locations[0]->property_availablefrom?>" />
			</div>
			<div class="property_col">
            	<label>Property Tenants</label>
				<select name="tenants1" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($tenants as $tenants){ ?>
					<option  value="<?php echo  $tenants->tenant_IDPK ?>" <?php if($locations[0]->Tenants==$tenants->tenant_type)
					{ echo "selected"; } ?>><?php echo $tenants->tenant_type; ?></option>
					<?php }?>
                </select>
			</div>
			<div class="property_col">
            	<label>Plot Type</label>
				<select name="plottype1" id="buliderInfo">
					<option value=""> Please Select </option>
					<?php  foreach($plotyType as $plotype){ ?>
					<option  value="<?php echo  $plotype->plottype_IDPK ?>" <?php if($locations[0]->plottype_name==$plotype->plottype_name)
					{ echo "selected"; } ?>><?php echo $plotype->plottype_name; ?></option>
					<?php }?>
                </select>
			</div>
	
	<br><br>
			<div class="descrip_div">
            	<label>Property Description</label>
				<textarea type="text" name="description" id="Description"><?=$locations[0]->description?></textarea>
				<script>
				 CKEDITOR.replace( 'Description' );
				</script>
            </div>

<!-- NEARBY START -->




<!-- ================================ Cover Image Starts here ======================================== -->
<div class="col-sm-4">
              <div class="property_img_add">
				<label>Cover Images</label>
					</div>
				<div class="col-md-12">
				<tr>


				<p style="display:none" id="dbImgCount">
				<?php echo count($locations[0]->Cover_image)?>
				</p>
				<form id="updatealt" name="updatealt"  onsubmit="return validation()" enctype="multipart/form-data" method="post" 
				action="<?php echo base_url()?>rentaladmin/updatealt" >			  
				<?php
				$i=1;
				foreach($locations[0]->Cover_image as $values)
				{ ?>
				<div class="add_img_style_2" id="coverdiv_<?=$values->Id?>">
				<p class="jd5_img">
				<img  id="coverimg_<?=$i?>" src="<?php echo base_url();?>images/rentals/cover/<?php echo $values->imagename?>" alt="" style="width:500%;height:auto"></p>

				<?php if($values->imagename != NULL) { ?>
					<div  class="setting_icons" id="imgsec_<?=$i?>" style="width: 500%;">
				<p id="upfile_<?=$i?>" onclick="return coverimageClick(<?=$i?>,<?= $values->Id?>)" class="inline-blocks">
				<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >                          
				</p>
				<p id="deletefile_<?=$i?>" style="color:#F23D41;" onclick="coverimagedeleteclick('<?=$i?>','<?= $values->Id?>','<?= $values->imagename?>','<?= $rentalID?>')" class="delete-btn inline-blocks">
				<img src="<?php echo base_url();?>images/delete_icon.png" alt=""> </p>
				</div>
				<?php }else{ ?>
				<h4 style="white-space: nowrap;">No Image found!</h4>
				<?php } ?>
				</div>
				<input type="file" id="coverfile_<?=$i?>" onchange="coverchange(this,<?=$i?>,<?=$rentalID?>,<?=$values->Id?>);" name="coverfile_[]" style="display:none" />
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
				</form>
				
			<div class="clear"></div>	
			     <input type="file" id="add-new-input" name="file[]" onchange="readnewURL(this);" style="display:none">
				 <div class="add_img_style_2" id="img-new-div" style="display:none;">
			  <p class="jd5_img"><img id="newimg" src="<?php echo base_url();?>images/users.png>" alt=""> 
			  </p>
			  	<input type="submit" value="upload" id="img-sub"  class="add_img_upload_new"/>
				<input type="button" value="Cancel" id="img-sub"  class="add_img_upload_new" onclick=" return addNew_Cancel(<?= $rentalID?>);"/>
			  </div>
			  <?php if((count($locations[0]->Cover_image))  < 10) { ?>
			  <div class="">
				<span class="add-new-img_new" id="add-new-btn" onclick=" return addNew();"> <img src="<?php echo base_url();?>images/plus-icon.png"  alt=""> </span>
				</div>
			  <?php } ?>
				<div class="property_col property_imgs_col add_new_btn_div" >
			
				<input type="hidden" name="currentUriString" value="<?php echo uri_string();?>"/>
				<input type="hidden" name="rentalId" value="<?=$rentalID?>">
				<div class="col-md-12" style="padding:0" id="filediv">
				  <input  onchange="myFunctionmaster(this)" type="file" name="coverfile[]" id="filedivmaster" class="Imgfile imgpath" />
                </div>
                <div class="gallery" id="gallerydiv">
				</div>
            </div>
			 </tr>
				</div>
			</div>
			<hr />
<!-- ================================ Cover Image ends here ======================================== -->

<div class="col-md-12">
              <div class="property_img_add">
				<label>Gallery Images</label>
					</div>
				<div class="col-md-12">
				<tr>
				<p style="display:none" id="dbImgCount">
				<?php echo count($locations[0]->images)?>
				</p>
				<form id="updatealt" name="updatealt"  onsubmit="return validation()" enctype="multipart/form-data" method="post" 
				action="<?php echo base_url()?>rentaladmin/updatealt" >			  
				<input type="hidden" name="rentalId" value="<?=$rentalID?>">
				<input type="hidden" name="rentalId" value="<?=$i?>">
				<?php
				$i=1;
				foreach($locations[0]->images as $values)
				{ ?>
				
				<div class="add_img_style_2" id="imagediv_<?=$values->Id?>">
				<p class="jd5_img">
				<img  id="imgscr_<?=$i?>" src="<?php echo base_url();?>images/rentals/gallery/<?php echo $values->name?>" alt=""></p>
				<div class="setting_icons" id="imgsec_<?=$i?>">
				<p id="upfile_<?=$i?>" onclick="return galleryimageClick(<?=$i?>,<?= $values->Id?>)" class="inline-blocks">
				<img src="<?php echo base_url();?>images/edit_icon.png" alt="" >                          
				</p>
				<p id="deletefile_<?=$i?>" style="color:#F23D41;" onclick="imageDeleteClickKK('<?=$i?>','<?= $values->Id?>','<?= $values->name?>','<?= $rentalID?>')" class="delete-btn inline-blocks">
				<img src="<?php echo base_url();?>images/delete_icon.png" alt="" ></p>
				</div>
				</div>
				<input type="file" id="galleryfile_<?=$i?>" onchange="gallerychange(this,<?=$i?>,<?=$rentalID?>,<?=$values->Id?>);" name="galleryfile_[]" style="display:none" />

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
				<input type="button" value="Cancel" id="img-sub"  class="add_img_upload_new" onclick=" return addNew_Cancel(<?= $rentalID?>);"/>
			  </div>
			  <?php if((count($locations[0]->images))  < 10) { ?>
			  <div class="">
				<span class="add-new-img_new" id="add-new-btn" onclick=" return addNew();"> <img src="<?php echo base_url();?>images/plus-icon.png"  alt=""> </span>
				</div>
			  <?php } ?>
				<div class="property_col property_imgs_col add_new_btn_div" >
				<!-- <form action="<?php echo base_url()?>admin/insertnewlistinggallery" method="POST" enctype="multipart/form-data" 
				id="updateimgForm"> -->
				<input type="hidden" name="currentUriString" value="<?php echo uri_string();?>"/>
				<input type="hidden" name="rentalID" value="<?php echo $rentalID;?>"/>
            	<!--<label>Add new images (one or multiple)</label> -->
				  <div class="col-md-12" style="padding:0" id="filediv">
				  <label class="custom-file-label"></label>
			  <input  onchange="myFunction(this,<?=$rentalID?>)" type="file" name="file[]" class="Imgfile"  id="Imgfile" multiple/>
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
						<?php if($locations[0]->Amenities_Details) {?>
									<?php foreach($locations[0]->Amenities_Details as $check)
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
							<td><input type="checkbox" name="amenity[]" <?php if(in_array($values->amenities,$dbamenitiesval)) { echo "checked"; } ?> value="<?=$values->amenities_IDPK?>" ><small><?=$values->amenities?></small></td>	
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
						<?php if($locations[0]->Facilities_Details) {?>
									<?php foreach($locations[0]->Facilities_Details as $check)
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
			

            <div class="clear"></div>
            <div class="submit_btn">
				<input type="submit" value="Update">
				<?php if($locations[0]->verify=='0'){ ?>
					<a data-toggle="modal" data-target="#rejectionreasonpop" style="background:Red;">Reject</a>
				<?php } ?>
				<?php if($locations[0]->verify=='2'){ ?>
					<a onclick="approval('<?=$rentalID?>')" style="background:Green;">Approve</a>
				<?php } ?>
				<?php if($locations[0]->verify=='1'){ ?>
					<a onclick="approval('<?=$rentalID?>')" style="background:Green;">Approve</a>
					<a data-toggle="modal" data-target="#rejectionreasonpop" style="background:Red;">Reject</a>
				<?php } ?>
                <a style="background:#CCC;" href="<?php echo base_url();?>rentaladmin/rentallist">Cancel</a>
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
        


 <!-- <p id="modalpopupbhkimgclick" data-toggle="modal" data-target="#bhkimgpopup"></p> -->

<!-- Cover image Delete -->

<!-- <div class="modal fade" id="bhkimgpopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
							<p id="rentalId"></p>
							<p id="cvr_imagename"></p>
						<div class="modal_btns">
							<input type="submit" value="Yes" id="btnDeleteProd" class="btn btn-default bhk_yes_btn"  onclick=" return deletecoverimage();"/>
							<input type="button" value="No" class="btn btn-default bhk_yes_btn" data-dismiss="modal" id="btnCloseDeleteProdBHKIMG" >
						</div>
					</div>
		</div>
	</div>
</div> -->

<!-- ================================ masterplan image section ============================== -->




<p id="modalpopupbhkimgclick" data-toggle="modal" data-target="#bhkimgpopup"></p>

<!-- BHKimage Delete -->

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
								Are you sure you want to delete this Cover Image?</p>
						</div>
						<div class="modal-footer">
						<p id="delDivimgId" ></p>
						<p id="divbhkfloorimg" ></p>
							<div class="modal_btns">
							<input type="submit" value="Yes" id="btnDeleteProd" class="btn btn-default bhk_yes_btn"  onclick=" return deletecoverimage();"/>
							<input type="button" value="No" class="btn btn-default bhk_yes_btn" data-dismiss="modal" id="btnCloseDeleteProdBHKIMG" >
								</div>
						</div>
		</div>
 
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
                                        Are you sure you want to delete This Gallery Image?</p>
                                </div>
                                <div class="modal-footer">
									<p id="delDivId" style="display:none"></p>
									<p id="delDivtype" style="display:none"></p>
									<p id="divId" style="display:none"></p>
									<p id="imagename" style="display:none"></p>
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
                                    <input type="submit"  value="Submit" id="btnDeleteProd" class="btn btn-default"  onclick="return reject('<?=$rentalID?>');" />
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="rejctmodalclose" >
                                        Cancel</button>
                                </div>
                </div>
            </div>
        </div>  


		<!-- Rejection_reason -->

		<!-- CSS-Loader -->
<!-- <div class="loaderbody" id="loadermain">
  <div class="box">
    <div class="loader-20"></div>
  </div>
</div> -->
<!-- CSS-Loader -->
<!-- 
<script>
$(document).ready(function() {
	$('#loadermain').hide();
});

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
function myFunction1() {
    document.getElementById("myDropdown").classList.toggle("show");
	var preview = document.querySelector('#preview');
	alert(preview);
    var files   = document.querySelector('input[type=file]').files;
	function readAndPreview(file) {

// Make sure `file.name` matches our extensions criteria
if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
  var reader = new FileReader();

  reader.addEventListener("load", function () {
	var image = new Image();
	image.height = 100;
	image.title = file.name;
	image.src = this.result;
	preview.appendChild( image );
  }, false);

  reader.readAsDataURL(file);
}

}

if (files) {
[].forEach.call(files, readAndPreview);
}

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

   function myFunctionmaster(input,propId) 
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
				// $('#cover_').attr('src', e.target.result);
			
			// if (fileSize > 0.100) 
			// {
			// 	alert('File size should be less than 70 KB');
			// 	return false;
			// }
			// else 
			if( w >= '820' && h >= '430')
			{

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
					fd.append( "file", $("#coverfile_")[0].files[0]);
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
				// $('#cover_').attr('src', e.target.result);
			
			// if (fileSize > 0.100) 
			// {
			// 	alert('File size should be less than 70 KB');
			// 	return false;
			// }
			// else 
			if( w >= '820' && h >= '430')
			{
			 	// $('#cover_').attr('src', e.target.result);
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
					fd.append( "file", $("#galleryfile_")[0].files[0]);
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
	</script>

<script>
function approval(id)
{
	// alert(id);
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
        url:baseurl+'rentaladmin/getapproved',
        success: function(data)
		{
			// alert(data);
			$('#loadermain').hide();
			alert("Successfully Approved");
			console.log(data);
			 window.location.href = baseurl + 'rentaladmin/rentallistapproved';
		}
        });  
}

function reject(id)
{
	$('#loadermain').show();
	var reason = document.getElementById("rejectionreason").value;
	
	var price = document.getElementById("price").value;
	// alert(price);
	if (price >= 10000000) {
			price = (price / 10000000).toFixed(2) + ' Crores';
		  } else if (price >= 100000) {
			price = (price / 100000).toFixed(2) + ' Lacs';
		  }
	if($.trim($('.rejection_area').val())=='')
	{
		alert("Rejection Reason Should not be Empty");
		// $('#loadermain').hide();
		return false;
	} else{
		// alert(reason);
		$.ajax({
		    type: "POST", //changed
			data:{id:id, reason:reason, price:price},
		    url:baseurl+'rentaladmin/getrejected',
		    success: function(data){
				// alert(data);	
				$('#loadermain').hide();
				$("#rejctmodalclose").trigger('click');
				alert("Successfully Rejected");
					 window.location.href = baseurl + 'rentaladmin/rentallistrejected' ;
			}
		    });  
	}
	
}
</script>

	<script>
	var city_id = document.getElementById("PropertyReg").value;
	var prop_id = document.getElementById("rentalID").value;
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
	$('#city').change( function() {
				var city_id = document.getElementById("city").value;
					$.ajax({
						type: "POST",
						data:{city_id:city_id},
						url:baseurl+'rentalbackend/getlocalitycitybased',
						success: function(data){
					   alert(data);
					   $('#localityname').html(data);
						}
						});
	});

					$('.validate').blur(function(){
      var reg=/^[0-9]{1,2}[\.]{1}[0-9]{1}[0-9]{1}$/g;
      if($(this).val().match(reg)==null){
		  $(this).val('').attr('placeholder','Enter Valide Price (Ex:50.00)').css("border-color", "red");
	  }    
		
    });

	$('.numericFieldDecimal').on('input', function (event) { 
    this.value = this.value.replace(/[^0-9.]/g, '');
    });
	$('#zipcode').blur(function (){
	if($.trim($('#zipcode').val())!==''){
	if(($('#zipcode').val().length) < '6' || ($('#zipcode').val().length) > '6'){ 
       setTimeout(function(){	
       $("#Zipcode").focus();
	}, 0);
       $("#Zipcode").attr('placeholder','Zipcode should be 6 digit').val('');	
	return false;
	}
	}
	});
	function myFunction1(obj) {
		//alert();
		imagesPreview(obj, 'div.gallery');
		
    }
	function myFunctionFloor(obj){
		imagesPreviewfloor(obj, 'div.floorgallery');
	}

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
				img.onload = function () {
					var w = this.width;
					var h = this.height;
                    }
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
     };

function imageDeleteClickKK($id,$dbimgId,$propType,$imagename)
{ 
var dbImgCount=$("#dbImgCount").html();
if(dbImgCount < 0)
{  
	alert("Sorry Image Can't be Delete Minimum 3 Images are  Required ");
}
else{	
var dbimageID = $dbimgId;
var proptype = $propType;
var imagename = $imagename;
// alert(imagename);
var divId= $id;
$("#modalpopupclick").trigger('click');
$('#delDivId').html(dbimageID);
$('#delDivtype').html(proptype);
$('#imagename').html(imagename);
$('#divId').html(divId);
}
}

function coverimagedeleteclick($i,$id,$name,$PropeId)
{ 
var dbImgCount=$("#dbImgCount").html();
var i = $i;
var id = $id;
var name= $name;
var PropeId= $PropeId;
// alert(PropeId);
$("#modalpopupbhkimgclick").trigger('click');
$('#delDivimgId').html(name);
$('#divbhkfloorimg').html(PropeId);
}

// function deletecoverimage()
// {
// 	var id=$('#id').html();
// 	var rentalId=$('#rentalId').html();
// 	var cvr_imagename=$('#cvr_imagename').html();
// 	// alert(cvr_imagename);
//  	   $.ajax({
//         type: "POST", //changed
// 		data:{id:id,rentalId:rentalId,cvr_imagename:cvr_imagename},
//         url:baseurl+'rentaladmin/deleterentalcoverimage',
//         success: function(data){
// 			alert(data);
// 			$('#dbImgCount').html(dbImgCount-1);
// 			$('#btnCloseDeleteProd').trigger('click');
// 			// $('#coverimagediv_'+id).hide();
// 			//$('#imgsec_'+divId).hide();
// 				 window.location.href = baseurl + 'rentaladmin/edit_rentallist?rentalID=' + rentalId ;
// 		}
//         });  
// }

function deletecoverimage()
{
	var imgid=$('#delDivimgId').html();
	var imagename =$('#divbhkfloorimg').html();
	// alert(imgid);
 	   $.ajax({
        type: "POST", //changed
		data:{imageId:imgid,imagename:imagename},
        url:baseurl+'rentaladmin/deletecoverimage',
        success: function(data){
			// alert(data);
			$('#dbImgCount').html(dbImgCount-1);
			$('#btnCloseDeleteProd').trigger('click');
			// $('#coverimagediv_'+id).hide();
			// $('#imgsec_'+id).hide();
				//  window.location.href = baseurl + 'rentaladmin/edit_rentallist?rentalID=' + imagename ;
				 location.reload("<?php echo base_url();?>rentaladmin/edit_rentallist?rentalID=<?=$rentalID?>");

		}
        });  
}
function deleteProp()
{
	var id=$('#delDivId').html();
	var divId=$('#divId').html();
	var dbImgCount=$("#dbImgCount").html();
	var imagename=$("#delDivtype").html();
	// alert(imagename);
	var rentalID=$('#delDivtype').html();
 	   $.ajax({
        type: "POST", //changed
		data:{imageId:id,imagename:imagename},
        url:baseurl+'rentaladmin/deletelrentalgalleryimage',
        success: function(data){
			// alert(data);
			$('#dbImgCount').html(dbImgCount-1);
			$('#btnCloseDeleteProd').trigger('click');
			$('#imagediv_'+id).hide();
			
		}
        });  
}

function addNew()
{
	if(imgCount.length <  6){
	$("#add-new-input").trigger('click');
	}
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



function coverimageClick($id,$dbimgId)
	{
		$("#coverfile_"+$id).trigger('click');
		$dbimgId=$("#dbimgId").val($dbimgId);
	// alert("#coverfile_"+$id);
	}
function coverchange(input,id,propId,imgId) 
{
	// alert(imgId);	
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
				// $('#coverimg_'+id).attr('src', e.target.result);
			if( w >= '820' && h >= '430')
			{
			 	$('#coverimg_'+id).attr('src', e.target.result);
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
					fd.append( "file", $("#coverfile_"+id)[0].files[0]);
					fd.append( "imgId",imgId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'rentaladmin/updaterentalcoverimage',
					success: function(data){
						// alert(data);
						  //window.location.href = baseurl + 'admin/edit_property?propId=' + propId ;
					}
					});
            }
}

function galleryimageClick($id,$dbimgId)
	{
		$("#galleryfile_"+$id).trigger('click');
		$dbimgId=$("#dbimgId").val($dbimgId);
	}

	function gallerychange(input,id,propId,imgId) 
{
	// alert(id);
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

				// $('#imgscr_'+id).attr('src', e.target.result);
			if( w >= '820' && h >= '430')
			{
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
					fd.append("file", $("#galleryfile_"+id)[0].files[0]);
					fd.append("imgId",imgId );
					$.ajax({
					type: "POST", //changed
					data: fd,
					processData: false,
					contentType: false,
					url:baseurl+'rentaladmin/updaterentalgalleryImages',
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
$("#cover_img").change(function() {
  readURLmaster(this);
});

function readURLmaster(input) 
			{

			if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
			var img = new Image();      
			img.src = event	.target.result;
			img.onload = function () {

			var w = this.width;
			var h = this.height;
			console.log(w);console.log(h);
			if( w >= '820' && h >= '430'){
			$('#blah').attr('src', e.target.result);
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
			}
			}
</script>



</body>
</html>




			
			
	