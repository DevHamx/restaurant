@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="font-size: 2em;" class="card-header">Administation</div>

                <div class="card-body">
                    <div class="card-block">				  	
				    
                        <div class="row">
                          <div class="col">
                                <a href="/restaurant" class="btn btn-outline-danger btn-lg col-12" role="button"><i class="la la-cutlery la-5x shortcut-icon" aria-hidden="true"></i> <br><span class="shortcut-label">Restaurants</span></a>
                          </div>
                          <div class="col">
                              <a href="/category" class="btn btn-outline-primary btn-lg col-12" role="button"><i class="la la-th-list la-5x shortcut-icon" aria-hidden="true"></i> <br><span class="shortcut-label">Les Catégories</span></a>
                          </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
