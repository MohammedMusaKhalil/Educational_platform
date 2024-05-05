@extends('Front.inc.layout')
@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2>Our Courses</h2>
                            <p>Homepage<span>/</span>Courses<span>/</span>{{$cat->name}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>popular courses</p>
                        <h2>Special Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courses as $c)
                    <div class="col-sm-6 col-lg-4">
                        <div class="single_special_cource">
                            <img src="{{asset('uploads/courses/'.$c->img)}}" class="special_img" alt="">
                            <div class="special_cource_text">
                                <a href="{{route('Front.cat',$c->cat_id,)}}" class="btn_4">{{$c->cat_name}}</a>
                                <h4>{{$c->price}}$</h4>
                                <a href="{{route('Front.show',[$c->cat_id,$c->id])}}"><h3>{{$c->name}}</h3></a>
                                <p>{{$c->desc}}</p>
                                <div class="author_info">
                                    <div class="author_img">
                                        <img src="{{asset('uploads/trianers/'.$c->trainer_img)}}" alt="">
                                        <div class="author_info_text">
                                            <p>{{$c->trainwe_name}}</p>
                                            <h5>>Professional coach</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--::blog_part end::-->
@endsection


