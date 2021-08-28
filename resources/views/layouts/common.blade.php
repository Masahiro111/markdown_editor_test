<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Qiita風記事投稿サービス</title>
    <!-- cssをインポート -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
    <style>
        h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            padding-bottom: 0.2rem;
            border-bottom: solid 1px #ddd;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            padding-bottom: 0.2rem;
            border-bottom: solid 1px #ddd;
        }

        h3 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.2rem;
            border-bottom: solid 1px #ddd;
        }

        pre {
            code {
                color: white;
                padding: 1.5rem 1rem;
                background-color: #364549;
                width: 100%;
                display: block;
            }
        }
    </style>
</head>

<body>
    @include('parts.header')
    @yield('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js"></script>
</body>

</html>