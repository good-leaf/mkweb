<?php
class Mkcfg extends CI_Controller {

    public function show()
    {
	    parse_str($_SERVER['QUERY_STRING'], $data);
		if ( ! file_exists(APPPATH.'views/mkcfg/mlist.php'))
	    {
    	    // Whoops, we don't have a page for that!
       	 	show_404();
    	}


	$this->load->view('templates/header', $data);
    $this->load->view('mkcfg/mlist', $data);
	$this->load->view('templates/footer', $data);
    }
	

	public function create($page = 'mset')
    {
		 parse_str($_SERVER['QUERY_STRING'], $data);
        if ( ! file_exists(APPPATH.'views/mkcfg/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }


    $this->load->view('templates/header', $data);
    $this->load->view('mkcfg/'.$page, $data);
    $this->load->view('templates/footer', $data);
    }
	
	public function delete()
    {
         parse_str($_SERVER['QUERY_STRING'], $data);
        if ( ! file_exists(APPPATH.'views/mkcfg/delete.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }


    $this->load->view('templates/header', $data);
    $this->load->view('mkcfg/delete', $data);
    $this->load->view('templates/footer', $data);
    }


	public function modify()
    {
         parse_str($_SERVER['QUERY_STRING'], $data);
        if ( ! file_exists(APPPATH.'views/mkcfg/modify.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }


    $this->load->view('templates/header', $data);
    $this->load->view('mkcfg/modify', $data);
    $this->load->view('templates/footer', $data);
    }

	public function info()
    {
        if ( ! file_exists(APPPATH.'views/mkcfg/info.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }
	$data['title'] = "info";

    $this->load->view('templates/header', $data);
    $this->load->view('mkcfg/info', $data);
    $this->load->view('templates/footer', $data);
    }
}
