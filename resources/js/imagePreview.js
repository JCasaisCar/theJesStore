"use strict";

function previewImage(event) {
    const file = event.target.files[0];
    const output = document.getElementById('imagePreview');

    if (file && output) {
        const reader = new FileReader(); 
        reader.onload = function () {
            output.src = "";
            output.src = reader.result; 
        };
        reader.readAsDataURL(file);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const inputImage = document.getElementById('image'); 
    if (inputImage) {
        inputImage.addEventListener('change', previewImage); 
    }
});
