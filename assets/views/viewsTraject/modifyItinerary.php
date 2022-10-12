<?php ob_start();
session_start(); ?>
<main class="w-5/6 py-2">
    <h2 class="font-bungee">Proposer un trajet</h2>
    <form action="./searchItinerary" method="post" class="w-full flex flex-col items-start justify-start gap-3">
        <label for="modifyItineraryDepart" class="text-lightGrey font-epilogue font-medium text-xs">D'où partez vous?</label>
        <div class="flex w-full gap-2 p-2 bg-xtraLightGrey rounded-lg relative" id="startingPointCreating">
            <img src="../assets/img/pinPoint.png" alt="Logo pour le départ">
            <input type="text" name="modifyItineraryDepart" id="modifyItineraryDepart" placeholder="Départ" required class="bg-transparent placeholder:text-black w-full" autocomplete="off" value="<?= $_POST['startingPointToTransfert'] ?>">
            <input type="hidden" name="LatLonmodifyItineraryDepart" value="" id="LatLonmodifyItineraryDepart">
        </div>
        <div class="w-full toChange">
            <label for="departureTime" class="text-lightGrey font-epilogue font-medium text-xs">A quelle heure partez-vous ?</label>
            <div class="flex w-full justify-start items-center bg-xtraLightGrey rounded-lg p-2 gap-2">
                <img src="../assets/img/clock.png" alt="Logo Horloge">
                <input type="time" name="departureTime" id="departureTime" required class="bg-xtraLightGrey w-full" value="<?= $_POST['hourStartToTransfert'] ?>">
            </div>
            <label for="itineraryFinalCreate" class="text-lightGrey font-epilogue font-medium text-xs">Pour aller où?</label>
            <div class="flex w-full justify-start items-center gap-2 bg-xtraLightGrey p-2">
                <img src="../assets/img/pinPoint.png" alt="Localisation du point d'arrivée">
                <select name="itineraryFinalCreate" id="itineraryFinalCreate" class="box-border w-full bg-transparent" required>
                    <option value="46.668589,5.553935" <?php if($_POST['endPointToTransfert'] == '46.668589,5.553935'){ echo 'selected';}?>>2 Route De Montaigu, 39000 Lons-le-Saunier, France</option>
                    <option value="46.6709261,5.5631747" <?php if($_POST['endPointToTransfert'] == '46.6709261,5.5631747'){ echo 'selected';}?>>13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
                </select>
            </div>
            <label for="dateDepart" class="text-lightGrey font-epilogue font-medium text-xs">Quand partez-vous ?</label>
            <div class="w-full bg-xtraLightGrey rounded-lg p-2" id="blocDateSearch">
                <div id="firstRow" class="w-full h-full flex justify-start items-center gap-2">
                    <div class="flex justify-center items-center">
                        <img src="../assets/img/calendar.png" alt="logo de calendrier">
                    </div>
                    <p><?= $_POST['dateToTransfert'] ?></p>
                </div>
                <input type="date" name="dateDepart" id="dateSearch" class="bg-xtraLightGrey w-full h-14 hidden rounded-lg" value="<?= $_POST['dateToTransfert'] ?>">
            </div>
            <p class="text-lightGrey font-epilogue font-medium text-xs">Type de trajet :</p>
            <fieldset class="flex flex-row-reverse w-full justify-end items-center gap-6" id="typeOfTraject">
                <div class="flex flex-row-reverse justify-start items-center gap-2">
                    <label for="backForth" class="font-epilogue text-sm">Allez / retour</label>
                    <input type="checkbox" name="typeTrajetTest" id="backForth" value="1" <?php if($_POST['type_TrajectToTransfert'] == 1){echo 'checked';} ?>>
                </div>
                <div class="flex flex-row-reverse justify-start items-center gap-2">
                    <label for="forthOnly" class="font-epilogue text-sm">Allez simple</label>
                    <input type="checkbox" name="typeTrajetTest" id="forthOnly" value="0" <?php if($_POST['type_TrajectToTransfert'] == 0){echo 'checked';} ?>>
                </div>
            </fieldset>
            <label for="placesNumber" class="text-lightGrey font-epilogue font-medium text-xs">Nombre de places disponibles</label>
            <div class="flex justify-start items-center gap-2 w-full bg-xtraLightGrey p-2">
                <img src="./assets/img/group.png" alt="logo de groupes pour les places disponibles">
                <input type="number" name="placesNumber" id="placesNumber" min="1" placeholder="Places disponibles" class="bg-transparent w-full" value="<?= $_POST['numberPlaceToTransfert'] ?>">
            </div>
            <label for="" class="text-lightGrey font-epilogue font-medium text-xs">Étapes éventuelles</label>
            <div class="flex w-full flex-col gap-2" id="allStepModifyItinerary">
                <div class="flex w-full" id="rowStep1">
                    <div id="step1" class="flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative">
                        <img src="../assets/img/pinPoint.png" alt="point pour les étapes">
                        <input type="text" name="modifystep1Adding" id="modifystep1Adding" placeholder="Etape" class="bg-transparent" autocomplete="off" value="<?php if($_POST['step1ToTransfert'] !=""){ echo $_POST['step1ToTransfert']; } ?>">
                        <input type="hidden" name="LatLonmodifystep1Adding" value="" id="LatLonmodifystep1Adding">
                    </div>
                    <?php if($_POST['step1ToTransfert'] ==""){ ?>
                    <div id="addStep" class="w-1/6 flex justify-center items-center">
                        <img src="../assets/img/plus.png" alt="Ajout d'une étape" id="step1AddingStep">
                    </div>
                    <?php } ?>
                </div>
                <?php if($_POST['step1ToTransfert'] !=""){ ?>
                    <div class="flex w-full" id="rowStep2">
                        <div id="step1" class="flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative">
                            <img src="../assets/img/pinPoint.png" alt="point pour les étapes">
                            <input type="text" name="modifystep2Adding" id="modifystep2Adding" placeholder="Etape" class="bg-transparent" autocomplete="off" value="<?php if($_POST['step2ToTransfert'] !=""){ echo $_POST['step2ToTransfert']; } ?>">
                            <input type="hidden" name="LatLonmodifystep2Adding" value="" id="LatLonmodifystep2Adding">
                        </div>
                        <?php if($_POST['step2ToTransfert'] ==""){ ?>
                        <div id="addStep2" class="w-1/6 flex justify-center items-center">
                            <img src="../assets/img/plus.png" alt="Ajout d'une étape" id="step2AddingStep">
                        </div>
                        <?php } ?>
                    </div>
                <?php }
                if($_POST['step2ToTransfert'] !=""){ ?>
                    <div class="flex w-full" id="rowStep3">
                        <div id="step1" class="flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative">
                            <img src="../assets/img/pinPoint.png" alt="point pour les étapes">
                            <input type="text" name="modifystep3Adding" id="modifystep3Adding" placeholder="Etape" class="bg-transparent" autocomplete="off" value="<?php if($_POST['step3ToTransfert'] !=""){ echo $_POST['step3ToTransfert']; } ?>">
                            <input type="hidden" name="LatLonmodifystep3Adding" value="" id="LatLonmodifystep3Adding">
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="flex justify-center items-center w-full p-3">
                <input type="hidden" name="timeToTravel" id="inputTimeToTravel" value="<?= $_POST['tttToTransfert'] ?>">
                <input type="submit" name="action" value="Proposer un trajet" class="w-full font-workSans tracking-5px uppercase text-sm bg-redOnline text-white p-5 rounded-lg">
            </div>
        </div>
    </form>
</main>
<?php 
$title = "Modifier l'Itinéraire";
$modifyItinerary = ob_get_clean();
require(__DIR__.'../../template.php'); ?>