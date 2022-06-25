(function($){
    $(document).ready(function(){
        // Delete Script
        $(document).on('click', '#delete', function(e){
            e.preventDefault();
            let link = $(this).attr('href');

            Swal.fire({
            title: 'Are you sure?',
            text: "Delete this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })

        });

        // Logo Image Preview
        $('#logo_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.logo_image_preview').attr('src', imageURL);
        });

        // Favicon Image Preview
        $('#favicon_image_load').change(function(e){
            e.preventDefault();
            let imageURL = URL.createObjectURL(e.target.files[0]);
            $('.favicon_image_preview').attr('src', imageURL);
        });

    });
})(jQuery);
