@extends('back-end.layout.app')

@php
    $module = "Video";
    $pageTitle = 'Videos Control';
    $tableTitle = "Videos Profile";
    $tableDesc = "Here you can add / edit / delete videos profile";
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
                            <p class="card-category">Here you can add / edit / delete videos profile</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('videos.create') }}" style="text-transform: none;" class="btn btn-white btn-round">Add {{$module}}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class=" text-primary">
                            <tr><th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Category
                                </th>
                                <th>
                                    User
                                </th>
                                <th>
                                    Published
                                </th>
                                <th class="text-right">
                                    Control
                                </th>
                            </tr></thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>{{$video->id}}</td>
                                    <td>{{$video->name}}</td>
                                    <td>{{$video->category->name}}</td>
                                    <td>{{$video->user->name}}</td>
                                    @if($video->published === 1)
                                    <td><i class="material-icons">visibility</i></td>
                                        @elseif($video->published === 0)
                                        <td><i class="material-icons">visibility_off</i></td>
                                    @endif
                                    <td class="td-actions" style="display: flex">
                                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{$module}}">
                                            <a href="{{ route('videos.edit', $video->id) }}"><i class="material-icons">edit</i></a>
                                        </button>
                                        <form action="{{ route('videos.destroy', $video->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$module}}">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
