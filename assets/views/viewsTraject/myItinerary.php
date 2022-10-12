<?php ob_start();?>

<main class="flex flex-col items-center w-5/6 min-h-screen gap-y-3">
    <h4 class="w-5/6 font-bungee">Vos Trajets</h4>
    <?php if(count($transfert) > 0){ ?>
    <?php
        for ($i=0; $i < count($transfert); $i++) {?>
            <div class="flex w-full justify-between items-center rounded-lg bg-xtraLightGrey p-3 h-32 relative cardTraject" id="traject2">
                <div class="flex w-4/5 justify-between items-center h-full gap-2">
                    <div class="flex flex-col h-full justify-around">
                        <p class="jourDate font-bungee text-redOnline text-4xl"><?= $transfert[$i]['day']?></p>
                        <p class="moisDate font-bungee text-xl"><?= $transfert[$i]['month'] ?></p>
                    </div>
                    <div class="h-full flex flex-col items-start justify-around">
                        <p class="startingPoint text-lightGrey font-medium text-sm font-epilogue"><?= $transfert[$i]['starting_point']?></p>
                        <p class="endingPoint text-lightGrey font-medium text-sm font-epilogue"><?php if ($transfert[0]['end_point'] == "46.6709261,5.5631747") {echo "13b Avenue du Stade Municipal, 39000 Lons-le-Saunier";}else{echo "2 Rte de Montaigu, 39000 Lons-le-Saunier";}?></p>
                    </div>
                </div>
                <img src="<?php if($transfert[$i]['type_traject'] == 1){echo './assets/img/upDown.png';}else{echo './assets/img/arrowDown.svg';} ?>" alt="doubles inversés haut et bas" class="fleche">
                <div class="modalTraject h-full w-full absolute flex top-0 left-0 rounded-lg hidden modal2">
                    <form action="./modifyItinerary" class="w-1/2 h-full bg-redOnline rounded-l-lg flex justify-center items-center" method="post">
                        <input type="hidden" name="startingPointToTransfert" value="<?= $transfert[$i]['starting_point'] ?>">
                        <input type="hidden" name="endPointToTransfert" value="<?= $transfert[$i]['end_point'] ?>">
                        <input type="hidden" name="hourStartToTransfert" value="<?= $transfert[$i]['hourStart'] ?>">
                        <input type="hidden" name="dateToTransfert" value="<?= $transfert[$i]['date_traject'] ?>">
                        <input type="hidden" name="step1ToTransfert" value="<?= $transfert[$i]['step1'] ?>">
                        <input type="hidden" name="step2ToTransfert" value="<?= $transfert[$i]['step2'] ?>">
                        <input type="hidden" name="step3ToTransfert" value="<?= $transfert[$i]['step3'] ?>">
                        <input type="hidden" name="tttToTransfert" value="<?= $transfert[$i]['timeTotravel'] ?>">
                        <input type="hidden" name="numberPlaceToTransfert" value="<?= $transfert[$i]['numberplace_traject'] ?>">
                        <input type="hidden" name="placeRestToTransfert" value="<?= $transfert[$i]['placeRest'] ?>">
                        <input type="hidden" name="type_TrajectToTransfert" value="<?= $transfert[$i]['type_traject'] ?>">
                        <input type="hidden" name="idToTransfert" value="<?= $transfert[$i]['id_traject']?>">
                        <input type="submit" value="editer" name="action" class="font-bungee text-white text-xl">
                    </form>
                    <form action="./deleteItinerary" class="w-1/2 h-full bg-black rounded-r-lg flex justify-center items-center" method="post">
                        <input type="hidden" name="idToTransfert" value="<?= $transfert[$i]['id_traject']?>">
                        <input type="submit" value="supprimer" name="action" class="font-bungee text-white text-xl">
                    </form>
                </div>
            </div>
        <?php }
    }else{ ?><p class="font-epilogue font-bold text-lg">Pas de trajets crée</p><?php }?>
</main>
<?php 
$title = 'Mes Trajets';
$myItinerary = ob_get_clean();
require(__DIR__.'../../template.php'); ?>

<!-- ajouté des input cachés pour transférer : day, months , starting point , end point  -->