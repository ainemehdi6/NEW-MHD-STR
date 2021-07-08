<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEHDI STORE</title>
    <link rel="shortcut icon"  href="images/logo.jpg">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
<?php 
    include('DAO.php');
	include('main.php');
    $ref=$_GET['ref'];
    $dao=new DAO();
    $prod=$dao->afficheProd($ref);
    $imgs=$dao->afficheProdImgs($ref);
?>	
<div class="product-card">
    <div class="left-column">
        <?php foreach($prod as $p) {echo"
        <span class='share'><i class='fas fa-share-alt'></i></span>
		<span class='heart'><i class='fas fa-heart'></i></span>
		<div class='logo'><img src='images/logo/".$p[6].".png' alt='logo' ></div>
		<div class='main-img'><img src='".$p[7]."' alt='1'></div>";} echo"
		<div class='album'>";
			foreach($imgs as $is){ echo"
            <span class='s1'><img src='".$p[7]."' alt='1'></span>
			<span class='s2'><img src='".$is[0]."' alt='2'></span>
			<span class='s3'><img src='".$is[1]."' alt='3'></span>";}
       
		?>
        </div>
    </div>
    <div class="right-column">
        <?php foreach($prod as $p){ echo"
            <div class='product-name'>
                <h1>".$p[2]."</h1>
                <p>Gaming ".$p[1]."</p>
		    </div>";}
        ?>
		<div class="reviews-counter">
			<div class="rate">
				<input type="radio" id="star5" name="rate" value="5" checked />
				<label for="star5" title="text">5 stars</label>
				<input type="radio" id="star4" name="rate" value="4" checked />
				<label for="star4" title="text">4 stars</label>
				<input type="radio" id="star3" name="rate" value="3" checked />
				<label for="star3" title="text">3 stars</label>
				<input type="radio" id="star2" name="rate" value="2" />
				<label for="star2" title="text">2 stars</label>
				<input type="radio" id="star1" name="rate" value="1" />
				<label for="star1" title="text">1 star</label>
			  </div>
			<span>3 Reviews</span>
		</div>
        <?php foreach($prod as $p){ echo"
        <div class='price'>USD ".$p[3]."</div>
        <div class='description'>
			<h2>Product details:</h2>
			<p>".$p[5]."</p>
        </div>
		<form action='checkout/checkout.php' method='POST'>
			<div class='quantity'>
				QTY <input type='number' min='1' max='5' step='1' value='1' name='sel_prod_qt'>   
                    <input type='hidden' name='ref' value='".$p[0]."'>";}
                ?>            
			</div>
			<button type="submit" class="buy-btn">Buy now</button>
		</form>
	</div>	
</div>
<!--footer----------------------------------->
<footer>
	<h3>MHDSTR</h3>
	<ul class="footer-menu">	
	</ul>
</footer>
<!--copyright------------------>
<a href="#" class="copyright">Copyright 2020. MHDSTR By El Mehdi El Aine.</a>
<!--java-script---------------->
<script>
<?php foreach($prod as $p) { foreach($imgs as $is) {  ?>
const colors = document.querySelectorAll('.left-column .album span') ;
const image = document.querySelector('.left-column .main-img img') ;
const input = document.querySelector('.right-column .quantity input');
const price = document.querySelector('.right-column .price') ;

    input.addEventListener('change',()=> {
        price.textContent = `USD ${input.value * <?php echo $p[3] ?>}` ;
	}) ;
	colors[0].addEventListener('click' , ()=> {
        image.src =' <?php echo $p[7] ?> ';
    }) ;
    colors[1].addEventListener('click' , ()=> {
        image.src = '<?php echo $is[0] ?>' ;
    }) ;
    colors[2].addEventListener('click' , ()=> {
        image.src = '<?php echo $is[1] ?>' ;
	}) ;

</script>
<?php };}; ?>
<script>
    	$(function() {
	$('ul.nav a').bind('click',function(event){
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 1000);
		event.preventDefault();
	});
});


$(document).ready(function(){
	$('.search-box input[type="text"]').on("keyup input", function(){
		var inputVal = $(this).val();
		var resultDropdown = $(this).siblings(".result");
		if(inputVal.length){
			$.get("/search.php", {term: inputVal}).done(function(data){
			resultDropdown.html(data);
			});
		} 
		else{
			resultDropdown.empty();
		}
	});
	$(document).on("click", ".result p", function(){
		$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
		$(this).parent(".result").empty();
	});
});
</script>
</body>
</html>
