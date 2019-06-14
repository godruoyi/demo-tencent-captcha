<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>腾讯验证码测试</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="referrer" content="always">
        <meta name="theme-color" content="#ffffff">
        <meta name="description" content="腾讯云验证码测试" />
        <meta name="keywords" content="tencent,captcha,007,laravel-captcha"/>
        <meta name="author" content="Godruoyi" />
        <link rel="canonical" href="https://godruoyi.com">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- LINEARICONS -->
        <link rel="stylesheet" href="https://images.godruoyi.com/demos/007/fonts/linearicons/style.css">

        <!-- STYLE CSS -->
        <link rel="stylesheet" href="https://images.godruoyi.com/demos/007/css/style.css">
    </head>

    <body>
        <div class="wrapper">
            <div class="inner">
                <img src="https://images.godruoyi.com/demos/007/images/image-1.png" alt="" class="image-1">
                <form action="">
                    <h3>New Account?</h3>
                    <div class="form-holder">
                        <span class="lnr lnr-user"></span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-phone-handset"></span>
                        <input type="text" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-envelope"></span>
                        <input type="text" class="form-control" placeholder="Mail">
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-lock"></span>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-holder">
                        <span class="lnr lnr-lock"></span>
                        <input type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <button id="redister">
                        <span>Register</span>
                    </button>
                </form>
                <img src="https://images.godruoyi.com/demos/007/images/image-2.png" alt="" class="image-2">
            </div>

        </div>

        <script src="https://images.godruoyi.com/demos/007/js/jquery-3.3.1.min.js"></script>
        <script src="https://images.godruoyi.com/demos/007/js/layer/layer.js"></script>
        <script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>
        <script>
            $(document).ready(function () {
                var post = function (datas) {
                    $.post('', datas).done(function (response) {
                        layer.msg('+ 1')
                    }).fail(function (e) {
                        var httpstatus = e.status

                        if (httpstatus == 429) {
                            var captcha1 = new TencentCaptcha('2064818932', tencentCallback);
                            captcha1.show();
                        } else if (httpstatus == 403) {
                            layer.msg('非法用户：' + e.responseJSON.message)
                        } else {
                            layer.msg('error')
                        }
                    })
                }

                var tencentCallback = function (res) {
                    post(res)
                }

                $('#redister').click(function () {
                    post()

                    return false
                })
            })
        </script>
    </body>
</html>
