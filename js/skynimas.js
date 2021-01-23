// const buttonskinti = document.querySelector('[name="skintiA"]');
// const buttonskintiP = document.querySelector('skintiP');
// const buttonskintiM = document.querySelector('skintiM');
// const buttonskintiVisus = document.querySelector('.skintiVisusA');
// const buttonskintiVisusP = document.querySelector('.skintiVisusP');
// const buttonskintiVisusM = document.querySelector('.skintiVisusM');
const buttonskynimas = document.querySelector('.skynimasA');
const buttonskynimasP = document.querySelector('.skynimasP');
const buttonskynimasM = document.querySelector('.skynimasM');
// const buttonskynimasV = document.querySelector('.skynimasV');
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
            skintiAgurkus();
            skintiVisusAgurkus();
        })
        // .catch(function (error) {
        //     console.log(error);
        //     errorMsg.innerHTML = error.response.data.msg;
        // });
})

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/listSkynimasM', {
        })
        .then(function(response) {
            listSkynimasM.innerHTML = response.data.listSkynimasM;
            skintiMoliugus();
            skintiVisusMoliugus();
        })
        // .catch(function(error) {
        // //    errorMsg.innerHTML = error.response.data.msg;
        // });

});

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl+'/listSkynimasP', {
        })
        .then(function(response) {
            listSkynimasP.innerHTML = response.data.listSkynimasP;
            skintiPomidorus();
            skintiVisusPomidorus();
        })
    //     .catch(function(error) {
    //  //       errorMsg.innerHTML = error.response.data.msg;
    //     });

});

const skintiVisusAgurkus = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    agurkai.forEach(agurkas => {
        const btn = agurkas.querySelector('.skintiVisusA');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = agurkas.querySelector('[name=skintiVisusA]').value;
                axios.post(apiUrl+'/skintiVisusA', {
                    id: id,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimas.innerHTML = response.data.listSkynimas;
                        skintiAgurkus();
                        skintiVisusAgurkus();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const skintiVisusPomidorus = () => {
    const pomidorai = document.querySelectorAll('.pomidoras');
    pomidorai.forEach(pomidoras => {
        const btn = pomidoras.querySelector('.skintiVisusP');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = pomidoras.querySelector('[name=skintiVisusP]').value;
                axios.post(apiUrl+'/skintiVisusP', {
                    id: id,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimasP.innerHTML = response.data.listSkynimasP;
                        skintiPomidorus();
                        skintiVisusPomidorus();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const skintiVisusMoliugus = () => {
    const moliugai = document.querySelectorAll('.moliugas');
    moliugai.forEach(moliugas => {
        const btn = moliugas.querySelector('.skintiVisusM');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = moliugas.querySelector('[name=skintiVisusM]').value;
                axios.post(apiUrl+'/skintiVisusM', {
                    id: id,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimasM.innerHTML = response.data.listSkynimasM;
                        skintiMoliugus();
                        skintiVisusMoliugus();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const skintiAgurkus = () => {
    const agurkai = document.querySelectorAll('.agurkas');
    agurkai.forEach(agurkas => {
        const btn = agurkas.querySelector('.skintiA');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = agurkas.querySelector('[name=skintiA]').value;
                console.log(id);
                const count = agurkas.querySelector('[name=kiekis]').value;

                axios.post(apiUrl+'/skintiA', {
                    id: id,
                    'kiek-skinti': count,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimas.innerHTML = response.data.listSkynimas;
                        skintiAgurkus();
                        skintiVisusAgurkus();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const skintiPomidorus = () => {
    const pomidorai = document.querySelectorAll('.pomidoras');
    pomidorai.forEach(pomidoras => {
        const btn = pomidoras.querySelector('.skintiP');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = pomidoras.querySelector('[name=skintiP]').value;
                console.log(id);
                const count = pomidoras.querySelector('[name=kiekis]').value;

                axios.post(apiUrl+'/skintiP', {
                    id: id,
                    'kiek-skintiP': count,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimasP.innerHTML = response.data.listSkynimasP;
                        skintiPomidorus();
                        skintiVisusPomidorus();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}

const skintiMoliugus = () => {
    const moliugai = document.querySelectorAll('.moliugas');
    moliugai.forEach(moliugas => {
        const btn = moliugas.querySelector('.skintiM');
        if (btn) {
            btn.addEventListener('click', () => {
                const id = moliugas.querySelector('[name=skintiM]').value;
                console.log(id);
                const count = moliugas.querySelector('[name=kiekis]').value;

                axios.post(apiUrl+'/skintiM', {
                    id: id,
                    'kiek-skintiM': count,
                })
                    .then(function (response) {
                        console.log(response);
                        listSkynimasM.innerHTML = response.data.listSkynimasM;
                        skintiMoliugus();
                        skintiVisusMoliugus();
                    })
                    .catch(function (error) {
                        console.log(error);
                        errorMsg.innerHTML = error.response.data.msg;
                    });
            });
        }
    })
}





//agurku skynimas
// buttonskinti.addEventListener('click', () => {
//     axios.post(apiUrl+'/skintiA', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
//             skintiAgurkus();
            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });

// //pomidoru Skynimas
// buttonskintiP.addEventListener('click', () => {
//     axios.post(apiUrl+'/skintiP', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });

// //moliugu Skynimas
// buttonskintiM.addEventListener('click', () => {
//     axios.post(apiUrl+'/skintiM', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });


// buttonskintiVisusP.addEventListener('click', () => {
//     axios.post(apiUrl+'/skintiVisusP', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });
// buttonskintiVisusM.addEventListener('click', () => {
//     axios.post(apiUrl+'/skintiVisusM', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });
//visu agurku skynimas
// buttonskintiVisus.addEventListener('click', () => {
//     axios.post(apiUrl+'/skintiVisusA', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
//             skintiAgurkus();
//             skintiVisusAgurkus();

            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });

buttonskynimas.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimas', {
    })
        .then(function (response) {
            listSkynimas.innerHTML = response.data.listSkynimas;
            skintiAgurkus();
            skintiVisusAgurkus();
            
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskynimasM.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimasM', {
    })
        .then(function (response) {
            listSkynimasM.innerHTML = response.data.listSkynimasM;
            skintiMoliugus();
            skintiVisusMoliugus();
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
buttonskynimasP.addEventListener('click', () => {
    axios.post(apiUrl+'/skynimasP', {
    })
        .then(function (response) {
            listSkynimasP.innerHTML = response.data.listSkynimasP;
            skintiPomidorus();
            skintiVisusPomidorus();
        })
        .catch(function (error) {
            errorMsg.innerHTML = error.response.data.msg;
        });
});
// buttonskynimasV.addEventListener('click', () => {
//     axios.post(apiUrl+'/skynimasV', {
//     })
//         .then(function (response) {
//             listSkynimas.innerHTML = response.data.listSkynimas;
//             harvestA();
//             harvestOneA();
            
//         })
//         .catch(function (error) {
//             errorMsg.innerHTML = error.response.data.msg;
//         });
// });