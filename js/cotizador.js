
document.addEventListener("DOMContentLoaded", function () {
    //button de reset
    let resetButton = document.getElementById("resetButton");
    resetButton.addEventListener("click", function () {
        location.reload();
    });

    function unselect(){
        document.querySelectorAll('[name="luces-adicional"]').forEach((x) => x.checked=false);
    }


    let ticketButton=document.getElementById("impTicket")

    ticketButton.addEventListener('click',()=>{
        let selectGroup1="transmision";
        let selectGroup2="color";
        let selectGroup3="interiores";
        let radioButton1="frenos";
        let radioButton2="rines";
        let radioButton3="escape";
        let radioButton4="aleron";
        let radioButton5="luces";
        let radioButton6="luces-adicional";
        let radioButton7=".tipe1";

        let one=valueSelect(selectGroup1);
        let two=valueSelect(selectGroup2);
        let tree=valueSelect(selectGroup3);
        let four=valueRadioButtons(radioButton1);
        let five=valueRadioButtons(radioButton2);
        let six=valueRadioButtons(radioButton3);
        let seven=valueRadioButtons(radioButton4);
        let eight=valueRadioButtons(radioButton5);
        let nine=valueRadioButtons(radioButton6);
        nine = nine !== undefined ? nine : "Sin luces adicionales: 0";
        let ten=valueCheckBox(radioButton7);


        let priceOne = parseInt(obtainPrice(one));
        let priceTwo = parseInt(obtainPrice(two));
        let priceTree = parseInt(obtainPrice(tree));
        let priceFour = parseInt(obtainPrice(four));
        let priceFive = parseInt(obtainPrice(five));
        let priceSix = parseInt(obtainPrice(six));
        let priceSeven = parseInt(obtainPrice(seven));
        let priceEight = parseInt(obtainPrice(eight));
        let priceNine = parseInt(obtainPrice(nine));

        let priceTen=0;
        ten.forEach(item => {
            let price = parseInt(obtainPrice(item));
            if (!isNaN(price)) {
                priceTen += price;
            }
        });

        let textTen="";

        ten.forEach(item => {
            let text = item;
            textTen += text + ",";
        });

        textTen = textTen.slice(0, -1);

        let subtotal=priceOne+priceTwo+priceTree+priceFour+priceFive+priceSix+priceSeven+priceEight+priceNine+priceTen;

        let iva= subtotal*0.16;
        let total=subtotal+iva;

        let impTotals=document.getElementById("totalAmount");

        impTotals.innerHTML=`<br>
                            <div class="border-1">
                                <h3><p>Total de compra: $${total}</p></h3>                                
                                <p>Subtotal: $${subtotal}</p>
                                <p>IVA: $${iva}</p>
                                <br>
                                
                                    <li>${one}</li>
                                    <li>${two}</li>
                                    <li>${tree}</li>
                                    <li>${four}</li>
                                    <li>${five}</li>
                                    <li>${six}</li>
                                    <li>${seven}</li>
                                    <li>${eight}</li>
                                    <li>${nine}</li>
                                    <li>${textTen}</li>
                                
                            </div>`;

    });

function valueSelect(id){
    //buttonName=id
    let buttonName=document.getElementById(id);
    let value=(buttonName.value);

    return value;
}

    function obtainPrice(button) {
        let part = button.split(':');
        if (part.length === 2) {
            return part[1];
        } else {
            return null;
        }
    }

function valueRadioButtons(id){
    //buttonName=id
    let radioButtonsGroup = document.querySelectorAll(`input[name=${id}]`);
    let value;
    radioButtonsGroup.forEach(button => {
        if (button.checked) {
            value = button.value;
        }
    });
    return value;
}

function valueCheckBox(id){
    let list=[];
    let checkBox = document.querySelectorAll(id);
    console.log(checkBox)
    checkBox.forEach(checkbox => {
        if (checkbox.checked) {
            let value = (checkbox.value);

            list.push(value);
        }
    });
    return list;
}

    let sinEstribosCheckbox = document.getElementById("sin-estribos");
    let lateralesPlasticoCheckbox = document.getElementById("estribos-lateral-plastico");
    let delanterosPlasticoCheckbox = document.getElementById("estribos-delantero-plastico");
    let lateralesCarbonoCheckbox = document.getElementById("estribos-lateral-carbono");
    let delanterosCarbonoCheckbox = document.getElementById("estribos-delantero-carbono");

    // Array para agrupar los checkboxes de estribos de cada tipo
    let checkboxesEstribos = [lateralesPlasticoCheckbox, delanterosPlasticoCheckbox, lateralesCarbonoCheckbox, delanterosCarbonoCheckbox];

    // Manejar el cambio en el checkbox "Sin estribos"
    sinEstribosCheckbox.addEventListener("change", function () {
        if (sinEstribosCheckbox.checked) {
            // Si "Sin estribos" está seleccionado, deshabilita los demás checkboxes de estribos
            checkboxesEstribos.forEach(checkbox => {
                checkbox.disabled = true;
                checkbox.checked = false;
            });
        } else {
            // Si "Sin estribos" no está seleccionado, habilita los demás checkboxes de estribos
            checkboxesEstribos.forEach(checkbox => {
                checkbox.disabled = false;
            });
        }
    });

    // Manejar el cambio en los checkboxes de estribos
    checkboxesEstribos.forEach(checkbox => {
        checkbox.addEventListener("change", function () {
            if (checkbox.checked) {
                // Cuando se selecciona un tipo de estribo, deshabilita el tipo de estribo opuesto
                const estriboOpuesto = getEstriboOpuesto(checkbox);
                if (estriboOpuesto) {
                    estriboOpuesto.disabled = true;
                }
            } else {
                // Cuando se deselecciona un tipo de estribo, habilita el tipo de estribo opuesto
                const estriboOpuesto = getEstriboOpuesto(checkbox);
                if (estriboOpuesto) {
                    estriboOpuesto.disabled = false;
                }
            }
        });
    });

    // Función para obtener el estribo opuesto (por ejemplo, "Laterales de Plástico" vs. "Laterales de Fibra de Carbono")
    function getEstriboOpuesto(checkbox) {
        if (checkbox === lateralesPlasticoCheckbox) {
            return lateralesCarbonoCheckbox;
        } else if (checkbox === delanterosPlasticoCheckbox) {
            return delanterosCarbonoCheckbox;
        } else if (checkbox === lateralesCarbonoCheckbox) {
            return lateralesPlasticoCheckbox;
        } else if (checkbox === delanterosCarbonoCheckbox) {
            return delanterosPlasticoCheckbox;
        }
        return null;
    }


});
