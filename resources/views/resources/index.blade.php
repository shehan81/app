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
@if($message = Session::get('message'))
<h2 class='text-success'>{{$message}}</h2>
@endif

<div class="row">
    <div class="col-md-12" id='resource-table'>
        <table width="100%" class='col-md-12'>
            <th class='col-md-4'>Name</th>
            <th class='col-md-4'>Type</th>
            <th class='col-md-4'>Action</th>
            @if(count($res) > 0)
            @foreach($res as $r)
            <tr>
                <td>{{$r->name}}</td>
                <td>{{$r->type}}</td>
                <td><a class='btn btn-primary' href="{{route('resource.edit', $r->id)}}">Edit</a> | 
                    
                    <form name="form1" method="POST" action="{{route('resource.update', $r->id)}}" >
                        <input type="hidden" name="_method" value="DELETE" />
                        {{csrf_field()}}
                        <input type="submit" value="delete"  class='btn btn-primary confirm-delete' />
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>

</div>
@endsection
@section('scripts')
<script src="{{asset('js/resource.js')}}"></script>
@endsection