<form method="POST" action="/shoplist">
    <?php echo csrf_field(); ?>


    <div>
        用户名
        <input type="text" name="name" value="<?php echo e(old('name')); ?>">
    </div>

    <div>
        Email
        <input type="email" name="email" value="<?php echo e(old('email')); ?>">
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