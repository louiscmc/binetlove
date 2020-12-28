$(function(){ 
    $('#destinataire').autocomplete({
        source:'ac_destinataire.php',
        select: function(event, ui){
            var destchoisi = ui.item;
            $destinataire = destchoisi.login;
            $("#desinataire").val(destchoisi.label);  
        }
    });
});