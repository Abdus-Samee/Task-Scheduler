@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(count($tasks) > 0)
                        @foreach ($tasks as $task)
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-around">
                                        {{ $task->description }}
                                        <a href="/tasks/complete/{{$task->id}}">Complete</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2>No pre assigned tasks</h2>
                    @endif
                    
                    <br>
                    <a href="/addTask">Add Task</a>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
