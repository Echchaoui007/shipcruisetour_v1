<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'shipcruisetour',
      ];
     
      $this->view('pages/index', $data);
    }

    public function gallery(){
      $data = [
        'title' => 'gallery'
      ];

      $this->view('pages/gallery', $data);
    }
  }