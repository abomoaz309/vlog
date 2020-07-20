@extends('back-end.layout.app')

@php
    $module = "Messages";
    $pageTitle = 'Messages Control';
    $tableTitle = "Messages Profile";
    $tableDesc = "Here you can add / edit / delete messages profile";
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="card-title ">{{$tableTitle}}</h4>
                            <p class="card-category">Here you can add / edit / delete messages profile</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('pages.create') }}" style="text-transform: none;" class="btn btn-white btn-round">Add {{$module}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <tr><th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Message
                                </th>
                                <th class="text-right">
                                    Control
                                </th>
                            </tr></thead>
                            <tbody>
                            @foreach($messages as $message)
                                <tr>
                                    <td>{{$message->id}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->message}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Reply {{$module}}">
                                        <a href="{{ route('messages.edit', $message->id) }}"><i class="material-icons">edit</i></a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
