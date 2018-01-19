<?php

namespace App\Providers;

use App\EmailConfirmation;
use App\Library\Mailer;
use App\User;
use Carbon\Carbon;
use GeoIp2\Database\Reader;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use ReCaptcha\ReCaptcha;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Trust CloudFare IP ranges - https://www.cloudflare.com/ips/
        \Symfony\Component\HttpFoundation\Request::setTrustedProxies([
            '103.21.244.0/22',
            '103.22.200.0/22',
            '103.31.4.0/22',
            '104.16.0.0/12',
            '108.162.192.0/18',
            '131.0.72.0/22',
            '141.101.64.0/18',
            '162.158.0.0/15',
            '172.64.0.0/13',
            '173.245.48.0/20',
            '188.114.96.0/20',
            '190.93.240.0/20',
            '197.234.240.0/22',
            '198.41.128.0/1',
            '2400:cb00::/32',
            '2405:8100::/32',
            '2405:b500::/32',
            '2606:4700::/32',
            '2803:f800::/32',
            '2c0f:f248::/32',
            '2a06:98c0::/29',
        ]);

        Validator::extend('validCountry', function ($attribute, $value, $parameters) {
            $countries = app()->make('countries');
            return isset($countries[$value]);
        });

        Validator::extend('recaptcha', function ($attribute, $value, $parameters) {
            $recaptcha = new ReCaptcha(env('RECAPTCHA_SECRET'));
            return $recaptcha->verify($value, app('request')->ip())->isSuccess();
        });

        Validator::extend('platform', function ($attribute, $value, $parameters) {
            return isset(config('platforms')[$value]);
        });

        User::creating(function (User $self) {
            $affiliateID = session()->pull('affiliate', request()->cookie('bd-aff', 0));

            if($affiliateID > 0 && User::find($affiliateID) instanceof User) {
                $self->affiliate_id = $affiliateID;
            }

            $self->airdrop = session()->pull('airdrop', 0);
            $self->ip = request()->ip();
        });

        EmailConfirmation::creating(function(EmailConfirmation $self) {
            $self->expires_at = Carbon::now()->addDays(30);
        });

        // Set the current language
        $languages = app()->make('languages');
        $languageFromSegment = request()->segment(1, 'en');
        config()->set('app.locale', isset($languages[$languageFromSegment]) ? $languageFromSegment : config('app.fallback_locale'));
        view()->share([
            'languages' => $languages,
            'currentLanguage' => config('app.locale'),
            'defaultLanguage' => config('app.fallback_locale'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('geoip', function() {
            return new Reader(resource_path('geoip.mmdb'));
        });

        $this->app->singleton('countries', function(){
            return json_decode(file_get_contents(base_path('vendor/umpirsky/country-list/data/en_US/country.json')), true);
        });

        $this->app->singleton('amqp.connection', function () {
            $amqpConnection = new AMQPStreamConnection(
                env('AMQP_HOST'),
                env('AMQP_PORT'),
                env('AMQP_USER'),
                env('AMQP_PASSWORD'),
                env('AMQP_VHOST')
            );

            if (!empty(env('AMQP_EXCHANGE'))) {
                $amqpConnection->channel()->exchange_declare(env('AMQP_EXCHANGE'), 'topic', false, true, false);
            }
            return $amqpConnection;
        });

        $this->app->bind(Mailer::class, function () {
            $mailer = new Mailer();

            if (env('APP_ENV', 'production') != 'local') {
                $mailer->setConnection(app('amqp.connection'));
                $mailer->setExchange(env('AMQP_EXCHANGE'));
            }

            return $mailer;
        });

        $this->app->singleton('languages', function() {
            return [
                'en' => 'EN',
                'cn' => 'CN',
                'ru' => 'RU',
                'lv' => 'LV',
                'ro' => 'RO',
                'tr' => 'TR',
                'fr' => 'FR',
                'vn' => 'VN',
                'es' => 'ES',
                'id' => 'ID',
                'gr' => 'GR',
                'it' => 'IT',
                'nl' => 'NL',
                'pt' => 'PT',
                'hr' => 'HR',
                'ae' => 'AE',
                'ee' => 'EE',
                'th' => 'TH',
                'hu' => 'HU',
                'kr' => 'KR',
            ];
        });

        $this->app->singleton('mailableLanguages', function () {
            return [
                'en',
                'nl',
                'ee',
                'ae',
                'ru',
                'lv',
                'hr',
                'gr',
                'pt',
                'th',
                'it',
                'ro',
                'tr',
                'fr',
                'vn',
                'es',
                'id',
                'hu',
            ];
        });

        $this->app->singleton('courses', function ($app) {
            return [
                [
                    'url' => route('course', ['course' => 'smart-contracts']),
                    'key' => 'smart-contracts',
                    'image' => asset_rev('smart-contracts.jpg'),
                    'sponsor' => asset_rev('nexchange.png'),
                    'overlay' => 'purple available',
                    'description' => __('courses.description-18-feb'),
                    'title' => trans('courses.title_smart_contracts'),
                    'isMvp' => true,
                    'isNew' => true,
                ],
                [
                    'url' => route('course', ['course' => 'cryptocurrencies-intro']),
                    'key' => 'cryptocurrencies-intro',
                    'image' => asset_rev('blockchain-basics.jpg'),
                    'sponsor' => asset_rev('ethos.png'),
                    'overlay' => 'grey available',
                    'description' => __('courses.description-18-feb'),
                    'title' => trans('courses.title_cryptocurrencies_intro'),
                    'isMvp' => true,
                    'isNew' => true,
                    'lessons' => [
                        [
                            'title' => 'Intro Lecture',
                            'key' => 'intro',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'kkuuZXv-1M4',
                                    'duration' => 3 * 60 + 51,
                                    'title' => 'Intro Lecture',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-0/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-0/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'What is a Cryptocurrency or Crypto Token',
                            'key' => 'what-is-a-cryptocurrency-or-crypto-token',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'qOG2qzbN1QM',
                                    'duration' => 4 * 60,
                                    'title' => 'What is a Cryptocurrency or Crypto Token',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-1/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-1/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Why Cryptocurrencies?',
                            'key' => 'why-cryptocurrencies',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'M4xK1FO8Z2s',
                                    'duration' => 4 * 60 + 43,
                                    'title' => 'Why Cryptocurrencies?',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-2/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-2/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'How to Get Started With Cryptocurrencies?',
                            'key' => 'how-to-get-started-with-cryptocurrencies',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => '227Fl2UKEfs',
                                    'duration' => 5 * 60 + 9,
                                    'title' => 'How to Get Started With Cryptocurrencies?',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-3/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-3/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'What is Bitcoin?',
                            'key' => 'what-is-bitcoin',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'PKwVoedQr2I',
                                    'duration' => 9 * 60 + 38,
                                    'title' => 'What is Bitcoin?',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-4/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-4/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'The Economics of Bitcoin',
                            'key' => 'the-economics-of-bitcoin',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'hZP8Z7G10Sc',
                                    'duration' => 5 * 60 + 39,
                                    'title' => 'The Economics of Bitcoin',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-5/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-5/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Solving Bitcoin\'s Problems - Ethereum',
                            'key' => 'solving-bitcoins-problems-ethereum',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'j1YKWmDM7TY',
                                    'duration' => 6 * 60 + 21,
                                    'title' => 'Solving Bitcoin\'s Problems - Ethereum',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-6/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-6/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Checklist for Analysing Crypto BTC vs ETH',
                            'key' => 'checklist-for-analysing-crypto-btc-vs-eth',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => 'J8NTEtsCiqE',
                                    'duration' => 6 * 60 + 8,
                                    'title' => 'Checklist for Analysing Crypto BTC vs ETH',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-7/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-7/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-7/checklist.pdf'),
                                    'title' => 'Checklist to Analyzing Cryptocurrencies',
                                ],
                            ],
                        ],
                        [
                            'title' => 'A Whole New World of Coins',
                            'key' => 'a-whole-new-world-of-coins',
                            'materials' => [
                                [
                                    'type' => 'video',
                                    'videoId' => '-1LEEK3lzPw',
                                    'duration' => 6 * 60 + 37,
                                    'title' => 'A Whole New World of Coins',
                                ],
                                [
                                    'type' => 'slides',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-8/slides.pdf'),
                                    'title' => 'Lecture slides',
                                ],
                                [
                                    'type' => 'pdf',
                                    'file' => resource_path('courses/cryptocurrencies-intro/lecture-8/transcript.pdf'),
                                    'title' => 'Lecture transcript',
                                ],
                            ],
                        ],
                    ]
                ],
                [
                    'url' => 'https://www.bitdegree.org/learn/web-fundamentals/',
                    'key' => 'web-fundamentals',
                    'image' => asset_rev('web-development.png'),
                    'overlay' => 'green available',
                    'title' => trans('courses.title_web_fundamentals'),
                    'description' => __('courses.description-beta'),
                    'isFree' => true,
                    'isBeta' => true,
                ],
                [
                    'url' => route('course', ['course' => 'full-stack-web-developer']),
                    'key' => 'full-stack-web-developer',
                    'image' => asset_rev('coding-fundamentals.png'),
                    'overlay' => 'blue',
                    'description' => __('courses.description-18-jan'),
                    'title' => trans('courses.title_coding_fundamentals'),
                    'isNew' => true,
                ],
                [
                    'url' => route('course', ['course' => 'zcoin-protocol']),
                    'key' => 'zcoin-protocol',
                    'image' => asset_rev('zcoin-protocol.jpg'),
                    'sponsor' => asset_rev('zcoin.png'),
                    'overlay' => 'pink',
                    'title' => trans('courses.title_zcoin_protocol'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'ai-development']),
                    'key' => 'ai-development',
                    'image' => asset_rev('ai-development.png'),
                    'sponsor' => asset_rev('singularitynet.png'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_ai_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'deep-learning']),
                    'key' => 'deep-learning',
                    'image' => asset_rev('deep-learning.png'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_deep_learning'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'blockchain-basics']),
                    'key' => 'blockchain-basics',
                    'image' => asset_rev('blockchain-basics.jpg'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_blockchain_basics'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'ethereum-development']),
                    'key' => 'ethereum-development',
                    'image' => asset_rev('eth-development.jpg'),
                    'overlay' => 'purple',
                    'title' => trans('courses.title_ethereum_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'react']),
                    'key' => 'react',
                    'image' => asset_rev('react.png'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_react'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'vr-development']),
                    'key' => 'vr-development',
                    'image' => asset_rev('vr-development.png'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_vr_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'robotics']),
                    'key' => 'robotics',
                    'image' => asset_rev('robotics.png'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_robotics'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'neuro-marketing']),
                    'key' => 'neuro-marketing',
                    'image' => asset_rev('neuro-marketing.png'),
                    'overlay' => 'pink',
                    'title' => trans('courses.title_neuro_marketing'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'digital-graphics']),
                    'key' => 'digital-graphics',
                    'image' => asset_rev('digital-graphics.png'),
                    'overlay' => 'blue',
                    'title' => trans('courses.title_digital_graphics'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'build-website']),
                    'key' => 'build-website',
                    'image' => asset_rev('build-website.jpg'),
                    'overlay' => 'grey',
                    'title' => trans('courses.title_build_website'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'building-apps']),
                    'key' => 'building-apps',
                    'image' => asset_rev('mobile-app.jpg'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_building_apps'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'game-development']),
                    'key' => 'game-development',
                    'image' => asset_rev('game-development.jpg'),
                    'overlay' => 'green',
                    'title' => trans('courses.title_game_development'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'crypto-intro']),
                    'key' => 'crypto-intro',
                    'image' => asset_rev('cryptocurrency.jpg'),
                    'overlay' => 'yellow',
                    'title' => trans('courses.title_crypto_intro'),
                    'isSoon' => true,
                ],
                [
                    'url' => route('course', ['course' => 'ethereum-basics']),
                    'key' => 'ethereum-basics',
                    'image' => asset_rev('ethereum-basics.jpg'),
                    'overlay' => 'purple',
                    'title' => trans('courses.title_ethereum_basics'),
                    'isSoon' => true,
                ],

            ];
        });
    }
}
