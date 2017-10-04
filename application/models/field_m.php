<?php

class Field_m extends CI_Model {
	
	public function get_all()
	{
		return $this->db->get('standard_user_fields')->result_array();
	}
	
	public function get_active()
	{
		return $this->db->where(array('status'=>1))->get('standard_user_fields')->result_array();
	}
	
	public function save($name, $type, $status, $mandatory, $field_id = null)
	{
		$data = array(
			'description' => $name,
			'field_type' => $type,
			'status' => $status,
			'mandatory' => $mandatory
		);
		if ( empty($field_id) )
			$this->db->insert('standard_user_fields', $data);
		else
			$this->db->update('standard_user_fields', $data, array('field_id' => $field_id));
	}
	
	public function get($id)
	{
		$id = (int)$id;
		$query = $this->db->get_where('standard_user_fields',array('field_id'=>$id));
		if ( $query->num_rows() == 0 ) return NULL;
		
		return current($query->result_array());
	}
	
	public function delete($id)
	{
		$id = (int)$id;
		$query = $this->db->delete('standard_user_fields',array('field_id'=>$id));
	}
}
