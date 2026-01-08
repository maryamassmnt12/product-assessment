@extends('layouts.master')

@section('style')
<style>
    .status-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        margin-right: 8px;
        vertical-align: middle;
        background-color: gray;
    }
    .status-dot.online {
        background-color: green;
    }
    .status-dot.offline {
        background-color: red;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
          <div class="col-md-12">
                <h2 class="text-center">Online/Offline Users</h2></br>

                    <!-- Admins Section -->
                    <div class="mb-4">
                        <h4>Admins</h4>
                        <ul id="admins-list">
                            @foreach($admins as $admin)
                                <li data-id="{{ $admin->id }}">
                                    <span class="status-dot {{ $admin->is_online ? 'online' : 'offline' }}"></span>
                                    {{ $admin->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Customers Section -->
                    <div>
                        <h4>Customers</h4>
                        <ul id="customers-list">
                            @foreach($customers as $customer)
                                <li data-id="{{ $customer->id }}">
                                    <span class="status-dot {{ $customer->is_online ? 'online' : 'offline' }}"></span>
                                    {{ $customer->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
<script>

</script>
@endsection
