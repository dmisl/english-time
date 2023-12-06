@extends('layouts.main')

@section('main.title')

{{ env('APP_NAME') }}
 |
{{ __('main.home_page')}}

@endsection

@section('main.content')

@if(str_contains(strtolower($_SERVER["HTTP_USER_AGENT"]), 'mobile'))

{{-- FIRST SLIDE --}}
<div class="container" style="font-family: 'Poppins', sans-serif; padding-bottom: 15vh;">

    <div class="d-flex" style="text-align: left;">

        <div style="margin: 0 auto; margin-top: 13vh; width: 90%;">

            <p style="color: #FF2424; font-size: 19px;">#englishtime</p>

            <h1 style="font-size: 10vw; font-weight: 400;">{{ __('main.online_school') }}</h1>

            <p class="text-muted mt-4" style="font-size: 15px;">{{ __('main.online_school_desc') }}</p>

            <a href="{{ route('register.index') }}">
                <div class="mt-4" style="display: inline-block;" role="button">

                    <div style="color: white; display: flex; column-gap: 15px; background-color: #6385FF; padding: 13px 25px; border-radius: 20px; transition: 0.5s; border: 2px solid #6385FF;">

                        <div style="display: table;">

                            <p style="display: table-cell; vertical-align: middle; font-size: 23px;">{{ __('main.join_now') }}</p>

                        </div>

                        <div style="display: table;">

                            <div style="display: table-cell; vertical-align: middle;">

                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 31 31" fill="white">
                                    <path d="M26.1562 19.375H24.2188C23.9618 19.375 23.7154 19.4771 23.5337 19.6587C23.3521 19.8404 23.25 20.0868 23.25 20.3438V27.125H3.875V7.75H12.5938C12.8507 7.75 13.0971 7.64794 13.2788 7.46626C13.4604 7.28458 13.5625 7.03818 13.5625 6.78125V4.84375C13.5625 4.58682 13.4604 4.34042 13.2788 4.15874C13.0971 3.97706 12.8507 3.875 12.5938 3.875H2.90625C2.13546 3.875 1.39625 4.18119 0.851221 4.72622C0.306193 5.27125 0 6.01046 0 6.78125L0 28.0938C0 28.8645 0.306193 29.6038 0.851221 30.1488C1.39625 30.6938 2.13546 31 2.90625 31H24.2188C24.9895 31 25.7288 30.6938 26.2738 30.1488C26.8188 29.6038 27.125 28.8645 27.125 28.0938V20.3438C27.125 20.0868 27.0229 19.8404 26.8413 19.6587C26.6596 19.4771 26.4132 19.375 26.1562 19.375ZM29.5469 0H21.7969C20.503 0 19.8563 1.56877 20.7676 2.48242L22.9309 4.64576L8.17383 19.3974C8.03836 19.5324 7.93087 19.6928 7.85753 19.8694C7.78419 20.0461 7.74643 20.2354 7.74643 20.4267C7.74643 20.618 7.78419 20.8073 7.85753 20.984C7.93087 21.1606 8.03836 21.321 8.17383 21.456L9.54643 22.8262C9.68143 22.9616 9.84184 23.0691 10.0185 23.1425C10.1951 23.2158 10.3845 23.2536 10.5757 23.2536C10.767 23.2536 10.9563 23.2158 11.133 23.1425C11.3096 23.0691 11.47 22.9616 11.605 22.8262L26.3548 8.07211L28.5176 10.2324C29.4258 11.1406 31 10.5049 31 9.20312V1.45312C31 1.06773 30.8469 0.698124 30.5744 0.42561C30.3019 0.153097 29.9323 0 29.5469 0Z"/>
                                </svg>

                            </div>

                        </div>

                    </div>

                </div>
            </a>


        </div>

    </div>

</div>

