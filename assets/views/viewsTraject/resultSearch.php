<?php
ob_start();
session_start();
?>

<main class="flex flex-col items-center w-5/6 min-h-screen gap-y-3">
    <h4 class="w-5/6font-bungee">Trajets Disponibles</h4>
    <!--         structure à utiliser dans le echo de ta fonction de recherche pour écrire les résultats , les seuls trucs à changer dedans seront les contenu des P ansi que la value de l'input hidden         -->
    <?php if(count($transfert) > 0){ ?>
        <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3">
            <div class="flex w-4/5 justify-between items-center gap-x-3">
                <div class="flex flex-col">
                    <p class="jourDate font-bungee text-redOnline text-4xl"><?= $transfert[0]['day']?></p>
                    <p class="moisDate font-bungee text-xl"><?= $transfert[0]['month']?></p>
                </div>
                <div class="h-full flex flex-col items-start justify-center gap-y-3">
                    <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"><?php if($_POST['startingPointSearch'] != ''){echo $_POST['startingPointSearch'];}else{echo 'Pas de départ choisi';} ?></p>
                    <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php if ($transfert[0]['end_point'] == "46.6709261,5.5631747") {echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";}else{echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";}?></p>
                </div>
            </div>
            <img src="./assets/img/upDown.png" alt="doubles inversés haut et bas" class="fleche">
        </div>

        <!--       Seule modif à faire ici pour toi Vincent , c'est dans la span , remplacé par probablement un count du nombre de résultats retourné par ton select -->

        <p class="w-5/6"><span class="text-redOnline"><?= count($transfert) ?></span> trajets disponibles</p>

        <!-- texte fixe ou aucune modif n'est nécessaireok -->

        <div class="w-full flex justify-between items-center gap-2">
            <img src="./assets/img/clock.png" alt="Logo d'horloge">
            <p class="font-epilogue font-medium text-xs">Les trajets sont triés chronologiquement par heure de départ.</p>
        </div>    
    <?php
        for ($i=0; $i < count($transfert); $i++) {?>
            <form action="reservation.php" class="w-full <?php 
            if($transfert[$i]['step1'] == NULL){echo 'h-48';}
            elseif ($transfert[$i]['step2'] == NULL) {
                echo 'h-60';
            }
            elseif ($transfert[$i]['step3']==NULL) {
                echo 'h-72';
            }
            else{echo 'h-80';} 
            ?>" id="result<?= $i+1 ?>">
                <div class="card w-full bg-xtraLightGrey rounded-lg flex flex-col p-3 gap-3.5 relative h-full">
                    <p class="text-xs font-workSans text-end w-full">places disponibles : <span class="text-redOnline font-bold"><?= $transfert[$i]['placeRest']?></span></p>
                    <div class="firstRow w-full flex h-full gap-2">
                        <div class="flex flex-col justify-between h-full">
                            <p class="text-redOnline font-bold text-sm" id="departureTime"><?= date('H:i',strtotime($transfert[$i]['hourStart']))?></p>
                            <p class="text-redOnline font-bold text-sm" id="arrivalTime"><?= date('H:i',date(strtotime($transfert[$i]['hourStart']))+strtotime($transfert[$i]['timeTotravel'])) ?></p>
                        </div>
                        <div class="flex flex-col relative justify-between h-full">
                            <span class="circleSearchResult"></span>
                            <?php if($transfert[$i]['step1']!= NULL){?>
                                <span class="circleSearchResult"></span>
                            <?php }?>
                            <?php if($transfert[$i]['step2']!= NULL){?>
                                <span class="circleSearchResult"></span>
                            <?php }?>
                            <?php if($transfert[$i]['step3']!= NULL){?>
                                <span class="circleSearchResult"></span>
                            <?php }?>
                            <span class="circleSearchResult"></span>
                            <span class="blackBar absolute"></span>
                        </div>
                        <div class="h-full flex flex-col justify-between items-start gap-x-5">
                            <p class="colorFakeBlack font-bold font-epilogue text-sm"><?= $transfert[$i]['starting_point']?></p>
                            <?php if($transfert[$i]['step1']!= NULL){?>
                                <p class="colorFakeBlack font-bold font-epilogue text-sm"><?= $transfert[$i]['step1']?></p>
                            <?php }?>
                            <?php if($transfert[$i]['step2']!= NULL){?>
                                <p class="colorFakeBlack font-bold font-epilogue text-sm"><?= $transfert[$i]['step2']?></p>
                            <?php }?>
                            <?php if($transfert[$i]['step3']!= NULL){?>
                                <p class="colorFakeBlack font-bold font-epilogue text-sm"><?= $transfert[$i]['step3']?></p>
                            <?php }?>
                            <p class="colorFakeBlack font-bold font-epilogue text-sm"><?php if ($transfert[0]['end_point'] == "46.6709261,5.5631747") {echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";}else{echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";}?></p>
                        </div>
                    </div>
                    <div class="secondRow flex gap-3 justify-start items-center">
                        <div class="first-col">
                            <img src="./uploadImg/<?= $transfert[$i]['img_user'] ?>" alt="img du conducteur" class="img-cardSearch">
                        </div>
                        <div class="second-col">
                            <p class="epilogue text-sm font-bold"><?= $transfert[$i]['username_user']?></p>
                            <p class="epilogue font-light text-xs italic"><?= $transfert[$i]['bio_user']?></p>
                        </div>
                    </div>
                    <input type="hidden" name="dayToTransfert" value="<?= $transfert[$i]['day']?>">
                    <input type="hidden" name="monthToTransfert" value="<?= $transfert[$i]['month']?>">
                    <input type="hidden" name="StartToTransfert" value="<?= $transfert[$i]['starting_point']?>">
                    <input type="hidden" name="endToTransfert" value="<?php if ($transfert[0]['end_point'] == "46.6709261,5.5631747") {echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";}else{echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";}?>">
                    <input type="hidden" name="idToTransfert" value="<?= $transfert[$i]['id_traject']?>">
                    <input type="submit" value="" name="action" class="absolute top-0 left-0 w-full h-full rounded-lg text-transparent" value="goToDetails">
                </div>
                <input type="hidden" name="idToTransfer" value="1">
            </form>

        <?php }
    }else{ ?><p class="font-epilogue font-bold text-lg">Pas de trajets prévus ce jour là</p><?php }?>
</main>
<?php 
$title = 'Recherche';
$searchResult = ob_get_clean();
require(__DIR__.'../../template.php'); ?>

<!-- ajouté des input cachés pour transférer : day, months , starting point , end point  -->