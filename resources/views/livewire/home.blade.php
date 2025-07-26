<div>

    @if(session()->has('message'))
        <div class="alert alert-success mb-4">
            {{ session('message') }}
        </div>
    @endif
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span></span>
                                <h2>Full service video production</h2>
                                <a href="{{ route('portfolio') }}" class="primary-btn">See our collection</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <span></span>
                                <h2>Professional recording of live events</h2>
                                <a href="{{ route('contact') }}" class="primary-btn">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Services Section Begin -->
        <section class="services spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="services__title">
                            <div class="section-title">
                                <span>Our services</span>
                                <h2>What We do?</h2>
                            </div>
                            <a href="{{ route('contact') }}" class="primary-btn">View all services</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach($latestServices as $service)
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="services__item">
                                        <h4>{{ $service->title }}</h4>
                                        <p>{{ $service->description ?? 'Professional service delivered with excellence' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Section End -->

    <!-- Work Section Begin -->
        <section class="work">
            <div class="work__gallery">
                <div class="grid-sizer"></div>
                
                @foreach($latestProjects as $project)
                    @php
                        // Determine item size class based on loop index
                        $sizeClass = match($loop->index) {
                            0 => 'wide__item',
                            3 => 'large__item',
                            6 => 'wide__item',
                            default => 'small__item'
                        };
                        
                        // Only show details on wide/large items
                        $showDetails = in_array($sizeClass, ['wide__item', 'large__item']);
                        
                        // Use project image or placeholder
                        $image = $project->image ? asset('storage/'.$project->image) : asset('img/work/work-'.($loop->index+1).'.jpg');
                    @endphp
                    
                    <div class="work__item {{ $sizeClass }} set-bg" 
                        data-setbg="{{ $image }}"
                        style="background-image: url('{{ $image }}')">
                        <a href="{{ $project->video_url }}" class="play-btn video-popup">
                            <i class="fa fa-play"></i>
                        </a>
                        
                        @if($showDetails)
                            <div class="work__item__hover">
                                <h4>{{ $project->title }}</h4>
                                <ul>
                                    <li>{{ $project->client->name ?? 'Our Client' }}</li>
                                    <li>{{ $project->category ?? 'Video Production' }}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Work Section End -->

    <!-- Call To Action Section Begin -->
    <section class="callto spad set-bg" data-setbg="img/callto-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="callto__text">
                        <h2>Fresh Ideas, Fresh Moments Giving Wings to your Stories.</h2>
                        <a href="{{ route('about') }}">Start your stories</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section End -->
</div>
