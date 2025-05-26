@extends('admin.admin_app')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
           Trashed Posts
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Restore</th>
                        <th scope="col">Destroy</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($posts->count()>0)
                        @foreach($posts as $post)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="50px"> </td>
                                <td>{{$post->title}}</td>
                                <td><a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success btn-xs">Restore</a></td>
                                <td><a href="{{route('post.kill',['id'=>$post->id])}}" class="btn btn-danger btn-xs">Delete</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" style="text-align:center"> No Trashed Post </th>
                        </tr>
                    @endif

                    </tbody>
                </table>

            </div>
        </div>
    </div>


@stop
