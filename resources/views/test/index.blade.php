<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/app.css')}}">
</head>

<body>

    <div style=width:900px; class="container max-w-full mx-auto pt-4">

        <h1 class="text-2xl font-bold mb-4">Test Blog</h1>

        <p class="mb-6  mt-2">
            <a href="/test/create"
                class="bg-indigo-500 tracking-wide text-white px-6 py-2 inline-block rounded shadow-lg hover:shadow">New
                test Blog</a>
        </p>

        @foreach ($tests as $test)
        <article class=mb-2>
            <a href="/test/{{ $test->id }}/edit" class="text-xl">{{ $test->title }}</a>
            <p class="text-sm text-gray-600">{{ $test->content}}</p>
        </article>
        <hr class="mt-2">
        @endforeach
    </div>

</body>

</html>