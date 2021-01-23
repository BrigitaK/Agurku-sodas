// const buttonHarvestAll = document.querySelector('.skynimas');
// const listPlace = document.querySelector('#listSkynimas');
// const errorMsg = document.querySelector('#error');
// const buttonskinti = document.querySelector('[name="skintiA"]');
// const buttonskintiP = document.querySelector('skintiP');
// const buttonskintiM = document.querySelector('skintiM');
// const buttonskintiVisus = document.querySelector('.skintiVisusA');
// const buttonskintiVisusP = document.querySelector('.skintiVisusP');
// const buttonskintiVisusM = document.querySelector('.skintiVisusM');
// const buttonskynimas = document.querySelector('.skynimasA');
// const buttonskynimasP = document.querySelector('.skynimasP');
// const buttonskynimasM = document.querySelector('.skynimasM');
// const buttonskynimasV = document.querySelector('.skynimasV');
// const listSkynimas = document.querySelector('#listSkynimas');
// const listSkynimasP = document.querySelector('#listSkynimasP');
// const listSkynimasM = document.querySelector('#listSkynimasM');
// const errorMsg = document.querySelector('#error');

// document.addEventListener('DOMContentLoaded', () => {
//     axios.post(apiUrl, {
//         list: 1,
//     })
//         .then(function (response) {
//             console.log(response);
//             listPlace.innerHTML = response.data.listSkynimas;
//             harvest();
//             harvestOne();
//         })
//         .catch(function (error) {
//             console.log(error);
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// })

// const harvestOne = () => {
//     const darzoves = document.querySelectorAll('.agurkas');
//     darzoves.forEach(darzove => {
//         const btn = darzove.querySelector('.skintiVisusA');
//         if (btn) {
//             btn.addEventListener('click', () => {
//                 const id = darzove.querySelector('[name=skintiVisusA]').value;
//                 axios.post(apiUrl, {
//                     id: id,
//                     'skintiVisusA': 1
//                 })
//                     .then(function (response) {
//                         console.log(response);
//                         listPlace.innerHTML = response.data.listSkynimas;
//                         harvest();
//                         harvestOne();
//                     })
//                     .catch(function (error) {
//                         console.log(error);
//                         errorMsg.innerHTML = error.response.data.msg;
//                     });
//             });
//         }
//     })
// }

// const harvest = () => {
//     const darzoves = document.querySelectorAll('.agurkas');
//     darzoves.forEach(darzove => {
//         const btn = darzove.querySelector('.skintiA');
//         if (btn) {
//             btn.addEventListener('click', () => {
//                 const id = darzove.querySelector('[name=skintiA]').value;
//                 const count = darzove.querySelector('[name=kiekis]').value;

//                 axios.post(apiUrl, {
//                     id: id,
//                     'kiek-skinti': count,
//                     'skintiA': 1
//                 })
//                     .then(function (response) {
//                         console.log(response);
//                         listPlace.innerHTML = response.data.listSkynimas;
//                         harvest();
//                         harvestOne();
//                     })
//                     .catch(function (error) {
//                         console.log(error);
//                         errorMsg.innerHTML = error.response.data.msg;
//                     });
//             });
//         }
//     })
// }

// buttonHarvestAll.addEventListener('click', () => {
//     axios.post(apiUrl, {
//         'skynimas': 1
//     })
//         .then(function (response) {
//             console.log(response);
//             listPlace.innerHTML = response.data.listSkynimas;
//             harvest();
//             harvestOne();
//         })
//         .catch(function (error) {
//             console.log(error);
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });
const buttonskinti = document.querySelector('[name="skintiA"]');
const buttonskintiP = document.querySelector('skintiP');
const buttonskintiM = document.querySelector('skintiM');
const buttonskintiVisus = document.querySelector('.skintiVisusA');
const buttonskintiVisusP = document.querySelector('.skintiVisusP');
const buttonskintiVisusM = document.querySelector('.skintiVisusM');
const buttonskynimas = document.querySelector('.skynimasA');
const buttonskynimasP = document.querySelector('.skynimasP');
const buttonskynimasM = document.querySelector('.skynimasM');
const buttonskynimasV = document.querySelector('.skynimasV');
const listSkynimas = document.querySelector('#listSkynimas');
const listSkynimasP = document.querySelector('#listSkynimasP');
const listSkynimasM = document.querySelector('#listSkynimasM');
const errorMsg = document.querySelector('#error');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/listSkynimas', {
    })
        .then(function (response) {
            console.log(response);
            listSkynimas.innerHTML = response.data.listSkynimas;
            harvestA();
            harvestOneA();
        })
        // .catch(function (error) {
        //     console.log(error);
        //     errorMsg.innerHTML = error.response.data.msg;
        // });
})

const harvestA = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    agurkai.forEach(agurkas => {
        const btn = agurkas.querySelector('.skintiA');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = agurkas.querySelector('[name=skinti]').value;
                console.log(id);
                const count = agurkas.querySelector('[name=kiekis]').value;

                axios.post(apiUrl+'/skintiA', {
                    id: id,
                    'kiekis': count,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimas.innerHTML = response.data.listSkynimas;
                        harvestA();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const harvestOneA = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    agurkai.forEach(agurkas => {
        const btn = agurkas.querySelector('.skintiVisusA');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = agurkas.querySelector('[name=skinti-visus]').value;
                axios.post(apiUrl+'/skintiVisusA', {
                    id: id,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimas.innerHTML = response.data.listSkynimas;
                        harvestA();
                        harvestOneA();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}


document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/listSkynimas', {
        })
        .then(function(response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
        //    errorMsg.innerHTML = error.response.data.msg;
        });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/listSkynimasM', {
        })
        .then(function(response) {
            listSkynimasM.innerHTML = response.data.listSkynimasM;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
        //    errorMsg.innerHTML = error.response.data.msg;
        });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/listSkynimasP', {
        })
        .then(function(response) {
            listSkynimasP.innerHTML = response.data.listSkynimasP;
            errorMsg.innerHTML = '';
        })
        .catch(function(error) {
     //       errorMsg.innerHTML = error.response.data.msg;
        });

});


//agurku skynimas
buttonskinti.addEventListener('click', () => {
    axios.post(apiUrl+'/skintiA', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

//pomidoru Skynimas
buttonskintiP.addEventListener('click', () => {
    axios.post(apiUrl+'/skintiP', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

//moliugu Skynimas
buttonskintiM.addEventListener('click', () => {
    axios.post(apiUrl+'/skintiM', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

//visu agurku skynimas
buttonskintiVisus.addEventListener('click', () => {
    axios.post(apiUrl+'/skintiVisusA', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskintiVisusP.addEventListener('click', () => {
    axios.post(apiUrl+'/skintiVisusP', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskintiVisusM.addEventListener('click', () => {
    axios.post(apiUrl+'/skintiVisusM', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonskynimas.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimas', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            harvestA();
            harvestOneA();
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskynimasM.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimasM', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskynimasP.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimasP', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskynimasV.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimasV', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            harvestA();
            harvestOneA();
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});