@extends('web.web2')

@section('meta')

    <meta name="description" content="{!! strip_tags($school->short_description) !!}"/>

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:image" content="{{ $school->getPhotoCoverUrl() }}"/>
    <meta name="twitter:title" content="{!! strip_tags($school->nama_sekolah) !!}"/>
    <meta name="twitter:description" content="{!! strip_tags($school->short_description) !!}" />
    <meta name="twitter:label1" content="Jenjang" />
    <meta name="twitter:data1" content="{{ $school->level->name }}" />
    <meta name="twitter:label2" content="Nama Sekolah" />
    <meta name="twitter:data2" content="{!! strip_tags($school->nama_sekolah) !!}" /> 

    <meta property="og:title" content="{!! strip_tags($school->nama_sekolah) !!}" />
    <meta property="og:type" content="post" />
    <meta property="og:url" content="{{ request()->getSchemeAndHttpHost() }}/{{$school->slug_sekolah}}" />
    <meta property="og:image" content="{{ $school->getPhotoCoverUrl() }}" />
    <meta property="og:description" content="{!! strip_tags($school->short_description) !!}" />

@endsection

@section('css')
<link href='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.css' rel='stylesheet' />
<style>
    .box h3 {
        margin-bottom: 5px;
    }

    .my-gallery {
    display: flex;
    flex-wrap: wrap;
    /* padding: 0 4px; */
    }

    /* Create four equal columns that sits next to each other */
    .my-gallery figure {
    flex: 25%;
    max-width: 25%;
    padding: 0 4px 0 0;
    }

    .my-gallery figure img {
    vertical-align: middle;
    width: 100%;
    }

    /* .my-gallery figure {
    position: relative;
    width: 150px;
    height: 150px;
    overflow: hidden;
    }
    .my-gallery figure img {
    position: absolute;
    left: 50%;
    top: 50%;
    max-height: 100%;
    width: auto;
    -webkit-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
            transform: translate(-50%,-50%);
            
    }
    .my-gallery figure img.portrait {
    width: 100%;
    height: auto;
    } */

    /* Responsive layout - makes a two column-layout instead of four columns */
    @media screen and (max-width: 800px) {
    .column {
        flex: 50%;
        max-width: 50%;
    }
    }

    /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
    .column {
        flex: 100%;
        max-width: 100%;
    }
    }
</style>
@endsection

@section('title')
<div class="page-title">
    <div class="container clearfix">
        <div class="row">
            <div class="col-md-7">
                <h1>{{$school->nama_sekolah}}
                    {!! $school->getTags()!!}
                </h1>
                <h4 class="location">
                    <a href="{{route('web.search', ['city'=>$school->city_id])}}">{{$school->city->city_province()}}</a>
                </h4>
            </div>
            <div class="col-md-5 price">
                <h1>{{$school->displaySPP(false)}}</h1>
                <div class="id opacity-50">
                    Per Bulan
                </div>
            </div>
        </div>
        <!-- <div class="float-left float-xs-none">
            <h1>{{$school->nama_sekolah}}
                {!! $school->getTags()!!}
            </h1>
            <h4 class="location">
                <a href="{{route('web.search', ['city'=>$school->city_id])}}">{{$school->city->city_province()}}</a>
            </h4>
        </div>
        <div class="float-right float-xs-none price">
            <div class="number">{{$school->displaySPP()}}</div>
            <div class="id opacity-50">
                Per Bulan
            </div>
        </div> -->
    </div>
</div>
@endsection

