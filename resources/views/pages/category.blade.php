<?php
$_SESSION["name"]='Categories';
$_SESSION["icon"]='la la-th-list';
?>
@extends('layouts.app')
@section('content')
@component('partials.menu')
    @slot('class')
        la la-th-list
    @endslot
    @slot('title')
        Catégories des Restaurants
    @endslot
@endcomponent
@include('partials.messages')
<link rel="stylesheet" type="text/css" href="{{mix('/app-assets/css/select2/select2.min.css')}}">
<section id="horizontal-form-layouts">
    <div id="infoDiv" style="display:none;" class="row">
        <div class="col-md-12">
            <div class="card main-card">
                <div class="card-header">
                        <div class="form-inline">
                            <div style="display:flex;align-items:center;"><i class="la la-info icon-card-title"></i>
                                <h3 class="card-title" style="margin-right: 20px">Informations du categorie</h3></div>
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
                {{ Form::open(['action' => 'CategorieController@categoryOperations','methode' => 'POST','id'=>'form_categories']) }}
                        <div class="form form-horizontal row-separator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row mx-auto last">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <h6 class="text-muted">Nom</h6>                                                           
                                                    </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="sousCategory" checked>
                                                            <label class="custom-control-label" for="sousCategory">Sous Catégorie</label>
                                                            </div>                                                           
                                               </div>
                                                <div class="input-group">
                                                    {{ Form::hidden('id', '') }}
                                                    {{ Form::hidden('sousC', 1) }}
                                                    {{Form::text('name', '',['class'=>'form-control' ,'placeholder'=>'name','autofocus'])}}                                                                
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon4"><i class="la la-edit"></i></span>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div id="divCategories" class="col-md-6">
                                    <div class="form-group row mx-auto">
                                            <div class="col-md-12">
                                        <fieldset>
                                                <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h6 class="text-muted">Catégorie Parentale</h6>                                                           
                                                        </div>
                                                            <div class="custom-control custom-checkbox">
                                                                </div>                                                           
                                                   </div>
                                        <div class="row"style="display:flex;align-items:center;">
                                        <div class="col-md-12">
                                                {{ Form::select('categories',$categories,null,['id'=>'categories','class'=>'select2 form-control select2-hidden-accessible','tabindex'=>'-1', 'aria-hidden'=>'true']) }}

                                        </div>
                                    </div>
                                        </fieldset>
                                </div>
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
                                                {{ Form::button('<i class="la la-trash icon-submit-table"></i>', ['type' => 'submit', 'class' => 'btn btn-float btn-square btn-outline-primary','name'=>'action','value'=>'Supprimer','id'=>'supprimer','onclick'=>'return confirm("Êtes-vous sûr de vouloir supprimer cette categorie?")'] ) }}
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
                        <h3 class="card-title">Liste des Categories</h3></div>
                        <a class="card-minus" data-action="collapse"><i class="ft-minus"></i></a>   
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <div id="user_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-striped table-bordered bootstrap-3" id="category_table" role="grid" aria-describedby="user_table_info" width="100%">
                                            <thead>
                                                <tr role="row">
                                                    <th style="display: none;" tabindex="1" aria-sort="descending">updated at</th>
                                                    <th style="display: none;" class="sorting" tabindex="2" rowspan="1" colspan="1" >Id</th>                                                        
                                                    <th style="display: none;" class="sorting" tabindex="2" rowspan="1" colspan="1" >Parent Id</th>                                                        
                                                    <th class="sorting" tabindex="2" rowspan="1" colspan="1" >Nom</th>
                                                    <th class="sorting" tabindex="2" rowspan="1" colspan="1" >Catégorie Parentale</th>
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
<script src="{{mix('/app-assets/js/select2/select2.min.js')}}"></script>
<script>
    var url = "{{ url('/category/getData') }}";
    $(document).ready(function () {
        $('#sousCategory').change(function() {
 if(this.checked) {
    $('#divCategories').fadeIn('slow','linear');
    $('[name="sousC"]')[0].value=1;
 }
 else{
    $('[name="sousC"]')[0].value=0;
    $('#divCategories').fadeOut('slow','linear');
 }
});
        var table =$('#category_table').DataTable({
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
    {data: 'parent_id',name: 'parent_id',visible:false},
    {data: 'name',name: 'name'},
    {data: 'parent_name',name: 'parent_name'},
]
});
table.on('click', 'tbody tr', function() {
        $('#infoDiv').fadeIn('slow','linear');

var rowSelected = table.row(this).data();
$('[name="id"]')[0].value=rowSelected.id;
$('[name="name"]')[0].value=rowSelected.name;
$("categories").val(rowSelected.parent_id);

});
$("#reset").click(function() {
$("#form_categories")[0].reset();
}); 
});     
</script>
<!-- Laravel Javascript Validation -->
{!! $validator->selector('#form_categories') !!}
    @endpush
@endsection
