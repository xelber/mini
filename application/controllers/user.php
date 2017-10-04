<?php

class User extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model( array( 'user_m','field_m') );
		$data = array();
		$data['users'] = $this->user_m->get_all();
		$data['fields'] = $this->field_m->get_active();
		
		$this->load->view('user/browse', $data);
	}
	
	public function edit($id)
	{
		$this->load->model( array( 'user_m','field_m') );
		
		$data = array('user_id'=>$id);
		$data['edit'] = $this->user_m->get($id);
		if ( empty($data['edit']) ) show_404 ();
		
		$data['fields'] = $fields = $this->field_m->get_active();
		
		foreach ( $fields as $field )
		{
			$rule = 'trim|xss_clean|max_length[200]';
			switch ( $field['field_type'] )
			{
				case 'NUMERIC':
					if ( !empty($_POST['field'][$field['field_id']]) ) $rule .= '|numeric';
				break;
				// Add other custom validations
			}
			if ( 1 == $field['mandatory'] ) $rule .= '|required';
			
			$this->form_validation->set_rules(array(
					array('field' => 'field['.$field['field_id'].']'
						, 'label' => $field['description']
						, 'rules' => $rule)
					));
		}
		
		if ( $this->form_validation->run($this) )
		{
			$this->user_m->save($this->input->post('field'),$id);
			redirect('/user');
		}
		
		//$this->output->enable_profiler(TRUE);
		$this->load->view('user/edit',$data);
	}
}
