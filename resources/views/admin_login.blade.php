<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="public/backend/css/style.login.css">
</head>

<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <?php
            $message = session()->get('message');
            if($message){
                echo '<span class="text" style="color: red; padding: 5px">'.$message.'</span>';
                session()->put('message',null);
            }
        ?>
        <form action="{{URL::to('/admin-dashboard')}}" method="post">
            {{ csrf_field() }}
            <input type="text" name="admin_email" placeholder="Email đăng nhập" required>
            <input type="password" name="admin_password" placeholder="Mật khẩu" required>
            <input type="submit" value="Đăng nhập">
        </form>
    </div>
</body>

</html>