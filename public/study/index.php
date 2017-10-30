<?php
    $conn=mysqli_connect('localhost','root','ziotes135','blog');
    $result=mysqli_query($conn,'SELECT * FROM posts');

?>

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
        <h1><a href="/study/index.php">JavaScript</a></h1>
    </header>
    <nav>
        <ol>
            <?php
            while($row=mysqli_fetch_assoc($result)) {
                echo '<li><a href="/study/index.php?id='.$row['id'].'">'.$row['title'].'</a>,</li>'."\n";
            }
            ?>
        </ol>
    </nav>

    <div id="control">
        <input type="button" value="white" onclick="document.getElementById('target').className='white'">
        <input type="button" value="black" onclick="document.getElementById('target').className='black'">
        <a href="/study/write.php">쓰기</a>
    </div>

    <article>

        <?php
        if(isset($_GET['id'])){
            $sql='SELECT * FROM posts where id='.$_GET['id'];
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

            echo $row['body'];
        }
        ?>

    </article>

</body>
</html>