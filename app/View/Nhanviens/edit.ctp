<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <div class="popup" data-popup="popup-3">
		<div class="popup-inner">
			<?php echo $this->Form->create('', array( 'type' => 'put',
                                                            'class'=>'edit_form',
                                                            'url' => array('controller'=>'Nhanviens', 'action'=>'edit',
                                                           ))); ?>
		    <?php echo $this->Form->input('Nhanvien.id', array('type'=>'hidden')); ?>
			<?php echo $this->Form->input('Nhanvien.hoten', array('type'=>'text', 'class'=>'hoten', 'label' =>'Họ tên')); ?>
			<?php echo $this->Form->input('Nhanvien.ngaysinh', array('type'=>'text', 'class'=>'ngaysinh', 'label' =>'Ngày sinh')); ?>
			<?php echo $this->Form->input('Nhanvien.diachi', array('type'=>'textarea', 'class'=>'diachi', 'label' =>'Địa chỉ')); ?>
            <?php echo $this->Form->input('Nhanvien.sodienthoai', array('type'=>'text', 'class'=>'sodienthoai', 'label' =>'Số điện thoại')); ?>
            <?php echo $this->Form->end('Sửa'); ?>
			<a class="popup-close" data-popup-close="popup-3" href="#">x</a>
		</div>
	</div>
    <script>
        	$("div [data-popup='popup-3']").fadeIn('350');
    </script>
    </body>
</html>
