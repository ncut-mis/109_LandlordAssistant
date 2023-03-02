@extends('layouts.master')
@section('title', '個人資料')
@section('content')
<header class="py-0">
    <div class="px-4 py-3 text-dark">
    </div>
</header>
{{--    <table style="margin: 0 auto;">--}}
<div class="main">
    <table class="table text-light">
        <tbody>
        <tr>
            <th class="px-1 text-light fs-3" colspan="5" style="border: 0">個人資料</th>
        </tr>
        <tr>
            <td colspan="2" rowspan="3" class="center" style="border: 0"><img
                    src="data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512'%3e%3cpath fill='%23000000' d='M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z'/%3e%3c/svg%3e"
                    alt="圖像" width="100" height="100"><br></td>
            <th class="fw-bolder" style="border: 0">會員編號</th>
            <td colspan="2" style="border: 0">000001</td>
        </tr>
        <tr>
            <th class="fw-bolder" style="border: 0">帳號</th>
            <td colspan="2" style="border: 0">kuri_1127</td>
        </tr>
        <tr>
            <th class="fw-bolder" style="border: 0">姓名</th>
            <td colspan="2" style="border: 0">黃佳怡</td>
        </tr>
        <tr>
            <th class="fw-bolder" style="border: 0">性別</th>
            <td style="border: 0">女</td>
            <th class="fw-bolder" style="border: 0">電話</th>
            <td colspan="2" style="border: 0">0919497338</td>
        </tr>
        <tr>
            <th class="fw-bolder" style="border: 0">生日</th>
            <td style="border: 0">2001/11/27</td>
            <th class="fw-bolder" style="border: 0">信箱</th>
            <td style="border: 0">alice266581@gmail.com</td>
            <td style="border: 0"><button type="button" class="btn btn-light">修改個人資料</button></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="py-2"></div>
<div class="main">
    <table class="table text-light">
        <tbody>
        <tr>
            <th class="px-1 fs-3" colspan="5" style="border: 0">安全性</th>
        </tr>
        <tr>
            <th class="fw-bolder">帳號</th>
            <td>kuri_1127</td>
            <td><button type="button" class="btn btn-light btn-sm">更改帳號</button></td>
        </tr>
        <tr>
            <th class="fw-bolder">密碼</th>
            <td>你看不到窩</td>
            <td>
                <button type="button" class="btn btn-light btn-sm">更改密碼</button>
            </td>
        </tr>

        </tbody>
    </table>
</div>
<div class="py-2"></div>
<div class="main">
    <table class="table text-light">
        <tbody>
        <tr>
            <th class="px-1 fs-3" colspan="5" style="border: 0">收付款方式</th>
        </tr>
        <tr>
            <th class="fw-bolder">銀行帳戶</th>
            <th class="fw-bolder">銀行帳號</th>
        </tr>
        <tr>
            <td class="center">487</td>
            <td class="center">5948787418</td>
        </tr>
        <tr>
            <td colspan="2" class="center">
                <button type="button" class="btn btn-light btn-sm">設定帳戶</button>
            </td>
        </tr>
    </table>
</div>
@endsection
