document.onsubmit = function (event) {
    event.preventDefault();
}

document.forms.create.onsubmit = function ({ target }) {
    if (target.folder_name.value.length < 3)
        target.folder_name.style.border = 'solid 0.15rem red';
    else
        location.reload();
}


document.forms.upload.onsubmit = function ({ target }) {
    let formData = new FormData();
    let file = target.files.files[0];
    formData.append("Filedata", file);
    let t = file.type.split('/').pop().toLowerCase();

    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        target.files.style.border = 'solid 0.15rem red';
        document.getElementById(id).value = '';
        return false;
    }

    location.reload();
}