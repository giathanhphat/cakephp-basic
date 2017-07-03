<?php
    class NhanviensController extends AppController{
        public $name = 'Nhanviens';
    
        public function index()
        {
          if($this->request->query)
          {
            $this->paginate = array(
            'limit' => 10,
            'ParamType' => 'querystring',
             'conditions' => array(
                'AND' => array(
                  'Nhanvien.hoten LIKE' => '%'.$this->request->query['hoten'].'%',
                  'Nhanvien.diachi LIKE' => '%'.$this->request->query['diachi'].'%',
                  'Nhanvien.ngaysinh LIKE' => '%'.$this->request->query['ngaysinh'].'%',
                  'Nhanvien.sodienthoai LIKE' => '%'.$this->request->query['sodienthoai'].'%')
              )
            );
          }
          else
          {
             $this->paginate = array(
            'limit' => 10,
            'ParamType' => 'querystring',
          );
          }
          $nhanviens = $this->paginate('Nhanvien');
          $this->set('nhanviens', $nhanviens);
        }
        public function add()
        {
          if($this->request->is('post'))
          {
            // $this->request->data['Nhanvien']['hoten'] = $this->request->data['nhanvien']['hoten'];
            // $this->request->data['Nhanvien']['ngaysinh'] = $this->request->data['nhanvien']['ngaysinh'];
            // $this->request->data['Nhanvien']['diachi'] = $this->request->data['nhanvien']['diachi'];
            // $this->request->data['Nhanvien']['sodienthoai'] = $this->request->data['nhanvien']['sodienthoai'];
            // $this->loadModel('Nhanvien');
            // $this->Nhanvien->set($this->request->data);
            // debug($this->request->data);
            // debug($this->Nhanvien->save($this->request->data));
            debug($this->request->data);
            $this->Nhanvien->set($this->request->data);
            if($this->Nhanvien->validates() == true)
            {
              
              //lưu dữ liệu lại, không cần xác thực (false)
              if($this->Nhanvien->save($this->request->data, false)){
				    	$this->Session->setFlash('ghi chu da duoc luu lai');
				    	$this->redirect('index');
			      	}else{
				    	$this->Session->setFlash('Lỗi xảy ra');
			  	    }
            }
            else{
              $errors = $this->Nhanvien->validationErrors;
              $this->set('errors', $errors);
            }
          }
        
        }

           public function delete()
        {
          $ids = $this->request->data;
          if($this->request->is('post'))
          {
             $this->Nhanvien->id = $ids;
            if($this->Nhanvien->exists())
            {
              if($this->Nhanvien->delete())
              {
                $this->Session->setFlash('Đã xóa');
                $this->redirect('index');
              }else{
                $this->Session->setFlash('Có lỗi, không thể xóa');
              }
            }else{
              throw new NotFoundException('Không tìm thấy dữ liệu');
            }
          }
          else
          {
            throw new MethodNotAllowedException('Yêu cầu không được chập nhận');
          }
        }
        public function nhan_edit()
        {
          if($this->request->is('post'))
          {
          $this->Nhanvien->id = $this->request->data['nhan_edit']['nhan'];
          if($this->Nhanvien->exists())
          {
          $data = $this->Nhanvien->read(null, $this->Nhanvien->id);
          }
          }
          // $this->set('form_edit', $data);
          $this->request->data = $data;

          debug($data);
          return $this->render('edit');
        }

        public function edit()
        {
          // if($this->request->is('post'))
          // {
          // $id = $this->request->data['Nhanvien']['id'];
          // debug($id);
          // }
          if($this->request->is('put'))
          {
            $id = $this->request->data['Nhanvien']['id'];
            $this->Nhanvien->id = $id;
            // $this->request->data['Nhanvien']['hoten'] = $this->request->data['edit']['hoten'];
            // $this->request->data['Nhanvien']['ngaysinh'] = $this->request->data['edit']['ngaysinh'];
            // $this->request->data['Nhanvien']['diachi'] = $this->request->data['edit']['diachi'];
            // $this->request->data['Nhanvien']['sodienthoai'] = $this->request->data['edit']['sodienthoai'];
            $this->Nhanvien->set($this->request->data);
            if($this->Nhanvien->validates())
              {
               //lưu lại dữ liệu không cần xác thực (false)
                 if($this->Nhanvien->save($this->request->data, false))
                 {
                  $this->Session->setFlash('Đã sửa');
                  $this->redirect('index');
                }else{
                  $this->Session->setFlash('Lỗi xảy ra.');
                   $this->redirect('index');
                }
              }
              else
              {
                 $errors = $this->Nhanvien->validationErrors;
                 $this->set('errors', $errors);
                 return $this->render('add');
              }
          }
        }  
}

?>

