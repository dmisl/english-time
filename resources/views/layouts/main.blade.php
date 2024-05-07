<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>
        @yield('main.title', 'English')
    </title>
    <style>

        .dark_mode_label {
            border: 1px solid white;
        }

        .dark_mode {
            height: 25px;
            width: 50px;
            display: flex;
        }

        .dark_mode input[type=checkbox] {
            height: 0;
            width: 0;
            visibility: hidden;
        }

        .dark_mode label {
            cursor: pointer;
            text-indent: -9999px;
            width: 50px;
            height: 25px;
            background: grey;
            display: block;
            border-radius: 100px;
            position: relative;
        }

        .dark_mode label:after {
            content: '';
            position: absolute;
            top: 1px;
            left: 1px;
            width: 21px;
            height: 21px;
            background: #fff;
            border-radius: 23px;
            transition: 0.5s;
        }

        .dark_mode input:checked+label {
            background: #292928;
        }

        .dark_mode input:checked+label:after {
            left: calc(100% - 1px);
            transform: translateX(-100%);
        }

        .dark_mode label:active:after {
            width: 30px;
        }

        .fi_input {
            height: 40px;
            text-align: center;
            border-radius: 10px;
            transition: 1s;
            {{ is_dark() ? 'background-color: white;' : '' }}
            border: 1px solid black;
            width: 170px;
            color: black;
        }

        .fi_input:focus {
            background-color: rgb(183, 220, 255);
            border: none;
            outline: 1px solid rgba(20, 172, 218, 0.795);
            transition: 1s;
            color: black;
        }

        .fi_input:disabled {
            color: black;
        }

        .fi_text {
            font-size: 20px;
            height: 35px;
        }

        .required::after {
            content: '*';
            color: red;
        }

        .icon {
            width: 25px;
            transition: 0.5s;
            cursor: pointer;
        }

        .icon:hover {
            border: 1px solid black;
            transition: 1s;
        }

        .overview {
            width: 100%;
        }

        td h5 {
            margin-top: 15px;
        }

        td h3 {
            margin-top: 10px;
        }

        .input_label {
            position: relative;
            font-size: 20px;
        }

        /* .answer,
        .answer_input,
        .answer_add,
        .answer_accept {
            position: relative;
            top: 6px;
            background-color: rgb(7, 92, 219);
            color: white;
            border-radius: 10px;
            cursor: pointer;
            margin: 0 auto;
            padding: 3px 10px;
            text-align: center
        } */

        #container
        {
            font-family: 'Inter', sans-serif;
        }

        .fill_gaps
        {

            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='30' ry='30' stroke='%23333' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            border-radius: 30px;
            font-family: 'Inter', sans-serif;
            margin: 0 auto;
            width: 80%;
            padding-bottom: 30px;

        }

        /* TRANSLATE */

        .answers_div
        {
            border-radius: 20px;
            width: 80%;
            padding: 20px;
            background-color: rgb(163, 253, 186);
            margin: 0 auto;
            margin-top: 25px;
        }

        .answers
        {
            display: flex;
            justify-content: center;
            gap: 10px 10px;
            flex-wrap: wrap;
        }

        .answer
        {
            margin: 0;
            font-size: 20px;
            user-select: none;
            border-radius: 10px;
            padding: 5px 20px;
            display: inline;
            color: white;
            background-color: rgb(0, 162, 255);
        }

        .inputs_div
        {
            width: 70%;
            margin: 0 auto;
            margin-top: 25px;
            padding-bottom: 100px;
        }

        .inputs_div table
        {

            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;

        }

        .inputs_div table, .inputs_div tr, .inputs_div td
        {

            border: 1px solid black;

        }

        .inputs_div td
        {

            width: 50%;
            font-size: 20px;
            padding: 10px;

        }

        .input
        {
            background-color: #d4ffd8;
            height: 40px;
            padding: 5px 20px;
            border-radius: 10px;
            position: relative;
        }

        .invisible {
            display: none;
        }

        .text {
            position: relative;
            top: 11px;
            font-size: 20px;
            padding: 0 10px;
        }

        .translate
        {
            width: 80%;
            margin: 0 auto;
            padding-bottom: 50px;
        }

        .add_translation:hover
        {

            border: 1px solid green;
            color: green;

        }

        .abc, .translate
        {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='30' ry='30' stroke='%23333' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            border-radius: 30px;
            font-family: 'Inter', sans-serif;
        }

        .course_includes_second
        {

            width: 60%;

        }

        .zxc
        {
            border: 1px solid black;
            background-size: cover;
            color: black;
        }

        .dashed
        {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='5' ry='5' stroke='%23333' stroke-width='1' stroke-dasharray='5%2c 5' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        }

        .dashed:hover
        {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='5' ry='5' stroke='%23333' stroke-width='2' stroke-dasharray='5%2c 5' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            color: green;
        }

        .task_add
        {

            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='30' ry='30' stroke='%23333' stroke-width='3' stroke-dasharray='6%2c 14' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            border-radius: 30px;

        }

        .abc_task
        {

            font-family: 'Inter', sans-serif;
            padding-bottom: 60px;

        }

        @keyframes delete {
            0% {background-color: white;}
            100% {background-color: red;}
        }

        .abc_answers
        {

            user-select: none;

        }

        .abc_ans
        {

            width: 700px;
            height: 60px;
            border: 1px solid black;
            margin: 0 auto;
            margin-bottom: 15px;
            display: flex;

        }

        .abc_ans h2
        {
            display: table-cell;
            vertical-align: middle;
        }

        .abc_ans h4
        {
            display: table-cell;
            vertical-align: middle;
            padding: 0 15px;
        }

        .course_includes_declared
        {

            width: 30%;

        }

        @keyframes expand {
            0% {height: 250px;}
            100% {height: ;}
        }
        @php
            if(App::currentLocale() == null)
            {
                App::setLocale('en');
            }
        @endphp

        @if(App::currentLocale() == 'en')

        @media only screen and (min-width: 602px)
        {

            .p
            {

                font-size: 15px;

            }

            .join_now
            {

                color: white; display: flex; column-gap: 15px; background-color: #6385FF;
                padding: 15px 30px; border-radius: 20px; transition: 0.5s; border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white; transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white; color: #6385FF; transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF; transition: 0.5s;
            }

            .online_school
            {

                font-weight: 400; font-size: 59px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 400; font-size: 70px;

            }

            .why_us_header
            {

                color: white; font-weight: 300; font-size: 21px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; border-radius: 10px;
                background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 36px; line-height: 1.4; margin-top: 5px; margin-bottom: 6px;

            }

            .personalized_course_cost
            {

                font-size: 25px;
                margin-bottom: 5px;

            }

            .personalized_course_desc
            {

                font-size: 16px; padding-top: 0;

            }

            .course_includes
            {

                font-weight: 400; font-size: 49px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_header
            {

                font-size: 20px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 17px; font-weight: 300;

            }

            .course_includes_first
            {

                width: 35%;

            }

            .course_includes_second
            {

                width: 65%;

            }

            .course_includes_declared
            {

                width: 31%;

            }

            .faq
            {

                font-weight: 400; font-size: 70px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 28px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 17px; font-weight: 300; margin-top: 8px;

            }

        }

        @media only screen and (min-width: 1200px)
        {

            .p
            {
                font-size: 16px;
            }

            .join_now
            {

                color: white;
                display: flex;
                column-gap: 15px;
                background-color: #6385FF;
                padding: 20px 40px;
                border-radius: 20px;
                transition: 0.5s;
                border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white;
                transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white;
                color: #6385FF;
                transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF;
                transition: 0.5s;
            }

            .online_school
            {

                font-weight: 400; font-size: 70px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 400; font-size: 70px;

            }

            .why_us_header
            {

                color: white; font-weight: 300; font-size: 21px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; height: 70px; border-radius: 100%; background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 42px; line-height: 1.4; margin-top: 5px; margin-bottom: 6px;

            }

            .personalized_course_cost
            {

                font-size: 27px;
                margin-bottom: 5px;

            }

            .personalized_course_desc
            {

                font-size: 18px; padding-top: 5px;

            }

            .course_includes
            {

                font-weight: 400; font-size: 49px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_header
            {

                font-size: 22px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 18px; font-weight: 300;

            }

            .course_includes_declared
            {

                width: 31%;

            }

            .faq
            {

                font-weight: 400; font-size: 70px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 30px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 18px; font-weight: 300; margin-top: 8px;

            }

        }

        @media only screen and (min-width: 1400px)
        {

            .p
            {

                font-size: 17px;

            }

            .join_now
            {

                color: white;
                display: flex;
                column-gap: 15px;
                background-color: #6385FF;
                padding: 20px 40px;
                border-radius: 20px;
                transition: 0.5s;
                border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white;
                transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white;
                color: #6385FF;
                transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF;
                transition: 0.5s;
            }

            .online_school
            {

                font-weight: 400; font-size: 80px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 400; font-size: 80px;

            }

            .why_us_header
            {

                color: white; font-weight: 300; font-size: 23px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; height: 70px; border-radius: 100%; background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;

            }

            .personalized_course_cost
            {

                font-size: 30px;

            }

            .personalized_course_desc
            {

                font-size: 20px; padding-top: 5px;

            }

            .course_includes
            {

                font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_header
            {

                font-size: 27px;

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 18px; font-weight: 300;

            }

            .faq
            {

                font-weight: 400; font-size: 80px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 30px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 18px; font-weight: 300; margin-top: 8px;

            }

        }

        @elseif(App::currentLocale() == 'ua' || App::currentLocale() == 'pl')

        @media only screen and (min-width: 602px)
        {

            .p
            {

                font-size: 15px;

            }

            .join_now
            {

                color: white; display: flex; column-gap: 15px; background-color: #6385FF;
                padding: 15px 30px; border-radius: 20px; transition: 0.5s; border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 22px;

            }

            .join_now svg
            {
                fill: white; transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white; color: #6385FF; transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF; transition: 0.5s;
            }

            .online_school
            {

                font-weight: 500; font-size: 50px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 16px;

            }

            .why_us, .testimonial
            {

                font-weight: 500; font-size: 70px;

            }

            .why_us_header
            {

                color: white; font-weight: 400; font-size: 16.6px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; border-radius: 10px;
                background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 30px; line-height: 1.4; margin: 0;

            }

            .personalized_course_cost
            {

                font-size: 25px; margin: 0; margin-bottom: 3px;

            }

            .personalized_course_desc
            {

                font-size: 14.5px; padding-top: 0;

            }

            .course_includes
            {

                font-weight: 400; font-size: 38px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_desc
            {

                font-size: 18px;

            }

            .course_includes_header
            {

                font-size: 20px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 15px; font-weight: 300;

            }

            .course_includes_first
            {

                width: 35%;

            }

            .course_includes_second
            {

                width: 65%;

            }

            .course_includes_declared
            {

                width: 31%;

            }

            .faq
            {

                font-weight: 400; font-size: 70px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 28px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 17px; font-weight: 300; margin-top: 8px;

            }

        }

        @media only screen and (min-width: 1200px)
        {

            .p
            {
                font-size: 16px;
            }

            .join_now
            {

                color: white;
                display: flex;
                column-gap: 15px;
                background-color: #6385FF;
                padding: 20px 40px;
                border-radius: 20px;
                transition: 0.5s;
                border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white;
                transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white;
                color: #6385FF;
                transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF;
                transition: 0.5s;
            }

            .online_school
            {

                font-weight: 500; font-size: 59px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 500; font-size: 70px;

            }

            .why_us_header
            {

                color: white; font-weight: 400; font-size: 19px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; height: 70px; border-radius: 100%; background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 35px; line-height: 1.4; margin-top: 5px; margin-bottom: 6px;

            }

            .personalized_course_cost
            {

                font-size: 27px;
                margin-bottom: 5px;

            }

            .personalized_course_desc
            {

                font-size: 17px; padding-top: 5px;

            }

            .course_includes
            {

                font-weight: 400; font-size: 47px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_header
            {

                font-size: 22px;
                font-weight: 400;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 16px; font-weight: 300;

            }

            .course_includes_declared
            {

                width: 31%;

            }

            .faq
            {

                font-weight: 400; font-size: 70px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 30px; font-weight: 400; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 18px; font-weight: 300; margin-top: 8px;

            }

        }

        @media only screen and (min-width: 1400px)
        {

            .p
            {

                font-size: 17px;

            }

            .join_now
            {

                color: white;
                display: flex;
                column-gap: 15px;
                background-color: #6385FF;
                padding: 20px 40px;
                border-radius: 20px;
                transition: 0.5s;
                border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white;
                transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white;
                color: #6385FF;
                transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF;
                transition: 0.5s;
            }

            .online_school
            {

                font-weight: 500; font-size: 69px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 500; font-size: 80px;

            }

            .why_us_header
            {

                color: white; font-weight: 400; font-size: 22px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; height: 70px; border-radius: 100%; background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 40px; line-height: 1.4; margin-top: 10px;

            }

            .personalized_course_cost
            {

                font-size: 30px;

            }

            .personalized_course_desc
            {

                font-size: 19px; padding-top: 5px;

            }

            .course_includes
            {

                font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_header
            {

                font-size: 27px;
                font-weight: 400

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 18px; font-weight: 300;

            }

            .faq
            {

                font-weight: 400; font-size: 80px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 30px; font-weight: 400; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 18px; font-weight: 300; margin-top: 8px;

            }

        }

        @else

        @media only screen and (min-width: 602px)
        {

            .p
            {

                font-size: 15px;

            }

            .join_now
            {

                color: white; display: flex; column-gap: 15px; background-color: #6385FF;
                padding: 15px 30px; border-radius: 20px; transition: 0.5s; border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 22px;

            }

            .join_now svg
            {
                fill: white; transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white; color: #6385FF; transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF; transition: 0.5s;
            }

            .online_school
            {

                font-weight: 500; font-size: 50px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 16px;

            }

            .why_us, .testimonial
            {

                font-weight: 500; font-size: 70px;

            }

            .why_us_header
            {

                color: white; font-weight: 400; font-size: 16.6px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; border-radius: 10px;
                background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 30px; line-height: 1.4; margin: 0;

            }

            .personalized_course_cost
            {

                font-size: 20px; margin: 0; margin-bottom: 3px;

            }

            .personalized_course_desc
            {

                font-size: 14px; padding-top: 0;

            }

            .course_includes
            {

                font-weight: 400; font-size: 38px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_desc
            {

                font-size: 18px;

            }

            .course_includes_header
            {

                font-size: 20px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 15px; font-weight: 300;

            }

            .course_includes_first
            {

                width: 35%;

            }

            .course_includes_second
            {

                width: 65%;

            }

            .course_includes_declared
            {

                width: 31%;

            }

            .faq
            {

                font-weight: 400; font-size: 70px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 28px; font-weight: 300; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 17px; font-weight: 300; margin-top: 8px;

            }

        }

        @media only screen and (min-width: 1200px)
        {

            .p
            {
                font-size: 16px;
            }

            .join_now
            {

                color: white;
                display: flex;
                column-gap: 15px;
                background-color: #6385FF;
                padding: 20px 40px;
                border-radius: 20px;
                transition: 0.5s;
                border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white;
                transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white;
                color: #6385FF;
                transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF;
                transition: 0.5s;
            }

            .online_school
            {

                font-weight: 500; font-size: 59px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 500; font-size: 70px;

            }

            .why_us_header
            {

                color: white; font-weight: 400; font-size: 19px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; height: 70px; border-radius: 100%; background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 35px; line-height: 1.4; margin-top: 5px; margin-bottom: 6px;

            }

            .personalized_course_cost
            {

                font-size: 23px;
                margin-bottom: 5px;

            }

            .personalized_course_desc
            {

                font-size: 16px; padding-top: 5px;

            }

            .course_includes
            {

                font-weight: 400; font-size: 47px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_header
            {

                font-size: 22px;
                font-weight: 400;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 16px; font-weight: 300;

            }

            .course_includes_declared
            {

                width: 31%;

            }

            .faq
            {

                font-weight: 400; font-size: 70px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 30px; font-weight: 400; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 18px; font-weight: 300; margin-top: 8px;

            }

        }

        @media only screen and (min-width: 1400px)
        {

            .p
            {

                font-size: 17px;

            }

            .join_now
            {

                color: white;
                display: flex;
                column-gap: 15px;
                background-color: #6385FF;
                padding: 20px 40px;
                border-radius: 20px;
                transition: 0.5s;
                border: 2px solid #6385FF;

            }

            .join_now p
            {

                display: table-cell; vertical-align: middle; font-size: 25px;

            }

            .join_now svg
            {
                fill: white;
                transition: 0.5s;
            }

            .join_now:hover
            {

                background-color: white;
                color: #6385FF;
                transition: 0.5s;

            }

            .join_now:hover svg
            {
                fill: #6385FF;
                transition: 0.5s;
            }

            .online_school
            {

                font-weight: 500; font-size: 69px; line-height: 1.35;

            }

            .online_school_desc
            {

                font-size: 18px;

            }

            .why_us, .testimonial
            {

                font-weight: 500; font-size: 80px;

            }

            .why_us_header
            {

                color: white; font-weight: 400; font-size: 22px; margin-top: 25px; margin-bottom: 0;

            }

            .avatar
            {

                width: 70px; height: 70px; border-radius: 100%; background-position: center; background-size: cover; background-repeat: no-repeat;

            }

            .personalized_course
            {

                font-weight: 400; font-size: 40px; line-height: 1.4; margin-top: 10px;

            }

            .personalized_course_cost
            {

                font-size: 25px;

            }

            .personalized_course_desc
            {

                font-size: 18px; padding-top: 5px;

            }

            .course_includes
            {

                font-weight: 400; font-size: 50px; line-height: 1.4; margin-top: 10px;

            }

            .course_includes_header
            {

                font-size: 27px;
                font-weight: 400

            }

            .course_includes_desc
            {

                font-size: 20px;

            }

            .course_includes_p
            {

                color: white; padding: 23px 30px; font-size: 18px; font-weight: 300;

            }

            .faq
            {

                font-weight: 400; font-size: 80px; margin-bottom: 0; padding-bottom: 0;

            }

            .faq_header
            {

                font-size: 30px; font-weight: 400; margin: 0; padding: 0; margin-top: 30px;

            }

            .faq_text
            {

                font-size: 18px; font-weight: 300; margin-top: 8px;

            }

        }

        @endif


    </style>
    {{-- BOOTSTRAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha512-ToL6UYWePxjhDQKNioSi4AyJ5KkRxY+F1+Fi7Jgh0Hp5Kk2/s8FD7zusJDdonfe5B00Qw+B8taXxF6CFLnqNCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- JQUERY --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    {{-- INTER FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    {{-- POPPINS --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- ANYBODY --}}
    <link href="https://fonts.googleapis.com/css2?family=Anybody:wght@200;300;400;500&display=swap" rel="stylesheet">
    {{-- MONTSERRAT --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    {{-- CKEDITOR --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/icons/eng.png') }}">
</head>

<body>
    <div class='d-flex flex-column justify-content-between min-vh-100 text-center'>

        @include('includes.header')
        @if(session('alert'))
        <x-alert>
            {{ session('alert') }}
        </x-alert>
        @endif
        <main class='flex-grow-1' style="overflow: hidden;">
            @yield('main.content')
        </main>

    </div>

    <script>

        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

        let locale = document.querySelector('.locale')
        let locale_current = document.querySelector('.current_locale')
        let locale_submit = document.querySelector('.locale_submit')
        let locale_options = locale.children

        for (let i = 0; i < locale_options.length; i++) {
            if (locale_options[i].value == locale_current.value) {
                locale_options[i].setAttribute('selected', '')
            }
        }

        locale.addEventListener('change', function() {
            locale_submit.click()
        })

        let dark_mode_input = document.querySelector('#dark_mode_input')
        let dark_mode_label = document.querySelector('.dark_mode_label')
        let dark_mode_submit = document.querySelector('.dark_mode_submit')

        if (dark_mode_input.checked) {
            document.body.setAttribute('data-bs-theme', 'dark')
        } else {
            document.body.removeAttribute('data-bs-theme')
        }

        dark_mode_label.addEventListener('click', dark_mode_check)

        function dark_mode_check() {
            if (!dark_mode_input.checked) {
                document.body.style.transition = "1s"
                document.body.setAttribute('data-bs-theme', 'dark')
                setTimeout(() => {
                    dark_mode_submit.click()
                }, 1000);
            } else {
                document.body.style.transition = "1s"
                document.body.removeAttribute('data-bs-theme')
                setTimeout(() => {
                    dark_mode_submit.click()
                }, 1000);
            }
        }
    </script>
</body>

</html>
