<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $messages = [
            ['id'=>1,'created_at'=>'2020-03-29 18:59','updated_at'=>'2020-03-29 18:59','sinhala'=>'දත්ත ප්‍රභවය 1: දෛනික තත්ව වාර්තාව, වසංගත රෝග විද්‍යා ඒකකය','english'=>' Data Source 1: Daily Situation Report, Epidemiology Unit','tamil'=>'தரவு மூல 1: தினசரி சூழ்நிலை அறிக்கை, தொற்றுநோயியல் பிரிவு','url'=>'http://www.epid.gov.lk/web/index.php?option=com_content&view=article&id=225&lang=en'],
            ['id'=>2,'created_at'=>'2020-03-29 18:59','updated_at'=>'2020-03-29 18:59','sinhala'=>'දත්ත ප්‍රභවය 2: covidsl.com සජීවී දත්ත සමුදාය','english'=>'Data Source 2: covidsl.com Live Database','tamil'=>'தரவு மூல 2: covidsl.com நேரடி தரவுத்தளம்','url'=>'https://docs.google.com/spreadsheets/d/1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4/edit#gid=0'],
            ['id'=>3,'created_at'=>'2020-03-29 18:59','updated_at'=>'2020-03-29 18:59','sinhala'=>'දත්ත මූලාශ්‍රය 3: අද දෙරන ප්‍රවෘත්ති','english'=>'Data Source 3: AdaDerana News','tamil'=>'தரவு மூல 3: அடாதேரானா செய்தி டி','url'=>'https://www.youtube.com/watch?v=UZeM8slJ6Os&feature=youtu.be'],
        ];
        \App\Message::insert($messages);
    }
}
