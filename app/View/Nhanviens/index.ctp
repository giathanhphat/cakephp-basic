<!DOCTYPE html>
<html lang="en">

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>
	<!--INSERT-->

	<div class="popup" data-popup="popup-1">
		<div class="popup-inner">
			<?php echo $this->Form->create('nhanvien', array('type' =>'post',  
                                                            'class'=>'add_form',
                                                            'url' => array('controller'=>'Nhanviens', 'action'=>'add'))); ?>
			<?php echo $this->Form->input('Nhanvien.hoten', array('type'=>'text', 'class'=>'hoten', 'label' =>'Họ tên', )); ?>
			<?php echo $this->Form->input('Nhanvien.ngaysinh', array('type'=>'text', 'class'=>'ngaysinh', 'label' =>'Ngày sinh', 'readonly' =>true)); ?>
			<?php echo $this->Form->input('Nhanvien.diachi', array('type'=>'textarea', 'class'=>'diachi', 'label' =>'Địa chỉ')); ?>
			<?php echo $this->Form->input('Nhanvien.sodienthoai', array('type'=>'text', 'class'=>'sodienthoai', 'label' =>'Số điện thoại')); ?>
			<?php echo $this->Form->end('Thêm'); ?>
			<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
		</div>
	</div>

	<!--nhan_EDIT-->
			<?php echo $this->Form->create('nhan_edit', array('type' =>'post',  
                                                            'class'=>'nhan_form',
                                                            'url' => array('controller'=>'Nhanviens', 'action'=>'nhan_edit'))); ?>
			<?php echo $this->Form->input('nhan', array('type'=>'hidden', 'id'=>'nhan', 'label' =>'Nhan')); ?>
			<?php  echo $this->Form->end(); ?>
			
	

	<!--Search-->
			<div class="wrapper_search_form">
				<div class="title">Search</div>
				<div class="search">
					<?php echo $this->Form->create('search', array('type' =>'get',  
		                                                            'class'=>'search_form',
		                                                            'url' => array('controller'=>'Nhanviens', 'action'=>'index'))); ?>
					<?php echo $this->Form->input('hoten', array('type'=>'text', 'class'=>'hoten', 'label' =>'', 'placeholder' =>'Họ tên')); ?>
					<?php echo $this->Form->input('ngaysinh', array('type'=>'text', 'class'=>'ngaysinh', 'label' =>'', 'readonly'=>true, 'placeholder' =>'Ngày sinh')); ?>
					<?php echo $this->Form->input('diachi', array('type'=>'textarea', 'class'=>'diachi', 'label' =>'', 'placeholder' =>'Địa chỉ')); ?>
					<?php echo $this->Form->input('sodienthoai', array('type'=>'text', 'class'=>'sodienthoai', 'label' =>'', 'placeholder' =>'Số điện thoại')); ?>
					<?php echo $this->Form->end('Search'); ?>
				</div>
			</div>
	<table>
		<tr>
			<th>Lựa chọn</th>
			<th>
				<?php echo $this->Paginator->sort('hoten', 'Họ tên'); ?>
			</th>
			<th>
				<?php echo $this->Paginator->sort('ngaysinh', 'Ngày sinh'); ?>
			</th>
			<th>
				<?php echo $this->Paginator->sort('diachi', 'Địa chỉ'); ?>
			</th>
			<th>Số điện thoại</th>
		</tr>
		<?php echo $this->Form->create('form_delete', array('type' =>'post',  
                                                            'class'=>'id_form',
                                                            'url' => array(
                                                            'controller'=>'Nhanviens', 
                                                            'action'=>'delete',
                                                            ))); ?>

		<?php
                $i = 1;
                foreach($nhanviens as $nhanvien)
                {
                ?>
			<tr class="show_nv" data-id="<?php echo $nhanvien['Nhanvien']['id'] ?>">
				<td><input type="checkbox" name="checkbox[]" class="check_box" value="<?php echo $nhanvien['Nhanvien']['id'] ?>"></td>
				<td>
					<?php echo $nhanvien['Nhanvien']['hoten'];?>
				</td>
				<td>
					<?php echo $nhanvien['Nhanvien']['ngaysinh'];?>
				</td>
				<td>
					<?php echo $nhanvien['Nhanvien']['diachi'];?>
				</td>
				<td>
					<?php echo $nhanvien['Nhanvien']['sodienthoai'];?>
				</td>
				<!--<td>
					<?php echo $this->Html->Link('Update', '/Nhanviens/edit/'.$nhanvien['Nhanvien']['id'], array(
                        'class' =>'btn', 'data-popup-open' =>'popup-3',
                    )); ?>
				</td>-->
			</tr>
			<?php
                }
             ?>
	</table>
	<?php $this->Form->end(); ?>
	<ul class="delete_add">
		<li><button type="button" id="btn" class="btn btn-primary">DELETE</button></li>
		<li class="add"><a class="btn" data-popup-open="popup-1" href="#">ADD</a></li>
	</ul>
	<div class="phantrang">
	<?php
        echo $this->Paginator->prev('Quay lại ');
        echo $this->Paginator->numbers();
        echo $this->Paginator->next(' Kế tiếp');
        ?>
	</div>
		<script>
			$(document).ready(function () {
				var i = 0;
				$("#btn").prop("disabled", true);
				$(".check_box").change(function () {
					if ($(this).prop("checked") == true) {
						i++;
					} else {
						i--;
					}
					if (i > 0)
						$("#btn").prop("disabled", false);
					else
						$("#btn").prop("disabled", true);
				});
				$("#btn").click(function () {
					$(".id_form").submit();
				});

				$("table tr.show_nv").dblclick(function () {

						//chọn thẻ tr
						var row = $(this).closest("tr");
						//lấy data thuộc tính data-id
						var id = row.data("id");
					$("#nhan").val(id);
					$(".nhan_form").submit();
				});

			});

		</script>


</body>

</html>
