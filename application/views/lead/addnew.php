<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card1">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('leads');?>"> 
            View All Leads
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
		<span id="success_message"></span>
		<span id="error"></span>
		
        <form action="<?php echo base_url('leads/savelead');?>" id="lead_form" name="lead_form" method="POST">
            <div class="form-group">
                <label for="leadContactNo1">Lead Contact #</label>
                <input type="text" class="form-control" id="leadContactNo1" name="leadContactNo1">
				<span id="leadContactNo1_error" class="text-required"></span>				
            </div>	
			
            <div class="form-group">
                <label for="leadFName">First Name</label>
                <input type="text" class="form-control" id="leadFName" name="leadFName">
				<span id="leadFName_error" class="text-required"></span>				
				
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="leadLName">
				<span id="leadLName_error" class="text-required"></span>				
				
            </div>			
            <div class="form-group">
                <label for="leadAddr">Address</label>
                <textarea class="form-control" id="leadAddr" rows="3" name="leadAddr"></textarea>
				<span id="leadAddr_error" class="text-required"></span>				
				
            </div>	
            <div class="form-group">
                <label for="leadContactNo2">Other Contact #</label>
                <input type="text" class="form-control" id="leadContactNo2" name="leadContactNo2">
				<span id="leadContactNo2_error" class="text-required"></span>				
				
            </div>				
            <div class="form-group">
                <label for="country">Country</label>
			
					<select name="leadCountry" id="country">
						<option value="">- select -</option>		
						<option value="USA">USA</option>
						<option value="Hawaii">Hawaii</option>
						<option value="Canada">Canada</option>
					
					</select>      
				<span id="leadCountry_error" class="text-required"></span>				
					
			</div>		
            <div class="form-group">
                <label for="zip">Zip Code</label>
                <input type="text" class="form-control" id="zip" name="leadZip">
				<span id="zip_error" class="text-required"></span>				
				
            </div>		
            <div class="form-group">
                <label for="leadDispo">Disposition</label>
			
					<select name="leadDispo" id="leadDispo">
						<option value=''>- select -</option>		
						<option value="No Answer">No Answer</option>
						<option value="For Call Back">For Call Back</option>
						<option value="Not Interested">Not Interested</option>
						<option value="Sales/Interested">Sales/Interested</option>
						<option value="Do Not Call">Do Not Call</option>						
					</select>
				<span id="leadDispo_error" class="text-required"></span>				
					
            </div>					
            <div class="form-group">
                <label for="leadRemarks">Remarks</label>
                <textarea class="form-control" id="leadRemarks" rows="3" name="leadRemarks" placeholder="Message"></textarea>
				<span id="leadRemarks_error" class="text-required"></span>				
				
            </div>
            <div class="form-group">
                <label for="leadAgent">Agent Login</label>
                <input type="text" class="form-control" id="leadAgent" name="leadAgent">
				<span id="leadAgent_error" class="text-required"></span>				
				
            </div>
			
			
			<input type="submit"  name="submitbtn" id="submitbtn" class="btn btn-outline-primary" value="Save Lead">
			

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
			url:"<?php echo base_url();?>leads/validation", method:"POST",
			data:$(this).serialize(),
			dataType:"json",
			beforeSend:function(){
				$('#submitbtn1').attr('disabled', 'disabled');

			},
			success: function(data)
			{
				if(data.error)
				{
						if(data.leadContactNo1_error !='')
						{
							$('#leadContactNo1_error').html(data.leadContactNo1_error);
						}
						else
						{
							$('#leadContactNo1error').html('');
						}
					
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
								
						if(data.leadAgent_error !='')
						{
							$('#leadAgent_error').html(data.leadAgent_error);
						}	
						else
						{
							$('#leadAgent_error').html('');
						}						
				}
				if(data.success)
				{
				 $('#success_message').html(data.success);
				 $('#leadContactNo1_error').html('');
				 $('#leadDispo_error').html('');
				 $('#leadRemarks_error').html('');
				 $('#leadAgent_error').html('');
				 $('#lead_form')[0].reset();
				}	
				$('#btnsubmit').attr('disabled', false);
			
			}
		})
	});
})
</script>
	
</html>
