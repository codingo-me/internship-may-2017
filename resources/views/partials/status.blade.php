@if(session()->has('message'))
    <div class="alert alert-{{ session()->get('status') }} status-box">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        {{ session()->get('message') }}
    </div>
@endif