<?php
include("Telegram.php");
date_default_timezone_set("asia/tehran");
// Set the bot TOKEN
$bot_id = "123";
// Instances the class
$telegram = new Telegram($bot_id);
$text 			   = $telegram->Text();
$chat_id 		   = $telegram->ChatID();
$callback_data     = $telegram->Callback_Data();
$callback_query    = $telegram->Callback_Query();
$callback_chat_id  = $telegram->Callback_ChatID();
$message_id = $telegram->MessageID();
$send_text='';
$group_chat_id='-123';
global $send_text;
if ($text == '/start') {
    $armin= [
        'chat_id' => $chat_id,
        'text'=>'لظفا  روز برنامه را انتخاب کنید',
        'resize_keyboard'=>true,
        'reply_markup'=>json_encode([
            'keyboard'=>[
                [
                    ['text'=>'شنبه'],['text'=>'یکشنبه'],['text'=>'دوشنبه']
                ],
                [
                    ['text'=>'سه شنبه'],['text'=>'چهارشنبه'],['text'=>'پنج شنبه']
                ],
                [
                    ['text'=>'جمعه']
                ],
            ]
        ])
    ];
    $telegram->sendMessage($armin);
}
switch ($text)
{
    case 'شنبه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='شنبه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
    case 'یکشنبه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='یکشنبه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
    case 'دوشنبه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='دوشنبه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
    case 'سه شنبه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='سه شنبه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
    case 'چهار شنبه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='چهارشنبه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
    case 'پنج شنبه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='پنج شنبه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
    case 'جمعه':
        $directory = 'counter';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        $send_text='جمعه بریم بیرون';
        $day_file = $directory.'/'.$chat_id.'_day.txt';;
        file_put_contents($day_file,$send_text);
        $option = array(
            array(
                $telegram->buildInlineKeyboardButton("ارسال به گروه","","send","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $chat_id , 'text' =>$send_text , 'reply_markup' => $keyb);
        $telegram->sendMessage($content);
        break;
}

if ($callback_query !== null && $callback_query != ""&& $callback_data != 'send') {

    $directory = 'counter';

    if (!is_dir($directory)) {
        mkdir($directory);
    }

    $up_file = $directory.'/'.$message_id.'_up.txt';
    $down_file = $directory.'/'.$message_id.'_down.txt';

    if($callback_data == 'up' || $callback_data == 'down'){ // Creatte Counter Files
        if(!file_exists($up_file))
            file_put_contents($up_file,'0');

        if(!file_exists($down_file))
            file_put_contents($down_file,'0');
    }

    $up_value = file_get_contents($up_file);
    $down_value = file_get_contents($down_file);

    if($callback_data == 'up') {

        file_put_contents($up_file,$up_value+1);

        $like = "بله ".($up_value+1);
        $unlike = "خیر ".$down_value;

        $option = array(
            array(
                $telegram->buildInlineKeyboardButton($like,"","up",""),
                $telegram->buildInlineKeyboardButton($unlike,"","down","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $callback_chat_id, 'message_id' => $message_id, 'reply_markup' => $keyb);
        $telegram->editMessageReplyMarkup($content);
    }

    if($callback_data == 'down') {

        file_put_contents($down_file,$down_value+1);

        $like = "بله ".$up_value;
        $unlike = "خیر ".($down_value+1);

        $option = array(
            array(
                $telegram->buildInlineKeyboardButton($like,"","up",""),
                $telegram->buildInlineKeyboardButton($unlike,"","down","")
            )
        );

        $keyb = $telegram->buildInlineKeyBoard($option);

        $content = array('chat_id' => $callback_chat_id, 'message_id' => $message_id, 'reply_markup' => $keyb);
        $telegram->editMessageReplyMarkup($content);
    }

}
if($callback_query !== null && $callback_query != ""&& $callback_data == 'send'){
    $directory = 'counter';
    $day_file = $directory.'/'.$chat_id.'_day.txt';
    $aa = file_get_contents($day_file);
    $option = array(
        array(
            $telegram->buildInlineKeyboardButton("بله 0","","up",""),
            $telegram->buildInlineKeyboardButton("خیر 0","","down","")
        )
    );

    $keyb = $telegram->buildInlineKeyBoard($option);

    $content = array('chat_id' => $group_chat_id, 'text' =>$aa , 'reply_markup' => $keyb);
    $telegram->sendMessage($content);
}