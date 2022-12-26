const inverts = ["mechanic", "night", "trigger"];

function updateCard() {
    console.log("updateCard() called");
    document.getElementById("energie1").innerHTML = "+" + document.getElementById("energInput1").value;
    document.getElementById("energie2").innerHTML = "+" + document.getElementById("energInput2").value;
    document.getElementById("energie3").innerHTML = "+" + document.getElementById("energInput3").value;
    document.getElementById("energie4").innerHTML = "+" + document.getElementById("energInput4").value;

    document.getElementById("heroName").innerHTML = document.getElementById("nameInput").value;
    document.getElementById("heroType").innerHTML = document.getElementById("typeInput").value;
    document.getElementById("heroHp").innerHTML = document.getElementById("hpInput").value;
    document.getElementById("heroTeamHp").innerHTML = document.getElementById("teamHpInput").value;

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
        let val1 = document.getElementById("valueInput" + i).value;


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
        "name": document.getElementById("nameInput").value,
        "type": document.getElementById("typeInput").value,
        "hp": document.getElementById("hpInput").value,
        "teamHp": document.getElementById("teamHpInput").value,
        "pic": document.getElementById("picInput").value,
        "star": document.getElementById("starInput").value,
        "weapons": {
            "sword": document.getElementById("swordInput").checked,
            "axe": document.getElementById("axeInput").checked,
            "bow": document.getElementById("bowInput").checked,
            "staff": document.getElementById("staffInput").checked
        },
        "energy": {
            "1": document.getElementById("energInput1").value,
            "2": document.getElementById("energInput2").value,
            "3": document.getElementById("energInput3").value,
            "4": document.getElementById("energInput4").value
        },
        "effects": {
            "1": {
                "effect": document.getElementById("effectInput1").value,
                "value": document.getElementById("valueInput1").value
            },
            "2": {
                "effect": document.getElementById("effectInput2").value,
                "value": document.getElementById("valueInput2").value
            },
            "3": {
                "effect": document.getElementById("effectInput3").value,
                "value": document.getElementById("valueInput3").value
            },
            "4": {
                "effect": document.getElementById("effectInput4").value,
                "value": document.getElementById("valueInput4").value
            },
            "5": {
                "effect": document.getElementById("effectInput5").value,
                "value": document.getElementById("valueInput5").value
            },
            "6": {
                "effect": document.getElementById("effectInput6").value,
                "value": document.getElementById("valueInput6").value
            },
            "7": {
                "effect": document.getElementById("effectInput7").value,
                "value": document.getElementById("valueInput7").value
            },
            "8": {
                "effect": document.getElementById("effectInput8").value,
                "value": document.getElementById("valueInput8").value
            }
        }
    }
    json = JSON.stringify(json);
    navigator.clipboard.writeText(json);
    alert("Data karty byla zkopírována do schránky.");
}

function jsonImport() {
    let json = prompt("Vložte JSON karty:");

    if (json == "") {
        return;
    }

    try {
        json = JSON.parse(json);
        document.getElementById("nameInput").value = json.name;
        document.getElementById("typeInput").value = json.type;
        document.getElementById("hpInput").value = json.hp;
        document.getElementById("teamHpInput").value = json.teamHp;
        document.getElementById("picInput").value = json.pic;
        document.getElementById("starInput").value = json.star;
        document.getElementById("swordInput").checked = json.weapons.sword;
        document.getElementById("axeInput").checked = json.weapons.axe;
        document.getElementById("bowInput").checked = json.weapons.bow;
        document.getElementById("staffInput").checked = json.weapons.staff;
        document.getElementById("energInput1").value = json.energy[1];
        document.getElementById("energInput2").value = json.energy[2];
        document.getElementById("energInput3").value = json.energy[3];
        document.getElementById("energInput4").value = json.energy[4];
        document.getElementById("effectInput1").value = json.effects[1].effect;
        document.getElementById("valueInput1").value = json.effects[1].value;
        document.getElementById("effectInput2").value = json.effects[2].effect;
        document.getElementById("valueInput2").value = json.effects[2].value;
        document.getElementById("effectInput3").value = json.effects[3].effect;
        document.getElementById("valueInput3").value = json.effects[3].value;
        document.getElementById("effectInput4").value = json.effects[4].effect;
        document.getElementById("valueInput4").value = json.effects[4].value;
        document.getElementById("effectInput5").value = json.effects[5].effect;
        document.getElementById("valueInput5").value = json.effects[5].value;
        document.getElementById("effectInput6").value = json.effects[6].effect;
        document.getElementById("valueInput6").value = json.effects[6].value;
        document.getElementById("effectInput7").value = json.effects[7].effect;
        document.getElementById("valueInput7").value = json.effects[7].value;
        document.getElementById("effectInput8").value = json.effects[8].effect;
        document.getElementById("valueInput8").value = json.effects[8].value;
        updateCard();
    } catch {
        alert("Neplatný JSON.");
        return;
    }
    console.log(json);
}

function saveCard() {
    let json = {
        "name": document.getElementById("nameInput").value,
        "type": document.getElementById("typeInput").value,
        "hp": document.getElementById("hpInput").value,
        "teamHp": document.getElementById("teamHpInput").value,
        "pic": document.getElementById("picInput").value,
        "star": document.getElementById("starInput").value,
        "weapons": {
            "sword": document.getElementById("swordInput").checked,
            "axe": document.getElementById("axeInput").checked,
            "bow": document.getElementById("bowInput").checked,
            "staff": document.getElementById("staffInput").checked
        },
        "energy": {
            "1": document.getElementById("energInput1").value,
            "2": document.getElementById("energInput2").value,
            "3": document.getElementById("energInput3").value,
            "4": document.getElementById("energInput4").value
        },
        "effects": {
            "1": {
                "effect": document.getElementById("effectInput1").value,
                "value": document.getElementById("valueInput1").value
            },
            "2": {
                "effect": document.getElementById("effectInput2").value,
                "value": document.getElementById("valueInput2").value
            },
            "3": {
                "effect": document.getElementById("effectInput3").value,
                "value": document.getElementById("valueInput3").value
            },
            "4": {
                "effect": document.getElementById("effectInput4").value,
                "value": document.getElementById("valueInput4").value
            },
            "5": {
                "effect": document.getElementById("effectInput5").value,
                "value": document.getElementById("valueInput5").value
            },
            "6": {
                "effect": document.getElementById("effectInput6").value,
                "value": document.getElementById("valueInput6").value
            },
            "7": {
                "effect": document.getElementById("effectInput7").value,
                "value": document.getElementById("valueInput7").value
            },
            "8": {
                "effect": document.getElementById("effectInput8").value,
                "value": document.getElementById("valueInput8").value
            }
        }
    }
    json = JSON.stringify(json);
    console.log(json);

    let data = new FormData();
    data.append('method', 'saveCard');
    data.append('card', json);

    $.ajax({
        url: 'api/card',
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
            window.location.href = "/card/" + data.user +"/" + data.id;
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