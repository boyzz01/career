@extends('layouts.app')
@section('title')
{{ __('messages.salary_currencies') }}
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column ">
        @include('flash::message')
        <livewire:salary-currency-table />
    </div>
</div>
@include('marital_status.templates.templates')
@endsection
{{--@push('scripts')--}}
{{--
<script src="{{asset(mix('assets/js/salary_currencies/salary_currencies.js'))}}"></script>--}}
{{--@endpush--}}