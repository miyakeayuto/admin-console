<html lang="ja">
<body>
<h1>■ログイン</h1>
<form method="post" action="{{url('accounts/doLogin')}}">
    @csrf
    <label>ユーザー名：<input type="text" name="name"></label><br>
    <label>パスワード：<input type="text" name="pass"></label><br>
    <label><input type="submit" value="ログイン" name="btn_submit"></label>
    <input type="hidden" name="action" value="doLogin">
    @if(isset($error))
        <p>{{$error}}</p>
    @endif
</form>
</body>
</html>
