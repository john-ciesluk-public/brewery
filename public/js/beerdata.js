$(document).ready(function() {

    function split( val ) {
        return val.split( /,\s*/ );
    }
    function extractLast( term ) {
        return split( term ).pop();
    }

    /* Get Hops */
    $.ajax({
        type: "GET",
        url: "/admin/beers/getHops",
        data: ''
    }).done(function( response ) {
        var hops = jQuery.parseJSON(response);
        console.log(hops);
        $.each( hops, function( key, value ) {
          console.log( key + ": " + value );
        });
    });

    $( "#hops" )
    // don't navigate away from the field on tab when selecting an item
    .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        minLength: 0,
        source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            response( $.ui.autocomplete.filter(
            hops, extractLast( request.term ) ) );
        },

        //    source:projects,
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {

            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( ", " );

            var selected_id = ui.item.id;

            var ids = $('#hopsIds').val();

            if(ids == "")
            {
                $('#hopsIds').val(selected_id);
            }
            else
            {
                $('#hopsIds').val(ids+","+selected_id);
            }

            return false;
        }
    });

    /* Get Malts */
    $.ajax({
        type: "GET",
        url: "/admin/beers/getMalts",
        data: ''
    }).done(function( response ) {
        var malts = jQuery.parseJSON(response);
    });

    $( "#malts" )
    // don't navigate away from the field on tab when selecting an item
    .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
        }
    })
    .autocomplete({
        minLength: 0,
        source: function( request, response ) {
            // delegate back to autocomplete, but extract the last term
            response( $.ui.autocomplete.filter(
            malts, extractLast( request.term ) ) );
        },

        //    source:projects,
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        select: function( event, ui ) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( ", " );

            var selected_id = ui.item.id;

            var ids = $('#maltsIds').val();

            if(ids == "")
            {
                $('#maltsIds').val(selected_id);
            }
            else
            {
                $('#maltsIds').val(ids+","+selected_id);
            }

            return false;
        }
    });
});
