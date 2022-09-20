import './bootstrap';
import VanillaTilt from 'vanilla-tilt';

VanillaTilt.init(document.querySelector(".parallax"), {
	reverse: true,
	max: 8,
	speed: 3000,
	transition: true,
	reset: true,
	glare: true,
	'full-page-listening': true,
	'max-glare': 0.5,
});
