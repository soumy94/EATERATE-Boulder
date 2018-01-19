<?php
include_once('/var/www/html/eaterate/header.php');

#author: Soumyatha Gavvala soumyatha.gavvala@colorado.edu
#name: Showrest
#purpose: Shows list of restaurants
#date: 2017/12/11
#version: 1

echo"
        <ul class=\"nav navbar-nav\">
			<li class=\"active\"><a href=\"#\">View Restaurants</a></li>
			<li><a href=scoreboard.php>View Winners!</a></li> 
		</ul>
		<ul class=\"nav navbar-nav navbar-right\">
			<li><a href=logout.php><span class=\"glyphicon glyphicon-log-out\"></span> Logout</a></a></li>
		</ul>
  </div>
</nav>";


echo"
   <style>
img {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 150px;
}

img:hover {
    box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>

<div class=\"row\">
<table>  <tr>

    <div class=\"col-md-4\">
		<a href=\"http://www.aloythai.com/\">
		<img src=\"http://static1.squarespace.com/static/572a8a181d07c0f635869a78/t/572a8afce707eb499d6faa66/1511896809035/\">
        <h2>Aloy Thai</h2> </a>
        <p>Cuisine: Asian </p>
		<p>Location:Centrail Boulder</p> <p>  </p>
    </div>
	
	
	<div class=\"col-md-4\">
		<a href=\"http://www.bawarchilouisville.com/\">
		<img src=\"https://s3-media3.fl.yelpcdn.com/bphoto/Vtv_22i21jWiwIOQVlta4w/o.jpg\">
        <h2>Bawarchis Biryani</h2> </a>
        <p>Cuisine: Asian </p>
		<p>Location: South Boulder</p> <p>  </p>
    </div>
	
	
	<div class=\"col-md-4\">
		<a href=\"https://bossladypizza.com/\">
		<img src=\"https://static1.squarespace.com/static/5747202959827edb58204486/t/57475c4a8259b5e5a34582dd/1512432241498/?format=1500w\">
         <h2>Boss Lady Pizza</h2> </a>
        <p>Cuisine: Italian </p>
		<p>Location: South Boulder</p> <p>  </p>
    </div></div>
</tr>
<tr>	
	<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://www.yelp.com/biz/boulder-pho-boulder\">
        	<img src=\"https://s3-media1.fl.yelpcdn.com/bphoto/ILqZhpVyinAxhE43nlCDXA/ls.jpg\">
        <h2>Boulder Pho</h2> </a>
        <p>Cuisine: Asian </p>
		<p>Location: North Boulder</p> <p>  </p>
    </div>
	

	<div class=\"col-md-4\">
		<a href=\"http://www.boxcarcoffeeroasters.com/\">
        <img src=\"http://d33wubrfki0l68.cloudfront.net/ro/chiclets/boxcar/assets/ab37196a1b1cc109b827787d96c6087db52f98f7/boxcar-logo.png\">
        <h2>Boxcar Coffee Roasters</h2> </a>
        <p>Cuisine: Coffee</p>
		<p>Location: Central Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://chebahut.com/\">
        <img src=\"https://pbs.twimg.com/profile_images/1478385678/ChebaHutLogo_basic_400x400.gif\">
        <h2>Cheba Hut</h2> </a>
        <p>Cuisine: American </p>
		<p>Location: North Boulder</p> <p>  </p>
    </div></div>
</tr>
<tr>
	<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://www.chipotle.com/\">
        <img src=\"https://drpma142ptgxf.cloudfront.net/assets/logo.svg\">
        <h2>Chipotle</h2> </a>
        <p>Cuisine: Mexican </p>
		<p>Location: South Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"http://www.coldstonecreamery.com/\">
        <img src=\"https://clayterrace.com/images/default-source/store-logos/store-logos/cold-stone-creamery.tmb-t-400x400.png?Status=Master&sfvrsn=450f2078_7\">
        <h2>Coldstone Creamery</h2> </a>
        <p>Cuisine: Dessert </p>
		<p>Location: North Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"http://falafelkingfoods.com/\">
        <img src=\"http://falafelkingfoods.com/graphics/falafel_king.png\">
        <h2>Falafel King</h2> </a>
        <p>Cuisine: Mediterranean </p>
		<p>Location: South Boulder</p> <p>  </p>
    </div></div>
</tr>
<tr>	
<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://www.yelp.com/biz/goody-monster-boulder\">
        <img src=\"https://s3-media4.fl.yelpcdn.com/bphoto/wPN41fcKPcXYk-2innZzqg/348s.jpg\">
        <h2>Goody Monster</h2> </a>
        <p>Cuisine: Asian </p>
		<p>Location: South Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://www.gurkhasrestaurant.com/\">
        <img src=\"https://www.catchyroad.com/img/multiphotos/1495623651de.jpg?filt=crop&s=3ae7ce358431657956745468ea0d609e\">
        <h2>Gurkhas Restaurant</h2> </a>
        <p>Cuisine: Indian </p>
		<p>Location: North Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"http://www.kalitagrillgreekcafeboulder.com/\">
        <img src=\"https://s3-media4.fl.yelpcdn.com/bphoto/GrhdmCxCZsiB-GuT8GZ5TQ/ls.jpg\">
        <h2>Kalita Grill</h2> </a>
        <p>Cuisine: Mediterranean </p>
		<p>Location: North Boulder</p> <p>  </p>
    </div></div>
</tr>
<tr>
	<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://www.nextdooreatery.com/\">
        <img src=\"https://s3-media1.fl.yelpcdn.com/bphoto/079kjsos7aGXzwNtB0Cd5g/ls.jpg\">
        <h2>Next Door</h2> </a>
        <p>Cuisine: American </p>
		<p>  Location: South Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://ozocoffee.com/\">
        <img src=\"https://pbs.twimg.com/profile_images/614163758953295873/GjnAuAof.jpg\">
        <h2>Ozo Coffee</h2> </a>
        <p>Cuisine: Coffee </p>
		<p>  Location: North Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"http://pastajay.com/\">
        <img src=\"http://barillafoodservicerecipes.com/wp-content/uploads/2015/04/pasta-J-logo.jpg\">
        <h2>Pasta Jay's</h2> </a>
        <p>Cuisine: Italian </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div></div>
</tr>
<tr>
	<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://pieceloveandchocolate.com/\">
        <img src=\"https://s3-media3.fl.yelpcdn.com/bphoto/5p9mnQ364MwEn4DRMuIXDA/348s.jpg\">
        <h2>Piece Love and Chocolate</h2> </a>
        <p>Cuisine: Dessert </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://www.pizzahut.com/\">
        <img src=\"https://vignette.wikia.nocookie.net/logopedia/images/b/bc/Pizzahut.jpg/revision/latest/scale-to-width-down/200?cb=20161129134629\">
        <h2>Pizza Hut</h2> </a>
        <p>Cuisine: Italian </p>
		<p>  Location: North Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://www.rinconargentinoboulder.com/\">
        <img src=\"http://media-cdn.tripadvisor.com/media/photo-s/05/f8/26/a8/rincon-argentino-kendall.jpg\">
        <h2>Rincon Argentino</h2> </a>
        <p>Cuisine: Mexican </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div></div>
</tr>
<tr>
	<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://www.riograndemexican.com/\">
        <img src=\"https://seeklogo.com/images/R/Rio_Grande-logo-47F5A2692F-seeklogo.com.gif\">
        <h2>Rio Grande</h2> </a>
        <p>Cuisine: Mexican </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://www.starbucks.com/\">
        <img src=\"https://www.logodesignteam.com/blog/wp-content/uploads/2016/10/Starbucks-Logo.jpg\">
        <h2>Starbucks</h2> </a>
        <p>Cuisine: Coffee </p>
		<p>  Location: South Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"http://www.sweetcowicecream.com/\">
        <img src=\"http://hopepantry.org/wp-content/uploads/2017/04/sweetcow.png\">
        <h2>Sweet Cow Icecream</h2> </a>
        <p>Cuisine: Dessert </p>
		<p>  Location: South Boulder</p> <p>  </p>
    </div></div>
</tr>	
<tr>
	<div class=\"row\">
	<div class=\"col-md-4\">
		<a href=\"https://www.buffrestaurant.com/\">
        <img src=\"https://static.wixstatic.com/media/281210_7380af6ba0b042748d0479e203f5689c.jpg/v1/fill/w_378,h_369,al_c,q_80,usm_0.66_1.00_0.01/281210_7380af6ba0b042748d0479e203f5689c.webp\">
        <h2>The Buff</h2> </a>
        <p>Cuisine: American </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"https://www.themedboulder.com/\">
        <img src=\"http://www.theacademyboulder.com/wp-content/uploads/2016/05/med-logo-8.jpg\">
        <h2>The Med</h2> </a>
        <p>Cuisine: Mediterranean </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div>
	
	<div class=\"col-md-4\">
		<a href=\"http://www.tiffinsindiacafe.com/\">
        <img src=\"https://s3-media3.fl.yelpcdn.com/bphoto/OuY910uqo14Xasx5AxutnQ/ls.jpg\">
        <h2>Tiffins</h2> </a>
        <p>Cuisine: Indian </p>
		<p>  Location: Central Boulder</p> <p>  </p>
    </div></div>
</tr>
</table>
</body>
</html>";


?>


