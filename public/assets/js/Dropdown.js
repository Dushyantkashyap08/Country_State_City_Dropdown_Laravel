
$(document).ready(function(){
  $('#country').change(function(){
    let cid= $(this).val();
    $.ajax({
        url: '/getstate',
        type:'post',
        data: {
            cid: cid,
            _token: '{{ csrf_token() }}'
        },
        success:function(result){
            $('#state').html(result)
        }

    });
  });
});
