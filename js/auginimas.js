const buttonAuginti = document.querySelector('.auginti');
const buttonAugintiP = document.querySelector('.augintiP');
const buttonAugintiM = document.querySelector('.augintiM');
const buttonAugintiV = document.querySelector('.augintiV');
const listAuginimas = document.querySelector('#listAuginimas');
const listAuginimasP = document.querySelector('#listAuginimasP');
const listAuginimasM = document.querySelector('#listAuginimasM');
const listAuginimasV = document.querySelector('#listAuginimasV');
const errorMsg = document.querySelector('#error');


// document.addEventListener('DOMContentLoaded', () => {
//     axios.post(apiUrlA+'/listAuginimasV', {
//         })
//         .then(function(response) {
//             listAuginimasV.innerHTML = response.data.listAuginimasV;
//             errorMsg.innerHTML = '';
//         })
//         .catch(function(error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });

// });

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrlA+'/listAuginimas', {
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
    axios.post(apiUrlA+'/listAuginimasM', {
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
    axios.post(apiUrlA+'/listAuginimasP', {
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
    axios.post(apiUrlA+'/auginti', {
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
    axios.post(apiUrlA+'/augintiP', {
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
    axios.post(apiUrlA+'/augintiM', {
    })
        .then(function (response) {
            listAuginimasM.innerHTML = response.data.listAuginimasM;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonAugintiV.addEventListener('click', () => {
    axios.post(apiUrlA+'/augintiV', {
    })
        .then(function (response) {
            listAuginimasV.innerHTML = response.data.listAuginimasV;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
