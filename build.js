const fs = require('node:fs');
const path = require('node:path');

const root = __dirname;

// 1. Minify CSS
try {
    const cssPath = path.join(root, 'assets', 'css', 'style.css');
    const minCssPath = path.join(root, 'assets', 'css', 'style.min.css');
    if (fs.existsSync(cssPath)) {
        const rawCss = fs.readFileSync(cssPath, 'utf8');
        const minCss = rawCss
            .replace(/\/\*[\s\S]*?\*\//g, '')
            .replace(/\s+/g, ' ')
            .replace(/\s*([\{\};:,>~+])\s*/g, '$1')
            .replace(/;}/g, '}')
            .trim();
        fs.writeFileSync(minCssPath, minCss);
        console.log(`Minified CSS: ${(rawCss.length / 1024).toFixed(1)} KB -> ${(minCss.length / 1024).toFixed(1)} KB`);
    }
} catch (err) {
    console.warn('Could not minify CSS:', err);
}

// 2. Build index.html from template & partials
const templatePath = path.join(root, 'index.template.html');
const template = fs.readFileSync(templatePath, 'utf8');
const includePattern = /<!-- include:(partials\/[\w.-]+\.html) -->/g;
const inlinePattern = /<!-- inline:([\w./-]+) -->/g;
const included = new Set();

let html = template.replace(includePattern, function (_, relativePath) {
    const fragmentPath = path.join(root, relativePath);
    const fragment = fs.readFileSync(fragmentPath, 'utf8');
    included.add(relativePath);
    return fragment.trim();
}).replace(inlinePattern, function (_, relativePath) {
    const filePath = path.join(root, relativePath);
    if (fs.existsSync(filePath)) {
        const content = fs.readFileSync(filePath, 'utf8');
        console.log(`Inlined ${relativePath} (${(content.length / 1024).toFixed(1)} KB) directly into index.html`);
        return `<style id="critical-main-css">${content}</style>`;
    }
    return '';
}).replace(/[ \t]+(?=\r?\n)/g, '');

if (html.includes('<!-- include:')) {
    throw new Error('An HTML include marker was not resolved.');
}

if (included.size === 0) {
    throw new Error('No HTML fragments were included.');
}

fs.writeFileSync(path.join(root, 'index.html'), html);
console.log(`Built index.html from ${included.size} HTML fragments.`);
