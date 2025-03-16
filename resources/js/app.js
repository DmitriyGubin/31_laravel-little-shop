import './bootstrap';
import $ from 'jquery';
window.$ = jQuery;

// цифры 0-9 в инпутах
$('.catalog .univ_inp.marg').on('input', function(){
    let val = $(this).val();
    $(this).val(val.replace(/[^0-9]/g, ''));
});
// цифры 0-9 в инпутах

import {createApp} from 'vue';
import form from './vue/form.vue';
const application = createApp(form);
application.mount("#vue_form");
