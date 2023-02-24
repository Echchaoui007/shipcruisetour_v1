<?php
class Pages extends Controller
{
  private $postModel;
  public function __construct()
  {

    $this->postModel = $this->model('post');
  }

  public function index()
  {
    $data = [
      '' => '',
    ];

    $this->view('pages/index', $data);
  }

  public function gallery()
  {
    //get posts
    

    $data = [
      '' => ''
    ];

    // load view with data 
    $this->view('pages/gallery', $data);
  }

  

 
}
