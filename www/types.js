const inverts = ["mechanic", "night", "trigger"];

function randomnumber(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min);
}

function updateCard() {
    console.log("updateCard() called");
    document.getElementById("energie1").innerHTML = "+" + randomnumber(document.getElementById("energInput1Min").value, document.getElementById("energInput1Max").value);
    document.getElementById("energie2").innerHTML = "+" + randomnumber(document.getElementById("energInput2Min").value, document.getElementById("energInput2Max").value);
    document.getElementById("energie3").innerHTML = "+" + randomnumber(document.getElementById("energInput3Min").value, document.getElementById("energInput3Max").value);
    document.getElementById("energie4").innerHTML = "+" + randomnumber(document.getElementById("energInput4Min").value, document.getElementById("energInput4Max").value);


    // name generation

    let names = document.getElementById("names").value.split(",");
    let name = names[Math.floor(Math.random() * names.length)].trim();

    let surnames = document.getElementById("surnames").value.split(",");
    let surname = surnames[Math.floor(Math.random() * surnames.length)].trim();

    document.getElementById("heroName").innerHTML = name + " " + surname;
    document.getElementById("heroType").innerHTML = document.getElementById("typeInput").value;
    document.getElementById("heroHp").innerHTML = randomnumber(document.getElementById("hpInputMin").value, document.getElementById("hpInputMax").value);
    document.getElementById("heroTeamHp").innerHTML = randomnumber(document.getElementById("teamHpInputMin").value, document.getElementById("teamHpInputMax").value);

    document.getElementById("heropic").src = "img/" + document.getElementById("picInput").value + ".png";

    document.getElementById("frame").src = "img/ram" + document.getElementById("starInput").value + ".png";

    if (document.getElementById("swordInput").checked == true) {
        document.getElementById("sword").src = "img/sword_on.png";
    } else {
        document.getElementById("sword").src = "img/sword_off.png";
    }

    if (document.getElementById("axeInput").checked == true) {
        document.getElementById("axe").src = "img/axe_on.png";
    } else {
        document.getElementById("axe").src = "img/axe_off.png";
    }

    if (document.getElementById("bowInput").checked == true) {
        document.getElementById("bow").src = "img/bow_on.png";
    } else {
        document.getElementById("bow").src = "img/bow_off.png";
    }

    if (document.getElementById("staffInput").checked == true) {
        document.getElementById("staff").src = "img/staff_on.png";
    } else {
        document.getElementById("staff").src = "img/staff_off.png";
    }

    for (let i = 1; i <= 8; i++) {

        document.getElementById("effect" + i).src = "img/" + document.getElementById("effectInput" + i).value + ".png";

        let min = document.getElementById("valueInput" + i + "Min").value;
        let max = document.getElementById("valueInput" + i + "Max").value;

        let val1 = randomnumber(min, max);


        if (inverts.includes(document.getElementById("effectInput" + i).value)) {
            document.getElementById("value" + i).classList.add("switchedvalue" + i);
            document.getElementById("effect" + i).classList.add("switchedeffect" + i);
        } else {
            document.getElementById("value" + i).classList.remove("switchedvalue" + i);
            document.getElementById("effect" + i).classList.remove("switchedeffect" + i);
        }

        if (val1 >= 0 && !inverts.includes(document.getElementById("effectInput" + i).value)) {
            val1 = "+" + val1;
        }
        document.getElementById("value" + i).innerHTML = val1;
    }
}

function jsonExport() {
    let json = {
        "name": {
            "first": document.getElementById("names").value.split(","),
            "last": document.getElementById("surnames").value.split(",")
        },
        "type": document.getElementById("typeInput").value,
        "pic": document.getElementById("picInput").value,
        "star": document.getElementById("starInput").value,
        //"energy": {},
        "hp": {
            "min": document.getElementById("hpInputMin").value,
            "max": document.getElementById("hpInputMax").value
        },
        "teamHp": {
            "min": document.getElementById("teamHpInputMin").value,
            "max": document.getElementById("teamHpInputMax").value
        },
        "weapons": {
            "sword": document.getElementById("swordInput").checked,
            "axe": document.getElementById("axeInput").checked,
            "bow": document.getElementById("bowInput").checked,
            "staff": document.getElementById("staffInput").checked
        },
        "energy": [],
        "effects": []
    }

    let names = document.getElementById("names").value.split(",");
    let surnames = document.getElementById("surnames").value.split(",");

    json["name"]["first"] = names;
    json["name"]["last"] = surnames;

    let energies = {};
    for(let i = 1; i <= 4; i++) {
        let current = {};
        current["min"] = document.getElementById("energInput" + i + "Min").value;
        current["max"] = document.getElementById("energInput" + i + "Max").value;
        energies[i] = current;
    }

    json["energy"] = energies;

    let effects = {};
    for(let i = 1; i <= 8; i++) {
        let current = {};
        current["effect"] = document.getElementById("effectInput" + i).value;
        current["min"] = document.getElementById("valueInput" + i + "Min").value;
        current["max"] = document.getElementById("valueInput" + i + "Max").value;
        effects[i] = current;
    }
    json["effects"] = effects;

    json = JSON.stringify(json);
    navigator.clipboard.writeText(json);
    alert("Data karty byla zkopírována do schránky.");
}

