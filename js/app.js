const buttonSodinti = document.querySelector('.sodinti #sodintiA');
const buttonSodintiM = document.querySelector('[name="sodintiM"]');
const buttonSodintiP = document.querySelector('[name="sodintiP"]');
const buttonSodintiV = document.querySelector('[name="sodintiV"]');
const buttonIsrauti = document.querySelector('.btn-israuti');
const list = document.querySelector('#list');
const moliugo = document.querySelector('#moliugo');
const listP = document.querySelector('#listP');
const errorMsg = document.querySelector('#error');

buttonSodinti.addEventListener('click', () =>{
    const count = document.querySelector('[name=kiekis]').value;
    

    axios.post(apiUrl, {
        kiekis: count,
        sodintiA:1
    })
    .then(function(response) {
        list.innerHTML = response.data.list;
        errorMsg.innerHTML = '';
    })
    .catch(function(error) {
        errorMsg.innerHTML = error.response.data.msg;
    });

    
});

buttonSodintiM.addEventListener('click', () =>{
    const count1 = document.querySelector('[name=kiekisM]').value;
    

    axios.post(apiUrl, {
        kiekis: count1,
        sodintiM:1
    })
    .then(function(response) {
        moliugo.innerHTML = response.data.moliugo;
    })
});

buttonSodintiP.addEventListener('click', () =>{
    const count2 = document.querySelector('[name=kiekisP]').value;
    

    axios.post(apiUrl, {
        kiekis: count2,
        sodintiP:1
    })
    .then(function(response) {
        listP.innerHTML = response.data.listP;
    })
});


