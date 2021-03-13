@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="d-flex justify-content-center mt-5">
            <form action="/addTask" method="post">
                @csrf
                <div class="">
                    <label for="description">Task Description: </label>
                    <input type="text" id="description" name="description">
                </div>
                <div class="">
                    <label for="task">Schedule Task: </label>
                    <input type="date" id="task" name="task">
                    <input type="time" name="time" id="time">
                </div>
        
                <input type="submit" value="Schedule">
            </form>
        </div>
    </div>
@endsection