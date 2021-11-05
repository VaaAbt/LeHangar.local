const search = document.getElementsByClassName('search-input')[0];
const listProds = Array.from(document.getElementsByClassName('product'));

search.addEventListener('input', () => {
    if(search.value !== ""){
        let text = search.value.toLowerCase();
        listProds.forEach(elem => {
           let name = elem.getElementsByClassName('product-title')[0].innerHTML;
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

function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}

function decrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1){
        value--;
    }
    document.getElementById('number').value = value;
}