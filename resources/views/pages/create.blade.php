@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="leave-comment mr0">
                        <h3 class="text-uppercase">Create Task</h3>
                        @include('errors')
                        <br>
                        <form class="form-horizontal contact-form" role="form" method="post" action="/create">
                            @csrf
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{old('name')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Description">{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="assign">Assign to</label>
                                <select class="form-control" id="assign" name="assigned_to">
                                    @foreach($developers as $developer)
                                        <option value="{{$developer->id}}">{{$developer->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn send-btn">Create</button>
                        </form>
                    </div>
                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
@endsection
