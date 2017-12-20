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
    updateEntry($_GET['eid'], $_POST['title'], $_POST['content']);
    header("Location: {$_SERVER['PHP_SELF']}?function=profil");
}

if(isset($_POST['addtitle']))
{
    addEntry($_SESSION['userId'], $_POST['addtitle'], $_POST['addcontent']);
    header("Location: {$_SERVER['PHP_SELF']}?function=profil");
}

echo "</div>
<button id='create'><a href='index.php?function=profil&modus=create&eid=0'>Erstellen</a></button>";
     if(isset($_GET['eid']))
    {
        
       
        $eid= $_GET['eid'];
            
        $blogbeiträge = getEntry($eid);
        
        $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
        
        $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);

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
                     echo "<div id='blogTeil'>";
                echo "<p>".$blogbeiträge['title']."</p>
                <p id='blogDate'>".$date."</p>
                <p>".$replace."</p>";
                echo "</div><div id='editButtons'>
                <button id='edit'><a href='index.php?function=profil&modus=edit&eid=".$eid."'>Bearbeiten</a></button>
                <button id='delete'><a href='index.php?function=profil&modus=delete&eid=".$eid."'>Löschen</a></button>
                </div>"; 
                    break;
                case 'create':
                echo "<form action='#' method='post'><div id='überschrift'><p id='ÜÜ'>Überschrift</p><textarea required value='Bitte ausfüllen' name='addtitle' cols='35' rows='4' id='textTitle'></textarea></div>
                <div id='text'><p id='TextÜ'>Text</p><textarea required name='addcontent' cols='35' rows='4' id='textContent' value='Bitte ausfüllen'></textarea></div>
                <button type='submit'>Speichern</button>
                <button>Abbrechen</button>
                </form>";
                break;

            }
            
            
    }
   
?>
