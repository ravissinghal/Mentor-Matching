@extends('layouts.app')

@section('content')
{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mentors') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($data as $d )
                        {{ $d->name }}
                        {{ $d->email }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>  --}}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
    <div class="row">
        @foreach ($data as $d)
        <div class="col-md-4">
            <!-- START widget-->
            <div class="panel widget">
                <div style="background-image: url('https://bootdey.com/img/Content/bg1.jpg')" class="panel-body text-center bg-center">
                    <div class="row row-table">
                        <div class="col-xs-12 text-white">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image" class="img-thumbnail img-circle thumb128">
                            <h3 class="m0">{{ $d->name }}</h3>
                            <p class="m0">
                            <em class="fa fa-twitter fa-fw"></em>{{ $d->email }}</p>
                        </div>
                    </div>
                </div>
                <div class="panel-body text-center bg-gray-darker">
                    <div class="row row-table">
                        <div class="col-xs-4">
                            <a href="#" class="text-white">
                                <em class="fa fa-twitter fa-2x"></em>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="text-white">
                                <em class="fa fa-facebook fa-2x"></em>
                            </a>
                        </div>
                        <div class="col-xs-4">
                            <a href="#" class="text-white">
                                <em class="fa fa-comments fa-2x"></em>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <span class="label label-primary pull-right">15</span>
                        <em class="fa fa-fw fa-clock-o text-muted"></em>Recent Activity
                    </a>
                    <a href="#" class="list-group-item">
                    <span class="label label-primary pull-right">100</span>
                    <em class="fa fa-fw fa-user text-muted"></em>Following</a>
                    <a href="#" class="list-group-item">
                        <span class="label label-primary pull-right">300</span>
                        <em class="fa fa-fw fa-folder-open-o text-muted"></em>Photos
                    </a>
                </div>
            </div>
            <!-- END widget-->
        </div>
        @endforeach




   {{--  <div class="col-md-4">
   <!-- START widget-->
   <div class="panel widget">
      <div style="background-image: url('https://bootdey.com/img/Content/bg1.jpg')" class="panel-body text-center bg-center">
         <div class="row row-table">
            <div class="col-xs-12 text-white">
               <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Image" class="img-thumbnail img-circle thumb128">
               <h3 class="m0">Chris</h3>
               <p class="m0">
                  <em class="fa fa-twitter fa-fw"></em>@chris</p>
            </div>
         </div>
      </div>
      <div class="panel-body text-center bg-gray-darker">
         <div class="row row-table">
            <div class="col-xs-4">
               <a href="#" class="text-white">
                  <em class="fa fa-twitter fa-2x"></em>
               </a>
            </div>
            <div class="col-xs-4">
               <a href="#" class="text-white">
                  <em class="fa fa-facebook fa-2x"></em>
               </a>
            </div>
            <div class="col-xs-4">
               <a href="#" class="text-white">
                  <em class="fa fa-comments fa-2x"></em>
               </a>
            </div>
         </div>
      </div>
      <div class="list-group">
         <a href="#" class="list-group-item">
            <span class="label label-primary pull-right">15</span>
            <em class="fa fa-fw fa-clock-o text-muted"></em>Recent Activity</a>
         <a href="#" class="list-group-item">
            <span class="label label-primary pull-right">100</span>
            <em class="fa fa-fw fa-user text-muted"></em>Following</a>
         <a href="#" class="list-group-item">
            <span class="label label-primary pull-right">300</span>
            <em class="fa fa-fw fa-folder-open-o text-muted"></em>Photos</a>
      </div>
   </div>
   <!-- END widget-->
   </div>  --}}



   {{--  <div class="col-md-4">
   <!-- START widget-->
   <div class="panel widget">
      <div style="background-image: url('https://bootdey.com/img/Content/bg1.jpg')" class="panel-body text-center bg-center">
         <div class="row row-table">
            <div class="col-xs-12 text-white">
               <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Image" class="img-thumbnail img-circle thumb128">
               <h3 class="m0">Chris</h3>
               <p class="m0">
                  <em class="fa fa-twitter fa-fw"></em>@chris</p>
            </div>
         </div>
      </div>
      <div class="panel-body text-center bg-gray-darker">
         <div class="row row-table">
            <div class="col-xs-4">
               <a href="#" class="text-white">
                  <em class="fa fa-twitter fa-2x"></em>
               </a>
            </div>
            <div class="col-xs-4">
               <a href="#" class="text-white">
                  <em class="fa fa-facebook fa-2x"></em>
               </a>
            </div>
            <div class="col-xs-4">
               <a href="#" class="text-white">
                  <em class="fa fa-comments fa-2x"></em>
               </a>
            </div>
         </div>
      </div>
      <div class="list-group">
         <a href="#" class="list-group-item">
            <span class="label label-primary pull-right">15</span>
            <em class="fa fa-fw fa-clock-o text-muted"></em>Recent Activity</a>
         <a href="#" class="list-group-item">
            <span class="label label-primary pull-right">100</span>
            <em class="fa fa-fw fa-user text-muted"></em>Following</a>
         <a href="#" class="list-group-item">
            <span class="label label-primary pull-right">300</span>
            <em class="fa fa-fw fa-folder-open-o text-muted"></em>Photos</a>
      </div>
   </div>
   <!-- END widget-->
   </div>  --}}
    </div>
</div>
@endsection
