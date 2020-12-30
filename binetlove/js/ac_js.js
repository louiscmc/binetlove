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

function addText(event) {
    var targ = event.target || event.srcElement;
    document.getElementById("contenu").value += targ.textContent || targ.innerText;
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

