"use strict";

document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        let successToast = document.getElementById("toastSuccess");
        let errorToast = document.getElementById("toastError");

        if (successToast) {
            successToast.classList.add('hidden');
        }

        if (errorToast) {
            errorToast.classList.add('hidden');
        }
    }, 5000);
});