@extends('layouts.admin')

@section('title', 'Xem KPI của nhân viên')

@section('content')
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>KPI của nhân viên: {{ $user->name }}</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            {{-- Bộ lọc theo thời gian --}}
            <form method="GET" action="{{ route('kpi.view', $user->id) }}" class="form-inline" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label for="period" style="margin-right: 10px;">Chọn kỳ đánh giá:</label>
                    <input type="month" name="period" id="period"
                           value="{{ request('period') }}"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                    Lọc
                </button>

                @if(request('period'))
                    <a href="{{ route('kpi.view', $user->id) }}" class="btn btn-secondary" style="margin-left: 10px;">
                        Xóa lọc
                    </a>
                @endif
            </form>
            {{-- Bảng dữ liệu --}}
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kỳ đánh giá</th>
                        <th>Tiêu chí</th>
                        <th>Điểm</th>
                        <th>Người chấm</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($scores as $s)
                        <tr>
                            <td>{{ $s->period }}</td>
                            <td>{{ $s->criteria->name }}</td>
                            <td>{{ $s->score }}</td>
                            <td>{{ $s->rater->name }}</td>
                            <td>{{ $s->note }}</td>
                            <td>{{ $s->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu KPI cho kỳ này.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
