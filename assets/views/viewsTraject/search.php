<?php ob_start();
// echo $_SESSION['id_user'].' '.$_SESSION['username_user'];
?>
<div class="w-4/5 p-2 flex">
    <h2 class="font-bungee">Rechercher un trajet</h2>
</div>
<form action="./resultSearch" method="post" id="searchItinerary" class="w-5/6 flex flex-col gap-3 justify-center items-center">
    <div class="bg-xtraLightGrey w-full flex rounded-lg min-h-14 relative" id="autoSearch">
        <div class="p-3 w-1/5 flex justify-center items-center">
            <img src="./assets/img/pinPoint.png" alt="Cible d'un lieu">
        </div>
        <input type="text" name="startingPointSearch" id="startingPointSearch" placeholder="Départ" class="bg-xtraLightGrey w-4/5 font-epilogue font-medium text-base">
    </div>
    <div class="bg-xtraLightGrey w-full flex rounded-lg h-14">
        <div class="p-3 w-1/5 flex justify-center items-center">
            <img src="./assets/img/pinPoint.png" alt="Cible d'un lieu">
        </div>
        <select name="arrivalPointSearch" id="arrivalPointSearch" class="w-4/5 bg-xtraLightGrey">
            <option value="46.6709261,5.5631747">13b Avenue du Stade Municipal, 39000 Lons-le-Saunier</option>
            <option value="46.668589,5.553935">2 Rte de Montaigu, 39000 Lons-le-Saunier</option>
        </select>
    </div>
    <div class="w-full h-14 bg-xtraLightGrey" id="blocDateSearch">
        <div id="firstRow" class="w-full h-full flex justify-start items-center">
            <div class="w-1/5 flex justify-center items-center">
                <img src="./assets/img/calendar.png" alt="logo de calendrier">
            </div>
            <p class="w-4/5">Aujourd'hui</p>
        </div>
        <input type="date" name="dateSearch" id="dateSearch" class="bg-xtraLightGrey w-full h-14 hidden" required value="<?= date('Y-m-d');?>">
    </div>
    <input type="submit" name="action" value="RECHERCHER" class="tracking-5px font-workSans p-3 w-4/5 bg-redOnline rounded-lg text-white">
</form>
<?php 
$title='Rechercher';
$search=ob_get_clean();
require(__DIR__.'../../template.php');
?>