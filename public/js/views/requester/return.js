


/*
|--------------------------------------------------------------------------
| Hides & Shows SN Replace input
|--------------------------------------------------------------------------
*/
$( ".select-return-condition" ).on( "change", function ( event ) {
    let select = $( event.currentTarget );
    let value = select.val();
    let inputReturnSnParent = select.closest( "tr" ).find( ".input-return-sn-parent" );
    let inputReturnNote = select.closest( "tr" ).find( ".input-return-note" );
    let inputReturnSn = select.closest( "tr" ).find( ".input-return-sn" );
    
    function Good () {
        inputReturnSnParent.html( '<input type="hidden" class="input-return-sn form-control mt-2" placeholder="New SN.." form="form-return-item" name="sn_code[]" readonly required>' );
        inputReturnSn.val( null );
        inputReturnNote.val( null );
        inputReturnNote.attr( "readonly", true );
    }

    function UsedNotGood () {
        inputReturnSnParent.html( '<input type="hidden" class="input-return-sn form-control mt-2" placeholder="New SN.." form="form-return-item" name="sn_code[]" readonly required>' );
        inputReturnSn.val( null );
        inputReturnNote.removeAttr( "readonly" );
    }
    
    function Replace () {
        inputReturnSnParent.html( '<input type="text" class="input-return-sn form-control mt-2" placeholder="New SN.." form="form-return-item" name="sn_code[]" required>' );
        inputReturnNote.removeAttr( "readonly" );
    }

    switch ( value ) {
        case "good":
            Good();
            break;
    
        case "used":
            UsedNotGood();
            break;
    
        case "replace":
            Replace();
            break;
    
        case "not good":
            UsedNotGood();
            break;
    }
} );