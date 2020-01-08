@extends('layout')

@section('content')

    <form method="POST" action="{{ route('store') }}">
        @csrf
        <textarea name="content" id="content" cols="50" rows="10"></textarea>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
        <br>
        <button type="submit" style="padding: 10 30px;">作成</button>
        <br>
        <a href="{{ route('index') }}">キャンセル</a>
    </form>
    
@endsection
