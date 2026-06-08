import './bootstrap';
import { gsap } from 'gsap';

document.addEventListener('DOMContentLoaded', () => {
    gsap.fromTo(
        '.js-menu-item',
        { x: -12, opacity: 0 },
        {
            x: 0,
            opacity: 1,
            duration: 0.3,
            stagger: 0.03,
            ease: 'power2.out',
            clearProps: 'transform,opacity',
        }
    );

    gsap.fromTo(
        '.js-animate-content',
        { y: 16, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.4,
            ease: 'power2.out',
            clearProps: 'transform,opacity',
        }
    );

    gsap.fromTo(
        '.js-mobile-nav',
        { y: 12, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.25,
            stagger: 0.04,
            ease: 'power2.out',
            clearProps: 'transform,opacity',
        }
    );

    if (document.querySelector('.js-hero')) {
    gsap.fromTo(
        '.js-hero',
        { y: 30, opacity: 0 },
        {
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power3.out',
            clearProps: 'transform,opacity',
        }
    );
}

});