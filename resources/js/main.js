import './bootstrap';
import VanillaTilt from 'vanilla-tilt';
import 'bootstrap-icons/font/bootstrap-icons.css';

VanillaTilt.init(document.querySelector(".parallax"), {
	reverse: true,
	max: 15,
	speed: 3000,
	perspective: 1000,
	transition: true,
	reset: true,
	glare: true,
	'full-page-listening': true,
	'max-glare': 0.5,
});
