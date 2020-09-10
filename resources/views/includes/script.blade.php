<script src="{{asset('js/app.js')}}" defer></script>
<script src="{{asset('js/sidebar.js')}}" defer></script>
<script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script>
    ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
