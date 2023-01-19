@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-4 mb-3">
                <div class="btn-group" role="group">
                    <button id="btnAdd"
                            type="button" 
                            class="btn btn-success">Add <i class="fa fa-plus"></i></button>
                    <button id="btnUpdate"
                            type="button" 
                            class="btn btn-primary">Update <i class="fa fa-pencil"></i></button>
                    <button id="btnDelete"
                            type="button" 
                            class="btn btn-danger">Delete <i class="fa fa-trash"></i></button>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div id="gridContainer"></div>
            </div>

        </div>
    </div>
@endsection

@section('page-script')
    <script type="text/javascript" 
            src="{{ Vite::asset('resources/js/kangaroo/list.js') }}"></script>
@endsection