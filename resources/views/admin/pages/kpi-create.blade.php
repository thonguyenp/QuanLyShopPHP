@extends('layouts.admin')

@section('title', 'Trang chấm kpi')


@section('content')
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chấm KPI cho nhân viên: {{ $user->name }}</h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            <form class="form-horizontal" method="POST" action="{{ route('kpi.store') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">
                        Kỳ đánh giá
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="month" 
                            name="period" 
                            class="form-control"
                            required>
                    </div>
                </div>
                <hr>

                @foreach($criteria as $c)
                    <div class="form-group">
                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">
                            {{ $c->name }} (Tối đa {{ $c->max_score }} điểm)
                        </label>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="number"
                                class="form-control"
                                name="scores[{{ $c->id }}]"
                                max="{{ $c->max_score }}"
                                min="0"
                                value="{{ old('scores.'.$c->id) }}"
                                required>

                            @error('scores.'.$c->id)
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Ghi chú</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="note" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Lưu KPI</button>
                        <a href="{{ route('kpi.index') }}" class="btn btn-default">Quay lại</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection