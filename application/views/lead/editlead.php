<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('leads/');?>"> 
            View All Leads
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
 
        <form action="<?php echo base_url('leads/update');?>" id="lead_form" name="lead_form" method="POST">
 
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="leadID">Lead ID: </label>
                <input
                    type="hidden"
                    class="form-control"
                    id="leadID"
                    name="leadID"
                    value="<?php echo $lead['id'];?>">
					
               <?php echo $lead['id'];?>
            </div>			
            <div class="form-group">
                <label for="leadContactNo1">Lead Contact No.</label>
               <font color="red"><?php echo $lead['leadContactNo1'];?></font>
				<span id="leadContactNo1_error" class="text-required"></span>				
			   
            </div>
            <div class="form-group">
                <label for="leadFName">First Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="leadFName"
                    name="leadFName"
                    value="<?php echo $lead['leadFName'];?>">
				<span id="leadFName_error" class="text-required"></span>				
					
            </div>
            <div class="form-group">
                <label for="leadLName">Last Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="leadLName"
                    name="leadLName"
                    value="<?php echo $lead['leadLName'];?>">
				<span id="leadLName_error" class="text-required"></span>				
					
            </div>	
            <div class="form-group">
                <label for="leadContactNo2">Other Contact No. </label>
                <input
                    type="text"
                    class="form-control"
                    id="leadContactNo2"
                    name="leadContactNo2"
                    value="<?php echo $lead['leadContactNo2'];?>">
				<span id="leadContactNo2_error" class="text-required"></span>				
					
            </div>			
            <div class="form-group">
                <label for="leadAddr">Address</label>
                <textarea
                    class="form-control"
                    id="leadAddr"
                    rows="3"
                    name="leadAddr"><?php echo $lead['leadAddr'];?></textarea>
				<span id="leadAddr_error" class="text-required"></span>				
					
            </div>	
            <div class="form-group">
                <label for="leadCountry">Country</label>
						
					<select name="leadCountry" id="leadCountry">
						<option <?php echo $none;?> value="-">- choose Country -</option>
						<option <?php echo $usa;?> value="USA">USA</option>
						<option <?php echo $hawaii;?> value="Hawaii">Hawaii</option>
						<option <?php echo $canada;?> value="Canada">Canada</option>					
					</select>
            </div>	
            <div class="form-group">
                <label for="leadZip">Zip Code</label>
                <input
                    type="text"
                    class="form-control"
                    id="zip"
                    name="leadZip"
                    value="<?php echo $lead['leadZip'];?>">
            </div>		
            <div class="form-group">
                <label for="leadDispo">Disposition</label>
				
					<select name="leadDispo" id="leadDispo">
						<option <?php echo $nothing;?> value="">- choose disposition -</option>
						<option <?php echo $forcallback;?> value="For Call Back">For Call Back</option>
						<option <?php echo $ni;?> value="Not Interested">Not Interested</option>
						<option <?php echo $sales;?> value="Sales/Interested">Sales/Interested</option>
						<option <?php echo $dnc;?>  value="Do Not Call">Do Not Call</option>						
					</select>
				<span id="leadDispo_error" class="text-required"></span>				
					
            </div>			
            <div class="form-group">
                <label for="leadRemarks">Remarks</label>
                <textarea
                    class="form-control"
                    id="leadRemarks"
                    rows="3"
                    name="leadRemarks"><?php echo $lead['leadRemarks'];?></textarea>
				<span id="leadRemarks_error" class="text-required"></span>				
					
            </div>
            <div class="form-group">
                <label for="leadAgent">Agent:</label>
                <input
                    type="hidden"
                    class="form-control"
                    id="leadAgent"
                    name="leadAgent"
                    value="<?php echo $lead['leadAgent'];?>">	
					
				<?php echo $lead['leadAgent'];?>
            </div>			          
			<input type="submit"  name="submitbtn" id="submitbtn" class="btn btn-outline-primary" value="Update Lead">
			
        </form>
       
    </div>
</div>
       </div>
    </body>
	
<script>
$(document).ready(function()
{
	
	$('#lead_form').on('submit', function(event){
		event.preventDefault();
		
		$.ajax({
			url:"<?php echo base_url();?>leads/validation_edit", method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			beforeSend:function(){
				$('#btnsubmit').attr('disabled', 'disabled');

			},
			success: function(data)
			{
				if(data.error)
				{
						if(data.leadDispo_error !='')
						{
							$('#leadDispo_error').html(data.leadDispo_error);
						}	
						else
						{
							$('#leadDispo_error').html('');
						}						
						if(data.leadRemarks_error !='')
						{
							$('#leadRemarks_error').html(data.leadRemarks_error);
						}
						else
						{
							$('#leadRemarks_error').html('');
						}														
				}
				

				if(data.success)
				{
			     window.location.href = "<?php echo base_url('leads/');?>"; 
				 $('#success_message').html(data.success);
				 $('#leadDispo_error').html('');
				 $('#leadRemarks_error').html('');
				 $('#lead_form')[0].reset();
				}	
			}
			
		})
	});
})
</script>	
</html>