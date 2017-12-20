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

if(isset($_POST['title']))
{
    $eidp = htmlspecialchars($_GET['eid']);
    $titlep = htmlspecialchars($_POST['title']);
    $contentp = htmlspecialchars($_POST['content']);
    updateEntry($eidp, $titlep, $contentp);
    header("Location: {$_SERVER['PHP_SELF']}?function=profil");
}

if(isset($_POST['addtitle']))
{
    $uidp = htmlspecialchars($_SESSION['userId']);
    $addtitlep = htmlspecialchars($_POST['addtitle']);
    $addcontentp = htmlspecialchars($_POST['addcontent']);
    addEntry($uidp, $addtitlep, $addcontentp );
    header("Location: {$_SERVER['PHP_SELF']}?function=profil");
}

echo "</div>";
     if(isset($_GET['eid']))
    {
        
       
        $eid= $_GET['eid'];
            
        $blogbeiträge = getEntry($eid);
        
        $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
        
        $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);
         $editshow = false;
            switch ($_GET['modus'])
            {
                case 'edit':
                echo "<form action='#' method='post'><div id='überschrift'><p id='ÜÜ'>Überschrift</p><textarea required name='title' cols='35' rows='4' id='textTitle'>".$blogbeiträge['title']."</textarea></div>
                <div id='text'><p id='TextÜ'>Text</p><textarea required name='content' cols='35' rows='4' id='textContent'>".$replace."</textarea></div>
                <button type='submit'>Speichern</button>
                <button>Abbrechen</button>
                </form>";
                break;

                case 'delete':
                deleteEntry($eid);
                header("Location: {$_SERVER['PHP_SELF']}?function=profil");
                break;
                    
                case '':
                    $editshow = true;
                     echo "<div id='blogTeil'>";
                echo "<div id='blogTitle'><p>".$blogbeiträge['title']."</p>
                <p id='blogDate'>".$date."</p></div>
                <p>".$replace."</p>";
                echo "<div id='editButtons'>
                <button id='edit'><a href='index.php?function=profil&modus=edit&eid=".$eid."'>Bearbeiten</a></button>
                <button id='delete'><a href='index.php?function=profil&modus=delete&eid=".$eid."'>Löschen</a></button>";
                    break;
                case 'create':
<<<<<<< HEAD
                echo "<form action='#' method='post'><div id='überschrift'><p id='ÜÜ'>Überschrift</p><textarea required value='Bitte ausfüllen' name='addtitle' cols='35' rows='4' id='textTitle'></textarea></div>
                <div id='text'><p id='TextÜ'>Text</p><textarea required name='addcontent' cols='35' rows='4' id='textContent' value='Bitte ausfüllen'></textarea></div>
=======
                    $editshow = true;
                    if($editshow == true)
                    {
                        $editshow = false;
                        echo "<button id='create'><a href='index.php?function=profil&modus=create&eid=0'>Erstellen</a></button></div>";
                    }
                echo "<form action='#' method='post'><div id='überschrift'><p id='ÜÜ'>Überschrift</p><textarea value='Bitte ausfüllen' name='addtitle' cols='35' rows='4' id='textTitle'></textarea></div>
                <div id='text'><p id='TextÜ'>Text</p><textarea name='addcontent' cols='35' rows='4' id='textContent' value='Bitte ausfüllen'></textarea></div>
>>>>>>> 5dd254144bc1e8c84b8f9f59f5dcb4a93e319d2b
                <button type='submit'>Speichern</button>
                <button>Abbrechen</button>
                </form>";
                break;

            }
         if($editshow == false)
         {
             $editshow = true;
             echo "<button id='create'><a href='index.php?function=profil&modus=create&eid=0'>Erstellen</a></button></div>";
         }
            
    }
   
?>
