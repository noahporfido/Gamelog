<?php
$blogBeiträge = getEntries($blogId);
$blogOwners = getUserNames();
$eid;
    
foreach($blogBeiträge as $blogBeitrag)
{
    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogBeitrag['content']);
    $date = date("Y-m-d H:i:s", $blogBeitrag['datetime']);
    
    echo "<a href='index.php?function=blogsanzeige&bid=".$blogId."&eid=".$blogBeitrag['eid']. "&title=BlogAuswählen' class='blogTitel'>".$blogBeitrag['title']."
    ".$date."</a><br>";
   
}

echo "<div id='blogTeil'>";

    if(isset($_GET['eid']))
    {
 $eid= $_GET['eid'];
        
$blogbeiträge = getEntry($eid);

    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
    echo "<div id='blogText'>";
    $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
    echo "<p>".$blogbeiträge['title']."</p>
    <p id='blogDate'>".$date."</p>
    <p>".$replace."</p>
    </div>";
    }
else
{
    echo "<p>Wählen sie einen Blog</p>";
}

echo "</div>";
?>

