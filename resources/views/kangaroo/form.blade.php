@extends('layouts.master')

@php
    if (!isset($oKangaroo)) $oKangaroo = null;
@endphp

@section('content')
    <div class="container">
        <div class="row form-bg">
            <form>
                @if (!empty($oKangaroo))
                <input id="recordId"
                       type="text"
                       hidden="hidden"
                       value="{{ $oKangaroo->id }}" />
                @endif

                <div class="form-floating mb-3 mt-3">
                    <input id="recordName"
                           type="text"
                           class="form-control"
                           placeholder="Enter name here"
                           value="{{ data_get($oKangaroo, 'name') }}">
                    <label for="recordName">*Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="recordNickname"
                           type="text"
                           class="form-control"
                           placeholder="Enter nickname here"
                           value="{{ data_get($oKangaroo, 'nickname') }}">
                    <label for="recordNickname" 
                           class="form-label">Nickname</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="recordWeight"
                           type="number"
                           class="form-control"
                           placeholder="Enter weight here"
                           value="{{ data_get($oKangaroo, 'weight') }}">
                    <label for="recordWeight" 
                           class="form-label">*Weight (kg)</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="recordHeight"
                           type="number"
                           class="form-control"
                           placeholder="Enter height here"
                           value="{{ data_get($oKangaroo, 'height') }}">
                    <label for="recordHeight" 
                           class="form-label">*Height (inches)</label>
                </div>

                <div class="form-floating mb-3">
                    <select id="recordGender"
                            class="form-select" 
                            aria-label="Select from the provided options.">
                         <option {{ data_get($oKangaroo, 'gender')?->isMale() || empty($oKangaroo) ? 'selected' : ''}}
                                 value="{{ App\Enums\Gender::MALE->value }}">Male</option>
                         <option {{ data_get($oKangaroo, 'gender')?->isFemale() ? 'selected' : ''}}
                                 value="{{ App\Enums\Gender::FEMALE->value }}">Female</option>
                    </select>
                    <label for="recordGender">*Gender</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input id="recordColor"
                           type="text"
                           class="form-control"
                           placeholder="Enter color here"
                           value="{{ data_get($oKangaroo, 'color') }}">
                    <label for="recordColor" 
                           class="form-label">Color</label>
                </div>

                <div class="form-floating mb-3">
                    <select id="recordNature"
                            class="form-select" 
                            aria-label="Select from the provided options.">
                         <option {{ empty($oKangaroo) ? 'selected' : '' }}
                                 value="">Open this select menu</option>
                         <option {{ data_get($oKangaroo, 'nature')?->isFriendly() ? 'selected' : ''}}
                                 value="1">Friendly</option>
                         <option {{ data_get($oKangaroo, 'nature')?->isNotFriendly() ? 'selected' : ''}}
                                 value="0">Not Friendly</option>
                    </select>
                    <label for="recordNature">Friendliness</label>
                </div>

                <div class="form-floating mb-3">
                    <input id="recordBirthDate"
                           type="date"
                           class="form-control"
                           placeholder="Enter brithday here"
                           value="{{ data_get($oKangaroo, 'birth_date') }}">
                    <label for="recordBirthDate" 
                           class="form-label">*Birthday</label>
                </div>
                <hr/>

                <button id="btnSave"
                        type="button" 
                        class="btn btn-success">Save <i class="fa fa-check"></i></i></button>
                <button id="btnCancel"
                        type="button" 
                        class="btn btn-danger">Cancel <i class="fa fa-times"></i></button>
            </form>
        </div>
    </div>
@endsection

@section('page-script')
    <script type="module" 
            src="{{ Vite::asset('resources/js/kangaroo/form.js') }}"></script>
@endsection