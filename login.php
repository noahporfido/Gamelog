<?php

    if(isset($_POST['email']))
    {
        $userId = getUserIdFromDb($_POST['email'], $_POST['passwort']);
        
        if($userId == 0)
        {
            echo "<p>Login ist Falsch</p>";
        }
        else
        {
           $_SESSION['userId']=$userId;
           header("Location: index.php?function=profil");
          
        }
    }
?>



<div class="login-page">
    <div class="form"> 
        <form method="post" class="login-form">
            <input type="text" placeholder="email" value="marc.muster@gibb.ch" name="email" />
            <input type="password" placeholder="password" value="gibbiX12345" name="passwort" />
            <input type="submit" value="Login">
        </form>
    </div>
</div>