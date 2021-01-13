console.log(labas);
const buttonSodinti = document.querySelector('[name="sodinti"]');
const buttonSodintiM = document.querySelector('[name="sodintiM"]');
const buttonSodintiP = document.querySelector('[name="sodintiP"]');
const buttonSodintiV = document.querySelector('[name="sodintiV"]');
const buttonIsrauti = document.querySelector('.btn-israuti');
const sodinti = document.querySelector('#sodinti');
buttonSodinti.addEventListener('click', () =>{
    const info = document.querySelector('[]');
    

    axios.post(apiUrl, {
        input: agurkas,
    })
    .then(function(response) {
        console.log(response);
    })
    .catch(function(error) {
        console.log(error);
    });

    
})
