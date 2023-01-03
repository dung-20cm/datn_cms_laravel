@extends('layouts.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Thành viên mới</h6>
                    <p class="text-muted mb-3"><a href="{{ route('user.index') }}">Xem tất cả</a></p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Thông tin</th>
                                <th>Họ tên</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($usersNew ?? [] as $key => $item)
                                    <tr>
                                        <th>{{ $key + 1 }}</th>
                                        <td>
                                            <ul style="padding-left: 0">
                                                <li>{{ $item->name }}</li>
                                                <li>{{ $item->phone }}</li>
                                            </ul>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Đơn hàng mới</h6>
                    <p class="text-muted mb-3"><a href="{{ route('transaction.index') }}">Xem danh sách</a></p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Thông tin</th>
                                <th>Số tiền</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactionsNew ?? [] as $key => $item)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td>
                                        <ul style="padding-left: 0">
                                            <li>{{ $item->t_name }}</li>
                                            <li>{{ $item->t_phone }}</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <span>{{ number_format($item->t_total_money,0,',','.') }} đ</span>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Danh sách sản phẩm mới được bán</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Ngày đặt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordersNew ?? [] as $item)
                                @if (isset($item->product))
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ $item->product->pro_avatar }}" alt="image">
                                    </td>
                                    <td>{{ $item->product->pro_name }}</td>
                                    <td>{{ number_format($item->od_total_price,0,',','.') }}đ</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
