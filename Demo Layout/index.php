<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop Quần Áo Nam</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css" /> 
</head>
<body> 
    <!-- Header -->
        <div id="Header">
            <div id="Container">
                <div id="icon-card">
                    <a href="#" >
                        <img src="./img/giohang.png" height="30px" width="30px" style="margin-top:4px"/>
                        <p>Giỏ Hàng</p>
                    </a>
                </div>
            </div>
                <div id="form2">
                    <form action="#" method="POST">
                        Username: <input id="username" type="text" name="txtUsername" placeholder="Nhập username..." />
                        Password: <input id="password" type="password" name="txtPassword" placeholder="Nhập password..."/>
                        <input id="submit" type="submit" value="Log in">
                    </form>
                </div>
        </div>
    <!-- -->

    <!-- Menu -->
        <div id="Menu">
            <div id="Container">
                <div id="divLeft">
                    <ul type="none">
                        <li><a href="#">Trang Chủ</a></li>
                        <li><a href="#">Áo Sơ Mi Nam</a></li>
                        <li><a href="#">Quần Tây Nam</a></li>
                        <li><a href="#">Ví Nam</a></li>
                    </ul>
                </div>
                <div id="divRight">
                    <div>
                            <div id="form">
                                    <form action="#" method="GET" >
                                        <input id="bt" type="text" name="txtTimkiem" placeholder="Nhập Sản Phẩm Cần Tìm..." style="margin-right: -5px;" />
                                        <input id="tk" type="button" value="Tìm Kiếm"> </input>
                                    </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    <!--  -->

    <!-- Slide -->
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
                  <img src="./img/slide/slide-1.jpg" style="width:100%">
                  
                </div>
        
                <div class="mySlides fade">
                        <img src="./img/slide/slide-2.jpg" style="width:100%">
                </div>
        
                <div class="mySlides fade">
                        <img src="./img/slide/slide-3.jpg" style="width:100%">
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
    <!--  -->

    <!--  Content-->
        <div id="Content">
            <div id="Container">
                Noi Dung <br />
                sp1 <br />
                sp2<br />
                sp3<br />
            </div>
        </div>
    <!--  -->

    <!-- Footer -->
        <div id="Footer">
            <div id="footer1">
                <p>Thương Hiệu Thời Trang Việt Nam</p>
                <p>Email:info@Gmail.com</p>
                <p>Hotline:08.888.8888</p>
            </div> 
            <div id="footer2">
                <p>Cửa Hàng:</p>
                <p>Chi nhánh 1: 1 Nguyễn Thị Minh Khai, Quận 1, HCM</p>
                <p>Chi nhánh 2: Tầng 69 tòa nhà Bitexco, Quận 1,HCM </p>
                <p>Chi nhánh 3: Tầng 81 tòa nhà Landmark, Quận 1,HCM </p>
            </div>
            <div id="footer3">
                <p> 
                    &#169 Bản Quyền thuộc về công ty trách nhiệm hữu hạn 3 thành viên.
                </p>	
            </div>
            <div >
                <p>
                    &spades; Designer by Quách Đình Tiến, Đỗ Bá Tú, Hoàng Tuấn  &spades;
                </p>
            </div>
            
        </div>
    <!--  -->



</body>
</html>