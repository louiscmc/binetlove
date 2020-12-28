$(function(){ 
    $('#prenom').autocomplete({source:'ac_destinataire.php?id=prenom'});
});

$(function(){ 
    $('#nom').autocomplete({source:'ac_destinataire.php?id=nom'});
});

$(function(){ 
    $('#section').autocomplete({source:'ac_destinataire.php?id=section'});
});

$(function(){ 
    $('#promotion').autocomplete({source:'ac_destinataire.php?id=promotion'});
});




