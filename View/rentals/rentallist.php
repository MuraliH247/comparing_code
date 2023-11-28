<div class="right_aside_main">
 	<div class="property_content_main enquiry_content_main">
     <div class="button_section">
    	<div class="create_new_enquiry">
			<a class="locality" style="background:#6a1abb;">New Requests</a>
			<a class="add_prop" style="background:#1abb57;" href="<?php echo base_url();?>rentaladmin/rentallistapproved">Approved</a>
			<a class="locality" style="background:#1abb57;" href="<?php echo base_url();?>rentaladmin/rentallistrejected">Rejected</a>
        </div>
    </div>

    <div class="sri_table_main">
    	<div class="header prprty_list locality_list">
            <!-- <div class="individuallistid">ID</div> -->
            <div class="reviewcss">Posted by</div>
			<div class="reviewcss">Property Name</div>
			<div class="reviewcss">City</div>
			<div class="reviewcss">Location</div>
			<div class="reviewcss">Posted Date</div>
            <div>Action</div>
        </div>
        <?php
        $counter = 1;
        $i = 0;
        foreach($newlistings as $val){?>
        <div class="body_info body_info_prprty locality_list_body">
            <div class="locname individuallistid"><?=$counter?></div>  
            <?php 
            foreach($newlistings[$i]->usernames as $check)
            {?>
                <div class="loczone reviewcss"><?=$check->user_name?></div>
            
			<div class="loctitle reviewcss buildertext_limit"><?=$val->Propertyname?></div>
			<div class="locdescrip reviewcss buildertext_limit"><?=$val->Cityname?></div>
            <div class="lockeywords reviewcss buildertext_limit"><?=$val->Localityname?></div>
            <div class="lockeywords reviewcss buildertext_limit"><?=$val->property_created?></div>
                <div class="individuallistid">
                    <!-- <a class="viewclass" href="#" onclick="approval('<?=$val->property_IDPK?>')">View</a> -->
                    <a class="btn_style" href="<?php echo base_url()?>rentaladmin/edit_rentallist?rentalID=<?=$val->property_IDPK?>">Edit</a>
                </div>
        </div>
        <?php 
        $counter++;
        $i++;}} ?>
        
    </div>
			</div>
			</div>
			</div>
			 <div class="clearfix"></div>
 </div>
