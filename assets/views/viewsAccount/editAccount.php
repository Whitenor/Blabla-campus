<?php ob_start();
session_start();
?>
<form action="" method="post" class="flex flex-col w-5/6 gap-3" id="formEditAccount" enctype="multipart/form-data">
    <label for="nameEditAccount" class="font-bungee">Entrez vos coordonnées</label>
    <input type="text" name="nameEditAccount" placeholder="Nom" class="bg-xtraLightGrey rounded-lg p-2" required value="<?= $_SESSION['name_user']?>">
    <input type="text" name="nicknameEditAccount" placeholder="Nom d'utilisateur" class="bg-xtraLightGrey rounded-lg p-2" required value="<?= $_SESSION['username_user']?>">
    <label for="pswdEditAccount" class="font-bungee">Entrez votre mot de passe</label>
    <input type="password" name="pswdEditAccount" placeholder="******************" class="bg-xtraLightGrey rounded-lg p-2" required>
    <label for="emailEditAccount" class="font-bungee">Entrez votre email</label>
    <input type="email" name="emailEditAccount" placeholder="Email" class="bg-xtraLightGrey rounded-lg p-2 invalid:border-red-500 invalid:border-solid invalid:border" required pattern="([a-z0-9_\.\+-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" value="<?= $_SESSION['email_user']?>">
    <p class="epilogue text-lightGrey" id="underTextEmailEditAccount">Ajoutez votre adresse e-mail pour recevoir des notifications sur votre activité sur BlaBla Campus.</p>
    <label for="bioEditAccount" class="font-bungee">Entrez votre biographie</label>
    <textarea name="bioEditAccount" id="bioEditAccount" cols="30" rows="8" placeholder="Entrez votre bio ici" class="bg-xtraLightGrey rounded-lg resize-none" maxlength="140" required><?= $_SESSION['bio_user']?></textarea>
    <p class="font-bungee">Téléchargez une image de profil</p>
    <label for="profilePictureEditAccount" id="profilePictureEditAccountLabel" class="bg-xtraLightGrey rounded-lg flex flex-col justify-center items-center w-full h-48 text-center box-border break-words overflow-hidden">
        <img src="../assets/img/landscape.png" alt="Logo de paysage stylisé">
        <p>Glisser-déposer ou parcourir un fichier</p>
        <p class="text-sm w-3/4 text-center">Taille recommandée : JPG, PNG, GIF (150x150px, Max 1mb)</p>
    </label>
    <input type="hidden" name="idToChange" value="<?= $_SESSION['id_user']?>">
    <input type="file" name="profilePictureEditAccount" id="profilePictureEditAccount" accept=".png,.jpg,.heif" class="hidden">
    <div class="w-full flex justify-center">
        <input type="submit" name="action" value="Modifier mon compte" class="bg-redOnline cursor-pointer font-workSans rounded-lg w-4/5 text-center text-sm py-2.5 text-white tracking-5px">
    </div>
</form>
<?php 
    $title = "Modifier votre compte";
    $editAccount = ob_get_clean();
    require(__DIR__.'../../template.php');
?>