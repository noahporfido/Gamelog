<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <script src="include/functions.js"></script>
    <script src="js/js.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>GameLog</title>
</head>

<body>
    <?php
  session_start();
  require_once("include/functions.php");
  require_once("include/functions_db.php");
  require_once("include/functions_db_plus.php");
  define("DBNAME", "db/blog.db");
  // Datenbankverbindung herstellen, diesen Teil nicht ändern!
  if (!file_exists(DBNAME)) exit("Die Datenbank 'blog.db' konnte nicht gefunden werden!");
  $db = new SQLite3(DBNAME);
  setValue("cfg_db", $db);
  // Einfacher Dispatcher: Aufruf der Funktionen via index.php?function=xy
  if (isset($_GET['function'])) $function = $_GET['function'];
  else $function = "login";
  // Prüfung, ob bereits ein Blog ausgewählt worden ist
  if (isset($_GET['bid'])) $blogId = $_GET['bid'];
  else $blogId = 0;

    if(isset($_SESSION['userId']) && $_SESSION['userId'] > 0)
    {
        echo "<div id='NavTop'>
            <img id='Logo' src='images/gamepad.png'>
            <h1 id='NavTitle'>GameLog</h1>
            <div id='Navbuttons'>
                <li> <a href='index.php?function=blogs&bid=$blogId' class='Buttons'>Alle Blogs</a></li>
                <li> <a href='{$_SERVER['PHP_SELF']}?logout=true' class='Buttons'>Abmelden</a></li>
                <li><a class='Buttons' href='index.php?function=profil'>Profil</a></li>
            </div>
        </div>";
    }
    else
    {
        echo "<div id='NavTop'>
            <img id='Logo' src='images/gamepad.png'>
            <h1 id='NavTitle'>GameLog</h1>
            <div id='Navbuttons'>
                <li> <a href='index.php?function=blogs&bid=$blogId' class='Buttons'>Alle Blogs</a></li>
                <li> <a href='index.php?function=login&bid=$blogId' class='Buttons'>Login</a></li>
            </div>
        </div>";
    }


    if(isset($_GET['logout']) && $_GET['logout'] == true)
    {
        session_destroy();
        unset($_SESSION);
        header("Location: index.php?function=login");
    }

         require_once($function .".php")
        ?>
</body>

</html>
<?php
  // Datenbankverbindung schliessen, diesen Teil nicht ändern!
  $db = getValue('cfg_db');
  $db->close();
?>
