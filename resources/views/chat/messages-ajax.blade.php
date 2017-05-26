<?php
/**
 * Created by PhpStorm.
 * User: Cuong
 * Date: 25/05/2017
 * Time: 10:30 SA
 */
?>
<!--Chat Messages in Right-->
<div class="scroll-wrapper tab-content scrollbar-wrapper wrapper scrollbar-outer" style="position: relative;"><div class="tab-content scrollbar-wrapper wrapper scrollbar-outer scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 400px;">
        <div class="tab-pane active" id="contact-1">
            <div class="chat-body">
                <chat-messages :messages="messages" :current_user="{{ Auth::user() }}" ></chat-messages>
            </div>
        </div>
    </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 86px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 229px; top: 0px;"></div></div></div></div><!--Chat Messages in Right End-->
<chat-form
        v-on:messagesent="addMessage"
        :user="{{ Auth::user() }}" :user_info="{{ \App\UserInfo::find(Auth::user()->id) }}"
></chat-form>
