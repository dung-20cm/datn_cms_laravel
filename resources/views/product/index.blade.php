@extends('layouts.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('get.home') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <input type="text" name="n" autocomplete="off" value="{{ Request::get('n') }}" class="form-control" placeholder="Tên danh mục">
                                </div>
                            </div><!-- Col -->
                            <div class="col-sm-3">
                                <div class="mb-3">
                                    <a href="{{ route('product.create') }}"  class="btn btn-success btn-sm btn-text"><i class="btn-icon-prepend" data-feather="plus-circle"></i> Thêm mới</a>
                                </div>
                            </div><!-- Col -->
                        </div><!-- Row -->
                        <button type="submit" class="btn btn-danger btn-sm btn-text"><i class="btn-icon-prepend" data-feather="filter"></i> Lọc</button>
                        <button type="submit" class="btn btn-secondary btn-sm btn-text"><i class="btn-icon-prepend" data-feather="refresh-ccw"></i> Làm mới</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Avatar</th>
                                <th style="width: 250px;">Name</th>
                                <th>Category</th>
                                <th>Thông tin</th>
                                <th>Create</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($products ?? [] as $key => $item)
                                <tr>
                                    <td>{{ ($key + 1) }}</td>
                                    <td class="py-1">
                                        <img src="{{ $item->pro_avatar }}" class="img img-fluid img" style="object-fit: cover;"
                                             onerror="this.onerror=null;this.src='{{ asset("image/placeholder.jpg") }}';"  alt="image">
                                    </td>
                                    <td>{{ $item->pro_name }}</td>
                                    <td><a href="">{{ $item->category->c_name ?? "[N\A]" }}</a></td>
                                    <td>
                                        <ul style="padding-left: 0">
                                            <li>Giá <span>{{ number_format($item->pro_price,0,',','.') }} đ</span></li>
                                            <li>SL <span>{{ $item->pro_number  }}</span></li>
                                            <li>Bảo hành <span>{{ $item->pro_warranty_date == 0 ? " : Không" : $item->pro_warranty_date . " ngày"  }}</span></li>
                                        </ul>
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('product.delete', $item->id) }}" class="btn-text text-danger"><i class="btn-icon-prepend" data-feather="trash"></i> </a>
                                        <a href="{{ route('product.update', $item->id) }}" class="btn-text text-success"><i class="btn-icon-prepend" data-feather="edit"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 10px;">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
