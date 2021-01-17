const buttonAuginti = document.querySelector('.auginti');
const buttonAugintiP = document.querySelector('.augintiP');
const buttonAugintiM = document.querySelector('.augintiM');
const buttonAugintiV = document.querySelector('.augintiV');
const listAuginimas = document.querySelector('#listAuginimas');
const listAuginimasP = document.querySelector('#listAuginimasP');
const listAuginimasM = document.querySelector('#listAuginimasM');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrlA, {
            listAuginimas: 1,
        })
        .then(function(response) {
            listAuginimas.innerHTML = response.data.listAuginimas;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
            errorMsg.innerHTML = error.response.data.msg;
        });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrlA, {
            listAuginimasM: 1,
        })
        .then(function(response) {
            listAuginimasM.innerHTML = response.data.listAuginimasM;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
            errorMsg.innerHTML = error.response.data.msg;
        });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrlA, {
            listAuginimasP: 1,
        })
        .then(function(response) {
            listAuginimasP.innerHTML = response.data.listAuginimasP;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
            errorMsg.innerHTML = error.response.data.msg;
        });

});


//agurku auginimas
buttonAuginti.addEventListener('click', () => {
    axios.post(apiUrlA, {
        'auginti': 1
    })
        .then(function (response) {
            listAuginimas.innerHTML = response.data.listAuginimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

//pomidoru auginimas
buttonAugintiP.addEventListener('click', () => {
    axios.post(apiUrlA, {
        'augintiP': 1
    })
        .then(function (response) {
            listAuginimasP.innerHTML = response.data.listAuginimasP;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

//moliugu auginimas
buttonAugintiM.addEventListener('click', () => {
    axios.post(apiUrlA, {
        'augintiM': 1
    })
        .then(function (response) {
            listAuginimasM.innerHTML = response.data.listAuginimasM;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
