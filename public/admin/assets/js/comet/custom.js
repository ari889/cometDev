(function($){
    $(document).ready(function(){
        //logout features
        $(document).on('click', '#user_logout_btn', function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });
    });
})(jQuery)
