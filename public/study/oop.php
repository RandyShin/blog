<h1>Function</h1>
<?php
    var_dump(is_file('../index.php'));
    var_dump(is_dir('../css'));
    var_dump(file_get_contents('data.txt'));
    file_put_contents('data.txt', rand(1,5000));

    echo "<h1>Object</h1>";

    $file = new SplFileObject('data.txt');
    var_dump($file->isFile());
    var_dump($file->isDir());
    var_dump($file->fread($file->getsize()));
    $file->fwrite(rand(1,5000));