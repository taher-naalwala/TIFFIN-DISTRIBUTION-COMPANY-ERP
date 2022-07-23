function change_item_id_available() {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.open("GET", "ajax_select.php?item_id_available=" + document.getElementById("item_id").value, false);
    xmlhttp.send(null);
    document.getElementById("available").innerHTML = xmlhttp.responseText;

}