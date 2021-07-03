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

    });
})(jQuery)
