<?php

$LoggedinUser = getUserName($_SESSION['userId']);
$blogBeiträge = getEntries($_SESSION['userId']);

    echo "<h1 id='blogOwner'>".$LoggedinUser."'s Profil</h1>
    <div id='BlogAuswahl'>";
    
foreach($blogBeiträge as $blogBeitrag)
{
    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogBeitrag['content']);
    $date = date("Y-m-d H:i:s", $blogBeitrag['datetime']);
    
    echo "<a href='index.php?function=profil&bid=".$blogId."&eid=".$blogBeitrag['eid']. "&title=BlogAuswählen' class='blogTitel'>".$blogBeitrag['title']."
    ".$date."</a><br>";
   
}

echo "</div>";

    if(isset($_GET['eid']))
    {
 $eid= $_GET['eid'];
        
$blogbeiträge = getEntry($eid);

    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
    
    $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
    echo "<p>".$blogbeiträge['title']."</p>
    <p id='blogDate'>".$date."</p>
    <p>".$replace."</p>";
    }
else
{
    echo "<p>Wählen sie einen Blog</p>";
}
?>
