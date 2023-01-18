@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row form-bg">
            <form>

                <div class="form-floating mb-3 mt-3">
                    <input id="name"
                           type="text"
                           class="form-control">
                    <label for="name" 
                           class="form-label">*Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="nickame"
                           type="text"
                           class="form-control">
                    <label for="nickname" 
                           class="form-label">Nickname</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="weight"
                           type="number"
                           class="form-control">
                    <label for="weight" 
                           class="form-label">*Weight</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="height"
                           type="number"
                           class="form-control">
                    <label for="height" 
                           class="form-label">*Height</label>
                </div>

                <div class="form-floating mb-3">
                    <select id="gender"
                            class="form-select" 
                            aria-label="Select from the provided options.">
                         <option selected>Open this select menu</option>
                         <option value="m">Male</option>
                         <option value="f">Female</option>
                    </select>
                    <label for="gender">*Gender</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input id="color"
                           type="text"
                           class="form-control">
                    <label for="color" 
                           class="form-label">Color</label>
                </div>

                <div class="form-floating mb-3">
                    <select id="nature"
                            class="form-select" 
                            aria-label="Select from the provided options.">
                         <option selected>Open this select menu</option>
                         <option value="1">Friendly</option>
                         <option value="0">Not Friendly</option>
                    </select>
                    <label for="nature">Friendliness</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="birth_date"
                           type="date"
                           class="form-control">
                    <label for="birth_date" 
                           class="form-label">*Birthday</label>
                </div>
                
                <hr/>
                <button type="button" class="btn btn-success">Save <i class="fa fa-check"></i></i></button>
                <button type="button" class="btn btn-danger">Cancel <i class="fa fa-times"></i></button>
            </form>
        </div>
    </div>
@endsection