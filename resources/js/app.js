import jQuery from 'jquery';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import 'sweetalert2/dist/sweetalert2.min.css';

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.$ = jQuery;
$.fn.hasAttr = function(name) {
    return this.attr(name) !== undefined;
};

const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

function createDeleteForm(currentElement) {
    const _deleteForm = document.createElement('form');
    _deleteForm.action = currentElement.dataset.href;
    _deleteForm.method = "POST";
    const _csrfToken = document.createElement('input');
    _csrfToken.name = "_token";
    _csrfToken.type = "hidden";
    _csrfToken.value = CSRF_TOKEN;
    _deleteForm.appendChild(_csrfToken);
    const _method = document.createElement('input');
    _method.name = "_method";
    _method.type = "hidden";
    _method.value = "DELETE";
    _deleteForm.appendChild(_method);
    currentElement.insertAdjacentElement("afterend", _deleteForm);
    _deleteForm.submit();
}

$('[data-action=delete]').on('click', function(e) {
    e.preventDefault();
    const currentElement = this;
    const confirm = $(this).attr('confirm');
    if (typeof confirm !== 'undefined') {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(({isConfirmed}) => {
            if (isConfirmed) {
                Swal.fire({
                    text: 'Processing...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                    width: 200,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });
                createDeleteForm(currentElement);
            }
        });
    } else {
        createDeleteForm(currentElement);
    }
});

