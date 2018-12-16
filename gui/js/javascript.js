function header_change(data, page)
{
    var e = document.getElementsByTagName("title")[0];
    e.innerHTML += " | "+data;
    var h = document.getElementById("sub_title");
    h.innerHTML += " /";
    var para = document.createElement("a");
    para.innerHTML += "&nbsp;";
    var node = document.createTextNode(data);
    para.appendChild(node);
    para.setAttribute("href",page);
    para.setAttribute("id","sub_title");
    h.parentNode.insertBefore(para, h.nextSibling);
}

function Load(id) {
    var modal = document.getElementById('myModal');
    var span = document.getElementsByClassName("close")[0];
    var not_agree = document.getElementById('not_agree');
    modal.style.display = "block";
    var get_user = document.getElementById('id');
    get_user.setAttribute("href",get_user.getAttribute("href") + id.toString()) ;
    span.onclick = function () {
        modal.style.display = "none";
    }

    not_agree.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "block";
        }
    }
}

// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function (e) {
//             document.getElementById("blah").setAttribute('src', e.target.result);
//             alert(e.target.result);
//         };
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }

function error_delete(error)
{
    document.getElementById(error).style.display = 'none';
}

function upload_file(){
    document.getElementById("image_file").click();
}
