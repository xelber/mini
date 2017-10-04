<?php

class User_m extends CI_Model {
	
	public function get_all()
	{
		$data = $this->db->order_by('user_id')->get('user_details')->result_array();
		
		return $data;
	}
	
	public function save($data, $user_id)
	{
		foreach ( $data as $field_id => $val )
		{
			$current = $this->db->where(array('user_id' => $user_id, 'field_id' => $field_id))->get('user_details')->result_array();
			$count = count($current);
			if ( $count == 0 )
			{
				$this->db->insert('user_details',array('user_id' => $user_id
													, 'field_id' => $field_id
													, 'value' => $val
				));
			}
			else
			{
				$update_data['value'] = $val;
				$this->db->update('user_details', $update_data, array('user_id' => $user_id, 'field_id' => $field_id));
			}
			
		}
	}
	
	public function get($id)
	{
		$id = (int)$id;// Makes sure it's only int, removing the posibility of XSS or SQL Injection
		$query = $this->db->get_where('user_details',array('user_id'=>$id));
		if ( $query->num_rows() == 0 ) return NULL;
		
		$ret_array = array();
		foreach ( $query->result_array() as $row )
		{
			$ret_array[$row['field_id']] = $row['value'];
		}
		return $ret_array;
	}
}
