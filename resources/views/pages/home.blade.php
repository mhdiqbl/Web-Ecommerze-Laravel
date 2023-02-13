@extends('layouts.app')

@section('title')
    Store Home Page
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#storeCarousel" data-slide-top="0"></li>
                                <li data-target="#storeCarousel" data-slide-top="1"></li>
                                <li data-target="#storeCarousel" data-slide-top="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/images/banner.jpg" alt="Carousel Image" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner.jpg" alt="Carousel Image" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="/images/banner.jpg" alt="Carousel Image" class="d-block w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="store-trend-categories">
            <!-- section categories -->
            <div class="container">
                <div class="row">
                    <!-- row untuk title -->
                    <div class="col-12" data-aos="fade-up">
                        <h5>Trend Categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementCategory = 0 @endphp
                    @forelse($categories as $category)
                        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100 }}">
                            <a href="{{ url('categories/', $category->slug) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            <b>Categories not found</b>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="store-new-product">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>New Product</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementProduct = 0 @endphp
                    @forelse($products as $product)
                        <div class="col-6 col-md4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="
                                        @if($product->galleries->count())
                                            background-image:url('{{ Storage::url($product->galleries->first()->photos) }}')
                                        @else
                                            background-color: #eee
                                        @endif
                                            ">
                                    </div>
                                </div>
                                <div class="products-text">
                                    {{ $product->name }}
                                </div>
                                <div class="products-price">
                                    ${{ $product->price }}
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                            <b>Products not found</b>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection
