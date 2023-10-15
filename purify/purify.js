const purify = require("purify-css");

const content = ["index.html"];
const css = ["styles.css"];
const options = {
    output: "output.html",
};

purify(content, css, options);