//edit tabla de trabajadores con jquery
$(document).ready(function () {
  $('#datos_clientes').Tabledit({
    columns: {
      deleteButton: true,
      editButton: false,
      identifier: [1, 'DNI'],
      editable: [[2, 'name'], [3, 'surname'], [4, 'mail']]
    },
    url: 'editar_clientes.php'
  });
});