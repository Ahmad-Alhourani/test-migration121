@extends ('backend.layouts.app')

@section ('title', __('labels.backend.companies.management') . ' | ' . __('labels.backend.companies.view'))

@section('breadcrumb-links')
@include('backend.companies.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.companies.management') }}
                        <small class="text-muted">{{ __('labels.backend.companies.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.companies.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.companies.content.created_at') }}:</strong> {{ $company->updated_at->timezone(get_user_timezone()) }} ({{ $company->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.companies.content.last_updated') }}:</strong> {{ $company->created_at->timezone(get_user_timezone()) }} ({{$company->updated_at->diffForHumans() }})--}}
                        @if ($company->trashed())
                            <strong>{{ __('labels.backend.companies.content.deleted_at') }}:</strong> $company->deleted_at->timezone(get_user_timezone())  ($company->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection