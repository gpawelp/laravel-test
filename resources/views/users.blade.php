@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        @foreach($users as $userSingle)
            <p>{{ $userSingle->name }}</p>
        @endforeach
        
        {{ $users->links() }}
        
    </div>
</div>
@endsection
