
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

var articles = [
	{	
		"title": "Personalized Zodiac Birthday Certificate",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Treat a loved one to some insight into their name and birthday by giving them one of these personalized zodiac birthday certificates. It’s written on elegant linen paper and features information on the meaning of their name and zodiac sign.",
		"price": 20.00,
		"buttonLink": '#'
	},
	{
		"title": "LEGO Robot Building Kit",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Nurture your young intellect’s mind during playtime with the LEGO robot building kit. This 543 piece set works in tandem with a special app designed to teach kids the art of coding in an easy and fun way using challenging games.",
		"price": 159.99,
		"buttonLink": '#'
	},
	{
		"title": "Indoor/Outdoor Heated Slippers",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Help stay warm when the temperature drops below freezing by putting on these indoor/outdoor heated slippers. These ankle high boots come with four different heat settings and can last up to 10 hours on a single charge.",
		"price": 99.99,
		"buttonLink": '#'
	},
	{
		"title": "Shiitaki Mushroom Log Kit",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Give your meals an exotic touch by sprinkling them with your own homegrown shiitaki mushrooms. The kit comes with a small hand-cut wooden log inoculated with spores that’ll produce a batch of organic and delicious shiitake mushrooms with little effort.",
		"price": 29.95,
		"buttonLink": '#'
	},
	{
		"title": "Hidden Compartments Stash Belt",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Keep your valuables safe while you’re out and about by storing them in the hidden compartment stash belt. It features an elegant all black design and comes outfitted with a long slender compartment, ideal for storing small items like cash and jewelry.",
		"price": 89.99,
		"buttonLink": '#'
	},
	{
		"title": "Motion Sensing Floodlight Security Cam",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Keep your property safe without spending a fortune on pricey systems using this motion sensing floodlight security camera. It comes with built-in floodlights, siren alarm, and audio so you can communicate with whoever is within view using your smartphone.",
		"price": 249.99,
		"buttonLink": '#'
	},
	{	
		"title": "Personalized Zodiac Birthday Certificate",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Treat a loved one to some insight into their name and birthday by giving them one of these personalized zodiac birthday certificates. It’s written on elegant linen paper and features information on the meaning of their name and zodiac sign.",
		"price": 20.00,
		"buttonLink": '#'
	},
	{
		"title": "Hidden Compartments Stash Belt",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Keep your valuables safe while you’re out and about by storing them in the hidden compartment stash belt. It features an elegant all black design and comes outfitted with a long slender compartment, ideal for storing small items like cash and jewelry.",
		"price": 89.99,
		"buttonLink": '#'
	},
	{
		"title": "Indoor/Outdoor Heated Slippers",
		"titleLink": "#",
		"productLink": "#",
		"imgURL": "http://placehold.it/381x250?text=Example+Image",
		"description": "Help stay warm when the temperature drops below freezing by putting on these indoor/outdoor heated slippers. These ankle high boots come with four different heat settings and can last up to 10 hours on a single charge.",
		"price": 99.99,
		"buttonLink": '#'
	},
];


const app = new Vue({
    el: '#app',
    data: {
		articles: articles,
	},
});

//jQuery
$(document).ready(function(){
	//Calling the function
	scrollToTop();
	
});

function scrollToTop() {
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0}, 800);
		return false;
	});
}