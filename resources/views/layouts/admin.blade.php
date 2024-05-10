@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="top-bar">
            <h2>Welcome <span class="underline">{{ auth()->user()->name }}</span></h2>
            <p>This Panel For You....</p>
        </div>
        <div class="row justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Action Menu') }}</div>
                    <div class="card-body">
                        <ul class="nav navbar-nav">
                            <li class="nav-item rounded-md">
                                <a class="nav-link  p-3 rounded-md {{ Route::is('profile') ? 'active' : '' }}"
                                    href="{{ route('profile') }}">Profile</a>
                            </li>

                            @if (auth()->user()->user_type != 'customer')
                                <li class="nav-item rounded-md">
                                    <a class="nav-link  p-3 rounded-md  {{ Route::is('view.category') ? 'active' : '' }}"
                                        href="{{ route('view.category') }}">Category</a>
                                </li>

                                <li class="nav-item rounded-md">
                                    <a class="nav-link  p-3 rounded-md  {{ Route::is('features.index') ? 'active' : '' }}"
                                        href="{{ route('features.index') }}">Features</a>
                                </li>
                            @endif

                            <li class="nav-item rounded-md">
                                <a class="nav-link  p-3 rounded-md  {{ Route::is('products.index') ? 'active' : '' }}"
                                    href="{{ route('products.index') }}">Products</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __($title) }}</div>
                    <div class="card-body">
                        @yield('mainContent')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
