<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Leads extends CI_Controller {
 
   public function __construct() {
      parent::__construct(); 
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Leads_model', 'leads');
   }
 
   /*
      Displays all leads in page
   */
  public function index()
  {
	  
    $data['leads'] = $this->leads->get_all();
    $data['title'] = "TIPID CALLS LEADS Manager";
    $this->load->view('layout/header');       
    $this->load->view('lead/index',$data);
    $this->load->view('layout/footer');

	
	//shey
	     $this->load->helper('url'); 
	//
	
  }
 
  /*
 
    Displays a lead detail
  */
  public function showlead($id)
  {
    $data['leaddetail'] = $this->leads->get($id);
    $data['title'] = "Show Lead Detail";
    $this->load->view('layout/header');
    $this->load->view('lead/showlead', $data);
    $this->load->view('layout/footer'); 
  }

  /*
 
    Displays the count of leads 
  */
  public function countLeads()
  {
    $data['leaddetail'] = $this->leads->get($id);
    $data['title'] = "Show Lead Detail";
    $this->load->view('layout/header');
    $this->load->view('lead/showlead', $data);
    $this->load->view('layout/footer'); 
  }
 
  /*
    Save the submitted lead
  */
  public function savelead()
  {
    $this->form_validation->set_rules('leadContactNo1', 'Contact Number', 'required');	  
    //$this->form_validation->set_rules('leadFName', 'First Name', 'required');
    //$this->form_validation->set_rules('leadLName', 'Last Name', 'required');
    //$this->form_validation->set_rules('leadAddr', 'Address', 'required');
    //$this->form_validation->set_rules('description', 'Description', 'required');
	$this->form_validation->set_rules('leadContactNo1', 'Contact Number', array('required', 'min_length[10]'));		
    $this->form_validation->set_rules('leadDispo', 'Disposition', 'required');
    $this->form_validation->set_rules('leadRemarks', 'Remarks', 'required');
    $this->form_validation->set_rules('leadAgent', 'Agent Logged In', 'required');
	
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('leads/addnew'));
    }
    else
    {
       $this->leads->savelead();
       //$this->session->set_flashdata('success', "New lead has been saved successfully!");
       redirect(base_url('leads'));
    }
 
  }
 
   /*
    Modifies the existing lead detail
  */
  public function update()
  {	
    $this->form_validation->set_rules('leadDispo', 'Disposition', 'required');
    $this->form_validation->set_rules('leadRemarks', 'Remarks', 'required');
	
	/**	
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('leads/editlead/' . $id));
    }
	**/

    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('leads/editlead/' . $id));
    }
    else
    {
		print_r('dito');die();
       $this->leads->update();
       //$this->session->set_flashdata('success', "New lead has been UPDATED successfully!");
       redirect(base_url('leads'));
    }
  
 
 
  }
  
  
  /*
    Edit a lead detail
  */
  public function editlead($id)
  {
    $data['lead'] = $this->leads->get($id);
    $data['title'] = "Edit Lead";


	$leadDispo=$data['lead']['leadDispo'];

	$data['forcallback'] = "";
	$data['nothing'] = "";
	$data['ni'] = "";
	$data['sales'] = "";
	$data['dnc'] = "";
	$data['new'] = "";
	
	$leadCountry=$data['lead']['leadCountry'];
	
	$data['usa']="";
	$data['hawaii']="";
	$data['canada']="";
	$data['none']="";
	switch (strtoupper($leadCountry)) {
		case "USA":
			$data['usa']="selected";
			break;
		case "HAWAII":
			$data['hawaii']="selected";
			break;
		case "CANADA":
			$data['canada']="selected";
			break;								
	}		

	switch (strtoupper($leadDispo)) {
		case "FOR CALL BACK":
			$data['forcallback']="selected";
			break;
		case "NOT INTERESTED":
			$data['ni'] = "selected";
			break;
		case "SALES/INTERESTED":
			$data['sales']="selected";
			break;
		case "DO NOT CALL":
			$data['dnc']="selected";
			break;		
		case "NEW":
			$data['new']="selected";
			break;		
		case "":
			$data['nothing'] = "";
			break;				
	}	
	
	
    $this->load->view('layout/header');
    $this->load->view('lead/editlead', $data);
    //$this->load->view('layout/footer');  	
  }
 

 
  /*
    Delete a lead
  */
  public function deletelead($id)
  {
    $item = $this->leads->deletelead($id);
    $this->session->set_flashdata('success', "Deleted Successfully!");
    redirect(base_url('leads'));
  }
 
 
   /*
    Add a New Lead
  */
  public function addnew()
  {
	  
    $data['title'] = "Add a New Lead";
    $this->load->view('layout/header');
    $this->load->view('lead/addnew',$data);
    //$this->load->view('layout/footer');     
  }
  
 function validation()
 {
	$this->load->library('form_validation');	 
	$this->form_validation->set_rules('leadContactNo1', 'Contact Number', array('required', 'min_length[10]'));		
    $this->form_validation->set_rules('leadDispo', 'Disposition', 'required');
    $this->form_validation->set_rules('leadRemarks', 'Remarks', 'required');
    $this->form_validation->set_rules('leadAgent', 'Agent Logged In', 'required');
	
	
    if ($this->form_validation->run())
    {
       $this->leads->savelead();
       //$this->session->set_flashdata('success', "New lead has been saved successfully!");	
	   $array = array(
		'success' => '<div class="alert alert-success">Lead has been added successfully!</div>'
	   );

    }
	else
	{
		$array=array(
			'error'   => true,
			'leadContactNo1_error'  => form_error('leadContactNo1'),
			'leadDispo_error'  => form_error('leadDispo'),
			'leadRemarks_error'  => form_error('leadRemarks'),
			'leadAgent_error'  => form_error('leadAgent')
			
		);
	}
	
    echo json_encode($array);
 }
 
 function validation_edit()
 {
	$this->load->library('form_validation');	 
    $this->form_validation->set_rules('leadDispo', 'Disposition', 'required');
    $this->form_validation->set_rules('leadRemarks', 'Remarks', 'required');
	

    if ($this->form_validation->run())
    {
       $this->leads->update();
       $this->session->set_flashdata('success', "Lead has been updated successfully!");	
		
	   $array = array(
		'success' => '<div class="alert alert-success">Lead has been updated successfully!</div>'
	   );

    }
	else
	{
		$array=array(
			'error'   => true,
			'leadDispo_error'  => form_error('leadDispo'),
			'leadRemarks_error'  => form_error('leadRemarks')			
		);
	}
	
    echo json_encode($array);
 }
  
}
?>