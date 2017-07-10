<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
</head>
<body>
<form method="post" action="/dologin">
    {{ csrf_field() }}
    <input type="text" name="info" />
    <input type="password" name="password">
    <input type="submit" value="登录">
</form>
</body>
</html>