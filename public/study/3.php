<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"  href="http://laravel.ziotes.com/study/style.css">
</head>
<body id="target">
<header>
    <h1><a href="/study">JavaScript</a></h1>
</header>

<nav>
    <ol>
        <?php
        echo file_get_contents('list.txt');
        ?>
    </ol>
</nav>
<div id="control">
    <input type="button" value="white" onclick="document.getElementById('target').className='white'">
    <input type="button" value="black" onclick="document.getElementById('target').className='black'">
</div>
<article>

</article>


</body>
</html>