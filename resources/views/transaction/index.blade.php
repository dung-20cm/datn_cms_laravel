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
                                    <input type="text" name="n" value="{{ Request::get('n') }}" class="form-control" placeholder="Tên danh mục">
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
                                <th>Thông tin</th>
                                <th>Số tiền</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions ?? [] as $key => $item)
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
                                    <td>{{ $item->t_note }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('transaction.delete', $item->id) }}" class="btn-text text-danger"><i class="btn-icon-prepend" data-feather="trash"></i> </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="padding: 10px;">
                        {!! $transactions->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
