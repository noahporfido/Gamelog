<?php
  // Alle Blogs bzw. Benutzernamen holen und falls Blog bereits ausgewählt, entsprechenden Namen markieren
  // Hier Code....

  // Schlaufe über alle Blogs bzw. Benutzer
  // Hier Code....

  // Nachfolgend das Beispiel einer Ausgabe in HTML, dieser Teil muss mit einer Schlaufe über alle Blogs und der Ausgabe mit PHP ersetzt werden
echo "<div id='KategorienMenu'>";

$blogs = getUserNames();
    

    foreach($blogs as $blog)
    {
        if($blog['uid'] == $blogId)
        {
            echo "<div><a id='selected' href='index.php?function=blogsanzeige&bid=".$blog['uid']. "&title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
        }
        else
        {
        echo "<div><a id='kategorien' href='index.php?function=blogsanzeige&bid=".$blog['uid']. "&title='Blog auswählen'><h4>".$blog['name']."</h4></a></div>";
        }
    }
echo "</div>";
    
?>
