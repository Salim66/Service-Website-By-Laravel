@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @php
                $service_count = \App\Models\Service::count();
            @endphp
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Service</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $service_count }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $post_count = \App\Models\Post::count();
            @endphp
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            
                            <i class="text-success mr-0 font-size-24 mdi mdi-phone-outgoing"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Post</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $post_count }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $training_count = \App\Models\Training::count();
            @endphp
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Training</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $training_count }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $contact_count = \App\Models\ContactUs::count();
            @endphp
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Contact</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $contact_count }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $user_count = \App\Models\User::count();
            @endphp
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-success-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Customer</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ $user_count }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
