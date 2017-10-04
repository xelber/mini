<?php

class Field extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model('field_m');
		$fields = $this->field_m->get_all();
		
		$this->load->view('field/browse', array( 'fields' => $fields ));
	}
	
	public function edit($id = null)
	{
		$this->load->model('field_m');
		
		$this->form_validation->set_rules(array(
			array('field' => 'status', 'label' => 'Status', 'rules' => 'trim|xss_clean|required'),
			array('field' => 'description', 'label' => 'Name', 'rules' => 'trim|xss_clean|required'),
			array('field' => 'field_type', 'label' => 'Field Type', 'rules' => 'trim|xss_clean|required'),
			array('field' => 'mandatory', 'label' => 'Mandatory', 'rules' => 'trim|xss_clean|required'),
			array('field' => 'field_id', 'label' => 'Field Id', 'rules' => 'trim|xss_clean'),
		));
		
		if ( $this->form_validation->run($this) )
		{
			$this->field_m->save(
						$this->input->post('description')
						,$this->input->post('field_type')
						,$this->input->post('status')
						,$this->input->post('mandatory')
						,$this->input->post('field_id')
						);
			redirect('/field');
		}
		
		$data = array();
		if ( !empty($id) )
		{
			$data['edit'] = $this->field_m->get($id);
			if ( empty($data['edit']) ) show_404 ();
		}
		else
		{
			$data['edit'] = array('description'=>'','field_type'=>'STRING','status'=>1,'mandatory'=>'');// Default
		}
		
		$this->load->view('field/edit',$data);
	}
	
	public function delete($id)
	{
		$this->load->model('field_m');
		$this->field_m->delete($id);
		echo json_encode(array('success'=>TRUE));
	}
}
