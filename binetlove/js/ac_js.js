$(function(){ 
    $('#destinataire').autocomplete({
        source:'ac_destinataire.php',
        select: function(event, ui){
            this.value=ui.item.label;
            $('#champ_cache').val(ui.item.login);
            return false;
        }
    });
});