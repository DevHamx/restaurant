
<div style="display:flex;align-items:center;margin-top: 70px;" class="menu-card main-card content-header bootstrap-row-modifier mb-1 navbar navbar-fixed">
    <div class="content-header-left col-md-6 col-12">
            <i class="{{ $class }} la-2x"></i>
        <h3 class= "content-header-title"> <span>{{ $title }}</span></h3>
    </div>
    <div class="content-header-right col-md-6 col-12">
        @if ($class!='la la-home')
            <a id="ajouterBtn"><i style="margin-left: 0.7em;margin-bottom: 0;float: right;" class="la la-plus la-2x"></i></a>
        @endif
        @if ($class=='la la-cutlery')
            <a id="mapButton" data-toggle="modal" data-target="#mapModel"><i style="margin-bottom: 0;float: right;" class="la la-map-marker la-2x"></i></a>
        @endif
</div>
</div>
@push('scriptsMenu')
<script>
    $(function() {  
            $( "#ajouterBtn" ).tooltip({  
            items: "a",
            content: "<strong>Ajouter {{ $title }}</strong>",  
            track:true  
            }),
            $( "#mapButton" ).tooltip({  
            items: "a",
            content: "<strong>Adresse</strong>",  
            track:true  
            })
        });
        $('#ajouterBtn').on('click', function() {
            $('#infoDiv').fadeIn('slow','linear');
            $(this).fadeOut('slow','linear');
        });
</script>
@endpush
