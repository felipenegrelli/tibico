function inseriCamposHorario(){

  var novaDiv = document.createElement('div');
  novaDiv.setAttribute("class", "row");
  novaDiv.innerHTML = "<div class='form-group col-md-2'>\
              <label for='dia'>Dia da Semana</label>\
              <select id='dia' name='dia[]' class='form-control'>\
                <option value=''></option>\
                <option value='1'>Segunda</option>\
                <option value='2'>Terça</option>\
                <option value='3'>Quarta</option>\
                <option value='4'>Quinta </option>\
                <option value='5'>Sexta</option>\
                <option value='6'>Sabado</option>\
              </select>\
            </div>\
            <div class='form-group col-md-2'>\
              <label for='inicio'>Início</label>\
              <input type='time' name='inicio[]' class='form-control' id='inicio'>\
            </div>\
            <div class='form-group col-md-2'>\
              <label for='termino'>Termino</label>\
              <input type='time' name='termino[]' class='form-control' id='termino'>\
            </div> ";
  document.getElementById("horarios").appendChild(novaDiv);
  
}
