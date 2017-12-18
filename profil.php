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

if(isset($_GET['delete']))



echo "</div>";
    

    if(isset($_GET['eid']))
    {
        
       
        $eid= $_GET['eid'];
            
        $blogbeiträge = getEntry($eid);

        $replace = str_replace(array("\r\n","\r","\n"),"<br/>", $blogbeiträge['content']);
        
        $date = date("Y-m-d H:i:s", $blogbeiträge['datetime']);

        /*if(isset($_GET['edit']) && $_GET['edit'] == true)
            {
                echo "<form action='#' method='post'><div id='überschrift'><p id='ÜÜ'>Überschrift</p><textarea name='title' cols='35' rows='4' id='textTitle'>".$blogbeiträge['title']."</textarea></div>
                <div id='text'><p id='TextÜ'>Text</p><textarea name='content' cols='35' rows='4' id='textContent'>".$replace."</textarea></div>
                <button type='submit'>Speichern</button>
                <button>Abbrechen</button>
                </form>";
            }*/
            switch ($_GET['modus'])
            {
                case 'edit':
                echo "<form action='#' method='post'><div id='überschrift'><p id='ÜÜ'>Überschrift</p><textarea name='title' cols='35' rows='4' id='textTitle'>".$blogbeiträge['title']."</textarea></div>
                <div id='text'><p id='TextÜ'>Text</p><textarea name='content' cols='35' rows='4' id='textContent'>".$replace."</textarea></div>
                <button type='submit'>Speichern</button>
                <button>Abbrechen</button>
                </form>";
                break;

                case 'delete':
                echo ""
                break;
            }


        else
            {
                echo "<div id='blogTeil'>";
                echo "<p>".$blogbeiträge['title']."</p>
                <p id='blogDate'>".$date."</p>
                <p>".$replace."</p>";
                echo "</div>";
                echo "<div id='editButtons'>
                <button id='edit'><a href='index.php?function=profil&modus=edit&eid=".$blogBeitrag['eid']."'>Bearbeiten</a></button>
                <button id='delete'><a href='index.php?function=profil&modus=delete&eid=".$blogBeitrag['eid']."'>Löschen</a></button>
                <button id='create'><a href='index.php?function=profil&modus=create&eid=".$blogBeitrag['eid']."'>Erstellen</a></button>
                </div>";
            }
    }
else
{
    echo "<p>Wählen sie einen Blog</p>";
}

require_once($function .".php")

?>
