//edit tabla de trabajadores con jquery

$('#datos_trabajadores').Tabledit({
  columns: {
    identifier: [5, 'DNI'],
    editable: [[1, 'name'], [2, 'surname'], [3, 'mail'], [4, 'password']]
  },
  url: 'editar_trabajadores.php'
});