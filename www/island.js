function editdesc() {
    let desc = document.getElementById("islanddesc").innerHTML;
    document.getElementById("editdesc").style.display = "none";
    document.getElementById("savedesc").style.display = "block";
    document.getElementById("islanddesc").innerHTML = "<textarea id='descarea' name='islanddesc' rows='10' cols='50'>" + desc + "</textarea>";
}

function savedesc() {
    let desc = document.getElementById("descarea").value;

    let formdate = new FormData();
    formdate.append("islanddesc", desc);
    formdate.append("islandid", islandid);
    formdate.append("user", user);

    $.ajax({
        url: "/api/island",
        type: "POST",
        data: formdate,
        processData: false,
        contentType: false,
        success: function(data) {
            data = JSON.parse(data);
            if (data.status == "error") {
                alert(data.message);
                return;
            } else {
                document.getElementById("editdesc").style.display = "block";
                document.getElementById("savedesc").style.display = "none";
                document.getElementById("islanddesc").innerHTML = desc;
                return;
            }
        }
    });
    
}