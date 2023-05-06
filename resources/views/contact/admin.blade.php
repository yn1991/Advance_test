<?php
	use Illuminate\Support\Str;
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(function() {
		$('.opinion-shorten').mouseenter(function() {
			// マウスオーバーした要素のテキストを取得する
			const text = $(this).text();
			// テキストを属性に設定する
			$(this).attr('data-text', text);
			// 制限を解除して全文を表示する
			$(this).text($(this).attr('title'));
		}, function() {
			// 元のテキストを表示する
			$(this).text($(this).attr('data-text'));
		});
	});
</script>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>管理システム</title>
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

.data_table {
	width: 100%;
}

input[type=text] {
	padding: 5px 10px;
	font-size: 86%;
	border-radius: 3px;
	border: 1px solid #000;
}

.element_wrap {
	padding: 10px 0;
	text-align: left;
}

label {
	display: inline-block;
	font-weight: bold;
	width: 150px;
	vertical-align: top;
}

.gender {
	margin-left: 30px;
	width: 50px;
}

.element_wrap p {
	display: inline-block;
	margin:  0;
	text-align: left;
}

label[for=gender_male],
label[for=gender_female],
label[for=gender_all] {
	margin-right: 10px;
	width: auto;
	font-weight: normal;
}

span {
	margin: 0 10px;
}

button[value=search] {
	display: block;
	margin: 5px auto;
	background: #000;
	color: #fff;
	padding: 5px 30px;
	border-radius: 5px;
}

button[value=reset] {
	margin: 5px auto;
	text-decoration: underline;
	background: none;
	border: none;
}

form {
	border: 1px solid #000;
	padding: 10px;
}

th {
	padding: 0 30px; 
}

.data_list {
	text-align: center;
}

.page {
	display: flex;
	justify-content: space-between;
}

.paginationWrap {
	display: flex;
	justify-content: center;
	margin-top: 38px;
	margin-bottom: 40px;
}

.paginationWrap ul.pagination {
	display: inline-block;
	padding: 0;
	margin: 0;
}

.paginationWrap ul.pagination li {
  display: inline;
  margin-right: 4px;
}

.paginationWrap ul.pagination li a {
	color: #2f3859;
	padding: 8px 14px;
	text-decoration: none;
}

.paginationWrap ul.pagination li a.active {
	background-color: #4b90f6;
	color: white;
	width: 38px;
	height: 38px;
}

.paginationWrap ul.pagination li a:hover:not(.active) {
  background-color: #e1e7f0;
}

</style>
</head>
<body>

<h1>管理システム</h1>

<form method="get" action="{{ route('contact.find') }}">
	@csrf
	<table class="element_wrap">
		<tr>
			<td><label>お名前</label></td>
			<td><input type="text" name="your_full_name" value=""></td>
			<td><label class="gender">性別</label></td>
			<td><label for="gender_all"><input id="gender_all" type="radio" name="gender" value="all" checked>全て</label></td>
			<td><label for="gender_male"><input id="gender_male" type="radio" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }} >男性</label></td>
			<td><label for="gender_female"><input id="gender_female" type="radio" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>女性</label></td>
		</tr>
	</table>

	<table class="element_wrap">
		<tr>
			<td><label>登録日</label></td>
			<td><input type="text" name="created_start" value=""><span>～</span></td>
			<td><input type="text" name="created_end" value=""></td>
		</tr>
	</table>

	<table class="element_wrap">
		<tr>
			<td><label>メールアドレス</label></td>
			<td><input type="text" name="email" value=""></td>
		</tr>
	</table>

	<button type="submit" name="action" value="search">検索</button>
	<button type="submit" name="action" value="reset">リセット</button>
</form>

<div class="page">
	<p>全{{ $contacts->total() }}件中 {{ $contacts->firstItem() }}～{{ $contacts->lastItem() }}件</p>
	<div class="pagination">
		{{ $contacts->links('pagination::default') }}
	</div>
</div>

<table class="data_table">
	<tr>
		<th>ID</th>
		<th>お名前</th>
		<th>性別</th>
		<th>メールアドレス</th>
		<th>ご意見</th>
	</tr>
	@foreach ($contacts as $contact)
		<tr class="data_list">
			<td>{{$contact->id}}</td>
			<td>{{$contact->fullname}}</td>
			<td>
				@if ($contact->gender === 1)
					男性
				@elseif ($contact->gender === 2)
					女性
				@endif
			</td>
			<td>{{$contact->email}}</td>
			<td class="opinion-shorten">{{ Str::limit($contact->opinion, 25, '...') }}</td>
		</tr>
	@endforeach
</table>
</body>
</html>