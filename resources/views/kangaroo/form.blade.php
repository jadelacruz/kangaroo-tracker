@extends('layouts.master')

@php
    if (!isset($oKangaroo)) $oKangaroo = null;
@endphp

@section('content')
    <div class="container">
        <div class="row form-bg">
            <form>
                @if (!empty($oKangaroo))
                <input id="id"
                       type="text"
                       hidden="hidden"
                       value="{{ $oKangaroo->id }}" />
                @endif

                <div class="form-floating mb-3 mt-3">
                    <input id="name"
                           type="text"
                           class="form-control"
                           placeholder="Enter name here"
                           value="{{ data_get($oKangaroo, 'name') }}">
                    <label for="name">*Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="nickame"
                           type="text"
                           class="form-control"
                           placeholder="Enter nickname here"
                           value="{{ data_get($oKangaroo, 'nickname') }}">
                    <label for="nickname" 
                           class="form-label">Nickname</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="weight"
                           type="number"
                           class="form-control"
                           placeholder="Enter weight here"
                           value="{{ data_get($oKangaroo, 'weight') }}">
                    <label for="weight" 
                           class="form-label">*Weight</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="height"
                           type="number"
                           class="form-control"
                           placeholder="Enter height here"
                           value="{{ data_get($oKangaroo, 'height') }}">
                    <label for="height" 
                           class="form-label">*Height</label>
                </div>

                <div class="form-floating mb-3">
                    <select id="gender"
                            class="form-select" 
                            aria-label="Select from the provided options.">
                         <option {{ empty($oKangaroo) ? 'selected' : '' }}>Open this select menu</option>
                         <option {{ data_get($oKangaroo, 'gender')?->isMale() ? 'selected' : ''}}
                                 value="{{ App\Enums\Gender::MALE->value }}">Male</option>
                         <option {{ data_get($oKangaroo, 'gender')?->isFemale() ? 'selected' : ''}}
                                 value="{{ App\Enums\Gender::FEMALE->value }}">Female</option>
                    </select>
                    <label for="gender">*Gender</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input id="color"
                           type="text"
                           class="form-control"
                           placeholder="Enter color here"
                           value="{{ data_get($oKangaroo, 'color') }}">
                    <label for="color" 
                           class="form-label">Color</label>
                </div>

                <div class="form-floating mb-3">
                    <select id="nature"
                            class="form-select" 
                            aria-label="Select from the provided options.">
                         <option {{ empty($oKangaroo) ? 'selected' : '' }}>Open this select menu</option>
                         <option {{ data_get($oKangaroo, 'nature')?->isFriendly() ? 'selected' : ''}}
                                 value="1">Friendly</option>
                         <option {{ data_get($oKangaroo, 'nature')?->isNotFriendly() ? 'selected' : ''}}
                                 value="0">Not Friendly</option>
                    </select>
                    <label for="nature">Friendliness</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="birth_date"
                           type="date"
                           class="form-control"
                           placeholder="Enter brithday here"
                           value="{{ data_get($oKangaroo, 'birth_date') }}">
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