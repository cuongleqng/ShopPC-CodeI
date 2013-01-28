<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    public $data,$cat=6,$nsx = 0,$priceup = 0,$pricedown = 0,$page;
    function __construct(){
        parent:: __construct();
        
        $this->load->model(array('mmain','mleft','msanpham','muser','msupport'));
        $this->load->helper(array('link_helper','source_helper'));
        $this->load->library(array('captcha_','session','cart'));
        
         //Get info footer
         
        $this->load->config('config');
        $this->mmain->updateVisit();
        $this->data['visit'] = $this->mmain->getVisit();
        
        $this->data['support'] = $this->msupport->getSupport();

        //Get info flash
        $this->data['flash']= $this->mmain->getFlash();
        if ($this->session->userdata('email') && $this->session->userdata('log_in') == true)
            $this->data['user'] = $this->muser->getInfoUser($this->session->userdata('email'));
        
        
    
        
        
    }
	public function index()
	{
        
        //Get info left menu
	}
    
    
    private function getMenuDefault(){
        
        $this->data['cat'] = $this->cat;
        $this->data['priceup'] = $this->priceup;
        $this->data['pricedown'] = $this->pricedown;
        $this->data['seg_nsx'] = $this->nsx;
        $this->data['danhmuc'] = $this->mleft->getMenu();
        $this->data['nsx'] = $this->mleft->getNSX();
        $this->data['price'] = $this->mleft->getPrice();
		
        
    }
    
    public function cat(){
        
        if ( $this->uri->segment(3) && is_numeric($this->uri->segment(3)))
            $this->cat = $this->uri->segment(3);
        else
            $this->cat = 6;
            
        $this->data['cat'] = $this->cat;
        
        if ( $this->uri->segment(5) && is_numeric($this->uri->segment(5))) 
            $this->nsx =  $this->uri->segment(5);
        else
            $this->nsx = 0;
            
        $this->data['seg_nsx'] = $this->nsx;
        
        if ( $this->uri->segment(7) && is_numeric($this->uri->segment(7)))
            $this->priceup = $this->uri->segment(7);
        $this->data['priceup'] = $this->priceup;
            
        if ( $this->uri->segment(9) && is_numeric($this->uri->segment(9)))
            $this->pricedown = $this->uri->segment(9);
        $this->data['pricedown'] = $this->pricedown;
        
        if ( $this->uri->segment(11) && is_numeric($this->uri->segment(11)))
            $this->page = $this->uri->segment(11);
        else
            $this->page = 1;
        $this->data['page'] = $this->page;
        
        $this->data['main_page'] = 'listsp';
  
        $this->data['danhmuc'] = $this->mleft->getMenu($this->cat,$this->nsx);
        $this->data['nsx'] = $this->mleft->getNSX();
        $this->data['price'] = $this->mleft->getPrice($this->cat);
        $this->data['title'] = $this->msanpham->getTitle($this->cat, $this->nsx);
        $this->data['product'] = $this->msanpham->getProduct($this->cat,$this->nsx,$this->priceup,$this->pricedown,$this->page);
        $this->load->view('main',$this->data);
    }
    
    public function detail(){
        if ( $this->uri->segment(5) && is_numeric($this->uri->segment(5)))
            $this->cat = $this->uri->segment(5);
        else
            $this->cat = 6;
            
        $this->data['cat'] = $this->cat;
        
        if ( $this->uri->segment(7) && is_numeric($this->uri->segment(7))) 
            $this->nsx =  $this->uri->segment(7);
        else
            $this->nsx = 0;
            
        $this->data['seg_nsx'] = $this->nsx;
        
        if ( $this->uri->segment(9) && is_numeric($this->uri->segment(9)))
            $this->priceup = $this->uri->segment(9);
        else
            $this->priceup = 0;
            
        $this->data['priceup'] = $this->priceup;
            
        if ( $this->uri->segment(11) && is_numeric($this->uri->segment(11)))
            $this->pricedown = $this->uri->segment(11);
        else
            $this->pricedown = 0;
        
        $this->data['pricedown'] = $this->pricedown;
        
        $this->data['main_page'] = 'detailsp';
        $this->data['danhmuc'] = $this->mleft->getMenu($this->cat,$this->nsx);
        $this->data['nsx'] = $this->mleft->getNSX();
        $this->data['price'] = $this->mleft->getPrice($this->cat);
        if ($this->uri->segment(3) && is_numeric($this->uri->segment(3)))
            $this->data['spid'] = $this->uri->segment(3);
        else
            $this->data['spid'] = 0;
        $this->data['detail'] = $this->msanpham->getDetailProduct($this->data['spid']);
        $this->load->view('main',$this->data);
     
    }
    
    
    
    public function search()
    {
        $this->load->model('msearch');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Tìm kiếm'), 'link' => array('./'));
        $this->data['main_page'] = 'search';
        $pages = 1;
        $limit = 12;
        
        $key = $this->uri->segment(2);
        $key = preg_replace( "/(?<=^|\\s)((&#[0-9]+;)+)(?=\\s|\$)/", "", $key );
        
        if ($this->uri->segment(4) && is_numeric($this->uri->segment(4)))
            $pages = $this->uri->segment(4);    
       
       
        $this->data['product'] = $this->msearch->getSearch($key,$pages,$limit);
        
        
        $this->load->view('main',$this->data);
       
    }
    
    public function lienhe(){
    
       $this->load->helper('form');
       $this->getMenuDefault();
       $this->data['title'] = array('text' => array('Liên hệ'), 'link' => array(base_url().'lien-he'));
       $this->data['main_page'] = 'lienhe';

       if ($this->input->post()){
           if ($this->session->flashdata('security_code')==$this->input->post('code'))
           {
               $this->load->model('mlienhe');
               if ($this->mlienhe->send())
                    $this->data['mess'] = "Gửi liên hệ thành công";
               else
                    $this->data['mess'] = "Có lỗi trong khi gửi liên hệ. Hãy thử lại!";

           }
           else
           {
                $this->data['mess'] = "Mã xác nhận không đúng";
           }
       }
       $this->load->view('main',$this->data);
       
    }
    
    public function tintuc(){
        $this->load->model('mtintuc');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Tin công nghệ thông tin'), 'link' => array(base_url().'tin-tuc'));
        $this->data['main_page'] = 'tintuc';
        if ($this->uri->segment(2) && is_numeric($this->uri->segment(2)))
        {
            $this->data['news'] = $this->mtintuc->detailNews($this->uri->segment(2));
            $this->data['main_page'] = 'tintuc_chitiet';    
        }
        else
        {
            $this->data['news'] = $this->mtintuc->getNews();
            $this->data['main_page'] = 'tintuc';  
        }
        $this->load->view('main',$this->data);
        
        
        
    }
    
    public function gioithieu()
    {
        $this->load->model('mgioithieu');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Giới thiệu'), 'link' => array(base_url().'gioi-thieu'));
        $this->data['main_page'] = 'gioithieu';
        $this->data['gioithieu'] = $this->mgioithieu->getGioiThieu();
        $this->load->view('main',$this->data);
		
           
    }
    
    public function chinhsach()
    {
        
        $this->load->model('mchinhsach');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Chính sách'), 'link' => array(base_url()."chinh-sach"));
        $this->data['main_page'] = 'chinhsach';
        $this->data['chinhsach'] = $this->mchinhsach->getChinhSach();
        $this->load->view('main',$this->data);
    }
    
    public function baohanh(){
        $this->load->model('mbaohanh');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Bảo hành'), 'link' => array(base_url()."bao-hanh"));
        $this->data['main_page'] = 'baohanh';
        $this->data['baohanh'] = $this->mbaohanh->getBaoHanh();
        $this->load->view('main',$this->data);
        
    }
    
    public function duongdi()
    {
        $this->load->model('mduongdi');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Sơ đồ đường đi'), 'link' => array(base_url()."duong-di"));
        $this->data['main_page'] = 'duongdi';
        $this->data['duongdi'] = $this->mduongdi->getDuongDi();
        $this->load->view('main', $this->data);
    }
    
    public function khuyenmai(){
        $this->load->model('mkhuyenmai');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Các chương trình khuyến mãi'),'link' => array(base_url()."khuyen-mai"));
        $this->data['main_page'] = 'khuyenmai';
        $this->data['khuyenmai'] = $this->mkhuyenmai->getKhuyenMai();
        $this->load->view('main',$this->data);
    }
    
    
    public function download()
    {
        $this->load->model('mdownload');
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Download báo giá'), 'link' => array(base_url()."download"));
        $this->data['main_page'] = "download";
        $this->data['download'] = $this->mdownload->getBaoGia();
        $this->data['parent']  = $this->mdownload->getParent();
        $this->load->view('main',$this->data);
    }
    
    public function choncauhinh(){
        $this->getMenuDefault();
        $this->load->model(array('mchoncauhinh','muser'));
        $this->data['title'] = array('text' => array('Chọn cấu hình máy tính theo ý bạn'),'link' => array(base_url()."chon-cau-hinh"));
        $this->data['main_page'] = "choncauhinh";
        $this->data['list_product'] = $this->mchoncauhinh->getList();
        if ($this->session->userdata('email') && $this->session->userdata('log_in') == true)
            $this->data['info_user'] = $this->muser->getInfoUser($this->session->userdata('email'));
        $this->load->view('main',$this->data);
	
    }
    
    public function giohang(){
        $this->load->model(array('mgiohang','muser'));
        $this->getMenuDefault();
        $this->data['title'] = array('text' => array('Giỏ hàng'), 'link' => array(base_url('gio-hang')));
        $this->data['product_cart'] = $this->mgiohang->getInfoProductCart();
        $this->data['main_page'] = "giohang";
        if ($this->session->userdata('email') && $this->session->userdata('log_in') == true)
            $this->data['info_user'] = $this->muser->getInfoUser($this->session->userdata('email'));
        $this->load->view('main',$this->data);
        
    }

    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */