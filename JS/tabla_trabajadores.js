//edit tabla de trabajadores con jquery
$(document).ready(function () {
  $('#datos_trabajadores').Tabledit({
    columns: {
      deleteButton: true,
      editButton: false,  
      identifier: [5, 'DNI'],
      editable: [[1, 'name'], [2, 'surname'], [3, 'mail'], [4, 'password']]
    },
    url: 'editar_trabajadores.php'
  });
});