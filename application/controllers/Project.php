<?php
class Project extends CI_Controller {

    public function show()
    {
		if ( ! file_exists(APPPATH.'views/project/plist.php'))
	    {
    	    // Whoops, we don't have a page for that!
       	 	show_404();
    	}

 	$data['title'] = "plist";

	$this->load->view('templates/header', $data);
    $this->load->view('project/plist', $data);
	$this->load->view('templates/footer', $data);
    }
	

	public function create($page = 'pcreate')
    {
        if ( ! file_exists(APPPATH.'views/project/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

    $data['title'] = "create";

    $this->load->view('templates/header', $data);
    $this->load->view('project/'.$page, $data);
    $this->load->view('templates/footer', $data);
    }


}
