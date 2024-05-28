@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
                <ul class="event-list">
                    @foreach ($notifications as $notification)
                        <li>
                            <time datetime="2024-04-20">
                                @if (array_key_exists('date', $notification['data']))
                                    <span
                                        class="day">{{ date_create_from_format('Y-m-d', $notification['data']['date'])->format('d') }}</span>
                                    <span
                                        class="month">{{ date_create_from_format('Y-m-d', $notification['data']['date'])->format('M') }}</span>
                                    <span class="year">2024</span>
                                    <span class="time">ALL DAY</span>
                                @else
                                    <span class="day">{{ $notification->created_at->format('d') }}</span>
                                    <span class="month">{{ $notification->created_at->format('M') }}</span>
                                    <span class="year">2024</span>
                                    <span class="time">ALL DAY</span>
                                @endif
                            </time>
                            <div class="info"
                                style="background-color: @if ($notification->unread()) grey @else white @endif;">
                                <h2 class="title">{{ $notification->data['title'] ?? '' }}</h2>
                                <p class="desc">{{ $notification->data['message'] ?? '' }}</p>
                            </div>
                        </li>
                        {{ $notification->markAsRead() }}
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
