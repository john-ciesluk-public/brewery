
$('.events-modal').on('click', function() {
    var title = $(this).parent().find('.title').val();
    var description = $(this).parent().find('.description').val();
    $("#events-modal-title").html(title);
    $("#events-modal-description").html(description);
});


$('.btn-subscribe').on('click',function(e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/subscribe",
        data: $('#subscribe-form').serialize()
    }).done(function( msg ) {
        $("#eventsModal").modal();
        $(".events-modal-body").html("<h2 class='modal-padding'>" + msg + "</h2>");
        $('#eventsModal').fadeOut('slow');

        setTimeout(function() {
            $("#eventsModal").modal('hide');
        }, 2500);

    }).fail(function(data) {
        $.each(data.responseJSON, function(key,value) {
            console.log(key);
            console.log(value);
        });
    });
});

$('.btn-unsubscribe-modal').on('click',function(e) {
    $("#unsubscribeModal").modal();
});
$('.btn-unsubscribe').on('click',function(e){
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: "/unsubscribe",
        data: $('#unsubscribe-form').serialize()
    }).done(function( msg ) {
        $(".alert-unsubscribe").show().html(msg);
    });
});

$('.btn-contact-send').on('click',function(e){
    $(".alert-message-valid").hide();
    $(".alert-message-invalid").hide();
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/send",
        data: $('#contact-form').serialize(),
        dataType: "json",
    }).done(function( msg ) {
        if (msg.valid === true) {
            $(".alert-message-valid").show();
            $(".alert-message-valid").html(msg.message);
        } else {
            $(".alert-message-invalid").show();
            $(".alert-message-invalid").html(msg.message);
        }
    });
});
