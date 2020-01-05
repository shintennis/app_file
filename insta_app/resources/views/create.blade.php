@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
                <div class="card">
                    <h5 class="card-header">投稿</h5>
                    <div class="card-body">
                        <label for="content">投稿</label>
                        <textarea name="content" id="content"></textarea>
                        <br>
                        <input type="file" class="form-control" name="image_file">
                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        @endif
                        <br>
                        <button class="btn btn-primary" type="submit">投稿</button>
                        <br>
                        <a class="btn btn-outline-primary" href="{{ route('index') }}">
                            キャンセル
                        </a>
                    </div>    
                </div>
</form>

@endsection