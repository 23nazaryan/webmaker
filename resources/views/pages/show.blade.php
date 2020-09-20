@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <article class="post">
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h1 class="entry-title"><a href="javascript:;">{{$task->name}}</a></h1>
                            </header>
                            <div class="entry-content">{!!$task->description!!}</div>

                            <div class="social-share">
							    <span class="social-share-title pull-left text-capitalize">By {{$task->createdBy->name}}</span>
                                <br>
							    <span class="social-share-title pull-left text-capitalize">Assigned to {{$task->assignedTo->name}}</span>
                            </div>
                        </div>
                    </article>
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                        <div class="top-comment">
                            <a href="{{route('task.edit', $task->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('task.delete', $task->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                    @elseif($task->assigned_to == \Illuminate\Support\Facades\Auth::user()->id)
                        <div class="top-comment">
                            <h4>Status</h4>

                            @csrf
                            <select class="form-control" id="status" name="status" data-task-id="{{$task->id}}">
                                @foreach(\App\Tasks::getStatuses() as $key => $status)
                                    <option value="{{$key}}" @if($task->status == $key) selected @endif>{{$status}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
@endsection
