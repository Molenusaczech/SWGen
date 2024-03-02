const inverts = ["mechanic", "night", "trigger"];

function randomnumber(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min);
}


function generate() {
    let data = json;
    console.log(data);
    
    for (let i = 1; i <= 4; i++) {
    document.getElementById("energie"+i).innerHTML = "+" + randomnumber(data["energy"][i]["min"], data["energy"][i]["max"]);
    }

    // name generation

    let names = data.name.first;
    let name = names[Math.floor(Math.random() * names.length)].trim();

    let surnames = data.name.last;
    let surname = surnames[Math.floor(Math.random() * surnames.length)].trim();

    document.getElementById("heroName").innerHTML = name + " " + surname;
    document.getElementById("heroHp").innerHTML = randomnumber(data.hp.min, data.hp.max);
    document.getElementById("heroTeamHp").innerHTML = randomnumber(data.teamHp.min, data.teamHp.max);

    for (let i = 1; i <= 8; i++) {

        //document.getElementById("effect" + i).src = "img/" + document.getElementById("effectInput" + i).value + ".png";

        let min = data["effects"][i]["min"];
        let max = data["effects"][i]["max"];
        let effect = data["effects"][i]["effect"];

        let val1 = randomnumber(min, max);

        /*
        if (inverts.includes(document.getElementById("effectInput" + i).value)) {
            document.getElementById("value" + i).classList.add("switchedvalue" + i);
            document.getElementById("effect" + i).classList.add("switchedeffect" + i);
        } else {
            document.getElementById("value" + i).classList.remove("switchedvalue" + i);
            document.getElementById("effect" + i).classList.remove("switchedeffect" + i);
        }*/

        if (val1 >= 0 && !inverts.includes(effect)) {
            val1 = "+" + val1;
        }
        document.getElementById("value" + i).innerHTML = val1;
    }
}

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