@section('content')
<section class="content">
    <section class="block detail">
        <div class="container">
            
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-8">
                    <section>
                        <h2>Tentang</h2>
                        <p>
                            {!! $school->description !!}
                        </p>
                    </section>

                    @if(sizeof($school->getBrochures()) > 0)
                    <section>
                        <h2>Brosur</h2>
                        <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                            @foreach($school->getBrochures() as $k=>$brochure)
                            @php
                            $path_parts = pathinfo($brochure);
                            if($path_parts['extension'] === "pdf") {
                                $brochure_thumb = asset('FrontEnd/assets/img/download-brochure.jpeg');
                                $data_size = '100x100';
                            } else {
                                $brochure_thumb = $brochure;
                                $data_size = $school->getWhatSizeString($brochure_thumb);
                            }
                            @endphp
                            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                <a href="{{$brochure}}" itemprop="contentUrl" data-size="{{ $data_size }}">
                                    <img src="{{$brochure_thumb}}" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description"></figcaption>
                            </figure>
                            @endforeach
                        </div>
                    </section>
                    @endif
                    
                    @if(sizeof($school->facilities) > 0)
                    <section>
                        <h2>Fasilitas</h2>
                        <ul class="features-checkboxes columns-3">
                            @foreach($school->facilities as $facility)
                            @php
                            if(empty($facility) || empty($facility->facility)) {
                                continue;
                            }
                            @endphp
                            <li><a href="{{ route('web.search', ['facilities[]'=>$facility->facility->id]) }}">{{$facility->facility->name}}</a></li>
                            @endforeach
                        </ul>
                    </section>
                    @endif
                    
                    @if(sizeof($school->getPhotos()) > 0)
                    <section>
                        <h2>Galeri</h2>
                        <div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
                            @foreach($school->getPhotos() as $k=>$photo)
                            <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                            <a href="{{$photo}}" itemprop="contentUrl" data-size="{{ $school->getWhatSizeString($photo) }}">
                                    <img src="{{$photo}}" itemprop="thumbnail" alt="Image description" />
                                </a>
                                <figcaption itemprop="caption description"></figcaption>
                            </figure>
                            @endforeach
                        </div>
                    </section>
                    @endif

                    @if($school->isLocationExists())
                    <section>
                        <h2>Lokasi</h2>
                        <div id='map' class="map height-500px"></div>
                    </section>
                    @endif
                </div>
                <div class="col-md-4">
                    <aside class="sidebar">
                        <section>
                            <h2>Data Lainnya</h2>
                            <div class="box">
                                <h3>Nama</h3>
                                <p>{{$school->nama_sekolah}}</p>

                                <h3>Jenjang</h3>
                                <p><a href="{{route('web.level', $school->level->name)}}">{{$school->level->description}}</a></p>

                                <h3>Uang Masuk</h3>
                                <p>{{$school->displayBiayaPendaftaran()}}</p>

                                <h3>Biaya Bulanan</h3>
                                <p>{{$school->displaySPP()}}</p>

                                <h3>Alamat</h3>
                                <p>{{$school->address}}</p>

                                <h3>Kota</h3>
                                <p><a href="{{route('web.search', ['city'=>$school->city_id])}}">{{$school->city_province()}}</a></p>

                                <h3>Telepon</h3>
                                <p>{{$school->phone1}}</p>

                                @if(strlen($school->email) > 0)
                                <h3>Email</h3>
                                <p>{!! str_replace('@', '<code>@</code>', $school->email) !!}</p>
                                @endif

                                @if(strlen($school->website) > 0)
                                <h3>Website</h3>
                                <p><a target="_blank" href="{{ (new \App\Helpers\StringHelper)::prep_url($school->website) }}">{{$school->website}}</a></p>
                                @endif

                                <hr>
                                @if(strlen($school->facebook) > 0)
                                <a href="{{ $school->facebook }} " title="Facebook">
                                    <span class="fa-stack fa-2x" style="color:black">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                <!-- <a href="{{ $school->facebook }} " title="Facebook">
                                    <span class="fa-stack" style="vertical-align: top; color:black">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a> -->
                                @endif
                                

                                @if(strlen($school->instagram) > 0)
                                <a href="{{ $school->instagram }} " title="Instagram">
                                    <span class="fa-stack fa-2x" style="color:black">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                @endif

                                @if(strlen($school->twitter) > 0)
                                <a href="{{ $school->twitter }} " title="Twitter">
                                    <span class="fa-stack fa-2x" style="color:black">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                @endif

                                @if(strlen($school->youtube) > 0)
                                <a href="{{ $school->youtube }} " title="Youtube">
                                    <span class="fa-stack fa-2x" style="color:black">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                                @endif

                                <!--<hr>
                                <form class="form email">
                                    <div class="form-group">
                                        <label for="name" class="col-form-label">Nama</label>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="Alamat Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="col-form-label">Pesan</label>
                                        <textarea name="message" id="message" class="form-control" rows="4" placeholder="Assalaamualaikum, ana tertarik dengan sekolah ini..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>-->
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    @if(sizeof($other_schools) > 0)
    <section class="block related">
        <div class="container">
            <hr>
            <h2>Sekolah Lainnya</h2>
            <div class="items grid grid-xl-4-items grid-lg-3-items grid-md-2-items">
                @component('web.schoolcard', ['schools' => $other_schools])@endcomponent
        </div>
    </section>
    @endif
