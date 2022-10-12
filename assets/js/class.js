function SearchItinerary()  {
    this.blockSearchSwitchClick= function(){
        blockSearch.addEventListener('click', function(){
            FirstRowInBlockSearch.classList.add('hidden');
            dateSearch.classList.remove('hidden');
        })
    },
    this.blockSearchSwitchChange= function(){
        document.querySelector('#dateSearch').addEventListener('change', function(){
            FirstRowInBlockSearch.classList.remove('hidden');
            dateSearch.classList.add('hidden');
            PInBlocDateSearch.textContent = document.querySelector('#dateSearch').value
        });
    }
}