<div>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option spad set-bg" data-setbg="{{ asset('img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Portfolio</h2>
                        <div class="breadcrumb__links">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Portfolio</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Portfolio Section Begin -->
    <section class="portfolio spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="portfolio__filter">
                        <li class="{{ $selectedCategory === 'all' ? 'active' : '' }}" 
                            wire:click="selectCategory('all')"
                            style="cursor: pointer;"
                            data-filter="*">
                            All
                        </li>
                        @foreach($categories as $category)
                            <li class="{{ $selectedCategory === $category ? 'active' : '' }}" 
                                wire:click="selectCategory('{{ $category }}')"
                                style="cursor: pointer;"
                                data-filter=".{{ Str::slug($category) }}">
                                {{ $category }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row portfolio__gallery">
                @foreach($projects as $project)
                    @php
                        $filterClass = $project->category ? 'mix ' . Str::slug($project->category) : 'mix';
                        $image = $project->image 
                            ? asset('storage/' . $project->image) 
                            : asset('img/portfolio/portfolio-' . ($loop->index % 9 + 1) . '.jpg');
                    @endphp

                    <div class="col-lg-4 col-md-6 col-sm-6 {{ $filterClass }}">
                        <div class="portfolio__item">
                            <div class="portfolio__item__video set-bg" 
                                data-setbg="{{ $image }}"
                                style="background-image: url('{{ $image }}')">
                                @if($project->video_url)
                                    <a href="{{ $project->video_url }}" class="play-btn video-popup">
                                        <i class="fa fa-play"></i>
                                    </a>
                                @endif
                            </div>
                            <div class="portfolio__item__text">
                                <h4>{{ $project->title }}</h4>
                                @if($project->category)
                                    <span>{{ $project->category }}</span>
                                @endif
                                @if($project->client)
                                    <ul>
                                        <li>{{ $project->client->name }}</li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="pagination__option">
                        <a href="#" class="arrow__pagination left__arrow"><span class="arrow_left"></span> Prev</a>
                        <a href="#" class="number__pagination">1</a>
                        <a href="#" class="number__pagination">2</a>
                        <a href="#" class="arrow__pagination right__arrow">Next <span class="arrow_right"></span></a>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Portfolio Section End -->
</div>
