<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropdown Country State City</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
</head>
<!--body starts here-->
<body>
    <!--heading starts here-->
    <h1 class="heading">Country_State_City_Dropdown_In_Laravel</h1>
    <!--heading ends here-->

    <!--main starts here-->
    <div class="main">
        <!--country starts here-->
        <select name="country" class="dropdown" id="country">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
            <option value="{{$country->id}}">{{$country->country_name}}</option>
            @endforeach
        </select>
        <!--country ends here-->

        <!--state starts here-->
        <select name="state" class="dropdown" id="state">
            <option value="">Select State</option>
        </select>
        <!--state ends here-->

        <!--city starts here-->
        <select name="city"  class="dropdown" id="city">
            <option value="">Select City</option>
        </select>
        <!--city ends here-->
    </div>
    <!--main ends here-->

    <!--script starts here-->
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#country').change(function(){
                var cid=$(this).val();
                $('#city').html('<option value="">Select City</option>')
                $.ajax({
                    url:'{{url("/getstate")}}',
                    type:'post',
                    data:'cid='+cid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#state').html(result)
                    }
                });
            });

            $('#state').change(function(){
                var sid=$(this).val();
                $.ajax({
                    url:'{{url("/getcity")}}',
                    type:'post',
                    data:'sid='+sid+'&_token={{csrf_token()}}',
                    success:function(result){
                        $('#city').html(result)
                    }
                });
            });
        });
    </script>
    <!--script ends here-->
</body>
<!--body ends here-->
</html>
<!--html ends here-->