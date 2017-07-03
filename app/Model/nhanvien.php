<?php
    class Nhanvien extends AppModel{
        public $name = 'Nhanvien';
        public $validate = array(
            'hoten' => array(
                'maxLength' => array(
                    'rule' => array('maxLength', 30),
                    'message' => 'Chiều dài tối đa họ tên là 30 kí tự'),
                'notEmpty' => array('rule' => 'notBlank',
                                    'message' =>'Họ tên không được để trống')
            ),
            'ngaysinh' => array(
                'rule' => 'notBlank',
                'message' =>'Ngày sinh không được để trống',
            ),
            'diachi' => array(
                'rule' => 'notBlank',
                'message' =>'Địa chỉ không được để trống',
            ),
            'sodienthoai'=> array(
                'numeric' => array(
                    'rule' => 'numeric',
                    'message' => 'Số điện thoại phải là số'),
                'notEmpty' => array(
                    'rule' => 'notBlank',
                    'message' =>'Số điện thoại không được rỗng'
                ),
                'maxLength' => array(
                    'rule' => array('maxLength', 11),
                    'message' => 'Chiều dài số điện thoại tối đa là 11 chữ số',
                ),
                'minLength' => array(
                    'rule' => array('minLength', 9),
                    'message' => 'Chiều dài số điện thoại tối thiểu là 9 chữ số',
                ),

            ),
        );
    }

?>