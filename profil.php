<?php


$blogBeiträge = getEntries($_SESSION['userId']);

    echo "<div id='BlogAuswahl'>";
    
foreach($blogBeiträge as $blogBeitrag)
{
    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogBeitrag['content']);
    $date = date("Y-m-d H:i:s", $blogBeitrag['datetime']);
    
    echo "<a href='index.php?function=profil&bid=".$blogId."&eid=".$blogBeitrag['eid']. "&title=BlogAuswählen' class='blogTitel'>".$blogBeitrag['title']."
    ".$date."</a>";
   
}

echo "</div>";
    

    if(isset($_GET['eid']))
    {
        
        echo "<div id='blogTeil'>";
 $eid= $_GET['eid'];
        
$blogbeiträge = getEntry($eid);

    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
    
    $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
    echo "<p>".$blogbeiträge['title']."</p>
    <p id='blogDate'>".$date."</p>
    <p>".$replace."</p>";
    echo "</div>";
    }
else
{
    echo "<p>Wählen sie einen Blog</p>";
}
?>
