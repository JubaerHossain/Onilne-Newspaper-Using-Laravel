
<!-- Jquery Core Js -->
<script src="{{ asset('assets/backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('assets/backend/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Select Plugin Js -->

<!-- Slimscroll Plugin Js -->
<script src="{{ asset('assets/backend/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('assets/backend/plugins/node-waves/waves.js')}}"></script>

<!-- Custom Js -->
{{--
<script src="{{ asset('assets/backend/js/admin.js') }}"></script>
--}}


<!-- Demo Js -->
<script src="{{ asset('assets/backend/js/demo.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}','Error',{
        closeButton:true,
        progressBar:true,
    });
    @endforeach
    @endif
</script>
