import './bootstrap';

import Alpine from 'alpinejs';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

import tinymce from 'tinymce/tinymce';

import 'tinymce/icons/default';
import 'tinymce/themes/silver';
import 'tinymce/models/dom';

import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';

import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/image';
import 'tinymce/plugins/table';
import 'tinymce/plugins/code';
import 'tinymce/plugins/fullscreen';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/wordcount';

window.Alpine = Alpine;
window.tinymce = tinymce;

gsap.registerPlugin(ScrollTrigger);

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    initTinyMce();
    initAdminAnimations();
    initPublicAnimations();
});

function initTinyMce() {
    if (!document.querySelector('.tinymce')) return;

    tinymce.init({
        selector: '.tinymce',
        license_key: 'gpl',
        plugins: 'link lists image table code fullscreen preview wordcount',
        toolbar: 'undo redo | blocks | bold italic underline | bullist numlist | link image table | code fullscreen preview',
        height: 420,
        skin: false,
        content_css: false,
        branding: false,
        promotion: false,
    });
}

function initAdminAnimations() {
    if (document.querySelector('.js-menu-item')) {
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
    }

    if (document.querySelector('.js-animate-content')) {
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
    }

    if (document.querySelector('.js-mobile-nav')) {
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
    }
}

function initPublicAnimations() {
    const isPublicPage =
        document.querySelector('body') &&
        !document.querySelector('[data-admin-layout]');

    if (!isPublicPage) return;

    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) return;

    if (document.querySelector('header nav')) {
        gsap.fromTo(
            'header nav',
            { y: -24, opacity: 0 },
            {
                y: 0,
                opacity: 1,
                duration: 0.7,
                ease: 'power3.out',
                clearProps: 'transform,opacity',
            }
        );
    }

    if (document.querySelector('.js-hero')) {
        gsap.fromTo(
            '.js-hero',
            { y: 30, opacity: 0, filter: 'blur(8px)' },
            {
                y: 0,
                opacity: 1,
                filter: 'blur(0px)',
                duration: 0.9,
                stagger: 0.15,
                ease: 'power4.out',
                clearProps: 'transform,opacity,filter',
            }
        );
    }

    gsap.utils.toArray('main section, body > section').forEach((section) => {
        if (section.closest('[data-no-gsap]')) return;

        const heading = section.querySelector('h1, h2');
        const cards = section.querySelectorAll('article, .group');
        const images = section.querySelectorAll('img');

        if (heading) {
            gsap.fromTo(
                heading,
                { y: 26, opacity: 0, filter: 'blur(6px)' },
                {
                    y: 0,
                    opacity: 1,
                    filter: 'blur(0px)',
                    duration: 0.75,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: heading,
                        start: 'top 88%',
                        once: true,
                    },
                    clearProps: 'transform,opacity,filter',
                }
            );
        }

        if (cards.length) {
            gsap.fromTo(
                cards,
                { y: 28, opacity: 0 },
                {
                    y: 0,
                    opacity: 1,
                    duration: 0.65,
                    stagger: 0.06,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top 82%',
                        once: true,
                    },
                    clearProps: 'transform,opacity',
                }
            );
        }

        if (images.length) {
            gsap.fromTo(
                images,
                { scale: 1.06, opacity: 0 },
                {
                    scale: 1,
                    opacity: 1,
                    duration: 0.9,
                    stagger: 0.04,
                    ease: 'power3.out',
                    scrollTrigger: {
                        trigger: section,
                        start: 'top 86%',
                        once: true,
                    },
                    clearProps: 'transform,opacity',
                }
            );
        }
    });

    gsap.utils.toArray('a, button').forEach((el) => {
        el.addEventListener('mouseenter', () => {
            gsap.to(el, {
                scale: 1.03,
                duration: 0.18,
                ease: 'power2.out',
            });
        });

        el.addEventListener('mouseleave', () => {
            gsap.to(el, {
                scale: 1,
                duration: 0.18,
                ease: 'power2.out',
                clearProps: 'transform',
            });
        });
    });
}