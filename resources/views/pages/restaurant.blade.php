@extends('layouts.app')
@section('content')
@component('partials.menu')
    @slot('class')
        la la-cutlery
    @endslot
    @slot('title')
        Restaurants
    @endslot
@endcomponent
@include('partials.messages')
<link rel="stylesheet" type="text/css" href="{{mix('/app-assets/css/select2/select2.min.css')}}">
<section id="horizontal-form-layouts">
    <div class="row">
        <div class="col-md-12">
            <div class="card main-card">
                <div class="card-header">
                        <div class="form-inline">
                            <div style="display:flex;align-items:center;"><i class="la la-info icon-card-title"></i>
                                <h3 class="card-title" style="margin-right: 20px">Informations du Restaurant</h3></div>
                        </div>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a id="reset"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                {{ Form::open(['action' => 'RestaurantsController@restaurantOperations','methode' => 'POST','id'=>'form_restaurants']) }}
                        <div class="form form-horizontal row-separator">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group row mx-auto last">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <p class="text-left"><h6 class="text-muted">Nom</h6></p>
                                                <div class="input-group">
                                                    {{ Form::hidden('id', '') }}
                                                    {{Form::text('name', '',['class'=>'form-control' ,'placeholder'=>'Nom','autofocus'])}}                                                                
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon4"><i class="la la-edit"></i></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                        <div class="form-group row mx-auto">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <p class="text-left"><h6 class="text-muted">Email de Résérvation</h6></p>
                                                    <div class="input-group">
                                                        {{Form::email('bookingEmail', '',['class'=>'form-control' ,'placeholder'=>'Email de Résérvation','autofocus'])}}                                                                
                                                        <div class="input-group-append">
                                                            <span class="input-group-text" id="basic-addon4"><i class="la la-edit"></i></span>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group row mx-auto">
                                                    <div class="col-md-12">
    
                                                <fieldset>
                                                <p class="text-left"><h6 class="text-muted">Categories</h6></p>
                                                <div class="row"style="display:flex;align-items:center;">
                                                <div id="divCategories" class="col-md-12">
                                                        {{ Form::select('categories[]',$categories,null,['id'=>'categories','class'=>'select2 form-control select2-hidden-accessible','multiple'=>'multiple','tabindex'=>'-1', 'aria-hidden'=>'true']) }}

                                                </div>
                                            </div>
                                                </fieldset>
                                        </div>
                                            </div>
                                        </div>
                            </div>
                            <div style="display: block"  class="row">
                                <div style="margin-left:auto;margin-right:auto;" class="col-md-8">
                                        <p class="text-left"><h6 class="text-muted">Adresse</h6></p>
                                        <div class="form-group row mx-auto">
                                                <div style="height: 30em " id="map" class="form-control"></div>
                                        </div>
                                </div>
                                
                            </div>
                                <table class="submit-table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                {{ Form::button('<i class="la la-plus icon-submit-table"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-square btn-outline-primary','name'=>'action','value'=>'Ajouter','id'=>'ajouter'] ) }}
                                            </td>
                                            <td>
                                                {{ Form::button('<i class="la la-edit icon-submit-table"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-square btn-outline-primary','name'=>'action','value'=>'Modifier','id'=>'modifier'] ) }}
                                            </td>
                                            <td>
                                                {{ Form::button('<i class="la la-trash icon-submit-table"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-square btn-outline-primary','name'=>'action','value'=>'Supprimer','id'=>'supprimer','onclick'=>'return confirm("Êtes-vous sûr de vouloir supprimer cette restaurant?")'] ) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="bootstrap3">
    <div class="row">
        <div class="col-12">
            <div class="card main-card">
                <div class="card-header">
                    <div style="display:flex;align-items:center;"><i class="la la-bars icon-card-title"></i>
                        <h3 class="card-title">Liste des Restaurants</h3></div>
                        <a class="card-minus" data-action="collapse"><i class="ft-minus"></i></a>   
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <div id="user_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered bootstrap-3" id="restaurant_table" role="grid" aria-describedby="user_table_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="display: none;" tabindex="1" aria-sort="descending">updated at</th>
                                                    <th style="display: none;" class="sorting" tabindex="2" rowspan="1" colspan="1" >Id</th>                                                        
                                                    <th class="sorting" tabindex="2" rowspan="1" colspan="1" >Nom</th>
                                                    <th class="sorting" tabindex="2" rowspan="1" colspan="1" >Email de Résérvation</th>
                                                    <th class="sorting" tabindex="4" rowspan="1" colspan="1" >Categorie(s)</th>
                                                    <th class="sorting" tabindex="2" rowspan="1" colspan="1" >Longitude</th>
                                                    <th class="sorting" tabindex="2" rowspan="1" colspan="1" >Latitude</th>
                                                    </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
        var map;
        function initMap() {
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
          });
        }
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWrVKdYX_YEMDK_vzv8GfelXNvbHH0DW8&callback=initMap"
      async defer></script>
<script src="{{mix('/app-assets/js/select2/select2.min.js')}}"></script>
<script>
    var url = "{{ url('/restaurant/getData') }}";
    $(document).ready(function () {
        var table =$('#restaurant_table').DataTable({
processing:true,
serverSide:true,
select : true,
/*
language: {
    url : "{{ URL::asset('app-assets/languages/datatable-fr.json') }}"
},
*/
order :[],
ajax:{
    url: url,
},
columns:[
    {data: 'updated_at',name: 'updated_at',visible:false},
    {data: 'id',name: 'id',visible:false},
    {data: 'name',name: 'name'},
    {data: 'bookingEmail',name: 'bookingEmail'},
    {data: 'name_category',name: 'name_category'},
    {data: 'longitude',name: 'longitude'},
    {data: 'latitude',name: 'latitude'},

]
});
table.on('click', 'tbody tr', function() {
var rowSelected = table.row(this).data();
$('[name="id"]')[0].value=rowSelected.id;
$('[name="name"]')[0].value=rowSelected.name;
$('[name="bookingEmail"]')[0].value=rowSelected.bookingEmail;
var values=rowSelected.name_category;
if(values!=""){
$.ajax({
        url: '/restaurant/getCategories/'+rowSelected.id,
        type: "GET",
        dataType: "json",
        success:function(data) { 
        //$('select[name="categories[]"]').empty();
        $.each(data, function(key, value) {
            $('select#categories option[value="'+key+'"]').remove();
            $('select[name="categories[]"]').append('<option selected value="'+ key +'">'+ value +'</option>');
            //$('option[value="'+key+'"]').attr('selected','selected');
        });
        }
    });
}
else{
    $( "div#divCategories" ).find(".select2-selection__rendered .select2-selection__choice").remove();
    $('select#categories option').removeAttr("selected");}

});
$("#reset").click(function() {
$("#form_restaurants")[0].reset();
}); 
});     
</script>
<!-- Laravel Javascript Validation -->
{!! $validator->selector('#form_restaurants') !!}
    @endpush
@endsection
