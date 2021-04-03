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
			$.get("search.php", {term: inputVal}).done(function(data){
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

const colors = document.querySelectorAll('.left-column .album span') ;
const image = document.querySelector('.left-column .main-img img') ;
const input = document.querySelector('.right-column .quantity input');
const price = document.querySelector('.right-column .price') ;

    input.addEventListener('change',()=> {
        price.textContent = `USD ${input.value * 144.7}` ;
	}) ;
	colors[0].addEventListener('click' , ()=> {
        image.src = 'images/s1.png' ;
    }) ;
    colors[1].addEventListener('click' , ()=> {
        image.src = 'images/s3.png' ;
    }) ;
    colors[2].addEventListener('click' , ()=> {
        image.src = 'images/s4.png' ;
	}) ;
	colors[3].addEventListener('click' , ()=> {
        image.src = 'images/s5.png' ;
    }) ;