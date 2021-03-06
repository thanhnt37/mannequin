@extends('layouts.admin.' . config('view.admin') . '.application', ['menu' => 'imports'] )

@section('metadata')
@stop

@section('styles')
    <link rel="stylesheet" href="{!! \URLHelper::asset('libs/datetimepicker/css/bootstrap-datetimepicker.min.css', 'admin') !!}">
    <link rel="stylesheet" href="{!! \URLHelper::asset('libs/plugins/select2/select2.min.css', 'admin') !!}">

    <style>
        #modal-import-product tr th {
            padding-top: 15px;
        }
    </style>
@stop


@php
    foreach( $products as $key => $product ) {
        $products[$key]['unit_name']  = isset($product->unit) ? $product->unit->name : '';
        $products[$key]['unit2_name'] = isset($product->unit2) ? $product->unit2->name : '';
    }
@endphp
@section('scripts')
    <script>
        Boilerplate.employeeId = @if( empty($import->employee_id) ) '[]' @else {!! $import->employee_id !!} @endif ;
        Boilerplate.products = {!! $products !!};
    </script>
    <script src="{{ \URLHelper::asset('libs/moment/moment.min.js', 'admin') }}"></script>
    <script src="{{ \URLHelper::asset('libs/datetimepicker/js/bootstrap-datetimepicker.min.js', 'admin') }}"></script>
    <script src="{{ \URLHelper::asset('libs/plugins/select2/select2.full.min.js', 'admin') }}"></script>

    <script src="{!! \URLHelper::asset('js/pages/imports/edit.js', 'admin') !!}"></script>

    <script>
        $('.datetime-field').datetimepicker({'format': 'YYYY-MM-DD', 'defaultDate': new Date()});
    </script>
@stop

@section('title')
@stop

@section('header')
    @lang('admin.breadcrumb.imports')
@stop

@section('breadcrumb')
    <li><a href="{!! action('Admin\ImportController@index') !!}"><i class="fa fa-files-o"></i> @lang('admin.breadcrumb.imports')</a></li>
    @if( $isNew )
        <li class="active">@lang('admin.breadcrumb.create_new')</li>
    @else
        <li class="active">{{ $import->id }}</li>
    @endif