function jsonImport() {
    let json = prompt("Vložte JSON karty:");

    if (json == "" || json == null) {
        return;
    }

    try {
        json = JSON.parse(json);
        document.getElementById("names").value = json.name.first.join(",");
        document.getElementById("surnames").value = json.name.last.join(",");
        document.getElementById("typeInput").value = json.type;
        document.getElementById("hpInputMin").value = json.hp.min;
        document.getElementById("hpInputMax").value = json.hp.max;
        document.getElementById("teamHpInputMin").value = json.teamHp.min;
        document.getElementById("teamHpInputMax").value = json.teamHp.max;
        document.getElementById("picInput").value = json.pic;
        document.getElementById("starInput").value = json.star;
        document.getElementById("swordInput").checked = json.weapons.sword;
        document.getElementById("axeInput").checked = json.weapons.axe;
        document.getElementById("bowInput").checked = json.weapons.bow;
        document.getElementById("staffInput").checked = json.weapons.staff;

        for(let i = 1; i <= 4; i++) {
            document.getElementById("energInput" + i + "Min").value = json.energy[i].min;
            document.getElementById("energInput" + i + "Max").value = json.energy[i].max;
        }

        for(let i = 1; i <= 8; i++) {
            document.getElementById("effectInput" + i).value = json.effects[i].effect;
            document.getElementById("valueInput" + i + "Min").value = json.effects[i].min;
            document.getElementById("valueInput" + i + "Max").value = json.effects[i].max;
        }
        updateCard();
    } catch {
        alert("Neplatný JSON.");
        return;
    }
    console.log(json);
}

function saveCard() {
    let json = {
        "name": {
            "first": document.getElementById("names").value.split(","),
            "last": document.getElementById("surnames").value.split(",")
        },
        "type": document.getElementById("typeInput").value,
        "pic": document.getElementById("picInput").value,
        "star": document.getElementById("starInput").value,
        //"energy": {},
        "hp": {
            "min": document.getElementById("hpInputMin").value,
            "max": document.getElementById("hpInputMax").value
        },
        "teamHp": {
            "min": document.getElementById("teamHpInputMin").value,
            "max": document.getElementById("teamHpInputMax").value
        },
        "weapons": {
            "sword": document.getElementById("swordInput").checked,
            "axe": document.getElementById("axeInput").checked,
            "bow": document.getElementById("bowInput").checked,
            "staff": document.getElementById("staffInput").checked
        },
        "energy": [],
        "effects": []
    }

    let names = document.getElementById("names").value.split(",");
    let surnames = document.getElementById("surnames").value.split(",");

    json["name"]["first"] = names;
    json["name"]["last"] = surnames;

    let energies = {};
    for(let i = 1; i <= 4; i++) {
        let current = {};
        current["min"] = document.getElementById("energInput" + i + "Min").value;
        current["max"] = document.getElementById("energInput" + i + "Max").value;
        energies[i] = current;
    }

    json["energy"] = energies;

    let effects = {};
    for(let i = 1; i <= 8; i++) {
        let current = {};
        current["effect"] = document.getElementById("effectInput" + i).value;
        current["min"] = document.getElementById("valueInput" + i + "Min").value;
        current["max"] = document.getElementById("valueInput" + i + "Max").value;
        effects[i] = current;
    }
    json["effects"] = effects;
    let island = document.getElementById("islandSelect").value;
    json = JSON.stringify(json);
    console.log(json);

    let data = new FormData();
    data.append('method', 'saveCard');
    data.append('card', json);
    data.append('island', island);

    $.ajax({
        url: 'api/type',
        data: data,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data){
            //console.log(data);
            data = JSON.parse(data);
            if (data.status == "error") {
                alert("Nepodařilo se uložit kartu. Error " + data.error);
                return;
            }
            window.location.href = "/druh/" + data.user +"/" + data.island + "/" + data.druh;
        }
    });
        //data.append('data', json);


    /*fetch('/api/card', {
        method: 'POST',
        body: data,
        credentials: 'include'
    })
.then(response => response.json())
.then((response) => {
    console.log(response);
})*/

    

}


// {"name":{"first":["Zelená"," červená"," modrá"],"last":["jedna"," dva"," tři"]},"type":"barva","pic":"rytir","star":"2","weapons":{"sword":true,"axe":true,"bow":true,"staff":true},"hp":{"min":10,"max":99},"teamHp":{"min":1,"max":9},"energy":{"1":{"min":"1","max":"9"},"2":{"min":"1","max":"9"},"3":{"min":"1","max":"9"},"4":{"min":"1","max":"9"}},"effects":{"1":{"effect":"attack","min":"1","max":"9"},"2":{"effect":"bite","min":"-9","max":"9"},"3":{"effect":"univerzal","min":"-9","max":"9"},"4":{"effect":"trap","min":"-9","max":"9"},"5":{"effect":"unibonus","min":"-9","max":"9"},"6":{"effect":"curse","min":"-9","max":"9"},"7":{"effect":"energy","min":"-9","max":"9"},"8":{"effect":"attack","min":"-9","max":"9"}}}