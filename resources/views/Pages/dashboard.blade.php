@extends('layouts.default')
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="content-bg rounded d-flex align-items-center justify-content-between p-4">
                    <i class="xi-won xi-3x"></i>
                    <div class="ms-3">
                        <p class="mb-2">오늘의 이익</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="content-bg rounded d-flex align-items-center justify-content-between p-4">
                    <i class="xi-trending-up xi-3x"></i>
                    <div class="ms-3">
                        <p class="mb-2">가장 많이 오른 주식</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="content-bg rounded d-flex align-items-center justify-content-between p-4">
                    <i class="xi-trending-down xi-3x"></i>
                    <div class="ms-3">
                        <p class="mb-2">가장 많이 떨어진 주식</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="content-bg rounded d-flex align-items-center justify-content-between p-4">
                    <i class="xi-wallet xi-3x"></i>
                    <div class="ms-3">
                        <p class="mb-2">총 자산</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->


    <!-- Sales Chart Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
                <div class="content-bg main-chart-area text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">차트</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-xl-3">
                <div class="content-bg favourite-stock text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">관심 있는 주식</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sales Chart End -->


    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="content-bg text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">나의 주식 현황</h6>
                <a href="">펼쳐보기</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">주식명</th>
                            <th scope="col">현재가</th>
                            <th scope="col">-</th>
                            <th scope="col">-</th>
                            <th scope="col">-</th>
                            <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->


    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 content-bg rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">뉴스</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 content-bg rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">공지사항</h6>
                        <a href="">+</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 content-bg rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">미정</h6>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection