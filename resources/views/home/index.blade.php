@extends('layouts.main')

@section('main.title')

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

                <h1 class="online_school" style="font-weight: 400; font-size: 80px; line-height: 1.35;">{{ __('main.online_school') }}</h1>

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

    <h1 class="why_us" style="font-weight: 400; font-size: 80px;">{{ __('main.why_us') }}</h1>

</div>
{{-- WHY US ANSWER --}}
<div style="font-family: 'Poppins', sans-serif; width: 100%; background: linear-gradient(180deg, #F6F6F6 15%, #6385FF 8%); overflow: hidden;">

    <div class="container d-flex" style="justify-content: space-between; padding-bottom: 50px;">

        <div style="width: 28%;" class="real_media">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p class="why_us_header" style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">{{ __('main.real_media') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.real_media_desc') }}</p>

        </div>

        <div style="width: 28%;" class="speak_confidently">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus2.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p class="why_us_header" style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">{{ __('main.speak_confidently') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.speak_confidently_desc') }}</p>

        </div>

        <div style="width: 28%;">

            <div style="width: 100%; height: 230px; border-radius: 20px; margin: 0 auto; background-image: url('{{ asset('storage/icons/whyus3.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

            <p class="why_us_header" style="color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;">{{ __('main.digital_learning') }}</p>

            <p style="color: white; font-weight: 300; font-size: 15.5px; margin-top: 10px; letter-spacing: 1px;">{{ __('main.digital_learning_desc') }}</p>

        </div>

    </div>

</div>

{{-- TESTIMONIAL --}}
<div style="width: 100%; padding-bottom: 23vh; background-color: #F6F6F6;">

    <div class="container">

        <div style="height: 30vh;">

            <p style="color: #FF2424; padding-top: 4vh; font-size: 19px;">#englishtime</p>

            <h1 class="testimonial" style="font-weight: 400; font-size: 80px;">{{ __('main.testimonial') }}</h1>

        </div>

        <div style="display: flex; justify-content: space-between;">

            <div style="width: 23%; border-radius: 25px; background-color: white; box-shadow: rgba(0, 0, 0, 0.13) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">

                <div style="padding: 20px; padding-bottom: 25px;">

                    <div style="display: flex;">

                        <div class="avatar" style="width: 70px; height: 70px; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

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

                        <div class="avatar" style="width: 70px; height: 70px; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

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

                        <div class="avatar" style="width: 70px; height: 70px; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

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

                        <div class="avatar" style="width: 70px; height: 70px; border-radius: 100%; background-image: url('{{ asset('storage/icons/avatar1.png') }}'); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>

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

                <h1 class="personalized_course" style="font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;">{{ __('main.personalized_course') }}</h1>

                <p class="personalized_course_cost" style="font-size: 25px;">{{ __('main.personalized_course_cost') }}</p>

                <p class="personalized_course_desc text-muted" style="font-size: 20px; padding-top: 5px;">{{ __('main.personalized_course_desc') }}</p>

            </div>

        </div>

    </div>

</div>

{{-- COURSE INCLUDES --}}
<div style="width: 100%; background-color: #F6F6F6; padding-bottom: 20vh; font-family: Poppins;">

    <div class="container d-flex">

        <div style="text-align: left; padding-right: 50px;">

            <p style="color: #FF2424; font-size: 19px; padding: 0; margin: 0;">#englishtime</p>

            <h1 class="course_includes" style="font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;">{{ __('main.course_includes') }}</h1>

            <p class="course_includes_desc text-muted" style="font-size: 20px;">{{ __('main.course_includes_desc') }}</p>

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

