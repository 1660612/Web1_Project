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

function Load() {
    var modal = document.getElementById('myModal');

    var span = document.getElementsByClassName("close")[0];
    var not_agree = document.getElementById('not_agree');

        modal.style.display = "block";


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