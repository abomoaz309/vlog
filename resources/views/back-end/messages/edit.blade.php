@extends('back-end.layout.app')

@php
    $module = "Message";
    $pageTitle = "Edit " . $module;
    $formTitle = "Edit " . $module;
    $formDesc = "Here you can add " . $module . " profile";
@endphp

@section('title')
    {{$pageTitle}}
@endsection

@section('content')
    @component('back-end.layout.header')
        @slot('nav_title')
            {{$pageTitle}}
        @endslot
    @endcomponent

    <div class="row">
        <h4>Reply messages</h4>
        <br>
        <br><br>
            <div class="col-md-12">
                <form action='{{ route('reply.message', $message->id) }}' method='post'>
                    @csrf
                    <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Message</label>
                        <textarea name="message" cols="30" rows="10" class="form-control" value="{{ isset($message) ? $message->message : '' }}"></textarea>
                        @error('message' )
                        <strong style="color: red; font-size: 12px; font-weight:bold">* {{ $message }}</strong>
                         @enderror
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Reply message<div class="ripple-container"></div></button>
                </form>
            </div>

    </div>

@endsection
