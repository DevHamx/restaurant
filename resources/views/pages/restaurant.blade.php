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
<link rel="stylesheet" href="{{asset('/app-assets/css/bootstrap-timepicker.min.css')}}">
<style type="text/css">
    .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }
.controls:focus {
border-color: #4d90fe;
}
</style>
<section id="horizontal-form-layouts">
    <div id="infoDiv" style="{{$restaurant->id==null?'display:none;':''}}"  class="row">
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
                                                    {{Form::text('name', $restaurant->name,['class'=>'form-control' ,'placeholder'=>'Nom','autofocus'])}}                                                                
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
                                                        {{Form::email('bookingEmail', $restaurant->bookingEmail,['class'=>'form-control' ,'placeholder'=>'Email de Résérvation','autofocus'])}}                                                                
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
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group row mx-auto">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <p class="text-left"><h6 class="text-muted">Numéro de téléphone</h6></p>
                                                <div class="row"style="display:flex;align-items:center;">
                                                    <div class="col-md-12">
                                                        {{Form::text('phone', $restaurant->phone,['class'=>'form-control' ,'placeholder'=>'Numéro de téléphone','autofocus'])}}
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
      <td>{{Form::text('periods[0][0]', $restaurant->periods[0][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[0][1]', $restaurant->periods[0][1],['class'=>'form-control timepicker'])}}</td>
    </tr>
    <tr>
      <td>Mardi</td>
      <td>{{Form::text('periods[1][0]', $restaurant->periods[1][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[1][1]', $restaurant->periods[1][1],['class'=>'form-control timepicker'])}}</td>
    </tr>
    <tr>
      <td>Mercredi</td>
      <td>{{Form::text('periods[2][0]', $restaurant->periods[2][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[2][1]', $restaurant->periods[2][1],['class'=>'form-control timepicker'])}}</td>
    </tr>
    <tr>
      <td>Jeudi</td>
      <td>{{Form::text('periods[3][0]', $restaurant->periods[3][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[3][1]', $restaurant->periods[3][1],['class'=>'form-control timepicker'])}}</td>
    </tr>
    <tr>
      <td>Vendredi</td>
      <td>{{Form::text('periods[4][0]', $restaurant->periods[4][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[4][1]', $restaurant->periods[4][1],['class'=>'form-control timepicker'])}}</td>
    </tr>
    <tr>
      <td>Samedi</td>
      <td>{{Form::text('periods[5][0]', $restaurant->periods[5][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[5][1]', $restaurant->periods[5][1],['class'=>'form-control timepicker'])}}</td>
    </tr>
    <tr>
      <td>Dimanche</td>
      <td>{{Form::text('periods[6][0]', $restaurant->periods[6][0],['class'=>'form-control timepicker'])}}</td>
      <td>{{Form::text('periods[6][1]', $restaurant->periods[6][1],['class'=>'form-control timepicker'])}}</td>
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

                            <div class="accordion" id="accordionRestoMenu">
@for ($i = 0; $i < sizeof($restaurant->menus); $i++)
<div class="card" style="margin-bottom: 15px;">
    <div class="card-header" id="heading0" style="padding: 0px !important;">
      <h2 class="mb-0">
      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse0">
            {{$restaurant->menus[$i]->title}} 
        </button>
        <button onclick="delete_m_menu(this)" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
      </h2>
    </div>

    <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordionRestoMenu">
      <div class="card-body">
        <input type="text" name="m_menu[]" placeholder="Titre de menu" class="form-control menu-title" /><br />
        <table class="table table-condensed table-hover">
            <thead>
                <tr class="row">
                    <th class="col-md-10">Elément</th>
                    <th class="col-md-2">Prix</th>
                </tr>
            </thead>
            <tbody id="rest_menu">
                @for ($j = 0; $j < sizeof($restaurant->menus[$i]->menuItems); $j++)
                <tr class="row">
                    <td class="col-md-10"><input value="{{$restaurant->menus[$i]->menuItems[$j]->item}}" type="text" class="form-control" name="m_item[{{$i}}][]" /></td>
                    <td class="col-md-2">
                    <input type="text" value="{{$restaurant->menus[$i]->menuItems[$j]->price}}" class="form-control" name="m_price[{{$i}}][]" />
                    </td>
                </tr> 
                @endfor
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
</div>
@endfor                        


                            </div>

    <button id="add_menu" class="btn btn-success btn-sm">Ajouter menu</button>
                        

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

                                                <!--<input id="pac-input" class="controls" type="text"
                                                placeholder="Entrez le nom de restaurant">-->
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
    var map;
    var marker;
    var faisalabad = {lat: -33.8688, lng: 151.2195};

    function addYourLocationButton(map, marker) {
    var controlDiv = document.createElement('div');

    var firstChild = document.createElement('button');
    firstChild.style.backgroundColor = '#fff';
    firstChild.style.border = 'none';
    firstChild.style.outline = 'none';
    firstChild.style.width = '38px';
    firstChild.style.height = '38px';
    firstChild.style.borderRadius = '2px';
    firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
    firstChild.style.cursor = 'pointer';
    firstChild.style.marginRight = '10px';
    firstChild.style.padding = '0px';
    firstChild.title = 'Your Location';
    controlDiv.appendChild(firstChild);

    var secondChild = document.createElement('div');
    secondChild.style.margin = '0 auto';
    secondChild.style.width = '18px';
    secondChild.style.height = '18px';
    secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
    secondChild.style.backgroundSize = '180px 18px';
    secondChild.style.backgroundPosition = '0px 0px';
    secondChild.style.backgroundRepeat = 'no-repeat';
    secondChild.id = 'you_location_img';
    firstChild.appendChild(secondChild);

    google.maps.event.addListener(map, 'dragend', function() {
        $('#you_location_img').css('background-position', '0px 0px');
    });

    firstChild.addEventListener('click', function(e) {
        e.preventDefault();
        var imgX = '0';
        var animationInterval = setInterval(function(){
            if(imgX == '-18') imgX = '0';
            else imgX = '-18';
            $('#you_location_img').css('background-position', imgX+'px 0px');
        }, 500);
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                $("#loc-lon").val(position.coords.longitude);
                $("#loc-lat").val(position.coords.latitude);
                marker.setPosition(latlng);
                map.setZoom(16);
                map.setCenter(latlng);
                clearInterval(animationInterval);
                $('#you_location_img').css('background-position', '-144px 0px');
            });
        }
        else{
            clearInterval(animationInterval);
            $('#you_location_img').css('background-position', '0px 0px');
        }
    });

    controlDiv.index = 1;
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
}

    function initMap() {

    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 16
    });

    

    marker = new google.maps.Marker({
        map:map,
        draggable:true,
        position: {lat: -33.8688, lng: 151.2195}
    });

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        $("#loc-lon").val(position.coords.longitude);
        $("#loc-lat").val(position.coords.latitude);
        map.setCenter(pos);
        marker.setPosition(pos);
      }, function() {
        //handleLocationError(true, infoWindow, map.getCenter());
      });
    }

    addYourLocationButton(map, marker);

    /*var input = document.getElementById('pac-input');

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);*/

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);

    marker.addListener('click', function() {
      infowindow.open(map, marker);
    });

    google.maps.event.addListener(marker, 'dragend', function() {
        pos = marker.getPosition();
        $("#loc-lon").val(marker.getPosition().lng());
        $("#loc-lat").val(marker.getPosition().lat());
    });

    /*autocomplete.addListener('place_changed', function() {
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
      //marker.draggable = true;
      $("#place-name").val(place.name);
      $("#place-id").val(place.place_id);
      $("#loc-lon").val(place.geometry.location.lng);
      $("#loc-lat").val(place.geometry.location.lat);
    });*/

  }
  </script>
      <script type="text/javascript" src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyAaKahIho8wMI6UUS1a3Y32Dhj9RDZRCCk&callback=initMap' async defer></script>
<script src="{{mix('/app-assets/js/select2/select2.min.js')}}"></script>
<script src="{{asset('/app-assets/js/bootstrap-timepicker.min.js')}}"></script>
<script>
    var url = "{{ url('/restaurant/getData') }}";

    function delete_mitem(d){
        d.closest('tr').remove();
    }

    function delete_m_menu(d){
        d.closest('div.card').remove();
    }

    function change_menu_title(d){
        d.closest('div.card').find('h2 button').text( $(this).val() );
    }

    $(document).ready(function () {
        if ({{$restaurant->id!=null?'true':'false'}}) {
            var pos = {
          lat: {{$restaurant->latitude==null?0:$restaurant->latitude}},
          lng: {{$restaurant->longitude==null?0:$restaurant->longitude}}
            };
            $("#loc-lon").val({{$restaurant->longitude}});
            $("#loc-lat").val({{$restaurant->latitude}});
            map.setCenter(pos);
            marker.setPosition(pos);
        }
        

        $('.timepicker').timepicker({
});

        $(document).on('keyup', ".menu-title", function () {
            if( $.trim( $(this).val() )  != '' )
                $(this).closest('div.card').find('h2 button.btn-link').text( $(this).val() );
        });

        $(document).on('click', "button#add_menu_item", function(e){
            e.preventDefault();
            var idx = $("#accordionRestoMenu .card").length-1;
            $(this).closest('table').find("tbody#rest_menu").append('<tr class="row">'+
                    '<td class="col-md-10"><input type="text" class="form-control" name="m_item['+idx+'][]" /></td>'+
                    '<td class="col-md-2"><input type="text" class="form-control" name="m_price['+idx+'][]" /><input type="button" onclick="delete_mitem(this)" class="mt-1 btn btn-danger btn-block btn-sm" value="Supprimer" /></td>'+
                '</tr>');
        });


        $("button#add_menu").on('click', function(e){
            e.preventDefault();
            var idx = $("#accordionRestoMenu .card").length;
            $("#accordionRestoMenu").append(`<div class="card" style="margin-bottom: 15px;">
    <div class="card-header" id="heading${idx}" style="padding: 0px !important;">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${idx}" aria-expanded="true" aria-controls="collapse${idx}">
            Menu #${idx+1} 
        </button> <button onclick="delete_m_menu(this)" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
      </h2>
    </div>

    <div id="collapse${idx}" class="collapse" aria-labelledby="heading${idx}" data-parent="#accordionRestoMenu">
      <div class="card-body">
        <input type="text" name="m_menu[]" placeholder="Titre de menu" class="form-control menu-title" /><br />
        <table class="table table-condensed table-hover">
            <thead>
                <tr class="row">
                    <th class="col-md-10">Elément</th>
                    <th class="col-md-2">Prix</th>
                </tr>
            </thead>
            <tbody id="rest_menu">
                <tr class="row">
                    <td class="col-md-10"><input type="text" class="form-control" name="m_item[${idx}][]" /></td>
                    <td class="col-md-2">
                    <input type="text" class="form-control" name="m_price[${idx}][]" />
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
</div>`);
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

table.on('click', 'tbody tr', function(){

$('#infoDiv').fadeIn('slow','linear');
    $('#ajouterBtn').fadeOut('slow','linear');
var rowSelected = table.row(this).data();
$('[name="id"]')[0].value=rowSelected.id;
$('[name="name"]')[0].value=rowSelected.name;
$('[name="bookingEmail"]')[0].value=rowSelected.bookingEmail;
$('[name="phone"]')[0].value=rowSelected.phone;
for(i=0; i<=6; i++){
    $('[name="periods['+i+'][0]"]')[0].value=rowSelected.periods[i][0];
    $('[name="periods['+i+'][1]"]')[0].value=rowSelected.periods[i][1];
}
var pos = {
  lat: parseFloat(rowSelected.latitude),
  lng: parseFloat(rowSelected.longitude)
};
map.setCenter(pos);
marker.setPosition(pos);

$("input[name='latitude']").val(rowSelected.latitude);
$("input[name='longitude']").val(rowSelected.longitude);

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
    $('select#categories option').removeAttr("selected");
}

    $.ajax({
    url: '/restaurant/getMenu/'+rowSelected.id,
        type: "GET",
        dataType: "json",
        success:function(data) { 
            $("div#accordionRestoMenu").empty();
            $.each(data, function(idx, rmenu) {

                $("div#accordionRestoMenu").append(`
<div class="card" style="margin-bottom: 15px;">
    <div class="card-header" id="heading${idx}" style="padding: 0px !important;">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse${idx}" aria-expanded="true" aria-controls="collapse${idx}">
            ${rmenu.title}
        </button>
        <button onclick="delete_m_menu(this)" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
      </h2>
    </div>

    <div id="collapse${idx}" class="collapse" aria-labelledby="heading${idx}" data-parent="#accordionRestoMenu">
      <div class="card-body">
        <input type="text" name="m_menu[]" value="${rmenu.title}" class="form-control menu-title" /><br />
        <table class="table table-condensed table-hover">
            <thead>
                <tr class="row">
                    <th class="col-md-10">Elément</th>
                    <th class="col-md-2">Prix</th>
                </tr>
            </thead>
            <tbody id="rest_menu">

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
</div>`);

                $.ajax({
                    url: '/restaurant/getMenuItems/'+rmenu.id,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $.each(data, function(jdx, menu_item){
                            $(`div#collapse${idx} tbody#rest_menu`).append(`
                            <tr class="row">
                                <td class="col-md-10"><input value="${menu_item.item}" type="text" class="form-control" name="m_item[${idx}][]" /></td>
                                <td class="col-md-2">
                                <input type="text" value="${menu_item.price}" class="form-control" name="m_price[${idx}][]" />
                                </td>
                            </tr>
                            `);
                        });
                    }
                });
    });

    
}


});


});




});
    

$("#reset").click(function() {
    $("#form_restaurants")[0].reset();
}); 

    
</script>
<!-- Laravel Javascript Validation -->
{!! $validator->selector('#form_restaurants') !!}
    @endpush
@endsection