@if(session('message'))

    <div class="alert alert-{{session('alert-type')}} alert-dismissible fade show" role="alert" id="alert-session">

    {{session('message')}}
{{--        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float: right">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
    </div>

    @endif
