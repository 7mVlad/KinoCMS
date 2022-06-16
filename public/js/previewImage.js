let form = document.getElementById('form');

function imageDelete(id, i) {
    document.getElementById('img-'+i).src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteImages[]" value="'+id+'">');
    }
}

function imageMainDelete(id) {
    document.getElementById('mainImage').src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteMainImage" value="'+id+'">');
    }
}

function imageLogoDelete(id) {
    document.getElementById('logoImage').src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteLogoImage" value="'+id+'">');
    }
}

function imageBannerDelete(id) {
    document.getElementById('bannerImage').src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteBannerImage" value="'+id+'">');
    }
}

function imageSchemeDelete(id) {
    document.getElementById('schemeImage').src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteSchemeImage" value="'+id+'">');
    }
}

function imageSchemeDelete(id) {
    document.getElementById('logoImages').src = 'https://bit.ly/3ubuq5o';

    if (id != '') {
        form.insertAdjacentHTML("afterbegin", '<input type="hidden" name="deleteLogoImages[]" value="'+id+'">');
    }
}







