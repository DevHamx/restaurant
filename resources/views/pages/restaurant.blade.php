<?php
$_SESSION["name"]='Restaurants';
$_SESSION["icon"]='la la-cutlery';
?>
@extends('layouts.app')
@section('content')
@include('partials.menu')
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
                                                <div class="col-md-12">
                                                        {{ Form::select('categories[]',$categories,null,['class'=>'select2 form-control select2-hidden-accessible','multiple'=>'multiple','tabindex'=>'-1', 'aria-hidden'=>'true']) }}

                                                </div>
                                            </div>
                                                </fieldset>
                                        </div>
                                            </div>
                                        </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group row mx-auto">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <p class="text-left"><h6 class="text-muted">Numéro de téléphone</h6></p>
                                                <div class="row"style="display:flex;align-items:center;">
                                                    <div class="col-md-12">
                                                        {{Form::text('phone', '',['class'=>'form-control' ,'placeholder'=>'Numéro de téléphone','autofocus'])}}
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group row mx-auto">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <p class="text-left"><h6 class="text-muted">Périods</h6></p>

                                                    <div class="row"style="display:flex;align-items:center;">
                                                        <div class="col-md-12">

<table class="table">
  <thead>
    <tr>
      <th scope="col">Day</th>
      <th scope="col">Open Hour</th>
      <th scope="col">Close Hour</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Lundi</td>
      <td>{{Form::text('periods[0][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[0][1]', '',['class'=>'form-control'])}}</td>
    </tr>
    <tr>
      <td>Mardi</td>
      <td>{{Form::text('periods[1][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[1][1]', '',['class'=>'form-control'])}}</td>
    </tr>
    <tr>
      <td>Mercredi</td>
      <td>{{Form::text('periods[2][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[2][1]', '',['class'=>'form-control'])}}</td>
    </tr>
    <tr>
      <td>Jeudi</td>
      <td>{{Form::text('periods[3][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[3][1]', '',['class'=>'form-control'])}}</td>
    </tr>
    <tr>
      <td>Vendredi</td>
      <td>{{Form::text('periods[4][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[4][1]', '',['class'=>'form-control'])}}</td>
    </tr>
    <tr>
      <td>Samedi</td>
      <td>{{Form::text('periods[5][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[5][1]', '',['class'=>'form-control'])}}</td>
    </tr>
    <tr>
      <td>Dimanche</td>
      <td>{{Form::text('periods[6][0]', '',['class'=>'form-control'])}}</td>
      <td>{{Form::text('periods[6][1]', '',['class'=>'form-control'])}}</td>
    </tr>
  </tbody>
</table>

                                                        </div>
                                                </div>

                                            </fieldset>
                                        </div>
                                    </div>
                                </div>

<div class="col-md-12">
    
    <div class="form-group row mx-auto">
        <div class="col-md-12">
            <fieldset>
                <p class="text-left"><h6 class="text-muted">Menu</h6></p>

                    <div class="row"style="display:flex;align-items:center;">
                        <div class="col-md-12">
                            
<table class="table table-condensed table-hover">
            <thead>
                <tr class="row">
                    <th class="col-md-10">Elément</th>
                    <th class="col-md-2">Prix</th>
                </tr>
            </thead>
            <tbody id="rest_menu">
                <tr class="row">
                    <td class="col-md-10"><input type="text" class="form-control" name="m_item[]" /></td>
                    <td class="col-md-2">
                    <input type="text" class="form-control" name="m_price[]" />
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="row">
                    <td class="col-md-12" colspan="2" style="text-align: right;">
                        <button id="add_menu_item" class="btn btn-success btn-sm">Ajouter element</button>
                    </td>
                </tr>
            </tfoot>
        </table>

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

                                                <input id="pac-input" class="controls" type="text"
                                                placeholder="Entrez le nom de restaurant">
                                                <div style="height: 30em " id="map" class="form-control"></div>
                                                <input type="hidden" id="place-name" name="place-name" />
                                                <input type="hidden" id="place-id" name="place-id" />
                                                <input type="hidden" id="loc-lat" name="latitude" />
                                                <input type="hidden" id="loc-lon" name="longitude" />

                                                
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
        function initMap() {


        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });
          marker.setVisible(true);
          $("#place-name").val(place.name);
          $("#place-id").val(place.place_id);
          $("#loc-lon").val(place.geometry.location.lng);
          $("#loc-lat").val(place.geometry.location.lat);
        });

      }
      </script>
      <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyCk4TstMaD3JEeFg53JceJ_Bw9u_gIV_Gg&callback=initMap' async defer></script>
<script src="{{mix('/app-assets/js/select2/select2.min.js')}}"></script>
<script>
    var url = "{{ url('/restaurant/getData') }}";

    function delete_mitem(d){
        d.closest('tr').remove();
    }

    $(document).ready(function () {

        $("#add_menu_item").on('click', function(e){
            e.preventDefault();
            $("tbody#rest_menu").append('<tr class="row">'+
                    '<td class="col-md-10"><input type="text" class="form-control" name="m_item[]" /></td>'+
                    '<td class="col-md-2"><input type="text" class="form-control" name="m_price[]" /><input type="button" onclick="delete_mitem(this)" class="mt-1 btn btn-danger btn-block btn-sm" value="Supprimer" /></td>'+
                '</tr>');
        });


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
$('[name="phone"]')[0].value=rowSelected.phone;
for(i=0; i<=6; i++){
    $('[name="periods['+i+'][0]"]')[0].value=rowSelected.periods[i][0];
    $('[name="periods['+i+'][1]"]')[0].value=rowSelected.periods[i][1];
}
var values=rowSelected.name_category;
if(values!=""){
    $.ajax({
            url: '/restaurant/getCategories/'+rowSelected.id,
            type: "GET",
            dataType: "json",
            success:function(data) { 
            $('select[name="categories[]"]').empty();
            $.each(data, function(key, value) {
                $('select[name="categories[]"]').append('<option selected value="'+ key +'">'+ value +'</option>');
            });
            }
    });
}
else{$('select[name="categories[]"]').empty();}

$.ajax({
    url: '/restaurant/getMenu/'+rowSelected.id,
        type: "GET",
        dataType: "json",
        success:function(data) { 
            $("tbody#rest_menu").empty();
            $.each(data, function(idx, rmenu) {
                $("tbody#rest_menu").append('<tr class="row">'+
                        '<td class="col-md-10"><input type="text" class="form-control" name="m_item[]" value="'+rmenu.item+'" /></td>'+
                        '<td class="col-md-2"><input type="text" class="form-control" name="m_price[]" value="'+rmenu.price+'" /><input type="button" onclick="delete_mitem(this)" class="mt-1 btn btn-danger btn-block btn-sm" value="Supprimer" /></td>'+
                    '</tr>');
            });
            $("tbody#rest_menu").append(`<tr class="row">
                    <td class="col-md-10"><input type="text" class="form-control" name="m_item[]" /></td>
                    <td class="col-md-2">
                    <input type="text" class="form-control" name="m_price[]" />
                    </td>
                </tr>`);
    }
});

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
