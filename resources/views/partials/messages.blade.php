@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-icon-left alert-arrow-left alert-danger alert-dismissible mb-2 main-card" role="alert">
        <span class="alert-icon"><i class="la la-warning"></i></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ $error }}</strong>
    </div>     
    @endforeach 
@endif
@if (session('success'))
<div class="alert alert-icon-left alert-success alert-dismissible mb-2 main-card" role="alert">
    <span class="alert-icon"><i class="la la-thumbs-o-up"></i></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>{{session('success')}}</strong>
</div>
@endif
@if (session('error'))
<div class="alert alert-icon-left alert-danger alert-dismissible mb-2 main-card" role="alert">
    <span class="alert-icon"><i class="la la-warning"></i></span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>{{session('error')}}</strong>
</div>
@endif