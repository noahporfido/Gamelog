<?php
$blogBeiträge = getEntries($blogId);
$blogOwners = getUserNames();
if(isset($_SESSION['userId']))
{
$LoggedinUser = getUserName($_SESSION['userId']);
}
$eid;
    
foreach($blogBeiträge as $blogBeitrag)
{
    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogBeitrag['content']);
    $date = date("Y-m-d H:i:s", $blogBeitrag['datetime']);
    $shortdate = date("Y-m-d", $blogBeitrag['datetime']);
    echo "<a href='index.php?function=blogsanzeige&bid=".$blogId."&eid=".$blogBeitrag['eid']. "&title=BlogAuswählen' class='blogTitel'>".$blogBeitrag['title']."
    ".$shortdate."</a><br>";
}

if(isset($_POST['addcomment']))
{
    $commentcontent = $_POST['addcomment'];
    addComment($_GET['eid'], $LoggedinUser, $commentcontent);
}

if(isset($_GET['kommentardelete']))
{
    deleteComment($_GET['kommentardelete']);
}

if(isset($_GET['eid']))
{
    $eid= $_GET['eid'];
    echo "<div id='blogTeil'>";
    $blogbeiträge = getEntry($eid);
    $contentcomment = getComments($eid);
    

    $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
    echo "<div id='blogText'>";
    $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
    echo "<p>".$blogbeiträge['title']."</p>
    <p id='blogDate'>".$date."</p>
    <p>".$replace."</p>
    </div>";
    foreach($contentcomment as $comment)
    {
        $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $comment['content']);
        $date = date("Y-m-d H:i:s", $comment['datetime']);
        
        echo "<div class='kommentar'>
            <div class='kommentar_content'>
            <h2 class='kommentar_name'>{$comment['name']}</h2>
            <p class='kommentar_time'>$date</p>
            <p class='kommentar_text'>$replace</p>
            </div>";

        if($comment['name'] == $LoggedinUser  || (isset($_SESSION['userId']) && $_SESSION['userId'] == $_SESSION['userId'])){
            echo "<a href='index.php?function=blogsanzeige&bid=".$blogId."&eid=".$blogBeitrag['eid']."&kommentardelete={$comment['cid']}'>
                    <div class='default_button kommentar_edit'>
                    <p class='kommentar_edit_text'>Löschen</p>
                    </div>
                    </a>";
        }
        echo "</div>";
    }
    echo "</div>";
    echo "<form method='post' action='index.php?function=blogsanzeige&bid=".$blogId."&eid=".$blogBeitrag['eid']."&addcomment'>
    <div id='commentfield'><textarea name='addcomment' id='commentContent' value='Geben Sie einen Kommantar ab'></textarea> <button type='submit'>Add Comment</button></div></form>";
}
else
{
    echo "<p>Wählen sie einen Blog</p>";
}
?>

