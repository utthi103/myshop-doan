@extends('layouts.user')
 
@section('title')
    <title>Bài viết</title>

@stop
{{-- @section('logo')
    <img src="{{ asset('img/cayphattai.jpg') }}" alt="">
@stop --}}

@section('content')
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            @foreach ($blog_category as $blog)
                                 <li><a href="#">{{ $blog['category'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    {{-- <h2 style="text-align: center">{{ $bloge['title'] }}</h2> --}}
                         {!! $bloge['content'] !!}
                    </div>
                         
                </div>
        </div>
    </div>
</section>

@stop



