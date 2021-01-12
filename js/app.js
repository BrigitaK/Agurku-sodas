
const buttonSodinti = document.querySelector('[name="sodinti"]');
const buttonSodintiM = document.querySelector('[name="sodintiM"]');
const buttonSodintiP = document.querySelector('[name="sodintiP"]');
const buttonSodintiV = document.querySelector('[name="sodintiV"]');
const buttonIsrauti = document.querySelector('.btn-israuti');

buttonSodinti.addEventListener('click', () =>{
    const agurkas = document.querySelector("#sodinti");
    

    axios.post(apiUrl, {
        input: agurkas,
    })
    .then(function(response) {
        console.log(response);
    })
    .catch(function(error) {
        console.log(error);
    });

    console.log(agurkas);
})
