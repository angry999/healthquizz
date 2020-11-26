<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Radiant Shenti') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/logo.jpg">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css" rel="stylesheet" />
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" /> -->
    </head>
    <body class="{{ $class ?? '' }}">
        
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest     
   
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
        <!-- Core JS Files -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>               
        
        <!-- Chartist JS -->
        <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
        
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        
        <script type="text/javascript">

            $(document).on('ready', function() {
        
                console.log('HELLO!');
        
                $('.id-parent').perfectScrollbar();
        
            });
        
        </script>
          <script>
  
  //Add Input Fields
  $(document).ready(function() {
      var max_fields = 100; //Maximum allowed input fields 
      var wrapper    = $(".wrapper1"); //Input fields wrapper
      var add_button = $(".add_fields"); //Add button class or ID
    var x = 1; //Initlal input field is set to 1
    
    //When user click on add input button
    $(add_button).click(function(e){
          e.preventDefault();
      //Check maximum allowed input fields
          if(x < max_fields){ 
              x++; //input field increment
         //add input field
              $(wrapper).append('<div><input class="form-control"  type="text" name="answers[]" placeholder="Answer" /> <a href="javascript:void(0);" class="remove_field" style="position: relative;top: -27px;float: right;">Remove</a></div>');
          }
      });
    
      //when user click on remove button
      $(wrapper).on("click",".remove_field", function(e){ 
          e.preventDefault();
          $(this).parent('div').remove(); //remove inout field
          x--; //inout field decrement
          })
      });
      
        $('.username').change(function(){      
            if($(this).val() != '')
            {
                var value = $(this).val();
                console.log(value);
                // $('input[name=addclass]').attr('checked', true);

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{ route('permission.fetch') }}",
                    method:"POST",
                    data:{ user_id:value, _token:_token },
                    success:function(result)
                    {
                        var myJSON = JSON.parse(result);
                        for (i in myJSON) {
                            console.log(myJSON[i].permission_name);
                            console.log(myJSON[i].permission_value);
                            var name = myJSON[i].permission_name;
                            var value = myJSON[i].permission_value;
                            // $('input[name=name]').attr('checked', value);
                            if (value == 1) {
                                value = true;
                            } else {
                                value = false;
                            }
                            $('input[name='+name+']').attr('checked', value);
                        }
                    }        
                })
            }
        });
        
    </script>
    </body>
</html>