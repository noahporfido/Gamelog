<?php
    if(isset($_GET['eid'])) $eid= $_GET['eid'];
else $eid = $blogBeiträge[0]['eid'];

$blogbeiträge = getEntry($eid);

    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
    
    $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
    echo "<p>"
    echo "<p>"."";
    echo "<p id='blogDate'>".$date."</p>";
    echo "<p>".$replace."</p>";  
?>