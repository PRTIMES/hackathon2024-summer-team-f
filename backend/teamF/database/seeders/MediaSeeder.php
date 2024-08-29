<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediaList;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MediaList::create([
            'media_kind' => 'ＴＶ番組',
            'media_name' => '全国朝日放送（テレビ朝日',
            'media_overview' => 'edited-関東広域圏を放送対象地域とする特定地上基幹放送事業',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => 'ＴＶ番組',
            'media_name' => 'テレビ東京',
            'media_overview' => '関東広域圏を放送対象地域とする放送局1',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => 'ＴＶ番組',
            'media_name' => 'フジテレビジョン',
            'media_overview' => 'edited-関東広域圏を放送対象地域とする特定地上基幹放送事業者',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => 'ＴＶ番組',
            'media_name' => 'BS-TBS',
            'media_overview' => 'TBS系列BSデジタル放送局',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => '雑誌',
            'media_name' => '	サンデー毎日',
            'media_overview' => '40〜50代ビジネスマンの知的好奇心を刺激し続ける総合週刊誌',
            'size_published' => 7,
           ]);

           MediaList::create([
            'media_kind' => '雑誌',
            'media_name' => 'Newsweek日本版（ニューズウィーク日本版）',
            'media_overview' => '世界で毎週400万部を発行する、国際ニュース誌・ニューズウィークの日本版',
            'size_published' => 3,
           ]);

           MediaList::create([
            'media_kind' => '雑誌',
            'media_name' => '週刊朝日',
            'media_overview' => 'ニュースはもちろん生活情報をカバーし、性別を問わず愛読されている歴史と伝統のある週刊誌',
            'size_published' => 15,
           ]);
           

           MediaList::create([
            'media_kind' => '新聞',
            'media_name' => '毎日新聞',
            'media_overview' => '東京において「東京日日新聞」として創刊した新聞',
            'size_published' => 50,
           ]);

           MediaList::create([
            'media_kind' => '新聞',
            'media_name' => '日本経済新聞',
            'media_overview' => '「経済を中心とするリーディング・メディア」を目指し、社会や読者からの信頼に応える新聞',
            'size_published' => 50,
           ]);

           MediaList::create([
            'media_kind' => '新聞',
            'media_name' => '産経新聞',
            'media_overview' => '大阪で日本工業新聞として創刊、「産経新聞」と改題',
            'size_published' => 100,
           ]);


           MediaList::create([
            'media_kind' => 'インターネットサイト',
            'media_name' => 'IT Leaders',
            'media_overview' => 'ITとビジネスを融合し競争力を創ることを担うITリーダーの方々を対象に最新トレンドや製品・サービス情報などを提供',
            'size_published' => 25,
           ]);

           MediaList::create([
            'media_kind' => 'インターネットサイト',
            'media_name' => '読売新聞オンライン',
            'media_overview' => '読売新聞のニュースサイト',
            'size_published' => 51000,
           ]);

           MediaList::create([
            'media_kind' => 'インターネットサイト',
            'media_name' => 'PC Watch',
            'media_overview' => 'コンピュータ、モバイル、インターネット関係の記事を発信するインプレス社のサイト',
            'size_published' => 1000,
           ]);

           MediaList::create([
            'media_kind' => 'フリーペーパー',
            'media_name' => 'メトロポリターナ',
            'media_overview' => '東京メトロ駅構内で無料配布する、都心で働く20代後半〜30代女性のためのフリーマガジン',
            'size_published' => 10,
           ]);

           MediaList::create([
            'media_kind' => 'フリーペーパー',
            'media_name' => 'metromin.LOCALRYTHM（メトロミニッツローカリズム）',
            'media_overview' => '東京地下鉄53駅の改札周辺に常設されたマガジン専用ラック160台を拠点に、毎月20日に無料配布されるライフスタイル誌',
            'size_published' => 15,
           ]);

           MediaList::create([
            'media_kind' => 'ラジオ番組',
            'media_name' => 'ラジオNIKKEI（ラジオニッケイ）',
            'media_overview' => '日本国内全域を放送対象地域とする短波ラジオ放送局',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => 'ラジオ番組',
            'media_name' => 'エフエム東京（TOKYO FM）',
            'media_overview' => '東京都を放送対象地域とする民間放送の放送局',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => 'ラジオ番組',
            'media_name' => 'InterFM（インターFM）',
            'media_overview' => '関東広域圏の内、外国語放送実施地域（東京都区部・さいたま市・千葉市・横浜市・川崎市・成田国際空港）が放送対象地域の、外国語FM放送局',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => '通信社',
            'media_name' => '共同通信',
            'media_overview' => '国内外の政治・経済・スポーツ・文化など、多岐にわたる予定を1日単位で収載した新聞',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => '通信社',
            'media_name' => '共同通信',
            'media_overview' => '速報の他、ジャンル別の報道を時系列にそって掲載する通信社',
            'size_published' => 0,
           ]);

           MediaList::create([
            'media_kind' => '通信社',
            'media_name' => 'ロイター通信',
            'media_overview' => '世界中のメディア、金融機関、そして個人投資家に、ニュースや金融情報・テクノロジーを提供する世界最大の国際通信社',
            'size_published' => 0,
           ]);

    }
}
