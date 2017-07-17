
<form method="POST" action="/shoplist">
    {!! csrf_field() !!}

    <div>
        用户名
        <input type="text" name="name" value="{{ old('name') }}">
    </div>


    <div>
        请输入
        <input type="text" name="info" value="{{ '手机号码/邮箱/用户名' }}">
    </div>

    <div>
        密码
        <input type="password" name="password">
    </div>

    <div>
        确认密码
        <input type="password" name="password_confirmation">
    </div>

    <div>
         <button type="submit">注册</button>
    </div>
</form>