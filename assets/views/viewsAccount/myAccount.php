<?php ob_start();
session_start();
?>
<main class="accountCard w-5/6 rounded-3xl relative mt-8">
    <div class="w-full bg-white p-6 flex flex-col justify-center items-start gap-6 rounded-3xl">
        <div class="firstRow flex justify-start items-center gap-3 w-full">
 
            <!-- chemin d'image à remplacer par l'image du conducteur avec tes fonctions -->
            <div class="first-col w-1/6">
                <img src="./uploadImg/<?php echo $_SESSION['img_user'];?>" alt="img du conducteur" class="img-account">
            </div>
            <!-- Nom du conducteur à remplacer avec tes fonctions ainsi que sa bio -->
            <div class="second-col w-4/6">
                <p class="bungee text-sm font-bold text-redOnline"><?php echo $_SESSION['username_user']?></p>
                <p class="epilogue font-light text-xs italic box-border w-full"><?php echo $_SESSION['bio_user']?></p>
            </div>
        </div>
        <a href="./newItinerary" class="buttonForProposal rounded-lg bg-redOnline w-full p-2 flex justify-start items-center gap-2">
            <img src="./assets/img/newItinerary.png" alt="Logo pour le bouton de nouvel itinéraire">
            <p class="tracking-5pxfont-workSans text-xs text-white">PROPOSER UN TRAJET</p>
        </a>
        <div class="thirdRow flex flex-col justify-center items-start gap-3">
            <div class="flex justify-start items-center gap-2">
                <img src="./assets/img/humanLogoNoBGBlack.png" alt="Humain stylisé">
                <a href="./myItinerary" class="epilogue text-base">Mes trajets</a>
            </div>
            <div class="flex justify-start items-center gap-2">
                <img src="./assets/img/booking.png" alt="Livre stylisé">
                <a href="./myReservations" class="epilogue text-base">Mes réservations</a>
            </div>
            <div class="flex justify-start items-center gap-2">
                <img src="./assets/img/humanLogoNoBGBlack.png" alt="Humain stylisé">
                <a href="./editAccount" class="epilogue text-base">Modifier mes informations</a>
            </div>
            <div class="flex justify-start items-center gap-2">
                <img src="./assets/img/message.png" alt="Bulle de Message">
                <a href="./mailbox" class="epilogue text-base">Messagerie</a>
            </div>
            <div class="flex justify-start items-center gap-2">
                <img src="./assets/img/arrowLeft.png" alt="Fléche de déconnexion">
                <form action="./logout" method="post">
                    <input type="submit" name="action" value="Se déconnecter" class="epilogue text-base">
                </form>
            </div>
        </div>
    </div>
</main>
<?php 
$title = "Mon Compte";
$myAccount = ob_get_clean();
require(__DIR__.'../../template.php'); ?>