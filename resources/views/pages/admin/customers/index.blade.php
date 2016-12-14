@extends('layouts.admin.application', ['menu' => 'customers'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
    <script src="{!! \URLHelper::asset('js/delete_item.js', 'admin') !!}"></script>
@stop

@section('title')
@stop

@section('header')
    Customers
@stop

@section('breadcrumb')
    <li class="active">Customers</li>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                <p class="text-right">
                    <a href="{!! URL::action('Admin\CustomerController@create') !!}"
                       class="btn btn-block btn-primary btn-sm"
                       style="width: 125px;">@lang('admin.pages.common.buttons.create')</a>
                </p>
            </h3>
            <p>@lang('admin.pages.common.label.search_results', ['count' => $count])</p>
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>@lang('admin.pages.customers.columns.name')</th>
                    <th>@lang('admin.pages.customers.columns.address')</th>
                    <th>@lang('admin.pages.customers.columns.telephone')</th>

                    <th style="width: 40px">@lang('admin.pages.common.label.actions')</th>
                </tr>
                @foreach( $models as $model )
                    <tr>
                        <td>{{ $model->id }}</td>
                        <td>{{ $model->name }}</td>
                        <td>{{ $model->address }}</td>
                        <td>{{ $model->telephone }}</td>

                        <td>
                            <a href="{!! URL::action('Admin\CustomerController@show', $model->id) !!}"
                               class="btn btn-block btn-primary btn-xs">@lang('admin.pages.common.buttons.edit')</a>
                            <a href="#" class="btn btn-block btn-danger btn-xs delete-button"
                               data-delete-url="{!! action('Admin\CustomerController@destroy', $model->id) !!}">@lang('admin.pages.common.buttons.delete')</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer">
            {!! \PaginationHelper::render($offset, $limit, $count, $baseUrl, []) !!}
        </div>
    </div>
@stop