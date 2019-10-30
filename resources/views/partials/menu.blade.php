
<div style="display:flex;align-items:center;" class="menu-card main-card content-header bootstrap-row-modifier mb-1">
    <div class="content-header-left col-md-6 col-12">
            <i class="{{ $class }} la-2x"></i>
        <h3 class= "content-header-title"> <span>{{ $title }}</span></h3>
    </div>
    <div class="content-header-right col-md-6 col-12">
        <a id="ajouterBtn"><i style="margin-bottom: 0;float: right;" class="la la-plus la-2x"></i></a>
</div>
</div>
@push('scriptsMenu')
<script>
    $(function() {  
            $( "#ajouterBtn" ).tooltip({  
            items: "a",
            content: "<strong>Ajouter {{ $title }}</strong>",  
            track:true  
            })
        });
        $('#ajouterBtn').on('click', function() {
            $('#infoDiv').fadeIn('slow','linear');
            $(this).fadeOut('slow','linear');
        });
</script>
@endpush
