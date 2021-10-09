@extends('layouts.cp')
@section('title') {{ucwords(__('home.dashboard'))}}
@endsection
@section('css')

@endsection
@section('content')

    <div class="row widget-row">
         <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">{{__('common.admin')}}</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup"
                              data-value="{{$count_admin}}">{{$count_admin}}</span>
                    </div>
                </div>
            </div>
            <!-- END WIDGET THUMB -->
        </div>
        <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">{{__('common.appiontment')}}</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-yellow icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup"
                              data-value="{{$count_appiontment}}">{{$count_appiontment}}</span>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-md-4">
            <!-- BEGIN WIDGET THUMB -->
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">{{__('common.contacts')}}</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-bar-chart"></i>
                    <div class="widget-thumb-body">
                        <span class="widget-thumb-subtitle"></span>
                        <span class="widget-thumb-body-stat" data-counter="counterup"
                              data-value="{{$count_contact}}">{{$count_contact}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection

@section('script')

@endsection
