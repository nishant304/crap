<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadcsv extends CI_Controller {

public function __construct()
{
    parent::__construct();
    $this->load->helper('url');                    
    $this->load->model('Welcome_model','welcome');
}

public function index()
{
  $this->data['view_data']= $this->welcome->view_data();
  $this->load->view('excelimport', $this->data, FALSE);
}

  //////////////////Import subscriber emails ////////////////////////////////
public function importbulkemail()
{
  $this->load->view('excelimport');
}

public function import()
        {
  if(isset($_POST["import"]))
    {
        $filename=$_FILES["file"]["tmp_name"];
        if($_FILES["file"]["size"] > 0)
          {
            $file = fopen($filename, "r");
             while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                    $data[] = array(
                        'id' => $importdata[0],
                        'name' =>$importdata[1],
                        'mobile' => $importdata[2],
                        );
                    
             } 
             $insert = $this->welcome->insertCSV($data);
             

            fclose($file);
      $this->session->set_flashdata('message', 'Data are imported successfully..');
        redirect('uploadcsv/index');
          }else{
      $this->session->set_flashdata('message', 'Something went wrong..');
      redirect('uploadcsv/index');
    }
    }
  }

}
