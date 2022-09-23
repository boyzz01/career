@extends('candidate.layouts.app')
@section('title')
{{ __('messages.favourite_jobs') }}
@endsection
@section('content')
<div class="d-flex flex-column ">
    <livewire:favourite-job-table />
</div>
@endsection
@push('scripts')
{{--
<script src="{{asset(mix('assets/js/candidate/favourite_jobs.js'))}}"></script>--}}
@endpush