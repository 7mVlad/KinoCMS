
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
    document.querySelector("#submit-"+id).onclick = function(){
        document.querySelector("#img-"+id+"-preview img").src = "https://bit.ly/3ubuq5o";
        document.querySelector("#img-"+id+"-preview div").style.visibility = "visible";
    }
}


for (let i = 0; i < 5; i++) {
    previewBeforeUpload("img-"+i);
    deleteImage(i);
}


previewBeforeUpload("img-main");
deleteImage("main");


