    <h2 class="head_text">
        Welcome back, <?php $username = $_SESSION['username']; echo $username;   ?>
    </h2>
    <div class="slider">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="../../assets/slider_images/slider_1.png" class="image">
            </div>
            <div class="mySlides fade">
                <img src="../../assets/slider_images/slider_2.png" class="image">
            </div>
            <div class="mySlides fade">
                <img src="../../assets/slider_images/slider_3.png" class="image">
            </div>
        </div>
        
        <div style="text-align:center" class="dot_container">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
          <!-- <span class="dot" onclick="currentSlide(4)"></span> 
          <span class="dot" onclick="currentSlide(5)"></span>  -->
        </div>
    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}    
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
        }
    </script>