@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                        <div class="container">
                        <h3>  Task here  </h3>
                            <ul class="list-group">
                            @foreach($data as $f)
                            @if($f->done==0)
                                <li class="list-group-item">
                                        {{$f->task}}
                                        <a href="{{route('delete',['id'=>$f->id])}}"> Delete </a>
                                        <a href="{{route('edit',['id'=>$f->id])}}"> Edit </a>
                                        <a href="{{route('done',['id'=>$f->id])}}"> Done </a>
                                </li>
                                @else
                                <li class="list-group-item">
                                        {{$f->task}}
                                        <a href="{{route('delete',['id'=>$f->id])}}" style="text-decoration:line-through; color:red;"> Delete </a>
                                      
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>



                    <div class="container">
                        <form action="{{route('insert')}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="task" class="form-control" placeholder="Enter your Task here " required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add" class="btn btn-danger btn-block">
                            </div>
                        </form>
                    </div>





                    <div class="container">
                        <h3> Bin:: </h3>
                        <ul class="list-group">
                            @foreach($trashed as $f)
                            <li class="list-group-item">
                                {{$f->task}}
                                <a href="{{route('restore',['id'=>$f->id])}}"> Restore </a>
                                <a href="{{route('destroy',['id'=>$f->id])}}" >  Destroy </a>      
                            </li>
                            @endforeach
                        </ul>
                    </div>    




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
