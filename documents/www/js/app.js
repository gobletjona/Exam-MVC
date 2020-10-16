
$(function(){
  $('.delete').click(function(){
    if (!confirm('Etes-vous sûr de vouloir supprimer cet enregistrement ?')) {
      return false;

    }
  });
});
