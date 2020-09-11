<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	// Database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kontak_model');
	}

	// Main page kontak
	public function index()	{
		$site 			= $this->konfigurasi_model->listing();

		$data = array(	'title'		=> 'Kontak '.$site->namaweb.' | '.$site->tagline,
						'deskripsi'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->tentang,
						'keywords'	=> 'Kontak '.$site->namaweb.' | '.$site->tagline.' '.$site->keywords,
						'site'		=> $site,
						'isi'		=> 'kontak/list');
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// send email
	public function send(){
		// $this->load->library('email');
		$smtp 			= $this->konfigurasi_model->listing();

		$config = array(
						
						'title'				=> $this->input->post('email'),
						'deskripsi'			=> $smtp->deskripsi,
						'keywords'			=> $smtp->keywords,
						'site'				=> $smtp,
						'isi'				=> 'kontak/mail'
		);


		// $to = $this->config->item('smtp_user');
        // $from = $this->input->post('email');
        // $subject = $this->input->post('subject');
        // $message = $this->input->post('message');
 
		// $this->email->set_newline("\r\n");
        // $this->email->from($from);
        // $this->email->to($to);
        // $this->email->subject($subject);
		// $this->email->message($message);

		$i 	= $this->input;
			$slug 	= url_title($i->post('send'),'dash',TRUE);

			$data = array(	'name'	=> $i->post('name'),
							'email'		=> $i->post('email'),
							'subject'	=> $i->post('subject'),
							'message'	=> $i->post('message'),
						);
			$status = $this->kontak_model->tambah($data);
			// $this->session->set_flashdata('sukses', 'pesan telah dikirim');
			// redirect(base_url('kontak'),'refresh');

			if ($status == true) {
				$this->load->view('layout/wrapper', $config);
			} else {
				?>
				<script type="text/javascript">
					alert("Sending message error !");
					// window.location.href='https://www.selempangbetawi.com/kontak';
				</script>
				<?php
				redirect(base_url('kontak'),'refresh');
				
			}
		
	}

}

/* End of file Contact.php */
/* Location: ./application/controllers/Kontak.php */