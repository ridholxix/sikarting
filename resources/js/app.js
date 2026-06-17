import './bootstrap.js';

import './bootstrap';
import * as bootstrap from 'bootstrap';

import Alert from 'bootstrap/js/dist/alert';

// or, specify which plugins you need:
import { Tooltip, Toast, Popover } from 'bootstrap';

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

const btnHapus = document.querySelectorAll('.btn-hapus');
const formDelete = document.getElementById('formDelete');
const formDataNama = document.querySelectorAll('.form_data_nama')
const formDataKode = document.querySelector('.form_data_kode');
btnHapus.forEach((event) => {
    event.addEventListener('click', function(){
        const Nama = this.parentNode.parentNode.parentNode.querySelector('.data_nama').innerText;
        formDataNama.forEach((data) => data.innerText = Nama);
        const Kode = this.getAttribute('data-kode');
        formDataKode.innerText = Kode;
        let formAction = formDelete.getAttribute('action');
        formAction = formAction.replace(/(GS|S|G).../, Kode);
        formDelete.setAttribute('action',formAction);
    });
});
