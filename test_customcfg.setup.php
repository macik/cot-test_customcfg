<?php
/* ====================
[BEGIN_COT_EXT]
Code=test_customcfg
Name=Testing `custom` config types
Category=administration-management
Description=Test for `custom` type config variables (introduced in Siena 0.9.19)
Version=1.0.3
Date=2015-Nov-09
Author=Andrey Matsovkin
Copyright=Copyright (c) 2011-2015, Andrey Matsovkin
Notes=
Auth_guests=R1
Lock_guests=W2345A
Auth_members=RW1
Lock_members=2345
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
title=00:separator:::Variables for testing
v1=01:custom:v1_int(1):5:Testing integer
mt=02:custom:mobtel_input('+7')::Mobile number
radio1=03:radio::1:Common radio
radio2=04:radio:a,b,c:b:Custom radio
alpha_only=05:custom:_ALP()::Alphanumeric input
cloud_psw=06:custom:cfg_password(5)::Test password input
callback=07:callback:cot_test_callback():x1:Simple list with callback
[END_COT_EXT_CONFIG]
==================== */


defined('COT_CODE') or die('Wrong URL.');