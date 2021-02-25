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
                        <form action="{{route('update',['id'=>$oop->id])}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <input type="text" name="task" value="{{$oop->task}}" class="form-control" placeholder="Enter your Task here " required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Edit" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
