const buttonSodinti = document.querySelector('.sodinti #sodintiA');
const buttonSodintiM = document.querySelector('[name="sodintiM"]');
const buttonSodintiP = document.querySelector('[name="sodintiP"]');
const buttonSodintiV = document.querySelector('[name="sodintiV"]');
const buttonIsrauti = document.querySelector('.btn-israuti');
const list = document.querySelector('#list');
const listM = document.querySelector('#listM');
const listP = document.querySelector('#listP');
const listV = document.querySelector('#listV');
const errorMsg = document.querySelector('#error');

const addNewList = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    agurkai.forEach(agurkas => {
        agurkas.querySelector('[type=button]').addEventListener('click', () => {
            const id = agurkas.querySelector('[name=rauti]').value;
            axios.post(apiUrl+'/rauti', {
                    id: id,
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
            axios.post(apiUrl+'/rautiP', {
                    id: id,
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
            axios.post(apiUrl+'/rautiM', {
                    id: id,
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
    axios.post(apiUrl+'/list', {
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
    axios.post(apiUrl+'/listP', {
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
    axios.post(apiUrl+'/listM', {
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


//agurku sodinimas
buttonSodinti.addEventListener('click', () =>{
    const count = document.querySelector('[name=kiekis]').value;
    

    axios.post(apiUrl+'/sodintiA', {
        kiekis: count,
    })
    .then(function(response) {
        list.innerHTML = response.data.list;
        console.log(list);
        errorMsg.innerHTML = '';
        addNewList();
        addNewListP();
        addNewListM();
    })
    .catch(function(error) {
        errorMsg.innerHTML = error.response.data.msg;
    });

    
});
//moliugu sodinimas
buttonSodintiM.addEventListener('click', () =>{
    const count1 = document.querySelector('[name=kiekisM]').value;
    

    axios.post(apiUrl+'/sodintiM', {
        kiekis: count1,
    })
    .then(function(response) {
        listM.innerHTML = response.data.listM;
        console.log(listM);

        errorMsg.innerHTML = '';
        addNewListM();
        addNewList();
        addNewListP();
    })

    .catch(function(error) {
        errorMsg.innerHTML = error.response.data.msg;
    });
});
//pomidoru sodinimas
buttonSodintiP.addEventListener('click', () =>{
    const count2 = document.querySelector('[name=kiekisP]').value;
    

    axios.post(apiUrl+'/sodintiP', {
        kiekis: count2,
    })
    .then(function(response) {
        listP.innerHTML = response.data.listP;
        console.log(listP);
        addNewListP();
        addNewListM();
        addNewList();
    })

    .catch(function(error) {
        errorMsg.innerHTML = error.response.data.msg;
    });
});
//visu darzoviu sodinimas
buttonSodintiV.addEventListener('click', () =>{
    const count3 = document.querySelector('[name=kiekisV]').value;
    

    axios.post(apiUrl+'/sodintiV', {
        kiekis: count3,
    })
    .then(function(response) {
        listV.innerHTML = response.data.listV;
        addNewList();
        addNewListP();
        addNewListM();
    })

    .catch(function(error) {
        errorMsg.innerHTML = error.response.data.msg;
    });
});
