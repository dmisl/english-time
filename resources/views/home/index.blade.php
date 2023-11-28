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

                <h1 style="font-weight: 400; font-size: 4vw; line-height: 1.35;">Online English<br>Learning School</h1>

                <p class="text-muted mt-4" style="font-size: 18px;">This is an online spoken language school for those who care not only about the result but also about the pleasure of the process</p>

                <x-join-now class="mt-5"></x-join-now>

            </div>



        </div>

        <div class="w-50" style="display: table;">

            <div style="display: table-cell; vertical-align: middle;">

                <img style="width: 150%;" src="{{ asset('storage/icons/gif.gif') }}" alt="">

            </div>

        </div>

    </div>

</div>

{{-- WHY US TEXT --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; height: 30vh; background-color: #F6F6F6; overflow: hidden;">

    <p style="color: #FF2424; margin-top: 4vh; font-size: 19px;">#englishtime</p>

    <h1 style="font-weight: 400; font-size: 80px;">Why Us</h1>

</div>
{{-- WHY US ANSWER --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; background: linear-gradient(180deg, #F6F6F6 15%, #6385FF 8%); overflow: hidden;">

    <div class="container d-flex" style="justify-content: space-between; padding-bottom: 50px;">

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">Real Media, Real English</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">The entire course is based on unadapted movies, podcasts, and TV shows so that you can immerse yourself in real English</p>

        </div>

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus2.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">Speak Confidently, Masterfully</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">Master conversation skills from day one, overcome language barriers, and achieve fluent English communication</p>

        </div>

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus3.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">Digital learning today</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">Explore the modern convenience of digital learning. Our course adapts to your schedule, providing flexibility for a seamless educational experience.</p>

        </div>

    </div>

</div>

{{-- TESTIMONIAL --}}
<div style="width: 100%; padding-bottom: 23vh; background-color: #F6F6F6;">

    <div class="container">

        <div style="height: 30vh;">

            <p style="color: #FF2424; padding-top: 4vh; font-size: 19px;">#englishtime</p>

            <h1 style="font-weight: 400; font-size: 80px;">Testimonial</h1>

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

                <h1 style="font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;">Personalized individual learning course</h1>

                <p style="font-size: 25px;">2400 UAH / 1 month (8 lessons)</p>

                <p class="text-muted" style="font-size: 20px; padding-top: 5px;">Tailored program ideal for those who've taken numerous courses without achieving English fluency. If grammar feels dizzying, if spoken English is challenging to comprehend, or if pronunciation needs refinement, this course is designed to captivate your interest and motivate progress. Break language barriers and finally achieve confident and effective English communication.</p>

            </div>

        </div>

    </div>

</div>

{{-- COURSE INCLUDES --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 20vh; font-family: Poppins;">

    <div class="container d-flex">

        <div style="text-align: left; padding-right: 50px;">

            <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

            <h1 style="font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;">Course includes</h1>

            <p class="text-muted" style="font-size: 20px;">Perfectly tailored to you.</p>

            <x-join-now class="mt-3"></x-join-now>

        </div>

        <div style="width: 60%;">

            <p style="color: #F6F6F6; font-size: 19px; padding: 0; margin: 0;">something</p>

            <div style="display: flex; justify-content: space-between; margin-top: 10px;">

                <div style="width: 30%; border-radius: 20px; background-color: #6385FF;">

                    <p style="color: white; padding: 23px 35px; font-size: 18px; font-weight: 300;"><span style="font-size: 27px;">Individual lessons</span><br>with a teacher and lessons on a convenient learning platform</p>

                </div>

                <div style="width: 30%; border-radius: 20px; background-color: white;">

                    <p style="color: black; padding: 23px 35px; font-size: 18px; font-weight: 300;"><span style="font-size: 27px;">Personalized Program</span><br>considers your interests, ensuring effective, tailored learning for you</p>

                </div>

                <div style="width: 30%; border-radius: 20px; background-color: #FF234B;">

                    <p style="color: white; padding: 23px 30px; font-size: 18px; font-weight: 300;"><span style="font-size: 27px;">Interactive Learning</span><br>ensures 100% class practice with communicative methods for<br><span style="background-color: white; color: #FF234B; padding: 0 3px; border-radius: 5px; user-select: none;" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="'Active speaking' in English language learning refers to the active participation of students in verbal communication. It involves using words, expressions, and grammatical structures actively to express thoughts and ideas. During active speaking exercises, students engage in dialogues, discuss topics, and participate in role-playing scenarios. This approach fosters the development of speaking skills, expands vocabulary, and improves pronunciation. Active speaking, whether in the classroom or during language learning activities, creates a dynamic and practical experience in using the English language, enhancing overall language proficiency."><b>active speaking</b></span></p>

                </div>

            </div>

        </div>

    </div>


</div>

<script>

    let avatars = document.querySelectorAll('.avatar')

    avatars.forEach(avatar => {

        avatar.style.height = avatar.offsetWidth+'px'

    });

</script>

@endsection
