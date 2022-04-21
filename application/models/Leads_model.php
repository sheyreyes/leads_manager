	
<?php
 
 
class Leads_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
    }
 
    /*
        Gets  lead from the database
    */
    public function get_all()
    {
        $leads = $this->db->get("FreshLeads")->result();
        return $leads;
    }
 
    /*
        Saves the lead in the database
    */
    public function savelead()
    {    
        $data = [
            'leadContactNo1'        => $this->remove_sp_chr($this->input->post('leadContactNo1')),
            'leadContactNo2' => $this->remove_sp_chr($this->input->post('leadContactNo2')),
            'leadFName' => $this->remove_sp_chr($this->input->post('leadFName')),		
            'leadLName' => $this->remove_sp_chr($this->input->post('leadLName')),			
            'leadAddr' => $this->remove_sp_chr($this->input->post('leadAddr')),			
            'leadCountry' => $this->input->post('leadCountry'),			
            'leadZip' => trim($this->input->post('leadZip')),			
            'leadDispo' => $this->input->post('leadDispo'),			
            'leadRemarks' => $this->remove_sp_chr($this->input->post('leadRemarks')),
            'leadAgent' => $this->remove_sp_chr($this->input->post('leadAgent'))
			
        ];
 
        $result = $this->db->insert('FreshLeads', $data);
        return $result;
    }
 
	public function remove_sp_chr($str)
	{
		$result = str_replace(array("#", "'", ";"), '', trim(strtoupper($str)));
		return $result;
	}
    /*
        Get an specific lead from the database
    */
    public function get($id)
    {
        $lead = $this->db->get_where('FreshLeads', ['id' => $id ])->row_array();
        return $lead;
    }
 
 
    /*
        Update or Modify a lead in the database
    */
    public function update() 
    {
        $data = [
            'leadContactNo2' => $this->remove_sp_chr($this->input->post('leadContactNo2')),
            'leadFName' => $this->remove_sp_chr($this->input->post('leadFName')),		
            'leadLName' => $this->remove_sp_chr($this->input->post('leadLName')),			
            'leadAddr' => $this->remove_sp_chr($this->input->post('leadAddr')),			
            'leadCountry' => $this->remove_sp_chr($this->input->post('leadCountry')),			
            'leadZip' => $this->input->post('leadZip'),			
            'leadDispo' => $this->remove_sp_chr($this->input->post('leadDispo')),			
            'leadRemarks' => $this->remove_sp_chr($this->input->post('leadRemarks'))	
        ];
 
        $result = $this->db->where('id',$this->input->post('leadID'))->update('FreshLeads',$data);
        return $result;
                 
    }
 
    /*
        removes a lead in the database
    */
    public function deletelead($id)
    {
        $result = $this->db->delete('FreshLeads', array('id' => $id));
        return $result;
    }
     
}
?>