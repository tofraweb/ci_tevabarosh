<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Catalog extends CI_Controller {

  public $pageTitle = '';
  public $subTitle = '';
  public $section = null;
  public $items_per_page = 9;
  public $search = null;
  public $total_items = 0;
  public $current_page = 1;
  public $offset = 0;
  public $category = 0;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('catalog_model','',TRUE);
  }

  public function index()
  {
      if(isset($_GET['cat'])){

          $this->category = $this->catalog_model->get_category_name($_GET['cat']);

          switch ($_GET['cat']) {
            case '1':
              $this->pageTitle = $this->category->name;
              $this->section = 1;
              break;
            case '2':
              $this->pageTitle = $this->category->name;
              $this->section = 2;
              break;
            case '3':
              $this->pageTitle = $this->category->name;
              $this->section = 3;
              break;
            case '4':
              $this->pageTitle = $this->category->name;
              $this->section = 4;
              break;
              case '5':
                $this->pageTitle = $this->category->name;
                $this->section = 5;
                break;
            default:
              # code...
              break;
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

      $data['search'] = $this->search;
      $data['section'] = $this->section;
      $data['total_items'] = $this->total_items;
      $data['pageTitle'] = $this->pageTitle;
      if($this->total_items > $this->items_per_page){
        $data['pagination'] = $pagination_result['pagination'];
      }else{
        $data['pagination'] = null;
      }
      $data['catalog'] = $pagination_result['catalog'];
      $this->load->view('inc/header');
      $this->load->view('bootstrap/catalog_view',$data);
      $this->load->view('inc/footer');
  }

  public function setPagination($count = null){
    //pagination calculations
    if($count){
      $this->total_items = $count;
    }else{
      $this->total_items = $this->catalog_model->get_catalog_count($this->section,$this->search);
    }

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
            header("location:catalog?".$limit_results."pg=".$total_pages);
        }
        //redirect too-small page numbers to the first page
        if($this->current_page < 1){
            header("location:catalog?".$limit_results."pg=1");
        }
        //determine the offset (numberm of items to skip) for the current page
        //for example: on page 3 with 8 items per page, the offset will be 16
        $this->offset = ($this->current_page - 1) * $this->items_per_page;

        $pagination_result = array();
        if(!empty($this->search)){
            $pagination_result['catalog'] = $this->catalog_model->search_catalog_array($this->search,$this->items_per_page,$this->offset);
        }elseif(empty($this->section)){
            $pagination_result['catalog'] = $this->catalog_model->full_catalog_array($this->items_per_page,$this->offset);
        }else{
            $pagination_result['catalog'] = $this->catalog_model->category_catalog_array($this->section,$this->items_per_page,$this->offset);
        }
        $pagination = "<div class = \"col-lg-12\">";
        $pagination .= "<ul class=\"pagination\">";
        $pagination .= "<li><a href='#'> &laquo;</a></li>";

        for($i = 1; $i <= $total_pages; $i++){
            $pagination .= "<li ";
            if($i == $this->current_page){
              $pagination .= "class=\"active\"";
            }
            $pagination .= "><a href='?";
            if(!empty($this->search)){
                //validating $search value input by the user
                $pagination .= "s=".urlencode(htmlspecialchars($this->search))."&";
            }elseif(!empty($this->section)){
                $pagination .= "cat=".$this->section."&";
            }
            $pagination .= "pg=$i'> $i </a></li>";
        }

        $pagination .= "<li><a href='#'> &raquo;</a></li>";
        $pagination .= "</ul>";
        $pagination .= "</div>";
        $pagination_result['pagination'] = $pagination;
        return $pagination_result;
    }
  }

  public function getRandomSpeciesList(){
    $catalog = $this->catalog_model->random_catalog_array();
    $data['catalog'] = $catalog;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/portfolio_3_col_view',$data);
    $this->load->view('inc/footer');
  }

  public function getSpecies($id){
    $species = $this->catalog_model->single_species_array($id);
    $pictures = $this->catalog_model->get_pictures($id);
    $genus = $this->catalog_model->get_genus($id);
    $family = $this->catalog_model->get_family($genus->family_id);
    $order = $this->catalog_model->get_order($family->order_id);
    $session_data = $this->session->userdata('logged_in');

    $data['species'] = $species;
    $data['pictures'] = $pictures;
    $data['genus'] = $genus;
    $data['family'] = $family;
    $data['order'] = $order;
    $data['logged_in'] = $session_data;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/portfolio_species_view',$data);
    $this->load->view('inc/footer');
  }

 //not ready yet
  public function getSpeciesListInOrder($id){
    $family_arr = array();
    $genus_arr = array();
    $species_list = array();
    $temp_a = array();
    $family_arr = $this->catalog_model->getFamilyListInOrder($id);
    $family_id_array = array();

    foreach ($family_arr as $key=>$family) {
      $family_id_array[] = $family->id;
    }

    for($i=0; $i<count($family_id_array); $i++){
      $temp_a = $this->catalog_model->getGenusListInFamily($family_id_array[$i]);
      for($j=0; $j<count($temp_a); $j++){
        $genus_arr[] = $temp_a[$j];
      }
    }

    foreach ($genus_arr as $key=>$genus) {
      $genus_id_array[] = $genus->id;
    }

    for($i=0; $i<count($genus_id_array); $i++){
      $temp_a = $this->catalog_model->getSpeciesListInGenus($genus_id_array[$i]);
      for($j=0; $j<count($temp_a); $j++){
        $species_list[] = $temp_a[$j];
      }
    }

    //  echo '<pre>';
    //  var_dump($species_list);
    //  exit;
    //  echo '</pre>';
    $species_count = count($species_list);
    $pagination_result = $this->setPagination($species_count);

    $data['search'] = $this->search;
    $data['section'] = $this->section;
    $data['total_items'] = $this->total_items;
    $data['pageTitle'] = $this->pageTitle;
    $data['pageTitle'] = $this->catalog_model->get_classification_name($id, 'orders')->name_he;
    $data['pagination'] = null;
    $data['catalog'] = $species_list;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/catalog_view',$data);
    $this->load->view('inc/footer');
  }

  public function getSpeciesListInFamily($id){

    $genus_list = $this->catalog_model->getGenusListInFamily($id);
    $species_id_array = array();
    foreach ($genus_list as $genus=>$species) {
      $species_id_array[] = $species->id;
    }
    $species_list = array();
    $temp_a = array();
    for($i = 0; $i < count($species_id_array); $i++) {
      $temp_a = $this->catalog_model->getSpeciesListInGenus($species_id_array[$i]);
      for($j = 0; $j < count($temp_a); $j++ ){
        $species_list[] = $temp_a[$j];
      }
    }

    $species_count = count($species_list);
    $pagination_result = $this->setPagination($species_count);

    $data['search'] = $this->search;
    $data['section'] = $this->section;
    $data['total_items'] = $this->total_items;
    $data['pageTitle'] = $this->pageTitle;
    $data['pageTitle'] = $this->catalog_model->get_classification_name($id, 'family')->name_he;
    $data['pagination'] = null;
    $data['catalog'] = $species_list;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/catalog_view',$data);
    $this->load->view('inc/footer');
  }

  public function getSpeciesListInGenus($id){

    $species_list = $this->catalog_model->getSpeciesListInGenus($id);
    $species_count = count($species_list);
    $pagination_result = $this->setPagination($species_count);

    $data['search'] = $this->search;
    $data['section'] = $this->section;
    $data['total_items'] = $this->total_items;
    $data['pageTitle'] = $this->catalog_model->get_classification_name($id, 'genus')->name_he;
    $data['pagination'] = null;
    $data['catalog'] = $species_list;
    $this->load->view('inc/header');
    $this->load->view('bootstrap/catalog_view',$data);
    $this->load->view('inc/footer');

  }




}
