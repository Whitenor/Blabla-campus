if (filenameToCheck.includes(filename)) {
    let searching = new SearchItinerary();
    searching.blockSearchSwitchChange();
    searching.blockSearchSwitchClick();
}
if (filename != "") {
    fetchTextHeader();
    switch (filename) {
        case "searchItinerary":
            autocomplete('#startingPointSearch');
            break;
        case "register":
            profilePictureRegister.addEventListener('change', function(e){
                fileChecker(e , profilePictureRegisterLabel);
            })
            break;
        case "editAccount":
            profilePictureEditAccount.addEventListener('change', function(e){
                fileChecker(e, profilePictureEditAccountLabel);
                })
            break;
        case "newItinerary":
            switchCheckboxCreateItinerary(checkboxForth, checkboxBackAndForth);
            switchCheckboxCreateItinerary(checkboxBackAndForth, checkboxForth);
            step1Adding.addEventListener("click", function(){
                if (step1New.value !=="") {
                    newStepItinerary();
                }
            });
            autocomplete('#createItineraryDepart');
            autocomplete('#step1New');
            hiddingSubmitButton('#step1New');
            itineraryFinalCreate.addEventListener('change',function () {
                if(itineraryFinalCreate.value !=="") {
                    addNewItinerary.classList.remove("hidden");
                }else{addNewItinerary.classList.add("hidden");}
                calculTimeTravel('#LatLoncreateItineraryDepart');
            })
            break;
        case "myItinerary":
            for (let i = 0; i < cardTraject.length; i++) {
                cardTraject[i].addEventListener("click", function(){
                    modalMyItinerary(i);
                });
            };
            break;
        case "myReservations":
            for (let i = 0; i < cardReservation.length; i++) {
                cardReservation[i].addEventListener("click", function(){
                    modalMyReservation(i);
                });
            };
            break;
        case "confirmation":
            switch(fileReferrer){
                case "login":
                    redirectTimed("/searchItinerary");
                    break;
                case "register":
                    redirectTimed("/searchItinerary");
                    break;
                case "changeItinerary":
                    redirectTimed("/myItinerary");
                    break;
                case "reservation":
                    redirectTimed("/searchItinerary");
                    break;
                case "validation":
                    redirectTimed("/searchItinerary");
                    break;
                case "deleteItinerary":
                    redirectTimed("/myItinerary");
                    break;
                case "reservationCancel":
                    redirectTimed("/myReservations");
                    break;
                case "editAccount":
                    redirectTimed("/searchItinerary");
                    break;
            }
            break;
        case "modifyItinerary":
            switchCheckboxCreateItinerary(checkboxForth, checkboxBackAndForth);
            switchCheckboxCreateItinerary(checkboxBackAndForth, checkboxForth);
            forceFetch(modifyItineraryDepart ,LatLonmodifyItineraryDepart);
            if ( step1Adding !== null && step1Adding.value != ""){
                forceFetch(step1Adding, LatLonstep1modify);
            }
            if ( step2Adding !== null && step2Adding.value != ""){
                forceFetch(step2Adding, LatLonstep2modify);
            }
            if ( step3Adding !== null && step3Adding.value != ""){
                forceFetch(step3Adding, LatLonstep3modify);
            }
            if (document.querySelector('#step2Adding') == null) {
                console.log('test');
                document.querySelector('#step1AddingStep').addEventListener("click", function(){
                    if (modifystep1Adding.value !=="") {
                        modifyStepItinerary();
                    }
                });
            }else{
                document.querySelector('#step2Adding').addEventListener('click', function(){
                    if(document.querySelector('#step2New').value !==""){
                        document.querySelector('#step2Adding').classList.add('hidden');
                        for (let i = 0; i < rowStep3.length; i++) {
                            createElement(rowStep3[i].type, rowStep3[i].ID, rowStep3[i].location, rowStep3[i].class, rowStep3[i].inputType, rowStep3[i].placeholder,rowStep3[i].src, rowStep3[i].alt,rowStep3[i].name)
                        }
                        autocomplete('#modifystep3Adding');
                    }
                })
            }
            autocomplete('#modifyItineraryDepart');
            autocomplete('#modifystep1Adding');
            break;
        default:
            break;
    }
}
