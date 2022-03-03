<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Post</title>
</head>
<body>
     <p>Post ID:{{ $post_id }}</p> <!--PostControllerの$usernameではなく'username'から つまりfunctionの引数ー>処理ー>左の'username'ー>ここ -->
    <p>this is the post of {{ $username }}</p>
</body>
</html>