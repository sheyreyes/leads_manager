

<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div id="main">
    <div class="card-header1">
        <a class="btn btn-outline-primary" href="<?php echo base_url('leads/addnew/');?>"> 
            Enter New Lead
        </a>

    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
 

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Contact No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Other Contact No.</th>
                <th>Address</th>
                <th>Country</th>
                <th>Zip Code</th>
                <th>Last Disposition</th>
                <th>Remarks</th>
                <th>Agent</th>
                <th width="240px">Action</th>
            </tr>
 
            <?php foreach ($leads as $lead) { ?>      
            <tr>
                <td><?php echo $lead->id; ?></td>
                <td><?php echo $lead->leadContactNo1; ?></td>    
                <td><?php echo $lead->leadFName; ?></td>     		
                <td><?php echo $lead->leadLName; ?></td>  
                <td><?php echo $lead->leadContactNo2; ?></td> 
                <td><?php echo $lead->leadAddr; ?></td>   			
                <td><?php echo $lead->leadCountry; ?></td>   				
                <td><?php echo $lead->leadZip; ?></td>   				
                <td><?php echo $lead->leadDispo; ?></td>   				
                <td><?php echo $lead->leadRemarks; ?></td>   				
                <td><?php echo $lead->leadAgent; ?></td>   				
                <td>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('leads/showlead/'. $lead->id) ?>"> 
                        Show
                    </a>
                    <a
                        class="btn btn-outline-success"
                        href="<?php echo base_url('leads/editlead/'.$lead->id) ?>"> 
                        Edit
                    </a>
                    <button id="simpleConfirm" class="btn btn-outline-danger" onclick="AskDelete(<?php echo $lead->id;?>)"> 
					                        Delete 
                    </button>
								
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
<div id="dialog-confirm" style="display: none;" title="Confirmation">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>You are about to delete this record. Are you sure?</p>
</div>
 
  <script>
  function AskDelete(leadId)
  {
	  var x = document.getElementById("dialog-confirm");

	  x.style.display = "block";

			$( "#dialog-confirm" ).dialog({
			  resizable: false,
			  height: "auto",
			  width: 400,
			  modal: true,
			  buttons: {
				"Delete selected record": function() {
					window.location.href="<?php echo base_url('leads/deletelead/') ?>" + leadId;
				  $( this ).dialog( "close" );
				},
				Cancel: function() {
				  $( this ).dialog( "close" );
				}
			  }
			});
  }
  </script>



