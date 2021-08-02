( function( $ ) {
    let booking = setInterval( function() {
        if ( $( '.el-select-dropdown__item' ).length ) {
            $( '.el-select-dropdown__item' )[0].click();
            $( '.el-select-dropdown__item' ).on( 'click', function(){
                $('.el-form-item').css( 'display', 'none' );
                clearInterval( booking );
            } );
        }
    }, 1000 );
} ( jQuery ));

