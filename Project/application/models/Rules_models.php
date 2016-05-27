<?php
if( ! defined('BASEPATH'))  exit('No direct script access allowed');

class Rules_models extends CI_Model
{
    public $reg_rules = array( //validate registration form  rules
        array(
            'field' => 'u-email',
            'label' => 'Email',
            'rules' => 'required|max_length[30]|trim|valid_email'
        ),
        array(
            'field' => 'u-pass',
            'label' => 'Password',
            'rules' => 'required|max_length[30]|trim|prep_for_form|encode_php_tags|md5'
        ),
    );
    public $login_rules = array(               //validate authorization form
        array(
            'field' => 's-email',
            'label' => 'Email',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 's-pass',
            'label' => 'Password',
            'rules' => 'required|trim|prep_for_form|encode_php_tags'
        )
    );
    public $append_goods = array(     //validate add new goods data
        array(
            'field' => 'm_p_city',
            'label' => 'City',
            'rules' => 'required|max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'm_p_region',
            'label' => 'Region',
            'rules' => 'required|max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'm_p_brand',
            'label' => 'Car brand',
            'rules' => 'required|max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'm_p_model',
            'label' => 'Car model',
            'rules' => 'required|max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'm_p_capacity',
            'label' => 'Engine capacity',
            'rules' => 'required|numeric|max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'm_p_mileage',
            'label' => 'Mileage',
            'rules' => 'required|numeric|max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'm_p_owners',
            'label' => 'Number of owners',
            'rules' => 'required|numeric|max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
    );
    public $filter_orders_data = array(     //validate filter post data
        array(
            'field' => 'city',
            'label' => 'City',
            'rules' => 'max_length[50]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'region',
            'label' => 'Region',
            'rules' => 'max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'car_brand',
            'label' => 'Car brand',
            'rules' => 'max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'car_model',
            'label' => 'Car model',
            'rules' => 'max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'engine_capacity',
            'label' => 'Engine capacity',
            'rules' => 'max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'mileage',
            'label' => 'Mileage',
            'rules' => 'max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
        array(
            'field' => 'owners',
            'label' => 'Number of owners',
            'rules' => 'max_length[60]|trim|prep_for_form|encode_php_tags'
        ),
    );
}