const buttonSodinti = document.querySelector('.sodinti #sodintiA');
const buttonSodintiM = document.querySelector('[name="sodintiM"]');
const buttonSodintiP = document.querySelector('[name="sodintiP"]');
const buttonSodintiV = document.querySelector('[name="sodintiV"]');
const buttonAuginti = document.querySelector('[name="auginti"]');
const buttonIsrauti = document.querySelector('.btn-israuti');
const list = document.querySelector('#list');
const listM = document.querySelector('#listM');
const listP = document.querySelector('#listP');
const listV = document.querySelector('#listV');
const listAuginimas = document.querySelector('#listAuginimas');
const listAuginimasP = document.querySelector('#listAuginimasP');
const listAuginimasM = document.querySelector('#listAuginimasM');
const errorMsg = document.querySelector('#error');

const addNewList = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    agurkai.forEach(agurkas => {
        agurkas.querySelector('[type=button]').addEventListener('click', () => {
            const id = agurkas.querySelector('[name=rauti]').value;
            axios.post(apiUrl, {
                    id: id,
                    rauti: 1
                })
                .then(function(response) {
                    list.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewList();
                })
                .catch(function(error) {
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
};
const addNewListP = () => {
    const pomidorai = document.querySelectorAll('.pomidoras');
    pomidorai.forEach(pomidoras => {
        pomidoras.querySelector('[type=button]').addEventListener('click', () => {
            const id = pomidoras.querySelector('[name=rautiP]').value;
            axios.post(apiUrl, {
                    id: id,
                    rautiP: 1
                })
                .then(function(response) {
                    listP.innerHTML = response.data.listP;
                    errorMsg.innerHTML = '';
                    addNewListP();
                })
                .catch(function(error) {
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
};

const addNewListM = () => {
    const moliugai = document.querySelectorAll('.moliugas');
    moliugai.forEach(moliugas => {
        moliugas.querySelector('[type=button]').addEventListener('click', () => {
            const id = moliugas.querySelector('[name=rautiM]').value;
            axios.post(apiUrl, {
                    id: id,
                    rautiM: 1
                })
                .then(function(response) {
                    listM.innerHTML = response.data.listM;
                    errorMsg.innerHTML = '';
                    addNewListM();
                })
                .catch(function(error) {
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
            list: 1,
        })
        .then(function(response) {
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';

            //agurku klases nodai, is naujo pasetint mygtuko trynimo eventus
            //raunam agurka
            addNewList();
        })
        .catch(function(error) {
            errorMsg.innerHTML = error.response.data.msg;
        });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
            listP: 1,
        })
        .then(function(response) {
            listP.innerHTML = response.data.listP;
            errorMsg.innerHTML = '';
            addNewListP();
        })
        .catch(function(error) {
            errorMsg.innerHTML = error.response.data.msg;
        });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl, {
            listM: 1,
        })
        .then(function(response) {
            listM.innerHTML = response.data.listM;
            errorMsg.innerHTML = '';
            addNewListM();
        })
        .catch(function(error) {
            errorMsg.innerHTML = error.response.data.msg;
        });

});

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


// //agurku auginimas
// buttonAuginti.addEventListener('click', () =>{
//     const count5 = document.querySelector('[name=kiekis]').value;
    

//     axios.post(apiUrlA, {
//         kiekis: count5,
//         auginti:1
//     })
//     .then(function(response) {
//         listAuginimas.innerHTML = response.data.listAuginimas;
//         errorMsg.innerHTML = '';
//     })
//     .catch(function(error) {
//         errorMsg.innerHTML = error.response.data.msg;
//     });

    
// });
//agurku sodinimas
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
//moliugu sodinimas
buttonSodintiM.addEventListener('click', () =>{
    const count1 = document.querySelector('[name=kiekisM]').value;
    

    axios.post(apiUrl, {
        kiekis: count1,
        sodintiM:1
    })
    .then(function(response) {
        listM.innerHTML = response.data.listM;
    })
});
//pomidoru sodinimas
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
//visu darzoviu sodinimas
buttonSodintiV.addEventListener('click', () =>{
    const count3 = document.querySelector('[name=kiekisV]').value;
    

    axios.post(apiUrl, {
        kiekis: count3,
        sodintiV:1
    })
    .then(function(response) {
        listV.innerHTML = response.data.listV;
    })
});