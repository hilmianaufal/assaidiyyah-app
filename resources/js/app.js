import './bootstrap';

import { gsap } from 'gsap';
import Alpine from 'alpinejs';

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

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('.tinymce')) {
        tinymce.init({
            selector: '.tinymce',

            license_key: 'gpl',

            plugins: 'link lists image table code',
            toolbar: 'undo redo | bold italic | bullist numlist | link image table | code',

            height: 400,
            skin: false,
            content_css: false,
        });
    }

    gsap.fromTo('.js-menu-item', { x: -12, opacity: 0 }, {
        x: 0,
        opacity: 1,
        duration: 0.3,
        stagger: 0.03,
        ease: 'power2.out',
        clearProps: 'transform,opacity',
    });

    gsap.fromTo('.js-animate-content', { y: 16, opacity: 0 }, {
        y: 0,
        opacity: 1,
        duration: 0.4,
        ease: 'power2.out',
        clearProps: 'transform,opacity',
    });

    gsap.fromTo('.js-mobile-nav', { y: 12, opacity: 0 }, {
        y: 0,
        opacity: 1,
        duration: 0.25,
        stagger: 0.04,
        ease: 'power2.out',
        clearProps: 'transform,opacity',
    });

    if (document.querySelector('.js-hero')) {
        gsap.fromTo('.js-hero', { y: 30, opacity: 0 }, {
            y: 0,
            opacity: 1,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power3.out',
            clearProps: 'transform,opacity',
        });
    }
});