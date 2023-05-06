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
	padding: 20px 0;
	color: #209eff;
	font-size: 122%;
	border-top: 1px solid #999;
	border-bottom: 1px solid #999;
}

input[type=text] {
	padding: 5px 10px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}

input[name=btn_confirm],
input[name=btn_submit],
input[name=btn_back] {
	margin-top: 10px;
	padding: 5px 20px;
	font-size: 100%;
	color: #fff;
	cursor: pointer;
	border: none;
	border-radius: 3px;
	box-shadow: 0 3px 0 #2887d1;
	background: #4eaaf1;
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

label[for=gender_male],
label[for=gender_female],
label[for=agreement] {
	margin-right: 10px;
	width: auto;
	font-weight: normal;
}

textarea[name=contact] {
	padding: 5px 10px;
	width: 60%;
	height: 100px;
	font-size: 86%;
	border: none;
	border-radius: 3px;
	background: #ddf0ff;
}

.error_list {
	padding: 10px 30px;
	color: #ff2e5a;
	font-size: 86%;
	text-align: left;
	border: 1px solid #ff2e5a;
	border-radius: 5px;
}

form {
	border: 1px solid #000;
	padding: 10px;
}

table {
	border-bottom: 1px solid #000;
}

th {
	padding: 0 30px; 
}

</style>
</head>
<body>

<h1>お問い合わせ</h1>
<form method="get" action="{{ route('contact.search') }}">
	@csrf
	<table class="element_wrap">
		<tr>
			<td><label>お名前</label></td>
			<td><input type="text" name="your_full_name" value=""></td>
			<td><label>性別</label></td>
			<td><label for="gender_all"><input id="gender_all" type="radio" name="gender" value="all" checked>全て</label></td>
			<td><label for="gender_male"><input id="gender_male" type="radio" name="gender" value="male" {{ old('gender') === 'male' ? 'checked' : '' }} >男性</label></td>
			<td><label for="gender_female"><input id="gender_female" type="radio" name="gender" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>女性</label></td>
		</tr>
	</table>

	<table class="element_wrap">
		<tr>
			<td><label>登録日</label></td>
			<td><input type="text" name="created_start" value="">～</td>
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

@if ($contact->count() > 0)
<p>全{{ $contact->count() }}件中　１１～２０件</p>

<table>
    <tr>
        <th>ID</th>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>ご意見</th>
    </tr>

    @foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->id }}</td>
        <td>{{ $contact->fullname }}</td>
        <td>{{ $contact->gender }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ $contact->opinion }}</td>
    </tr>
    @endforeach
</table>

@else
<p>該当するデータがありません。</p>
@endif

</body>
</html>