<?php
$blogBeiträge = getEntries($blogId);
$blogOwners = getUserNames();
$eid;

echo "<div id='BlogInhalt'>";


echo "<div id='blogAnzeige'>";

foreach($blogOwners as $blogOwner)
{
    if($blogId == $blogOwner['uid'])
    {
    echo "<h1 id='blogOwner'>".$blogOwner['name']."'s Blog</h1>";
    }
}

  echo "<div id='blogTitelMenu'>";
    echo "<ul>";
foreach($blogBeiträge as $blogBeitrag)
{
    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogBeitrag['content']);
    
    
    
    echo "<a href='index.php?function=einbloganzeigen&bid=".$blogId."&eid=".$blogBeitrag['eid']. "&title='BlogAuswählen' class='blogTitel'>".$blogBeitrag['title']."</a>";
   
}
    echo "</ul>";
    echo "</div>";

echo "</div>";


?>
