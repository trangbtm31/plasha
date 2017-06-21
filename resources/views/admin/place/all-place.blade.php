@extends('admin.master')

@section('title')
    Plasa Admin
@endsection

@section('content')
    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="8fb49fd2-2735-bc0a-5a3b-2e97b9e0447c">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html#"> Extended Tables </a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-icon" data-background-color="rose">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Account List</h4>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table data">
                                        @include('admin.place.load-place')
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 600px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 184px;"></div></div></div>
@endsection