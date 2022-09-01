
const whName = document.querySelector('.wh_name');
const inputWhNameEdit = document.querySelector('.wh_name');
const regional = document.querySelector('.regoinal');
const inputRegionalEdit = document.querySelector('.regional');
const kota = document.querySelector('.kota');
const inputKotaEdit = document.querySelector('.kota');
const location = document.querySelector('.location');
const inputLocationEdit = document.querySelector('.location');
const whType = document.querySelector('.wh_type');
const inputWhTypeEdit = document.querySelector('.wh_type');
const contractStatus = document.querySelector('.contract_status');
const inputContractStatusEdit = document.querySelector('.contract_status');
const startAt = document.querySelector('.start_at');
const inputStartAtEdit = document.querySelector('.start_at');
const endAt = document.querySelector('.end_at');
const inputEndAtEdit = document.querySelector('.end_at');
const tombolEdit = document.querySelector('.btn_update');
const formEdit = document.querySelector('.update_wh');

tombolEdit.forEach((e, i) => {
    e.addEventListener('click', function() {
        inputWhNameEdit.value = '';
        inputWhNameEdit.value = wName[i].innerHTML.trim();
        inputRegionalEdit.value = '';
        inputRegionalEdit.value = regional[i].innerHTML.trim();
        inputKotaEdit.value = '';
        inputKotaEdit.value = kota[i].innerHTML.trim();
        inputLocationEdit.value = '';
        inputLocationEdit.value = location[i].innerHTML.trim();
        inputWhTypeEdit.value = '';
        inputWhTypeEdit.value = whType[i].innerHTML.trim();
        inputContractStatusEdit.value = '';
        inputContractStatusEdit.value = contractStatus[i].innerHTML.trim();
        inputStartAtEdit.value = '';
        inputStartAtEdit.value = startAt[i].innerHTML.trim();
        inputEndAtEdit.value = '';
        inputEndAtEdit.value = endAt[i].innerHTML.trim();
        formEdit.removeAttribute('action');
        formEdit.setAttribute('action', '/warehouse/' + e.getAttribute('data-id'))
    })
});