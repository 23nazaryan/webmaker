@extends('layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" data-sticky_column>
                    <div class="primary-sidebar">
                        <aside class="widget news-letter">
                            <h3 class="widget-title text-uppercase text-center">Search</h3>
                            <form action="#">
                                <input type="text">
                                <input type="submit" value="Seacrh"
                                       class="text-uppercase text-center btn btn-subscribe">
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
