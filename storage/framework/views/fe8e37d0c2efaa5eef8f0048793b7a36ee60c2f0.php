

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>お問い合わせフォーム</title>
<style rel="stylesheet" type="text/css">
body {
	padding: 20px;
	text-align: center;
}

h1 {
	margin-bottom: 20px;
	color: #000;
	font-size: 122%;
}

input[type=text] {
	padding: 5px 10px;
	font-size: 86%;
	border-radius: 3px;
	border: 1px solid #000;
	margin-right: 10px;
}

input[name=email] { 
	width: 95%;
}

input[name=address] { 
	width: 150%;
}

input[name=building_name] { 
	width: 170%;
}

.zip_code:before {
	content: "〒 ";
}

span {
	color: red;
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

td.example {
	color: #ccc;
}

label[for=gender_male],
label[for=gender_female] {
	margin-right: 10px;
	width: auto;
	font-weight: normal;
}

textarea[name=contact] {
	padding: 5px 10px;
	width: 60%;
	height: 100px;
	font-size: 86%;
	border: 1px solid #000;
	border-radius: 3px;
}

button[type=submit] {
	display: block;
	margin: 5px auto;
	background: #000;
	color: #fff;
	padding: 5px 30px;
	border-radius: 5px;
}

.error_list {
	padding: 10px 30px;
	color: #ff2e5a;
	font-size: 86%;
	text-align: left;
	border: 1px solid #ff2e5a;
	border-radius: 5px;
}
</style>
</head>
<body>

<h1>お問い合わせ</h1>

<form method="post" action="<?php echo e(route('contact.confirm')); ?>">
	<?php echo csrf_field(); ?>
	<table class="element_wrap">
		<tr>
			<td><label>お名前<span>※</span></label></td>
			<td><input required type="text" name="your_last_name" value="<?php echo e(old('your_last_name')); ?>"></td>
			<td><input required type="text" name="your_first_name" value="<?php echo e(old('your_first_name')); ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td class="example"><p>例) 山田</p></td>
			<td class="example"><p>例) 太郎</p></td>
		</tr>
		<tr>
			<td></td>
			<?php if($errors->has('your_last_name')): ?>
				<td class="error_message"><?php echo e($errors->first('your_last_name')); ?></td>
			<?php endif; ?>
			<?php if($errors->has('your_first_name')): ?>
				<td class="error_message"><?php echo e($errors->first('your_first_name')); ?></td>
			<?php endif; ?>
		</tr>
	</table>

	<div class="element_wrap">
		<label>性別<span>※</span></label>
		<label for="gender_male"><input id="gender_male" type="radio" name="gender" value="male" <?php echo e(old('gender') === 'male' ? 'checked' : ''); ?> checked>男性</label>
		<label for="gender_female"><input id="gender_female" type="radio" name="gender" value="female" <?php echo e(old('gender') === 'female' ? 'checked' : ''); ?>>女性</label>
	</div>

	<table class="element_wrap">
		<tr>
			<td><label>メールアドレス<span>※</span></label></td>
			<td><input required type="text" name="email" value="<?php echo e(old('email')); ?>"></td>
		</tr>
		<tr>
			<td></td>
			<td class="example"><p>例) test@example.com</p></td>
		</tr>
		<tr>
			<td></td>
			<?php if($errors->has('email')): ?>
				<td class="error_message"><?php echo e($errors->first('email')); ?></td>
			<?php endif; ?>
		</tr>
	</table>

	<table class="element_wrap">
    <tr>
			<td><label>郵便番号<span>※</span></label></td>
			<td>
				<div class="zip_code">
					<input required id="zip_code" type="text" name="zip_code" value="<?php echo e(old('zip_code')); ?>">
				</div>
			</td>
    </tr>
    <tr>
			<td></td>
			<td class="example"><p>例) 123-4567</p></td>
    </tr>
		<tr>
			<td></td>
			<?php if($errors->has('zip_code')): ?>
				<td class="error_message"><?php echo e($errors->first('zip_code')); ?></td>
			<?php endif; ?>
		</tr>
  </table>

	<table class="element_wrap">
    <tr>
			<td><label>住所<span>※</span></label></td>
			<td><input required id="address" type="text" name="address" value="<?php echo e(old('address')); ?>"></td>
    </tr>
			<td></td>
			<td class="example"><p>例) 東京都渋谷区千駄ヶ谷1-2-3</p></td>
    </tr>
		<tr>
			<td></td>
			<?php if($errors->has('address')): ?>
				<td class="error_message"><?php echo e($errors->first('address')); ?></td>
			<?php endif; ?>
		</tr>
  </table>

	<table class="element_wrap">
    <tr>
			<td><label>建物名</label></td>
			<td><input type="text" name="building_name" value="<?php echo e(old('building_name')); ?>"></td>
    </tr>   
			<td></td>
			<td class="example"><p>例) 千駄ヶ谷マンション101</p></td>
  </table>

	<div class="element_wrap">
		<label>ご意見<span>※</span></label>
		<textarea required name="contact"><?php echo e(old('contact')); ?></textarea>
		<tr>
			<div>
				<?php if($errors->has('contact')): ?>
					<td class="error_message"><?php echo e($errors->first('contact')); ?></td>
				<?php endif; ?>
			</div>
		</tr>
	</div>

	<button type="submit">確認</button>

</form>
</body>
</html>

<script>

// HTMLのinput要素を取得
var postalCodeInput = document.getElementById("zip_code");

// 入力値が変更されたときに呼ばれる関数
function convertToHalfWidth() {
  // 入力値を取得
  var value = postalCodeInput.value;
  // 半角に変換
  var halfWidthValue = value.replace(/ー/g, "-").replace(/[Ａ-Ｚａ-ｚ０-９]/g, function(s) {
    return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
  });
  // 変換結果をセット
  postalCodeInput.value = halfWidthValue;
}

// 入力値が変更されたときにconvertToHalfWidth関数を呼び出すように設定
postalCodeInput.addEventListener("input", convertToHalfWidth);

// 郵便番号の入力欄を取得
var postalCodeInput = document.getElementById("zip_code");

// 郵便番号の入力欄にフォーカスが外れた時に検索処理を行うようにイベントリスナーを追加
postalCodeInput.addEventListener("blur", function() {
  // 入力された郵便番号を取得
  var postalCode = this.value;
  
  // APIにリクエストを送信
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "https://zipcloud.ibsnet.co.jp/api/search?zipcode=" + postalCode);
  xhr.addEventListener("load", function() {
    // APIからのレスポンスを受け取る
    var response = JSON.parse(xhr.responseText);
    
    // 住所の入力欄に結果を反映する
    if (response.results) {
      var address1 = response.results[0].address1;
      var address2 = response.results[0].address2;
      var address3 = response.results[0].address3;
      var addressInput = document.getElementById("address");
      addressInput.value = address1 + address2 + address3;
    }
  });
  xhr.send();
});

</script><?php /**PATH C:\xampp\htdocs\laravelpj\resources\views/contact/index.blade.php ENDPATH**/ ?>