const fs = require('node:fs');
const path = require('node:path');

const root = __dirname;
const templatePath = path.join(root, 'index.template.html');
const template = fs.readFileSync(templatePath, 'utf8');
const includePattern = /<!-- include:(partials\/[\w.-]+\.html) -->/g;
const included = new Set();

const html = template.replace(includePattern, function (_, relativePath) {
    const fragmentPath = path.join(root, relativePath);
    const fragment = fs.readFileSync(fragmentPath, 'utf8');
    included.add(relativePath);
    return fragment.trim();
}).replace(/[ \t]+(?=\r?\n)/g, '');

if (html.includes('<!-- include:')) {
    throw new Error('An HTML include marker was not resolved.');
}

if (included.size === 0) {
    throw new Error('No HTML fragments were included.');
}

fs.writeFileSync(path.join(root, 'index.html'), html);
console.log(`Built index.html from ${included.size} HTML fragments.`);
