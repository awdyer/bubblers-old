@extends('layouts.app')

@section('content')

    @foreach($bubblers as $bubbler)

        <div class="panel panel-default">
            <div class="panel-body">
                <div>
                    <strong>Suburb</strong>
                    <span style="margin-left: 30px;">
                        {{ $bubbler->suburb->name }}
                    </span>
                </div>
                <div>
                    <strong>Park</strong>
                    <span style="margin-left: 30px;">
                        {{ $bubbler->park->name }}
                    </span>
                </div>
                <br>
                <div>
                    {{ $bubbler->description }}
                </div>
            </div>
        </div>

    @endforeach

@endsection