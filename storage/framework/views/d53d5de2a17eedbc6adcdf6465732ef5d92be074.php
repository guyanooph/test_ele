<form method="POST" action="/home/login">
  <?php echo e(csrf_field()); ?> 

    <div>
        Email
        <input type="email" name="email" value="<?php echo e(old('email')); ?>">
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