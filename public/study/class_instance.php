<?php
    class MyFileObject{
        function __construct($fname)
        {
            $this->filenema = $fname;
        }

        function isFile(){
            return is_file($this->filename);
        }
    }


    $file = new MyFileObject('../index.php');
   // $file->filename = '../index.php';
var_dump($file->isFile());
