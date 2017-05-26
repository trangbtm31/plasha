@extends('layouts.master')

@section('title')
    Plasa news feed !!
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
                                <div id="chat-box" class="col-md-7">
                                    @include('chat.messages-ajax')
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
    <script language="javascript" src="dist/js/friend/chat.js" ></script>
@endsection
