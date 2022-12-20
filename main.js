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

        document.getElementById("effect"+i).src = "img/" + document.getElementById("effectInput"+i).value + ".png";
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