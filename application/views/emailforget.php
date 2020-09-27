<html>

<head>
    <title>Example Domain</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap');

        * {
            outline: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f0f0f2;
            color: #fff;
            margin: 0;
            padding: 0;
            font-family: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

        }

        .title {
            border-bottom: 0 solid transparent;
            margin-bottom: 0;
            padding: .1rem 1.25rem;
            background-color: rgba(0, 0, 0, .03);
        }

        .title:first-child {
            border-radius: calc(0px - 0px) calc(0px - 0px) 0 0;
        }

        div {
            display: block;

        }

        .card {
            background-color: #00c292 !important;
            width: 50%;
            margin: 15 auto;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 15px;
        }

        a:link,
        a:visited {

            color: #fff;
            text-decoration: none;
        }

        .btn-dark {
            color: #fff;
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn {
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .25rem;
            white-space: nowrap;
            font-weight: 400;
            margin-top: 10px;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .btn:not(:disabled):not(.disabled) {
            cursor: pointer;
        }

        a {
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="title">
            <h1>Reset Password </h1>
        </div>
        <div class="card-body">

            <p>Tekan tombol di bawah ini untuk mereset password akun anda</p>
            <a href="<?= $link; ?>" class="btn btn-dark">Reset</a>
        </div>
    </div>