</section>

<div id="gallery" class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>

    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">

        <div class="pswp__top-bar">

            <div class="pswp__counter"></div>

            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

            <button class="pswp__button pswp__button--share" title="Share"></button>

            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

            <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="pswp__loading-indicator"><div class="pswp__loading-indicator__line"></div></div> -->

        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip">
                <!-- <a href="#" class="pswp__share--facebook"></a>
                <a href="#" class="pswp__share--twitter"></a>
                <a href="#" class="pswp__share--pinterest"></a>
                <a href="#" download class="pswp__share--download"></a> -->
            </div>
        </div>

        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
        <div class="pswp__caption">
            <div class="pswp__caption__center">
            </div>
        </div>
        </div>

    </div>


</div>
@endsection

@section('scripts')
<script src='https://api.mapbox.com/mapbox-gl-js/v1.2.0/mapbox-gl.js'></script>


<script>
    $(document).ready(function(){
        @if($school->isLocationExists())
        mapboxgl.accessToken = 'pk.eyJ1IjoibGhmYXpyeSIsImEiOiJjazA5OGt0aDgwNDh3M29vYzF0YWpkNXI4In0.s5lg_BvXMi989GI2liegVg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [{{$school->lng}}, {{$school->lat}}],
            zoom: 15
        });
        
        // disable map zoom when using scroll
        map.scrollZoom.disable();

        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            map.dragPan.disable();
        }
        

        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

        var marker = new mapboxgl.Marker()
        .setLngLat([{{$school->lng}}, {{$school->lat}}])
        .addTo(map);
        
        @endif
    });


    var initPhotoSwipeFromDOM = function(gallerySelector) {

        // parse slide data (url, title, size ...) from DOM elements 
        // (children of gallerySelector)
        var parseThumbnailElements = function(el) {
            var thumbElements = el.childNodes,
                numNodes = thumbElements.length,
                items = [],
                figureEl,
                linkEl,
                size,
                item;

            for(var i = 0; i < numNodes; i++) {

                figureEl = thumbElements[i]; // <figure> element

                // include only element nodes 
                if(figureEl.nodeType !== 1) {
                    continue;
                }

                linkEl = figureEl.children[0]; // <a> element

                size = linkEl.getAttribute('data-size').split('x');

                var u = linkEl.getAttribute('href')

                var ext = u.substr(u.lastIndexOf('.') + 1).toLowerCase();
                if(ext === "pdf") {
                    continue;
                }
                
                // create slide object
                item = {
                    src: linkEl.getAttribute('href'),
                    w: parseInt(size[0], 10),
                    h: parseInt(size[1], 10)
                };



                if(figureEl.children.length > 1) {
                    // <figcaption> content
                    item.title = figureEl.children[1].innerHTML; 
                }

                if(linkEl.children.length > 0) {
                    // <img> thumbnail element, retrieving thumbnail url
                    item.msrc = linkEl.children[0].getAttribute('src');
                } 

                item.el = figureEl; // save link to element for getThumbBoundsFn
                items.push(item);
            }

            return items;
        };

        // find nearest parent element
        var closest = function closest(el, fn) {
            return el && ( fn(el) ? el : closest(el.parentNode, fn) );
        };

        // triggers when user clicks on thumbnail
        var onThumbnailsClick = function(e) {
            e = e || window.event;
            e.preventDefault ? e.preventDefault() : e.returnValue = false;

            var eTarget = e.target || e.srcElement;

            // find root element of slide
            var clickedListItem = closest(eTarget, function(el) {
                return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
            });

            if(!clickedListItem) {
                return;
            }

            // find index of clicked item by looping through all child nodes
            // alternatively, you may define index via data- attribute
            var clickedGallery = clickedListItem.parentNode,
                childNodes = clickedListItem.parentNode.childNodes,
                numChildNodes = childNodes.length,
                nodeIndex = 0,
                index;
            
            for (var i = 0; i < numChildNodes; i++) {
                
                if(childNodes[i].nodeType !== 1) { 
                    continue; 
                }

                if(childNodes[i] === clickedListItem) {
                    index = nodeIndex;
                    break;
                }
                nodeIndex++;
            }


            var url = clickedListItem.childNodes[1].getAttribute('href')
            var ext = url.substr(url.lastIndexOf('.') + 1).toLowerCase();
            if(ext === "pdf") {
                window.open(url);
            } else {
                if(index >= 0) {
                    // open PhotoSwipe if valid index found
                    openPhotoSwipe( index, clickedGallery );
                }
            }
            return false;
        };

        // parse picture index and gallery index from URL (#&pid=1&gid=2)
        var photoswipeParseHash = function() {
            var hash = window.location.hash.substring(1),
            params = {};

            if(hash.length < 5) {
                return params;
            }

            var vars = hash.split('&');
            for (var i = 0; i < vars.length; i++) {
                if(!vars[i]) {
                    continue;
                }
                var pair = vars[i].split('=');  
                if(pair.length < 2) {
                    continue;
                }           
                params[pair[0]] = pair[1];
            }

            if(params.gid) {
                params.gid = parseInt(params.gid, 10);
            }

            return params;
        };

        var openPhotoSwipe = function(index, galleryElement, disableAnimation, fromURL) {
            var pswpElement = document.querySelectorAll('.pswp')[0],
                gallery,
                options,
                items;

            items = parseThumbnailElements(galleryElement);

            // define options (if needed)
            options = {

                // define gallery index (for URL)
                galleryUID: galleryElement.getAttribute('data-pswp-uid'),

                getThumbBoundsFn: function(index) {
                    // See Options -> getThumbBoundsFn section of documentation for more info
                    var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                        pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                        rect = thumbnail.getBoundingClientRect(); 

                    return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                }

            };

            // PhotoSwipe opened from URL
            if(fromURL) {
                if(options.galleryPIDs) {
                    // parse real index when custom PIDs are used 
                    // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                    for(var j = 0; j < items.length; j++) {
                        if(items[j].pid == index) {
                            options.index = j;
                            break;
                        }
                    }
                } else {
                    // in URL indexes start from 1
                    options.index = parseInt(index, 10) - 1;
                }
            } else {
                options.index = parseInt(index, 10);
            }

            // exit if index not found
            if( isNaN(options.index) ) {
                return;
            }

            if(disableAnimation) {
                options.showAnimationDuration = 0;
            }

            // Pass data to PhotoSwipe and initialize it
            gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
            gallery.init();
        };

        // loop through all gallery elements and bind events
        var galleryElements = document.querySelectorAll( gallerySelector );

        for(var i = 0, l = galleryElements.length; i < l; i++) {
            galleryElements[i].setAttribute('data-pswp-uid', i+1);
            galleryElements[i].onclick = onThumbnailsClick;
        }

        // Parse URL and open gallery if it contains #&pid=3&gid=1
        var hashData = photoswipeParseHash();
        if(hashData.pid && hashData.gid) {
            openPhotoSwipe( hashData.pid ,  galleryElements[ hashData.gid - 1 ], true, true );
        }
        };

        // execute above function
        initPhotoSwipeFromDOM('.my-gallery');
</script>
@endsection
