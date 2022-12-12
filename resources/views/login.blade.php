<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Arisip Surat</title>

    <style>
        :root {
            --login-width: 350px;
        }

        .login h1,
        .login span,
        .login ul {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            background-color: #baa898;
            display: flex;

            font-family: Arial, Helvetica, sans-serif;
        }

        .login {
            margin: auto;
            background-color: #fff;
            background: #e0e0e0;
            box-shadow: 4px 4px 12px 0 rgba(0, 0, 0, .3);

            padding: 4rem 2rem;
            box-sizing: border-box;
            border-radius: 1rem;
            min-width: var(--login-width);
            min-height: calc(var(--login-width) * 1.1);

            position: relative;
        }

        .login ul {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);

            width: 80%;
            list-style: none;
            list-style-position: outside;
            box-sizing: border-box;
        }

        .login h1,
        .login span {
            text-align: center;
        }

        .login li {
            display: flex;
            flex-direction: column;
            margin-bottom: 2rem;
            row-gap: .5rem;
        }

        .login label {
            font-size: .9rem;
        }

        .login input {
            border: none;
            padding: .4rem .8rem;
            border-radius: 8px;
            background-color: #e0e0e0;
            box-shadow: 4px 4px 12px #bebebe,
                -4px -4px 12px #ffffff;

            transition: box-shadow 300ms;
        }

        .login input:focus {
            outline: none;
            box-shadow: 0 0 0 1px rgba(88, 0, 255, .5), 4px 4px 12px #bebebe,
                -4px -4px 12px #ffffff;
        }

        .login button {
            border: none;
            border-radius: 4px;
            background-color: #e0e0e0;
            box-shadow: 4px 4px 12px #bebebe,
                -4px -4px 12px #ffffff;
            padding: .4rem .8rem;
            transition: box-shadow 600ms;
        }

        .login button:hover {
            cursor: pointer;
            box-shadow: -4px -4px 12px #bebebe,
                4px 4px 12px #ffffff;
        }
    </style>
</head>

<body>
    <div class="login">
        <form method="POST">
            @csrf

            <ul>
                <li>
                    <h1>LOGIN</h1>
                    <span>SMASMAN 8 Kota Bengkulu</span>
                </li>
                <li>
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" name="username" autocomplete="off">
                </li>
                <li>
                    <label for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password">
                </li>
                <li>
                    <button type="submit">Login</button>
                </li>
            </ul>
        </form>
    </div>

    <span class="login-fail" data-status="{{ session('status') }}" data-message="{{ session('message') }}"></span>

    <script src="/js/resources/sweetalert2.all.min.js"></script>
    <script>
        const infoLogin = document.querySelector('.login-fail').dataset

        if (infoLogin.status == 400) {
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            }).fire({
                icon: 'error',
                title: infoLogin.message
            })            
        }
    </script>

</body>

</html>