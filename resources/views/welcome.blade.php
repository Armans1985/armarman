@extends('layouts.front')
@section('content')
    <!--Begin Slider -->
    <div class="slider">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @if(isset($slider_images) && is_object($slider_images))
                    @foreach($slider_images as $key=>$images)
                        @if($key == 0)
                            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
                        @else
                            <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
                        @endif
                    @endforeach
                @endif
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @if(isset($slider_images) && is_object($slider_images))
                    @foreach($slider_images as $key=>$images)
                        @if($key == 0)
                            <div class="item active">
                                <img src="{{asset('/images').'/'.$images->path}}" alt="...">
                            </div>
                        @else
                            <div class="item">
                                <img src="{{asset('/images').'/'.$images->path}}" alt="...">
                            </div>
                    @endif
                @endforeach
            @endif
            <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!--end navbar and slider -->

    <!--begin section2 -->
    <div id="sec2" class="carousel slide" data-ride="carousel" style="background-color:#B24A50; background-image: url("assets/images/sec-2-xax.png")">
        <!-- Indicators -->
        <div class="carousel-inner" role="listbox">
            <div style="text-align: center;">
                <h3 class="h3">OUR SERVICES</h3>
                <p style="color:white">Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                    Ab accusantium commodi consectetur dolorum, eius, exerci<br>
                    <b style="color: white;">tationem fugit harum iusto, magni obcaecati officia pari
                        atur praesentium quis ullam velit. Beatae cumque nisi quis.</b></p>
                <!--<marquee direction="right" scrollamount="8" behavior="alternate"><p-->
                <!--style="font-size: 30px;color: white;">&#10031;<em>My Tamplate</em>&#10031;</p></marquee>-->
            </div>

            <img src="{{asset('assets/images/sec-2-xax.png')}}" style="width: 100%;height:160px;">

            <div class="container" style="margin-bottom:100px">
                <div class="row">
                    @if(isset($service) && is_object($service))
                        @foreach($service as $services)
                            <div class="col-sm-6 col-md-3">
                                <div class="thumbnail" style="background-color: #C45158;">
                                    <div style="text-align: center">
                                        <i style="margin-right: 0px" class="{{$services->icone}} fa-7x" style="width: 20px; height: 20px;"></i>
                                    </div>

                                    <div class="caption" style="color: white; text-align: center;">
                                        <h5>{{ mb_strimwidth($services->description, 0, 500, '...') }}</h5>
                                        <p>{!! mb_strimwidth($services->text, 0, 50, '...') !!} </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--end section 2-->
    <!--start section 3 -->
    <div id="sec3" class="carousel slide" data-ride="carousel" style="background-color: #665464;">
        <!-- Indicators -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div style="text-align: center;">
                    <h3 class="h3">WHO WE ARE & WHAT WHE DO</h3>
                    <p><em>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
                            Ab accusantium commodi consectetur dolorum, eius, exerci<br>
                            <b style="color: white;">tationem fugit harum iusto, magni obcaecati officia pari
                                atur praesentium quis ullam velit. Beatae cumque nisi quis.</b> </em></p>
                </div>
                <img src="{{asset('assets/images/sec-3-xax.png')}}" style="width: 100%; height: 175px;">
                <div class="container" style="margin-bottom: 100px;">
                    <div class="row">
                        @if(isset($member) && is_object($member))
                            @foreach($member as $members)
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail " style="background-color: #5B4B59;">
                                        <a href="#" data-toggle="popover" data-trigger="hover" data-placement="top"
                                           data-content="MEET THE TEAM"> <img
                                                    src="{{asset('/images').'/'.$members->path}}" alt="..."
                                                    class="img-circle"></a>
                                        <div class="caption" style="color:snow; text-align: center;">
                                            <h4>{{$members->name}}</h4>
                                            <p><em>{{$members->profes->name}}</em></p>
                                        </div>
                                        <ul class="social">
                                            <a target="_blank" href="{{$members->facebook_link}}" class="active"><span><i
                                                            class="fab fa-facebook-square awic"></i></span></a>
                                            <a target="_blank" href="{{$members->gplus_link}}"><span><i class="fab fa-google awic"></i></span></a>
                                            <a target="_blank" href="{{$members->inkedin_link}}"><span><i
                                                            class="fab fa-linkedin-in awic"></i></span></a>
                                            <a target="_blank" href="{{$members->twitter_link}}" target="_blank"><span><i
                                                            class="fab fa-twitter awic"></i></span></a>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end section 3-->

    <!--start section 4-->
    <div id="sec4"
         style="width: 100%; height:100%; border: 1px solid #83A457; background-color:#83A457; ">

        <div class="page-header" style="text-align: center; padding: 10px; color: white;">
            <h1>OUR WORK</h1>
            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Corporis cum doloribus, enim expedita ipsum itaque, numq
                uam officiis omnis pariatur, praesentium quod reiciendis sint tempora. Dignissimos.</P>
        </div>
        <img src="{{asset('assets/images/sec-5-xax.png')}}" style="width: 100%;height:100px;">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 style="display: inline-block;">PORTFOLIO</h3>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 iso-nav">
                @if(isset($categories) && is_object($categories))
                    <ul class="nav nav-pills pull-right">
                        <li><a data-filter="*" type="button" data-toggle="popover" data-trigger="hover"
                               class="btn btn-xs btn-info active"
                            >All Items</a></li>
                        @foreach($categories as $category)
                            <li><a data-filter=".{{ strtolower(mb_strimwidth($category->name, 0, 3)) }}" type="button"
                                   class="btn btn-info btn-xs"> {{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="scroler" style="height: 500px">
            <div class="block-tab">
                @if(isset($categories) && is_object($categories))
                    @foreach($categories as $key => $category)
                        @foreach($category->project as $project)
                            {{--@if(!blank($project))--}}
                            <div class="item {{ strtolower(mb_strimwidth($category->name, 0, 3)) }} col-xs-4 col-sm-4 col-md-4 col-lg-3 img-block">
                                <a href="#" class="btn1" data-toggle="modal" data-target="#myModal">
                                    @foreach($project->poster as $image)
                                    <img src="{{ asset('images') . '/' . $image}}" alt="">
                                    @endforeach

                                    <i class="fa fa-search-plus"></i>
                                    <a href="{{ $project->url }}" target="_blank">
                                        <span id="text">{{ $project->title }}</span>
                                    </a>
                                </a>
                            </div>
                            {{--@endif--}}
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!--end secton 4-->

    <!--start section 5-->
    <div id="sec5" style="width: 100%;height:100%; background-color: #75B4AA;">
        <img src="{{asset('assets/images/sec-5-xax.png')}}" style="width: 100%; height: 175px;">
        <div style="text-align: center;padding: 60px; color: white;">
            <h3>CONTACT US</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi cumque <br>
                eius eveniet fugit impedit itaque laudantium necessitatibus quae! Expli</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div id="map"
                         style="height: 280px;width:45%;float: right; margin:13px 10px; border: 2px solid white ">
                    </div>
                    <div style="height: 280px;width:47%; margin:5px 10px;"><h3
                                style="text-align: center; color: white;">ADRESS</h3>
                        <p style="font-size: small; color: white; text-align: center">ARMENIA</p>
                        <p style="font-size: small; color: white; text-align: center">EREVAN</p>
                        <p style="font-size: small; color: white; text-align: center">KORYUN-8</p>
                        <p style="font-size: small; color: white; margin: 3px">phone:055 08-01-33</p>
                        <p style="font-size: small; color: white; margin: 3px">fax:0yy xx-xx-xx</p>
                        <a href="#"><p style="font-size: small; color: white; margin: 3px">Email:boby@mail.ru</p></a>
                        <a href="#"><p style="font-size: small; color: white; margin: 3px">Skype:Acrostia</p></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div>
                        <p> ASK A QUESTIONS</p>
                        <form class="form-inline" action="{{route('home.page')}}" method="get">
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword3">Email</label>
                                <input name="email" style="
                                background-color:white;" type="email" class="form-control"
                                       id="exampleInputPassword3"
                                       placeholder="Enter email">
                            </div>

                            <textarea name="text" style="background-color: white;" class="form-control" rows="5"
                                      title="">type text</textarea>
                            <button style="margin:20px auto; width: 50%;border-radius: 20px;" type="submit"
                                    class="btn btn-danger btn-sm btn-block"><b>Send</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<h1>WELCOME BLADE FILE</h1>--}}

@endsection
