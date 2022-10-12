<?php ob_start();
session_start(); ?>
<main class="w-5/6 py-2">
    <h2 class="font-bungee">Proposer un trajet</h2>
    <form action="./searchItinerary" method="post" class="w-full flex flex-col items-start justify-start gap-3">
        <label for="createItineraryDepart" class="text-lightGrey font-epilogue font-medium text-xs">D'où partez vous?</label>
        <div class="flex w-full gap-2 p-2 bg-xtraLightGrey rounded-lg relative" id="startingPointCreating">
            <img src="../assets/img/pinPoint.png" alt="Logo pour le départ">
            <input type="text" name="createItineraryDepart" id="createItineraryDepart" placeholder="Départ" required class="bg-transparent placeholder:text-black w-full" autocomplete="off">
            <input type="hidden" name="LatLoncreateItineraryDepart" value="" id="LatLoncreateItineraryDepart">
        </div>
        <div class="w-full toChange hidden">
            <label for="departureTime" class="text-lightGrey font-epilogue font-medium text-xs">A quelle heure partez-vous ?</label>
            <div class="flex w-full justify-start items-center bg-xtraLightGrey rounded-lg p-2 gap-2">
                <img src="../assets/img/clock.png" alt="Logo Horloge">
                <input type="time" name="departureTime" id="departureTime" required class="bg-xtraLightGrey w-full" value="<?= date('H:i:s') ?>">
            </div>
            <label for="itineraryFinalCreate" class="text-lightGrey font-epilogue font-medium text-xs">Pour aller où?</label>
            <div class="flex w-full justify-start items-center gap-2 bg-xtraLightGrey p-2">
                <img src="../assets/img/pinPoint.png" alt="Localisation du point d'arrivée">
                <select name="itineraryFinalCreate" id="itineraryFinalCreate" class="box-border w-full bg-transparent" required>
                    <option value="">Arrivée</option>
                    <option value="46.668589,5.553935">2 Route De Montaigu, 39000 Lons-le-Saunier, France</option>
                    <option value="46.6709261,5.5631747">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
                </select>
            </div>
            <label for="dateDepart" class="text-lightGrey font-epilogue font-medium text-xs">Quand partez-vous ?</label>
            <div class="w-full bg-xtraLightGrey rounded-lg p-2" id="blocDateSearch">
                <div id="firstRow" class="w-full h-full flex justify-start items-center gap-2">
                    <div class="flex justify-center items-center">
                        <img src="../assets/img/calendar.png" alt="logo de calendrier">
                    </div>
                    <p>Aujourd'hui</p>
                </div>
                <input type="date" name="dateDepart" id="dateSearch" class="bg-xtraLightGrey w-full h-14 hidden rounded-lg" value="<?= date('Y-m-d')?>">
            </div>
            <p class="text-lightGrey font-epilogue font-medium text-xs">Type de trajet :</p>
            <fieldset class="flex flex-row-reverse w-full justify-end items-center gap-6" id="typeOfTraject">
                <div class="flex flex-row-reverse justify-start items-center gap-2">
                    <label for="backForth" class="font-epilogue text-sm">Allez / retour</label>
                    <input type="checkbox" name="typeTrajetTest" id="backForth" value="1">
                </div>
                <div class="flex flex-row-reverse justify-start items-center gap-2">
                    <label for="forthOnly" class="font-epilogue text-sm">Allez simple</label>
                    <input type="checkbox" name="typeTrajetTest" id="forthOnly" value="0" checked>
                </div>
            </fieldset>
            <label for="placesNumber" class="text-lightGrey font-epilogue font-medium text-xs">Nombre de places disponibles</label>
            <div class="flex justify-start items-center gap-2 w-full bg-xtraLightGrey p-2">
                <img src="./assets/img/group.png" alt="logo de groupes pour les places disponibles">
                <input type="number" name="placesNumber" id="placesNumber" min="1" placeholder="Places disponibles" class="bg-transparent w-full" value="1">
            </div>
            <label for="" class="text-lightGrey font-epilogue font-medium text-xs">Étapes éventuelles</label>
            <div class="flex w-full flex-col gap-2" id="allStepCreateItinerary">
                <div class="flex w-full" id="rowStep1">
                    <div id="step1" class="flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative">
                        <img src="../assets/img/pinPoint.png" alt="point pour les étapes">
                        <input type="text" name="step1Adding" id="step1New" placeholder="Etape" class="bg-transparent" autocomplete="off">
                        <input type="hidden" name="LatLonstep1New" value="" id="LatLonstep1New">
                    </div>
                    <div id="addStep" class="w-1/6 flex justify-center items-center">
                        <img src="../assets/img/plus.png" alt="Ajout d'une étape" id="step1Adding">
                    </div>
                </div>
            </div>
            <div class="flex justify-center items-center w-full p-3">
                <input type="hidden" name="timeToTravel" id="inputTimeToTravel">
                <input type="submit" name="action" value="Proposer un trajet" class="w-full font-workSans tracking-5px uppercase text-sm bg-redOnline text-white p-5 rounded-lg hidden">
            </div>
        </div>
    </form>
</main>
<?php 
$title = "Nouvel Itinéraire";
$newItinerary = ob_get_clean();
require(__DIR__.'../../template.php'); ?>