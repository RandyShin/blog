<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;
use App\Cdr;

$conn = mysqli_connect("localhost", "root", "");
mysqli_select_db($conn, 'pbx01');



//    /* check connection */
//    if (mysqli_connect_errno()) {
//        printf("Connect failed: %s\n", mysqli_connect_error());
//        exit();
//    }

/* return name of current default database */
//    if ($result = $mysqli->query("SELECT DATABASE()")) {
//        $row = $result->fetch_row();
//        printf("Default database is %s.\n", $row[0]);
//        $result->close();
//    }

$sql = "SELECT * FROM cdr LIMIT 100";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



class RecController extends Controller {

    public function getIndex() {
        $cdrs = Cdr::orderBy('calldate', 'desc')->limit(4)->get();
        return view('rec')->withcdrs($cdrs)->withRow('$row');
    }

}