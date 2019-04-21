var form = $('#form'); //form id here
form.submit(function(event) {
    event.preventDefault();
    var form_status = $('<div class="form_status"></div>');
    var $form = $(this);
    $.ajax({
        type: 'POST',
        url: "contato.php",
        data: {
            Name: $("#nome").val(),
            Email: $("#email").val(),
            Mensagem: $("#mensagem").val(),
            Assunto: $("#assunto").val()          
        },
        beforeSend: function() {
            form.append(form_status.html('Enviando...').fadeIn());
        }
    }).done(function(data) {
        form_status.html('Email enviado!').delay(3210).fadeOut();
    });
    //delete messages when submit
    document.getElementById("nome").value = "";
    document.getElementById("email").value = "";
    document.getElementById("mensagem").value = "";
    document.getElementById("assunto").value = "";

});