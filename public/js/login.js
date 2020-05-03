$(function(){

    $('#load').hide();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#form').submit(function(e){
        $('#load').show();
        $('#info').html('');
        e.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();

        $.post('/admin/login',{username, password}, function(data){

                if(data.register){
                    $('#load').hide();
                    window.location.href = '/admin';
                }else{
                    $('#info').append(' <i class="fa fa-warning" style="color: #d3220f"></i> '+data.response)
                    $('#load').hide();
                }
            }
        );


    })

});
