@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(\Illuminate\Support\Facades\Auth::user()->role == 2)
                        <a href="/create" class="btn btn-success" style="margin-bottom: 10px;">Create Task</a>
                    @endif
                    <div class="row">
                        @foreach($tasks as $task)
                            <div class="col-md-4">
                                <article class="post post-grid">
                                    <div class="post-thumb">
                                        <a href="{{route('task.show', $task->id)}}"></a>

                                        <a href="{{route('task.show', $task->id)}}" class="post-thumb-overlay text-center">
                                            <div class="text-uppercase text-center">View Task</div>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <header class="entry-header text-center text-uppercase">
                                            <h1 class="entry-title"><a href="{{route('task.show', $task->id)}}">{{$task->name}}</a></h1>
                                        </header>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
@endsection
