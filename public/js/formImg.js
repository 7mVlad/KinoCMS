

function previewBeforeUpload(id) {

    document.querySelector("#"+id).addEventListener("change",function(e) {

        if(e.target.files.length == 0){
            return;
        }

    let file = e.target.files[0];
    let url = URL.createObjectURL(file);

    document.querySelector("#"+id+"-preview div").style.visibility = "hidden";
    document.querySelector("#"+id+"-preview img").src = url;


    });
}

function deleteImage(id) {
    document.querySelector("#submit-"+id).onclick = function() {
        let path =  document.querySelector("#img-"+id+"-preview img").src;
        document.querySelector("#img-"+id+"-preview img").src = "https://bit.ly/3ubuq5o";
        document.querySelector("#img-"+id+"-preview div").style.visibility = "visible";
        add_field(path);
    }
}



function add_field(url){

    var x = document.getElementById("form");

    // создаем новое поле ввода
    var new_field = document.createElement("input");

    // установим для поля ввода тип данных 'text'
    new_field.setAttribute("type", "text");

    // установим имя для поля ввода
    new_field.setAttribute("name", "deleteImg[]");

    new_field.setAttribute("value", url);

    new_field.hidden = true;

    // определим место вствки нового поля ввода (перед каким элементом его вставить)
    var pos = x.childElementCount;

    // добавим поле ввода в форму
    x.insertBefore(new_field, x.childNodes[pos]);
}


for (let i = 0; i < 5; i++) {
    previewBeforeUpload("img-"+i);
    deleteImage(i);
}


previewBeforeUpload("img-main");
deleteImage("main");
previewBeforeUpload("bgImage");





