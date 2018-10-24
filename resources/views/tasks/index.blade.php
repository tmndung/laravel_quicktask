
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">

                <div class="panel-heading">
                    @lang('message.new_task')
                </div>

                <div class="panel-body">

                    @include('common.errors')

                    {!! Form::open(['url' => ('tasks'), 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                             {!! Form::label('task-name', trans('message.task'), ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-12">
                                 {!! Form::text('name', '', ['id' => 'task-name', 'class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                {{ Form::submit(trans('message.add_task'), ['class' => 'btn btn-default']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            @if (count($tasks) > config('configquicktask.empty'))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @lang('message.current_task')
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <thead>
                                <th>@lang('message.task')</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                            </thead>

                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>

                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <td>
                                            {!! Form::open(['url' => ('tasks/'.$task->id . '/edit'), 'method' => 'GET']) !!}

                                                {{ Form::submit(trans('message.edit_task'), ['class' => 'btn btn-danger', 'id' => 'edit-task' . ($task->id)]) }}
                                            {!! Form::close() !!}
                                        </td>

                                        <td>
                                            {!! Form::open(['url' => ('tasks/'.$task->id), 'method' => 'POST', 'method' => 'DELETE']) !!}

                                                {{ Form::submit(trans('message.delete'), ['class' => 'btn btn-danger', 'id' => 'delete-task-' . ($task->id)]) }}
                                            {!! Form::close() !!}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
