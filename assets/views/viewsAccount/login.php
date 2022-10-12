<?php ob_start();
?>
<form action="" method="post" class="flex flex-col w-5/6 gap-9">
    <label for="login" class="bungee text-lg">Entrez vos informations</label>
    <div class="flex flex-col gap-2.5">
        <input type="text" name="login" placeholder="Nom d'utilisateur" class="bg-xtraLightGrey rounded-lg font-epilogue p-3">
        <input type="password" name="password" id="password" placeholder="******************" class="bg-xtraLightGrey rounded-lg p-3">
    </div>
    <div class="flex flex-col items-center justify-center w-full gap-9">
        <input type="submit" name="action" value="SE CONNECTER" class="cursor-pointer bg-redOnline rounded-lg tracking-5px font-workSans text-white text-sm w-3/4 py-2">
        <a href="./pswdReset" class="tracking-5px text-redOnline font-workSans text-xs">MOT DE PASSE OUBLIÉ</a>
    </div>
</form>
<?php 
    $title = "Connexion";
    $login = ob_get_clean();
    require(__DIR__.'../../template.php');
?>