<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Order Invoice</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@400;500;600;700&display=swap");


        /*RESET*/
        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        thead {
            font-weight: 600;
        }

        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        img {
            max-width: 100%;
        }

        *:focus,
        select:focus,
        .custom-select:focus,
        button:focus,
        textarea:focus,
        textarea.form-control:focus,
        input.form-control:focus,
        input[type=text]:focus,
        input[type=password]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        [type=text].form-control:focus,
        [type=password].form-control:focus,
        [type=email].form-control:focus,
        [type=tel].form-control:focus,
        [contenteditable].form-control:focus {
            outline: none !important;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        input:focus::-moz-placeholder {
            opacity: 0;
            -webkit-transition: .4s;
            transition: .4s;
        }

        a {
            color: #3BB77E;
        }

        a:hover {
            color: #FDC040;
        }

        li.hr span {
            width: 100%;
            height: 1px;
            background-color: #e4e4e4;
            margin: 20px 0;
            display: block;
        }

        /*--- Common Classes---------------------*/
        ::-moz-selection {
            background: #3BB77E;
            /* WebKit/Blink Browsers */
            color: #fff;
        }

        ::selection {
            background: #3BB77E;
            /* WebKit/Blink Browsers */
            color: #fff;
        }

        ::-moz-selection {
            background: #3BB77E;
            /* Gecko Browsers */
            color: #fff;
        }

        ::-webkit-input-placeholder {
            color: #838383;
        }

        :-ms-input-placeholder {
            color: #838383;
        }

        ::-ms-input-placeholder {
            color: #838383;
        }

        ::placeholder {
            color: #838383;
        }

        .fix {
            overflow: hidden;
        }

        .hidden {
            display: none;
        }

        .clear {
            clear: both;
        }

        .section {
            float: left;
            width: 100%;
        }

        .f-right {
            float: right;
        }

        .capitalize {
            text-transform: capitalize;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .bg-img {
            background-position: center center;
            background-size: cover;
        }

        .position-relative {
            position: relative;
        }

        .height-100vh {
            height: 100vh !important;
        }

        *:focus,
        select:focus,
        .custom-select:focus,
        button:focus,
        textarea:focus,
        textarea.form-control:focus,
        input.form-control:focus,
        input[type=text]:focus,
        input[type=password]:focus,
        input[type=email]:focus,
        input[type=number]:focus,
        [type=text].form-control:focus,
        [type=password].form-control:focus,
        [type=email].form-control:focus,
        [type=tel].form-control:focus,
        [contenteditable].form-control:focus {
            outline: none !important;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .bg-grey-9 {
            background-color: #f4f5f9;
        }

        .border-radius {
            border-radius: 4px;
        }

        .border-radius-5 {
            border-radius: 5px;
        }

        .border-radius-10 {
            border-radius: 10px;
        }

        .border-radius-15 {
            border-radius: 15px;
        }

        .border-radius-20 {
            border-radius: 20px;
        }

        .img-hover-scale img {
            -webkit-transition: -webkit-transform .5s;
            transition: -webkit-transform .5s;
            transition: transform .5s;
            transition: transform .5s, -webkit-transform .5s;
            transition: transform .5s, -webkit-transform .5s;
        }

        .img-hover-scale:hover img {
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
            -webkit-transition: -webkit-transform .5s;
            transition: -webkit-transform .5s;
            transition: transform .5s;
            transition: transform .5s, -webkit-transform .5s;
            transition: transform .5s, -webkit-transform .5s;
        }

        .hover-up {
            -webkit-transition: all 0.25s cubic-bezier(0.02, 0.01, 0.47, 1);
            transition: all 0.25s cubic-bezier(0.02, 0.01, 0.47, 1);
        }

        .hover-up:hover {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
            -webkit-transition: all 0.25s cubic-bezier(0.02, 0.01, 0.47, 1);
            transition: all 0.25s cubic-bezier(0.02, 0.01, 0.47, 1);
        }

        .text-brand {
            color: #3BB77E !important;
        }

        .text-brand-2 {
            color: #FDC040 !important;
        }

        .text-primary {
            color: #5a97fa !important;
        }

        .text-warning {
            color: #ff9900 !important;
        }

        .text-danger {
            color: #FD6E6E !important;
        }

        .text-success {
            color: #81B13D !important;
        }

        .text-info {
            color: #2cc1d8 !important;
        }

        .text-grey-4 {
            color: #adadad !important;
        }

        .text-muted {
            color: #B6B6B6 !important;
        }

        .text-7 {
            color: #d77f7a !important;
        }

        .text-8 {
            color: #63a2c1 !important;
        }

        .text-white {
            color: #fff !important;
        }

        .text-grey-5,
        .text-grey-5 a,
        .text-hover-grey-5:hover {
            color: #a2a2a2 !important;
        }

        .bg-brand {
            background-color: #3BB77E !important;
        }

        .bg-primary {
            background-color: #5a97fa !important;
        }

        .bg-warning {
            background-color: #ff9900 !important;
        }

        .bg-danger {
            background-color: #FD6E6E !important;
        }

        .bg-success {
            background-color: #81B13D !important;
        }

        .bg-info {
            background-color: #2cc1d8 !important;
        }

        .bg-grey-4 {
            background-color: #adadad !important;
        }

        .bg-1 {
            background-color: #fddde4 !important;
        }

        .bg-2 {
            background-color: #cdebbc !important;
        }

        .bg-3 {
            background-color: #d1e8f2 !important;
        }

        .bg-4 {
            background-color: #cdd4f8 !important;
        }

        .bg-5 {
            background-color: #f6dbf6 !important;
        }

        .bg-6 {
            background-color: #fff2e5 !important;
        }

        .bg-7 {
            background-color: #d77f7a !important;
        }

        .bg-8 {
            background-color: #63a2c1 !important;
        }

        .bg-9 {
            background-color: #F2FCE4 !important;
        }

        .bg-10 {
            background-color: #FFFCEB !important;
        }

        .bg-11 {
            background-color: #ECFFEC !important;
        }

        .bg-12 {
            background-color: #FEEFEA !important;
        }

        .bg-13 {
            background-color: #FFF3EB !important;
        }

        .bg-14 {
            background-color: #FFF3FF !important;
        }

        .bg-15 {
            background-color: #F2FCE4 !important;
        }

        .bg-grey-9 {
            background-color: #f4f5f9 !important;
        }

        .font-xs {
            font-size: 13px;
        }

        .div-center {
            position: absolute;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
        }

        .bg-grey-1 {
            background: #fafbfc;
        }

        .box-shadow-none {
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

        .flex-horizontal-center {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -webkit-box-align: center;
            align-items: center;
        }

        .w-36px {
            max-width: 36px;
        }

        .border {
            border: 1px solid #ececec !important;
        }

        .box-shadow-outer-6 {
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
        }

        .box-shadow-outer-6:hover {
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.05);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.05);
        }

        .box-shadow-outer-7 {
            -webkit-box-shadow: 0 0 11px 0 rgba(78, 42, 222, 0.03), 0 8px 16px 0 rgba(78, 42, 222, 0.08);
            box-shadow: 0 0 11px 0 rgba(78, 42, 222, 0.03), 0 8px 16px 0 rgba(78, 42, 222, 0.08);
        }

        .box-shadow-outer-7:hover {
            -webkit-box-shadow: 0 0 14px 0 rgba(78, 42, 222, 0.03), 0 8px 18px 0 rgba(78, 42, 222, 0.09);
            box-shadow: 0 0 14px 0 rgba(78, 42, 222, 0.03), 0 8px 18px 0 rgba(78, 42, 222, 0.09);
        }

        .box-shadow-outer-3,
        .box-hover-shadow-outer-3:hover {
            -webkit-box-shadow: 0 5px 16px 0 rgba(118, 126, 173, 0.09);
            box-shadow: 0 5px 16px 0 rgba(118, 126, 173, 0.09);
        }

        /*****************************
*********  BORDER  *****
******************************/
        .border-1 {
            border-width: 1px !important;
        }

        .border-2 {
            border-width: 2px !important;
        }

        .border-3 {
            border-width: 3px !important;
        }

        .border-dotted {
            border-style: dotted !important;
        }

        .border-solid {
            border-style: solid !important;
        }

        .border-double {
            border-style: double !important;
        }

        .border-dashed {
            border-style: dashed !important;
        }

        .border-brand {
            border-color: #3BB77E !important;
        }

        .border-muted {
            border-color: #f7f8f9;
        }

        .section-border {
            border-top: 1px solid #e6e9ec;
            border-bottom: 1px solid #e6e9ec;
        }

        .border-color-1 {
            border-color: #e0dede;
        }

        a,
        button,
        img,
        input,
        span,
        h4 {
            -webkit-transition: all .3s ease 0s;
            transition: all .3s ease 0s;
        }

        @-webkit-keyframes slideleft {
            10% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
                right: 0;
            }

            50% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }

            90% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
                right: 100%;
            }
        }

        @keyframes slideleft {
            10% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
                right: 0;
            }

            50% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }

            90% {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
                right: 100%;
            }
        }

        [data-loader='spinner'] {
            width: 35px;
            height: 35px;
            display: inline-block;
            -webkit-animation: spinner 1.2s infinite ease-in-out;
            animation: spinner 1.2s infinite ease-in-out;
            background: url(../imgs/favicon.svg);
            -webkit-box-shadow: 0 0 10px #fff;
            box-shadow: 0 0 10px #fff;
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: perspective(120px) rotateX(0) rotateY(0);
                transform: perspective(120px) rotateX(0) rotateY(0);
            }

            50% {
                -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(0);
                transform: perspective(120px) rotateX(-180deg) rotateY(0);
            }

            100% {
                -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-180deg);
                transform: perspective(120px) rotateX(-180deg) rotateY(-180deg);
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: perspective(120px) rotateX(0) rotateY(0);
                transform: perspective(120px) rotateX(0) rotateY(0);
            }

            50% {
                -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(0);
                transform: perspective(120px) rotateX(-180deg) rotateY(0);
            }

            100% {
                -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-180deg);
                transform: perspective(120px) rotateX(-180deg) rotateY(-180deg);
            }
        }

        @-webkit-keyframes shadow-pulse {
            0% {
                -webkit-box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.8);
                box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.8);
            }

            100% {
                -webkit-box-shadow: 0 0 0 5px rgba(0, 0, 0, 0);
                box-shadow: 0 0 0 5px rgba(0, 0, 0, 0);
            }
        }

        @keyframes shadow-pulse {
            0% {
                -webkit-box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.8);
                box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.8);
            }

            100% {
                -webkit-box-shadow: 0 0 0 5px rgba(0, 0, 0, 0);
                box-shadow: 0 0 0 5px rgba(0, 0, 0, 0);
            }
        }

        @-webkit-keyframes shadow-pulse-big {
            0% {
                -webkit-box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.1);
                box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.1);
            }

            100% {
                -webkit-box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
                box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
            }
        }

        @keyframes shadow-pulse-big {
            0% {
                -webkit-box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.1);
                box-shadow: 0 0 0 0px rgba(239, 63, 72, 0.1);
            }

            100% {
                -webkit-box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
                box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
            }
        }

        @-webkit-keyframes jump {
            0% {
                -webkit-transform: translate3d(0, 20%, 0);
                transform: translate3d(0, 20%, 0);
            }

            100% {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }

        @keyframes jump {
            0% {
                -webkit-transform: translate3d(0, 20%, 0);
                transform: translate3d(0, 20%, 0);
            }

            100% {
                -webkit-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
            }
        }

        .jump {
            -webkit-transform-origin: 0;
            transform-origin: 0;
            -webkit-animation: jump .5s linear alternate infinite;
            animation: jump .5s linear alternate infinite;
        }

        /*TYPOGRAPHY*/
        body {
            color: #7E7E7E;
            font-family: "Lato", sans-serif;
            font-size: 14px;
            line-height: 24px;
            font-style: normal;
            font-weight: 400;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .font-heading,
        .display-1,
        .display-2,
        .heading-sm-1 {
            font-family: "Quicksand", sans-serif;
            color: #253D4E;
            font-weight: 700;
            line-height: 1.2;
        }

        h1 {
            font-size: 48px;
        }

        h2 {
            font-size: 40px;
        }

        h3 {
            font-size: 32px;
        }

        h4 {
            font-size: 24px;
        }

        h5 {
            font-size: 20px;
        }

        h6 {
            font-size: 16px;
        }

        .display-1 {
            font-size: 96px;
            line-height: 1;
        }

        .display-2 {
            font-size: 72px;
            line-height: 1;
        }

        .heading-sm-1 {
            font-size: 14px;
        }

        p {
            font-size: 1rem;
            font-weight: 400;
            line-height: 24px;
            margin-bottom: 5px;
            color: #7E7E7E;
        }

        .text-heading {
            color: #253D4E;
        }

        p:last-child {
            margin-bottom: 0;
        }

        .font-weight-bold {
            font-weight: 700;
        }

        a,
        button {
            text-decoration: none;
            cursor: pointer;
        }

        b {
            font-weight: 500;
        }

        strong,
        .fw-600 {
            font-weight: 600;
        }

        .fw-900 {
            font-weight: 900;
        }

        .fw-300 {
            font-weight: 300;
        }

        .section-title {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: end;
            margin-bottom: 44px;
            position: relative;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .section-title .title {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row;
            flex-flow: row;
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end;
        }

        .section-title h3 {
            font-weight: 700;
            font-size: 32px;
            margin-right: 30px;
        }

        .section-title a.show-all {
            font-size: 16px;
            color: #7E7E7E;
        }

        .section-title a.show-all:hover {
            color: #3BB77E;
        }

        .section-title a.show-all i {
            font-size: 12px;
            margin-left: 5px;
        }

        .section-title.style-1 {
            position: relative;
            border-bottom: 1px solid #ececec;
            padding-bottom: 20px;
            font-size: 24px;
        }

        .section-title.style-1::after {
            content: "";
            width: 80px;
            height: 2px;
            position: absolute;
            bottom: 0;
            left: 0;
            background-color: #BCE3C9;
        }

        .section-title span {
            color: #3BB77E;
        }

        h5.widget-title {
            font-size: 18px;
            font-weight: 600;
        }

        .title.style-3 {
            background-image: url(../imgs/theme/wave.png);
            background-position: center bottom;
            background-repeat: no-repeat;
            padding-bottom: 25px;
        }

        .text-body {
            color: #7E7E7E !important;
        }

        .font-xxs {
            font-size: 12px;
        }

        .font-xs {
            font-size: 13px;
        }

        .font-sm {
            font-size: 14px;
        }

        .font-md {
            font-size: 16px;
        }

        .font-lg {
            font-size: 17px;
        }

        .font-xl {
            font-size: 19px;
        }

        .font-xxl {
            font-size: 58px;
        }

        .text-hot {
            color: #f74b81;
        }

        .text-new {
            color: #55bb90;
        }

        .text-sale {
            color: #67bcee;
        }

        .text-best {
            color: #f59758;
        }

        .text-style-1 {
            position: relative;
        }

        .text-style-1::after {
            content: "";
            background-color: #ffdabf;
            height: 20%;
            width: 110%;
            display: block;
            position: absolute;
            bottom: 20%;
            left: -5%;
            z-index: -1;
            opacity: 0.8;
            -webkit-transition: -webkit-transform .5s;
            transition: -webkit-transform .5s;
            transition: transform .5s;
            transition: transform .5s, -webkit-transform .5s;
            transition: transform .5s, -webkit-transform .5s;
        }

        .text-style-1:hover::after {
            height: 30%;
            -webkit-transition: -webkit-transform .5s;
            transition: -webkit-transform .5s;
            transition: transform .5s;
            transition: transform .5s, -webkit-transform .5s;
            transition: transform .5s, -webkit-transform .5s;
        }

        .fw-700 {
            font-weight: 700;
        }

        /*COMPONENTS -> BUTTONS*/
        .btn-default {
            color: #fff;
            background-color: #3BB77E;
            border-radius: 50px;
            padding: 13px 28px;
            font-family: "Quicksand", sans-serif;
        }

        .btn-default i {
            font-weight: 400;
            font-size: 12px;
            margin-left: 10px;
            -webkit-transition-duration: 0.2s;
            transition-duration: 0.2s;
        }

        .btn-default:hover i {
            margin-left: 15px;
            -webkit-transition-duration: 0.2s;
            transition-duration: 0.2s;
        }

        .btn-lg {
            padding: 13px 28px;
            font-size: 16px;
        }

        .btn-sm {
            padding: 8px 18px !important;
            font-size: 12px;
        }

        .btn-md {
            padding: 10px 24px !important;
            font-size: 12px;
        }

        .btn-outline {
            background-color: transparent !important;
        }

        .btn-check:focus+.btn,
        .btn:focus {
            outline: 0;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

        .btn {
            font-family: "Quicksand", sans-serif;
        }

        .btn:hover {
            color: #fff;
        }

        .btn-shadow-brand {
            -webkit-box-shadow: 0 2px 6px 0 rgba(88, 151, 251, 0.16);
            box-shadow: 0 2px 6px 0 rgba(88, 151, 251, 0.16);
            border: 1px solid #f7f8f9;
        }

        .btn-shadow-brand:hover {
            border: 1px solid #3BB77E;
        }

        .btn-brand {
            background-color: #3BB77E;
            border-color: #3BB77E;
        }

        .btn-heading,
        button.btn-heading[type="submit"] {
            background-color: #253D4E;
            border-color: #253D4E;
            font-weight: 700;
            border: 0;
        }

        button.submit,
        button[type='submit'] {
            font-size: 16px;
            font-weight: 500;
            padding: 15px 40px;
            color: #ffffff;
            border: none;
            background-color: #3BB77E;
            border: 1px solid #29A56C;
            border-radius: 10px;
        }

        button.submit:hover,
        button[type='submit']:hover {
            background-color: #29A56C !important;
        }

        .btn-brand:hover {
            background-color: #29A56C !important;
        }

        .btn-login {
            font-weight: 13px;
        }

        .btn-login .btn {
            min-width: unset;
        }

        .btn-login li {
            margin: 0px 5px 0;
            display: inline-block;
        }

        .btn-login li a {
            border-radius: 5px;
            padding: 15px 25px;
            color: #fff;
            display: block;
            line-height: 1;
            text-transform: none;
            letter-spacing: 0;
            font-size: 14px;
        }

        .btn,
        .button {
            display: inline-block;
            border: 1px solid transparent;
            font-size: 14px;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 4px;
            color: #fff;
            border: 1px solid transparent;
            background-color: #3BB77E;
            cursor: pointer;
            -webkit-transition: all 300ms linear 0s;
            transition: all 300ms linear 0s;
            letter-spacing: 0.5px;
        }

        .btn:hover,
        .button:hover {
            background-color: #FDC040;
        }

        .btn.btn-sm,
        .button.btn-sm {
            padding: 8px 18px;
            font-size: 12px;
            text-transform: none;
            line-height: 1.8;
        }

        .btn.btn-xs,
        .button.btn-xs {
            padding: 7px 8px 7px 12px;
            font-size: 12px;
            text-transform: none;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            line-height: 1.3;
        }

        .btn.btn-xs i,
        .button.btn-xs i {
            font-size: 14px !important;
            line-height: 0;
        }

        .btn.btn-rounded,
        .button.btn-rounded {
            border-radius: 50px;
        }

        .btn.btn-secondary,
        .button.btn-secondary {
            background-color: #3e5379;
            border-color: #3e5379;
        }

        .btn.btn-facebook,
        .button.btn-facebook {
            background: #3b5998;
            border-color: #3b5998;
        }

        .btn.btn-google,
        .button.btn-google {
            background: #d85040;
            border-color: #d85040;
        }

        .btn.btn-brush,
        .button.btn-brush {
            background-color: transparent;
            color: #3BB77E;
            border: 0;
            padding: 14px 80px 14px 65px;
            background-repeat: no-repeat;
            font-family: "Quicksand", sans-serif;
        }

        .btn.btn-brush i,
        .button.btn-brush i {
            margin: 3px 0 0 5px;
        }

        .btn.btn-brush.btn-brush-1,
        .button.btn-brush.btn-brush-1 {
            background-image: url(../imgs/theme/btn-brush-bg-1.png);
        }

        .btn.btn-brush.btn-brush-2,
        .button.btn-brush.btn-brush-2 {
            background-image: url(../imgs/theme/btn-brush-bg-2.png);
        }

        .btn.btn-brush.btn-brush-3,
        .button.btn-brush.btn-brush-3 {
            background-image: url(../imgs/theme/btn-brush-bg-3.png);
        }

        .comments-area .btn-reply {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            display: flex !important;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .comments-area .btn-reply i {
            margin-left: 5px;
            font-size: 12px;
        }

        .tags .btn,
        .tags .button {
            border-radius: 4px;
            float: left;
        }

        /*COMPONENTS -> FORM*/
        input:-moz-placeholder,
        textarea:-moz-placeholder {
            opacity: 1;
        }

        input::-webkit-input-placeholder,
        textarea::-webkit-input-placeholder {
            opacity: 1;
        }

        input::-moz-placeholder,
        textarea::-moz-placeholder {
            opacity: 1;
        }

        input:-ms-input-placeholder,
        textarea:-ms-input-placeholder {
            opacity: 1;
        }

        input {
            border: 1px solid #ececec;
            border-radius: 10px;
            height: 64px;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding-left: 20px;
            font-size: 16px;
            width: 100%;
        }

        input:focus {
            background: transparent;
            border: 1px solid #BCE3C9;
        }

        input.square {
            border-radius: 0;
        }

        input.coupon {
            height: 47px;
        }

        select {
            width: 100%;
            background: transparent;
            border: 0px solid #ececec;
            -webkit-box-shadow: none;
            box-shadow: none;
            font-size: 16px;
            color: #7E7E7E;
        }

        option {
            background: #fff;
            border: 0px solid #626262;
            padding-left: 10px;
            font-size: 16px;
        }

        textarea {
            border: 1px solid #ececec;
            border-radius: 10px;
            height: 50px;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding: 10px 10px 10px 20px;
            font-size: 16px;
            width: 100%;
            min-height: 200px;
        }

        textarea:focus {
            background: transparent;
            border: 1px solid #BCE3C9;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border-bottom: 3px solid #414648;
            border-radius: 0;
            border-right: 0;
            height: 50px;
            padding-left: 0;
            border-top: 0;
            border-left: 0;
            font-weight: bold;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 50px;
            font-size: 14px;
            padding: 0;
            font-family: "Quicksand", sans-serif;
            color: #253D4E;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 26px;
            position: absolute;
            top: 12px;
            right: 15px;
            width: 20px;
        }

        .custom_select {
            position: relative;
            width: 100%;
        }

        .custom_select .select2-container {
            max-width: 155px;
        }

        .custom_select .nice-select {
            width: 100%;
            margin-bottom: 1rem;
        }

        .custom_select .select2-container--default .select2-selection--single {
            border: 1px solid #ececec;
            border-radius: 4px;
            height: 50px;
            line-height: 50px;
            padding-left: 20px;
            font-size: 14px;
        }

        .custom_select .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 50px;
            font-size: 14px;
            padding-left: 0;
        }

        .custom_select .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 9px;
            right: 14px;
        }

        .select2-dropdown {
            border: 1px solid #ececec;
            border-radius: 0 0 4px 4px;
            padding: 15px;
            min-width: 220px;
        }

        .select2-dropdown .select2-search--dropdown {
            padding: 0;
        }

        .select2-dropdown .select2-search--dropdown .select2-search__field {
            border: 1px solid #BCE3C9;
            margin-bottom: 15px;
            border-radius: 5px;
            height: 40px;
            padding-left: 20px;
        }

        .select2-container--open .select2-dropdown--below {
            border-top: none;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .select2-results__options::-webkit-scrollbar {
            width: 16px;
            background-clip: padding-box;
        }

        .select2-results__options::-webkit-scrollbar-track {
            background-color: #F4F4F4;
            height: 8px;
            background-clip: padding-box;
            border-right: 10px solid rgba(0, 0, 0, 0);
            border-top: 10px solid rgba(0, 0, 0, 0);
            border-bottom: 10px solid rgba(0, 0, 0, 0);
        }

        .select2-results__options::-webkit-scrollbar-thumb {
            background-clip: padding-box;
            background-color: #d1d1d1;
            border-right: 10px solid rgba(0, 0, 0, 0);
            border-top: 10px solid rgba(0, 0, 0, 0);
            border-bottom: 10px solid rgba(0, 0, 0, 0);
        }

        .select2-results__options::-webkit-scrollbar-button {
            display: none;
        }

        .select2-container--default .select2-results>.select2-results__options {
            max-height: 200px;
            overflow-y: auto;
            scrollbar-width: thin;
        }

        .select2-container--default .select2-results__option[aria-selected="true"] {
            background-color: #ececec;
            color: unset;
        }

        .select2-container {
            max-width: 135px;
        }

        /*contact form*/
        .contact-from-area .contact-form-style button {
            font-size: 17px;
            font-weight: 500;
            padding: 20px 40px;
            color: #ffffff;
            border: none;
            background-color: #253D4E;
            border-radius: 10px;
            font-family: "Quicksand", sans-serif;
        }

        .contact-from-area .contact-form-style button:hover {
            background-color: #3BB77E !important;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group input {
            background: #fff;
            border: 1px solid #ececec;
            height: 64px;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding-left: 20px;
            font-size: 16px;
            width: 100%;
        }

        .form-group input:focus {
            background: transparent;
            border-color: #BCE3C9;
        }

        label {
            margin-bottom: 5px;
        }

        .security-code {
            display: inline-block;
            border-radius: 10px;
            height: 64px;
            line-height: 64px;
            padding: 0 40px;
            font-size: 24px;
            font-weight: bold;
            background: #BCE3C9;
        }

        .security-code b {
            font-size: 24px;
            font-weight: bold;
        }

        .custome-radio .form-check-label,
        .custome-checkbox .form-check-label {
            position: relative;
            cursor: pointer;
        }

        .custome-checkbox .form-check-label {
            position: relative;
            cursor: pointer;
            color: #687188;
            padding: 0;
            vertical-align: middle;
        }

        .custome-checkbox .form-check-label::before {
            content: "";
            border: 2px solid #ced4da;
            height: 17px;
            width: 17px;
            margin: 0px 8px 0 0;
            display: inline-block;
            vertical-align: middle;
            border-radius: 2px;
        }

        .custome-checkbox .form-check-label span {
            vertical-align: middle;
        }

        .custome-checkbox input[type="checkbox"]:checked+.form-check-label::after {
            opacity: 1;
        }

        .custome-checkbox input[type="checkbox"]+.form-check-label::after {
            content: "";
            width: 11px;
            position: absolute;
            top: 50%;
            left: 3px;
            opacity: 0;
            height: 6px;
            border-left: 2px solid #fff;
            border-bottom: 2px solid #fff;
            -webkit-transform: translateY(-65%) rotate(-45deg);
            transform: translateY(-65%) rotate(-45deg);
        }

        .custome-radio .form-check-input,
        .custome-checkbox .form-check-input {
            display: none;
        }

        .login_footer {
            margin-bottom: 20px;
            margin-top: 5px;
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -webkit-box-align: center;
            align-items: center;
            -ms-flex-pack: justify;
            -webkit-box-pack: justify;
            justify-content: space-between;
            width: 100%;
        }

        .custome-checkbox input[type="checkbox"]:checked+.form-check-label::before {
            background-color: #3BB77E;
            border-color: #3BB77E;
        }

        .custome-checkbox input[type="checkbox"]:checked+.form-check-label::after {
            opacity: 1;
        }

        .divider-text-center {
            text-align: center;
            position: relative;
        }

        .divider-text-center::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            right: 0;
            border-top: 1px solid #ddd;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .divider-text-center span {
            background-color: #fff;
            padding: 0 15px;
            position: relative;
            text-transform: uppercase;
        }

        /*comment*/
        .comments-area {
            background: transparent;
            border-top: 1px solid #ececec;
            padding: 45px 0;
            margin-top: 50px;
        }

        .comments-area h5 {
            font-size: 16px;
            margin-bottom: 0px;
        }

        .comments-area .comment-list {
            padding-bottom: 48px;
        }

        .comments-area .comment-list:last-child {
            padding-bottom: 0px;
        }

        .comments-area .comment-list.left-padding {
            padding-left: 25px;
        }

        .comments-area .comment-list .single-comment {
            margin: 0 0 15px 0;
            border: 1px solid #f2f2f2;
            border-radius: 15px;
            padding: 20px;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .comments-area .comment-list .single-comment:not(:last-child) {
            border-bottom: 1px solid #ececec;
        }

        .comments-area .comment-list .single-comment img {
            min-width: 80px;
            max-width: 80px;
        }

        .comments-area .comment-list .single-comment .reply {
            opacity: 0;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .comments-area .comment-list .single-comment:hover {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .comments-area .comment-list .single-comment:hover .reply {
            opacity: 1;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .comments-area p {
            font-size: 16px !important;
        }

        .comments-area .thumb {
            margin-right: 20px;
        }

        .comments-area .thumb img {
            width: 70px;
            border-radius: 50%;
        }

        .comments-area .date {
            font-size: 14px;
            color: #999999;
            margin-bottom: 0;
            margin-left: 20px;
        }

        .comments-area .comment {
            margin-bottom: 10px;
            color: #777777;
            font-size: 15px;
        }

        .comments-area .btn-reply {
            background-color: transparent;
            color: #888888;
            padding: 5px 18px;
            font-size: 14px;
            display: block;
            font-weight: 400;
        }

        .comments-area.style-2 {
            border: 0;
            margin-top: 0;
            padding: 25px 0;
        }

        .comments-area h4 {
            margin-bottom: 35px;
            color: #2a2a2a;
            font-size: 18px;
        }

        .comment-form .email {
            padding-right: 0px;
        }

        .form-control {
            border: 1px solid #f0e9ff;
            border-radius: 10px;
            height: 48px;
            padding-left: 18px;
            font-size: 16px;
            background: transparent;
        }

        .comment-form {
            padding-top: 45px;
            margin-bottom: 20px;
        }

        .comment-form .form-group {
            margin-bottom: 20px;
        }

        .comment-form textarea {
            min-height: 200px;
            padding-top: 15px;
        }

        .comment-form textarea:focus {
            background: transparent;
            outline: none !important;
            -webkit-box-shadow: none;
            box-shadow: none;
            border-color: #BCE3C9;
        }

        .form-control:focus {
            outline: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .form-control::-webkit-input-placeholder {
            font-weight: 300;
            color: #999999;
            color: #777777;
        }

        .form-control:-ms-input-placeholder {
            font-weight: 300;
            color: #999999;
            color: #777777;
        }

        .form-control::-ms-input-placeholder {
            font-weight: 300;
            color: #999999;
            color: #777777;
        }

        .form-control::placeholder {
            font-weight: 300;
            color: #999999;
            color: #777777;
        }

        .nice-select .list {
            width: 100%;
        }

        .button-contactForm {
            background: #3BB77E;
            color: #fff;
            border-color: #3BB77E;
            padding: 12px 25px;
        }

        .search-form form {
            position: relative;
        }

        .search-form form input {
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .search-form form button {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            border: none;
            font-size: 20px;
            height: 100%;
            padding: 0 24px;
            background-color: transparent;
            color: #242424;
        }

        .search-form form button:hover {
            color: #fff;
        }

        /*COMPONENTS -> SLIDER*/
        .single-animation-wrap.slick-active .slider-animated-1 h1 {
            -webkit-animation-delay: 1.4s;
            animation-delay: 1.4s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 h2 {
            -webkit-animation-delay: 1.2s;
            animation-delay: 1.2s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 h3 {
            -webkit-animation-delay: 1.0s;
            animation-delay: 1.0s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 h4 {
            -webkit-animation-delay: 1.0s;
            animation-delay: 1.0s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 span {
            -webkit-animation-delay: .5s;
            animation-delay: .5s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 p {
            -webkit-animation-delay: 1.7s;
            animation-delay: 1.7s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 a.btn {
            -webkit-animation-delay: 2.0s;
            animation-delay: 2.0s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1.slider-product-price {
            -webkit-animation-delay: 1.2s;
            animation-delay: 1.2s;
            -webkit-animation-name: flipInY;
            animation-name: flipInY;
        }

        .single-animation-wrap.slick-active .slider-animated-1 .single-slider-img img {
            -webkit-animation-delay: 1.5s;
            animation-delay: 1.5s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .single-animation-wrap.slick-active .slider-animated-1 .slider-product-offer-wrap,
        .single-animation-wrap.slick-active .slider-animated-1 .slider-product-offer-wrap-2 {
            -webkit-animation-delay: 1.0s;
            animation-delay: 1.0s;
            -webkit-animation-name: fadeInUp;
            animation-name: fadeInUp;
        }

        .hero-slider-1 {
            position: relative;
        }

        .hero-slider-1 .single-hero-slider {
            height: 538px;
            border-radius: 30px;
            background-size: cover;
            background-position: center center;
        }

        .hero-slider-1 .single-hero-slider.rectangle {
            border-radius: 0;
        }

        .hero-slider-1 .single-hero-slider.rectangle .slider-content {
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%) translateX(-50%);
            text-align: center;
        }

        .hero-slider-1 .single-hero-slider.rectangle .slider-content form {
            margin: 0 auto;
        }

        .hero-slider-1 img {
            max-height: 538px;
            border-radius: 30px;
        }

        .hero-slider-1 .slider-content {
            position: absolute;
            top: 50%;
            left: 6%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .hero-slider-1 .slider-content p {
            font-size: 30px;
        }

        .hero-slider-1 .slider-content form {
            background-color: #fff;
            max-width: 450px;
            border-radius: 50px;
        }

        .hero-slider-1 .slider-content form input {
            border: 0;
            border-radius: 50px 0 0 50px;
            padding-left: 58px;

        }

        .hero-slider-1 .slider-content form button {
            border: 0;
            border-radius: 50px;
        }

        .hero-slider-1 .single-slider-img-1 {
            height: 538px;
            position: relative;
        }

        .hero-slider-1 .single-slider-img-1 .slider-1-1 {
            position: absolute;
            bottom: 30px;
            right: 0;
        }

        .hero-slider-1 .single-slider-img-1 .slider-1-2 {
            position: absolute;
            bottom: 20px;
            right: 0;
        }

        .hero-slider-1 .single-slider-img-1 .slider-1-3 {
            position: absolute;
            bottom: 30px;
            right: 0;
        }

        .hero-slider-1.style-5 .display-2 {
            font-size: 50px;
        }

        .hero-slider-1.style-5 .slider-content p {
            font-size: 24px;
        }

        .hero-slider-1.style-5 img {
            border-radius: 10px;
        }

        .hero-slider-1.style-5 .single-hero-slider {
            border-radius: 10px;
        }

        .dot-style-1 ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .dot-style-1 ul li {
            margin: 0 3px;
        }

        .dot-style-1 ul li button {
            width: 15px;
            height: 15px;
            border-radius: 30px;
            border: 1px solid;
            padding: 0;
            font-size: 0px;
            border-color: #253D4E;
            background: none;
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }

        .dot-style-1 ul li button:hover {
            background: #BCE3C9;
        }

        .dot-style-1 ul li.slick-active button {
            background: #3BB77E;
            border-color: #3BB77E;
        }

        .dot-style-1.dot-style-1-position-1 ul {
            position: absolute;
            left: 50%;
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            bottom: 15px;
        }

        .dot-style-1.dot-style-1-position-2 ul {
            position: absolute;
            left: 6%;
            bottom: 15px;
        }

        .dot-style-1.dot-style-1-center ul {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .dot-style-1.dot-style-1-mt1 ul {
            margin-top: 30px;
        }

        .slider-arrow {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 2;
            width: 100%;
        }

        .slider-arrow .slider-btn {
            cursor: pointer;
            background: #F2F3F4;
            width: 45px;
            height: 45px;
            position: absolute;
            display: block;
            z-index: 100;
            border-radius: 50%;
            -webkit-transition: all .2s ease-out;
            transition: all .2s ease-out;
            text-align: center;
            line-height: 45px;
            font-size: 16px;
            color: #7E7E7E;
        }

        .slider-arrow .slider-btn.slider-prev {
            left: 20px;
        }

        .slider-arrow .slider-btn.slider-prev i {
            margin-right: 2px;
        }

        .slider-arrow .slider-btn.slider-next {
            right: 20px;
        }

        .slider-arrow .slider-btn.slider-next i {
            margin-left: 2px;
        }

        .slider-arrow .slider-btn:hover {
            background-color: #3BB77E;
            color: #fff;
            border-color: #3BB77E;
        }

        .slider-arrow.slider-arrow-2 .slider-btn {
            width: 40px;
            height: 40px;
            line-height: 44px;
            font-size: 24px;
        }

        .slider-arrow.slider-arrow-2.flex-right {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            max-width: 200px;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            top: unset;
            -webkit-transform: unset;
            transform: unset;
        }

        .slider-arrow.slider-arrow-2.flex-right .slider-btn {
            position: relative;
            left: unset;
            right: unset;
        }

        .slider-arrow.slider-arrow-2.flex-right .slider-btn.slider-prev {
            margin-right: 10px;
        }

        .slider-arrow.slider-arrow-3 .slider-btn {
            width: 30px;
            height: 30px;
            line-height: 28px;
            font-size: 12px;
            margin-top: -15px;
        }

        .slider-arrow.style-3 .slider-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #dcdeed;
            line-height: 40px;
            font-size: 12px;
            margin-top: -20px;
        }

        .home-slide-cover {
            position: relative;
        }

        .home-slide-cover .slider-arrow {
            left: 0;
        }

        .home-slide-cover .hero-slider-content-2 {
            padding-left: 50px;
        }

        /*Carausel*/
        .carausel-8-columns-cover .carausel-8-columns {
            overflow: hidden;
            margin: 0 -12px;
        }

        .carausel-8-columns-cover .carausel-8-columns .card-1 {
            margin-right: 12px;
            margin-left: 12px;
        }

        .carausel-8-columns-cover .product-img {
            border: 1px solid #cce7d0;
        }

        .carausel-8-columns-cover .slider-arrow {
            top: -80px;
        }

        .carausel-8-columns-cover .slider-arrow .slider-btn.slider-next {
            right: 0;
        }

        .carausel-8-columns-cover .slider-arrow .slider-btn.slider-prev {
            right: 48px;
            left: unset;
        }

        .carausel-8-columns-cover.arrow-center .slider-arrow {
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            margin-top: -50px;
        }

        .carausel-8-columns-cover.arrow-center .slider-arrow .slider-btn.slider-next {
            right: -30px;
        }

        .carausel-8-columns-cover.arrow-center .slider-arrow .slider-btn.slider-prev {
            left: -30px;
        }

        .carausel-8-columns-cover.arrow-center .slider-arrow.slider-arrow-3 {
            margin-top: 0;
        }

        .carausel-10-columns-cover .carausel-10-columns {
            overflow: hidden;
            margin: 0 -12px;
        }

        .carausel-10-columns-cover .carausel-10-columns .card-2 {
            margin-right: 12px;
            margin-left: 12px;
        }

        .carausel-4-columns-cover .carausel-4-columns {
            overflow: hidden;
            margin: 0 -12px;
        }

        .carausel-4-columns-cover .carausel-4-columns .product-cart-wrap {
            margin-right: 12px;
            margin-left: 12px;
        }

        .carausel-4-columns-cover .carausel-4-columns-arrow {
            margin-top: -100px;
        }

        .carausel-4-columns-cover .product-cart-wrap {
            margin-bottom: 20px;
        }

        .carausel-4-columns-cover .product-cart-wrap:hover {
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .bg-grey-10 {
            background-color: #d0f3ec;
        }

        .home-slider .slider-arrow {
            opacity: 0;
            visibility: hidden;
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        .home-slider:hover .slider-arrow {
            opacity: 1;
            visibility: visible;
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        .home-slider.style-2 {
            background: url(../imgs/banner/banner-12.png) no-repeat center bottom;
            background-size: cover;
            width: 100%;
            padding: 50px 0;
        }

        .carausel-3-columns-cover {
            position: relative;
        }

        .carausel-3-columns-cover .carausel-3-columns {
            overflow: hidden;
            margin: 0 -12px;
        }

        .carausel-3-columns-cover .carausel-3-columns img {
            margin-right: 12px;
            margin-left: 12px;
        }

        .carausel-3-columns-cover #carausel-3-columns-arrows {
            position: absolute;
            top: 50%;
            margin-top: -20px;
            width: 100%;
            z-index: 3;
        }

        .carausel-3-columns-cover .slider-btn {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 40px;
            line-height: 44px;
            text-align: center;
            background: #F2F3F4;
            font-size: 27px;
            color: #3BB77E;
            position: absolute;
        }

        .carausel-3-columns-cover .slider-btn.slider-prev {
            left: -20px;
        }

        .carausel-3-columns-cover .slider-btn.slider-next {
            right: -20px;
        }

        .carausel-3-columns-cover .slider-btn:hover {
            background: #3BB77E;
            color: #fff;
        }

        /*COMPONENTS -> CARD*/
        .card-1 {
            position: relative;
            background: #F4F6FA;
            text-align: center;
            border: 1px solid #F4F6FA;
            border-radius: 10px;
            padding: 40px 30px 28px 30px;
            margin-bottom: 20px;
            min-height: 215px;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .card-1:hover {
            background: #fff;
            border: 1px solid #BCE3C9;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .card-1 figure {
            text-align: center;
            margin-bottom: 20px;
        }

        .card-1 figure img {
            border-radius: 10px;
            display: inline-block;
            max-width: 80px;
        }

        .card-1 h6 {
            margin: 0;
        }

        .card-1 h6 a {
            color: #253D4E;
        }

        .card-1:hover a {
            color: #3BB77E;
        }

        .card-2 {
            position: relative;
            background: #F4F6FA;
            text-align: center;
            border: 1px solid #F4F6FA;
            border-radius: 10px;
            padding: 20px 0px 18px 0px;
            margin-bottom: 20px;
            min-height: 180px;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .card-2:hover {
            background: #fff;
            border: 1px solid #BCE3C9;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .card-2 figure {
            text-align: center;
            margin-bottom: 10px;
        }

        .card-2 figure img {
            border-radius: 10px;
            display: inline-block;
            max-width: 80px;
        }

        .card-2 h6 {
            margin: 0;
        }

        .card-2 h6 a {
            color: #253D4E;
        }

        .card-2:hover a {
            color: #3BB77E;
        }

        .hero-card {
            width: 100%;
            position: relative;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
            border: 1px solid #eee;
        }

        .hero-card:hover {
            border: 1px solid #3BB77E;
        }

        .hero-card .hero-card-icon {
            width: 65px;
            height: 65px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 5px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .hero-card .hero-card-icon.icon-left {
            width: 135px;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
        }

        .hero-card .hero-card-icon.icon-left-2 {
            width: 265px;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
        }

        .hero-card .hero-card-icon i {
            font-size: 25px;
            color: #6143f7;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #ececec;
            border-radius: .25rem;
        }

        .card .card-header {
            padding: 1rem;
            margin-bottom: 0;
            background-color: #f7f8f9;
            border-bottom: 1px solid #ececec;
        }

        .featured-card {
            padding: 50px 30px;
            border-radius: 15px;
            border: 1px solid #ececec;
            background: #fff;
        }

        .featured-card img {
            margin-bottom: 30px;
            width: 100px;
        }

        .featured-card h4 {
            margin-bottom: 30px;
        }

        .featured-card p {
            font-size: 17px;
            margin-bottom: 30px;
        }

        .featured-card a {
            font-size: 16px;
        }

        .featured-card:hover {
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .team-card {
            position: relative;
        }

        .team-card img {
            border-radius: 15px;
            z-index: 1;
        }

        .team-card:hover .content {
            -webkit-transform: translateY(-95px);
            transform: translateY(-95px);
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .team-card .content {
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            border-radius: 15px;
            background: #fff;
            padding: 30px;
            max-width: 80%;
            position: relative;
            z-index: 2;
            -webkit-transform: translateY(-90px);
            transform: translateY(-90px);
            margin-left: auto;
            margin-right: auto;
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .team-card .content span {
            font-size: 17px;
        }

        .team-card .content .social-network a {
            display: inline-block;
            padding: 0 5px;
        }

        .team-card .content .social-network a img {
            max-width: 30px;
            min-width: 20px;
        }

        .account .card {
            border: 0;
        }

        .account .card .card-header {
            border: 0;
            background: none;
        }

        .account .card table td,
        .account .card table th {
            border: 0;
        }

        .account .card .table>thead {
            font-family: "Quicksand", sans-serif;
            font-size: 17px;
        }

        .card-login {
            padding: 50px;
            border-radius: 15px;
            border: 1px solid #ececec;
            margin-left: 30px;
        }

        .card-login .social-login {
            font-size: 20px;
            font-weight: 700;
            font-family: "Quicksand", sans-serif;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            padding: 15px 25px;
            border-radius: 10px;
            margin-bottom: 20px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }

        .card-login .social-login img {
            min-width: 28px;
            max-width: 28px;
            margin-right: 15px;
        }

        .card-login .social-login.facebook-login {
            background-color: #1877F2;
            color: #fff;
        }

        .card-login .social-login.google-login {
            background-color: #fff;
            color: #7E7E7E;
            border: 1px solid #F2F3F4;
        }

        .card-login .social-login.apple-login {
            background-color: #000000;
            color: #fff;
            margin-bottom: 0;
        }

        .card-login .social-login:hover {
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
            -webkit-transition: 0.3s;
            transition: 0.3s;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        /*COMPONENTS -> TABS*/
        .nav-tabs {
            border: 0;
            margin-bottom: 4px;
        }

        .nav-tabs .nav-link {
            background-color: #eeeeee;
            font-size: 15px;
            margin: 0 10px;
            margin-left: 10px;
            color: #444;
            border-radius: 4px;
            padding: 15px 24px;
            -webkit-transition: 0.2s;
            transition: 0.2s;
            border: 0;
            border-top-color: currentcolor;
            border-right-color: currentcolor;
            border-bottom-color: currentcolor;
            border-left-color: currentcolor;
            font-family: "Quicksand", sans-serif;
            font-weight: 600;
            line-height: 1;
        }

        .nav-tabs .nav-link.active {
            color: #3BB77E;
            background-color: #fde1bd;
        }

        .nav-tabs .nav-link:hover {
            color: #3BB77E;
            background-color: #fde1bd;
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .nav-tabs .nav-link:first-child {
            margin-left: 0 !important;
            padding-left: 0 !important;
        }

        .nav-tabs.links .nav-link {
            padding: 0 10px;
            background: none;
            font-size: 16px;
            color: #253D4E;
        }

        .nav-tabs.links .nav-link:hover,
        .nav-tabs.links .nav-link.active {
            color: #3BB77E;
        }

        .nav-tabs.no-border {
            border: none;
        }

        .nav-tabs.right .nav-item:last-child .nav-link {
            margin-right: 0;
        }

        .nav.right {
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: end;
        }

        .dashboard-menu ul {
            padding: 0;
            margin: 0;
        }

        .dashboard-menu ul li {
            position: relative;
            border-radius: 10px;
            border: 1px solid #ececec;
            border-radius: 10px;
        }

        .dashboard-menu ul li a {
            font-size: 16px;
            color: #7E7E7E;
            padding: 15px 30px;
            font-family: "Quicksand", sans-serif;
            font-weight: 700;
        }

        .dashboard-menu ul li a i {
            color: #7E7E7E;
            font-size: 19px;
            opacity: 0.6;
        }

        .dashboard-menu ul li a.active {
            color: #fff;
            background-color: #3BB77E;
            border-radius: 10px;
        }

        .dashboard-menu ul li a.active i {
            color: #fff;
        }

        .dashboard-menu ul li:not(:last-child) {
            margin-bottom: 10px;
        }

        .tab-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .tab-header .view-more {
            font-family: "Quicksand", sans-serif;
            font-size: 13px;
            font-weight: 700;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border-bottom: 2px solid #cce7d0;
            margin-bottom: 20px;
        }

        .tab-header .view-more i {
            margin-left: 5px;
            margin-top: 5px;
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        .tab-header .view-more:hover i {
            -webkit-transform: translateX(5px);
            transform: translateX(5px);
            -webkit-transition: 0.5s;
            transition: 0.5s;
        }

        /*COMPONENTS -> MISC*/
        /*Countdown*/
        .deals-countdown .countdown-section {
            position: relative;
            font-weight: 400;
            font-size: 12px;
            line-height: 1;
            padding: 20px 5px 30px 5px;
            margin-left: 7px;
            margin-right: 7px;
            background-color: #fff;
            border-radius: 4px;
            border: none;
            margin-bottom: 2rem;
        }

        .deals-countdown .countdown-section .countdown-amount {
            display: inline-block;
            color: #3BB77E;
            font-weight: 500;
            font-size: 20px;
            line-height: 1;
            margin-bottom: 15px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            font-family: "Quicksand", sans-serif;
        }

        .deals-countdown .countdown-section .countdown-period {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            bottom: 10px;
            display: block;
            color: #7E7E7E;
            width: 100%;
            padding-left: 0;
            padding-right: 0;
            overflow: hidden;
            font-size: 16px;
            text-transform: capitalize;
        }

        .img-grey-hover {
            opacity: .5;
            -webkit-filter: grayscale(1);
            filter: grayscale(1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .img-grey-hover:hover {
            -webkit-filter: none;
            filter: none;
            opacity: 1;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .brand-logo img {
            width: auto;
            display: inline-block;
            padding: 10px 0;
        }

        /*Heading tab*/
        .heading-tab {
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            text-align: left;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        /*page loading*/
        .preloader {
            background-color: #fff;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 999999;
            -webkit-transition: .6s;
            transition: .6s;
            margin: 0 auto;
        }

        .preloader img.jump {
            max-height: 100px;
        }

        /*custom amine*/
        .loader,
        .bar {
            width: 100px;
            height: 20px;
        }

        .bar {
            position: absolute;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .bar::before,
        .bar::after {
            content: "";
            position: absolute;
            display: block;
            width: 10px;
            height: 10px;
            background: #3BB77E;
            opacity: 0;
            border-radius: 10px;
            -webkit-animation: slideleft 3s ease-in-out infinite;
            animation: slideleft 3s ease-in-out infinite;
        }

        .bar1::before {
            -webkit-animation-delay: 0.00s;
            animation-delay: 0.00s;
        }

        .bar1::after {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        .bar2::before {
            -webkit-animation-delay: 0.60s;
            animation-delay: 0.60s;
        }

        .bar2::after {
            -webkit-animation-delay: 0.90s;
            animation-delay: 0.90s;
        }

        .bar3::before {
            -webkit-animation-delay: 1.20s;
            animation-delay: 1.20s;
        }

        .bar3::after {
            -webkit-animation-delay: 1.50s;
            animation-delay: 1.50s;
        }

        /*page header*/
        .page-header .page-title {
            font-weight: 900;
            font-size: 4rem;
        }

        .page-header.breadcrumb-wrap {
            padding: 20px;
            background-color: #fff;
            border-bottom: 1px solid #ececec;
            font-family: "Quicksand", sans-serif;
        }

        .breadcrumb {
            display: inline-block;
            padding: 0;
            text-transform: capitalize;
            color: #7E7E7E;
            font-size: 14px;
            font-weight: 600;
            background: none;
            margin: 0;
            border-radius: 0;
        }

        .breadcrumb span {
            position: relative;
            text-align: center;
            padding: 0 10px;
        }

        .breadcrumb span::before {
            content: "\f111";
            font-family: "uicons-regular-straight" !important;
            display: inline-block;
            font-size: 9px;
        }

        /*****************************
*********  SOCIAL NETWORKS  **********
******************************/
        .text-center.social-icons ul {
            display: inline-block;
        }

        .social-icons li {
            float: left;
            list-style: none;
        }

        .social-icons li a {
            float: left;
            font-size: 16px;
            text-align: center;
            margin: 0 4px 4px 0;
            border-radius: 4px;
            border: 0;
            background: 0 0;
            color: #333;
            overflow: hidden;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }

        .dark .social-icons li a {
            color: #fff;
        }

        .social-icons.social-icons-colored a,
        .social-icons.social-icons-colored-hover a:hover {
            color: #fff !important;
            border: 0;
        }

        .social-icons.social-icons-colored .social-rss a,
        .social-icons.social-icons-colored-hover .social-rss a:hover,
        .social-icons.social-icons-colored .social-snapchat a,
        .social-icons.social-icons-colored-hover .social-snapchat a:hover {
            background-color: #faa33d;
        }

        .social-icons.social-icons-colored .social-facebook a,
        .social-icons.social-icons-colored-hover .social-facebook a:hover {
            background-color: #5d82d1;
        }

        .social-icons.social-icons-colored .social-twitter a,
        .social-icons.social-icons-colored-hover .social-twitter a:hover {
            background-color: #40bff5;
        }

        .social-icons.social-icons-colored .social-vimeo a,
        .social-icons.social-icons-colored-hover .social-vimeo a:hover {
            background-color: #35c6ea;
        }

        .social-icons.social-icons-colored .social-myspace a,
        .social-icons.social-icons-colored-hover .social-myspace a:hover {
            background-color: #008dde;
        }

        .social-icons.social-icons-colored .social-youtube a,
        .social-icons.social-icons-colored-hover .social-youtube a:hover {
            background-color: #ef4e41;
        }

        .social-icons.social-icons-colored .social-instagram a,
        .social-icons.social-icons-colored-hover .social-instagram a:hover {
            background-color: #e53d00;
        }

        .social-icons.social-icons-colored .social-gplus a,
        .social-icons.social-icons-colored-hover .social-gplus a:hover {
            background-color: #d68400;
        }

        .social-icons.social-icons-colored .social-stumbleupon a,
        .social-icons.social-icons-colored-hover .social-stumbleupon a:hover {
            background-color: #ff5c30;
        }

        .social-icons.social-icons-colored .social-lastfm a,
        .social-icons.social-icons-colored-hover .social-lastfm a:hover {
            background-color: #f34320;
        }

        .social-icons.social-icons-colored .social-pinterest a,
        .social-icons.social-icons-colored-hover .social-pinterest a:hover {
            background-color: #e13138;
        }

        .social-icons.social-icons-colored .social-google a,
        .social-icons.social-icons-colored-hover .social-google a:hover {
            background-color: #eb5e4c;
        }

        .social-icons.social-icons-colored .social-evernote a,
        .social-icons.social-icons-colored-hover .social-evernote a:hover {
            background-color: #9acf4f;
        }

        .social-icons.social-icons-colored .social-dribbble a,
        .social-icons.social-icons-colored-hover .social-dribbble a:hover {
            background-color: #f7659c;
        }

        .social-icons.social-icons-colored .social-skype a,
        .social-icons.social-icons-colored-hover .social-skype a:hover {
            background-color: #13c1f3;
        }

        .social-icons.social-icons-colored .social-forrst a,
        .social-icons.social-icons-colored-hover .social-forrst a:hover {
            background-color: #45ad76;
        }

        .social-icons.social-icons-colored .social-linkedin a,
        .social-icons.social-icons-colored-hover .social-linkedin a:hover {
            background-color: #238cc8;
        }

        .social-icons.social-icons-colored .social-wordpress a,
        .social-icons.social-icons-colored-hover .social-wordpress a:hover {
            background-color: #2592c3;
        }

        .social-icons.social-icons-colored .social-grooveshark a,
        .social-icons.social-icons-colored-hover .social-grooveshark a:hover {
            background-color: #ffb21d;
        }

        .social-icons.social-icons-colored .social-delicious a,
        .social-icons.social-icons-colored-hover .social-delicious a:hover {
            background-color: #377bda;
        }

        .social-icons.social-icons-colored .social-behance a,
        .social-icons.social-icons-colored-hover .social-behance a:hover {
            background-color: #1879fd;
        }

        .social-icons.social-icons-colored .social-dropbox a,
        .social-icons.social-icons-colored-hover .social-dropbox a:hover {
            background-color: #17a3eb;
        }

        .social-icons.social-icons-colored .social-soundcloud a,
        .social-icons.social-icons-colored-hover .social-soundcloud a:hover {
            background-color: #ff7e30;
        }

        .social-icons.social-icons-colored .social-deviantart a,
        .social-icons.social-icons-colored-hover .social-deviantart a:hover {
            background-color: #6a8a7b;
        }

        .social-icons.social-icons-colored .social-yahoo a,
        .social-icons.social-icons-colored-hover .social-yahoo a:hover {
            background-color: #ab47ac;
        }

        .social-icons.social-icons-colored .social-flickr a,
        .social-icons.social-icons-colored-hover .social-flickr a:hover {
            background-color: #ff48a3;
        }

        .social-icons.social-icons-colored .social-digg a,
        .social-icons.social-icons-colored-hover .social-digg a:hover {
            background-color: #75788d;
        }

        .social-icons.social-icons-colored .social-blogger a,
        .social-icons.social-icons-colored-hover .social-blogger a:hover {
            background-color: #ff9233;
        }

        .social-icons.social-icons-colored .social-tumblr a,
        .social-icons.social-icons-colored-hover .social-tumblr a:hover {
            background-color: #426d9b;
        }

        .social-icons.social-icons-colored .social-quora a,
        .social-icons.social-icons-colored-hover .social-quora a:hover {
            background-color: #ea3d23;
        }

        .social-icons.social-icons-colored .social-github a,
        .social-icons.social-icons-colored-hover .social-github a:hover {
            background-color: #3f91cb;
        }

        .social-icons.social-icons-colored .social-amazon a,
        .social-icons.social-icons-colored-hover .social-amazon a:hover {
            background-color: #ff8e2e;
        }

        .social-icons.social-icons-colored .social-xing a,
        .social-icons.social-icons-colored-hover .social-xing a:hover {
            background-color: #1a8e8c;
        }

        .social-icons.social-icons-colored .social-wikipedia a,
        .social-icons.social-icons-colored-hover .social-wikipedia a:hover {
            background-color: #b3b5b8;
        }

        .social-icons.social-icons-border li a {
            border: 1px solid #d7d7d7;
            background: 0 0;
            color: #333;
        }

        .dark .social-icons.social-icons-border li a {
            border: 1px solid #333 !important;
        }

        .dark .social-icons li a .social-icons.social-icons-dark li a {
            background: #888;
            color: #fff;
        }

        .social-icons.social-icons-light li a {
            background: #fff;
            color: #333;
            border: 1px solid #ececec;
        }

        .social-icons.social-icons-rounded li a {
            border-radius: 50%;
        }

        .social-icons.social-icons-square li a {
            border-radius: 0;
        }

        .social-icons.social-icons-xs li a {
            height: 20px;
            width: 20px;
            line-height: 20px;
            font-size: 12px;
        }

        .social-icons.social-icons-sm li a {
            height: 30px;
            width: 30px;
            line-height: 30px;
            font-size: 13px;
        }

        .social-icons.social-icons-md li a {
            height: 38px;
            width: 38px;
            line-height: 38px;
            font-size: 16px;
        }

        .social-icons.social-icons-lg li a {
            height: 42px;
            width: 42px;
            line-height: 42px;
            font-size: 18px;
        }

        .social-icons.social-icons-xl li a {
            height: 48px;
            width: 48px;
            line-height: 48px;
            font-size: 18px;
        }

        .dark .social-icons:not(.social-icons-colored):not(.social-icons-colored-hover) li a:hover {
            background-color: #1f1f1f;
        }

        .social-icons li:hover i {
            -webkit-animation: toTopFromBottom .2s forwards;
            animation: toTopFromBottom .2s forwards;
        }

        /*Map*/
        .leaflet-map {
            height: 350px;
            width: 100%;
        }

        /*table*/
        table {
            width: 100%;
            margin-bottom: 1.5rem;
            border-collapse: collapse;
            vertical-align: middle;
        }

        table td,
        table th {
            padding: 10px 20px;
            border: 1px solid #ececec;
            vertical-align: middle;
        }

        table thead>tr>th {
            vertical-align: middle;
            border-bottom: 0;
        }

        table p {
            margin-bottom: 0;
        }

        table.clean td,
        table.clean th {
            border: 0;
            border-top: 1px solid #ececec;
        }

        table .product-thumbnail img {
            max-width: 80px;
        }

        /*divider*/
        .divider {
            position: relative;
            overflow: hidden;
            height: 4px;
            z-index: 9;
        }

        .divider.center_icon {
            text-align: center;
            height: auto;
        }

        .divider::before,
        .divider::after {
            content: '';
            position: absolute;
            width: 100%;
            top: 50%;
            left: 0px;
            height: 0;
            border-top: 1px solid #ececec;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .divider::before {
            margin-top: -1px;
        }

        .divider::after {
            margin-top: 1px;
        }

        .divider i {
            background-color: #fff;
            color: #aaa;
            position: relative;
            z-index: 1;
            font-size: 20px;
            padding: 0 20px;
            line-height: 1;
        }

        .divider-2 {
            width: 100%;
            height: 1px;
            background-color: #ececec;
        }

        .bg-square {
            position: absolute;
            left: auto;
            top: 150px;
            right: 0%;
            bottom: auto;
            width: 100%;
            height: 100%;
            max-height: 70%;
            max-width: 45%;
            min-width: 300px;
            background-color: #f3fbf5;
            z-index: -1;
            max-height: 1200px;
        }

        .mobile-promotion {
            display: none;
        }

        .bg-green {
            background-color: #cee8e0;
        }

        /*modal*/
        .custom-modal .modal-dialog {
            max-width: 888px !important;
            border-radius: 0px;
            overflow: hidden;
            border: 0;
            margin: auto;
            top: 50%;
            -webkit-transform: translateY(-50%) !important;
            transform: translateY(-50%) !important;
        }

        .custom-modal .modal-dialog .modal-content {
            border-radius: 25px;
            padding: 40px;
            border: 1px solid #BCE3C9;
        }

        .custom-modal .modal-dialog .btn-close {
            position: absolute;
            right: 30px;
            top: 30px;
            z-index: 2;
        }

        .zoomContainer,
        .zoomWindow {
            z-index: 9999;
        }

        .single-product .zoomContainer,
        .single-product .zoomWindow {
            z-index: 99;
        }

        /*COMPONENTS -> BANNERS*/
        .banner-left-icon {
            position: relative;
            background: #F4F6FA;
            padding: 20px;
            border-radius: 10px;
        }

        .banner-left-icon:hover .banner-icon {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .banner-left-icon .banner-icon {
            max-width: 60px;
            margin-right: 20px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .banner-left-icon .banner-text h3 {
            color: #242424;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .banner-left-icon .banner-text p {
            margin-bottom: 0;
            color: #adadad;
        }

        .banner-left-icon.style-2 {
            position: relative;
            border: 1px solid #ececec;
            padding: 20px;
        }

        .banner-img {
            position: relative;
            clear: both;
            border-radius: 10px;
            overflow: hidden;
        }

        .banner-img img {
            border-radius: 10px;
        }

        .banner-img:hover img {
            opacity: 0.9;
        }

        .banner-img.banner-1 .banner-text {
            top: 30%;
        }

        .banner-img.banner-1.home-3 {
            margin-bottom: 24px;
            border-radius: 10px;
            overflow: hidden;
            max-height: 348px;
        }

        .banner-img.banner-2 .banner-text {
            right: 10px;
        }

        .banner-img .banner-text {
            position: absolute;
            top: 50%;
            z-index: 2;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            padding: 0 50px;
        }

        .banner-img .banner-text span {
            color: #adadad;
        }

        .banner-img .banner-text h4 {
            font-weight: 700;
            margin-bottom: 15px;
            min-height: 100px;
        }

        .banner-img .banner-text:hover h4 {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }

        .banner-img .banner-text a i {
            margin-left: 5px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            font-size: 10px;
        }

        .banner-img .banner-text a:hover i {
            margin-left: 10px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .banner-img.style-2 {
            border-radius: 15px;
            overflow: hidden;
            height: 520px;
            width: 100%;
        }

        .banner-img.style-2 .banner-text {
            top: 50px;
            -webkit-transform: none;
            transform: none;
        }

        .banner-img.style-3 {
            border-radius: 15px;
            overflow: hidden;
            height: 538px;
            background-size: cover;
            width: 100%;
        }

        .banner-img.style-3 .banner-text {
            top: 50px;
            -webkit-transform: none;
            transform: none;
        }

        .banner-img.style-4 .banner-text h4 {
            font-size: 28px;
        }

        .banner-img.style-5 .banner-text {
            right: 0;
            padding: 0 30px;
        }

        .banner-img.style-6 .banner-text {
            right: 0;
            padding: 0 20px 0 0;
        }

        .banner-img.style-6 .banner-text h6 {
            font-size: 16px;
        }

        .banner-big .btn {
            background: #3BB77E !important;
            color: #fff;
            border-radius: 3px;
            font-size: 13px;
            padding: 10px 22px;
            border: 0;
        }

        .banner-big .btn:hover {
            background: #FDC040 !important;
        }

        /*Deal banners*/
        .deal {
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
            background-color: #fff;
            background-size: contain;
            background-position: right center;
            background-repeat: no-repeat;
            min-height: 420px;
        }

        .deal>div {
            width: 100%;
        }

        .deal h2 {
            color: #FD6E6E;
            font-weight: 600;
            font-size: 26px;
            line-height: 1.1;
            margin-bottom: 5px;
        }

        .deal h5 {
            color: #242424;
            font-weight: 400;
            letter-spacing: 0;
            margin-bottom: 20px;
            max-width: 240px;
        }

        .deal .deal-content {
            -ms-flex-item-align: center;
            -ms-grid-row-align: center;
            align-self: center;
        }

        .deal .product-title {
            max-width: 57%;
            margin-bottom: 20px;
            font-size: 45px;
            line-height: 1.23;
        }

        .deal .product-title a {
            color: #253D4E;
        }

        .deal .btn {
            background: #3BB77E;
            border: 0;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
            padding: 10px 24px;
        }

        .deal .btn i {
            margin-left: 5px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            font-size: 12px;
        }

        .deal .btn:hover i {
            margin-left: 10px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .deal .deal-bottom {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .deal .deal-bottom .deals-countdown {
            margin-left: -12px;
            margin-bottom: 20px;
        }

        .deal .deal-bottom .deals-countdown .countdown-section {
            border: 2px solid #3BB77E;
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
        }

        .banner-bg {
            background-position: center;
            background-size: cover;
            padding: 50px;
        }

        .banner-features {
            text-align: center;
            padding: 25px 15px;
            border-radius: 4px;
            border: 1px solid #ececec;
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
        }

        .banner-features:hover {
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.05);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.05);
        }

        .banner-features img {
            display: inline-block;
            margin-bottom: 15px;
        }

        .banner-features h4 {
            font-size: 13px;
            font-weight: 700;
            display: inline-block;
            padding: 9px 8px 6px 8px;
            line-height: 1;
            border-radius: 4px;
            color: #3BB77E;
        }

        /*Page > About*/
        .hero-2 {
            padding: 160px 0 100px;
            min-height: 640px;
        }

        .hero-3 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-preferred-size: content;
            flex-basis: content;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            background: url(../imgs/page/home-6-bg.jpg) no-repeat center center;
            background-size: cover;
            height: 330px;
        }

        .hero-3 form {
            background-color: #fff;
            max-width: 520px;
            border-radius: 50px;
            -webkit-box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
            box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
        }

        .hero-3 form input {
            border: 0;
            border-radius: 50px 0 0 50px;
            padding-left: 58px;
            background: url(../imgs/theme/icons/icon-search.png) no-repeat 25px center;
        }

        .hero-3 form button {
            border: 0;
            border-radius: 50px;
        }

        .hero-3 .nav-link {
            font-size: 14px !important;
        }

        .parallax-wrapper {
            position: absolute;
            z-index: 3;
            width: 100%;
        }

        .parallax-wrapper .parallax-img-area {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
            z-index: 2;
            margin: 0 auto;
        }

        .parallax-wrapper .parallax-img-area .parallax-img {
            position: absolute;
            z-index: 2;
            text-align: right;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-1 {
            right: 0;
            width: 52%;
            z-index: 2;
            top: 100px;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-2 {
            right: 220px;
            width: 52%;
            top: 40px;
            z-index: 3;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-3 {
            opacity: 0.1 !important;
            left: -210px;
            width: 320px;
            top: 193px;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-4 {
            opacity: 0.08 !important;
            width: 180px;
            left: 50%;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-5 {
            right: 0;
            width: 12%;
            z-index: 2;
            opacity: 0.3;
            bottom: 20%;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-6 {
            width: 25%;
            z-index: 3;
            opacity: 0.2;
            bottom: 0;
            left: -150px;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-7 {
            opacity: 0.2 !important;
            width: 16%;
            top: 10%;
            left: 10%;
        }

        .parallax-wrapper .parallax-img-area .parallax-img.img-8 {
            opacity: 0.2 !important;
            width: 10%;
            bottom: 40%;
            left: 50%;
        }

        .hero-content {
            position: absolute;
            z-index: 4;
            width: 100%;
        }

        .hero-content h1 {
            line-height: 1.1;
        }

        .about-count {
            z-index: 100;
            position: relative;
            color: #fff;
            background: url(../imgs/page/about-9.png) no-repeat center center;
            border-radius: 15px;
            padding: 100px 0;
            overflow: hidden;
        }

        .about-count::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            background: #4B675A;
            z-index: 2;
            opacity: 0.8;
        }

        .about-count h1 {
            font-size: 72px;
            color: #fff;
        }

        .about-count h4 {
            color: #fff;
        }

        .about-count .text-center {
            z-index: 3;
            position: relative;
        }

        .hero-card-icon {
            width: 65px;
            height: 65px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 5px;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .hero-card-icon.icon-left {
            width: 165px;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: start;
        }

        .single-content>ol {
            list-style-type: decimal;
            margin-bottom: 30px;
            padding-left: 1em;
        }

        .single-content>ol li:not(:last-child) {
            margin-bottom: 16px;
        }

        .single-content>ol ol {
            list-style-type: lower-alpha;
            margin: 20px 0 30px;
            padding-left: 25px;
        }

        .single-content>ol ol ol {
            list-style-type: lower-roman;
        }

        /*page 404*/
        .page-404 {
            background-color: #fff;
        }

        .page-404 img {
            max-width: 300px;
        }

        .page-404 img.logo {
            max-width: 150px;
        }

        .page-404 .search-form {
            max-width: 400px;
            margin: 0 auto;
        }

        /*SHOP*/
        .product-cart-wrap {
            position: relative;
            background-color: #fff;
            border: 1px solid #ececec;
            border-radius: 15px;
            overflow: hidden;
            transition: .2s;
            -moz-transition: .2s;
            -webkit-transition: .2s;
            -o-transition: .2s;
        }

        .product-cart-wrap:hover {
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #BCE3C9;
            transition: .2s;
            -moz-transition: .2s;
            -webkit-transition: .2s;
            -o-transition: .2s;
        }

        .product-cart-wrap .product-img-action-wrap {
            position: relative;
            background-color: #fff;
            overflow: hidden;
            max-height: 320px;
            padding: 25px 25px 0 25px;
        }

        .product-cart-wrap .product-img-action-wrap .product-action-1 {
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #BCE3C9;
        }

        .product-cart-wrap .product-img-action-wrap .product-img {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .product-cart-wrap .product-img-action-wrap .product-img a {
            overflow: hidden;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .product-cart-wrap .product-img-action-wrap .product-img a img {
            width: 100%;
        }

        .product-cart-wrap .product-img-action-wrap .product-img a img.hover-img {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 2;
            opacity: 0;
            visibility: hidden;
            transition: 0.25s opacity, 0.25s visibility, transform 1.5s cubic-bezier(0, 0, 0.2, 1), -webkit-transform 1.5s cubic-bezier(0, 0, 0.2, 1);
        }

        .product-cart-wrap .product-img-action-wrap .product-img-zoom a img {
            -webkit-transition: all 1.5s cubic-bezier(0, 0, 0.05, 1);
            transition: all 1.5s cubic-bezier(0, 0, 0.05, 1);
        }

        .product-cart-wrap .product-action-1 {
            position: absolute;
            left: 50%;
            top: 50%;
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all .3s ease 0s;
            transition: all .3s ease 0s;
            z-index: 9;
            -webkit-box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
            box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
        }

        .product-cart-wrap .product-action-1.show {
            visibility: visible;
            opacity: 1;
            bottom: 26px;
            left: unset;
            right: 20px;
            top: unset;
            -webkit-transform: none;
            transform: none;
        }

        .product-cart-wrap .product-action-1 button,
        .product-cart-wrap .product-action-1 a.action-btn {
            width: 40px;
            height: 36px;
            line-height: 40px;
            text-align: center;
            position: relative;
            display: inline-block;
            border-right: 1px solid #BCE3C9;
        }

        .product-cart-wrap .product-action-1 button:last-child,
        .product-cart-wrap .product-action-1 a.action-btn:last-child {
            border: none;
        }

        .product-cart-wrap .product-action-1 button.small,
        .product-cart-wrap .product-action-1 a.action-btn.small {
            width: 32px;
            height: 32px;
            line-height: 32px;
        }

        .product-cart-wrap .product-action-1 button.small i,
        .product-cart-wrap .product-action-1 a.action-btn.small i {
            font-size: 12px;
        }

        .product-cart-wrap .product-action-1 button:after,
        .product-cart-wrap .product-action-1 a.action-btn:after {
            bottom: 100%;
            left: 50%;
            position: absolute;
            white-space: nowrap;
            border-radius: 5px;
            font-size: 11px;
            padding: 7px 10px;
            color: #ffffff;
            background-color: #3BB77E;
            content: attr(aria-label);
            line-height: 1.3;
            -webkit-transition-delay: .1s;
            transition-delay: .1s;
            -webkit-box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.1);
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s cubic-bezier(0.71, 1.7, 0.77, 1.24), -webkit-transform 0.3s cubic-bezier(0.71, 1.7, 0.77, 1.24);
            opacity: 0;
            visibility: hidden;
            -webkit-transform: translateX(-50%) translateY(0px);
            transform: translateX(-50%) translateY(0px);
        }

        .product-cart-wrap .product-action-1 button:before,
        .product-cart-wrap .product-action-1 a.action-btn:before {
            content: '';
            position: absolute;
            left: calc(50% - 7px);
            bottom: 100%;
            -webkit-transition-delay: .1s;
            transition-delay: .1s;
            border: 7px solid transparent;
            border-top-color: #3BB77E;
            z-index: 9;
            margin-bottom: -13px;
            transition-delay: .1s;
            transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s cubic-bezier(0.71, 1.7, 0.77, 1.24), -webkit-transform 0.3s cubic-bezier(0.71, 1.7, 0.77, 1.24);
            opacity: 0;
            visibility: hidden;
        }

        .product-cart-wrap .product-action-1 button:last-child,
        .product-cart-wrap .product-action-1 a.action-btn:last-child {
            margin-right: 0;
        }

        .product-cart-wrap .product-action-1 button i,
        .product-cart-wrap .product-action-1 a.action-btn i {
            font-size: 15px;
            margin-left: 1px;
        }

        .product-cart-wrap .product-action-1 button:hover,
        .product-cart-wrap .product-action-1 a.action-btn:hover {
            color: #FDC040;
        }

        .product-cart-wrap .product-action-1 button:hover:after,
        .product-cart-wrap .product-action-1 a.action-btn:hover:after {
            opacity: 1;
            visibility: visible;
            -webkit-transform: translateX(-50%) translateY(-8px);
            transform: translateX(-50%) translateY(-8px);
        }

        .product-cart-wrap .product-action-1 button:hover:before,
        .product-cart-wrap .product-action-1 a.action-btn:hover:before {
            opacity: 1;
            visibility: visible;
            -webkit-transform: translateY(-8px);
            transform: translateY(-8px);
        }

        .product-cart-wrap .product-action-1 button:hover i,
        .product-cart-wrap .product-action-1 a.action-btn:hover i {
            color: #FDC040;
        }

        .product-cart-wrap .product-badges {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .product-cart-wrap .product-badges.product-badges-mrg {
            margin: 0 0 10px;
        }

        .product-cart-wrap .product-badges.product-badges-position {
            position: absolute;
            left: 0;
            top: 0px;
            z-index: 9;
        }

        .product-cart-wrap .product-badges span {
            display: inline-block;
            font-size: 12px;
            line-height: 1;
            border-radius: 15px 0 20px 0;
            color: #fff;
            padding: 9px 20px 10px 20px;
        }

        .product-cart-wrap .product-badges span:last-child {
            margin-right: 0px;
        }

        .product-cart-wrap .product-badges span.hot {
            background-color: #f74b81;
        }

        .product-cart-wrap .product-badges span.new {
            background-color: #3BB77E;
        }

        .product-cart-wrap .product-badges span.sale {
            background-color: #67bcee;
        }

        .product-cart-wrap .product-badges span.best {
            background-color: #f59758;
        }

        .product-cart-wrap .product-content-wrap {
            padding: 0 20px 20px 20px;
        }

        .product-cart-wrap .product-content-wrap .product-category {
            margin-bottom: 5px;
        }

        .product-cart-wrap .product-content-wrap .product-category a {
            color: #adadad;
            font-size: 12px;
        }

        .product-cart-wrap .product-content-wrap .product-category a:hover {
            color: #3BB77E;
        }

        .product-cart-wrap .product-content-wrap h2 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .product-cart-wrap .product-content-wrap h2 a {
            color: #253D4E;
        }

        .product-cart-wrap .product-content-wrap h2 a:hover {
            color: #3BB77E;
        }

        .product-cart-wrap .product-content-wrap .product-price {
            padding-top: 5px;
        }

        .product-cart-wrap .product-content-wrap .product-price span {
            font-size: 18px;
            font-weight: bold;
            color: #3BB77E;
        }

        .product-cart-wrap .product-content-wrap .product-price span.new-price {
            color: #3BB77E;
        }

        .product-cart-wrap .product-content-wrap .product-price span.old-price {
            font-size: 14px;
            color: #adadad;
            margin: 0 0 0 7px;
            text-decoration: line-through;
        }

        .product-cart-wrap .product-content-wrap .rating-result {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .product-cart-wrap .product-content-wrap .rating-result>span {
            display: block;
            overflow: hidden;
            margin-left: 5px;
        }

        .product-cart-wrap .product-content-wrap .rating-result::before {
            font-family: "uicons-regular-straight" !important;
            font-size: 11px;
            letter-spacing: 2px;
            content: '\f225''\f225''\f225''\f225''\f225';
            color: #ff9900;
        }

        .product-cart-wrap .product-content-wrap .add-to-cart {
            width: 44px;
            height: 44px;
            line-height: 44px;
            border-radius: 5px;
            background-color: #f5f5f5;
            text-align: center;
            display: block;
            color: #253D4E;
            font-size: 16px;
            position: absolute;
            bottom: 25px;
            right: 20px;
            font-weight: 300;
        }

        .product-cart-wrap .product-content-wrap .add-to-cart:hover {
            background-color: #3BB77E;
            color: #fff;
        }

        .product-cart-wrap .product-content-wrap .add-to-cart img {
            width: 20px;
            display: inline-block;
            margin-top: 11px;
        }

        .product-cart-wrap .product-card-bottom {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-top: 15px;
        }

        .product-cart-wrap .product-card-bottom .add-cart {
            cursor: pointer;
        }

        .product-cart-wrap .product-card-bottom .add-cart .add {
            position: relative;
            display: inline-block;
            padding: 6px 20px 6px 20px;
            border-radius: 4px;
            background-color: #DEF9EC;
            font-size: 14px;
            font-weight: 700;
        }

        .product-cart-wrap .product-card-bottom .add-cart .add:hover {
            background-color: #3BB77E;
            color: #fff;
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .product-cart-wrap .product-stock .status-bar {
            background-color: #ededed;
            margin: 0px 0 10px;
            border-radius: 5px;
        }

        .product-cart-wrap .product-stock .status-bar .sold-bar {
            background-image: linear-gradient(235deg, #3BB77E 0%, #77ccfd 100%);
            border-radius: 4px;
            height: 8px;
        }

        .product-cart-wrap .product-stock .status-bar .sold-bar.sold-bar-width-33 {
            width: 33.333333333333%;
        }

        .product-cart-wrap .product-stock .status-bar .sold-bar.sold-bar-width-10 {
            width: 10%;
        }

        .product-cart-wrap .product-stock .status-bar .sold-bar.sold-bar-width-40 {
            width: 40%;
        }

        .product-cart-wrap .product-stock .status-bar .sold-bar.sold-bar-width-6 {
            width: 6.6666666666667%;
        }

        .product-cart-wrap .product-stock .status-bar .sold-bar.sold-bar-width-42 {
            width: 42.857142857143%;
        }

        .product-cart-wrap .product-stock .product-stock-status {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .product-cart-wrap .product-stock .product-stock-status .sold {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            margin-right: 20px;
        }

        .product-cart-wrap .product-stock .product-stock-status .available {
            -ms-flex-negative: 0;
            flex-shrink: 0;
        }

        .product-cart-wrap .product-stock .product-stock-status .stock-status-same-style span {
            font-size: 15px;
        }

        .product-cart-wrap .product-stock .product-stock-status .stock-status-same-style span.label {
            color: #253D4E;
        }

        .product-cart-wrap .product-stock .product-stock-status .stock-status-same-style span.value {
            font-weight: 700;
            color: #333;
        }

        .product-cart-wrap .progress {
            height: 5px;
        }

        .product-cart-wrap:hover .product-img-action-wrap .product-img a img.hover-img {
            opacity: 1;
            visibility: visible;
        }

        .product-cart-wrap:hover .product-img-action-wrap .product-action-1 {
            opacity: 1;
            visibility: visible;
        }

        .product-cart-wrap:hover .product-img-zoom a img {
            -webkit-transform: scale3d(1.05, 1.05, 1.05) translateZ(0);
            transform: scale3d(1.05, 1.05, 1.05) translateZ(0);
        }

        .product-cart-wrap.small {
            border: 0;
            text-align: center;
        }

        .product-cart-wrap.small .rating-result {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .product-cart-wrap.small .product-content-wrap {
            padding: 5px 15px 0 15px;
        }

        .product-cart-wrap.small .product-price {
            padding-top: 0;
        }

        .product-cart-wrap.small:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .product-cart-wrap.small h2 {
            border-bottom: 0;
            padding: 0;
            margin-bottom: 0;
        }

        .product-cart-wrap.small .product-badges span {
            font-size: 10px;
        }

        .product-cart-wrap.style-2 {
            border: 0;
            padding-bottom: 25px;
        }

        .product-cart-wrap.style-2:hover {
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .product-cart-wrap.style-2 .product-img-action-wrap {
            padding: 0;
            position: relative;
            z-index: 1;
            max-height: unset;
        }

        .product-cart-wrap.style-2 .product-img-action-wrap img {
            border-radius: 15px;
        }

        .product-cart-wrap.style-2 .product-content-wrap {
            position: relative;
            margin-top: -90px;
            z-index: 3;
            padding: 0;
            max-width: 86%;
            margin-left: auto;
            margin-right: auto;
            transition: .3s;
            -moz-transition: .3s;
            -webkit-transition: .3s;
            -o-transition: .3s;
        }

        .product-cart-wrap.style-2 .product-content-wrap .deals-content {
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            padding: 25px 30px;
        }

        .product-cart-wrap.style-2 .product-content-wrap .deals-countdown-wrap {
            position: absolute;
            top: -80px;
            width: 100%;
            text-align: center;
        }

        .product-cart-wrap.style-2:hover .product-content-wrap {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
            transition: .3s;
            -moz-transition: .3s;
            -webkit-transition: .3s;
            -o-transition: .3s;
        }

        .product-price {
            font-family: "Quicksand", sans-serif;
        }

        .product-list-small article:not(:last-child) {
            margin-bottom: 20px;
        }

        .product-list-small h6 a {
            color: #253D4E;
        }

        .product-list-small h6 a:hover {
            color: #3BB77E;
        }

        .product-list-small figure img {
            border-radius: 10px;
        }

        .product-list-small .product-price {
            color: #3BB77E;
            font-size: 18px;
            font-weight: 700;
            margin-top: 10px;
        }

        .product-list-small .product-price span.old-price {
            font-size: 14px;
            color: #adadad;
            margin: 0 0 0 7px;
            text-decoration: line-through;
        }

        .range .list-group-item {
            position: relative;
            display: block;
            padding: 0;
            background: none;
            border: 0;
        }

        .range .checkbox {
            font-size: 0.8em;
        }

        .range .price-filter {
            display: block;
            margin-top: 20px;
        }

        .range #slider-range {
            -webkit-box-shadow: none;
            box-shadow: none;
            border: none;
            height: 4px;
            border-radius: 0px;
            background: #3BB77E;
            color: #3BB77E;
        }

        .range #slider-range .ui-slider-range {
            -webkit-box-shadow: none;
            box-shadow: none;
            background: #222;
            border-radius: 0px;
            border: none;
        }

        .range .ui-slider-handle.ui-state-default.ui-corner-all {
            width: 14px;
            height: 14px;
            line-height: 10px;
            background: #3BB77E;
            border: none;
            border-radius: 100%;
            top: -5px;
        }

        .range .label-input {
            margin-top: 15px;
        }

        .range .label-input span {
            margin-right: 5px;
            color: #282828;
        }

        .range .label-input input {
            border: none;
            margin: 0;
            height: unset;
            font-weight: 600;
            font-size: 14px;
            background: transparent;
            padding-left: 0;
        }

        .range .check-box-list {
            margin-top: 15px;
        }

        .range .check-box-list li {
            margin-bottom: 5px;
        }

        .range .check-box-list li:last-child {
            margin: 0;
        }

        .range .check-box-list li label {
            margin: 0;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            cursor: pointer;
        }

        .range .check-box-list li label input {
            display: inline-block;
            margin-right: 6px;
            position: relative;
            top: 1px;
        }

        .range .check-box-list .count {
            margin-left: 5px;
            color: #666;
        }

        .btn.btn-small {
            line-height: 1;
            padding: 10px 15px;
            min-width: unset;
            display: table;
            border-radius: 3px;
        }

        .product-sidebar .single-post {
            position: relative;
        }

        .product-sidebar .single-post:not(:last-child) {
            margin-bottom: 10px;
            border-bottom: 1px dotted rgba(0, 0, 0, 0.15);
            padding-bottom: 10px;
        }

        .product-sidebar .single-post .content {
            padding-left: 95px;
        }

        .product-sidebar .single-post i {
            font-size: 12px;
        }

        .product-sidebar .image {
            height: 80px;
            width: 80px;
            float: left;
            margin-right: 10px;
            overflow: hidden;
        }

        .shop-product-fillter {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 0 30px;
        }

        .shop-product-fillter.style-2 {
            padding-bottom: 20px;
            border-bottom: 1px solid #ececec;
        }

        .shop-product-fillter .sort-by-product-area {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-cover {
            position: relative;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: #fff;
            border: 1px solid #f7f8f9;
            color: #777;
            padding: 9px 16px;
            border-radius: 10px;
            -webkit-transition: all .3s ease 0s;
            transition: all .3s ease 0s;
            cursor: pointer;
            border: 1px solid #ececec;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap:hover {
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap .sort-by {
            margin-right: 5px;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap .sort-by i {
            margin-right: 10px;
            font-size: 14px;
            color: #ababab;
            position: relative;
            top: 2px;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap .sort-by span {
            font-size: 13px;
            font-weight: 500;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap .sort-by-dropdown-wrap span {
            font-size: 13px;
            font-weight: 500;
            color: #7E7E7E;
        }

        .shop-product-fillter .sort-by-product-area .sort-by-product-wrap .sort-by-dropdown-wrap span i {
            font-size: 15px;
            color: #7E7E7E;
            margin-left: 10px;
            position: relative;
            top: 2px;
        }

        .sort-by-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 99;
            right: 0;
            padding: 16px 0 21px;
            background: #fff;
            border: 0;
            border-radius: 5px;
            visibility: hidden;
            opacity: 0;
            min-width: 100%;
            -webkit-box-shadow: 0 -3px 23px rgba(0, 0, 0, 0.06);
            box-shadow: 0 -3px 23px rgba(0, 0, 0, 0.06);
            color: #7E7E7E;
            font-weight: 500;
        }

        .sort-by-dropdown.show {
            opacity: 1;
            visibility: visible;
        }

        .sort-by-dropdown ul li {
            display: block;
        }

        .sort-by-dropdown ul li a {
            font-weight: 500;
            font-size: 13px;
            padding: 5px 30px;
            display: block;
            position: relative;
            color: #7E7E7E;
        }

        .sort-by-dropdown ul li a.active::before {
            content: "\f143";
            position: absolute;
            top: 5px;
            left: 10px;
            font-size: 12px;
            color: #3BB77E;
            font-family: 'uicons-regular-straight' !important;
            font-weight: 900;
        }

        .sort-by-dropdown ul li a.active:hover::before {
            color: #fff;
        }

        .sort-by-dropdown ul li a:hover {
            background-color: #3BB77E;
            color: #ffffff;
        }

        /*Product list*/
        .product-list {
            position: relative;
        }

        .product-list .product-cart-wrap {
            border: 0;
            border-radius: 0;
            overflow: unset;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .product-list .product-cart-wrap:not(:last-child) {
            margin-bottom: 30px;
        }

        .product-list .product-cart-wrap:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .product-list .product-cart-wrap:hover .product-img {
            -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        }

        .product-list .product-cart-wrap .product-badges.product-badges-position {
            left: 0;
            top: 0;
        }

        .product-list .product-cart-wrap .product-img-action-wrap {
            max-width: 28%;
            position: relative;
            padding: 0;
            max-height: unset;
        }

        .product-list .product-cart-wrap .product-img-action-wrap .product-img {
            border: 1px solid #ececec;
            border-radius: 15px;
        }

        .product-list .product-cart-wrap .product-img-action-wrap .product-img .product-img-inner {
            overflow: hidden;
            padding: 10px;
        }

        .product-list .product-cart-wrap .product-img-action-wrap .product-img .product-img-inner a img {
            height: auto;
        }

        .product-list .product-cart-wrap h2 {
            font-size: 32px;
        }

        .product-list .product-cart-wrap .product-content-wrap .product-category a {
            font-size: 16px;
            margin-top: 15px;
            display: block;
        }

        .product-list .product-cart-wrap .product-content-wrap .product-price span {
            font-size: 32px;
        }

        .product-list .product-cart-wrap .product-content-wrap .product-price span.old-price {
            font-size: 20px;
        }

        .product-list .product-cart-wrap .product-content-wrap .product-action-1 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            position: relative;
            bottom: unset;
            padding: 0 20px;
            margin-top: 20px;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .product-list .product-cart-wrap .product-content-wrap .product-action-1 a.action-btn {
            border: none;
            width: auto;
            border-radius: 50px;
            background-color: #3BB77E;
            color: #fff;
            text-align: center;
            margin-right: 0;
            position: relative;
            display: inline-block;
            padding: 0px 23px;
            height: 44px;
            font-weight: 500;
        }

        .product-list .product-cart-wrap .product-content-wrap .product-action-1 a.action-btn i {
            margin-right: 8px;
            color: #fff;
        }

        /*PRODUCT DETAILS*/
        .detail-gallery {
            position: relative;
        }

        .detail-gallery .zoom-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 2;
            font-size: 22px;
            opacity: 0.6;
        }

        .slider-nav-thumbnails .slick-list {
            margin: 0 -10px;
        }

        .slider-nav-thumbnails .slick-slide {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
        }

        .slider-nav-thumbnails .slick-slide img {
            border-radius: 17px;
        }

        .slider-nav-thumbnails .slick-slide.slick-current::before {
            border-bottom: 5px solid #333;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            content: "";
            height: 0;
            left: 50%;
            margin-left: -5px;
            position: absolute;
            top: -6px;
            width: 0;
        }

        .slider-nav-thumbnails .slick-slide.slick-current img {
            border: 2px solid #a2d2c9;
        }

        .slider-nav-thumbnails div.slick-slide {
            margin: 0 10px;
        }

        .slider-nav-thumbnails button {
            opacity: 0;
        }

        .slider-nav-thumbnails button.slick-arrow {
            margin: 0;
            border: 0;
            background: #F2F3F4;
            border-radius: 40px;
            width: 40px;
            height: 40px;
            line-height: 44px;
            font-size: 24px;
            z-index: 9;
            color: #7E7E7E;
        }

        .slider-nav-thumbnails button.slick-arrow:hover {
            color: #fff;
            background-color: #3BB77E;
        }

        .slider-nav-thumbnails button.slick-arrow.slick-prev {
            left: -20px;
        }

        .slider-nav-thumbnails button.slick-arrow.slick-next {
            right: -20px;
        }

        .slider-nav-thumbnails:hover button {
            opacity: 1;
        }

        .slider-nav-thumbnails .slick-prev,
        .slider-nav-thumbnails .slick-next {
            font-size: 12px;
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .product-rate {
            background-position: 0 -12px;
            background-repeat: repeat-x;
            height: 12px;
            width: 60px;
            transition: all 0.5s ease-out 0s;
            -webkit-transition: all 0.5s ease-out 0s;
        }

        .product-rating {
            height: 12px;
            background-repeat: repeat-x;
            background-position: 0 0;
        }

        .list-filter {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .list-filter li {
            display: inline-block;
        }

        .list-filter li a {
            color: #555;
            display: block;
            min-width: 30px;
            text-align: center;
            position: relative;
            transition: all 0.5s ease-out 0s;
            -webkit-transition: all 0.5s ease-out 0s;
        }

        .color-filter.list-filter a span {
            display: block;
            width: 26px;
            height: 26px;
            border-radius: 40px;
        }

        .color-filter.list-filter a span.product-color-white {
            border: 1px solid #ddd;
        }

        .color-filter.list-filter li.active a::before {
            content: "";
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
            position: absolute;
            right: 3px;
            top: -3px;
            background: #4cd964;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            border: 1px solid #fff;
        }

        .size-filter.list-filter a {
            border-radius: 5px;
            padding: 0 9px;
            background: #fff;
        }

        .size-filter.list-filter li a {
            color: #7E7E7E;
            height: 32px;
            line-height: 32px;
            min-width: 40px;
            text-align: center;
        }

        .size-filter.list-filter li a:hover,
        .size-filter.list-filter li.active a {
            color: #fff;
            background-color: #3BB77E;
            border-color: #3BB77E;
        }

        .detail-qty {
            max-width: 80px;
            padding: 9px 20px;
            position: relative;
            width: 100%;
            border-radius: 5px;
        }

        .detail-qty>a {
            font-size: 16px;
            position: absolute;
            right: 8px;
            color: #3BB77E;
        }

        .detail-qty>a:hover {
            color: #29A56C;
        }

        .detail-qty>a.qty-up {
            top: 0;
        }

        .detail-qty>a.qty-down {
            bottom: -4px;
        }

        .attr-detail .select-box select {
            height: 40px;
            width: 100%;
        }

        .attr-detail.attr-brand {
            margin-top: 23px;
        }

        .attr-detail.attr-brand .select-box {
            display: block;
            margin-bottom: 20px;
        }

        .attr-detail.attr-color table {
            margin-bottom: 15px;
        }

        .detail-extralink>div {
            display: inline-block;
            vertical-align: top;
        }

        .detail-extralink .detail-qty {
            margin: 0 6px 15px 0;
            background: #fff;
            border: 2px solid #3BB77E !important;
            font-size: 16px;
            font-weight: 700;
            color: #3BB77E;
            border-radius: 5px;
            padding: 11px 20px 11px 30px;
            max-width: 90px;
        }

        .stock-status {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-family: "Quicksand", sans-serif;
            font-size: 14px;
            font-weight: 700;
            line-height: 1;
        }

        .stock-status.in-stock {
            background: #DEF9EC;
            color: #3BB77E;
        }

        .stock-status.out-stock {
            color: #f74b81;
            background: #fde0e9;
        }

        .detail-info .product-price-cover {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .detail-info .product-price-cover .product-price {
            line-height: 1;
        }

        .detail-info .product-price {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 15px 0 30px 0;
        }

        .detail-info .product-price .current-price {
            font-size: 58px;
            text-decoration: none;
            font-weight: 900;
        }

        .detail-info .product-price .old-price {
            text-decoration: line-through;
            color: #B6B6B6;
            margin-left: 20px;
            font-size: 28px;
            font-weight: 700;
            display: block;
        }

        .detail-info .product-price .save-price {
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            color: #FDC040;
        }

        .detail-info .product-meta {
            border-top: 1px solid #ececec;
            padding-top: 15px;
        }

        .button.button-add-to-cart {
            padding: 8px 40px;
        }

        .product-extra-link2 a {
            background: #fff none repeat scroll 0 0;
            border: 1px solid #f1f1f1;
            color: #333;
            border-radius: 5px;
            display: inline-block;
            height: 50px;
            line-height: 55px;
            position: relative;
            text-align: center;
            vertical-align: top;
            width: 50px;
            margin: 0 5px;
            transition: all 0.5s ease-out 0s;
            -webkit-transition: all 0.5s ease-out 0s;
        }

        .product-extra-link2 a:hover {
            background-color: #3BB77E;
            color: #fff;
        }

        .product-extra-link2 a:hover i {
            opacity: 1;
        }

        .product-extra-link2 a i {
            font-size: 18px;
            opacity: 0.6;
        }

        .product-extra-link2 .button.button-add-to-cart {
            position: relative;
            padding: 0px 20px;
            border-radius: 5px;
            border: 0;
            height: 50px;
            line-height: 50px;
            font-weight: 700;
            font-size: 16px;
            font-family: "Quicksand", sans-serif;
        }

        .product-extra-link2 .button.button-add-to-cart i {
            margin-right: 10px;
        }

        .product-info {
            border: 1px solid #ececec;
            border-radius: 15px;
            padding: 40px 50px;
        }

        .tab-style3 .nav-tabs .nav-item a.active,
        .tab-style3 .nav-tabs .nav-item a:hover {
            color: #3BB77E;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .tab-style3 .nav-tabs li.nav-item a {
            display: block;
            padding: 13px 24px !important;
            text-align: center;
            font-weight: 700;
            font-family: "Quicksand", sans-serif;
            text-transform: none;
            font-size: 17px;
            border-radius: 30px;
            border: 1px solid #ececec;
            background: #fff;
            color: #7E7E7E;
        }

        .tab-content.shop_info_tab {
            margin-top: 40px;
        }

        .tab-pane .comments-area {
            padding-top: 0;
            border: 0;
        }

        .product-color-red {
            background: #ff596d;
        }

        .product-color-yellow {
            background: #ffdb33;
        }

        .product-color-white {
            background: #ffffff;
        }

        .product-color-orange {
            background: #ffbb51;
        }

        .product-color-cyan {
            background: #80e6ff;
        }

        .product-color-green {
            background: #38cf46;
        }

        .product-color-purple {
            background: #ff8ff8;
        }

        .detail-gallery .product-image-slider {
            background-color: #fff;
            margin-bottom: 30px;
            border-radius: 15px;
            border: 1px solid #ececec;
            overflow: hidden;
        }

        .detail-gallery .product-image-slider img {
            opacity: 1;
            border-radius: 16px;
        }

        .detail-gallery .product-image-slider.slider-nav-thumbnails {
            background: none;
            border-radius: 0;
        }

        .detail-gallery .product-image-slider button.slick-arrow {
            background: none;
            border: 0;
            padding: 0;
            font-size: 14px;
        }

        .detail-gallery .product-image-slider button.slick-arrow i {
            color: #adadad;
        }

        .mail-to-friend {
            color: #adadad;
            font-size: 12px;
        }

        .mail-to-friend i {
            margin-right: 5px;
        }

        .attr-color,
        .attr-size {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .product-detail-rating {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 15px 0;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .product-detail .section-title.style-1 {
            font-size: 22px;
        }

        .product-more-infor {
            padding: 0 0 0px 14px;
        }

        .product-more-infor li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin: 0 0 10px;
            position: relative;
        }

        .product-more-infor li ::before {
            position: absolute;
            left: -14px;
            top: 9px;
            content: "";
            height: 6px;
            width: 6px;
            border-radius: 100%;
            background-color: #9b9b9b;
        }

        .product-more-infor li span {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 165px;
            flex: 0 0 165px;
            display: inline-block;
        }

        .product-more-infor li:last-child {
            margin: 0 0 0;
        }

        .progress+.progress {
            margin-top: 1rem;
        }

        .progress span {
            line-height: 16px;
            background: #fff;
            padding-right: 10px;
            width: 45px;
        }

        .progress-bar {
            background-color: #3BB77E;
        }

        .shop-filter-toogle {
            margin-bottom: 20px;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
            border-radius: 30px;
            border: 1px solid #ececec;
            font-size: 17px;
            font-weight: 700;
            font-family: "Quicksand", sans-serif;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            padding: 10px 20px;
        }

        .shop-filter-toogle i {
            margin-left: 5px;
            color: #B6B6B6;
        }

        .shop-filter-toogle i.angle-down {
            opacity: 0;
            visibility: hidden;
            display: none;
        }

        .shop-filter-toogle .fi-rs-filter {
            font-size: 14px;
            color: #B6B6B6;
        }

        .shop-filter-toogle.active i.angle-down {
            opacity: 1;
            visibility: visible;
            display: inline-block;
        }

        .shop-filter-toogle.active i.angle-up {
            opacity: 0;
            visibility: hidden;
            display: none;
        }

        .shop-product-fillter-header .card {
            border: 1px solid #ececec;
            border-radius: 20px;
            margin-bottom: 50px;
            padding: 30px 40px;
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
        }

        .shop-product-fillter-header .categor-list li {
            font-size: 12px;
        }

        .shop-product-fillter-header .categor-list li+li {
            border-top: 1px solid #f7f8f9;
            padding-top: 5px;
            margin-top: 5px;
        }

        .shop-product-fillter-header .categor-list li a {
            font-size: 14px;
            color: #7E7E7E;
            margin-right: 10px;
        }

        .shop-product-fillter-header .categor-list li a:hover {
            color: #3BB77E;
        }

        .shop-product-fillter-header .color-filter {
            border-bottom: 1px solid #ececec;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .shop-product-fillter-header .product-rate-cover+.product-rate-cover {
            margin-top: 15px;
        }

        .shopping-summery table> :not(caption)>*>* {
            padding: 15px 0;
        }

        .shopping-summery table td,
        .shopping-summery table th,
        .shopping-summery table thead {
            border: 0;
        }

        .shopping-summery table thead th {
            background-color: #ececec;
            padding: 18px 0;
            font-family: "Quicksand", sans-serif;
            font-size: 17px;
            font-weight: 700;
            color: #253D4E;
        }

        .shopping-summery table thead th.start {
            border-radius: 20px 0 0 20px;
        }

        .shopping-summery table thead th.end {
            border-radius: 0 20px 20px 0;
        }

        .shopping-summery table tbody tr img {
            max-width: 120px;
            border: 1px solid #ececec;
            border-radius: 15px;
        }

        table.no-border td,
        table.no-border th,
        table.no-border thead {
            border: 0;
        }

        .shipping_calculator .custom_select .select2-container {
            max-width: unset;
        }

        .shipping_calculator .custom_select .select2-container--default .select2-selection--single {
            border-radius: 10px;
            height: 64px;
            line-height: 64px;
        }

        .shipping_calculator .custom_select .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 64px;
        }

        .shipping_calculator .custom_select .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 50%;
            right: 14px;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .shipping_calculator .w-100 .select2-container {
            max-width: unset;
            min-width: 445.5px;
        }

        .cart-totals {
            border-radius: 15px;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px 40px;
        }

        .order_review {
            border: 1px solid #ececec;
            padding: 30px;
            border-radius: 10px;
        }

        .toggle_info {
            padding: 12px 20px;
            background-color: #fff;
            border-radius: 10px;
            border: 1px solid #ececec;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .login_form .panel-body,
        .coupon_form .panel-body {
            border: 1px solid #ececec;
            padding: 30px;
            margin-top: 30px;
            border-radius: 10px;
        }

        .payment_option .custome-radio {
            margin-bottom: 10px;
        }

        .payment_option .custome-radio .form-check-label {
            color: #292b2c;
            font-weight: 600;
        }

        .custome-radio .form-check-label::before {
            content: "";
            border: 1px solid #908f8f;
            height: 16px;
            width: 16px;
            display: inline-block;
            border-radius: 100%;
            vertical-align: middle;
            margin-right: 8px;
        }

        .custome-radio input[type="radio"]+.form-check-label::after {
            content: "";
            height: 10px;
            width: 10px;
            border-radius: 100%;
            position: absolute;
            top: 9px;
            left: 3px;
            opacity: 0;
        }

        .custome-radio input[type="radio"]:checked+.form-check-label::after {
            opacity: 1;
            background-color: #3BB77E;
        }

        .related-products .product-img-action-wrap {
            padding: 0;
            margin-bottom: 15px;
        }

        .col-lg-4-5 .product-cart-wrap .product-action-1 a.action-btn {
            width: 35px;
        }

        .col-lg-4-5 .countdown-section .countdown-amount {
            width: 38px;
        }

        .zoomWindow {
            border-radius: 15px;
            overflow: hidden;
        }

        .table-wishlist {
            border: 0;
        }

        .apply-coupon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .apply-coupon input {
            height: 51px;
            border-radius: 10px 0 0 10px;
            background-image: url("../imgs/theme/icons/coupon.png");
            background-position: 20px center;
            background-repeat: no-repeat;
            padding-left: 50px;
        }

        .apply-coupon button {
            min-width: 150px;
            height: 51px;
            border-radius: 0 10px 10px 0;
            background-color: #253D4E;
        }

        .apply-coupon button:hover {
            background-color: #3BB77E;
        }

        .order_table table .product-thumbnail img {
            max-width: 120px;
            border-radius: 15px;
            border: 1px solid #ececec;
            padding: 5px;
        }

        .order_table table .w-160 {
            max-width: 160px;
        }

        .table.table-compare {
            border-radius: 15px;
        }

        .table.table-compare> :not(caption)>*>* {
            padding: 30px 0;
        }

        .mw-200 {
            min-width: 200px;
        }

        /*BLOG*/
        .archive-header {
            border-radius: 20px;
            padding: 70px 80px;
            background-size: cover;
        }

        .tags-list li {
            display: inline-block;
            margin: 0 15px 0 0;
        }

        .tags-list li a {
            background-color: #fff;
            display: inline-block;
            border-radius: 30px;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            padding: 10px 20px;
            border: 1px solid #ececec;
            font-family: "Quicksand", sans-serif;
            font-size: 17px;
            font-weight: 700;
        }

        .tags-list li a i {
            color: #B6B6B6;
            font-size: 10px;
        }

        .tags-list li.active a {
            color: #253D4E;
        }

        .post-list article:not(:last-child) {
            margin-bottom: 20px;
        }

        .post-list .post-thumb {
            max-width: 221px;
            overflow: hidden;
        }

        .post-list .post-thumb a {
            margin-bottom: 0;
        }

        .post-list .post-title {
            font-weight: 500;
        }

        .post-list .post-title a {
            color: #253D4E;
        }

        .single-content {
            text-rendering: optimizeLegibility;
            color: #253D4E;
            font-size: 17px;
        }

        .single-content h1 {
            font-size: 56px;
            line-height: 72px;
            margin-bottom: 32px;
        }

        .single-content h2 {
            font-size: 48px;
            line-height: 64px;
            margin-bottom: 30px;
        }

        .single-content h3 {
            font-size: 36px;
            line-height: 48px;
            margin-bottom: 28px;
        }

        .single-content h4 {
            font-size: 24px;
            line-height: 32px;
            margin-bottom: 26px;
        }

        .single-content h5 {
            font-size: 20px;
            line-height: 24px;
            margin-bottom: 24px;
        }

        .single-content h6 {
            font-size: 14px;
            line-height: 24px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .single-content p {
            margin-bottom: 1.2em;
            font-weight: 400;
        }

        .single-content ul {
            list-style: circle;
            padding-left: 1rem;
            font-size: 1rem;
        }

        .single-content ul li {
            position: relative;
            margin-bottom: 7px;
        }

        .single-content ol li {
            font-size: 1rem;
        }

        .single-content .single-excerpt {
            font-size: 24px;
            line-height: 32px;
        }

        .single-content p {
            color: #253D4E;
            font-size: 17px;
        }

        .single-content blockquote {
            background-color: #F4F6FA;
            padding: 40px 60px;
            border-radius: 15px;
            margin: 30px auto;
            font-size: 24px;
            max-width: 80%;
        }

        .single-content blockquote p {
            font-size: 24px;
            line-height: 32px;
            color: #7E7E7E;
            margin-bottom: 0;
        }

        .single-header {
            margin-bottom: 30px;
        }

        .single-header .entry-meta.meta-1 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-line-pack: center;
            align-content: center;
            -ms-flex-item-align: center;
            align-self: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .single-header .single-header-meta {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .single-header .single-header-meta .social-icons ul {
            margin-top: 15px;
        }

        .single-thumbnail {
            margin-bottom: 30px;
        }

        .single-thumbnail img {
            border-radius: 15px;
            overflow: hidden;
        }

        .entry-bottom {
            border-top: 1px solid #ececec;
            padding-top: 20px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .entry-bottom .social-icons ul {
            margin-top: 15px;
        }

        .entry-bottom .social-icons ul img {
            width: 20px;
            opacity: .6;
        }

        .author-bio {
            border-radius: 15px;
            border: 1px solid #ececec;
        }

        .author-bio .author-image {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: start;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .author-bio .author-image img {
            margin-right: 10px;
        }

        .author-bio .author-image p {
            font-size: 14px;
        }

        /*Entry meta*/
        .entry-meta {
            line-height: 1;
        }

        .entry-meta.meta-2 .author-img img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .entry-meta.meta-2 .author-name {
            text-transform: uppercase;
            font-weight: 600;
            font-size: 14px;
            display: inline-block;
            margin-top: 5px;
        }

        .entry-meta.meta-2 a.btn {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-item-align: center;
            align-self: center;
        }

        .entry-meta .author-add {
            font-size: 12px;
        }

        .entry-meta.meta-1 span {
            margin-right: 10px;
        }

        .entry-meta.meta-1 a.text-brand {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .entry-meta.meta-1 a.text-brand i {
            margin-left: 5px;
        }

        .entry-meta.meta-0 span {
            padding: 4px 10px 4px 19px;
            font-size: 11px;
            letter-spacing: 0.8px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 30px;
            position: relative;
            margin-left: -5px;
        }

        .entry-meta.meta-0 span::before {
            content: "";
            width: 6px;
            height: 6px;
            background: none;
            margin-right: 3px;
            border-radius: 5px;
            display: inline-block;
            position: absolute;
            top: 50%;
            left: 8px;
            margin-top: -3px;
            border: 1px solid #3BB77E;
        }

        .entry-meta .author-avatar img {
            max-width: 30px;
            margin-right: 5px;
        }

        span.has-dot {
            position: relative;
            padding-left: 10px;
        }

        span.has-dot::before {
            content: "";
            width: 4px;
            height: 4px;
            background: #d2d2d2;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            margin-top: -2px;
            display: block;
            left: -2px;
        }

        h6.post-title {
            font-size: 14px;
        }

        .post-title a {
            color: #253D4E;
        }

        .post-title a:hover {
            color: #3BB77E;
        }

        .post-thumb {
            overflow: hidden;
            position: relative;
        }

        .post-thumb.border-radius-5 img {
            border-radius: 5px;
        }

        .post-thumb a {
            line-height: 1;
        }

        .post-thumb .entry-meta {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        .post-thumb .entry-meta a {
            display: inline-block;
            color: #fff !important;
            background-color: #FDC040;
            border-radius: 4px;
            width: 32px;
            height: 32px;
            text-align: center;
            line-height: 35px;
        }

        /*Loop Grid*/
        .loop-grid {
            position: relative;
        }

        .loop-grid article {
            position: relative;
            background: #fff;
            overflow: hidden;
        }

        .loop-grid .entry-content {
            padding: 30px;
        }

        .loop-grid .entry-content-2 {
            padding: 20px 30px;
        }

        .loop-grid.loop-list {
            position: relative;
        }

        .loop-grid.loop-list article {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            border: 1px solid #ececec;
            border-radius: 15px;
        }

        .loop-grid.loop-list article:not(:last-child) {
            margin-bottom: 30px;
        }

        .loop-grid.loop-list article .post-thumb {
            min-height: 366px;
            min-width: 438px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            overflow: hidden;
            transition: all 0.4s ease;
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -ms-transition: all 0.4s ease;
        }

        .img-hover-slide {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            min-height: 280px;
            overflow: hidden;
            transition: all 0.4s ease;
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -ms-transition: all 0.4s ease;
        }

        .top-right-icon {
            position: absolute;
            bottom: 15px;
            right: 15px;
            border-radius: 5px;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            z-index: 3;
            color: #fff;
            transition: all 0.4s ease;
            -webkit-transition: all 0.4s ease;
            -moz-transition: all 0.4s ease;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            -ms-transition: all 0.4s ease;
        }

        .top-left-icon {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 3;
            display: inline-block;
            color: #fff !important;
            background-color: #FDC040;
            border-radius: 4px;
            width: 32px;
            height: 32px;
            text-align: center;
            line-height: 35px;
        }

        .entry-meta.meta-1,
        .entry-meta.meta-2 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .entry-meta.meta-1.meta-3,
        .entry-meta.meta-2.meta-3 {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: start;
        }

        .entry-meta a.read-more {
            font-size: 12px;
            border-radius: 30px;
            border: 1px solid #abd7ab;
            padding: 10px 15px;
            color: #98ca98;
            font-weight: 600;
            display: inline-block;
        }

        /** Print **/
        @media print {
            .back-top-home {
                display: none;
                opacity: 0;
                visibility: hidden;
            }

            .invoice-header,
            .invoice-top,
            .invoice-center,
            .invoice-bottom,
            .invoice-banner {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }

            .invoice-top .col-sm-9,
            .invoice-top .col-sm-3 {
                width: 50%;
            }

            .col-sm-12 {
                width: 100%;
            }

            .col-sm-11 {
                width: 91.66666667%;
            }

            .col-sm-10 {
                width: 83.33333333%;
            }

            .col-sm-9 {
                width: 75%;
            }

            .col-sm-8 {
                width: 66.66666667%;
            }

            .col-sm-7 {
                width: 58.33333333%;
            }

            .col-sm-6 {
                width: 50%;
            }

            .col-sm-5 {
                width: 41.66666667%;
            }

            .col-sm-4 {
                width: 33.33333333%;
            }

            .col-sm-3 {
                width: 25%;
            }

            .col-sm-2 {
                width: 16.66666667%;
            }

            .col-sm-1 {
                width: 8.33333333%;
            }

            .text-end {
                text-align: right !important;
            }

            .invoice-1 {
                padding: 0;
                background: #fff;
            }

            .invoice-1 .invoice-inner {
                background: #f8f8f8;
            }

            .invoice-1 .container {
                padding: 0px;
            }

            .invoice-1 .invoice-info {
                -webkit-box-shadow: none;
                box-shadow: none;
                margin: 0px;
            }
        }

        .invoice-content .invoice-header-1 {
            text-transform: uppercase;
            font-weight: 700;
        }

        .invoice-content .invoice-header-2 {
            text-transform: uppercase;
            font-weight: 600;
        }

        .invoice-content .invoice-title-1 {
            font-size: 18px;
        }

        .invoice-content .invoice-addr-1 {
            font-size: 15px;
            margin-bottom: 20px;
        }

        .invoice-content .item-desc-1 {
            text-align: left;
        }

        .invoice-content .item-desc-1 span {
            display: block;
        }

        .invoice-content .item-desc-1 small {
            display: block;
        }

        .invoice-content .important-notes-list-1 {
            font-size: 13px !important;
            padding-left: 15px;
            margin-bottom: 15px;
            list-style: disc;
        }

        .invoice-content .important-notes-list-1 li {
            margin-bottom: 5px;
        }

        .invoice-content .bank-transfer-list-1 {
            font-size: 13px !important;
            padding-left: 0px;
        }

        .invoice-content .important-notes {
            font-size: 12px !important;
        }

        .invoice-content .invoice-btn-section {
            text-align: center;
            margin-top: 30px;
        }

        .invoice-content .btn-lg {
            font-size: 16px;
            font-weight: 600;
            height: 50px;
            padding: 0 35px;
            line-height: 50px;
            border-radius: 3px;
            color: #ffffff;
            border: none;
            margin: 3px;
            display: inline-block;
            vertical-align: middle;
            -webkit-appearance: none;
            text-transform: capitalize;
            -webkit-transition: all 0.3s linear;
            transition: all 0.3s linear;
            z-index: 1;
            position: relative;
            overflow: hidden;
            text-align: center;
            font-family: "Quicksand", sans-serif;
        }

        .invoice-content .btn-check:focus+.btn,
        .invoice-content .btn:focus {
            outline: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .invoice-content .btn-download {
            background: #3BB77E;
        }

        .invoice-content .btn-download:after {
            background: #29A56C;
        }

        .invoice-content .btn-print {
            background: #253D4E;
        }

        .invoice-content .btn-print:after {
            background: #242424;
        }

        .invoice-content .invoice-content .invoice-table th:first-child,
        .invoice-content .invoice-content .invoice-table td:first-child {
            text-align: left;
        }

        .invoice-content .btn-custom {
            border: none;
            z-index: 1;
        }

        .invoice-content .btn-custom img {
            max-height: 14px;
            margin-right: 5px;
        }

        .invoice-content .btn-custom:after {
            position: absolute;
            content: "";
            width: 0;
            height: 100%;
            top: 0;
            right: 0;
            z-index: -1;
            -webkit-box-shadow: inset 0px 0px 0px 0px rgba(255, 255, 255, 0.5), 7px 7px 20px 0px rgba(0, 0, 0, 0.1), 4px 4px 5px 0px rgba(0, 0, 0, 0.1);
            box-shadow: inset 0px 0px 0px 0px rgba(255, 255, 255, 0.5), 7px 7px 20px 0px rgba(0, 0, 0, 0.1), 4px 4px 5px 0px rgba(0, 0, 0, 0.1);
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        .invoice-content .btn-custom:hover {
            color: #fff;
        }

        .invoice-content .btn-custom:hover:after {
            left: 0;
            width: 100%;
        }

        .invoice-content .btn-custom:active {
            top: 2px;
        }

        .invoice-content table thead {
            font-family: "Quicksand", sans-serif;
            color: #253D4E;
            font-weight: 700;
        }

        .invoice-content .f-w-600 {
            font-weight: 600;
        }

        .invoice-content .mobile-social-icon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-item-align: center;
            align-self: center;
        }

        .invoice-content .mobile-social-icon h6 {
            display: inline-block;
            margin-right: 15px;
            margin-bottom: 0;
        }

        .invoice-content .mobile-social-icon a {
            text-align: center;
            font-size: 14px;
            margin-right: 5px;
            -webkit-transition-duration: 0.5s;
            transition-duration: 0.5s;
            height: 30px;
            width: 30px;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            background: #3BB77E;
            border-radius: 30px;
            line-height: 1;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .invoice-content .mobile-social-icon a img {
            max-width: 16px;
        }

        .invoice-content .mobile-social-icon a img:hover {
            opacity: 0.8;
        }

        .invoice-content .mobile-social-icon a:hover {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
            -webkit-transition-duration: 0.5s;
            transition-duration: 0.5s;
            margin-top: -2px;
        }

        .invoice-content .mobile-social-icon a:last-child {
            margin-right: 0;
        }

        /** Invoice 1 **/
        .invoice {
            padding: 50px 0;
            background: #F2F3F4;
        }

        .invoice .invoice-info {
            background: #fff;
            margin-bottom: 30px;
            border-radius: 20px;
            -webkit-box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
            box-shadow: 20px 20px 54px rgba(0, 0, 0, 0.03);
        }

        .invoice .invoice-inner {
            max-width: 1296px;
            margin: 0 auto;
        }

        .invoice .item-desc-1 small {
            font-size: 14px;
        }

        .invoice .item-desc-1 span {
            font-size: 14px;
            font-weight: 600;
        }

        .invoice .invoice-header {
            padding: 80px 150px;
            border-radius: 20px 20px 0 0;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            position: relative;
        }

        .invoice .table-striped>tbody>tr:nth-of-type(odd) {
            --bs-table-accent-bg: rgb(255 255 255 / 5%);
            color: var(--bs-table-striped-color);
        }

        .invoice .invoice-top {
            padding: 40px 150px 25px 150px;
            font-size: 15px;
            border-bottom: 1px solid #ececec;
            margin-bottom: 50px;
        }

        .invoice .invoice-center {
            padding: 0 150px 40px;
        }

        .invoice .invoice-center .table {
            margin-bottom: 0;
        }

        .invoice .table-section {
            text-align: center;
        }

        .invoice .table> :not(caption)>*>* {
            padding: 15px 20px;
        }

        .invoice .table td {
            font-size: 15px;
            font-weight: 400;
        }

        .invoice table th {
            font-size: 15px;
        }

        .invoice .caption-top {
            caption-side: top;
            text-align: right;
            margin-bottom: 0;
        }

        .invoice .invoice-bottom {
            padding: 0 150px 25px;
        }

        .invoice .invoice-bottom .amount {
            text-align: right;
        }

        .invoice .invoice-bottom h3 {
            margin-bottom: 15px;
        }

        .invoice .bg-active {
            background: #f3f3f3;
            color: #535353 !important;
        }

        .invoice .invoice-contact {
            padding: 70px 150px 40px;
        }

        .invoice .social-list {
            float: left;
        }

        .invoice .social-list span {
            margin-right: 5px;
            font-weight: 500;
            font-size: 16px;
            color: #fff;
        }

        .invoice .social-list a {
            width: 50px;
            height: 50px;
            line-height: 50px;
            text-align: center;
            display: inline-block;
            font-size: 17px;
            background: #fff;
            margin: 0 2px 2px 0;
            color: #25cc7e;
            border-radius: 50%;
        }

        .invoice .social-list a:hover {
            background: #fff6f6;
        }

        .invoice-top .float-end p {
            margin-bottom: 0;
        }

        .invoice-1 .invoice-info-buttom .table .invoice-1 .invoice-info-buttom .table tr,
        .table tr {
            border: 1px solid #e9ecef;
        }

        .table> :not(caption)>*>* {
            background-color: var(--bs-table-bg);
            border-bottom-width: 0;
        }

        .invoice-1 .table td,
        .invoice-1 .table th {
            vertical-align: middle;
            border: none !important;
        }

        .invoice-1 .invoice-header {
            background: rgba(0, 0, 0, 0.04) url(../imgs/invoice/header-bg-1.png) top left repeat;
        }

        .invoice-2 .invoice-info {
            border-radius: 0;
        }

        .invoice-2 .invoice-header {
            border-bottom: 1px solid #ececec;
        }

        .invoice-3 .invoice-header {
            background: url(../imgs/invoice/header-bg-2.jpg) top left no-repeat;
            background-size: cover;
            padding: 50px 150px;
            color: #fff;
        }

        .invoice-3 .invoice-table thead {
            color: #fff !important;
            background-color: #3BB77E;
        }

        .invoice-4 .invoice-info {
            border-radius: 5px;
        }

        .invoice-4 .invoice-header {
            border-bottom: 1px solid #ececec;
            padding: 50px 150px 30px 150px;
            margin-bottom: 50px;
        }

        .invoice-4 .invoice-bottom .hr {
            width: 100%;
            height: 1px;
            background-color: #ececec;
        }

        .invoice-5 .invoice-info {
            border-radius: 0;
        }

        .invoice-5 .invoice-header {
            padding: 50px 150px;
        }

        .invoice-5 .invoice-banner {
            padding: 0 150px 50px 150px;
        }

        .invoice-5 .invoice-bottom .hr {
            width: 100%;
            height: 1px;
            background-color: #ececec;
        }

        .invoice-6.invoice {
            background-color: #fff;
        }

        .invoice-6 .invoice-info {
            border-radius: 10px;
            border: 1px solid #BCE3C9;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .invoice-6 .hr {
            width: 100%;
            height: 1px;
            background-color: #3BB77E;
        }

        .invoice-6 .invoice-header {
            background-color: #f7f8f9;
            padding: 80px 150px 50px 150px;
            margin-bottom: 50px;
            border-radius: 10px 10px 0 0;
        }

        .invoice-6 .invoice-icon {
            border-radius: 0 10px 0 0;
        }

        .invoice-icon {
            position: absolute;
            width: 70px;
            height: 70px;
            top: 0;
            right: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            background-color: #3BB77E;
        }

        .invoice-icon img {
            width: 30px;
        }

        /*Responsive*/
        @media only screen and (max-width: 992px) {
            .invoice .invoice-header {
                padding: 80px 50px;
            }

            .invoice .invoice-top {
                padding: 40px 50px 25px 50px;
            }

            .invoice .invoice-center {
                padding: 0 50px 40px;
            }

            .invoice .invoice-bottom {
                padding: 0 50px 25px;
            }

            .invoice .back-top-home {
                margin-bottom: 30px;
                text-align: center;
            }
        }

        .vendor-wrap {
            position: relative;
            background-color: #fff;
            border: 1px solid #ececec;
            border-radius: 15px;
            overflow: hidden;
            transition: .2s;
            -moz-transition: .2s;
            -webkit-transition: .2s;
            -o-transition: .2s;
        }

        .vendor-wrap:hover {
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            border: 1px solid #BCE3C9;
            transition: .2s;
            -moz-transition: .2s;
            -webkit-transition: .2s;
            -o-transition: .2s;
        }

        .vendor-wrap .vendor-img-action-wrap {
            padding: 25px 25px 0 25px;
        }

        .vendor-wrap .vendor-img-action-wrap img {
            max-width: 144px;
        }

        .vendor-wrap .vendor-content-wrap {
            padding: 20px 20px 30px 20px;
        }

        .vendor-wrap .vendor-content-wrap h4 a {
            color: #253D4E;
        }

        .vendor-wrap .vendor-content-wrap h4 a:hover {
            color: #3BB77E;
        }

        .vendor-wrap .vendor-content-wrap .total-product {
            position: relative;
            display: inline-block;
            padding: 6px 20px 6px 20px;
            border-radius: 4px;
            background-color: #DEF9EC;
            font-size: 14px;
            font-weight: 700;
            color: #3BB77E;
            min-width: 123px;
        }

        .vendor-wrap .product-badges.product-badges-position {
            position: absolute;
            right: 0;
            top: 0px;
            z-index: 9;
        }

        .vendor-wrap .product-badges.product-badges-position span {
            display: inline-block;
            font-size: 12px;
            line-height: 1;
            border-radius: 0px 10px 0 20px;
            color: #fff;
            padding: 9px 20px 10px 20px;
            background-color: #3BB77E;
        }

        .vendor-wrap .product-badges.product-badges-position span.hot {
            background-color: #f74b81;
        }

        .vendor-wrap .product-badges.product-badges-position span.new {
            background-color: #3BB77E;
        }

        .vendor-wrap .product-badges.product-badges-position span.sale {
            background-color: #67bcee;
        }

        .vendor-wrap .product-badges.product-badges-position span.best {
            background-color: #f59758;
        }

        .vendor-wrap.style-2 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .vendor-wrap.style-2 .vendor-img-action-wrap {
            position: relative;
            padding: 20px;
        }

        .vendor-wrap.style-2 .vendor-img-action-wrap .total-product {
            position: relative;
            display: inline-block;
            padding: 6px 20px 6px 20px;
            border-radius: 4px;
            background-color: #DEF9EC;
            font-size: 14px;
            font-weight: 700;
            color: #3BB77E;
            min-width: 123px;
        }

        .vendor-wrap.style-2 .vendor-info .btn {
            min-width: 105px;
            padding: 8px 10px 8px 13px;
        }

        .archive-header-2 .search-form input {
            border-radius: 30px;
            padding-left: 30px;
            -webkit-box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
            box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
        }

        .archive-header-3 {
            position: relative;
            border-radius: 20px;
            padding: 50px;
        }

        .archive-header-3 .archive-header-3-inner {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        /*LAYOUT -> HEADER STYLE*/
        /*Header default*/
        .header-top-ptb-1 {
            padding: 7px 0;
            border-bottom: 1px solid #ececec;
            font-size: 13px;
            line-height: 1;
        }

        .header-top-ptb-1 #news-flash {
            min-width: 400px;
            font-size: 14px;
            line-height: 10px;
            font-weight: 600;
        }

        .header-top-ptb-1 #news-flash li {
            min-height: 14px;
        }

        .header-top-ptb-1 #news-flash i {
            line-height: 6px;
            margin-right: 5px;
        }

        .header-info-right {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
        }

        .header-info>ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .header-info>ul>li {
            margin-right: 20px;
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header-info>ul>li:before {
            content: '';
            position: absolute;
            right: -10px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            width: 1px;
            height: 10px;
            background: #dedfe2;
        }

        .header-info>ul>li:last-child {
            margin-right: 0;
        }

        .header-info>ul>li:last-child:before {
            display: none;
        }

        .header-info>ul>li a {
            color: #7E7E7E;
            font-weight: 500;
        }

        .header-info>ul>li a i {
            font-size: 12px;
            margin-right: 5px;
        }

        .header-info>ul>li a.language-dropdown-active i.fa-chevron-down {
            font-size: 8px;
            margin-left: 5px;
        }

        .header-info>ul>li>ul.language-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 2;
            min-width: 120px;
            background: #fff;
            border-radius: 0 0 4px 4px;
            -webkit-transform: translateY(20px);
            transform: translateY(20px);
            visibility: hidden;
            opacity: 0;
            padding: 10px 15px;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            border: 1px solid #ececec;
        }

        .header-info>ul>li>ul li {
            display: block;
        }

        .header-info>ul>li>ul li a {
            display: block;
            color: #696969;
            padding: 5px;
        }

        .header-info>ul>li>ul li a:hover {
            color: #3BB77E;
            background-color: none;
        }

        .header-info>ul>li>ul li a img {
            max-width: 15px;
            display: inline-block;
            margin-right: 5px;
        }

        .header-info>ul>li:hover>a {
            color: #333;
        }

        .header-info>ul>li:hover>ul.language-dropdown {
            visibility: visible;
            opacity: 1;
            -webkit-transform: translateY(0);
            transform: translateY(0);
            top: 25px;
        }

        .header-info i {
            font-size: 12px;
            margin-right: 5px;
            line-height: 6px;
        }

        .header-wrap {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header-wrap .header-nav {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header-wrap.header-space-between {
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .header-wrap .header-right {
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .logo a {
            display: block;
        }

        .logo.logo-width-1 {
            margin-right: 70px;
        }

        .logo.logo-width-1 a img {
            width: 180px;
            min-width: 180px;
        }

        .search-style-1 form {
            width: 370px;
            position: relative;
        }

        .search-style-1 form input {
            font-size: 16px;
            height: 48px;
            color: #253D4E;
            border-radius: 26px;
            padding: 3px 50px 3px 20px;
            border: 1px solid #f5f5f5;
            background-color: #f5f5f5;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .header-action .header-action-icon.header-action-mrg-none2 {
            margin-right: 0px;
        }

        .header-action .header-action-icon:last-child {
            margin-right: 0;
        }

        .header-action .header-action-icon>a span.pro-count {
            position: absolute;
            right: -5px;
            bottom: -4px;
            color: #ffffff;
            height: 20px;
            width: 20px;
            border-radius: 100%;
            font-weight: 700;
            font-size: 12px;
            text-align: center;
            line-height: 20px;
        }

        .header-action-2 {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header-action-2 .header-action-icon-2 span.lable {
            font-size: 16px;
            margin: 5px 0 0 10px;
        }

        .header-action-2 .header-action-icon-2:last-child {
            padding: 0 0px 0 8px;
        }

        .header-action-2 .header-action-icon-2>a {
            font-size: 30px;
            color: #333;
            line-height: 1;
            display: inline-block;
            position: relative;
        }

        .header-action-2 .header-action-icon-2>a img {
            width: 100%;
            max-width: 25px;
        }

        .header-action-2 .header-action-icon-2>a span {
            font-size: 14px;
            color: #7E7E7E;
        }

        .header-action-2 .header-action-icon-2>a span.pro-count {
            position: absolute;
            right: -11px;
            top: -5px;
            color: #ffffff;
            height: 20px;
            width: 20px;
            border-radius: 100%;
            font-weight: 500;
            font-size: 12px;
            text-align: center;
            line-height: 20px;
        }

        .cart-dropdown-wrap ul li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 0 0 20px;
        }

        .cart-dropdown-wrap ul li .shopping-cart-img a {
            display: block;
        }

        .header-height-2 {
            border-bottom: 1px solid #ececec;
        }

        .header-height-3 {
            min-height: 132px;
        }

        .header-height-4 {
            min-height: 120px;
        }

        .search-popup-wrap.search-visible {
            visibility: visible;
            opacity: 1;
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
        }

        .mobile-header-wrapper-style.sidebar-visible {
            visibility: visible;
            opacity: 1;
            -webkit-transform: translate(0, 0);
            transform: translate(0, 0);
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-top .mobile-header-logo a {
            display: block;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav {
            height: 100%;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .main-categori-wrap a i {
            margin-right: 15px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .main-categori-wrap .categori-dropdown-active-small {
            background-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding: 0;
        }

        .header-action-right {
            display: none;
        }

        .header-action-right .search-location {
            display: none;
        }

        .search-style-1 {
            margin-right: 28px;
        }

        .search-style-1 form input::-moz-input-placeholder {
            color: #253D4E;
            opacity: 1;
        }

        .search-style-1 form input::-webkit-input-placeholder {
            color: #253D4E;
            opacity: 1;
        }

        .search-style-1 form input:focus {
            border: 1px solid #3BB77E;
            background-color: #ffffff;
        }

        .search-style-1 form button {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            border: none;
            font-size: 19px;
            height: 100%;
            padding: 0 15px;
            background-color: transparent;
            color: #3BB77E;
        }

        .search-style-1 form button:hover {
            color: #5a97fa;
        }

        .header-action {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .header-action .header-action-icon {
            margin-right: 28px;
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .header-action .header-action-icon.header-action-mrg-none {
            margin-right: 13px;
        }

        .header-action .header-action-icon>a {
            font-size: 24px;
            color: #333;
            line-height: 1;
            display: inline-block;
            position: relative;
        }

        .header-action .header-action-icon>a span.pro-count.blue {
            background-color: #3BB77E;
        }

        .header-action .header-action-icon:hover>a {
            color: #3BB77E;
        }

        .header-action .header-action-icon:hover .cart-dropdown-wrap {
            opacity: 1;
            visibility: visible;
            top: calc(100% + 10px);
        }

        .header-action.header-action-hm3 .header-action-icon.header-action-mrg-none2 {
            margin-right: 0px;
        }

        .header-action.header-action-hm3 .header-action-icon:last-child {
            margin-right: 0;
        }

        .header-action-2 .header-action-icon-2 {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            padding: 0 10px;
        }

        .header-action-2 .header-action-icon-2>a svg {
            width: 1em;
            height: 1em;
        }

        .header-action-2 .header-action-icon-2>a span.pro-count.blue {
            background-color: #3BB77E;
        }

        .header-action-2 .header-action-icon-2:hover>a {
            color: #3BB77E;
            fill: #3BB77E;
        }

        .header-action-2 .header-action-icon-2:hover .cart-dropdown-wrap {
            opacity: 1;
            visibility: visible;
            top: calc(100% + 10px);
        }

        .header-middle-ptb-1 {
            padding: 25px 0 0 0;
        }

        .cart-dropdown-wrap {
            position: absolute;
            right: 0;
            top: calc(100% + 20px);
            z-index: 99;
            width: 320px;
            background-color: #fff;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px 20px 27px;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            border-radius: 10px;
            border: 1px solid #ececec;
        }

        .cart-dropdown-wrap.cart-dropdown-hm2 {
            right: 0;
        }

        .cart-dropdown-wrap.account-dropdown {
            width: 200px;
        }

        .cart-dropdown-wrap.account-dropdown a {
            color: #253D4E;
        }

        .cart-dropdown-wrap.account-dropdown a:hover {
            color: #3BB77E;
        }

        .cart-dropdown-wrap ul li:last-child {
            margin: 0 0 0px;
        }

        .cart-dropdown-wrap ul li .shopping-cart-img {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 80px;
            flex: 0 0 80px;
            margin-right: 20px;
        }

        .cart-dropdown-wrap ul li .shopping-cart-img a img {
            max-width: 100%;
        }

        .cart-dropdown-wrap ul li .shopping-cart-title {
            margin: 6px 0 0;
        }

        .cart-dropdown-wrap ul li .shopping-cart-title h4 {
            font-size: 16px;
            font-weight: 500;
            line-height: 1;
            margin: 0 0 9px;
        }

        .cart-dropdown-wrap ul li .shopping-cart-title h4 a {
            color: #3BB77E;
        }

        .cart-dropdown-wrap ul li .shopping-cart-title h4 a:hover {
            color: #253D4E;
        }

        .cart-dropdown-wrap ul li .shopping-cart-title h3 {
            font-size: 18px;
            font-weight: 700;
            line-height: 1;
            margin: 0 0 0px;
            color: #3BB77E;
        }

        .cart-dropdown-wrap ul li .shopping-cart-title h3 span {
            color: #696969;
            font-weight: 400;
            font-size: 16px;
        }

        .cart-dropdown-wrap ul li .shopping-cart-delete {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 100;
            -ms-flex-positive: 100;
            flex-grow: 100;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            margin: 6px 0 0;
        }

        .cart-dropdown-wrap ul li .shopping-cart-delete a {
            font-size: 18px;
            color: #696969;
        }

        .cart-dropdown-wrap ul li .shopping-cart-delete a:hover {
            color: #333;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-total {
            border-top: 2px solid #f3f3f3;
            margin: 25px 0;
            padding: 17px 0 0;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-total h4 {
            color: #9b9b9b;
            font-weight: 700;
            font-size: 16px;
            margin: 0;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-total h4 span {
            font-size: 18px;
            float: right;
            color: #3BB77E;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            width: 100%;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-top: 20px;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-item-align: center;
            align-self: center;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button a {
            display: inline-block;
            font-size: 14px;
            color: #ffffff;
            border-radius: 4px;
            line-height: 1;
            padding: 10px 20px;
            background-color: #3BB77E;
            font-family: "Quicksand", sans-serif;
            border: 2px solid #3BB77E;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button a.outline {
            background-color: transparent;
            border: 2px solid #3BB77E;
            color: #3BB77E;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button a.outline:hover {
            color: #ffffff;
        }

        .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button a:hover {
            background-color: #FDC040;
        }

        .sticky-bar.stick {
            -webkit-animation: 700ms ease-in-out 0s normal none 1 running fadeInDown;
            animation: 700ms ease-in-out 0s normal none 1 running fadeInDown;
            -webkit-box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.05);
            box-shadow: 0 8px 20px 0 rgba(0, 0, 0, 0.05);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
            left: 0;
            -webkit-transition: all .3s ease 0s;
            transition: all .3s ease 0s;
            border-bottom: 2px solid #FDC040;
            background: #fff;
        }

        .sticky-bar.stick.sticky-white-bg {
            background-color: #fff;
        }

        .sticky-bar.stick.sticky-blue-bg {
            background-color: #3286e0;
        }

        .header-height-1 {
            min-height: 133px;
        }

        .search-style-2 {
            width: 100%;
        }

        .search-style-2 form {
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: relative;
        }

        .search-style-2 form select {
            color: #253D4E;
            font-size: 16px;
            font-weight: 700;
            min-height: 50px;
            border: 1px solid #ececec;
            border-right: none;
            width: 140px;
            padding: 3px 35px 3px 20px;
            border-radius: 4px 0 0 4px;
            background-color: #fff;
            -webkit-transition: all .3s ease 0s;
            transition: all .3s ease 0s;
            -moz-appearance: none;
            -webkit-appearance: none;
            position: relative;
        }

        .search-style-2 form select:focus {
            color: #333;
        }

        .search-style-2 form select::after {
            position: absolute;
        }

        .search-style-2 form input {
            width: 100%;
            max-width: 683px;
            font-size: 14px;
            background-repeat: no-repeat;
            background-position: center right;
            padding-left: 0;
            height: 50px;
            line-height: 50px;
            font-size: 14px;
        }

        .search-style-2 form input::-moz-input-placeholder {
            opacity: 1;
        }

        .search-style-2 form input::-webkit-input-placeholder {
            opacity: 1;
        }

        .search-style-2 form input:focus {
            border-color: #414648;
            border-width: 0 0 3px 0;
            border-style: solid;
        }

        .search-style-2 form button {
            position: absolute;
            right: 0px;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            background-color: transparent;
            padding: 0;
            border: none;
            font-size: 20px;
            color: #3BB77E;
            height: 100%;
            padding: 5px 17px;
        }

        .header-bottom-shadow {
            -webkit-box-shadow: 0 1px 20px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 20px rgba(0, 0, 0, 0.05);
        }

        .header-bottom .header-action-right a span.pro-count {
            background-color: #3BB77E;
            color: #fff;
        }

        .search-style-3 {
            margin-bottom: 10px;
        }

        .search-style-3 form {
            position: relative;
        }

        .search-style-3 form input {
            font-size: 14px;
            height: 45px;
            color: #253D4E;
            background-color: #F2F3F4;
            border-radius: 5px;
            padding: 3px 50px 3px 20px;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            border: 0;
        }

        .search-style-3 form input::-moz-input-placeholder {
            color: #253D4E;
            opacity: 1;
        }

        .search-style-3 form input::-webkit-input-placeholder {
            color: #253D4E;
            opacity: 1;
        }

        .search-style-3 form input:focus {
            border: 1px solid #BCE3C9;
        }

        .search-style-3 form button {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            border: none;
            font-size: 16px;
            height: 100%;
            padding: 0 14px;
            background-color: transparent;
            color: #333;
        }

        .search-style-3 form button:hover {
            color: #3BB77E;
        }

        .search-popup-wrap {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            opacity: 0;
            visibility: hidden;
            background-color: white;
            -webkit-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            z-index: 99999;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .search-popup-wrap .search-popup-content form input {
            width: 1170px;
            background-color: transparent;
            border: 0;
            border-bottom: 3px solid #3BB77E;
            font-size: 50px;
            padding: 21px 50px 16px 0px;
            color: #919191;
            font-weight: 300;
            max-width: 100%;
            height: auto;
            -webkit-transform: translate(0, 50px);
            transform: translate(0, 50px);
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
            opacity: 0;
            -webkit-transition: all .5s ease-in-out, opacity .5s linear;
            transition: all .5s ease-in-out, opacity .5s linear;
        }

        .search-popup-wrap .search-popup-content form input::-moz-input-placeholder {
            color: #919191;
            opacity: 1;
        }

        .search-popup-wrap .search-popup-content form input::-webkit-input-placeholder {
            color: #919191;
            opacity: 1;
        }

        .search-popup-wrap.search-visible .search-popup-content form input {
            -webkit-transform: none;
            transform: none;
            opacity: 1;
            -webkit-transition-delay: .6s;
            transition-delay: .6s;
        }

        .close-style-wrap {
            position: absolute;
            right: 55px;
            top: 40px;
        }

        .close-style-wrap.close-style-position-inherit {
            position: inherit;
        }

        .close-style-wrap .close-style {
            position: relative;
            background-color: transparent;
            padding: 0;
            border: none;
            width: 26px;
            height: 26px;
            background-color: #DEF9EC;
            border-radius: 30px;
        }

        .close-style-wrap .close-style>i {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 10px;
            height: 1px;
            margin: 0 !important;
            -webkit-transform-origin: center;
            transform-origin: center;
            display: block;
            overflow: hidden;
        }

        .close-style-wrap .close-style>i.icon-top {
            -webkit-transform: translate(-50%, -50%) rotate(45deg);
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .close-style-wrap .close-style>i.icon-top::before {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s, -webkit-transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
            -webkit-transform: scaleX(1) translateZ(0);
            transform: scaleX(1) translateZ(0);
            -webkit-transform-origin: right;
            transform-origin: right;
        }

        .close-style-wrap .close-style>i.icon-top::after {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            -webkit-transform: scaleX(0) translateZ(0);
            transform: scaleX(0) translateZ(0);
            -webkit-transform-origin: left;
            transform-origin: left;
        }

        .close-style-wrap .close-style>i.icon-bottom {
            -webkit-transform: translate(-50%, -50%) rotate(-45deg);
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        .close-style-wrap .close-style>i.icon-bottom::before {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s, -webkit-transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1) 0.2s;
            -webkit-transform: scaleX(1) translateZ(0);
            transform: scaleX(1) translateZ(0);
            -webkit-transform-origin: right;
            transform-origin: right;
        }

        .close-style-wrap .close-style>i.icon-bottom::after {
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1), -webkit-transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            -webkit-transform: scaleX(0) translateZ(0);
            transform: scaleX(0) translateZ(0);
            -webkit-transform-origin: left;
            transform-origin: left;
        }

        .close-style-wrap .close-style:hover {
            -webkit-transform: rotateZ(360deg);
            transform: rotateZ(360deg);
        }

        .close-style-wrap .close-style>i::before,
        .close-style-wrap .close-style>i::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
            background-color: #111;
        }

        .burger-icon {
            position: relative;
            width: 24px;
            height: 20px;
            cursor: pointer;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .burger-icon>span {
            display: block;
            position: absolute;
            left: 0;
            width: 100%;
            height: 2px;
        }

        .burger-icon>span.burger-icon-top {
            top: 2px;
        }

        .burger-icon>span.burger-icon-bottom {
            bottom: 2px;
        }

        .burger-icon>span.burger-icon-mid {
            top: 9px;
        }

        .burger-icon>span::before,
        .burger-icon>span::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            content: "";
            background-color: #333;
        }

        .burger-icon.burger-icon-white>span::before,
        .burger-icon.burger-icon-white>span::after {
            background-color: #253D4E;
        }

        .body-overlay-1 {
            background: rgba(0, 0, 0, 0.7) none repeat scroll 0 0;
            height: 100%;
            left: 0;
            opacity: 0;
            position: fixed;
            top: 0;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            visibility: hidden;
            width: 100%;
            cursor: crosshair;
            z-index: 9999;
        }

        .mobile-menu-active .body-overlay-1 {
            opacity: 1;
            visibility: visible;
        }

        .main-wrapper {
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        .mobile-header-wrapper-style {
            position: fixed;
            top: 0;
            width: 360px;
            min-height: 100vh;
            bottom: 0;
            left: 0;
            visibility: hidden;
            opacity: 0;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            -webkit-transform: translate(-200px, 0);
            transform: translate(-200px, 0);
            background-color: #ffffff;
            -webkit-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.09);
            box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.09);
            z-index: 99999;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner {
            padding: 0px 0px 30px;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-top {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            padding: 20px 30px;
            background-color: #ffffff;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-top .mobile-header-logo a img {
            width: 100px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area {
            padding: 30px 30px 30px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li {
            display: block;
            position: relative;
            padding: 13px 0;
            border-bottom: 1px solid #ececec;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li:last-child {
            border-bottom: none;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li.menu-item-has-children .menu-expand {
            right: 0;
            position: absolute;
            cursor: pointer;
            z-index: 9;
            text-align: center;
            font-size: 12px;
            display: block;
            width: 30px;
            height: 30px;
            line-height: 38px;
            top: 5px;
            color: #253D4E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li.menu-item-has-children .menu-expand i {
            font-size: 14px;
            font-weight: 300;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li.menu-item-has-children.active>.menu-expand {
            background: rgba(255, 255, 255, 0.2);
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li.menu-item-has-children.active>.menu-expand i::before {
            content: "\f112";
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li a {
            font-size: 14px;
            line-height: 1;
            text-transform: capitalize;
            font-weight: 700;
            position: relative;
            display: inline-block;
            color: #253D4E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li a i {
            margin-right: 5px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li ul {
            padding: 10px 0 0 10px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li ul li {
            padding: 10px 0;
            border-bottom: none;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li ul li.menu-item-has-children .menu-expand {
            top: 0px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li ul li a {
            font-size: 14px;
            display: block;
            font-weight: 500;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li ul li ul {
            margin-top: 0;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li ul li.menu-item-has-children.active {
            padding-bottom: 0;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-menu-wrap nav .mobile-menu li:hover>a {
            color: #3BB77E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .categories-dropdown-wrap ul li a {
            padding: 5px 15px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap {
            padding: 20px;
            border-radius: 5px;
            border: 1px solid #ececec;
            margin: 17px 0 30px 0;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info {
            position: relative;
            margin-bottom: 13px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info:last-child {
            margin-bottom: 0;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info a {
            font-size: 14px;
            display: block;
            font-weight: 500;
            color: #253D4E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info a:hover {
            color: #3BB77E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info a i {
            font-size: 14px;
            color: #3BB77E;
            margin-right: 8px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info .lang-curr-dropdown {
            margin-top: 5px;
            display: none;
            background-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
            padding: 10px 0 0 0;
            width: 100%;
            z-index: 11;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info .lang-curr-dropdown ul li {
            padding-bottom: 10px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info .lang-curr-dropdown ul li:last-child {
            padding-bottom: 0px;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info .lang-curr-dropdown ul li a {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 400;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info .lang-curr-dropdown ul li a:hover {
            color: #3BB77E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-info-wrap .single-mobile-header-info:hover>a {
            color: #253D4E;
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .mobile-header-border {
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area .site-copyright {
            font-size: 13px;
            color: #B6B6B6;
        }

        .mobile-social-icon a {
            text-align: center;
            font-size: 14px;
            margin-right: 5px;
            -webkit-transition-duration: 0.5s;
            transition-duration: 0.5s;
            height: 30px;
            width: 30px;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            background: #3BB77E;
            border-radius: 30px;
            line-height: 1;
            -ms-flex-line-pack: center;
            align-content: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .mobile-social-icon a img {
            max-width: 16px;
        }

        .mobile-social-icon a img:hover {
            opacity: 0.8;
        }

        .mobile-social-icon a:hover {
            -webkit-transform: translateY(-2px);
            transform: translateY(-2px);
            -webkit-transition-duration: 0.5s;
            transition-duration: 0.5s;
            margin-top: -2px;
        }

        .mobile-social-icon a:last-child {
            margin-right: 0;
        }

        .mobile-search {
            padding: 0 0 10px 0;
        }

        .hotline img {
            min-width: 35px;
            margin-right: 12px;
        }

        .hotline p {
            color: #3BB77E;
            font-size: 26px;
            font-weight: 700;
            font-family: "Quicksand", sans-serif;
            display: block;
            line-height: 1;
        }

        .hotline p span {
            font-weight: 500;
            font-size: 12px;
            font-family: "Lato", sans-serif;
            color: #7E7E7E;
            display: block;
            letter-spacing: 0.9px;
        }

        /* Header style 1 */
        .header-style-1 {
            position: relative;
            overflow-x: clip;
        }

        .header-style-1.header-height-2 {
            border-bottom: 0;
        }

        .header-style-1 .header-top-ptb-1 {
            background-image: none;
            padding: 10px 0;
        }

        .header-style-1 .header-top-ptb-1 .language-dropdown a {
            color: #253D4E;
        }

        .header-style-1 .header-middle-ptb-1 {
            padding: 30px 0;
        }

        .header-style-1 .select2-container {
            max-width: unset;
            min-width: 150px;
        }

        .header-style-1 .select2-container--default .select2-selection--single {
            border: 0;
            height: 50px;
            line-height: 50px;
            padding-left: 20px;
            width: 155px;
            max-width: unset;
            border-radius: 5px 0 0 5px;
        }

        .header-style-1 .select2-container--default .select2-selection--single .select2-selection__arrow {
            right: 10px;
        }

        .header-style-1 .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border: 0;
        }

        .header-style-1 .select2-container--default .select2-selection--single .select2-selection__arrow b::after {
            font-family: uicons-regular-straight !important;
            font-style: normal;
            font-weight: normal !important;
            font-variant: normal;
            text-transform: none;
            line-height: 1 !important;
            content: "\f10f";
            position: absolute;
            top: -4px;
        }

        .header-style-1 .select2-container--default .select2-selection--single .select2-selection__rendered {
            height: 50px;
            line-height: 50px;
            position: relative;
        }

        .header-style-1 .select2-container--default .select2-selection--single .select2-selection__rendered:after {
            content: '';
            height: 20px;
            width: 1px;
            background-color: #CACACA;
            position: absolute;
            right: 0;
            top: 15px;
        }

        .header-style-1 .search-location .select2-container--default .select2-selection--single {
            border: 0;
            height: 40px;
            line-height: 40px;
            padding-left: 13px;
            width: 164px;
            max-width: unset;
            border-radius: 5px;
            background-color: #fff;
            border: 1px solid #ececec;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .header-style-1 .search-location .select2-container--default .select2-selection--single:hover {
            -webkit-transform: translateY(-3px);
            transform: translateY(-3px);
            -webkit-transition: 0.2s;
            transition: 0.2s;
        }

        .header-style-1 .search-location .select2-container--default .select2-selection--single .select2-selection__arrow {
            right: 10px;
            top: 7px;
        }

        .header-style-1 .search-location .select2-container--default .select2-selection--single .select2-selection__rendered {
            height: 40px;
            line-height: 35px;
            position: relative;
            color: #3BB77E;
            font-weight: 500;
        }

        .header-style-1 .search-location .select2-container--default .select2-selection--single .select2-selection__rendered:after {
            content: none;
        }

        .header-style-1 .search-location .select2-container--default .select2-selection--single .select2-selection__rendered:before {
            font-family: uicons-regular-straight !important;
            content: "\f1c6";
            color: #B6B6B6;
            margin-right: 7px;
            display: inline-block;
        }

        .header-style-1 .search-location .select2-container {
            max-width: unset;
            min-width: 158px;
            max-width: 158px;
            margin-right: 30px;
        }

        .header-style-1 .search-style-2 form {
            border: 2px solid #BCE3C9;
            border-radius: 4px;
            max-width: 700px;
            background-color: #fff;
        }

        .header-style-1 .search-style-2 form input {
            max-width: 600px;
            border-width: 0px;
            border-radius: 0 5px 5px 0;
            margin-left: 20px;
            background-color: #fff;
            border: none;
        }

        .header-style-1 .header-bottom-bg-color {
            background-color: #fff;
            border-top: 1px solid #ececec;
            border-bottom: 1px solid #ececec;
        }

        .header-style-1 .main-categori-wrap>a {
            color: #fff;
            line-height: 70px;
            background: #3BB77E;
            padding: 0 30px;
        }

        .header-style-1 .main-categori-wrap>a i.up {
            right: 30px;
        }

        .header-style-1 .main-categori-wrap>a.categories-button-active {
            line-height: 44px;
            border-radius: 5px;
            padding: 0 20px;
            font-family: "Quicksand", sans-serif;
            font-size: 16px;
        }

        .header-style-1 .main-categori-wrap>a.categories-button-active i {
            color: #fff;
            margin-left: 12px;
            font-size: 10px;
            margin-bottom: 5px;
        }

        .header-style-1 .main-categori-wrap>a:hover {
            background-color: #29A56C;
        }

        .header-style-1 .main-menu.main-menu-light-white>nav>ul>li>a {
            color: #494949;
        }

        .header-style-1 .stick .main-menu.main-menu-light-white>nav>ul>li>a {
            color: #ffffff !important;
        }

        .header-style-1 .categories-dropdown-active-large {
            top: 100%;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .header-style-1 .hotline p {
            color: #3BB77E !important;
        }

        .header-style-1 .main-categori-wrap>a span {
            color: #fff !important;
        }

        .header-style-1.header-style-5 .header-bottom-bg-color {
            background-color: #3BB77E !important;
        }

        .header-style-1.header-style-5 .header-bottom-bg-color .main-categori-wrap>a {
            background: #FDC040;
        }

        .header-style-1.header-style-5 .main-menu>nav>ul>li>a {
            color: #fff;
        }

        .header-style-1.header-style-5 .hotline p {
            color: #fff !important;
        }

        .header-style-1.header-style-5 .hotline p span {
            color: #fff !important;
        }

        span.fi-rs-apps {
            font-size: 16px;
        }

        .hotline i {
            opacity: 0.7;
        }

        /*LAYOUT -> NAVIGATION STYLE*/
        .main-menu.main-menu-mrg-1 {
            margin: 0 0 0 27px;
        }

        .main-menu>nav>ul>li.hot-deals {
            padding-right: 30px !important;
        }

        .main-menu>nav>ul>li.hot-deals img {
            position: relative;
            margin-bottom: -4px;
            margin-right: 8px;
        }

        .main-menu>nav>ul>li.position-static {
            position: static;
        }

        .main-menu>nav>ul>li>a {
            display: inline-block;
            font-size: 16px;
            font-weight: 700;
            color: #253D4E;
            font-family: "Quicksand", sans-serif;
        }

        .main-menu>nav>ul>li>a i {
            font-size: 8px;
            position: relative;
            margin-left: 4px;
        }

        .main-menu>nav>ul>li>a.active {
            color: #3BB77E;
        }

        .main-menu>nav>ul>li ul.sub-menu {
            position: absolute;
            left: 0;
            top: 100%;
            background-color: #ffffff;
            min-width: 250px;
            padding: 25px 15px;
            -webkit-transition: all .25s ease 0s;
            transition: all .25s ease 0s;
            opacity: 0;
            visibility: hidden;
            margin-top: 20px;
            border-radius: 10px;
            z-index: 999;
            border: 1px solid #ececec;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .main-menu>nav>ul>li ul.sub-menu li {
            line-height: 1;
            display: block;
            margin-bottom: 21px;
            position: relative;
        }

        .main-menu>nav>ul>li ul.sub-menu li:last-child {
            margin-bottom: 0;
        }

        .main-menu>nav>ul>li ul.sub-menu li ul.level-menu {
            position: absolute;
            left: 100%;
            top: -110px;
            background-color: #ffffff;
            width: 240px;
            padding: 33px 0 35px;
            -webkit-transition: all .25s ease 0s;
            transition: all .25s ease 0s;
            opacity: 0;
            visibility: hidden;
            border-radius: 10px;
            margin-top: 20px;
            border: 1px solid #ececec;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .main-menu>nav>ul>li ul.sub-menu li ul.level-menu.level-menu-modify {
            top: -25px;
        }

        .main-menu>nav>ul>li ul.sub-menu li a i {
            font-size: 9px;
            float: right;
            position: relative;
            top: 4px;
        }

        .main-menu>nav>ul>li ul.sub-menu li:hover>a {
            color: #000;
        }

        .main-menu>nav>ul>li ul.sub-menu li:hover ul.level-menu {
            opacity: 1;
            visibility: visible;
            margin-top: 0px;
        }

        .main-menu>nav>ul>li ul.mega-menu {
            position: absolute;
            left: 0;
            top: 100%;
            background-color: #ffffff;
            width: 100%;
            padding: 35px 25px 35px 35px;
            -webkit-transition: all .25s ease 0s;
            transition: all .25s ease 0s;
            opacity: 0;
            visibility: hidden;
            margin-top: 20px;
            border-radius: 0 0 10px 10px;
            z-index: 999;
            border: 1px solid #ececec;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .main-menu>nav>ul>li ul.mega-menu li {
            line-height: 1;
            display: block;
            position: relative;
            float: left;
            padding-right: 10px;
        }

        .main-menu>nav>ul>li ul.mega-menu li:last-child {
            margin-bottom: 0;
        }

        .main-menu>nav>ul>li ul.mega-menu li.sub-mega-menu-width-22 {
            width: 22%;
        }

        .main-menu>nav>ul>li ul.mega-menu li.sub-mega-menu-width-34 {
            width: 34%;
        }

        .main-menu>nav>ul>li ul.mega-menu li a.menu-title {
            font-size: 19px;
            font-weight: 700;
            display: block;
        }

        .main-menu>nav>ul>li ul.mega-menu li ul {
            margin-top: 28px;
        }

        .main-menu>nav>ul>li ul.mega-menu li ul li {
            line-height: 1;
            display: block;
            margin-bottom: 14px;
            float: none;
        }

        .main-menu>nav>ul>li ul.mega-menu li ul li:last-child {
            margin-bottom: 0;
        }

        .main-menu>nav>ul>li ul.mega-menu li ul li a {
            font-size: 15px;
            color: #7E7E7E;
            display: block;
            line-height: 1.4;
        }

        .main-menu>nav>ul>li ul.mega-menu li ul li a:hover {
            color: #3BB77E;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap {
            overflow: hidden;
            position: relative;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap a {
            display: block;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap a img {
            width: 100%;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content {
            position: absolute;
            top: 32px;
            left: 30px;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content h3 {
            font-size: 24px;
            font-weight: 700;
            line-height: 1.5;
            margin: 5px 0 11px;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content .menu-banner-price span.old-price {
            font-size: 19px;
            font-weight: 400;
            color: #696969;
            text-decoration: line-through;
            margin-left: 5px;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content .menu-banner-btn a {
            display: inline-block;
            font-size: 16px;
            font-weight: 700;
            color: #ffffff;
            border-radius: 26px;
            padding: 12px 22px 14px;
            background-color: #3BB77E;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-discount h3 span {
            display: block;
            line-height: 1;
            font-weight: 700;
            font-size: 20px;
            margin: 0 0 3px;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap:hover .menu-banner-btn a {
            background-color: #FD6E6E;
        }

        .main-menu>nav>ul>li:hover>a {
            color: #3BB77E;
        }

        .main-menu>nav>ul>li:hover ul.sub-menu {
            opacity: 1;
            visibility: visible;
            margin-top: 12px;
        }

        .main-menu>nav>ul>li:hover ul.mega-menu {
            opacity: 1;
            visibility: visible;
            margin-top: 0;
        }

        .main-menu.hover-boder>nav>ul>li>a {
            position: relative;
        }

        .main-menu.hover-boder>nav>ul>li>a::after {
            content: none;
            position: absolute;
            left: auto;
            right: 0;
            bottom: 34px;
            height: 1px;
            width: 0;
            -webkit-transition: width 0.6s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;
            transition: width 0.6s cubic-bezier(0.25, 0.8, 0.25, 1) 0s;
            background: #3BB77E;
        }

        .main-menu.hover-boder>nav>ul>li:hover>a::after {
            width: 100%;
            left: 0;
            right: auto;
        }

        .main-menu.hover-boder.hover-boder-white>nav>ul>li>a::after {
            bottom: 18px;
            background: #ffffff;
        }

        .main-menu.hover-boder.hover-boder-modify>nav>ul>li>a::after {
            bottom: 28px;
        }

        .main-menu.main-menu-light-white>nav>ul>li>a {
            color: white;
        }

        .main-menu.main-menu-padding-1>nav>ul>li {
            padding: 0 17px;
        }

        .main-menu.main-menu-padding-1>nav>ul>li:first-child {
            padding-left: 0 !important;
        }

        .main-menu.main-menu-lh-2>nav>ul>li {
            line-height: 70px;
        }

        .main-menu.main-menu-lh-3>nav>ul>li {
            line-height: 80px;
        }

        .main-menu.main-menu-grow {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .main-menu>nav>ul>li {
            display: inline-block;
            position: relative;
        }

        .main-menu>nav>ul>li ul.sub-menu li a {
            font-size: 14px;
            color: #7E7E7E;
            display: block;
            padding: 0 15px;
        }

        .main-menu>nav>ul>li ul.sub-menu li a:hover {
            color: #3BB77E;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content h4 {
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 500;
            margin: 0;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content .menu-banner-price {
            margin: 0 0 28px;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content .menu-banner-price span.new-price {
            font-size: 24px;
            font-weight: 700;
            color: #FD6E6E;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-discount {
            width: 80px;
            height: 80px;
            line-height: 80px;
            border-radius: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #ffd55a;
            position: absolute;
            top: 13%;
            right: 7%;
        }

        .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-discount h3 {
            color: #333;
            margin: 0;
            text-align: center;
            font-size: 19px;
            font-weight: 600;
            line-height: 1;
        }

        .main-menu.main-menu-lh-1>nav>ul>li {
            line-height: 70px;
        }

        .main-categori-wrap {
            position: relative;
            margin-right: 35px;
        }

        .main-categori-wrap>a {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex !important;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            font-size: 18px;
            font-weight: 700;
        }

        .main-categori-wrap>a span {
            margin-right: 7px;
            color: #7E7E7E;
        }

        .main-categori-wrap>a>i {
            margin-left: 5px;
            margin-top: 7px;
            color: #999;
        }

        .main-categori-wrap>a>i.up {
            position: absolute;
            top: 40%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            opacity: 0;
            visibility: hidden;
        }

        .main-categori-wrap>a.open>i {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .main-categori-wrap .categori-dropdown-inner {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            min-width: 412px;
        }

        .categories-dropdown-active-large {
            list-style-type: none;
            position: absolute;
            top: 177%;
            left: 0;
            z-index: 99;
            margin: 0;
            padding: 30px;
            background: #fff;
            border: 1px solid #BCE3C9;
            border-radius: 10px;
            font-size: 16px;
            min-width: 270px;
            -webkit-transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: all 0.25s cubic-bezier(0.645, 0.045, 0.355, 1);
            opacity: 0;
            visibility: hidden;
            margin-top: 26px;
        }

        .categories-dropdown-active-large.open {
            opacity: 1;
            visibility: visible;
        }

        .categori-dropdown-active-small {
            z-index: 9;
            margin: 0;
            padding: 14px 0 23px;
            background: #fff;
            border-radius: 5px;
            -webkit-box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
            box-shadow: 20px 20px 40px rgba(0, 0, 0, 0.07);
            font-size: 16px;
            font-weight: 400;
            display: none;
            width: 100%;
        }

        .categories-dropdown-wrap ul li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            line-height: 48px;
            border-radius: 5px;
            border: 1px solid #F2F3F4;
            padding: 9px 18px;
            margin: 0 15px 15px 0;
            height: 50px;
            transition: .3s;
            -moz-transition: .3s;
            -webkit-transition: .3s;
            -o-transition: .3s;
        }

        .categories-dropdown-wrap ul li:hover {
            border: 1px solid #BCE3C9;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            transition: .3s;
            -moz-transition: .3s;
            -webkit-transition: .3s;
            -o-transition: .3s;
        }

        .categories-dropdown-wrap ul li:hover a {
            color: #3BB77E;
        }

        .categories-dropdown-wrap ul li a {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0;
            line-height: 1.5;
            color: #253D4E;
            font-size: 14px;
        }

        .categories-dropdown-wrap ul li a:hover {
            color: #3BB77E;
            background-color: transparent;
        }

        .categories-dropdown-wrap ul li a img {
            max-width: 30px;
            margin-right: 15px;
        }

        .categories-dropdown-wrap ul li:hover .dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            margin-top: 0px;
            pointer-events: auto;
        }

        .categories-dropdown-wrap ul li.has-children {
            position: relative;
        }

        .categories-dropdown-wrap ul li.has-children>a::after {
            content: "\f111";
            font-family: 'uicons-regular-straight' !important;
            position: absolute;
            right: 30px;
            top: 50%;
            margin-top: -10px;
        }

        .categories-dropdown-wrap ul li.has-children .dropdown-menu {
            left: 100%;
            top: 0;
            margin: 0;
            margin-top: 0px;
            border: 1px solid #ececec;
            min-width: 800px;
            width: 100%;
            right: 0;
            border-radius: 0;
            padding: 20px;
        }

        .categories-dropdown-wrap ul li.has-children .dropdown-menu .submenu-title {
            font-size: 19px;
            font-weight: 700;
            display: block;
            color: #3BB77E;
            padding: 5px 34px;
        }

        .categories-dropdown-wrap ul li.has-children .dropdown-menu .header-banner2 {
            display: block;
            position: relative;
            margin-bottom: 15px;
        }

        .categories-dropdown-wrap ul li.has-children .dropdown-menu .header-banner2 .banne_info {
            position: absolute;
            right: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            padding: 15px;
        }

        .categories-dropdown-wrap ul li.has-children .dropdown-menu .header-banner2 .banne_info a {
            text-transform: capitalize;
            position: relative;
            padding: 0;
            color: #272a2c !important;
        }

        .categories-dropdown-wrap ul li.has-children .dropdown-menu .header-banner2 .banne_info a::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 1px;
            width: 50%;
            background-color: #272a2c;
            -webkit-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .categories-dropdown-wrap ul.end li {
            margin-right: 0;
        }

        .categories-dropdown-wrap .more_categories {
            margin-top: 15px;
            color: #3BB77E;
            position: relative;
            font-size: 13px;
            font-family: "Quicksand", sans-serif;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .categories-dropdown-wrap .more_categories span.icon {
            display: inline-block;
            position: relative;
            width: 24px;
            height: 24px;
            border: 2px solid;
            border-radius: 30px;
            margin-right: 5px;
        }

        .categories-dropdown-wrap .more_categories span.icon::before {
            content: "";
            width: 12px;
            height: 2px;
            background-color: #3BB77E;
            position: absolute;
            right: 4px;
            top: 9px;
        }

        .categories-dropdown-wrap .more_categories span.icon::after {
            content: "";
            width: 2px;
            height: 12px;
            background-color: #3BB77E;
            position: absolute;
            right: 9px;
            top: 4px;
        }

        .categories-dropdown-wrap .more_categories.show span.icon::after {
            display: none;
            content: none;
        }

        .categories-dropdown-wrap.style-2 {
            border: 1px solid #BCE3C9;
            border-radius: 10px;
            padding: 30px;
        }

        .categories-dropdown-wrap.style-2 ul li {
            border-radius: 0;
            border: 0;
            height: 24px;
            padding: 0;
            line-height: 24px;
            margin-bottom: 16px;
        }

        .categories-dropdown-wrap.style-2 ul li:hover {
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .categories-dropdown-wrap.style-2 ul li a {
            font-weight: 500;
        }

        .categories-dropdown-wrap.style-2 ul li img {
            max-height: 20px;
        }

        .categories-dropdown-wrap.style-2 .more_categories {
            -webkit-box-pack: left;
            -ms-flex-pack: left;
            justify-content: left;
        }

        .categories-dropdown-wrap.style-2 .more_categories .icon {
            -webkit-transform: scale(0.7);
            transform: scale(0.7);
        }

        /*Pagination*/
        .pagination-area .page-item {
            margin: 0 5px;
        }

        .pagination-area .page-item:first-child {
            margin-left: 0;
        }

        .pagination-area .page-item:first-child .page-link {
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        .pagination-area .page-item:last-child .page-link {
            border-top-right-radius: 50%;
            border-bottom-right-radius: 50%;
        }

        .pagination-area .page-item.active .page-link,
        .pagination-area .page-item:hover .page-link {
            color: #fff;
            background: #3BB77E;
        }

        .pagination-area .page-item:last-child .page-link {
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            line-height: 43px;
        }

        .pagination-area .page-item:first-child .page-link {
            border-top-left-radius: 40px;
            border-bottom-left-radius: 40px;
            line-height: 43px;
        }

        .pagination-area .page-link {
            border: 0;
            padding: 0 10px;
            -webkit-box-shadow: none;
            box-shadow: none;
            outline: 0;
            width: 40px;
            height: 40px;
            display: block;
            border-radius: 40px;
            color: #7E7E7E;
            line-height: 40px;
            text-align: center;
            font-weight: 700;
            font-family: "Quicksand", sans-serif;
            font-size: 16px;
            background-color: #F2F3F4;
        }

        .pagination-area .page-link.dot {
            background-color: transparent;
            color: #7E7E7E;
            letter-spacing: 2px;
        }

        /*LAYOUT -> SIDEBAR*/
        .widget-category ul>li {
            padding: 6px 0;
            -webkit-transition-duration: .2s;
            transition-duration: .2s;
        }

        .widget-category ul>li:hover {
            padding-left: 5px;
            -webkit-transition-duration: .2s;
            transition-duration: .2s;
        }

        .widget-category ul>li a {
            color: #242424;
        }

        .widget-category ul>li a:hover {
            color: #3BB77E;
        }

        .price_range {
            background: url(../imgs/banner/fillter-widget-bg.png) no-repeat right bottom;
            background-size: 150px;
        }

        .primary-sidebar .sidebar-widget {
            position: relative;
            padding: 30px;
            border: 1px solid #ececec;
            border-radius: 15px;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
        }

        .widget-category-2 ul li {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            line-height: 48px;
            border-radius: 5px;
            border: 1px solid #F2F3F4;
            padding: 9px 18px;
            margin: 0 0 15px 0;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            transition: .3s;
            -moz-transition: .3s;
            -webkit-transition: .3s;
            -o-transition: .3s;
        }

        .widget-category-2 ul li:last-child {
            margin-bottom: 0 !important;
        }

        .widget-category-2 ul li:hover {
            border: 1px solid #BCE3C9;
            -webkit-box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.05);
            transition: .3s;
            -moz-transition: .3s;
            -webkit-transition: .3s;
            -o-transition: .3s;
        }

        .widget-category-2 ul li:hover a {
            color: #3BB77E;
        }

        .widget-category-2 ul li a {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            padding: 0;
            line-height: 1.5;
            color: #253D4E;
            font-size: 14px;
        }

        .widget-category-2 ul li a:hover {
            color: #3BB77E;
            background-color: transparent;
        }

        .widget-category-2 ul li a img {
            max-width: 30px;
            margin-right: 15px;
        }

        .widget-category-2 ul li:hover .dropdown-menu {
            display: block;
            opacity: 1;
            visibility: visible;
            margin-top: 0px;
            pointer-events: auto;
        }

        .widget-category-2 ul li.has-children {
            position: relative;
        }

        .widget-category-2 ul li.has-children>a::after {
            content: "\f111";
            font-family: 'uicons-regular-straight' !important;
            position: absolute;
            right: 30px;
            top: 50%;
            margin-top: -10px;
        }

        .widget-category-2 ul li.has-children .dropdown-menu {
            left: 100%;
            top: 0;
            margin: 0;
            margin-top: 0px;
            border: 1px solid #ececec;
            min-width: 800px;
            width: 100%;
            right: 0;
            border-radius: 0;
            padding: 20px;
        }

        .widget-category-2 ul li.has-children .dropdown-menu .submenu-title {
            font-size: 19px;
            font-weight: 700;
            display: block;
            color: #3BB77E;
            padding: 5px 34px;
        }

        .widget-category-2 ul li.has-children .dropdown-menu .header-banner2 {
            display: block;
            position: relative;
            margin-bottom: 15px;
        }

        .widget-category-2 ul li.has-children .dropdown-menu .header-banner2 .banne_info {
            position: absolute;
            right: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            padding: 15px;
        }

        .widget-category-2 ul li.has-children .dropdown-menu .header-banner2 .banne_info a {
            text-transform: capitalize;
            position: relative;
            padding: 0;
            color: #272a2c !important;
        }

        .widget-category-2 ul li.has-children .dropdown-menu .header-banner2 .banne_info a::before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 1px;
            width: 50%;
            background-color: #272a2c;
            -webkit-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
        }

        .widget-category-2 ul.end li {
            margin-right: 0;
        }

        .widget-category-2 .count {
            display: inline-block;
            background-color: #BCE3C9;
            width: 24px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            border-radius: 20px;
            margin-left: 5px;
            font-size: 12px;
            color: #253D4E;
        }

        /*Social network widget*/
        .follow-us a {
            display: block;
            padding: 12px 10px;
            color: #fff;
            width: 50%;
            border-radius: 5px;
            font-size: 11px;
            overflow: hidden;
            height: 46px;
        }

        .follow-us a .social-count {
            font-weight: bold;
        }

        .follow-us a:hover i {
            -webkit-transform: translateY(-35px) !important;
            transform: translateY(-35px) !important;
        }

        .follow-us a i {
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: translateY(0);
            transform: translateY(0);
            -webkit-transition: 0.2s cubic-bezier(0.65, 0.23, 0.31, 0.88);
            transition: 0.2s cubic-bezier(0.65, 0.23, 0.31, 0.88);
            display: inline-block;
            font-size: 16px;
            vertical-align: middle;
        }

        .follow-us a i.nth-2 {
            position: absolute;
            top: 38px;
            left: 0;
        }

        .follow-us i.v-align-space {
            border-right: 1px solid rgba(255, 255, 255, 0.5);
            padding-right: 4px;
            line-height: 1;
        }

        .follow-us .social-icon {
            display: inline-block;
            position: relative;
            transition: all .5s ease-in-out;
            -webkit-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;
        }

        .follow-us a.follow-us-facebook,
        .single-social-share a.facebook-icon {
            background: #305c99;
        }

        .follow-us a.follow-us-twitter,
        .single-social-share a.twitter-icon {
            background: #00cdff;
        }

        .follow-us a.follow-us-instagram,
        .single-social-share a.instagram-icon {
            background: #3f729b;
        }

        .follow-us a.follow-us-youtube,
        .single-social-share a.pinterest-icon {
            background: #e22b26;
        }

        .sidebar-widget .widget-header {
            border-bottom: 1px solid #ececec;
        }

        .sidebar-widget .widget-header h5 {
            margin-bottom: 0;
            text-transform: uppercase;
            font-size: 14px;
        }

        .sidebar-widget .banner-img {
            float: none;
        }

        .widget_categories li.cat-item,
        .widget_archive li,
        .widget_pages li,
        .widget_recent_comments li,
        .widget_nav_menu li {
            text-align: right;
            border-bottom: 1px dotted rgba(0, 0, 0, 0.15);
            display: table;
            width: 100%;
            font-size: 14px;
            padding: 7px 0;
        }

        .widget_categories li.cat-item:last-child {
            border: none;
        }

        .widget_categories li.cat-item a,
        .widget_archive li a,
        .widget_pages li a {
            text-align: left;
            float: left;
            padding: 0;
        }

        .widget-tags li {
            margin: 0 20px 20px 0;
        }

        .widget_instagram .insta-feed {
            padding-top: 5px;
            margin: -2px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .widget_instagram .insta-feed li {
            width: 29.33%;
            margin: 5px;
        }

        .widget_instagram .insta-feed li img {
            width: 100%;
        }

        .social-network li {
            display: inline-block;
            margin: 0 5px 0 0;
        }

        .vendor-logo img {
            max-width: 150px;
        }

        /*newsletter*/
        footer .mobile-social-icon {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-item-align: center;
            align-self: center;
        }

        footer .mobile-social-icon h6 {
            display: inline-block;
            margin-right: 15px;
        }

        footer .hotline {
            min-width: 200px;
        }

        footer .hotline img {
            min-width: 10px;
            margin-right: 12px;
            max-width: 30px;
            opacity: 0.5;
        }

        .newsletter {
            position: relative;
        }

        .newsletter .newsletter-inner {

            background-size: cover;
            padding: 84px 78px;
            clear: both;
            display: table;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            min-height: 230px;
        }

        .newsletter .newsletter-inner img {
            position: absolute;
            right: 50px;
            bottom: 0;
            max-width: 40%;
        }

        .newsletter .newsletter-inner .newsletter-content p {
            font-size: 18px;
        }

        .newsletter .newsletter-inner .newsletter-content form {
            background-color: #fff;
            max-width: 450px;
            border-radius: 50px;
            position: relative;
            z-index: 4;
        }

        .newsletter .newsletter-inner .newsletter-content form input {
            border: 0;
            border-radius: 50px 0 0 50px;
            padding-left: 58px;

        }

        .newsletter .newsletter-inner .newsletter-content form button {
            border: 0;
            border-radius: 50px;
            font-weight: 700;
        }

        .widget-about {
            min-width: 300px;
            font-size: 15px;
        }

        .widget-install-app {
            min-width: 310px;
        }

        .contact-infor {
            font-size: 15px;
            color: #253D4E;
        }

        .contact-infor li:not(:last-child) {
            margin-bottom: 10px;
        }

        .contact-infor li img {
            margin-right: 8px;
            max-width: 16px;
        }

        .footer-link-widget:not(:last-child) {
            margin-right: 50px;
        }

        .footer-link-widget p {
            font-size: 15px;
            color: #253D4E;
        }

        .download-app {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin: 25px 0 33px;
        }

        .download-app a {
            display: block;
            margin-right: 12px;
        }

        .download-app a img {
            max-width: 128px;
        }

        .footer-list {
            list-style: outside none none;
            margin: 0;
            padding: 0;
            min-width: 170px;
        }

        .footer-list li {
            display: block;
            margin: 0 0 13px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .footer-list li:last-child {
            margin: 0;
        }

        .footer-list li:hover {
            padding-left: 5px;
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
        }

        .footer-list li a {
            font-size: 15px;
            color: #253D4E;
            display: block;
        }

        .footer-list li a:hover {
            color: #3BB77E;
        }

        .footer-bottom {
            border-top: 1px solid #BCE3C9;
        }

        #scrollUp {
            width: 32px;
            height: 32px;
            color: #253D4E;
            right: 30px;
            bottom: 30px;
            border-radius: 30px;
            text-align: center;
            overflow: hidden;
            z-index: 999 !important;
            border: 2px solid #253D4E;
            background-color: #fff;
        }

        #scrollUp i {
            display: block;
            line-height: 32px !important;
            font-size: 25px;
        }

        #scrollUp:hover {
            -webkit-transform: translateY(-5px);
            transform: translateY(-5px);
        }

        .footer-mid .widget-title {
            margin: 15px 0 20px 0;
        }

        /*LAYOUT -> SPACING**/
        .section-padding-30 {
            padding: 30px 0;
        }

        .section-padding-50 {
            padding: 50px 0;
        }

        .section-padding-60 {
            padding: 60px 0;
        }

        .section-padding {
            padding: 25px 0;
        }

        .ptb-0 {
            padding: 0;
        }

        .ptb-10 {
            padding: 10px 0;
        }

        .ptb-20 {
            padding: 20px 0;
        }

        .ptb-30 {
            padding: 30px 0;
        }

        .ptb-35 {
            padding: 35px 0;
        }

        .ptb-32 {
            padding: 32px 0;
        }

        .ptb-40 {
            padding: 40px 0;
        }

        .ptb-50 {
            padding: 50px 0;
        }

        .ptb-60 {
            padding: 60px 0;
        }

        .ptb-70 {
            padding: 70px 0;
        }

        .ptb-80 {
            padding: 80px 0;
        }

        .ptb-90 {
            padding: 90px 0;
        }

        .ptb-100 {
            padding: 100px 0;
        }

        .ptb-110 {
            padding: 110px 0;
        }

        .ptb-120 {
            padding: 120px 0;
        }

        .ptb-130 {
            padding: 130px 0;
        }

        .ptb-140 {
            padding: 140px 0;
        }

        .ptb-150 {
            padding: 150px 0;
        }

        .ptb-160 {
            padding: 160px 0;
        }

        .ptb-170 {
            padding: 170px 0;
        }

        .ptb-177 {
            padding: 177px 0;
        }

        .ptb-180 {
            padding: 180px 0;
        }

        .ptb-190 {
            padding: 190px 0;
        }

        .ptb-200 {
            padding: 200px 0;
        }

        .ptb-210 {
            padding: 210px 0;
        }

        .ptb-220 {
            padding: 220px 0;
        }

        .ptb-290 {
            padding: 290px 0;
        }

        .ptb-310 {
            padding: 310px 0;
        }

        .p-10 {
            padding: 10px !important;
        }

        .p-15 {
            padding: 15px !important;
        }

        .p-20 {
            padding: 20px !important;
        }

        .p-25 {
            padding: 25px !important;
        }

        .p-30 {
            padding: 30px !important;
        }

        .p-40 {
            padding: 40px !important;
        }

        .p-65 {
            padding: 65px !important;
        }

        .pt-5 {
            padding-top: 5px !important;
        }

        .pt-10 {
            padding-top: 10px !important;
        }

        .pt-15 {
            padding-top: 15px !important;
        }

        .pt-20 {
            padding-top: 20px !important;
        }

        .pt-25 {
            padding-top: 25px !important;
        }

        .pt-30 {
            padding-top: 30px !important;
        }

        .pt-35 {
            padding-top: 35px !important;
        }

        .pt-40 {
            padding-top: 40px !important;
        }

        .pt-45 {
            padding-top: 45px !important;
        }

        .pt-50 {
            padding-top: 50px !important;
        }

        .pt-55 {
            padding-top: 55px !important;
        }

        .pt-60 {
            padding-top: 60px !important;
        }

        .pt-65 {
            padding-top: 65px !important;
        }

        .pt-70 {
            padding-top: 70px !important;
        }

        .pt-75 {
            padding-top: 75px !important;
        }

        .pt-80 {
            padding-top: 80px !important;
        }

        .pt-85 {
            padding-top: 85px !important;
        }

        .pt-90 {
            padding-top: 90px !important;
        }

        .pt-95 {
            padding-top: 95px !important;
        }

        .pt-100 {
            padding-top: 100px !important;
        }

        .pt-105 {
            padding-top: 105px !important;
        }

        .pt-110 {
            padding-top: 110px !important;
        }

        .pt-115 {
            padding-top: 115px !important;
        }

        .pt-120 {
            padding-top: 120px !important;
        }

        .pt-125 {
            padding-top: 125px !important;
        }

        .pt-130 {
            padding-top: 130px !important;
        }

        .pt-135 {
            padding-top: 135px !important;
        }

        .pt-140 {
            padding-top: 140px !important;
        }

        .pt-145 {
            padding-top: 145px !important;
        }

        .pt-150 {
            padding-top: 150px !important;
        }

        .pt-155 {
            padding-top: 155px !important;
        }

        .pt-160 {
            padding-top: 160px !important;
        }

        .pt-165 {
            padding-top: 165px !important;
        }

        .pt-170 {
            padding-top: 170px !important;
        }

        .pt-175 {
            padding-top: 175px !important;
        }

        .pt-180 {
            padding-top: 180px !important;
        }

        .pt-185 {
            padding-top: 185px !important;
        }

        .pt-190 {
            padding-top: 190px !important;
        }

        .pt-195 {
            padding-top: 195px !important;
        }

        .pt-200 {
            padding-top: 200px !important;
        }

        .pt-260 {
            padding-top: 260px !important;
        }

        .pb-5 {
            padding-bottom: 5px !important;
        }

        .pb-10 {
            padding-bottom: 10px !important;
        }

        .pb-15 {
            padding-bottom: 15px !important;
        }

        .pb-20 {
            padding-bottom: 20px !important;
        }

        .pb-25 {
            padding-bottom: 25px !important;
        }

        .pb-30 {
            padding-bottom: 30px !important;
        }

        .pb-35 {
            padding-bottom: 35px !important;
        }

        .pb-40 {
            padding-bottom: 40px !important;
        }

        .pb-45 {
            padding-bottom: 45px !important;
        }

        .pb-50 {
            padding-bottom: 50px !important;
        }

        .pb-55 {
            padding-bottom: 55px !important;
        }

        .pb-60 {
            padding-bottom: 60px !important;
        }

        .pb-65 {
            padding-bottom: 65px !important;
        }

        .pb-70 {
            padding-bottom: 70px !important;
        }

        .pb-75 {
            padding-bottom: 75px !important;
        }

        .pb-80 {
            padding-bottom: 80px !important;
        }

        .pb-85 {
            padding-bottom: 85px !important;
        }

        .pb-90 {
            padding-bottom: 90px !important;
        }

        .pb-95 {
            padding-bottom: 95px !important;
        }

        .pb-100 {
            padding-bottom: 100px !important;
        }

        .pb-105 {
            padding-bottom: 105px !important;
        }

        .pb-110 {
            padding-bottom: 110px !important;
        }

        .pb-115 {
            padding-bottom: 115px !important;
        }

        .pb-120 {
            padding-bottom: 120px !important;
        }

        .pb-125 {
            padding-bottom: 125px !important;
        }

        .pb-130 {
            padding-bottom: 130px !important;
        }

        .pb-135 {
            padding-bottom: 135px !important;
        }

        .pb-140 {
            padding-bottom: 140px !important;
        }

        .pb-145 {
            padding-bottom: 145px !important;
        }

        .pb-150 {
            padding-bottom: 150px !important;
        }

        .pb-155 {
            padding-bottom: 155px !important;
        }

        .pb-160 {
            padding-bottom: 160px !important;
        }

        .pb-165 {
            padding-bottom: 165px !important;
        }

        .pb-170 {
            padding-bottom: 170px !important;
        }

        .pb-175 {
            padding-bottom: 175px !important;
        }

        .pb-180 {
            padding-bottom: 180px !important;
        }

        .pb-185 {
            padding-bottom: 185px !important;
        }

        .pb-190 {
            padding-bottom: 190px !important;
        }

        .pb-195 {
            padding-bottom: 195px !important;
        }

        .pb-200 {
            padding-bottom: 200px !important;
        }

        .pl-5 {
            padding-left: 5px !important;
        }

        .pl-10 {
            padding-left: 10px !important;
        }

        .pl-15 {
            padding-left: 15px !important;
        }

        .pl-20 {
            padding-left: 20px !important;
        }

        .pl-25 {
            padding-left: 25px !important;
        }

        .pl-30 {
            padding-left: 30px !important;
        }

        .pl-35 {
            padding-left: 35px !important;
        }

        .pl-40 {
            padding-left: 40px !important;
        }

        .pl-45 {
            padding-left: 45px !important;
        }

        .pl-50 {
            padding-left: 50px !important;
        }

        .pl-55 {
            padding-left: 55px !important;
        }

        .pl-60 {
            padding-left: 60px !important;
        }

        .pl-65 {
            padding-left: 65px !important;
        }

        .pl-70 {
            padding-left: 70px !important;
        }

        .pl-75 {
            padding-left: 75px !important;
        }

        .pl-80 {
            padding-left: 80px !important;
        }

        .pl-85 {
            padding-left: 85px !important;
        }

        .pl-90 {
            padding-left: 90px !important;
        }

        .pl-95 {
            padding-left: 95px !important;
        }

        .pl-100 {
            padding-left: 100px !important;
        }

        .pl-105 {
            padding-left: 105px !important;
        }

        .pl-110 {
            padding-left: 110px !important;
        }

        .pl-115 {
            padding-left: 115px !important;
        }

        .pl-120 {
            padding-left: 120px !important;
        }

        .pl-125 {
            padding-left: 125px !important;
        }

        .pl-130 {
            padding-left: 130px !important;
        }

        .pl-135 {
            padding-left: 135px !important;
        }

        .pl-140 {
            padding-left: 140px !important;
        }

        .pl-145 {
            padding-left: 145px !important;
        }

        .pl-150 {
            padding-left: 150px !important;
        }

        .pl-155 {
            padding-left: 155px !important;
        }

        .pl-160 {
            padding-left: 160px !important;
        }

        .pl-165 {
            padding-left: 165px !important;
        }

        .pl-170 {
            padding-left: 170px !important;
        }

        .pl-175 {
            padding-left: 175px !important;
        }

        .pl-180 {
            padding-left: 180px !important;
        }

        .pl-185 {
            padding-left: 185px !important;
        }

        .pl-190 {
            padding-left: 190px !important;
        }

        .pl-195 {
            padding-left: 195px !important;
        }

        .pl-200 {
            padding-left: 200px !important;
        }

        .pr-5 {
            padding-right: 5px !important;
        }

        .pr-10 {
            padding-right: 10px !important;
        }

        .pr-15 {
            padding-right: 15px !important;
        }

        .pr-20 {
            padding-right: 20px !important;
        }

        .pr-25 {
            padding-right: 25px !important;
        }

        .pr-30 {
            padding-right: 30px !important;
        }

        .pr-35 {
            padding-right: 35px !important;
        }

        .pr-40 {
            padding-right: 40px !important;
        }

        .pr-45 {
            padding-right: 45px !important;
        }

        .pr-50 {
            padding-right: 50px !important;
        }

        .pr-55 {
            padding-right: 55px !important;
        }

        .pr-60 {
            padding-right: 60px !important;
        }

        .pr-65 {
            padding-right: 65px !important;
        }

        .pr-70 {
            padding-right: 70px !important;
        }

        .pr-75 {
            padding-right: 75px !important;
        }

        .pr-80 {
            padding-right: 80px !important;
        }

        .pr-85 {
            padding-right: 85px !important;
        }

        .pr-90 {
            padding-right: 90px !important;
        }

        .pr-95 {
            padding-right: 95px !important;
        }

        .pr-100 {
            padding-right: 100px !important;
        }

        .pr-105 {
            padding-right: 105px !important;
        }

        .pr-110 {
            padding-right: 110px !important;
        }

        .pr-115 {
            padding-right: 115px !important;
        }

        .pr-120 {
            padding-right: 120px !important;
        }

        .pr-125 {
            padding-right: 125px !important;
        }

        .pr-130 {
            padding-right: 130px !important;
        }

        .pr-135 {
            padding-right: 135px !important;
        }

        .pr-140 {
            padding-right: 140px !important;
        }

        .pr-145 {
            padding-right: 145px !important;
        }

        .pr-150 {
            padding-right: 150px !important;
        }

        .pr-155 {
            padding-right: 155px !important;
        }

        .pr-160 {
            padding-right: 160px !important;
        }

        .pr-165 {
            padding-right: 165px !important;
        }

        .pr-170 {
            padding-right: 170px !important;
        }

        .pr-175 {
            padding-right: 175px !important;
        }

        .pr-180 {
            padding-right: 180px !important;
        }

        .pr-185 {
            padding-right: 185px !important;
        }

        .pr-190 {
            padding-right: 190px !important;
        }

        .pr-195 {
            padding-right: 195px !important;
        }

        .pr-200 {
            padding-right: 200px !important;
        }

        .plr-5-percent {
            padding: 0 5%;
        }

        /***************************
    Page section margin
****************************/
        .mtb-0 {
            margin: 0;
        }

        .mtb-10 {
            margin: 10px 0;
        }

        .mtb-15 {
            margin: 15px 0;
        }

        .mtb-20 {
            margin: 20px 0;
        }

        .mtb-30 {
            margin: 30px 0;
        }

        .mtb-40 {
            margin: 40px 0;
        }

        .mtb-50 {
            margin: 50px 0;
        }

        .mtb-60 {
            margin: 60px 0;
        }

        .mtb-70 {
            margin: 70px 0;
        }

        .mtb-80 {
            margin: 80px 0;
        }

        .mtb-90 {
            margin: 90px 0;
        }

        .mtb-100 {
            margin: 100px 0;
        }

        .mtb-110 {
            margin: 110px 0;
        }

        .mtb-120 {
            margin: 120px 0;
        }

        .mtb-130 {
            margin: 130px 0;
        }

        .mtb-140 {
            margin: 140px 0;
        }

        .mtb-150 {
            margin: 150px 0;
        }

        .mtb-290 {
            margin: 290px 0;
        }

        .mb-24 {
            margin-bottom: 24px;
        }

        .mt-5 {
            margin-top: 5px !important;
        }

        .mt-10 {
            margin-top: 10px !important;
        }

        .mt-15 {
            margin-top: 15px !important;
        }

        .mt-20 {
            margin-top: 20px !important;
        }

        .mt-25 {
            margin-top: 25px !important;
        }

        .mt-30 {
            margin-top: 30px !important;
        }

        .mt-35 {
            margin-top: 35px !important;
        }

        .mt-40 {
            margin-top: 40px !important;
        }

        .mt-45 {
            margin-top: 45px !important;
        }

        .mt-50 {
            margin-top: 50px !important;
        }

        .mt-55 {
            margin-top: 55px !important;
        }

        .mt-60 {
            margin-top: 60px !important;
        }

        .mt-65 {
            margin-top: 65px !important;
        }

        .mt-70 {
            margin-top: 70px !important;
        }

        .mt-75 {
            margin-top: 75px !important;
        }

        .mt-80 {
            margin-top: 80px !important;
        }

        .mt-85 {
            margin-top: 85px !important;
        }

        .mt-90 {
            margin-top: 90px !important;
        }

        .mt-95 {
            margin-top: 95px !important;
        }

        .mt-100 {
            margin-top: 100px !important;
        }

        .mt-105 {
            margin-top: 105px !important;
        }

        .mt-110 {
            margin-top: 110px !important;
        }

        .mt-115 {
            margin-top: 115px !important;
        }

        .mt-120 {
            margin-top: 120px !important;
        }

        .mt-125 {
            margin-top: 125px !important;
        }

        .mt-130 {
            margin-top: 130px !important;
        }

        .mt-135 {
            margin-top: 135px !important;
        }

        .mt-140 {
            margin-top: 140px !important;
        }

        .mt-145 {
            margin-top: 145px !important;
        }

        .mt-150 {
            margin-top: 150px !important;
        }

        .mt-155 {
            margin-top: 155px !important;
        }

        .mt-160 {
            margin-top: 160px !important;
        }

        .mt-165 {
            margin-top: 165px !important;
        }

        .mt-170 {
            margin-top: 170px !important;
        }

        .mt-175 {
            margin-top: 175px !important;
        }

        .mt-180 {
            margin-top: 180px !important;
        }

        .mt-185 {
            margin-top: 185px !important;
        }

        .mt-190 {
            margin-top: 190px !important;
        }

        .mt-195 {
            margin-top: 195px !important;
        }

        .mt-200 {
            margin-top: 200px !important;
        }

        .mb-5 {
            margin-bottom: 5px !important;
        }

        .mb-10 {
            margin-bottom: 10px !important;
        }

        .mb-15 {
            margin-bottom: 15px !important;
        }

        .mb-20 {
            margin-bottom: 20px !important;
        }

        .mb-25 {
            margin-bottom: 25px !important;
        }

        .mb-30 {
            margin-bottom: 30px !important;
        }

        .mb-35 {
            margin-bottom: 35px !important;
        }

        .mb-40 {
            margin-bottom: 40px !important;
        }

        .mb-45 {
            margin-bottom: 45px !important;
        }

        .mb-50 {
            margin-bottom: 50px !important;
        }

        .mb-55 {
            margin-bottom: 55px !important;
        }

        .mb-60 {
            margin-bottom: 60px !important;
        }

        .mb-65 {
            margin-bottom: 65px !important;
        }

        .mb-70 {
            margin-bottom: 70px !important;
        }

        .mb-75 {
            margin-bottom: 75px !important;
        }

        .mb-80 {
            margin-bottom: 80px !important;
        }

        .mb-85 {
            margin-bottom: 85px !important;
        }

        .mb-90 {
            margin-bottom: 90px !important;
        }

        .mb-95 {
            margin-bottom: 95px !important;
        }

        .mb-100 {
            margin-bottom: 100px !important;
        }

        .mb-105 {
            margin-bottom: 105px !important;
        }

        .mb-110 {
            margin-bottom: 110px !important;
        }

        .mb-115 {
            margin-bottom: 115px !important;
        }

        .mb-120 {
            margin-bottom: 120px !important;
        }

        .mb-125 {
            margin-bottom: 125px !important;
        }

        .mb-130 {
            margin-bottom: 130px !important;
        }

        .mb-135 {
            margin-bottom: 135px !important;
        }

        .mb-140 {
            margin-bottom: 140px !important;
        }

        .mb-145 {
            margin-bottom: 145px !important;
        }

        .mb-150 {
            margin-bottom: 150px !important;
        }

        .mb-155 {
            margin-bottom: 155px !important;
        }

        .mb-160 {
            margin-bottom: 160px !important;
        }

        .mb-165 {
            margin-bottom: 165px !important;
        }

        .mb-170 {
            margin-bottom: 170px !important;
        }

        .mb-175 {
            margin-bottom: 175px !important;
        }

        .mb-180 {
            margin-bottom: 180px !important;
        }

        .mb-185 {
            margin-bottom: 185px !important;
        }

        .mb-190 {
            margin-bottom: 190px !important;
        }

        .mb-195 {
            margin-bottom: 195px !important;
        }

        .mb-200 {
            margin-bottom: 200px !important;
        }

        .ml-0 {
            margin-left: 0px !important;
        }

        .ml-5 {
            margin-left: 5px !important;
        }

        .ml-10 {
            margin-left: 10px !important;
        }

        .ml-15 {
            margin-left: 15px !important;
        }

        .ml-20 {
            margin-left: 20px !important;
        }

        .ml-25 {
            margin-left: 25px !important;
        }

        .ml-30 {
            margin-left: 30px !important;
        }

        .ml-35 {
            margin-left: 35px !important;
        }

        .ml-40 {
            margin-left: 40px !important;
        }

        .ml-45 {
            margin-left: 45px !important;
        }

        .ml-50 {
            margin-left: 50px !important;
        }

        .ml-55 {
            margin-left: 55px !important;
        }

        .ml-60 {
            margin-left: 60px !important;
        }

        .ml-65 {
            margin-left: 65px !important;
        }

        .ml-70 {
            margin-left: 70px !important;
        }

        .ml-75 {
            margin-left: 75px !important;
        }

        .ml-80 {
            margin-left: 80px !important;
        }

        .ml-85 {
            margin-left: 85px !important;
        }

        .ml-90 {
            margin-left: 90px !important;
        }

        .ml-95 {
            margin-left: 95px !important;
        }

        .ml-100 {
            margin-left: 100px !important;
        }

        .ml-105 {
            margin-left: 105px !important;
        }

        .ml-110 {
            margin-left: 110px !important;
        }

        .ml-115 {
            margin-left: 115px !important;
        }

        .ml-120 {
            margin-left: 120px !important;
        }

        .ml-125 {
            margin-left: 125px !important;
        }

        .ml-130 {
            margin-left: 130px !important;
        }

        .ml-135 {
            margin-left: 135px !important;
        }

        .ml-140 {
            margin-left: 140px !important;
        }

        .ml-145 {
            margin-left: 145px !important;
        }

        .ml-150 {
            margin-left: 150px !important;
        }

        .ml-155 {
            margin-left: 155px !important;
        }

        .ml-160 {
            margin-left: 160px !important;
        }

        .ml-165 {
            margin-left: 165px !important;
        }

        .ml-170 {
            margin-left: 170px !important;
        }

        .ml-175 {
            margin-left: 175px !important;
        }

        .ml-180 {
            margin-left: 180px !important;
        }

        .ml-185 {
            margin-left: 185px !important;
        }

        .ml-190 {
            margin-left: 190px !important;
        }

        .ml-195 {
            margin-left: 195px !important;
        }

        .ml-200 {
            margin-left: 200px !important;
        }

        .mr-5 {
            margin-right: 5px !important;
        }

        .mr-10 {
            margin-right: 10px !important;
        }

        .mr-15 {
            margin-right: 15px !important;
        }

        .mr-20 {
            margin-right: 20px !important;
        }

        .mr-25 {
            margin-right: 25px !important;
        }

        .mr-30 {
            margin-right: 30px !important;
        }

        .mr-35 {
            margin-right: 35px !important;
        }

        .mr-40 {
            margin-right: 40px !important;
        }

        .mr-45 {
            margin-right: 45px !important;
        }

        .mr-50 {
            margin-right: 50px !important;
        }

        .mr-55 {
            margin-right: 55px !important;
        }

        .mr-60 {
            margin-right: 60px !important;
        }

        .mr-65 {
            margin-right: 65px !important;
        }

        .mr-70 {
            margin-right: 70px !important;
        }

        .mr-75 {
            margin-right: 75px !important;
        }

        .mr-80 {
            margin-right: 80px !important;
        }

        .mr-85 {
            margin-right: 85px !important;
        }

        .mr-90 {
            margin-right: 90px !important;
        }

        .mr-95 {
            margin-right: 95px !important;
        }

        .mr-100 {
            margin-right: 100px !important;
        }

        .mr-105 {
            margin-right: 105px !important;
        }

        .mr-110 {
            margin-right: 110px !important;
        }

        .mr-115 {
            margin-right: 115px !important;
        }

        .mr-120 {
            margin-right: 120px !important;
        }

        .mr-125 {
            margin-right: 125px !important;
        }

        .mr-130 {
            margin-right: 130px !important;
        }

        .mr-135 {
            margin-right: 135px !important;
        }

        .mr-140 {
            margin-right: 140px !important;
        }

        .mr-145 {
            margin-right: 145px !important;
        }

        .mr-150 {
            margin-right: 150px !important;
        }

        .mr-155 {
            margin-right: 155px !important;
        }

        .mr-160 {
            margin-right: 160px !important;
        }

        .mr-165 {
            margin-right: 165px !important;
        }

        .mr-170 {
            margin-right: 170px !important;
        }

        .mr-175 {
            margin-right: 175px !important;
        }

        .mr-180 {
            margin-right: 180px !important;
        }

        .mr-185 {
            margin-right: 185px !important;
        }

        .mr-190 {
            margin-right: 190px !important;
        }

        .mr-195 {
            margin-right: 195px !important;
        }

        .mr-200 {
            margin-right: 200px !important;
        }

        @media only screen and (max-width: 768px) {
            .totall-product h2 {
                font-size: 28px;
            }

            .loop-grid.loop-list article .post-thumb {
                min-height: 220px;
                min-width: 300px;
            }

            .loop-grid.loop-list article h3.post-title {
                font-size: 22px;
                margin-bottom: 30px !important;
            }

            .loop-grid.loop-list article .post-exerpt {
                display: none;
            }

            .loop-grid.loop-list article .entry-content-2.pl-50 {
                padding-left: 30px !important;
            }

            .loop-big h2.post-title {
                font-size: 32px;
            }

            .header-style-1 .header-bottom-bg-color {
                -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.07);
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.07);
            }

            .header-action-2 .header-action-icon-2:last-child {
                padding: 0;
            }

            .logo.logo-width-1 {
                margin-right: 0;
                position: absolute;
                left: 50%;
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
            }

            .logo.logo-width-1 a img {
                width: 150px;
                min-width: 150px;
            }

            .header-bottom {
                padding: 20px 0;
            }

            .header-action .header-action-icon {
                margin-right: 15px;
            }

            .header-action .header-action-icon.header-action-mrg-none {
                margin-right: 15px;
            }

            .header-action .header-action-icon.header-action-mrg-none2 {
                margin-right: 15px;
            }

            .header-action .header-action-icon>a {
                font-size: 20px;
            }

            .header-action-2 .header-action-icon-2 {
                padding: 0 6px;
            }

            .header-action-2 .header-action-icon-2:last-child {
                padding: 0 0 0 6px;
            }

            .header-action-2 .header-action-icon-2>a {
                color: #fff;
                fill: #fff;
                font-size: 22px;
                margin-right: 10px;
            }

            .cart-dropdown-wrap {
                width: 290px;
                right: -39px;
            }

            .cart-dropdown-wrap ul li .shopping-cart-img {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 60px;
                flex: 0 0 60px;
                margin-right: 10px;
            }

            .cart-dropdown-wrap .shopping-cart-footer .shopping-cart-button a {
                padding: 12px 22px 13px;
            }

            .categories-dropdown-wrap ul li a {
                padding: 5px 12px;
            }

            .search-popup-wrap .search-popup-content form input {
                width: 270px;
                font-size: 25px;
                padding: 21px 20px 12px 0;
            }

            .mobile-header-wrapper-style {
                width: 380px;
            }

            .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-top {
                padding: 15px 30px 13px 30px;
                border-bottom: 1px solid #ececec;
            }

            .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-top .mobile-header-logo a img {
                width: 140px;
            }

            .mobile-header-wrapper-style .mobile-header-wrapper-inner .mobile-header-content-area {
                padding: 30px;
            }

            .header-height-1 {
                min-height: 65px;
            }

            .header-height-2 {
                min-height: 65px;
            }

            .home-slider.pt-50 {
                padding-top: 0 !important;
            }

            .hero-slider-content-2 h1 {
                font-size: 32px;
                line-height: 1.2;
            }

            .hero-slider-content-2 h2 {
                font-size: 30px;
                line-height: 1.2;
                margin-bottom: 10px;
            }

            .hero-slider-content-2 h4 {
                font-size: 16px;
                margin: 0 0 10px;
            }

            .hero-slider-content-2 .btn-default {
                color: #fff;
                background-color: #3BB77E;
                border-radius: 50px;
                padding: 10px 22px;
                font-size: 14px;
            }

            .hero-slider-content-2 p {
                font-size: 14px;
                line-height: 1.3;
            }

            .banner-big h4 {
                font-size: 12px;
            }

            .banner-big h2 {
                font-size: 16px;
            }

            .banner-big .btn {
                background-color: #3BB77E;
                color: #fff;
                border-radius: 3px;
                font-size: 13px;
                padding: 10px 22px;
                border: 0;
            }

            .home-slider .slider-arrow {
                display: none;
            }

            .home-slider .hero-slider-1 {
                height: 350px;
            }

            .home-slider .hero-slider-1.style-2 {
                height: 400px;
            }

            .home-slider .hero-slider-1.style-2 .hero-slider-content-2 {
                padding-left: 0;
                padding-top: 100px;
            }

            .home-slider .hero-slider-1.style-2 .single-slider-img img {
                max-width: 400px;
            }

            .home-slider .hero-slider-1.style-2 .slider-1-height-2 {
                height: 400px;
                position: relative;
            }

            .banner-img {
                float: left;
            }

            .banner-img.f-none {
                float: none;
            }

            .hero-slider-1.style-3 .slider-1-height-3 {
                height: 390px;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 {
                padding-left: 20px;
            }

            .home-slide-cover .hero-slider-1.style-4 .hero-slider-content-2 {
                padding-left: 0;
            }

            .home-slide-cover .hero-slider-1.style-4 .hero-slider-content-2 h1 {
                font-size: 30px;
            }

            .home-slide-cover .hero-slider-1.style-4 .hero-slider-content-2 h2 {
                font-size: 14px;
            }

            .home-slide-cover .hero-slider-1.style-4 .hero-slider-content-2 h4 {
                font-size: 12px;
            }

            .header-style-3 .header-bottom-bg-color {
                border-bottom: 2px solid #3BB77E;
            }

            .header-style-3 .main-nav {
                border: none !important;
            }

            .header-style-3 .sticky-bar.stick.sticky-blue-bg {
                background-color: #3BB77E;
            }

            .header-style-4 .main-nav {
                border: none !important;
            }

            .header-style-4 .sticky-bar.stick.sticky-blue-bg {
                background-color: #3BB77E;
            }

            .font-xxl {
                font-size: 38px;
            }

            .single-page.pl-30,
            .single-page.pr-30 {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .download-app {
                margin-bottom: 0 !important;
            }

            .footer-mid .logo img {
                max-width: 150px;
            }

            .footer-mid .widget-install-app,
            .footer-mid .widget-about {
                min-width: 205px;
            }

            .footer-mid .widget-about strong {
                display: none;
            }

            .product-list .product-cart-wrap {
                -webkit-box-align: start;
                -ms-flex-align: start;
                align-items: start;
            }

            .product-list .product-cart-wrap .product-img-action-wrap {
                max-width: 45%;
            }

            .product-list .product-cart-wrap h2 {
                font-size: 24px;
            }

            .product-list .product-cart-wrap p.mt-15 {
                display: none;
            }

            .product-list .product-cart-wrap .product-rate-cover {
                margin-bottom: 20px;
            }

            .detail-info {
                padding: 0 !important;
            }

            .detail-info h2 {
                font-size: 30px;
            }

            .detail-info .detail-extralink .detail-qty {
                padding: 11px 20px 11px 10px;
                max-width: 60px;
            }

            .detail-info .product-extra-link2 .button.button-add-to-cart {
                padding: 0px 15px;
            }

            .detail-info .product-extra-link2 .button.button-add-to-cart i {
                display: none;
            }

            .shopping-summery table tbody tr img {
                max-width: 80px;
                margin-right: 15px;
            }

            .shopping-summery .form-check-label {
                display: none;
            }

            .shopping-summery h6 {
                font-size: 14px;
            }

            .shopping-summery td.pl-30 {
                padding-left: 0 !important;
            }

            .shopping-summery button.btn {
                width: 120px;
                margin-left: 15px;
            }

            .product-cart-wrap .product-img-action-wrap .product-action-1 {
                min-width: 111px;
            }

            .custom-modal .modal-dialog {
                max-width: 720px !important;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .mobile-promotion {
                display: block;
                padding: 7px 0;
                text-align: center;
                background: #3BB77E;
                color: #fff;
            }
        }

        /*Mobile landscape*/
        @media only screen and (min-width: 576px) and (max-width: 767px) {
            .header-action .header-action-icon {
                margin-right: 20px;
            }

            .header-action .header-action-icon.header-action-mrg-none {
                margin-right: 20px;
            }

            .header-action .header-action-icon.header-action-mrg-none2 {
                margin-right: 20px;
            }

            .header-action .header-action-icon>a {
                font-size: 22px;
            }

            .header-action-2 .header-action-icon-2 {
                padding: 0 10px;
            }

            .header-action-2 .header-action-icon-2:last-child {
                padding: 0 0 0 10px;
            }

            .header-action-2 .header-action-icon-2>a {
                font-size: 22px;
            }

            .cart-dropdown-wrap {
                width: 310px;
            }

            .search-popup-wrap .search-popup-content form input {
                width: 480px;
                font-size: 25px;
                padding: 21px 20px 12px 0;
            }

            .comment-form .name {
                padding-right: 0px;
                margin-bottom: 1rem;
            }

            .header-style-5 .search-style-2 {
                display: none;
            }
        }

        /*Tablet*/
        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .header-action .header-action-icon {
                margin-right: 33px;
            }

            .header-action .header-action-icon.header-action-mrg-none {
                margin-right: 33px;
            }

            .header-action .header-action-icon.header-action-mrg-none2 {
                margin-right: 33px;
            }

            .header-action-2 .header-action-icon-2>a {
                color: #fff;
                fill: #fff;
            }

            .search-popup-wrap .search-popup-content form input {
                width: 650px;
                font-size: 35px;
            }

            .header-height-1 {
                min-height: 50px;
            }

            .header-height-2 {
                min-height: 50px;
                border-bottom: 2px solid #3BB77E;
            }

            .header-height-3 {
                min-height: 50px;
            }

            .header-height-4 {
                min-height: 50px;
            }

            .header-style-5 .header-bottom {
                padding: 5px 0;
                border-bottom: 1px solid #f7f8f9;
            }

            .comment-form .email {
                padding-left: 0px;
            }

            .loop-grid.pr-30 {
                padding-right: 0 !important;
            }
        }

        /*Desktop*/
        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .totall-product h2 {
                font-size: 28px;
            }

            .loop-grid.loop-list article .post-thumb {
                min-height: 220px;
                min-width: 300px;
            }

            .loop-grid.loop-list article h3.post-title {
                font-size: 22px;
                margin-bottom: 30px !important;
            }

            .loop-grid.loop-list article .post-exerpt {
                display: none;
            }

            .loop-grid.loop-list article .entry-content-2.pl-50 {
                padding-left: 30px !important;
            }

            .logo.logo-hm3 a img {
                width: 120px;
            }

            .header-style-5 .search-style-2 {
                display: none;
            }

            .main-menu.main-menu-mrg-1 {
                margin: 0 0 0 15px;
            }

            .main-menu>nav>ul>li ul.sub-menu li ul.level-menu.level-menu-modify {
                width: 165px;
            }

            .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content {
                left: 20px;
                top: 22px;
            }

            .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content h3 {
                font-size: 20px;
                line-height: 1.3;
                margin: 5px 0 7px;
            }

            .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content .menu-banner-price {
                margin: 0 0 10px;
            }

            .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-content .menu-banner-btn a {
                padding: 10px 16px 13px;
            }

            .main-menu>nav>ul>li ul.mega-menu li .menu-banner-wrap .menu-banner-discount {
                width: 70px;
                height: 70px;
                line-height: 70px;
            }

            .main-menu.main-menu-padding-1>nav>ul>li {
                padding: 0 8px;
            }

            .main-menu.main-menu-padding-1.hm3-menu-padding>nav>ul>li {
                padding: 0 6px;
            }

            .search-style-1 {
                margin-right: 15px;
            }

            .search-style-1 form {
                width: 170px;
            }

            .header-action.header-action-hm3 .header-action-icon {
                margin-right: 15px;
            }

            .header-action.header-action-hm3 .header-action-icon.header-action-mrg-none2 {
                margin-right: 0;
            }

            .header-action.header-action-hm3 .header-action-icon:last-child {
                margin-right: 0;
            }

            .search-style-2 form input {
                width: 340px;
            }

            .hotline p {
                font-size: 15px;
            }

            .search-popup-wrap .search-popup-content form input {
                width: 820px;
            }

            .header-height-1 {
                min-height: 157px;
            }

            .header-height-3 {
                min-height: 133px;
            }

            .header-height-4 {
                min-height: 144px;
            }

            .hero-slider-1 {
                height: 350px;
            }

            .hero-slider-1 .single-slider-img-1 {
                height: 350px;
            }
        }

        @media (min-width: 992px) {
            .col-md-1-5 {
                width: 20%;
            }

            .col-md-2-5 {
                width: 40%;
            }

            .col-md-3-5 {
                width: 60%;
            }

            .col-md-4-5 {
                width: 80%;
            }

            .col-md-5-5 {
                width: 100%;
            }
        }

        /*Wide screen*/
        @media only screen and (min-width: 1600px) {
            .header-action-right .search-location {
                display: block;
            }
        }

        @media only screen and (min-width: 1200px) {
            .container {
                max-width: 1610px;
            }

            .col-lg-1-5 {
                width: 20%;
            }

            .col-lg-2-5 {
                width: 40%;
            }

            .col-lg-3-5 {
                width: 60%;
            }

            .col-lg-4-5 {
                width: 80%;
            }

            .col-lg-5-5 {
                width: 100%;
            }

            .header-action-right {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: end;
                -ms-flex-pack: end;
                justify-content: flex-end;
                -ms-flex-negative: 0;
                flex-shrink: 0;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
        }

        @media only screen and (min-width: 1200px) and (max-width: 1365px) {
            .main-menu.main-menu-padding-1>nav>ul>li {
                padding: 0 14px;
            }
        }

        @media only screen and (max-width: 1400px) {
            .product-cart-wrap.style-2 .product-content-wrap {
                max-width: 94%;
            }

            .hero-slider-1 .single-hero-slider {
                height: 467px;
            }

            .display-2 {
                font-size: 64px;
            }

            .banner-img.style-2 {
                height: 483px;
            }

            .slider-nav-thumbnails button.slick-arrow.slick-prev {
                left: 10px;
            }

            .slider-nav-thumbnails button.slick-arrow.slick-next {
                right: 10px;
            }

            .zoomContainer {
                display: none;
            }

            .detail-info h2 {
                font-size: 30px;
            }

            .tab-style3 .nav-item {
                margin-bottom: 15px;
            }
        }

        @media only screen and (max-width: 1024px) {
            .header-style-1 .main-categori-wrap {
                margin-right: 20px;
            }

            .product-cart-wrap .product-action-1 a.action-btn {
                width: 34px;
                height: 34px;
                line-height: 40px;
                font-size: 13px;
            }

            .banner-big h1 {
                font-size: 22px;
            }

            .banner-big .btn {
                border-radius: 3px;
                font-size: 12px;
                padding: 6px 12px;
                border: 0;
            }

            .banner-img .banner-text h4 {
                margin-top: 0px !important;
            }

            .header-wrap .header-right {
                overflow: hidden;
            }

            .footer-link-cover {
                display: block;
            }

            .footer-link-cover .footer-link-widget {
                margin-right: 30px;
                float: left;
                margin-bottom: 30px;
            }

            .footer-link-cover .footer-link-widget:not(:last-child) {
                margin-right: 30px;
            }

            .et,
            .hotline,
            li.hot-deals,
            .header-action-2 .header-action-icon-2 span.lable {
                display: none !important;
            }

            .main-menu.main-menu-padding-1>nav>ul>li {
                padding: 0 10px;
            }

            .hero-slider-1 .single-hero-slider {
                height: 350px;
            }

            .hero-slider-1 .single-hero-slider .display-2 {
                font-size: 46px;
                margin-bottom: 25px !important;
            }

            .hero-slider-1 .single-hero-slider .slider-content p {
                font-size: 22px;
                margin-bottom: 40px !important;
            }

            .banner-img .banner-text h4 {
                min-height: 50px;
                font-size: 18px;
            }

            .header-style-1 .search-style-2 form {
                max-width: 450px;
            }

            .header-action-2 .header-action-icon-2:last-child {
                padding: 0 0 0 8px;
            }

            .nav-tabs.links .nav-link {
                padding: 0 7px;
                font-size: 14px;
            }

            .deals-countdown .countdown-section {
                padding: 20px 2px 30px 2px;
                margin-left: 2px;
                margin-right: 2px;
            }

            .section-title.style-1 {
                padding-bottom: 15px;
                font-size: 20px;
            }

            .product-list-small h6 {
                font-size: 14px;
            }

            .product-list-small .product-rate-cover {
                display: none;
            }

            .section-title.style-2 {
                display: block;
            }

            .section-title.style-2 h3 {
                margin-bottom: 25px;
                font-size: 28px;
            }

            .modal-open .modal {
                padding-right: 0 !important;
            }

            .vendor-wrap.style-2 {
                display: block;
            }

            .mt-md-30 {
                margin-top: 30px !important;
            }

            .banner-img.style-4 .banner-text h4 {
                font-size: 20px;
            }

            .header-style-1.header-style-5 .header-bottom-bg-color {
                background-color: #fff !important;
            }
        }

        /*small phone*/
        @media only screen and (max-width: 480px) {
            .archive-header {
                padding: 30px;
            }

            .mobile-promotion {
                display: block;
                padding: 7px 0;
                text-align: center;
                background: #3BB77E;
                color: #fff;
            }

            .loop-big h2.post-title {
                font-size: 22px;
            }

            .entry-meta.meta-1 {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: start;
            }

            .single-header-meta .single-share {
                display: none;
            }

            .single-content blockquote {
                padding: 20px 30px;
                border-radius: 15px;
                margin: 20px auto;
                font-size: 16px;
                max-width: 100%;
            }

            .single-content blockquote p {
                font-size: 16px;
                line-height: 22px;
            }

            .hero-slider-1 .single-hero-slider .display-2 {
                font-size: 32px;
            }

            .hero-slider-1 .single-hero-slider .slider-content p {
                font-size: 16px;
                margin-bottom: 40px !important;
            }

            .hero-slider-1 .single-hero-slider .slider-content form {
                max-width: 310px;
            }

            .hero-slider-1 .single-hero-slider .slider-content form button.submit,
            .hero-slider-1 .single-hero-slider .slider-content form button[type="submit"] {
                padding: 12px 20px;
            }

            .security-code {
                padding: 0 20px;
            }

            .post-list .post-thumb {
                max-width: unset;
                margin-right: 0 !important;
            }

            .entry-meta.meta-2 a.btn {
                display: inline-block;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-item-align: center;
                -ms-grid-row-align: center;
                align-self: center;
            }

            .entry-meta.meta-2 .font-xs {
                max-width: 150px;
                line-height: 1.3;
            }

            .banner-bg h2 {
                font-size: 20px;
            }

            .single-header .single-header-meta,
            .entry-bottom {
                display: block;
            }

            .carausel-6-columns,
            .carausel-4-columns {
                max-width: 375px;
                overflow: hidden;
            }

            .hero-slider-1 {
                height: unset;
            }

            .hero-slider-content-2 {
                text-align: center;
                padding-top: 20px;
            }

            .hero-slider-content-2 p {
                width: 100%;
            }

            .header-height-2 {
                min-height: 40px;
            }

            .banner-left-icon,
            .banner-img {
                margin-bottom: 15px;
            }

            .header-action-2 .header-action-icon-2:last-child {
                padding: 0;
            }

            .popular-categories .slider-btn.slider-prev {
                right: 50px !important;
                left: unset !important;
            }

            .mb-sm-0 {
                margin-bottom: 0 !important;
            }

            .mb-sm-4 {
                margin-bottom: 1rem;
            }

            .mb-sm-5 {
                margin-bottom: 2rem;
            }

            .heading-tab {
                display: block !important;
            }

            .heading-tab h3.section-title {
                margin-bottom: 15px !important;
            }

            .nav.right {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: start;
            }

            .hero-slider-1.style-2 .single-slider-img {
                display: none;
            }

            ul.footer-list {
                margin-bottom: 30px;
            }

            .section-padding-60 {
                padding: 30px 0;
            }

            .pt-60,
            .pt-40 {
                padding-top: 30px !important;
            }

            .pb-60 {
                padding-bottom: 30px !important;
            }

            .mb-60 {
                margin-bottom: 30px !important;
            }

            .hero-slider-1.style-3 .slider-1-height-3 {
                height: 220px;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 {
                position: relative;
                text-align: left;
                padding-left: 15px;
                padding-top: 0;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 h1 {
                font-size: 18px;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 h2 {
                font-size: 16px;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 h4 {
                font-size: 14px;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 p {
                font-size: 11px;
            }

            .hero-slider-1.style-3 .hero-slider-content-2 a.btn {
                display: none;
            }

            .header-style-5 .search-style-2 {
                display: none;
            }

            .header-style-5 .header-action-2 .header-action-icon-2>a {
                font-size: 18px;
            }

            .header-style-5 .sticky-bar.stick.sticky-white-bg {
                background-color: #fff;
                padding: 15px 0;
            }

            .font-xxl {
                font-size: 28px;
            }

            .w-50 {
                width: 100% !important;
            }

            .product-list .product-cart-wrap {
                display: block;
            }

            .product-list .product-cart-wrap .product-img-action-wrap {
                max-width: 100%;
            }

            .shop-product-fillter {
                display: block;
            }

            .shop-product-fillter .totall-product {
                margin-bottom: 15px;
            }

            .table td {
                display: block;
                width: 100%;
                text-align: center;
            }

            .table td::before {
                content: attr(data-title) " ";
                float: left;
                text-transform: capitalize;
                margin-right: 15px;
                font-weight: bold;
            }

            .table thead {
                display: none;
            }

            .loop-grid.pr-30 {
                padding-right: 0 !important;
            }

            .loop-grid.loop-list article {
                display: block;
            }

            .d-sm-none {
                display: none;
            }

            .banner-features {
                margin-bottom: 15px;
            }

            .product-cart-wrap:not(:last-child),
            .mb-xs-30 {
                margin-bottom: 30px !important;
            }

            .slick-track .product-cart-wrap {
                margin-bottom: 0 !important;
            }

            .first-post .meta-1 .font-sm {
                display: none;
            }

            .first-post .btn.btn-sm {
                display: none;
            }

            .loop-grid .entry-content {
                padding: 20px 20px 0 20px;
            }

            .img-hover-slide {
                min-height: 232px;
            }

            .comments-area .thumb {
                min-width: 100px;
            }

            .hero-slider-1 .single-slider-img-1 {
                height: 300px;
            }

            .featured .col-lg-2 {
                width: 50%;
            }

            .nav-tabs .nav-link {
                font-size: 13px;
                padding: 10px 12px;
            }

            .deal {
                background-position: left bottom;
            }

            .deals-countdown .countdown-section {
                padding: 20px 2px 30px 2px;
                margin-left: 2px;
                margin-right: 2px;
            }

            .banner-bg {
                padding: 30px;
            }

            .product-list-small figure {
                margin-bottom: 20px !important;
            }

            .product-list-small .title-small {
                font-size: 16px;
                font-weight: 600;
            }

            .newsletter .des {
                display: none;
            }

            .newsletter form {
                margin: 15px 0;
            }

            footer .col-lg-2.col-md-3 {
                width: 50%;
            }

            footer .download-app a img {
                width: 150px;
            }

            .home-slider .hero-slider-1.style-2 .hero-slider-content-2 {
                padding-left: 0;
                padding-top: 50px;
            }

            .home-slider .hero-slider-1.style-2 .hero-slider-content-2 h3 {
                line-height: 1.4;
            }

            .hero-slider-1.style-3.dot-style-1.dot-style-1-position-1 ul {
                bottom: 0;
            }

            .single-content .banner-text,
            .banner-img.banner-big .banner-text {
                display: none;
            }

            .comments-area {
                padding: 25px 0;
                margin-top: 0;
            }

            .entry-bottom {
                margin-bottom: 0 !important;
            }

            section.pt-150.pb-150 {
                padding: 50px 0 !important;
            }

            .product-detail .single-share {
                margin-bottom: 20px;
            }

            .product-detail .tab-style3 .nav-tabs li.nav-item a {
                padding: 0.5rem;
                text-transform: none;
            }

            .related-products .product-cart-wrap {
                margin-bottom: 30px;
            }

            .mb-sm-15 {
                margin-bottom: 15px;
            }

            .section-title {
                display: block;
                margin-bottom: 15px;
            }

            .section-title .title {
                display: block;
            }

            .section-title h3 {
                margin-bottom: 20px;
                font-size: 28px;
            }

            .section-title .show-all {
                display: none;
            }

            .nav-tabs.links .nav-link {
                margin-bottom: 10px;
            }

            .slider-arrow.slider-arrow-2.flex-right {
                display: none;
            }

            .product-grid-4 .product-cart-wrap {
                margin-bottom: 30px;
            }

            .product-list-small figure.col-md-4 {
                max-width: 30%;
                float: left;
                margin: 0 !important;
            }

            .product-list-small .col-md-8 {
                float: left;
                max-width: 70%;
            }

            .newsletter .newsletter-inner {
                padding: 20px;
            }

            .newsletter .newsletter-inner h2 {
                font-size: 22px;
            }

            .newsletter .newsletter-inner .newsletter-content p {
                font-size: 14px;
                margin-bottom: 25px !important;
            }

            .newsletter .newsletter-inner button.submit,
            .newsletter .newsletter-inner button[type="submit"] {
                padding: 12px 20px;
            }

            .footer-link-widget:not(:last-child) {
                margin-right: 0;
            }

            .widget-about {
                margin-bottom: 30px;
            }

            footer p.font-md {
                font-size: 13px;
            }

            .hero-slider-1 .single-hero-slider.rectangle .slider-content {
                width: 100%;
            }

            .product-info {
                border: 0;
                padding: 0;
            }

            .product-info .tab-style3 .nav-tabs li.nav-item a {
                padding: 11px 12px !important;
                font-size: 13px;
            }

            .shopping-summery table tbody tr img {
                max-width: 180px;
                margin-right: 0;
            }

            .toggle_info .font-lg,
            .toggle_info input,
            .apply-coupon .font-lg,
            .apply-coupon input {
                font-size: 14px !important;
            }

            .cart-totals.ml-30 {
                margin-left: 0 !important;
                text-align: center;
            }

            .order_table table .w-160 {
                margin: 0 auto;
            }

            .modal-open .modal {
                padding-right: 0 !important;
            }

            .archive-header-3 {
                padding: 30px;
            }

            .archive-header-3 .archive-header-3-inner {
                display: block;
            }
        }

        /*phone landscape*/
        @media only screen and (min-width: 480px) and (max-width: 667px) {
            .header-height-2 {
                min-height: 40px;
            }

            .col-lg-4 .banner-img {
                margin-bottom: 30px;
            }

            .banner-features {
                margin-bottom: 30px;
            }

            .modal-open .modal {
                padding-right: 0 !important;
            }
        }

        /*small phone*/
        @media only screen and (max-width: 375px) {

            .entry-meta .hit-count,
            .entry-meta.meta-2 .font-xs {
                display: none;
            }

            .deal {
                padding: 30px;
            }

            .custom-modal .modal-dialog .modal-content {
                padding: 0;
            }

            .deal .product-title {
                max-width: unset;
                font-size: 25px;
            }

            .modal-open .modal {
                padding-right: 0 !important;
            }
        }

        @media only screen and (min-width: 375px) and (max-width: 667px) {
            .deal .product-title {
                max-width: 100%;
                font-size: 35px;
            }
        }
    </style>
</head>

<body>
    <div class="invoice invoice-content invoice-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="logo d-flex align-items-center">
                                            <a href="index.html" class="mr-20"><img
                                                    src="{{asset('frontend/assets/imgs/theme/favicon.svg')}}"
                                                    alt="logo" /></a>
                                            <div class="text">
                                                <strong class="text-brand">NestMart Inc</strong> <br />
                                                205 North, Suite 810, Chicago, USA
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h2>INVOICE</h2>
                                        <h6>ID Number: <span class="text-brand">{{$order->invoice_no}}</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-banner">
                                <img src="{{asset('frontend/assets/imgs/invoice/banner.png')}}" alt="">
                            </div>

                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr>
                                                <th>Item Item</th>
                                                <th class="text-center">Unit Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>
                                                    <div class="item-desc-1">
                                                        <span>{{$item->orderProduct->name_en}}</span>
                                                        <small>SKU: {{$item->orderProduct->sku}}</small>
                                                    </div>
                                                </td>
                                                <td class="text-center">${{$item->price}}</td>
                                                <td class="text-center">{{$item->qty}}</td>
                                                <td class="text-right">${{sprintf("%.2f",$item->qty * $item->price)}}
                                                </td>
                                            </tr>
                                            @endforeach

                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">SubTotal</td>
                                                <td class="text-right">{{$order->subtotal}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Shipping Fees</td>
                                                <td class="text-right">${{$order->shipping_fees}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Discounts</td>
                                                <td class="text-right">
                                                    @if ($order->discounted_coupon)
                                                    (${{$order->discounted_coupon}})
                                                    @else
                                                    $0.00
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="text-end f-w-600">Grand Total</td>
                                                <td class="text-right f-w-600">
                                                    @if ($order->discounted_coupon)
                                                    ${{$order->amount - $order->discounted_coupon}}
                                                    @else
                                                    ${{$order->amount}}
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="invoice-bottom pb-80">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="mb-15">Invoice Additional Information</h6>
                                        <p class="font-sm">
                                            <strong>Issue date:</strong> {{$order->created_at->format('d/m/Y')}}<br />
                                            <strong>Invoice To:</strong>
                                            <span
                                                class="text-capitalize">{{$order->userOrders->getFullName()}}</span><br />
                                            <strong>Payment Method:</strong> @if ($order->payment_method == 0)
                                            Cash
                                            @else
                                            Online
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 class="mb-15">Total Amount</h6>
                                        <h3 class="mt-0 mb-0 text-brand">
                                            @if ($order->discounted_coupon)
                                            ${{$order->amount - $order->discounted_coupon}}
                                            @else
                                            ${{$order->amount}}
                                            @endif
                                        </h3>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <div class="hr mt-30 mb-30"></div>
                                    <p class="mb-0 text-muted"><strong>Note:</strong>This is computer generated receipt
                                        and
                                        does not require physical signature.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Vendor JS --}}
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js')}}"></script>
    <script src="{{asset('https://code.jquery.com/jquery-3.6.1.min.js')}}"></script>

</body>

</html>
