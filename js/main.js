/**
 * Passa os dados do tcc para o Modal, e atualiza o link para exclusão
 */
function Delete(id){

  //var id = button.data('customer');
    var modal = $('#delete-modals');
    modal.show();
    console.log(modal);

    modal.find('.modal-title').text('Excluir tcc #' + id);
    modal.find('#confirm').attr('href', 'delete.php?id=' + id);

  }