@stop

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="@if($isNew) {!! action('Admin\ImportController@store') !!} @else {!! action('Admin\ImportController@update', [$import->id]) !!} @endif" method="POST" enctype="multipart/form-data">
        @if( !$isNew ) <input type="hidden" name="_method" value="PUT"> @endif
        {!! csrf_field() !!}

        <div class="box box-primary" style="margin-bottom: 5px;">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="{!! URL::action('Admin\ImportController@index') !!}"
                       class="btn btn-block btn-default btn-sm"
                       style="width: 125px;">@lang('admin.pages.common.buttons.back')</a>
                </h3>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="times">@lang('admin.pages.imports.columns.times')</label>
                            <div class="input-group @if( $isNew ) date datetime-field @endif">
                                <input type="text" class="form-control" name="times" @if( $isNew ) required @else disabled @endif  value="{{ old('times') ? old('times') : $import->times }}">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="creator_id">@lang('admin.pages.imports.columns.creator_id')</label>
                            <input type="text" class="form-control" id="creator_id" disabled value="@if( !empty($import->creator) ) {{ $import->creator->name }} @else {{ $authUser->name }} @endif">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="employee-id">@lang('admin.pages.imports.columns.employee_id')</label>
                            <select class="form-control employee-id" name="employee_id[]" required id="employee-id" style="margin-bottom: 15px;" multiple="multiple">
                                @foreach( $employees as $key => $employee )
                                    <option value="{!! $employee->id !!}">
                                        {{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group @if ($errors->has('notes')) has-error @endif">
                            <label for="notes">@lang('admin.pages.imports.columns.notes')</label>
                            <textarea name="notes" class="form-control" rows="5" placeholder="@lang('admin.pages.imports.columns.notes')">{{ old('notes') ? old('notes') : $import->notes }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <span class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#ModalOptions" onclick="resetModalImport();"  style="width: 125px; margin-bottom: 10px;">@lang('admin.pages.imports.modal.create_button')</span>

                        <table class="table table-bordered import-products" id="import-products">
                            <tr>
                                <th>@lang('admin.pages.imports.modal.product_name')</th>
                                <th>@lang('admin.pages.imports.modal.product_option')</th>
                                <th>@lang('admin.pages.imports.modal.import_price')</th>
                                <th>@lang('admin.pages.imports.modal.quantity')</th>
                                <th>@lang('admin.pages.imports.modal.unit')</th>
                                <th>@lang('admin.pages.imports.columns.total_amount')</th>
                                <th width="100px">@lang('admin.pages.common.label.actions')</th>
                            </tr>

                            @if( !empty($import->details) )
                                @foreach( $import->details as $importDetail )
                                    <tr>
                                        <td>{{ $importDetail->present()->product->name }}</td>
                                        <td>{{ $importDetail->productOption->present()->getProductOptionName }}</td>
                                        <td>{{ number_format($importDetail->prices, 0, ',', ' ') }} <span style="font-size: 11px;">VND{{isset($importDetail->product->unit) ? '/' . $importDetail->product->unit->name : ''}}</span></td>
                                        <td>{{ number_format($importDetail->quantity, 0, ',', ' ') }}</td>
                                        <td>
                                            {{ isset($importDetail->unit) ? $importDetail->unit->name : '' }}
                                            @if( $importDetail->unit_id != $importDetail->product->unit_id )
                                                ({{$importDetail->unit_exchange}} {{$importDetail->product->unit->name}})
                                            @endif
                                        </td>
                                        <td>{{ number_format(($importDetail->prices * $importDetail->quantity * $importDetail->unit_exchange), 0, ',', ' ') }} <span style="font-size: 11px;">VND</span></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="total_amount">@lang('admin.pages.imports.columns.total_amount')</label>
                            <input type="text" min="0" class="form-control" id="total_amount" disabled value="{{ (is_numeric($import->total_amount) && $import->total_amount) ? number_format($import->total_amount, 0, ',', ' ') : 0 }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-sm" style="width: 125px;">@lang('admin.pages.common.buttons.save')</button>
            </div>
        </div>
    </form>

    <!------------------------------------------------------------------->
    <!-- line modal: import products -->
    <div class="modal fade" id="ModalOptions" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top: 100px;">
            <div class="modal-content" style="width: 700px;">
                <form action="#" onsubmit="return false;">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">@lang('admin.pages.common.buttons.close')</span>
                        </button>
                        <h3 class="modal-title box-title" id="lineModalLabel" style="text-align: center;">@lang('admin.pages.imports.modal.title')</h3>
                    </div>

                    <div class="modal-body" style="padding-bottom: 0;">
                        <table class="table" id="modal-import-product" style="margin-bottom: 0;">
                            <tr>
                                <th style="width: 150px;">@lang('admin.pages.imports.modal.product_name')</th>
                                <td>
                                    <select class="form-control" name="modal_product_name" id="modal-product-name" required>
                                        <option value="">@lang('admin.pages.common.label.select_product')</option>
                                        @foreach( $products as $product )
                                            <option value="{!! $product->id !!}" @if( (old('modal_product_name') && old('modal_product_name') == $product->id) ) selected @endif option-url="{!! action('Admin\ProductController@getAllOptionOfProduct', $product->id) !!}">
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th style="">@lang('admin.pages.imports.modal.product_option')</th>
                                <td>
                                    <select class="form-control" name="modal_product_option" id="modal-product-option" required>
                                        <option value="">@lang('admin.pages.common.label.select_option')</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th style="">@lang('admin.pages.imports.modal.import_price')</th>
                                <td>
                                    <input type="text" name="modal_import_price" id="modal-import-price" disabled value="0" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <th style="">@lang('admin.pages.imports.modal.quantity')</th>
                                <td>
                                    <div class="input-group" style="width: 100%; border: 1px solid #ccc;">
                                        <span id="modal-current-quantity" class="input-group-addon" style="padding: 0 25px; border: none; background: #eeeeee">0 +</span>
                                        <input type="number" name="modal_option_quantity" class="form-control" required="required" min="0" id="modal-quantity" value="0" style="border: none;">
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <th style="">@lang('admin.pages.imports.modal.unit')</th>
                                <td>
                                    <select class="form-control" name="modal_unit" id="modal-unit" required="required">
                                        <option value="">@lang('admin.pages.common.label.select_unit')</option>
                                    </select>
                                </td>
                            </tr>

                        </table>
                    </div>

                    <div class="modal-footer">
                        <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default" data-dismiss="modal" role="button">
                                    @lang('admin.pages.common.buttons.close')
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="submit" id="modal-save" class="btn btn-default btn-hover-green" data-action="save" role="button">
                                    @lang('admin.pages.common.buttons.save')
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------------------------------------------------------------->
@stop
