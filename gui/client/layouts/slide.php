<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/27/2018
 * Time: 11:29 AM
 */
?>
<div id="Slide">
    <meta charset="utf-8">
    <style>
        * {
            box-sizing:border-box
        }
        h2 {
            text-align: center;
        }
        /* Slideshow container */
        .slideshow-container {
            width: 100%;
            position: relative;
            margin-top: 0px;
        }
        /* Ẩn các slider */
        .mySlides {
            display: none;
        }
        /* Định dạng nội dung Caption */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* định dạng các chấm chuyển đổi các slide */
        .dot {
            cursor:pointer;
            height: 13px;
            width: 13px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }
        /* khi được hover, active đổi màu nền */
        .active, .dot:hover {
            background-color: #717171;
        }

        /* Thêm hiệu ứng khi chuyển đổi các slide */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 3s;
            animation-name: fade;
            animation-duration: 3s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
    </style>
    </head>
    <div>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="../img/slide/slide-1.jpg" style="width:100%">

            </div>

            <div class="mySlides fade">
                <img src="../img/slide/slide-2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="../img/slide/slide-3.jpg" style="width:100%">
            </div>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(0)"></span>
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </div>
    <script>
        //khai báo biến slideIndex đại diện cho slide hiện tại
        var slideIndex;
        // KHai bào hàm hiển thị slide
        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }

            slides[slideIndex].style.display = "block";
            dots[slideIndex].className += " active";
            //chuyển đến slide tiếp theo
            slideIndex++;
            //nếu đang ở slide cuối cùng thì chuyển về slide đầu
            if (slideIndex > slides.length - 1) {
                slideIndex = 0
            }
            //tự động chuyển đổi slide sau 5s
            setTimeout(showSlides, 5000);
        }
        //mặc định hiển thị slide đầu tiên
        showSlides(slideIndex = 0);


        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
    </script>
</div>
