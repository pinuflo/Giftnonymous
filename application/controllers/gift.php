<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gift extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	public function index()
	{
		
		if($glist = $this->session->userdata('gifts') )
		{
			$data['glist'] = $glist;
		
		}
		else {
			$data['glist'] = null;
		}
		
		$data['error'] = 0;
		
		$this->load->view('includes/head');
		$this->load->view('includes/header');
		$this->load->view('glist/giftcreate',$data);
		$this->load->view('includes/footer');
		
		
	}
	
	public function add() 
	{
		$name = $this->input->post('name');
		$link = $this->input->post('link');
		
		if( $name && $link )
		{
			
			$gifts = $this->session->userdata('gifts') ;
			if($gifts)
			{
				foreach ($gifts as $aux )
				{
					$gift[] = $aux;
				}
				$gift[] = array('name'  => $name, 'link'  => $link );
				$gifts =  array('gifts'  => $gift);	
			}
			else {
				$gift[] = array('name'  => $name, 'link'  => $link );				
				$gifts =  array('gifts'  => $gift);					
			}
	
			$this->session->set_userdata($gifts);
			
			
			redirect('/gift');
		}
		else
		{
			redirect('/error');	
		}
		
		
	}	

    public function	validate_send_data($recipent,$sender,$gifts,$whylist)
	{
		$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		if( !$gifts)
			return 2;
			
		if( $recipent && $sender && $whylist )
		{
			if (!preg_match($regex, $recipent)) {
			   return 1;
			};	
			if (!preg_match($regex, $sender)) {
			   return 1;
			};			
			
			if( $sender == $recipent )
			{
				return 3;
			}
				
			return 0;
		}
		else {
			return 10;
		}
		
	}
	

	public function send() 
	{
		$whylist = $this->input->post('why');
		$recipent = $this->input->post('recipent');
		$sender = $this->input->post('sender');		
		$gifts = $this->session->userdata('gifts') ;

		if( $this->validate_send_data($recipent,$sender,$gifts,$whylist) == 0 ){
				$giftlist = R::dispense('giftlist');
				$giftlist->why = $whylist;
				$giftlist->recipent = $recipent;
				$giftlist->sender = $sender;		
				$giftlist->firstkey = md5($recipent);
				$giftlist->secondkey = md5($sender);	
				$id = R::store($giftlist);	


				foreach ($gifts as $aux )
				{
					$gift = R::dispense('gift');
					$gift->name = $aux['name'];
					$gift->url = $aux['link'];
					$gift->preference = 0;
					$gift->comment = '';	
					R::store($gift);
					$giftlist->ownGift[] = $gift;
				}
				 R::store($giftlist); 
				 $this->session->sess_destroy();
				 
				$giftlist = R::load('giftlist',$id);
				$data['giftlist'] = $giftlist;
					
					
				$link = base_url().'gifts?id='.$id.'&k='.md5($recipent);		
				$this->email->from('contacto@giftnonymus.com', 'Giftnonymus');
				$this->email->to($recipent); 
				$this->email->subject('Alguien conocido quiere saber que regalo prefieres');
				$this->email->message('Por favor visita el siguiente link:'.$link.'');	
				$this->email->send();			
				

				$this->email->from('contacto@giftnonymus.com', 'Giftnonymus');
				$this->email->to('ignasiop@gmail.com'); 
				$this->email->subject('Alguien ha utilizado el sitio!');
				$this->email->message('El correo fue enviado por:'.$sender.'');	
				$this->email->send();		
					 
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('glist/sent',$data);
				$this->load->view('includes/footer');
				
				

				
		}
	else
	{
				if($glist = $this->session->userdata('gifts') )
				{
					$data['glist'] = $glist;
				
				}
				else {
					$data['glist'] = null;
				}		
				
				$data['error'] = $this->validate_send_data($recipent,$sender,$gifts,$whylist) ;
		
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				$this->load->view('glist/giftcreate',$data);
				$this->load->view('includes/footer');
	}
		
		
		
		 
	 
		 
	}


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */