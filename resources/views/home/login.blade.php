<form method="POST" action="/Home/Login">
  {{ csrf_field() }} 

    <div>
        请输入
        <input type="text" name="info" value="{{ '手机号码/邮箱/用户名') }}">
    </div>

    <div>
        密码
        <input type="password" name="password" id="password">
    </div>

    <div>
        <input type="checkbox" name="remember"> 记住我
    </div>

    <div>
        <button type="submit">登录</button>
    </div>
</form>