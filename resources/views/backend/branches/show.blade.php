@extends ('backend.layouts.app')

@section ('title', __('labels.backend.branches.management') . ' | ' . __('labels.backend.branches.view'))

@section('breadcrumb-links')
@include('backend.branches.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.branches.management') }}
                        <small class="text-muted">{{ __('labels.backend.branches.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.branches.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.branches.content.created_at') }}:</strong> {{ $branch->updated_at->timezone(get_user_timezone()) }} ({{ $branch->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.branches.content.last_updated') }}:</strong> {{ $branch->created_at->timezone(get_user_timezone()) }} ({{$branch->updated_at->diffForHumans() }})--}}
                        @if ($branch->trashed())
                            <strong>{{ __('labels.backend.branches.content.deleted_at') }}:</strong> $branch->deleted_at->timezone(get_user_timezone())  ($branch->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection