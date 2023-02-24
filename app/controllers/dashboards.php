<?php  

class dashboards extends Controller
{
    private $portModel;
    public function __construct()
    {
        
    }
    public function dashboard{

        $data = [
            '' => '',
          ];
      
          $this->view('/index', $data);
    }



}