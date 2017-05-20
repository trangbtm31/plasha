@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('head')
    <script language="javascript" src="dist/js/friend/chat.js" ></script>
@endsection

@section('content')
    @include('layouts.app')
    <div class="news-feed" >
        <div id="page-contents">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 static">
                        @include('layouts.left-sidebar')
                    </div>
                    <div class="col-md-6">
                        <div class="chat-room">
                            <div class="row">
                                <div class="col-md-5">
                                    <a href="javascript:;" id="more-fr-chat" onclick="LoadMoreFriendChat(this)" class="text-green button-add-friend" is_busy="false" page="1">Load more friend</a>
                                    <!-- Contact List in Left-->
                                    <div class="scroll-wrapper nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer" style="position: relative;"><ul class="nav nav-tabs contact-list scrollbar-wrapper scrollbar-outer scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 400px;">
                                            @include('chat.load-friend-ajax')
                                        </ul>
                                        <div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 86px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 329px; top: 71px;"></div></div></div></div><!--Contact List in Left End-->

                                </div>
                                <div class="col-md-7">

                                    <!--Chat Messages in Right-->
                                    <div class="scroll-wrapper tab-content scrollbar-wrapper wrapper scrollbar-outer" style="position: relative;"><div class="tab-content scrollbar-wrapper wrapper scrollbar-outer scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 400px;">
                                            <div class="tab-pane active" id="contact-1">
                                                <div class="chat-body">
                                                    <ul class="chat-message">
                                                        <li class="left">
                                                            <img src="images/users/user-2.jpg" alt="" class="profile-photo-sm pull-left">
                                                            <div class="chat-item">
                                                                <div class="chat-item-header">
                                                                    <h5>Linda Lohan</h5>
                                                                    <small class="text-muted">3 days ago</small>
                                                                </div>
                                                                <p>Hi honey, how are you doing???? Long time no see. Where have you been?</p>
                                                            </div>
                                                        </li>
                                                        <li class="right">
                                                            <img src="images/users/user-1.jpg" alt="" class="profile-photo-sm pull-right">
                                                            <div class="chat-item">
                                                                <div class="chat-item-header">
                                                                    <h5>Sarah Cruiz</h5>
                                                                    <small class="text-muted">3 days ago</small>
                                                                </div>
                                                                <p>I have been on vacation</p>
                                                            </div>
                                                        </li>
                                                        <li class="right">
                                                            <img src="images/users/user-1.jpg" alt="" class="profile-photo-sm pull-right">
                                                            <div class="chat-item">
                                                                <div class="chat-item-header">
                                                                    <h5>Sarah Cruiz</h5>
                                                                    <small class="text-muted">3 days ago</small>
                                                                </div>
                                                                <p>it was a great time for me. we had a lot of fun <i class="em em-blush"></i></p>
                                                            </div>
                                                        </li>
                                                        <li class="left">
                                                            <img src="images/users/user-2.jpg" alt="" class="profile-photo-sm pull-left">
                                                            <div class="chat-item">
                                                                <div class="chat-item-header">
                                                                    <h5>Linda Lohan</h5>
                                                                    <small class="text-muted">3 days ago</small>
                                                                </div>
                                                                <p>that's cool I wish I were you <i class="em em-expressionless"></i></p>
                                                            </div>
                                                        </li>
                                                        <li class="right">
                                                            <img src="images/users/user-1.jpg" alt="" class="profile-photo-sm pull-right">
                                                            <div class="chat-item">
                                                                <div class="chat-item-header">
                                                                    <h5>Sarah Cruiz</h5>
                                                                    <small class="text-muted">3 days ago</small>
                                                                </div>
                                                                <p><i class="em em-hand"></i></p>
                                                            </div>
                                                        </li>
                                                        <li class="left">
                                                            <img src="images/users/user-2.jpg" alt="" class="profile-photo-sm pull-left">
                                                            <div class="chat-item">
                                                                <div class="chat-item-header">
                                                                    <h5>Linda Lohan</h5>
                                                                    <small class="text-muted">a min ago</small>
                                                                </div>
                                                                <p>Hi there, how are you</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 86px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 229px; top: 0px;"></div></div></div></div><!--Chat Messages in Right End-->

                                    <div class="send-message">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type your message">
                                            <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Send</button>
                      </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Newsfeed Common Side Bar Right
                    ================================================= -->
                    <div class="col-md-3 static">
                        @include('layouts.right-sidebar')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
