<!-- resources/views/tasks/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('tasks') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                             {!! Form::label('task-name', trans('message.task'), ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-6">
                                 {!! Form::text('name', '', ['id' => 'task-name', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ Form::submit(trans('message.add_task'), ['class' => 'btn btn-default']) }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection
