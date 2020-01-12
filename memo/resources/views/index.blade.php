@extends('layout')

@section('content')

<a class="btn btn-success" href="{{ route('create') }}">メモの作成</a>

    @foreach($memos as $memo)
    <div class="card bg-light mb-3 mt-3" style="max-width: 20rem; margin: 0 auto">
        <div class="card-header">{{ $memo->content }}</div>
        <div class="card-body">
            <a class="card-title btn btn-primary" href="{{ route('edit',['id' => $memo->id]) }}" style="margin: 0;">編集</a>
            <a id="button" href="{{ route('delete',['id' => $memo->id]) }}" class="card-text btn btn-danger">削除</a>
        </div>
    </div>
        @endforeach
        
@endsection
