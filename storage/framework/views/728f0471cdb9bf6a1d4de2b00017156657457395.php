<!DOCTYPE html>
<html lang="ja">
<head>
<title>内容確認</title>
<style rel="stylesheet" type="text/css">
body {
	padding: 20px;
	text-align: center;
}

h1 {
	margin-bottom: 20px;
	padding: 20px 0;
	font-size: 122%;
}

input[name=btn_back] {
	margin-right: 20px;
	box-shadow: 0 3px 0 #777;
	background: #999;
}

.element_wrap {
	margin-bottom: 10px;
	padding: 10px 0;
	text-align: left;
}

label {
	display: inline-block;
	margin-bottom: 10px;
	font-weight: bold;
	width: 150px;
	vertical-align: top;
}

.element_wrap p {
	display: inline-block;
	margin:  0;
	text-align: left;
}

button[value=submit] {
	display: block;
	margin: 5px auto;
	background: #000;
	color: #fff;
	padding: 5px 30px;
	border-radius: 5px;
}

button[value=back] {
	margin: 5px auto;
	text-decoration: underline;
	background: none;
	border: none;
}

</style>
</head>
<body>

<h1>内容確認</h1>

<form method="post" action="<?php echo e(route('contact.send')); ?>">
	<?php echo csrf_field(); ?>

	<table class="element_wrap">
		<tr>
			<td><label>お名前</label></td>
			<td><?php echo e($inputs['your_last_name']); ?></td>
			<td><?php echo e($inputs['your_first_name']); ?></td>
		</tr>
	</table>

	<div class="element_wrap">
		<tr>
			<label>性別</label>
			<td><?php echo e($inputs['gender'] === 'male' ? '男性' : '女性'); ?></td>
		</tr>
	</div>

	<table class="element_wrap">
		<tr>
			<td><label>メールアドレス</label></td>
			<td><?php echo e($inputs['email']); ?></td>
		</tr>
	</table>

	<table class="element_wrap">
    <tr>
			<td><label>郵便番号</label></td>
			<td><?php echo e($inputs['zip_code']); ?></td>
    </tr>
  </table>

	<table class="element_wrap">
    <tr>
			<td><label>住所</label></td>
			<td><?php echo e($inputs['address']); ?></td>
    </tr>
  </table>

	<table class="element_wrap">
    <tr>
			<td><label>建物名</label></td>
			<td><?php echo e($inputs['building_name']); ?></td>
		</tr>
  </table>

	<div class="element_wrap">
		<label>ご意見</label>
		<p><?php echo nl2br(e($inputs['contact'])); ?></p>
	</div>

  <button type="submit" name="action" value="submit">送信</button>
  <button type="submit" name="action" value="back">修正する</button>

	<input name="your_last_name" value="<?php echo e($inputs['your_last_name']); ?>" type="hidden">
	<input name="your_first_name" value="<?php echo e($inputs['your_first_name']); ?>" type="hidden">
	<input name="your_full_name" value="<?php echo e($inputs['your_last_name'] . ' ' . $inputs['your_first_name']); ?>" type="hidden">
	<input name="gender" value="<?php echo e($inputs['gender']); ?>" type="hidden">
	<input name="email" value="<?php echo e($inputs['email']); ?>" type="hidden">
	<input name="zip_code" value="<?php echo e($inputs['zip_code']); ?>" type="hidden">
	<input name="address" value="<?php echo e($inputs['address']); ?>" type="hidden">
	<input name="building_name" value="<?php echo e($inputs['building_name']); ?>" type="hidden">
	<input name="contact" value="<?php echo e($inputs['contact']); ?>" type="hidden">

</form>

</body>
</html><?php /**PATH C:\xampp\htdocs\laravelpj\resources\views/contact/confirm.blade.php ENDPATH**/ ?>