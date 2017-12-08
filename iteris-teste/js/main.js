/**
 * Passa os dados da nota para o Modal, e atualiza o link para exclusão
 */
$('#delete-modal').on('show.bs.modal', function (event) {
  
  var button = $(event.relatedTarget);
  var id = button.data('nota');
  
  var modal = $(this);
  modal.find('.modal-title').text('Excluir Nota #' + id);
  modal.find('#confirm').attr('href', 'delete.php?id=' + id);
})