{{-- WHY US TEXT --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; height: 30vh; background-color: #F6F6F6; overflow: hidden;">

    <p style="color: #FF2424; margin-top: 4vh; font-size: 19px;">#englishtime</p>

    <h1 style="font-size: 55px; font-weight: 400;">{{ __('main.why_us') }}</h1>

</div>
{{-- WHY US ANSWER --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; background: linear-gradient(180deg, #F6F6F6 0%, #6385FF 0%); overflow: hidden; padding-top: 10px;">

    <div class="container" style="justify-content: space-between; padding-bottom: 50px;">

        <div>

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-size: 25px; padding-top: 10px;">{{ __('main.real_media') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.real_media_desc') }}</p>

        </div>

        <div>

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus2.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-size: 25px; padding-top: 10px;">{{ __('main.speak_confidently') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.speak_confidently_desc') }}</p>

        </div>

        <div>

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus3.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-size: 25px; padding-top: 10px;">{{ __('main.digital_learning') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.digital_learning_desc') }}</p>

        </div>

    </div>

</div>

{{-- TESTIMONIAL --}}
<div style="width: 100%; padding-bottom: 23vh; background-color: #F6F6F6;">

    <div class="container">

        <div style="height: 30vh;">

            <p style="color: #FF2424; padding-top: 4vh; font-size: 19px;">#englishtime</p>

            <h1 style="font-size: 55px; font-weight: 400;">{{ __('main.testimonial') }}</h1>

        </div>

        <div>

            <div style="width: 90%; margin: 0 auto;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div style="width: 22vw; height: 22vw; background-image: url('{{ asset('storage/icons/maria.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border-radius: 100%;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 4.6vw; font-weight: 500; margin-bottom: 0;">Maria Sheremeta</p>

                                <p style="color: #5F6FFD; font-size: 14px; margin-top: 0; margin-bottom: 0;">@SherMari3</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 14px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden; font-size: 15px;">
                            <i>
                                “Ірина - одна з найкращих викладачів, яких я зустрічала. Вона не тільки професіонал своєї справи, а і чудова людина, яка любить свою роботу. Її уроки завжди цікаві та насичені, вона створює дружню атмосферу, враховує всі потреби своїх учнів. Також Ірина вміло поєднує традиційні методи викладання із інтерактивними, додаючи до уроків цікаві та сучасні відео / аудіо завдання. Щиро і впевнено можу рекомендувати Ірину як викладача англійської як для тих хто хоче покращити свій рівень так і для тих хто лише розпочинає вивчення”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            <div style="width: 90%; margin: 0 auto; margin-top: 5vh;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 22vw; height: 22vw; background-image: url('{{ asset('storage/icons/olesya.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border-radius: 100%;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 4.6vw; font-weight: 500; margin-bottom: 0;">Olesya Shkapko</p>

                                <p style="color: #5F6FFD; font-size: 14px; margin-top: 0; margin-bottom: 0;">@olesya_shkapko</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 14px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden; font-size: 15px;">
                            <i>
                                “Вітання Всім, мене звати Олеся Шкапко і тут я хочу поділитись моїм досвідом співпраці з Іриною, власне співпраці, бо Ірина - викладач який спонукає працювати, працювати плідно і результативно. Іра має чітке розуміння того, як сприяти засвоєнню мови, вона розробила дуже цікаву а основне результативну систему за допомогою якої легко вивчаються нові слова та засвоюється граматика. Особлива увага на уроках приділяється також і розвитку мовлення, Іра завжди будує запитання з врахуванням вивчених тем і граматики. Кожну секунду заняття Іра є супер включеною у процес: відслідковує вами сказане, відловлює помилки і виправляє їх, і що не менш важливо - відбувається це все в легкості і з гумором &#128522;. Для мене Іра найкращий репетитор, з яким я коли небудь працювала, вона цілеспрямована і відкрита особливість, високоерудована у своїй спеціальності”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            <div style="width: 90%; margin: 0 auto; margin-top: 5vh;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 22vw; height: 22vw; background-image: url('{{ asset('storage/icons/lidia.jpg') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border-radius: 100%;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 4.6vw; font-weight: 500; margin-bottom: 0;">Lidia DONT KNOW</p>

                                <p style="color: #5F6FFD; font-size: 14px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 14px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden; font-size: 15px;">
                            <i>
                                “Іра, цей курс просто ВАУ! Теми підібрані дуже влучно, а лексика це окремий кайф, всі ці завдання, після яких, я якимсь чудом вивчала практично всі слова без зубріння і почала використовувати! Я реально пам'ятаю і використовую слова починаючи з першого нашого заняття. А відео до кожного уроку, Іра, я не знаю де ви їх знаходили, але вони супер-круті, вони завжди були ніби логічне завершення до теми! І коли я переглядала, виконувала завдання і просто чекала наступного уроку, щоб ми обговорили і я кайфувала! Більше того, я нарешті розібралася з Conditionals &#128517; бо то завше було з області фантастика) Дякую що по-справжньому закохала мене в англійську &#10084;”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            <div style="width: 90%; margin: 0 auto; margin-top: 5vh;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 22vw; height: 22vw; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat; border-radius: 100%;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 4.6vw; font-weight: 500; margin-bottom: 0;">Alexandro Pilov</p>

                                <p style="color: #5F6FFD; font-size: 14px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 14px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden; font-size: 15px;">
                            <i>
                                “Ірина - одна з найкращих викладачів, яких я зустрічала. Вона не тільки професіонал своєї справи, а і чудова людина, яка любить свою роботу. Її уроки завжди цікаві та насичені, вона створює дружню атмосферу, враховує всі потреби своїх учнів. Також Ірина вміло поєднує традиційні методи викладання із інтерактивними, додаючи до уроків цікаві та сучасні відео / аудіо завдання. Щиро і впевнено можу рекомендувати Ірину як викладача англійської як для тих хто хоче покращити свій рівень так і для тих хто лише розпочинає вивчення”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- COURSE DESCRIPTION --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 15vh; font-family: Poppins;">

    <div class="container">

        <img style="width: 100%;" src="{{ asset('storage/icons/description.png') }}" alt="">

        <div style="width: 90%; margin: 0 auto; text-align: left; padding-top: 30px;">

            <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

            <h1 style="font-weight: 400; font-size: 7vw; padding-top: 10px;">{{ __('main.personalized_course') }}</h1>

            <p style="font-size: 5vw; padding-bottom: 5px; margin: 0;">{{ __('main.personalized_course_cost') }}</p>

            <p class="text-muted" style="font-size: 4vw;">{{ __('main.personalized_course_desc') }}</p>

        </div>

    </div>

</div>

{{-- COURSE INCLUDES --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 20vh; font-family: Poppins;">

    <div class="container">

        <div style="text-align: center;">

            <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

            <h1 class="course_includes" style="font-weight: 400; font-size: 10vw;">{{ __('main.course_includes') }}</h1>

            <p class="course_includes_desc text-muted">{{ __('main.course_includes_desc') }}</p>

        </div>

        <a href="{{ route('register.index') }}">
            <div class="mt-4" style="display: inline-block;" role="button">

                <div style="color: white; display: flex; column-gap: 15px; background-color: #6385FF; padding: 13px 25px; border-radius: 20px; transition: 0.5s; border: 2px solid #6385FF;">

                    <div style="display: table;">

                        <p style="display: table-cell; vertical-align: middle; font-size: 23px;">{{ __('main.join_now') }}</p>

                    </div>

                    <div style="display: table;">

                        <div style="display: table-cell; vertical-align: middle;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 31 31" fill="white">
                                <path d="M26.1562 19.375H24.2188C23.9618 19.375 23.7154 19.4771 23.5337 19.6587C23.3521 19.8404 23.25 20.0868 23.25 20.3438V27.125H3.875V7.75H12.5938C12.8507 7.75 13.0971 7.64794 13.2788 7.46626C13.4604 7.28458 13.5625 7.03818 13.5625 6.78125V4.84375C13.5625 4.58682 13.4604 4.34042 13.2788 4.15874C13.0971 3.97706 12.8507 3.875 12.5938 3.875H2.90625C2.13546 3.875 1.39625 4.18119 0.851221 4.72622C0.306193 5.27125 0 6.01046 0 6.78125L0 28.0938C0 28.8645 0.306193 29.6038 0.851221 30.1488C1.39625 30.6938 2.13546 31 2.90625 31H24.2188C24.9895 31 25.7288 30.6938 26.2738 30.1488C26.8188 29.6038 27.125 28.8645 27.125 28.0938V20.3438C27.125 20.0868 27.0229 19.8404 26.8413 19.6587C26.6596 19.4771 26.4132 19.375 26.1562 19.375ZM29.5469 0H21.7969C20.503 0 19.8563 1.56877 20.7676 2.48242L22.9309 4.64576L8.17383 19.3974C8.03836 19.5324 7.93087 19.6928 7.85753 19.8694C7.78419 20.0461 7.74643 20.2354 7.74643 20.4267C7.74643 20.618 7.78419 20.8073 7.85753 20.984C7.93087 21.1606 8.03836 21.321 8.17383 21.456L9.54643 22.8262C9.68143 22.9616 9.84184 23.0691 10.0185 23.1425C10.1951 23.2158 10.3845 23.2536 10.5757 23.2536C10.767 23.2536 10.9563 23.2158 11.133 23.1425C11.3096 23.0691 11.47 22.9616 11.605 22.8262L26.3548 8.07211L28.5176 10.2324C29.4258 11.1406 31 10.5049 31 9.20312V1.45312C31 1.06773 30.8469 0.698124 30.5744 0.42561C30.3019 0.153097 29.9323 0 29.5469 0Z"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>
        </a>

        <div style="margin-top: 5vh;">

            <div style="margin-top: 10px;">

                <div style="width: 80%; margin: 0 auto; border-radius: 20px; background-color: #6385FF;">

                    <p style="font-size: 5vw; padding: 20px 40px; color: white; font-weight: 300;">{!! __('main.individual_lessons') !!}</p>

                </div>

                <div style="width: 80%; margin: 0 auto; border-radius: 20px; background-color: white;">

                    <p style="font-size: 5vw; padding: 20px 40px; color: black; font-weight: 300;">{!! __('main.personalized_program') !!}</p>

                </div>

                <div style="width: 80%; margin: 0 auto; border-radius: 20px; background-color: #FF234B;">

                    <p style="font-size: 5vw; padding: 20px 40px; color: white; font-weight: 300;">{!! __('main.interactive_learning') !!}</p>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- FAQ --}}
<div style="width: 100%; background-color: #6385FF; padding-bottom: 10vh; font-family: Poppins; color: white;">

    <div class="container">

        <p style="color: #FF2424; font-size: 19px; padding-top: 4vh;">#englishtime</p>

        <h1 style="font-size: 14vw; font-weight: 400;">FAQ</h1>

        <p style="margin-top: 20px; font-size: 22px;">{{ __('main.where_classes_are_held') }}</p>
        <p style="font-size: 15px; font-weight: 300;">{{ __('main.you_study_individually_with_teacher') }}</p>

        <p style="font-size: 17px;">{{ __('main.what_does_this_site_provide') }}</p>
        <p style="font-size: 15px; font-weight: 300;">{{ __('main.this_is_website_with_all_materials') }}</p>

        <p style="font-size: 19px;">{{ __('main.duration_and_number_of_lessons') }}</p>
        <p style="font-size: 15px; font-weight: 300;">{{ __('main.the_duration_of_one_course_is') }}</p>

        <p style="font-size: 20px;">{{ __('main.payment_options') }}</p>
        <p style="font-size: 15px; font-weight: 300;">{{ __('main.you_can_pay_for_1_month') }}</p>

    </div>

</div>

{{-- FOOTER --}}
<div style="width: 100%; background-color: white; font-family: Poppins; padding: 4vh 0;">

    <div class="container" style="width: 80%:">

        <div class="footer_text" style="text-align: left;">

            <h1 style="font-family: Anybody;">English Time</h1>

            <p class="text-muted" style="font-size: 3.8vw;">Unlock Your English Potential with English Time!</p>

            <div class="d-flex">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4939 38.6171C20.8917 38.6171 16.2161 35.8789 13.4874 32.2546C0.395748 32.2546 0 50.9999 0 50.9999H50.9846C50.9846 50.9999 52.0123 32.1714 37.2898 32.1714C34.5642 35.8405 30.0961 38.6171 25.4939 38.6171Z" fill="#6385FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.4599 16.1455C36.4599 21.5388 31.5481 31.852 25.4842 31.852C19.4299 31.852 14.515 21.5356 14.515 16.1455C14.515 10.7554 19.4267 6.37939 25.4842 6.37939C31.5481 6.38259 36.4599 10.7586 36.4599 16.1455Z" fill="#6385FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M41.3558 11.4903C41.3558 10.4795 39.9516 9.66378 38.209 9.65738V7.57492C38.209 7.26463 38.3271 0 25.5227 0C12.7247 0 12.8428 7.26463 12.8428 7.57492V9.73095C12.8109 9.73095 12.7853 9.72136 12.7566 9.72136C11.0236 9.72136 9.62891 10.5243 9.62891 11.5191V20.3288C9.62891 21.3173 11.0268 22.1234 12.7566 22.1234C14.4864 22.1234 15.8907 21.3173 15.8907 20.3288V11.5191C15.8907 11.3816 15.8045 11.2568 15.7534 11.1289V8.72651C15.7534 8.50579 14.8343 3.02293 25.5227 3.02293C36.2143 3.02293 35.1036 8.50579 35.1036 8.72651V11.2568C35.0845 11.3368 35.0239 11.4072 35.0239 11.4903V20.5015C35.0239 21.5156 36.4377 22.3377 38.1898 22.3377C38.2281 22.3377 38.2569 22.3249 38.2952 22.3249V25.6165H35.1547V28.7194H41.3878L41.3558 11.4903Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 6vw; margin: 0; padding-left: 5px; padding-top: 3px;">rithlesscorp@gmail.com</p>

                </div>

            </div>

            <div class="d-flex" style="margin-top: 15px;">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9869 0.153C17.7069 0.0283281 18.5739 0 25.5 0C32.4274 0 33.293 0.0297422 36.0116 0.153C38.7273 0.276258 40.5819 0.708344 42.2039 1.33875C43.9052 1.97929 45.4463 2.9829 46.7202 4.27976C48.0172 5.55344 49.021 7.0947 49.6613 8.79609C50.2916 10.4182 50.7223 12.2726 50.847 14.9869C50.9717 17.7069 51 18.5739 51 25.5C51 32.426 50.9703 33.293 50.847 36.0132C50.7237 38.7273 50.2916 40.5819 49.6613 42.2039C49.0096 43.8799 48.1368 45.3035 46.7202 46.7202C45.4466 48.0172 43.9052 49.021 42.2039 49.6613C40.5819 50.2916 38.7273 50.7223 36.0132 50.847C33.293 50.9717 32.426 51 25.5 51C18.5739 51 17.7069 50.9703 14.9869 50.847C12.2726 50.7237 10.4182 50.2916 8.79609 49.6613C7.12016 49.0096 5.69642 48.1368 4.27976 46.7202C2.98267 45.4466 1.97899 43.9052 1.33875 42.2039C0.708344 40.5819 0.277672 38.7273 0.153 36.0132C0.0283281 33.293 0 32.4274 0 25.5C0 18.5725 0.0297422 17.7069 0.153 14.9883C0.276258 12.2726 0.708344 10.4182 1.33875 8.79609C1.97929 7.09482 2.9829 5.55362 4.27976 4.27976C5.55341 2.98267 7.09468 1.97899 8.79609 1.33875C10.4182 0.708344 12.2726 0.277672 14.9869 0.153ZM35.8048 4.743C33.1159 4.62116 32.3085 4.59424 25.5 4.59424C18.6915 4.59424 17.884 4.62116 15.1952 4.743C12.7089 4.85634 11.3588 5.27141 10.4607 5.62134C9.27066 6.08316 8.42066 6.63566 7.52816 7.52816C6.63709 8.42066 6.08316 9.27066 5.62134 10.4607C5.27141 11.3588 4.85634 12.7089 4.743 15.1952C4.62116 17.884 4.59424 18.6915 4.59424 25.5C4.59424 32.3085 4.62116 33.1159 4.743 35.8048C4.85634 38.291 5.27141 39.6411 5.62134 40.5394C6.02985 41.6471 6.68144 42.649 7.52816 43.4719C8.35088 44.3185 9.35296 44.9702 10.4607 45.3786C11.3588 45.7287 12.7089 46.1436 15.1952 46.257C17.884 46.3789 18.6901 46.4058 25.5 46.4058C32.3099 46.4058 33.1159 46.3789 35.8048 46.257C38.291 46.1436 39.6411 45.7287 40.5394 45.3786C41.7294 44.9169 42.5794 44.3644 43.4719 43.4719C44.3185 42.6492 44.9702 41.6471 45.3786 40.5394C45.7287 39.6411 46.1436 38.291 46.257 35.8048C46.3789 33.1159 46.4058 32.3085 46.4058 25.5C46.4058 18.6915 46.3789 17.884 46.257 15.1952C46.1436 12.7089 45.7287 11.3588 45.3786 10.4607C44.9169 9.27066 44.3644 8.42066 43.4719 7.52816C42.5794 6.63709 41.7294 6.08316 40.5394 5.62134C39.6411 5.27141 38.291 4.85634 35.8048 4.743ZM22.2441 33.3607C23.2764 33.7884 24.3826 34.0084 25.5 34.0084C27.7568 34.0084 29.9208 33.112 31.5164 31.5164C33.1122 29.9208 34.0087 27.7565 34.0087 25.5C34.0087 23.2435 33.1122 21.0792 31.5164 19.4836C29.9208 17.8879 27.7568 16.9915 25.5 16.9915C24.3826 16.9915 23.2764 17.2116 22.2441 17.6392C21.2116 18.0667 20.2737 18.6935 19.4836 19.4836C18.6936 20.2737 18.0668 21.2116 17.6392 22.2439C17.2116 23.2762 16.9916 24.3826 16.9916 25.5C16.9916 26.6174 17.2116 27.7238 17.6392 28.7561C18.0668 29.7884 18.6936 30.7263 19.4836 31.5164C20.2737 32.3064 21.2116 32.9332 22.2441 33.3607ZM16.232 16.2319C18.6901 13.7739 22.0239 12.393 25.5 12.393C28.9763 12.393 32.3101 13.7739 34.7681 16.2319C37.2261 18.69 38.607 22.0239 38.607 25.5C38.607 28.9761 37.2261 32.3099 34.7681 34.7681C32.3101 37.2261 28.9763 38.607 25.5 38.607C22.0239 38.607 18.6901 37.2261 16.232 34.7681C13.774 32.3099 12.3931 28.9761 12.3931 25.5C12.3931 22.0239 13.774 18.69 16.232 16.2319ZM41.5133 14.3458C42.0942 13.7647 42.4206 12.9767 42.4206 12.155C42.4206 11.3333 42.0942 10.5452 41.5133 9.96419C40.9321 9.38316 40.1442 9.05674 39.3224 9.05674C38.5008 9.05674 37.7126 9.38316 37.1317 9.96419C36.5505 10.5452 36.2241 11.3333 36.2241 12.155C36.2241 12.9767 36.5505 13.7647 37.1317 14.3458C37.7126 14.9268 38.5008 15.2532 39.3224 15.2532C40.1442 15.2532 40.9321 14.9268 41.5133 14.3458Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 6vw; margin: 0; padding-left: 5px; padding-top: 3px;">
                        <a href="https://www.instagram.com/englishtime.com.ua/" style="text-decoration: none;">
                            @englishtime.com.ua
                        </a>
                    </p>

                </div>

            </div>

            <div class="d-flex" style="margin-top: 15px;">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M51 25.5C51 39.5832 39.5832 51 25.5 51C11.4167 51 0 39.5832 0 25.5C0 11.4167 11.4167 0 25.5 0C39.5832 0 51 11.4167 51 25.5ZM26.4137 18.8252C23.9337 19.8568 18.9766 21.9921 11.5428 25.2308C10.3357 25.7108 9.70334 26.1804 9.64578 26.6396C9.54847 27.4157 10.5203 27.7213 11.8437 28.1373C12.0237 28.1941 12.2102 28.2527 12.4014 28.3148C13.7034 28.7381 15.4548 29.2332 16.3653 29.2528C17.1912 29.2706 18.113 28.9302 19.1307 28.2313C26.0763 23.5429 29.6616 21.1731 29.8866 21.122C30.0456 21.086 30.2655 21.0406 30.4147 21.1732C30.5637 21.3057 30.5492 21.5566 30.5333 21.624C30.437 22.0343 26.6222 25.581 24.6481 27.4163C24.0327 27.9884 23.5962 28.3942 23.507 28.4869C23.307 28.6947 23.1032 28.8911 22.9075 29.0798C21.698 30.2458 20.7909 31.1202 22.9577 32.5482C23.9991 33.2344 24.8323 33.8017 25.6636 34.3678C26.5714 34.9862 27.4769 35.6029 28.6484 36.3709C28.947 36.5666 29.2319 36.7697 29.5097 36.9676C30.5662 37.7209 31.5154 38.3975 32.688 38.2895C33.3695 38.2268 34.0733 37.5862 34.4307 35.6754C35.2754 31.1593 36.9359 21.3743 37.3197 17.3421C37.3535 16.9888 37.3112 16.5367 37.2772 16.3382C37.2432 16.1398 37.1722 15.857 36.9142 15.6476C36.6087 15.3997 36.1371 15.3475 35.9261 15.3512C34.9669 15.3681 33.4955 15.8797 26.4137 18.8252Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 6vw; margin: 0; padding-left: 5px; padding-top: 3px;">@telegram_link</p>

                </div>

            </div>

        </div>

    </div>

</div>

<script defer>

    let personalized_course = document.querySelector('.personalized_course')

    let headers = document.querySelectorAll('.course_includes_header')

    headers.forEach(header => {

        header.style.fontSize = '30px'

    });

    if(document.querySelector('.container').offsetWidth == 960)
    {

        personalized_course.parentElement.children[0].style.fontSize = '16px'

    }

    window.addEventListener('load', function () {

        let llocale = document.querySelector('.locale').value

        let expands = document.querySelectorAll('.expand')
        let ps = document.querySelectorAll('.p')

        let id = null;

        function shrink_f() {

            let p = this.parentElement.children[0]

            let height = 0
            clearInterval(id);
            id = setInterval(frame, 0);

            function frame() {

                if (p.style.height == '250px') {
                    clearInterval(id);
                } else {

                    height = parseInt(p.style.height.slice(0, p.style.height.length-2))
                    height = height-1

                    p.style.height = height+'px'

                }

            }

            this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                    <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `

            this.removeEventListener('click', shrink_f)
            this.addEventListener('click', expand_f)


        }

        function expand_f() {

            let p = this.parentElement.children[0]

            let height = 0
            clearInterval(id);
            id = setInterval(frame, 0);

            function frame() {

                if (p.style.height == p.attributes.start.value+'px') {
                    clearInterval(id);
                } else {

                    height = parseInt(p.style.height.slice(0, p.style.height.length-2))
                    height = height+1

                    p.style.height = height+'px'

                }

            }

            this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                    <path d="M2.5 31.5L73.5884 2.90997L144.68 31.5" stroke="black" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `

            this.removeEventListener('click', expand_f)
            this.addEventListener('click', shrink_f)


        }

        ps.forEach(p => {

            p.setAttribute('start', p.offsetHeight)
            p.style.height = '250px'

        });
        expands.forEach(expand => {

            expand.addEventListener('click', expand_f)

        });

    })

</script>

@else
{{-- FIRST SLIDE --}}
<div class="container" style="font-family: 'Poppins', sans-serif;">

    <div class="d-flex" style="height: 93vh;">

        <div class="w-50" style="text-align: left;">

            <div style="margin-top: 15vh;">

                <p style="color: #FF2424; font-size: 19px;">#englishtime</p>

                <h1 class="online_school">{{ __('main.online_school') }}</h1>

                <p class="online_school_desc text-muted mt-4">{{ __('main.online_school_desc') }}</p>

                <x-join-now class="mt-5 online_school_join_now"></x-join-now>

            </div>

        </div>

        <div class="w-50" style="display: table;">

            <div style="display: table-cell; vertical-align: middle;">

                <img class="gif" style="width: 150%;" src="{{ asset('storage/icons/gif.gif') }}" alt="">

            </div>

        </div>

    </div>

</div>

{{-- WHY US TEXT --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; height: 30vh; background-color: #F6F6F6; overflow: hidden;">

    <p style="color: #FF2424; margin-top: 4vh; font-size: 19px;">#englishtime</p>

    <h1 class="why_us">{{ __('main.why_us') }}</h1>

</div>
{{-- WHY US ANSWER --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; background: linear-gradient(180deg, #F6F6F6 15%, #6385FF 8%); overflow: hidden;">

    <div class="container d-flex" style="justify-content: space-between; padding-bottom: 50px;">

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p class="why_us_header">{{ __('main.real_media') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.real_media_desc') }}</p>

        </div>

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus2.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p class="why_us_header">{{ __('main.speak_confidently') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.speak_confidently_desc') }}</p>

        </div>

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus3.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p class="why_us_header">{{ __('main.digital_learning') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.digital_learning_desc') }}</p>

        </div>

    </div>

</div>

{{-- TESTIMONIAL --}}
<div style="width: 100%; padding-bottom: 23vh; background-color: #F6F6F6;">

    <div class="container">

        <div style="height: 30vh;">

            <p style="color: #FF2424; padding-top: 4vh; font-size: 19px;">#englishtime</p>

            <h1 class="testimonial">{{ __('main.testimonial') }}</h1>

        </div>

        <div style="display: flex; justify-content: space-between;">

            <div style="width: 23%;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="background-image: url('{{ asset('storage/icons/maria.png') }}');"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Maria Sheremeta</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@SherMari3</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden;">
                            <i>
                                “Ірина - одна з найкращих викладачів, яких я зустрічала. Вона не тільки професіонал своєї справи, а і чудова людина, яка любить свою роботу. Її уроки завжди цікаві та насичені, вона створює дружню атмосферу, враховує всі потреби своїх учнів. Також Ірина вміло поєднує традиційні методи викладання із інтерактивними, додаючи до уроків цікаві та сучасні відео / аудіо завдання. Щиро і впевнено можу рекомендувати Ірину як викладача англійської як для тих хто хоче покращити свій рівень так і для тих хто лише розпочинає вивчення”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            <div style="width: 23%;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="background-image: url('{{ asset('storage/icons/olesya.jpg') }}');"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Olesya Shkapko</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@olesya_shkapko</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden;">
                            <i>
                                “Вітання Всім, мене звати Олеся Шкапко і тут я хочу поділитись моїм досвідом співпраці з Іриною, власне співпраці, бо Ірина - викладач який спонукає працювати, працювати плідно і результативно. Іра має чітке розуміння того, як сприяти засвоєнню мови, вона розробила дуже цікаву а основне результативну систему за допомогою якої легко вивчаються нові слова та засвоюється граматика. Особлива увага на уроках приділяється також і розвитку мовлення, Іра завжди будує запитання з врахуванням вивчених тем і граматики. Кожну секунду заняття Іра є супер включеною у процес: відслідковує вами сказане, відловлює помилки і виправляє їх, і що не менш важливо - відбувається це все в легкості і з гумором &#128522;. Для мене Іра найкращий репетитор, з яким я коли небудь працювала, вона цілеспрямована і відкрита особливість, високоерудована у своїй спеціальності”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            <div style="width: 23%;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="background-image: url('{{ asset('storage/icons/lidia.jpg') }}');"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Lidia DONT KNOW</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden;">
                            <i>
                                “Іра, цей курс просто ВАУ! Теми підібрані дуже влучно, а лексика це окремий кайф, всі ці завдання, після яких, я якимсь чудом вивчала практично всі слова без зубріння і почала використовувати! Я реально пам'ятаю і використовую слова починаючи з першого нашого заняття. А відео до кожного уроку, Іра, я не знаю де ви їх знаходили, але вони супер-круті, вони завжди були ніби логічне завершення до теми! І коли я переглядала, виконувала завдання і просто чекала наступного уроку, щоб ми обговорили і я кайфувала! Більше того, я нарешті розібралася з Conditionals &#128517; бо то завше було з області фантастика) Дякую що по-справжньому закохала мене в англійську &#10084;”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

            <div style="width: 23%;">

                <div style="background-color: white; border-radius: 25px; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px; padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="background-image: url('{{ asset('storage/icons/avatar1.png') }}');"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Alexandro Pilov</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p class="p" style="color: #6e6e6e; font-weight: 400; overflow: hidden;">
                            <i>
                                “Ірина - одна з найкращих викладачів, яких я зустрічала. Вона не тільки професіонал своєї справи, а і чудова людина, яка любить свою роботу. Її уроки завжди цікаві та насичені, вона створює дружню атмосферу, враховує всі потреби своїх учнів. Також Ірина вміло поєднує традиційні методи викладання із інтерактивними, додаючи до уроків цікаві та сучасні відео / аудіо завдання. Щиро і впевнено можу рекомендувати Ірину як викладача англійської як для тих хто хоче покращити свій рівень так і для тих хто лише розпочинає вивчення”
                            </i>
                        </p>

                        <div class="w-100 border expand" role="button" style="display: flex; justify-content: center; border-radius: 5px; padding: 5px;">

                            <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                                <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- COURSE DESCRIPTION --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 15vh; font-family: Poppins;">

    <div class="container" style="display: flex;">

        <div style="width: 55%;">

            <img style="width: 100%;" src="{{ asset('storage/icons/description.png') }}" alt="">

        </div>

        <div style="width: 45%; text-align: left;">

            <div style="padding-left: 10px;">

                <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

                <h1 class="personalized_course">{{ __('main.personalized_course') }}</h1>

                <p class="personalized_course_cost">{{ __('main.personalized_course_cost') }}</p>

                <p class="personalized_course_desc text-muted">{{ __('main.personalized_course_desc') }}</p>

            </div>

        </div>

    </div>

</div>

{{-- COURSE INCLUDES --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 20vh; font-family: Poppins;">

    <div class="container d-flex">

        <div class="course_includes_first" style="text-align: left; padding-right: 50px;">

            <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

            <h1 class="course_includes">{{ __('main.course_includes') }}</h1>

            <p class="course_includes_desc text-muted">{{ __('main.course_includes_desc') }}</p>

            <x-join-now class="course_includes_join_now mt-3"></x-join-now>

        </div>

        <div class="course_includes_second">

            <p style="color: #F6F6F6; font-size: 19px; padding: 0; margin: 0;">something</p>

            <div style="display: flex; justify-content: space-between; margin-top: 10px;">

                <div style="width: 30%; border-radius: 20px; background-color: #6385FF;">

                    <p class="course_includes_p">{!! __('main.individual_lessons') !!}</p>

                </div>

                <div class="course_includes_declared" style="border-radius: 20px; background-color: white;">

                    <p class="course_includes_p" style="color: black;">{!! __('main.personalized_program') !!}</p>

                </div>

                <div style="width: 30%; border-radius: 20px; background-color: #FF234B;">

                    <p class="course_includes_p">{!! __('main.interactive_learning') !!}</p>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- FAQ --}}
<div style="width: 100%; background-color: #6385FF; padding-bottom: 10vh; font-family: Poppins; color: white;">

    <div class="container">

        <p style="color: #FF2424; font-size: 19px; padding-top: 4vh;">#englishtime</p>

        <h1 class="faq">FAQ</h1>

        <p class="faq_header" style="margin-top: 20px;">{{ __('main.where_classes_are_held') }}</p>
        <p class="faq_text">{{ __('main.you_study_individually_with_teacher') }}</p>

        <p class="faq_header">{{ __('main.what_does_this_site_provide') }}</p>
        <p class="faq_text">{{ __('main.this_is_website_with_all_materials') }}</p>

        <p class="faq_header">{{ __('main.duration_and_number_of_lessons') }}</p>
        <p class="faq_text">{{ __('main.the_duration_of_one_course_is') }}</p>

        <p class="faq_header">{{ __('main.payment_options') }}</p>
        <p class="faq_text">{{ __('main.you_can_pay_for_1_month') }}</p>

    </div>

</div>

{{-- FOOTER --}}
<div style="width: 100%; background-color: white; font-family: Poppins; padding: 4vh 0;">

    <div class="container d-flex" style="justify-content: space-between; width: 60%;">

        <div class="footer_text" style="text-align: left;">

            <h1 style="font-family: Anybody;">English Time</h1>

            <p class="text-muted">Unlock Your English Potential with English Time!</p>

            <div class="d-flex">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.4939 38.6171C20.8917 38.6171 16.2161 35.8789 13.4874 32.2546C0.395748 32.2546 0 50.9999 0 50.9999H50.9846C50.9846 50.9999 52.0123 32.1714 37.2898 32.1714C34.5642 35.8405 30.0961 38.6171 25.4939 38.6171Z" fill="#6385FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.4599 16.1455C36.4599 21.5388 31.5481 31.852 25.4842 31.852C19.4299 31.852 14.515 21.5356 14.515 16.1455C14.515 10.7554 19.4267 6.37939 25.4842 6.37939C31.5481 6.38259 36.4599 10.7586 36.4599 16.1455Z" fill="#6385FF"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M41.3558 11.4903C41.3558 10.4795 39.9516 9.66378 38.209 9.65738V7.57492C38.209 7.26463 38.3271 0 25.5227 0C12.7247 0 12.8428 7.26463 12.8428 7.57492V9.73095C12.8109 9.73095 12.7853 9.72136 12.7566 9.72136C11.0236 9.72136 9.62891 10.5243 9.62891 11.5191V20.3288C9.62891 21.3173 11.0268 22.1234 12.7566 22.1234C14.4864 22.1234 15.8907 21.3173 15.8907 20.3288V11.5191C15.8907 11.3816 15.8045 11.2568 15.7534 11.1289V8.72651C15.7534 8.50579 14.8343 3.02293 25.5227 3.02293C36.2143 3.02293 35.1036 8.50579 35.1036 8.72651V11.2568C35.0845 11.3368 35.0239 11.4072 35.0239 11.4903V20.5015C35.0239 21.5156 36.4377 22.3377 38.1898 22.3377C38.2281 22.3377 38.2569 22.3249 38.2952 22.3249V25.6165H35.1547V28.7194H41.3878L41.3558 11.4903Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 23px; margin: 0; padding-left: 5px; padding-top: 3px;">rithlesscorp@gmail.com</p>

                </div>

            </div>

            <div class="d-flex" style="margin-top: 15px;">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9869 0.153C17.7069 0.0283281 18.5739 0 25.5 0C32.4274 0 33.293 0.0297422 36.0116 0.153C38.7273 0.276258 40.5819 0.708344 42.2039 1.33875C43.9052 1.97929 45.4463 2.9829 46.7202 4.27976C48.0172 5.55344 49.021 7.0947 49.6613 8.79609C50.2916 10.4182 50.7223 12.2726 50.847 14.9869C50.9717 17.7069 51 18.5739 51 25.5C51 32.426 50.9703 33.293 50.847 36.0132C50.7237 38.7273 50.2916 40.5819 49.6613 42.2039C49.0096 43.8799 48.1368 45.3035 46.7202 46.7202C45.4466 48.0172 43.9052 49.021 42.2039 49.6613C40.5819 50.2916 38.7273 50.7223 36.0132 50.847C33.293 50.9717 32.426 51 25.5 51C18.5739 51 17.7069 50.9703 14.9869 50.847C12.2726 50.7237 10.4182 50.2916 8.79609 49.6613C7.12016 49.0096 5.69642 48.1368 4.27976 46.7202C2.98267 45.4466 1.97899 43.9052 1.33875 42.2039C0.708344 40.5819 0.277672 38.7273 0.153 36.0132C0.0283281 33.293 0 32.4274 0 25.5C0 18.5725 0.0297422 17.7069 0.153 14.9883C0.276258 12.2726 0.708344 10.4182 1.33875 8.79609C1.97929 7.09482 2.9829 5.55362 4.27976 4.27976C5.55341 2.98267 7.09468 1.97899 8.79609 1.33875C10.4182 0.708344 12.2726 0.277672 14.9869 0.153ZM35.8048 4.743C33.1159 4.62116 32.3085 4.59424 25.5 4.59424C18.6915 4.59424 17.884 4.62116 15.1952 4.743C12.7089 4.85634 11.3588 5.27141 10.4607 5.62134C9.27066 6.08316 8.42066 6.63566 7.52816 7.52816C6.63709 8.42066 6.08316 9.27066 5.62134 10.4607C5.27141 11.3588 4.85634 12.7089 4.743 15.1952C4.62116 17.884 4.59424 18.6915 4.59424 25.5C4.59424 32.3085 4.62116 33.1159 4.743 35.8048C4.85634 38.291 5.27141 39.6411 5.62134 40.5394C6.02985 41.6471 6.68144 42.649 7.52816 43.4719C8.35088 44.3185 9.35296 44.9702 10.4607 45.3786C11.3588 45.7287 12.7089 46.1436 15.1952 46.257C17.884 46.3789 18.6901 46.4058 25.5 46.4058C32.3099 46.4058 33.1159 46.3789 35.8048 46.257C38.291 46.1436 39.6411 45.7287 40.5394 45.3786C41.7294 44.9169 42.5794 44.3644 43.4719 43.4719C44.3185 42.6492 44.9702 41.6471 45.3786 40.5394C45.7287 39.6411 46.1436 38.291 46.257 35.8048C46.3789 33.1159 46.4058 32.3085 46.4058 25.5C46.4058 18.6915 46.3789 17.884 46.257 15.1952C46.1436 12.7089 45.7287 11.3588 45.3786 10.4607C44.9169 9.27066 44.3644 8.42066 43.4719 7.52816C42.5794 6.63709 41.7294 6.08316 40.5394 5.62134C39.6411 5.27141 38.291 4.85634 35.8048 4.743ZM22.2441 33.3607C23.2764 33.7884 24.3826 34.0084 25.5 34.0084C27.7568 34.0084 29.9208 33.112 31.5164 31.5164C33.1122 29.9208 34.0087 27.7565 34.0087 25.5C34.0087 23.2435 33.1122 21.0792 31.5164 19.4836C29.9208 17.8879 27.7568 16.9915 25.5 16.9915C24.3826 16.9915 23.2764 17.2116 22.2441 17.6392C21.2116 18.0667 20.2737 18.6935 19.4836 19.4836C18.6936 20.2737 18.0668 21.2116 17.6392 22.2439C17.2116 23.2762 16.9916 24.3826 16.9916 25.5C16.9916 26.6174 17.2116 27.7238 17.6392 28.7561C18.0668 29.7884 18.6936 30.7263 19.4836 31.5164C20.2737 32.3064 21.2116 32.9332 22.2441 33.3607ZM16.232 16.2319C18.6901 13.7739 22.0239 12.393 25.5 12.393C28.9763 12.393 32.3101 13.7739 34.7681 16.2319C37.2261 18.69 38.607 22.0239 38.607 25.5C38.607 28.9761 37.2261 32.3099 34.7681 34.7681C32.3101 37.2261 28.9763 38.607 25.5 38.607C22.0239 38.607 18.6901 37.2261 16.232 34.7681C13.774 32.3099 12.3931 28.9761 12.3931 25.5C12.3931 22.0239 13.774 18.69 16.232 16.2319ZM41.5133 14.3458C42.0942 13.7647 42.4206 12.9767 42.4206 12.155C42.4206 11.3333 42.0942 10.5452 41.5133 9.96419C40.9321 9.38316 40.1442 9.05674 39.3224 9.05674C38.5008 9.05674 37.7126 9.38316 37.1317 9.96419C36.5505 10.5452 36.2241 11.3333 36.2241 12.155C36.2241 12.9767 36.5505 13.7647 37.1317 14.3458C37.7126 14.9268 38.5008 15.2532 39.3224 15.2532C40.1442 15.2532 40.9321 14.9268 41.5133 14.3458Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 23px; margin: 0; padding-left: 5px; padding-top: 3px;">
                        <a href="https://www.instagram.com/englishtime.com.ua/" style="text-decoration: none;">
                            @englishtime.com.ua
                        </a>
                    </p>

                </div>

            </div>

            <div class="d-flex" style="margin-top: 15px;">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M51 25.5C51 39.5832 39.5832 51 25.5 51C11.4167 51 0 39.5832 0 25.5C0 11.4167 11.4167 0 25.5 0C39.5832 0 51 11.4167 51 25.5ZM26.4137 18.8252C23.9337 19.8568 18.9766 21.9921 11.5428 25.2308C10.3357 25.7108 9.70334 26.1804 9.64578 26.6396C9.54847 27.4157 10.5203 27.7213 11.8437 28.1373C12.0237 28.1941 12.2102 28.2527 12.4014 28.3148C13.7034 28.7381 15.4548 29.2332 16.3653 29.2528C17.1912 29.2706 18.113 28.9302 19.1307 28.2313C26.0763 23.5429 29.6616 21.1731 29.8866 21.122C30.0456 21.086 30.2655 21.0406 30.4147 21.1732C30.5637 21.3057 30.5492 21.5566 30.5333 21.624C30.437 22.0343 26.6222 25.581 24.6481 27.4163C24.0327 27.9884 23.5962 28.3942 23.507 28.4869C23.307 28.6947 23.1032 28.8911 22.9075 29.0798C21.698 30.2458 20.7909 31.1202 22.9577 32.5482C23.9991 33.2344 24.8323 33.8017 25.6636 34.3678C26.5714 34.9862 27.4769 35.6029 28.6484 36.3709C28.947 36.5666 29.2319 36.7697 29.5097 36.9676C30.5662 37.7209 31.5154 38.3975 32.688 38.2895C33.3695 38.2268 34.0733 37.5862 34.4307 35.6754C35.2754 31.1593 36.9359 21.3743 37.3197 17.3421C37.3535 16.9888 37.3112 16.5367 37.2772 16.3382C37.2432 16.1398 37.1722 15.857 36.9142 15.6476C36.6087 15.3997 36.1371 15.3475 35.9261 15.3512C34.9669 15.3681 33.4955 15.8797 26.4137 18.8252Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 23px; margin: 0; padding-left: 5px; padding-top: 3px;">@telegram_link</p>

                </div>

            </div>

        </div>


    </div>

</div>

<script defer>

    let personalized_course = document.querySelector('.personalized_course')

    if(document.querySelector('.container').offsetWidth == 960)
    {

        personalized_course.parentElement.children[0].style.fontSize = '16px'

    }

    let footer_text = document.querySelector('.footer_text')

    let footer_height = footer_text.offsetHeight

    footer_text.parentElement.innerHTML += `

        <div style="display: table;">
            <div style="display: table-cell; vertical-align: middle;">
                <img style="height: ${footer_height}px;" src="{{ asset('storage/icons/support.png') }}">
            </div>
        </div>

    `

    window.addEventListener('load', function () {

        let llocale = document.querySelector('.locale').value

        let expands = document.querySelectorAll('.expand')
        let ps = document.querySelectorAll('.p')

        let id = null;

        function shrink_f() {

            let p = this.parentElement.children[0]

            let height = 0
            clearInterval(id);
            id = setInterval(frame, 0);

            function frame() {

                if (p.style.height == '250px') {
                    clearInterval(id);
                } else {

                    height = parseInt(p.style.height.slice(0, p.style.height.length-2))
                    height = height-1

                    p.style.height = height+'px'

                }

            }

            this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                    <path d="M2.5 2.5L73.5884 31.0884L144.68 2.5" stroke="#6e6e6e" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `

            this.removeEventListener('click', shrink_f)
            this.addEventListener('click', expand_f)


        }

        function expand_f() {

            let p = this.parentElement.children[0]

            let height = 0
            clearInterval(id);
            id = setInterval(frame, 0);

            function frame() {

                if (p.style.height == p.attributes.start.value+'px') {
                    clearInterval(id);
                } else {

                    height = parseInt(p.style.height.slice(0, p.style.height.length-2))
                    height = height+1

                    p.style.height = height+'px'

                }

            }

            this.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="50" viewBox="0 0 148 34" fill="none">
                    <path d="M2.5 31.5L73.5884 2.90997L144.68 31.5" stroke="black" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            `

            this.removeEventListener('click', expand_f)
            this.addEventListener('click', shrink_f)


        }

        ps.forEach(p => {

            p.setAttribute('start', p.offsetHeight)
            p.style.height = '250px'

        });
        expands.forEach(expand => {

            expand.addEventListener('click', expand_f)

        });

    })

</script>

@endif

@endsection
