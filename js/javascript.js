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