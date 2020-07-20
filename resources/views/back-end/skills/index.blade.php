@extends('back-end.layout.app')

@php
    $module = "Skill";
    $pageTitle = $module . 's Control';
    $tableTitle = $module . "s Profile";
    $tableDesc = "Here you can add / edit / delete" . $module . "s profile";
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
                            <p class="card-category">Here you can add / edit / delete skills profile</p>
                        </div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('skills.create') }}" style="text-transform: none;" class="btn btn-white btn-round">Add {{$module}}</a>
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
                                <th class="text-right">
                                    Control
                                </th>
                            </tr></thead>
                            <tbody>
                            @foreach($skills as $skill)
                                <tr>
                                    <td>{{$skill->id}}</td>
                                    <td>{{$skill->name}}</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit {{$module}}">
                                            <a href="{{ route('skills.edit', $skill->id) }}"><i class="material-icons">edit</i></a>
                                        </button>
                                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST">
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
                        {{ $skills->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
