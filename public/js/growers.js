const search = document.getElementsByClassName('search-input')[0];
const listProds = Array.from(document.getElementsByClassName('grower'));

search.addEventListener('input', () => {
    if(search.value !== ""){
        let text = search.value.toLowerCase();
        listProds.forEach(elem => {
           let name = elem.getElementsByClassName('grower-name')[0].innerHTML;
           name = name.toLowerCase();

           if(!name.includes(text)){
               elem.classList.add('hide');
           } else {
               elem.classList.remove('hide');
           }
        });
    } else {
        listProds.forEach(elem => {
            elem.classList.remove('hide');
        })
    }
});