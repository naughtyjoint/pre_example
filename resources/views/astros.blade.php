@extends('layouts.app')
<style>
    .sign-list li {
        list-style-type: none;
        margin-right: 10px;
        float: left;
    }
    .update-time {
        color: #8b8b8b;
        font-size: 12px;
    }
</style>

@section('content')
    <a href="{{ url('/') }}">回首頁</a>
    <ul class="sign-list">
        <li>
            <a href="{{ url('/astros/0') }}">牡羊座</a>
        </li>
        <li>
            <a href="{{ url('/astros/1') }}">金牛座</a>
        </li>
        <li>
            <a href="{{ url('/astros/2') }}">雙子座</a>
        </li>
        <li>
            <a href="{{ url('/astros/3') }}">巨蟹座</a>
        </li>
        <li>
            <a href="{{ url('/astros/4') }}">獅子座</a>
        </li>
        <li>
            <a href="{{ url('/astros/5') }}">處女座</a>
        </li>
        <li>
            <a href="{{ url('/astros/6') }}">天秤座</a>
        </li>
        <li>
            <a href="{{ url('/astros/7') }}">天蠍座</a>
        </li>
        <li>
            <a href="{{ url('/astros/8') }}">射手座</a>
        </li>
        <li>
            <a href="{{ url('/astros/9') }}">摩羯座</a>
        </li>
        <li>
            <a href="{{ url('/astros/10') }}">水瓶座</a>
        </li>
        <li>
            <a href="{{ url('/astros/11') }}">雙魚座</a>
        </li>
    </ul>
    <div style="clear: both;"></div>
    <p>{{ date('Y/m/d') }}</p>
    <span class="update-time">last updated: {{ date('G:00') }}</span>
    @if($sign)
        <h3>今日{{ $sign->name }}星座運勢分析</h3>
    @else
        <h3>今日星座運勢分析</h3>
    @endif


    @if($signs)
        @foreach ($signs as $sign)
            <div>
                <p>{{ $sign->name }}</p>
                <p>{!! $sign->horoscopes->content !!}</p>
            </div>
            <br>
        @endforeach
    @elseif($sign)
        {!! $horoscopes->content !!}
        <br>
        @foreach ($past_horo as $horo)
            <p>{{ date('Y/m/d', strtotime($horo->date)) }}</p>
            <p>{!! $horo->content !!}</p>
            <br>
        @endforeach
    @endif
@endsection