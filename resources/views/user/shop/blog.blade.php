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
                    {{-- <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div> --}}
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
            <div class="col-lg-8 col-md-7">
                <div class="row">
                    @foreach ($blog_category as $blog)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img src="{{ asset('img/'.$blog['image'].'') }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i>{{ $blog['date'] }}</li>
                                    {{-- <li><i class="fa fa-comment-o"></i> 5</li> --}}
                                </ul>
                                <h5><a href="#">{{ $blog['category'] }}</a></h5>
                                <p> {{ $blog['title'] }} </p>
                                <a href="{{ route('blog_detail',['id'=> $blog->id]) }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                            </div>
                        </div>
                    </div> 
                    @endforeach
                   
                    
                   
                    <div class="col-md-12">
                        {{ $blog_category->links('pagination::bootstrap-4') }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop



