@extends('layouts.app')
@section('content')


    <div class="panel panel-default">
        <div class="panel-heading">
            All categories
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Parent Cat</th>
                        <th scope="col">Description</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                   @php $requestcatlist= \App\Requestcategory::all(); @endphp
                    @if($requestcatlist->count()>0)
                        @foreach($requestcatlist as $category)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$category->cat_name}}</td>
                                <td>{{$category->parent_cat}}</td>
                                <td>{{$category->cat_description}}</td>
                                <td><a href="{{route('category.delete',['id'=>$category->id])}}" class="btn btn-danger btn-xs">Delete</a></td>
                            </tr>
                        @endforeach

                    @else
                        <tr>
                            <th colspan="5" style="text-align:center"> No categories yet.</th>
                        </tr>
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@stop
