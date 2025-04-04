@include('front.layouts.header')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a class="white-text" href="{{ route('front.home') }}">Cửa hàng</a></li>
                    <li class="breadcrumb-item">Giỏ hàng</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="section-9 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-responsive">

                        @if(session('error'))
                        <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                        @endif

                        <table class="table" id="cart">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên Sách</th>
                                    <th>Số lượng</th>
                                    <th>Đơn giá</th>
                                    <th>Thành tiền</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td><img src="{{ asset($item['image']) }}" width="100" height="100"></td>
                                    <td>{{ $item['name'] }}</td>

                                    <td>
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <form action="{{ route('cart.decrease', $item['id']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-dark btn-minus p-2 pt-1 pb-1">
                                                        <i class="fa fa-minus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <input type="text" class="form-control form-control-sm border-0 text-center" value="{{ $item['quantity'] }}" readonly>
                                            <div class="input-group-btn">
                                                <form action="{{ route('cart.increase', $item['id']) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-sm btn-dark btn-plus p-2 pt-1 pb-1">
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }} đ</td>
                                    <td>
                                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card cart-summery">
                        <div class="sub-title">
                            <h2 class="bg-white">Tóm tắt giỏ hàng</h2>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between summery-end">
                                <div>Tổng Cộng</div>
                                <div>{{ number_format($total, 0, ',', '.') }} đ</div>
                            </div>
                            <div class="pt-5">
                                <a href="{{ route('front.order.showOrder') }}" class="btn-dark btn btn-block w-100">Mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('front.layouts.footer')