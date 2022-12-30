function report() {
  console.log("reporting");
  let reason = prompt("Proč je tato karta nevhodná?");
    if (reason !== "") {
        if(confirm("Opravdu chcete nahlásit tuto kartu? Zbytečné nahlášení může vést k banu.")) {
            console.log("reported");

            let formdate = new FormData();
            formdate.append("reason", reason);
            formdate.append("location", window.location);

            $.ajax({
                url: "/api/report",
                type: "POST",
                data: formdate,
                processData: false,
                contentType: false,
                success: function(data) {
                    data = JSON.parse(data);
                    if (data.status == "error") {
                        alert("error: "+data.error);
                        return;
                    } else {
                        alert("Karta byla nahlášena.");
                    }
                }
            });

        }
    }
}