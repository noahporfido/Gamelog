<?php
$blogBeiträge = getEntries($blogId);
$blogOwners = getUserNames();
$eid;
    
foreach($blogBeiträge as $blogBeitrag)
{
    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogBeitrag['content']);
    $date = date("Y-m-d H:i:s", $blogBeitrag['datetime']);
    $shortdate = date("Y-m-d", $blogBeitrag['datetime']);
    echo "<a href='index.php?function=blogsanzeige&bid=".$blogId."&eid=".$blogBeitrag['eid']. "&title=BlogAuswählen' class='blogTitel'>".$blogBeitrag['title']."
    ".$shortdate."</a><br>";
   
}



    if(isset($_GET['eid']))
    {
 $eid= $_GET['eid'];
        echo "<div id='blogTeil'>";
$blogbeiträge = getEntry($eid);

    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
    echo "<div id='blogText'>";
    $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
    echo "<p>".$blogbeiträge['title']."</p>
    <p id='blogDate'>".$date."</p>
    <p>".$replace."</p>
    </div>";
    echo "</div>";
    }
else
{
    echo "<p>Wählen sie einen Blog</p>";
}
?>