{{-- FAQ --}}
<div style="width: 100%; background-color: #6385FF; padding-bottom: 10vh; font-family: Poppins; color: white;">

    <div class="container">

        <p style="color: #FF2424; font-size: 19px; padding-top: 4vh;">#englishtime</p>

        <h1 class="faq" style="font-weight: 400; font-size: 80px; margin-bottom: 0; padding-bottom: 0;">FAQ</h1>

        <p class="faq_header" style="font-size: 30px; font-weight: 300; margin: 0; padding: 0; margin-top: 20px;">Where classes are held</p>
        <p class="faq_text" style="font-size: 18px; font-weight: 300; margin-top: 8px;">You study individually with a teacher in Zoom and complete assignments in your English Time account</p>

        <p class="faq_header" style="font-size: 30px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;">What does this site provide for study?</p>
        <p class="faq_text" style="font-size: 18px; font-weight: 300; margin-top: 8px;">This is a website with all the materials and tasks that you can work on from your computer or phone. It contains exercises, new vocabulary, explanations, video and audio tasks, which is very convenient because everything is in one place and always at hand</p>

        <p class="faq_header" style="font-size: 30px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;">Duration and number of lessons in the course</p>
        <p class="faq_text" style="font-size: 18px; font-weight: 300; margin-top: 8px;">The duration of one course is approximately 3.5 months (28 lessons / 2 times a week) at a time convenient for you</p>

        <p class="faq_header" style="font-size: 30px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;">Payment options</p>
        <p class="faq_text" style="font-size: 18px; font-weight: 300; margin-top: 8px;">You can pay for 1 month of training (8 lessons) or pay for the entire course at once. In this case, you will receive a 10% discount. Immediately after payment, our manager will contact you and provide access to your personal account.</p>

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

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 23px; margin: 0; padding-left: 5px; padding-top: 3px;">some_email@gmail.com</p>

                </div>

            </div>

            <div class="d-flex" style="margin-top: 15px;">

                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 51 51" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14.9869 0.153C17.7069 0.0283281 18.5739 0 25.5 0C32.4274 0 33.293 0.0297422 36.0116 0.153C38.7273 0.276258 40.5819 0.708344 42.2039 1.33875C43.9052 1.97929 45.4463 2.9829 46.7202 4.27976C48.0172 5.55344 49.021 7.0947 49.6613 8.79609C50.2916 10.4182 50.7223 12.2726 50.847 14.9869C50.9717 17.7069 51 18.5739 51 25.5C51 32.426 50.9703 33.293 50.847 36.0132C50.7237 38.7273 50.2916 40.5819 49.6613 42.2039C49.0096 43.8799 48.1368 45.3035 46.7202 46.7202C45.4466 48.0172 43.9052 49.021 42.2039 49.6613C40.5819 50.2916 38.7273 50.7223 36.0132 50.847C33.293 50.9717 32.426 51 25.5 51C18.5739 51 17.7069 50.9703 14.9869 50.847C12.2726 50.7237 10.4182 50.2916 8.79609 49.6613C7.12016 49.0096 5.69642 48.1368 4.27976 46.7202C2.98267 45.4466 1.97899 43.9052 1.33875 42.2039C0.708344 40.5819 0.277672 38.7273 0.153 36.0132C0.0283281 33.293 0 32.4274 0 25.5C0 18.5725 0.0297422 17.7069 0.153 14.9883C0.276258 12.2726 0.708344 10.4182 1.33875 8.79609C1.97929 7.09482 2.9829 5.55362 4.27976 4.27976C5.55341 2.98267 7.09468 1.97899 8.79609 1.33875C10.4182 0.708344 12.2726 0.277672 14.9869 0.153ZM35.8048 4.743C33.1159 4.62116 32.3085 4.59424 25.5 4.59424C18.6915 4.59424 17.884 4.62116 15.1952 4.743C12.7089 4.85634 11.3588 5.27141 10.4607 5.62134C9.27066 6.08316 8.42066 6.63566 7.52816 7.52816C6.63709 8.42066 6.08316 9.27066 5.62134 10.4607C5.27141 11.3588 4.85634 12.7089 4.743 15.1952C4.62116 17.884 4.59424 18.6915 4.59424 25.5C4.59424 32.3085 4.62116 33.1159 4.743 35.8048C4.85634 38.291 5.27141 39.6411 5.62134 40.5394C6.02985 41.6471 6.68144 42.649 7.52816 43.4719C8.35088 44.3185 9.35296 44.9702 10.4607 45.3786C11.3588 45.7287 12.7089 46.1436 15.1952 46.257C17.884 46.3789 18.6901 46.4058 25.5 46.4058C32.3099 46.4058 33.1159 46.3789 35.8048 46.257C38.291 46.1436 39.6411 45.7287 40.5394 45.3786C41.7294 44.9169 42.5794 44.3644 43.4719 43.4719C44.3185 42.6492 44.9702 41.6471 45.3786 40.5394C45.7287 39.6411 46.1436 38.291 46.257 35.8048C46.3789 33.1159 46.4058 32.3085 46.4058 25.5C46.4058 18.6915 46.3789 17.884 46.257 15.1952C46.1436 12.7089 45.7287 11.3588 45.3786 10.4607C44.9169 9.27066 44.3644 8.42066 43.4719 7.52816C42.5794 6.63709 41.7294 6.08316 40.5394 5.62134C39.6411 5.27141 38.291 4.85634 35.8048 4.743ZM22.2441 33.3607C23.2764 33.7884 24.3826 34.0084 25.5 34.0084C27.7568 34.0084 29.9208 33.112 31.5164 31.5164C33.1122 29.9208 34.0087 27.7565 34.0087 25.5C34.0087 23.2435 33.1122 21.0792 31.5164 19.4836C29.9208 17.8879 27.7568 16.9915 25.5 16.9915C24.3826 16.9915 23.2764 17.2116 22.2441 17.6392C21.2116 18.0667 20.2737 18.6935 19.4836 19.4836C18.6936 20.2737 18.0668 21.2116 17.6392 22.2439C17.2116 23.2762 16.9916 24.3826 16.9916 25.5C16.9916 26.6174 17.2116 27.7238 17.6392 28.7561C18.0668 29.7884 18.6936 30.7263 19.4836 31.5164C20.2737 32.3064 21.2116 32.9332 22.2441 33.3607ZM16.232 16.2319C18.6901 13.7739 22.0239 12.393 25.5 12.393C28.9763 12.393 32.3101 13.7739 34.7681 16.2319C37.2261 18.69 38.607 22.0239 38.607 25.5C38.607 28.9761 37.2261 32.3099 34.7681 34.7681C32.3101 37.2261 28.9763 38.607 25.5 38.607C22.0239 38.607 18.6901 37.2261 16.232 34.7681C13.774 32.3099 12.3931 28.9761 12.3931 25.5C12.3931 22.0239 13.774 18.69 16.232 16.2319ZM41.5133 14.3458C42.0942 13.7647 42.4206 12.9767 42.4206 12.155C42.4206 11.3333 42.0942 10.5452 41.5133 9.96419C40.9321 9.38316 40.1442 9.05674 39.3224 9.05674C38.5008 9.05674 37.7126 9.38316 37.1317 9.96419C36.5505 10.5452 36.2241 11.3333 36.2241 12.155C36.2241 12.9767 36.5505 13.7647 37.1317 14.3458C37.7126 14.9268 38.5008 15.2532 39.3224 15.2532C40.1442 15.2532 40.9321 14.9268 41.5133 14.3458Z" fill="#6385FF"/>
                </svg>

                <div style="display: table;">

                    <p style="display: table-cell; vertical-align: middle; font-family: Anybody; font-size: 23px; margin: 0; padding-left: 5px; padding-top: 3px;">@instagram_link</p>

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

    let online_school = document.querySelector('.online_school')

    let why_us = document.querySelector('.why_us')
    let why_us_headers = document.querySelectorAll('.why_us_header')

    let testimonial = document.querySelector('.testimonial')
    let avatars = document.querySelectorAll('.avatar')

    let personalized_course = document.querySelector('.personalized_course')
    let personalized_course_cost = document.querySelector('.personalized_course_cost')
    let personalized_course_desc = document.querySelector('.personalized_course_desc')

    let course_includes = document.querySelector('.course_includes')
    let course_includes_headers = document.querySelectorAll('.course_includes_header')

    let faq = document.querySelector('.faq')
    let faq_headers = document.querySelectorAll('.faq_header')
    let faq_texts = document.querySelectorAll('.faq_text')

    let join_nows = document.querySelectorAll(".join_now")

    console.log(document.querySelector('.container').offsetWidth)

    if(document.querySelector('.container').offsetWidth == 1140)
    {

        online_school.style.fontSize = '70px'
        why_us.style.fontSize = '70px'
        testimonial.style.fontSize = '70px'
        faq.style.fontSize = '70px'

        why_us_headers.forEach(header => {
            header.style.fontSize = '21px'
        });

        personalized_course.style.fontSize = '42px'
        personalized_course.style.marginBottom = '6px'
        personalized_course.style.marginTop = '5px'

        personalized_course_cost.style.fontSize = '23px'
        personalized_course_cost.style.marginBottom = '5px'

        personalized_course_desc.style.fontSize = '18px'

        course_includes.style.fontSize = '49px'

        course_includes_headers.forEach(header => {

            header.style.fontSize = '22px'
            header.parentElement.style.fontSize = ''

        });

        course_includes_headers[1].parentElement.parentElement.style.width = '31%'

        why_us_headers.forEach(header => {

            header.style.fontSize = `28px`

        });

    }
    if(document.querySelector('.container').offsetWidth == 960)
    {

        online_school.style.fontSize = '59px'

        join_nows.forEach(join_now => {

            join_now.style.padding = '15px 30px'

        });

        avatars.forEach(avatar => {

            avatar.style.borderRadius = '10px'
            avatar.style.height = ''

        });

        personalized_course.style.fontSize = '36px'
        personalized_course.style.marginBottom = '6px'
        personalized_course.style.marginTop = '5px'

        personalized_course_cost.style.fontSize = '20px'
        personalized_course_cost.style.marginBottom = '5px'

        personalized_course_desc.style.fontSize = '16px'
        personalized_course_desc.style.paddingTop = '0'

        personalized_course.parentElement.children[0].style.fontSize = '16px'

        course_includes.style.fontSize = '49px'

        course_includes_headers.forEach(header => {

            header.style.fontSize = '20px'
            header.parentElement.style.fontSize = '17px'

        });

        course_includes.parentElement.parentElement.children[1].style.width = '65%'
        course_includes.parentElement.style.width = '35%'
        course_includes_headers[1].parentElement.parentElement.style.width = '31%'

        faq_headers.forEach(header => {

            header.style.fontSize = '28px'

        });

        faq_texts.forEach(text => {

            text.style.fontSize = '17px'

        });

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

</script>

@endsection
