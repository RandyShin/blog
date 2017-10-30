<?php



    for($i = 6000; $i <=6999; $i++) {
        echo "exten => "."$i".",6,agi(queue_db.php,"."$i".")" ;
        echo "<br/>";
        echo "exten => " . $i . ",n,Set(count=$" . "{CURL(localhost/queue.php?queue_no=" . $i . ")})";
        echo "<br/>";
        echo "exten => " . $i . ",n,GotoIf($[$" . "{count}=0]?pass)";
        echo "<br/>";
        echo "exten => " . $i . ",n,agi(googletts.agi,\"$" . "{TEXT}" . "\",en)" ;
        echo "<br/>";
        echo "exten => " . $i . ",n,SayNumber($" . "{count})";
        echo "<br/>";
        echo "exten => " . $i . ",n(pass),noop";
        echo "<br/>";
        echo "<br/>";
    }

