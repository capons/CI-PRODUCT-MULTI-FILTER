<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller
{
    public function cars()
    {
        //$dara = array to send data in the view
        $data['empty_data'] = 'change in the future';
        $data['market_header'] = $this->load->view('layout/header', $data, true); //load view header and send some data to header (if needed in the future)
        $data['market_footer'] = $this->load->view('layout/footer', $data, true); //load admin view footer
        $data['market_modal'] = $this->load->view('layout/modal',$data, true); //load modal window layout
        if (isset($_POST['order_filter_button'])) {             //if isset filter data
            $this->load->model('rules_models');                 //load validate input rules model
            $this->form_validation->set_rules($this->rules_models->filter_orders_data); //load validation ruls
            $check = $this->form_validation->run();  //validate form data
            if ($check == true) {
                $result_filter_data = array_filter($_POST); //array_filter remove button empty cell from array $_POST
                $this->load->model('product_model'); //load product model
                //pagination config
                $config['base_url'] = base_url().'market/cars';
                $config['total_rows'] = $this->db->count_all('stock');        // all database table count
                $config['per_page'] = '10';                                    //rows in one page
                $config['full_tag_open'] = '<nav><ul style="margin: 0px;padding-right:10px;float: right " class="pagination">'; //start teg
                $config['full_tag_close'] = '</ul></nav>';                                                                      //end teg
                $config['prev_link'] = '&lt; Prev';
                $config['prev_tag_open'] = '<li>';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = 'Next &gt;';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['uri_segment'] = 3;
                $page = ($this->uri->segment(3, 0)) ? $this->uri->segment(3, 0) : 0;
                $this->pagination->initialize($config);                                        //load pagination
                $data['all_post'] = $this->product_model->showFilter($result_filter_data,$config['per_page'], $page);//send data to method select_order
                $data['links'] = $this->pagination->create_links();                            //variable 'links' send pagination config
                // end pagination config
                $this->load->view('market/cars', $data);             //load page view
            } else {
               //show filter input validation error
                $this->session->set_flashdata('message', validation_errors());
                redirect('', 'refresh');
            }
        } else {  //if !isset filter - load default post data
            $this->load->model('product_model');
            //pagination config
            $config['base_url'] = base_url().'market/cars'; //'http://localhost/bogdan/STORE/sales/orders';
            $config['total_rows'] = $this->db->count_all('stock');        // all database table count
            $config['per_page'] = '10';                                    //rows in one page
            $config['full_tag_open'] = '<nav><ul style="margin: 0px;;float: right " class="pagination">'; //start teg
            $config['full_tag_close'] = '</ul></nav>';                                                                      //end teg
            $config['prev_link'] = '&lt; Prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next &gt;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['uri_segment'] = 3;
            $page = ($this->uri->segment(3, 0)) ? $this->uri->segment(3, 0) : 0;
            $this->pagination->initialize($config);                                        //load pagination
            $data['all_post'] = $this->product_model->showAll($config['per_page'], $page);//send data to method showAll
            $data['links'] = $this->pagination->create_links();
            $this->load->view('market/cars', $data);             //load page view
        }
    }
    public function registration_user() {        //registr user
        if (isset($_POST['u-email'])) {
            $this->load->model('registr_model'); //load model
            $this->load->model('rules_models'); //load model rules
            $this->form_validation->set_rules($this->rules_models->reg_rules);
            $check = $this->form_validation->run();
            if ($check == true) {
                $email = $this->input->post('u-email');
                $data1 = $this->registr_model->check_email($email); //check email
                if (!empty($data1)) {
                    $this->session->set_flashdata('message', 'Email already busy');
                    redirect('', 'refresh');
                }
                $add['email'] = $this->input->post('u-email');
                $add['pass'] = $this->input->post('u-pass');
                $this->db->insert('authorization', $add);

                $this->session->set_flashdata('message', 'Congratulations you have successfully registered');
                redirect('', 'refresh');

            } else {
                $this->session->set_flashdata('message', validation_errors());
                redirect('', 'refresh');
            }
        } else {
            redirect('', 'refresh');
        }
    }
    public function authorization_user() {        //registr user
        if (isset($_POST['s-email'])) {
            $this->load->model('rules_models'); //load model
            $this->form_validation->set_rules($this->rules_models->login_rules); // load model for input validation
            $check = $this->form_validation->run();
            if ($check == true) {      //if validation == true
                $email = $_POST['s-email'];
                $pass = md5($_POST['s-pass']);
                $this->load->model('registr_model');
                $data = $this->registr_model->check_login_in($email, $pass);
                if (!empty($data)) {
                    $_SESSION['marker']['user'] = $data[0];                         //user data put into session
                    $this->session->set_flashdata('message', 'You have successfully logged');
                    redirect('', 'refresh');
                } else {
                    $this->session->set_flashdata('message', 'Invalid username or password');
                    redirect('', 'refresh');
                }
            }
        } else {
            redirect('', 'refresh');
        }
    }
    public function post() {        //add new product post
        $data['empty_data'] = 'change in the future';
        if (isset($_POST['m_p_city'])){              //if isset post
            $this->load->model('rules_models');      //load validation ruls model
            $this->load->model('product_model');     //load model(with database work)
            $post_count = $this->product_model->check_user_post($_SESSION['marker']['user']['id']); //save data and return id
            if($post_count < 3) {
                $this->form_validation->set_rules($this->rules_models->append_goods); //load validation ruls
                if (empty($_FILES['uf']['name'][0])) { //if empty image input
                    $this->form_validation->set_rules('uf', 'Goods images', 'required');
                }
                $check = $this->form_validation->run();  //validate form data
                if ($check == true) {
                    //start upload file  (input upload image manipulate)
                    $config['upload_path'] = './stock_image/';          //image upload directory
                    $config['allowed_types'] = 'gif|jpg|png';           //image format
                    $config['max_size'] = '500';                        //0.5 м MAX file size
                    $config['encrypt_name'] = true;                     //change image name
                    $this->load->library('upload', $config);             //Load library upload
                    //create $files variable for upload all photo in the loop (for)
                    $files = $_FILES;
                    $cpt = count($_FILES['uf']['name']);
                    $all_imgname = array();
                    for ($i = 0; $i < $cpt; $i++) {
                        //with each iteration cycle equate the new value of the global array FILE
                        $_FILES['uf']['name'] = $files['uf']['name'][$i];
                        $_FILES['uf']['type'] = $files['uf']['type'][$i];
                        $_FILES['uf']['tmp_name'] = $files['uf']['tmp_name'][$i];
                        $_FILES['uf']['error'] = $files['uf']['error'][$i];
                        $_FILES['uf']['size'] = $files['uf']['size'][$i];
                        if (!$this->upload->do_upload('uf')) {  //if do_upload return FALSE - send errors to view
                            $this->session->set_flashdata('message', 'Upload image error');
                            redirect('', 'refresh');
                        }
                        $imgname = $this->upload->data('file_name');
                        $tmp = $this->upload->data(); //variable with temp file data
                        $all_imgname[] = $imgname; //add all image name to array (then write from a array into a string and store in the database)
                        $config = array( //image manipulation config set rules
                            'image_library' => 'gd2', //library name
                            //path and name of resize foto
                            'source_image' => $tmp['file_path'] . $tmp['file_name'],//$_SERVER['DOCUMENT_ROOT'].'/bogdan/cilessons/upload/'.$_FILES['uf']['name'],    //путь к файлу
                            //path to save new resize foto
                            'new_image' => './stock_image/thumbs/', //path to image new thumbs
                            'maintain_ratio' => TRUE,                //save proportion
                            'width' => 1000,                         //thumbs width
                            'height' => 750
                        );
                        //load resize library
                        //library emage_lib autoload
                        $this->image_lib->initialize($config);      //load library
                        //resize foto
                        $this->image_lib->resize();                 //load method to resize image
                    }
                    //end image upload manipulation $all_imgname[] (array containes all image name)
                    $add['city'] = $this->input->post('m_p_city'); //form input push into array() and save in db
                    $add['region'] = $this->input->post('m_p_region');
                    $add['car_brand'] = $this->input->post('m_p_brand');
                    $add['car_model'] = $this->input->post('m_p_model');
                    $add['engine_capacity'] = $this->input->post('m_p_capacity');
                    $add['mileage'] = $this->input->post('m_p_mileage');
                    $add['owners'] = $this->input->post('m_p_owners');
                    $add['user_id'] = $_SESSION['marker']['user']['id'];
                    $this->load->model('product_model');     //load model(with database work)
                    //$put_goods_id - contains goods 'id' to save goods image with
                    $put_goods_id = $this->product_model->addGoods($add); //save data and return id
                    if (!empty($put_goods_id)) {
                        $all_imgname_tosave = array(); //We need a multi-dimensional associative array to be stored in the database
                        foreach ($all_imgname as $k => $v) {
                            unset ($all_imgname[$k]);              //unset key name to set new name
                            $new_key = 'image_name';
                            $all_imgname_tosave[][$new_key] = $v;   //put data into array to save data in databse
                        }
                        $data_to_save = array();                    //array to containes all data to save in Database
                        foreach ($all_imgname_tosave as $array) {
                            $array['id_stock_product'] = $put_goods_id; //set key as database row name and val goods database id
                            $data_to_save[] = $array;
                        }
                        $save_product_img = $this->product_model->addImage($data_to_save); //save image data
                        if ($save_product_img == true) {
                            $this->session->set_flashdata('message', 'Goods add successfully');
                            redirect('', 'refresh');
                        } else {
                            $this->session->set_flashdata('message', 'Image load error, please try again');
                            redirect('', 'refresh');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Please try again');
                        redirect('', 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('message', validation_errors());
                    redirect('', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', 'You already have 3 post, and you can\'t add more!');
                redirect('', 'refresh');
            }

        } else {
            redirect('', 'refresh');
        }
    }
}