<div class="right_aside_main">
 	<div class="property_content_main enquiry_content_main">
     <div class="button_section">
    	<div class="create_new_enquiry">
			<a class="locality" style="background:#ff0e0e;">Rejected</a>
			<a class="add_prop" style="background:#1abb57;" href="<?php echo base_url();?>rentaladmin/rentallist">New Requests</a>
			<a class="locality" style="background:#1abb57;" href="<?php echo base_url();?>rentaladmin/rentallistapproved">Approved</a>
        </div>
    </div>

    <div class="sri_table_main">
    	<div class="header prprty_list locality_list">
            <div class="individuallistid">ID</div>
            <div class="reviewcss">Posted by</div>
			<div class="reviewcss">Property Name</div>
			<div class="reviewcss">City</div>
			<!-- <div class="reviewcss">Location</div> -->
            <div class="reviewcss">Rejected Reason</div>
			<div class="reviewcss">Posted Date</div>
            <div>Action</div>
        </div>
        <?php
        $counter = 1;
        $i = 0;
        foreach($rejectedlistings as $val){  ?>
        <div class="body_info body_info_prprty locality_list_body">
            <div class="locname individuallistid"><?=$counter?></div>
            <?php 
            foreach($rejectedlistings[$i]->usernames as $check)
            {?>
            <div class="loczone reviewcss"><?=$check->user_name?></div>
			<div class="loctitle reviewcss buildertext_limit"><?=$val->Propertyname?></div>
			<div class="locdescrip reviewcss buildertext_limit"><?=$val->Cityname?></div>
            <div class="lockeywords reviewcss buildertext_limit"><?=$val->rejectreason?></div>
            <div class="lockeywords reviewcss buildertext_limit"><?=$val->property_created?></div>
            <div class="individuallist">
                <a class="viewclass" href="<?php echo base_url();?>rentaladmin/edit_rentallist?rentalID=<?=$val->property_IDPK?>" onclick="approval('<?=$val->property_IDPK?>')">View</a>
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
