(function($){
    $(document).ready(function(){
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

    });
})(jQuery)
