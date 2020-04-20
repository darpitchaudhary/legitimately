<?php
/*******************************************************************
Author    : Darpit Chaudhary
Usability : Model used to validate a user
 ********************************************************************/
class LoginModel extends CI_Model
{
    /*******************************************************
    Author    : Darpit Chaudhary
    Usability : checkUser 
    *******************************************************/    
    public function checkUser($username)
    {
        $query = $this->db->query("Select * from users where user_name=".$this->db->escape($username));
        $row = $query->row_array();
        return $row;
    }

    public function populateDeviceData()
    {
         $row_count=$this->db->count_all('device');
         $row_count=$row_count+1;
         $rand=rand();
         $query = $this->db->query("INSERT INTO device values(".$row_count.",'Laptop','".$rand."','".$rand."')");
         return $row_count;
    }

    public function populateLocationData()
    {
         $row_count=$this->db->count_all('location');
         $row_count=$row_count+1;
         $rand=rand(5,10);
         $query = $this->db->query("INSERT INTO location values(".$row_count.",'US',".$rand.",".$rand.")");
         return $row_count;
    }

    public function loadSessionData($user_id,$device_id,$location_id,$session_start_id)
    {
         $row_count=$this->db->count_all('sessions');
         $row_count=$row_count+1;
         $rand=rand(5,10);
         $query = $this->db->query("INSERT INTO sessions values(".$row_count.",".$user_id.",".$device_id.",".$location_id.",'".$session_start_id."',NOW(),NOW())");
    }

    public function storeSLA($user_id,$data)
    {
         $row_count=$this->db->count_all('document');
         $row_count=$row_count+1;
         $rand=rand(5,10);
         $data=str_replace('"', '', $data );
         $query = $this->db->query("INSERT INTO document values(".$row_count.",".$user_id.",'ULA',".$this->db->escape($data).",NOW(),NOW(),1)");
         return $row_count;
    }

    public function storeCompanyName($document_id,$company_name)
    {
        $query = $this->db->query("UPDATE document SET document_name='".$company_name." ULA' WHERE document_id=".$document_id);
    }

    public function fetchAnalyzedSenetences($document_id)
    {  
        $query = $this->db->query("SELECT * FROM document_mapping where document_id=".$document_id);
        return $query->result_array();
    }

    public function fetchSummary($document_id)
    {  
        $query = $this->db->query("SELECT * FROM summary where document_id=".$document_id);
        return $query->result_array();
    }

    public function getScore($document_id)
    {
        $query = $this->db->query("SELECT score FROM score where document_id=".$document_id);
        return $query->row('score');
    }

    public function fetchLastSessionId($user_id)
    {
        $query = $this->db->query("SELECT session_id FROM sessions where user_id=".$user_id." AND session_start_time=(SELECT MAX(session_start_time) from sessions WHERE user_id=".$user_id.")");
        return $query->row('session_id');
    }

    public function setLogoutSessionTime($user_id,$session_id)
    {
        $query = $this->db->query("UPDATE sessions SET session_end_time = NOW() where user_id=".$user_id." AND session_id=".$session_id);
    }
}
?>