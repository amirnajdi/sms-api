<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>گزارش</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.rtl.min.css"
          integrity="sha384-mUkCBeyHPdg0tqB6JDd+65Gpw5h/l8DKcCTV2D2UpaMMFd7Jo8A+mDAosaWgFBPl" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        @font-face {
            font-family: Vazir;
            src: url(../fonts/Vazir-Regular.ttf);
        }

        body {
            font-family: Vazir;
            background-color: #f7f7f9;
        }

    </style>
</head>
<body dir="rtl">

<div class="container">
    <div class="row mt-5">
        <div class="alert alert-primary" role="alert">
            تعداد کل SMS های ارسال شده<span class="badge rounded-pill bg-success p-2" style="float: left">{{number_format($smsCount)}}</span>
        </div>
        {{--top ten--}}
        <div class="card">
            <div class="card-body">
                <h6 class="card-title pt-2 pb-1">تعداد SMS های ارسال شده توسط هر کدام از API</h6>
                <div class="table-responsive text-center">
                    <table class="table table-striped  table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان</th>
                            <th scope="col">تعداد SMS های ارسال شده</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apiCount as $api)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$api['api_title']}}</td>
                                <td>{{$api['count']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--top ten--}}
        <div class="card mt-3">
            <div class="card-body">
                <h6 class="card-title pt-2 pb-1">10 شماره ای که بشترین SMS برای آن ها ارسال شده</h6>
                <div class="table-responsive text-center">
                    <table class="table table-striped  table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">تعداد ارسال SMS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($topTenNumbers as $number)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$number['number']}}</td>
                                <td>{{$number['count']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h6 class="card-title pt-2 pb-1">SMS های ارسال شده</h6>
                <div class="table-responsive text-center">
                    <table class="table table-striped  table-hover">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">شماره تلفن</th>
                            <th scope="col">متن پیام</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">API</th>
                            <th scope="col">تاریخ ارسال</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($smsLogs as $smsLog)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$smsLog['number']}}</td>
                                <td>{{$smsLog['body']}}</td>
                                <td>{{$smsLog['status_title']}}</td>
                                <td>{{$smsLog['api_title']}}</td>
                                <td>{{$smsLog['created_at']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $smsLogs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
