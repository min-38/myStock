@extends('layouts.default')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="content-bg text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">주식 차트</h6>
            </div>
            <div class="table-responsive">
                <div id="chartContainer">

                </div>
            </div>
        </div>
    </div>
@endsection