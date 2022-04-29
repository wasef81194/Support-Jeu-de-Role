

var select = document.getElementById('personnage_classe');

const onChangeSelect = (event) =>{
    event.preventDefault();

    const url = this.Option;

    axios.get(url).then(function(response) {
        console.log(response)
    })
}

//select.addEventListener('change',onChangeSelect);