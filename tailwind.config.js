import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/View/Components/**/*.php',
    ],

    theme: {
        extend: {
            colors: {
                // CSS vars store RGB triplets (e.g. `10 10 10`) so the
                // `<alpha-value>` substitution lets us use opacity modifiers
                // (e.g. `bg-ink/95`, `text-mute/70`, `ring-lift/30`).
                ink:         'rgb(var(--ink) / <alpha-value>)',
                surface:     'rgb(var(--surface) / <alpha-value>)',
                'surface-2': 'rgb(var(--surface-2) / <alpha-value>)',
                lift:        'rgb(var(--lift) / <alpha-value>)',
                pop:         'rgb(var(--pop) / <alpha-value>)',
                heat:        'rgb(var(--heat) / <alpha-value>)',
                paper:       'rgb(var(--paper) / <alpha-value>)',
                mute:        'rgb(var(--mute) / <alpha-value>)',
                rule:        'rgb(var(--rule) / <alpha-value>)',
            },
            fontFamily: {
                display: ['"General Sans"', 'Inter', 'system-ui', 'sans-serif'],
                sans: ['Inter', 'system-ui', 'sans-serif'],
                mono: ['"JetBrains Mono"', 'ui-monospace', 'SFMono-Regular', 'monospace'],
            },
            fontSize: {
                'display-xl': ['clamp(56px, 9vw, 144px)', { lineHeight: '0.92', letterSpacing: '-0.04em' }],
                'display-l':  ['clamp(40px, 6vw, 88px)',  { lineHeight: '0.95', letterSpacing: '-0.03em' }],
                'display-m':  ['clamp(28px, 4vw, 48px)',  { lineHeight: '1.05', letterSpacing: '-0.02em' }],
                heading:      ['24px',                    { lineHeight: '1.2',  letterSpacing: '-0.01em' }],
                subhead:      ['18px',                    { lineHeight: '1.4' }],
                body:         ['16px',                    { lineHeight: '1.6' }],
                caption:      ['13px',                    { lineHeight: '1.4', letterSpacing: '0.08em' }],
                mono:         ['14px',                    { lineHeight: '1.4' }],
            },
            maxWidth: {
                container: '1320px',
            },
            borderRadius: {
                '2xl': '16px',
            },
            transitionTimingFunction: {
                'site': 'cubic-bezier(0.22, 1, 0.36, 1)',
            },
            transitionDuration: {
                'site': '320ms',
            },
            keyframes: {
                'fade-up': {
                    '0%':   { opacity: '0', transform: 'translateY(12px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.6s cubic-bezier(0.22, 1, 0.36, 1) both',
            },
        },
    },

    plugins: [forms, typography],
};
