(function($){
    $(document).ready(function(){
        /**
         * add ck editor
         */
        CKEDITOR.replace( 'post_editor');

        //select 2
        $('.post-tag-select').select2();

        //logout features
        $(document).on('click', '#user_logout_btn', function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });

        /**
         * change category status
         */
        $(document).on('change', '.cat_check', function(){
            let checked = $(this).attr('checked');
            let status_id = $(this).attr('status_id');


            if(checked == 'checked'){
                $.ajax({
                    url: 'category/status-inactive/'+status_id,
                    success: function(data){
                        swal('Status inactive successfully.');
                    }
                });
            }else{
                $.ajax({
                    url: 'category/status-active/'+status_id,
                    success: function(data){
                        swal("Status active successfully.")
                    }
                });
            }
        });

        /**
         * delete category
         */
        $(document).on('click', '.delete-btn', function(){
            let conf = confirm('Are u sure?');

            if(conf == true){
                return true;
            }else{
                return false;
            }
        });

        /**
         * categoty edit
         */
        $(document).on('click', '#edit_cat', function(e){
            e.preventDefault();

            let id = $(this).attr('edit_id');

            $.ajax({
                url: 'category/'+id+'/edit',
                success: function(data){
                    $('#edit-category-modal form input[name="name"]').val(data.name);
                    $('#edit-category-modal form input[name="edit_id"]').val(data.id);
                    $('#edit-category-modal').modal('show');
                }
            });
        });

        /**
         * post img load
         */
        $(document).on('change', '#feature-image', function(e){
            let image = URL.createObjectURL(e.target.files[0]);
            $('.post-img-load').attr('src', image);
        });

        /**
         * gallery image
         */
        $(document).on('change', '#gallery-image', function(e){
            let img_gal = '';
            for(let i = 0;i<e.target.files.length;i++){
                let file_url = URL.createObjectURL(e.target.files[i]);
                img_gal += '<img src="'+file_url+'" class="shadow">';
            }
            $('.post-gallery-img').html(img_gal);
        });


        /**
         * select post format
         */
        $(document).on('change', '#post_format', function(e){
            let format = $(this).val();
            if(format == 'Image'){
                $('.post_image').show();
            }else{
                $('.post_image').hide();
            }

            if(format == 'Gallery'){
                $('.post_gallery').show();
            }else{
                $('.post_gallery').hide();
            }

            if(format == 'Video'){
                $('.post_video').show();
            }else{
                $('.post_video').hide();
            }

            if(format == 'Audio'){
                $('.post_audio').show();
            }else{
                $('.post_audio').hide();
            }
        });
    });
})(jQuery)
