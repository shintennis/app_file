@extends('layout')

@section('content')

<a href="{{ route('create') }}">メモの作成</a>

    @foreach($memos as $memo)
    <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-header">{{ $memo->content }}</div>
        <div class="card-body">
            <a class="card-title" href="{{ route('edit',['id' => $memo->id]) }}">編集</a>
            <a id="button" href="{{ route('delete',['id' => $memo->id]) }}" class="card-text">削除</a>
        </div>
    </div>
        @endforeach
        
@endsection
