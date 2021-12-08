document.forms.create.onsubmit = function (event) {
    if (event.target.folder_name.value.length < 3){
        event.target.folder_name.style.border = 'solid 0.15rem red';
        event.preventDefault();
    }   
}


document.forms.upload.onsubmit = function (event) {
    let formData = new FormData();
    let file = event.target.files.files[0];
    formData.append("Filedata", file);
    let t = file.type.split('/').pop().toLowerCase();

    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        event.target.files.style.border = 'solid 0.15rem red';
        event.preventDefault();
    }
}