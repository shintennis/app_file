@extends('layout')

@section('content')

    <form method="POST" action="{{ route('update',['id'=>$memo->id]) }}">
       @csrf 
       <textarea name="content" id="content" cols="50" rows="10">{{ $memo->content }}</textarea>
       @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif
       <button type="submit">更新</button>
       <a href="{{ route('index') }}"></a>
    </form>
@endsection
