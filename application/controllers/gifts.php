<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gifts extends CI_Controller {

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
		$id = $this->input->get('id', TRUE);
		$key = $this->input->get('k', TRUE);
		if($id && $key)
		{
			$giftlist = R::load('giftlist',$id);
			
			if( ($giftlist->firstkey == $key) || ($giftlist->secondkey == $key)  )
			{
				$this->load->view('includes/head');
				$this->load->view('includes/header');
				
				if($giftlist->firstkey == $key) //es el encuestado
				{
					$data['gifts'] = $giftlist;
					$this->load->view('glist/gifts',$data);
				}
				
				if($giftlist->secondkey == $key) //es el creador
				{
					$data['gifts'] = $giftlist;
					$this->load->view('glist/viewlist',$data);
				}				

				$this->load->view('includes/footer');				
			}
			else {
				redirect('/error');	
			}

		}
		else {
			redirect('/error');	
		}



		
		
	}
	
	public function send() 
	{
		$key = $this->input->post('key');
		$id = $this->input->post('gift_id');
		
		if($key && $id )
		{
			$giftlist = R::load('giftlist',$id);
			
			if( ($giftlist->firstkey == $key) || ($giftlist->secondkey == $key) )
			{
				foreach ($giftlist->ownGift  as $gift) 
				{
					$getid = $gift->id;
					$preference = 'preference'.$getid;
					$comment = 'comment'.$getid;
					
					$get_preference =  $this->input->post($preference);
					$get_comment =  $this->input->post($comment);
					
					$gift->preference =  $get_preference;
					$gift->comment =  $get_comment;
					
					R::store($gift);
					
					$this->load->view('includes/head');
					$this->load->view('includes/header');
					$this->load->view('glist/sent2');
					$this->load->view('includes/footer');	
				
					$link = base_url().'gifts?id='.$id.'&k='.md5($giftlist->sender);		
					$this->email->from('contacto@ambedah.com', 'Giftnonymus');
					$this->email->to($giftlist->sender); 
					$this->email->subject('Ya han contestado tu encuesta!!');
					$this->email->message('Por favor visita el siguiente link:'.$link.'');	
					$this->email->send();						
					
				}
				
			} 
			else {
				redirect('/error');	
			}
			
		}

		

	}
	
	
	
	
}