@extends('layouts.admin')
@section('title','Thưởng KPI')

@section('content')
<div class="right_col">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thưởng KPI: {{ $user->name }}</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            {{-- Bộ lọc theo năm --}}
            <form method="GET" action="{{ route('kpi.annual', $user->id) }}" class="form-inline" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label for="year" style="margin-right: 10px;">Chọn năm:</label>
                    <input type="number" name="year" id="year"
                        value="{{ request('year', date('Y')) }}"
                        class="form-control" min="2000" max="{{ date('Y') }}">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                    Lọc
                </button>

                @if(request('year'))
                    <a href="{{ route('kpi.annual', $user->id) }}" class="btn btn-secondary" style="margin-left: 10px;">
                        Xóa lọc
                    </a>
                @endif
            </form>


            <table class="table table-bordered mt-3">
                <tr><th>Năm</th><td>{{ $year }}</td></tr>
                <tr><th>Tổng điểm KPI</th><td>{{ $totalScores }} / {{ $maxYearScore }}</td></tr>
                <tr><th>Tiền thưởng</th><td>{{ number_format($bonus,0,',','.') }} VND</td></tr>
            </table>

            <a href="{{ route('kpi.index') }}" class="btn btn-default">Quay lại</a>
        </div>
    </div>
</div>
@endsection
