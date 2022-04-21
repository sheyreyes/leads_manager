<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('leads/');?>"> 
            View All Leads
        </a>
    </div>
    <div class="card-body">
       <b class="text-muted">ID:</b>
       <p><?php echo $leaddetail['id'];?></p>
       <b class="text-muted">Lead Contact #:</b>
       <p><?php echo $leaddetail['leadContactNo1'];?></p>	   
       <b class="text-muted">First Name:</b>
       <p><?php echo $leaddetail['leadFName'];?></p>
       <b class="text-muted">Last Name:</b>
       <p><?php echo $leaddetail['leadLName'];?></p>
       <b class="text-muted">Other Contact Number:</b>
       <p><?php echo $leaddetail['leadContactNo1'];?></p>	   
       <b class="text-muted">Address:</b>
       <p><?php echo $leaddetail['leadAddr'];?></p>
       <b class="text-muted">Country:</b>
       <p><?php echo $leaddetail['leadCountry'];?></p>
       <b class="text-muted">Zip Code:</b>
       <p><?php echo $leaddetail['leadZip'];?></p>
       <b class="text-muted">Disposition:</b>
       <p><?php echo $leaddetail['leadDispo'];?></p>	   
       <b class="text-muted">Remarks:</b>
       <p><?php echo $leaddetail['leadRemarks'];?></p>
       <b class="text-muted">Date Entered:</b>
       <p><?php echo $leaddetail['leadDateEntered'];?></p>	  
       <b class="text-muted">Date Last Modified:</b>
       <p><?php echo $leaddetail['lastDateUpdated'];?></p>	
       <b class="text-muted">Agent:</b>
       <p><?php echo $leaddetail['leadAgent'];?></p>		   
    </div>
</div>