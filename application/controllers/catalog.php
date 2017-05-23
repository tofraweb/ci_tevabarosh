<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {

  public $pageTitle = "קטלוג מלא";
  public $section = null;
  public $items_per_page = 8;
  public $search = null;
  public $total_items = 0;
  public $current_page = null;
  public $offset = 0;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('media_model','',TRUE);
  }

  public function index()
  {
      if(isset($_GET['cat'])){

          if($_GET['cat'] == 1){
              $this->pageTitle = "Books";
              $this->section = 1;
          } elseif ($_GET['cat'] == 2) {
              $this->pageTitle = "Movies";
              $this->section = 2;
          }elseif ($_GET['cat'] == 3) {
              $this->pageTitle = "Music";
              $this->section = 3;
          }
      }
//search
      if(isset($_GET["s"])){
          $this->search = filter_input(INPUT_GET,"s", FILTER_SANITIZE_STRING);
      }

//pagination
      if(isset($_GET["pg"])){
          $this->current_page = filter_input(INPUT_GET,"pg", FILTER_SANITIZE_NUMBER_INT);
      }

      if(empty($this->current_page)){
          $this->current_page = 1;
      }

      $pagination_result = $this->setPagination();

      if(!empty($this->search)){
          $pagination_result['catalog'] = $this->media_model->search_catalog_array($this->search,$this->items_per_page,$this->offset);
          // echo '<pre>';
          // var_dump($catalog);
          // echo '</pre>';
          // exit;
      }elseif(empty($this->section)){
          $pagination_result['catalog'] = $this->media_model->full_catalog_array($this->items_per_page,$this->offset);
      }else{
          $this->media_model->category_catalog_array($this->section,$this->items_per_page,$this->offset);
      }

      $data['search'] = $this->search;
      $data['section'] = $this->section;
      $data['total_items'] = $this->total_items;
      $data['pageTitle'] = $this->pageTitle;
      $data['pagination'] = $pagination_result['pagination'];
      $data['catalog'] = $pagination_result['catalog'];
      $this->load->view('inc/header');
      $this->load->view('bootstrap/catalog_view',$data);
      $this->load->view('inc/footer');
  }

  public function setPagination(){
    //pagination calculations
    $this->total_items = $this->media_model->get_catalog_count($this->section,$this->search);
    $total_pages = 1;

    if($this->total_items > 0){
        $total_pages = ceil($this->total_items / $this->items_per_page); //rounding the result

        //limit results in redirect
        $limit_results = "";
        if(!empty($this->search)){
            //validating $search value input by the user
            $limit_results = "s=".urlencode(htmlspecialchars($this->search))."&";
        }elseif(!empty($this->section)){
            $limit_results = "cat=".$this->section."&";
        }
        //redirect too-large page numbers to the last page
        if($this->current_page > $total_pages){
            header("location:catalog.php?".$limit_results."pg=".$total_pages);
        }
        //redirect too-small page numbers to the first page
        if($this->current_page < 1){
            header("location:catalog.php?".$limit_results."pg=1");
        }
        //determine the offset (numberm of items to skip) for the current page
        //for example: on page 3 with 8 items per page, the offset will be 16
        $this->offset = ($this->current_page - 1)  * $this->items_per_page;

        $catalog = $this->media_model->category_catalog_array($this->section,$this->items_per_page,$this->offset);
        //$catalog = category_catalog_array($section,$items_per_page,$offset);

        $pagination_result = array();
        $pagination_result['catalog'] = $catalog;

        $pagination = "<div class = \"pagination\">";
        $pagination .= "Pages: ";
        for($i = 1; $i <= $total_pages; $i++){
            if($i == $this->current_page){
                $pagination .= "<span> $i </span>";
            }else{
                $pagination .= "<a href='catalog.php?";
                if(!empty($this->search)){
                    //validating $search value input by the user
                    $pagination .= "s=".urlencode(htmlspecialchars($this->search))."&";
                }elseif(!empty($this->section)){
                    $pagination .= "cat=".$this->section."&";
                }
                $pagination .= "pg=$i'> $i </a>";
            }
        }
        $pagination .= "</div>";
        $pagination_result['pagination'] = $pagination;
        // echo '<pre>';
        // var_dump($pagination_result);
        // echo '</pre>';
        // exit;
        return $pagination_result;
    }
  }

  public function getRandomItemList(){
    $catalog = $this->media_model->random_catalog_array();
    $data['catalog'] = $catalog;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/portfolio_3_col_view',$data);
    $this->load->view('inc/footer');
  }


}
