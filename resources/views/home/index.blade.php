@extends('layouts.main')

@section('main.title', )

{{ env('APP_NAME') }}
 |
{{ __('main.home_page')}}

@endsection

@section('main.content')

{{-- FIRST SLIDE --}}
<div class="container" style="font-family: 'Poppins', sans-serif;">

    <div class="d-flex" style="height: 93vh;">

        <div class="w-50" style="text-align: left;">

            <div style="margin-top: 15vh;">

                <p style="color: #FF2424; font-size: 19px;">#englishtime</p>

                <h1 class="online_school" style="font-weight: 400; font-size: 4vw; line-height: 1.35;">{{ __('main.online_school') }}</h1>

                <p class="online_school_desc text-muted mt-4" style="font-size: 18px;">{{ __('main.online_school_desc') }}</p>

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

    <h1 style="font-weight: 400; font-size: 80px;">{{ __('main.why_us') }}</h1>

</div>
{{-- WHY US ANSWER --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; background: linear-gradient(180deg, #F6F6F6 15%, #6385FF 8%); overflow: hidden;">

    <div class="container d-flex" style="justify-content: space-between; padding-bottom: 50px;">

        <div style="width: 28%;" class="real_media">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">{{ __('main.real_media') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.real_media_desc') }}</p>

        </div>

        <div style="width: 28%;" class="speak_confidently">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus2.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">{{ __('main.speak_confidently') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.speak_confidently_desc') }}</p>

        </div>

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus3.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">{{ __('main.digital_learning') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.digital_learning_desc') }}</p>

        </div>

    </div>

</div>

{{-- TESTIMONIAL --}}
<div style="width: 100%; padding-bottom: 23vh; background-color: #F6F6F6;">

    <div class="container">

        <div style="height: 30vh;">

            <p style="color: #FF2424; padding-top: 4vh; font-size: 19px;">#englishtime</p>

            <h1 style="font-weight: 400; font-size: 80px;">{{ __('main.testimonial') }}</h1>

        </div>

        <div style="display: flex; justify-content: space-between;">

            <div style="width: 23%; border-radius: 25px; background-color: white; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">

                <div style="padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 30%; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Alexandro Pilov</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p style="color: #6e6e6e; font-weight: 400; font-size: 17.5px;"><i>“Тут буде написаний якийсь відгук від учня який абсолютно добровільно його напише :) І він може навіть ще щось добавити”</i></p>

                    </div>

                </div>

            </div>

            <div style="width: 23%; border-radius: 25px; background-color: white; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">

                <div style="padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 30%; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Alexandro Pilov</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p style="color: #6e6e6e; font-weight: 400; font-size: 17.5px;"><i>“Тут буде написаний якийсь відгук від учня який абсолютно добровільно його напише :) І він може навіть ще щось добавити”</i></p>

                    </div>

                </div>

            </div>

            <div style="width: 23%; border-radius: 25px; background-color: white; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">

                <div style="padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 30%; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Alexandro Pilov</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p style="color: #6e6e6e; font-weight: 400; font-size: 17.5px;"><i>“Тут буде написаний якийсь відгук від учня який абсолютно добровільно його напише :) І він може навіть ще щось добавити”</i></p>

                    </div>

                </div>

            </div>

            <div style="width: 23%; border-radius: 25px; background-color: white; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">

                <div style="padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 30%; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

                        <div style="display: table; text-align: left;">

                            <div style="display: table-cell; vertical-align: middle; padding-left: 10px;">

                                <p style="font-family: Anybody; font-size: 16px; font-weight: 500; margin-bottom: 0;">Alexandro Pilov</p>

                                <p style="color: #5F6FFD; font-size: 13px; margin-top: 0; margin-bottom: 0;">@10godturmi</p>

                            </div>

                        </div>

                    </div>

                    <div style="padding: 10px; padding-top: 20px; text-align: left;">

                        <p style="color: #6e6e6e; font-weight: 400; font-size: 17.5px;"><i>“Тут буде написаний якийсь відгук від учня який абсолютно добровільно його напише :) І він може навіть ще щось добавити”</i></p>

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

                <h1 style="font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;">{{ __('main.personalized_course') }}</h1>

                <p style="font-size: 25px;">{{ __('main.personalized_course_cost') }}</p>

                <p class="text-muted" style="font-size: 20px; padding-top: 5px;">{{ __('main.personalized_course_desc') }}</p>

            </div>

        </div>

    </div>

</div>

{{-- COURSE INCLUDES --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 20vh; font-family: Poppins;">

    <div class="container d-flex">

        <div style="text-align: left; padding-right: 50px;">

            <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

            <h1 style="font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;">{{ __('main.course_includes') }}</h1>

            <p class="text-muted" style="font-size: 20px;">{{ __('main.course_includes_desc') }}</p>

            <x-join-now class="course_includes_join_now mt-3"></x-join-now>

        </div>

        <div style="width: 60%;">

            <p style="color: #F6F6F6; font-size: 19px; padding: 0; margin: 0;">something</p>

            <div style="display: flex; justify-content: space-between; margin-top: 10px;">

                <div style="width: 30%; border-radius: 20px; background-color: #6385FF;">

                    <p class="individual_lesson" style="color: white; padding: 23px 35px; font-size: 18px; font-weight: 300;">{!! __('main.individual_lessons') !!}</p>

                </div>

                <div style="width: 30%; border-radius: 20px; background-color: white;">

                    <p class="personalized_program" style="color: black; padding: 23px 35px; font-size: 18px; font-weight: 300;">{!! __('main.personalized_program') !!}</p>

                </div>

                <div style="width: 30%; border-radius: 20px; background-color: #FF234B;">

                    <p class="interactive_learning" style="color: white; padding: 23px 30px; font-size: 18px; font-weight: 300;">{!! __('main.interactive_learning') !!}</p>

                </div>

            </div>

        </div>

    </div>


</div>

<script defer>

    let avatars = document.querySelectorAll('.avatar')

    avatars.forEach(avatar => {

        avatar.style.height = avatar.offsetWidth+'px'

    });

</script>

@endsection
