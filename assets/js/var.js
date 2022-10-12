let test;


let url = window.location.pathname;
let filename = url.split('/').pop();
let referrerUrl = document.referrer;
let fileReferrer = referrerUrl.split('/').pop();
let changingZone = document.querySelector('#changingZone');
let textToChangeConfirmation = document.querySelector('#textToChangeConfirmation');
let dateSearch = document.querySelector('#dateSearch');
let blockSearch = document.querySelector('#blocDateSearch');
let FirstRowInBlockSearch = document.querySelector('#blocDateSearch > #firstRow');
let PInBlocDateSearch = document.querySelector('#blocDateSearch > #firstRow > p');
let checkboxForth = document.querySelector('#forthOnly');
let checkboxBackAndForth = document.querySelector('#backForth');
let step1Adding = document.querySelector('#step1Adding');
let step2Adding = document.querySelector('#step2Adding');
let step3Adding = document.querySelector('#step3Adding');
let modifystep1Adding = document.querySelector('#modifystep1Adding');
let modifystep2Adding = document.querySelector('#modifystep2Adding');
let modifystep3Adding = document.querySelector('#modifystep3Adding');
let step1AddingStep = document.querySelector('#step1AddingStep');
let step2AddingStep = document.querySelector('#step2AddingStep');
let step3AddingStep = document.querySelector('#step3AddingStep');
let rowStep1 = document.querySelector('#rowStep1');
let step1New = document.querySelector('#step1New');
let cardTraject = document.querySelectorAll('.cardTraject');
let modalTraject = document.querySelectorAll('.modalTraject');
let mainMyItinerary = document.querySelector('.mainMyItinerary');
let cardReservation = document.querySelectorAll('.cardReservation');
let modalReservations = document.querySelectorAll('.modalReservations');
let itineraryFinalCreate = document.querySelector('#itineraryFinalCreate');
let baseUrlSplit = referrerUrl.split('/');
baseUrlSplit.pop();
let baseUrl = baseUrlSplit.join('/');
let profilePictureRegister = document.querySelector('#profilePictureRegister');
let profilePictureRegisterLabel = document.querySelector('#profilePictureRegisterLabel');
let addNewItinerary = document.querySelector('input[value="Proposer un trajet"');
let LatLonstep1 = document.querySelector('#LatLonstep1New');
let LatLonstep2 = document.querySelector('#LatLonstep2New');
let LatLonstep3 = document.querySelector('#LatLonstep3New');
let LatLonstep1modify = document.querySelector('#LatLonstep1modify');
let LatLonstep2modify = document.querySelector('#LatLonstep2modify');
let LatLonstep3modify = document.querySelector('#LatLonstep3modify');
let inputTimeToTravel = document.querySelector('#inputTimeToTravel');
let profilePictureEditAccount= document.querySelector('#profilePictureEditAccount');
let profilePictureEditAccountLabel= document.querySelector('#profilePictureEditAccountLabel');
let modifyItineraryDepart = document.querySelector('#modifyItineraryDepart');
let LatLonmodifyItineraryDepart = document.querySelector('#LatLonmodifyItineraryDepart');

const filenameToCheck = ['searchItinerary','newItinerary', 'modifyItinerary']
const rowStep2 = [
    {"type":"div","ID":"rowStep2", "location":"allStepCreateItinerary","class":"flex w-full","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"div","ID":"step2", "location":"rowStep2","class":"flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"", "location":"step2","class":"","inputType":"","placeholder":"","src":"../assets/img/pinPoint.png","alt":"point pour les étapes","name":""},
    {"type":"input","ID":"step2New", "location":"step2","class":"bg-transparent","inputType":"text","placeholder":"Etape","src":"","alt":"","name":"step2Adding"},
    {"type":"input","ID":"LatLonstep2New", "location":"step2","class":"","inputType":"hidden","placeholder":"","src":"","alt":"","name":"LatLonstep2New"},
    {"type":"div","ID":"addStep2", "location":"rowStep2","class":"w-1/6 flex justify-center items-center","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"step2Adding", "location":"addStep2","class":"","inputType":"","placeholder":"","src":"../assets/img/plus.png","alt":"Ajout d'une étape","name":""}
]
const rowStep2Modify = [
    {"type":"div","ID":"rowStep2", "location":"allStepModifyItinerary","class":"flex w-full","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"div","ID":"step2", "location":"rowStep2","class":"flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"", "location":"step2","class":"","inputType":"","placeholder":"","src":"../assets/img/pinPoint.png","alt":"point pour les étapes","name":""},
    {"type":"input","ID":"modifystep2Adding", "location":"step2","class":"bg-transparent","inputType":"text","placeholder":"Etape","src":"","alt":"","name":"modifystep2Adding"},
    {"type":"input","ID":"LatLonmodifystep2Adding", "location":"step2","class":"","inputType":"hidden","placeholder":"","src":"","alt":"","name":"LatLonmodifystep2Adding"},
    {"type":"div","ID":"addStep2", "location":"rowStep2","class":"w-1/6 flex justify-center items-center","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"step2AddingStep", "location":"addStep2","class":"","inputType":"","placeholder":"","src":"../assets/img/plus.png","alt":"Ajout d'une étape","name":""}
]
const rowStep3 = [
    {"type":"div","ID":"rowStep3", "location":"allStepCreateItinerary","class":"flex w-full","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"div","ID":"step3", "location":"rowStep3","class":"flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"", "location":"step3","class":"","inputType":"","placeholder":"","src":"../assets/img/pinPoint.png","alt":"point pour les étapes","name":""},
    {"type":"input","ID":"step3New", "location":"step3","class":"bg-transparent","inputType":"text","placeholder":"Etape","src":"","alt":"","name":"step3Adding"},
    {"type":"input","ID":"LatLonstep3New", "location":"step3","class":"","inputType":"hidden","placeholder":"","src":"","alt":"","name":"LatLonstep3New"},
]
const rowStep3modify = [
    {"type":"div","ID":"rowStep3", "location":"allStepCreateItinerary","class":"flex w-full","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"div","ID":"step3", "location":"rowStep3","class":"flex w-5/6 justify-start items-center gap-2 bg-xtraLightGrey p-2 rounded-lg relative","inputType":"","placeholder":"","src":"","alt":"","name":""},
    {"type":"img","ID":"", "location":"step3","class":"","inputType":"","placeholder":"","src":"../assets/img/pinPoint.png","alt":"point pour les étapes","name":""},
    {"type":"input","ID":"modifystep3Adding", "location":"step3","class":"bg-transparent","inputType":"text","placeholder":"Etape","src":"","alt":"","name":"modifystep3Adding"},
    {"type":"input","ID":"LatLonmodifystep2Adding", "location":"step3","class":"","inputType":"hidden","placeholder":"","src":"","alt":"","name":"LatLon-modifystpe3Adding"},
]