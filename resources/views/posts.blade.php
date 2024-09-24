<!DOCTYPE>
<html>
<head>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php foreach ($posts as $post) :?>
<article>
<h1>
    {{$post->title}}
</h1>

    <div>
        {!! $post->body !!}
    </div>
</article>
<?php endforeach;?>

</body>
</html>
