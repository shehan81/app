@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-10">
        Resources
    </div>
    <div class="col-md-2">
        <a href="{{route('resource.create')}}" >New</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        Add Resource
    </div>
</div>

@if(count($errors) > 0)
<span class="help-block">
    <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error}}</li>
        @endforeach
    </ul>
</span>
@endif
<div class="row">
    <div class="col-md-12">
        @if(!empty($resource->id))
        <form name="form1" method="POST" action='{{route('resource.update', $resource->id)}}' >
            <input name='_method' type='hidden' value='PATCH'>
            @else
            <form name="form1" method="POST" action='{{route('resource.store')}}' >
                @endif
                {{csrf_field()}}
                Name : <input type="text" name="name" value="{{ ( !empty($resource->name) ? $resource->name : '' ) }}" />
                <br />
                Type : <input type="text" name="type" value="{{ ( !empty($resource->type) ? $resource->type : '' ) }}" />
                <br />
                <input type='submit' value='add'/>
            </form>
    </div>
</div>
@endsection