@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    @lang('message.task_edit')
                </div>

                <div class="panel-body">

                    @include('common.errors')

                      {!! Form::open(['url' => ('tasks/' .$task->id), 'method' => 'POST', 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}
                        <div class="form-group">
                             {!! Form::label('task-name', trans('message.edit_task'), ['class' => 'col-sm-3 control-label']) !!}

                            <div class="col-sm-12">
                                 {!! Form::text('name', $task->name, ['id' => 'task-name', 'class' => 'form-control']) !!}
                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ Form::submit(trans('message.update_task'), ['class' => 'btn btn-default']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
