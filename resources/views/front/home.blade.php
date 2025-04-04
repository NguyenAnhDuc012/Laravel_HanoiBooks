@include('front.layouts.header')

<main>
    <section class="section-1">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="false">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <!-- <img src="images/carousel-1.jpg" class="d-block w-100" alt=""> -->

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-1-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-1.jpg') }}" />
                        <img src="{{ asset('front-assets/images/carousel-1.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Sách Mới Ra Mắt</h1>
                            <p class="mx-md-5 px-5">Khám phá những cuốn sách mới ra mắt với nhiều thể loại hấp dẫn, từ tiểu thuyết đến sách khoa học. Mang đến những kiến thức bổ ích và những trải nghiệm tuyệt vời qua từng trang sách.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-2-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-2.jpg') }}" />
                        <img src="{{ asset('front-assets/images/carousel-2.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Sách Văn Học Nổi Tiếng</h1>
                            <p class="mx-md-5 px-5">Khám phá những tác phẩm văn học nổi tiếng, từ những tác giả vĩ đại đến những cuốn sách mang lại nhiều cảm hứng. Đọc sách văn học để mở mang kiến thức và nuôi dưỡng tâm hồn.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Mua ngay</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <!-- <img src="images/carousel-3.jpg" class="d-block w-100" alt=""> -->

                    <picture>
                        <source media="(max-width: 799px)" srcset="{{ asset('front-assets/images/carousel-3-m.jpg') }}" />
                        <source media="(min-width: 800px)" srcset="{{ asset('front-assets/images/carousel-3.jpg') }}" />
                        <img src="{{ asset('front-assets/images/carousel-3.jpg') }}" alt="" />
                    </picture>

                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3">
                            <h1 class="display-4 text-white mb-3">Giảm Giá 50% Cho Các Cuốn Sách Yêu Thích</h1>
                            <p class="mx-md-5 px-5">Chỉ trong thời gian giới hạn, các bạn có thể mua các cuốn sách yêu thích với mức giá giảm lên đến 50%. Đừng bỏ lỡ cơ hội sở hữu những cuốn sách tuyệt vời với giá ưu đãi.</p>
                            <a class="btn btn-outline-light py-2 px-4 mt-3" href="#">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="section-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-check text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Sản phẩm chất lượng</h5>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-shipping-fast text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Miễn phí vận chuyển</h2>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-exchange-alt text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Trong 14 ngày</h2>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="box shadow-lg">
                        <div class="fa icon fa-phone-volume text-primary m-0 mr-3"></div>
                        <h2 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-4 pt-5">
        <div class="container">
            <div class="section-title">
                <h2>Sản phẩm tiêu biểu</h2>
            </div>
            <div class="row pb-3">

                @foreach ($sachs as $sach)
                <div class="col-md-3">
                    <div class="card product-card">
                        <div class="product-image position-relative">
                            <a href="#" class="product-img">
                                <img class="card-img-top" src="{{ asset('images/' . $sach->HinhAnh) }}" alt="">
                            </a>

                            <form action="{{ route('cart.add', $sach->MaSanPham) }}" method="POST">
                                @csrf
                                <div class="product-action">
                                    <button class="btn btn-dark">
                                        <i class="fa fa-shopping-cart"></i> Thêm giỏ hàng
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-body text-center mt-3">
                            <a class="h6 link" href="#">{{ $sach->TenSanPham }}</a>
                            <div class="price mt-2">
                                <span class="h5"><strong>{{ number_format($sach->GiaBan, 0, ',', '.') }} đ</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>


</main>

@include('front.layouts.footer')