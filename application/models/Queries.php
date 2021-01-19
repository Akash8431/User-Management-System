<?php class Queries extends CI_Model{

	public function getRoles(){
		$roles=$this->db->get('tbl_roles');
		if($roles->num_rows()>0){
			return $roles->result();
		}
	}

	public function getOrganisation(){
		$organisation=$this->db->get('tbl_organisation');
		if($organisation->num_rows()>0){
			return $organisation->result();
		}
	}
	public function registerSuperadmin($data){
		return $this->db->insert('tbl_users',$data);
	}

	public function chkSuperadminExist(){
		$chkSuperadmin=$this->db->where(['role_id'=>'1'])->get('tbl_users');
		if($chkSuperadmin->num_rows()>0){
			return $chkSuperadmin->num_rows();
		}
	}
	public function superadminExist($email,$password){
		$chksuperadmin=$this->db->where(['email'=>$email,'password'=>$password])->get('tbl_users');
		if($chksuperadmin->num_rows()>0){
			return $chksuperadmin->row();
		}
	}

	public function makeOrganisation($data){
		return $this->db->insert('tbl_organisation',$data);

	}

	public function registerAdmin($data){
		return $this->db->insert('tbl_users',$data);
	}
	public function viewAllOrganisation(){
		$this->db->select(['tbl_users.user_id','tbl_users.email','tbl_organisation.organisation_id','tbl_users.username','tbl_users.gender','tbl_organisation.organisationname','tbl_organisation.subscription']);
		$this->db->from('tbl_organisation');
		$this->db->join('tbl_users','tbl_users.organisation_id=tbl_organisation.organisation_id');

		$this->db->join('tbl_roles','tbl_roles.role_id=tbl_users.role_id');

		$users=$this->db->get();
		return $users->result();
	}

	public function insertUser($data)
	{
		return $this->db->insert('tbl_user',$data);
	}

}
?>