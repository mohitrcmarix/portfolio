# Mohit Rathod Portfolio

This is a static GitHub Pages portfolio. Page sections are maintained as HTML fragments in `partials/` and assembled into the crawlable `index.html` with Node.js built-ins:

```sh
node build.js
```

Commit the generated `index.html` along with source changes when publishing from the repository root. GitHub Pages serves the project at `/portfolio/`; canonical, sitemap, and social metadata use that public URL.
