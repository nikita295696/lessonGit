document.onsubmit = function (event) {
    event.preventDefault();
}

document.forms.create.onsubmit = function ({ target }) {
    if (target.folder_name.value.length < 2)
        target.folder_name.style.border = 'solid 0.15rem red';
    else
        target.folder_name.style.border = 'solid 0.15rem #00ADB5';
}